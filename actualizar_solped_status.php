<?php
session_start();
header("Content-Type: application/json");
$variables = json_decode(file_get_contents('php://input'), true);
include "conexionGhoner.php";

date_default_timezone_set('Etc/GMT+6');
$fecha = date('Y-m-d H:i:s');

$id_seguimiento = $variables['id_seguimiento'];

$sql_get = "SELECT * FROM canjer_premios_colaborador_sugerencias WHERE id=?";
$stmt_get = $conexion->prepare($sql_get);
$stmt_get->bind_param("i", $id_seguimiento);
$stmt_get->execute();
$res = $stmt_get->get_result();
//Variables directos de la bd
$registro_actual = $res->fetch_assoc();


// ## VARIABLES ##

//Variables que vienen de la base de datos 
$actual = (int)$registro_actual['producto_llego']; // 1 significa que llegó el pedido; 0 significa que no ha llegado el pedido.
$numero_solped_antes = $registro_actual['solped']; // Es el número de solped que agregan.
$oc_generada_antes = $registro_actual['oc_generada']; //Es el código de compra del producto.
$fecha_solped_antes = $registro_actual['fecha_solped'];
$fecha_solped_respaldo = $registro_actual['fecha_solped_respaldo']; //Es la fecha que lleva el control de actualizaciones, ocurre cuando eliminaron solped y vuelven a agregar.

//Variables de inicialización de la bd
$solped = $numero_solped_antes;
$oc = $oc_generada_antes;
$llego = $actual;

//Variables que vienen del fronted
$premio_status = $variables['premio_status'];
$accion = $variables['accion'] ?? null;


// ## QUERY'S ##

$set = [];
$params = [];
$types = "";


if ($accion == 'ConfirmarPremio') {

   /*========== Variables ==========*/
   $producto_llego = $variables['producto_llego'];
   $producto_llego = (int)$producto_llego;


   //validaciones de los query's
   if (array_key_exists('producto_llego', $variables)) {

      // solo permitir transición 0 → 1
      if ($producto_llego === 1 && $actual === 0) {

         $set[] = "producto_llego=1";
         $set[] = "fecha_llegada=?";
         $params[] = $fecha;
         $types .= "s";

         $llego = 1;
      }
   }
} else {

   /*========== Variables ==========*/
   $numero_solped = $variables['numero_solped'];
   $oc_generada = $variables['oc_generada'];


   if (array_key_exists('numero_solped', $variables)) {
      $set[] = "solped=?";
      $params[] = $numero_solped;
      $types .= "s";

      $solped = $numero_solped;

      /* CASO 1
      Si producto llegó es igual a 0 y no hay nada en número solped ni antes y después, actualiza la fecha.
   */
      if ($actual === 0 && trim($numero_solped) !== '' && trim($numero_solped) !== trim($numero_solped_antes)) {
         $set[] = "fecha_solped=?";
         $params[] = $fecha;
         $types .= "s";
      }
      /* CASO 2
      Si producto llegó es igual a 0, ni numero solped está vacío y en la bd también está vacío y la oc generada debe contener fecha entonces asigna fecha oc a fecha solped.
   */
      if ($actual === 0 && trim($numero_solped) === '' && trim($numero_solped_antes) !== '' && trim($oc_generada_antes) !== '') {
         $set[] = "fecha_solped=fecha_oc";
      }
      /*CASO 3
      Si Producto llego es igual a 0 y numero solped está vacío y oc generada está vacío y oc generada antes también está vacío entonces actualiza fecha solped a vacío.
      Ocurre cuando elimina solped sin existir oc.
   */
      if ($actual === 0 && trim($numero_solped) === '' && trim($oc_generada) === '' && trim($oc_generada_antes) === '') {
         $set[] = "fecha_solped=NULL";
         $set[] = "fecha_solped_respaldo=NULL";
      }
      /* CASO 4
      si producto llegó = 0 y numero solped anterior existe y numero solped está vacío pero existe oc, entonces fecha solped respaldo = fecha oc.
      Ocurre cuando eliminan solped pero existe oc.
   */
      if ($actual === 0 && trim($numero_solped_antes) !== '' && trim($numero_solped) === '' && trim($oc_generada) !== '') {
         $set[] = "fecha_solped_respaldo=fecha_oc";
      }
      /*CASO 5
      Si producto llegó es igual a cero, y numero solped antes es diferente al solped nuevo y oc no está vacío entonces asigna en fecha solped respaldo fecha oc

      Aplica cuando actualizan un solped pero existe oc
   */
      if ($actual === 0 && trim($numero_solped_antes) !== trim($numero_solped) && trim($oc_generada) !== '') {
         $set[] = "fecha_solped_respaldo=fecha_oc";
      }
   }
   if (array_key_exists('oc_generada', $variables)) {
      $set[] = "oc_generada=?";
      $params[] = $oc_generada;
      $types .= "s";

      $oc = $oc_generada;

      /* CASO 7
      Si producto llegó es igual a 0 y actualizan la oc en fechas diferentes, se actualiza la fecha oc.
   */

      if ($actual === 0 && trim($oc_generada) !== '' && trim($oc_generada) !== trim($oc_generada_antes)) {
         $set[] = "fecha_oc=?";
         $params[] = $fecha;
         $types .= "s";
      }
      /* CASO 8
      Si producto llegó es igual a 0, la oc actual está vacía pero la oc generada antes tiene datos, se elimina la fecha oc como null.
   */
      if ($actual === 0 && trim($oc_generada) === '' && trim($oc_generada_antes) !== '') {
         $set[] = "fecha_oc=NULL";
         $set[] = "fecha_solped_respaldo=NULL";
      }
   }
   /*CASO 9
   Si producto llegó es 0, la oc actual está vacía y la oc anterior tiene datos y numero solped actual está vacío y antes existía una solped entonces fechas son nulas.
*/
   if ($actual === 0 && trim($oc_generada) === '' && trim($oc_generada_antes) !== '' && trim($numero_solped) === '') {
      $set[] = "fecha_oc=NULL";
      $set[] = "fecha_solped=NULL";
      $set[] = "fecha_solped_respaldo=NULL";
   }
   /*CASO 10
   Si producto llegó es igual a 0, no hay solped actual y solped anterior tampoco existe pero hay oc entonces fecha solped toma el valor de fecha oc.
   Ocurre cuando agregan oc sin haber puesto antes solped
*/
   if ($actual === 0 && trim($numero_solped) === '' && trim($numero_solped_antes) === '' && trim($oc_generada) !== '') {
      $set[] = "fecha_solped=fecha_oc";
   }
}

// ## ESTATUS DEL PEDIDO ##
if ($premio_status != "Entregado") {

   if (trim($solped ?? '') === '') {
      $premio_status = "Pte. Solped";
   } elseif (trim($oc ?? '') === '') {
      $premio_status = "Pte. Entrega";
   } elseif ($llego === 0) {
      $premio_status = "Pte. Llegada";
   } else {
      $premio_status = "Pte. Repartir";
   }
}


$set[] = "status=?";
$params[] = $premio_status;
$types .= "s";

// ## ARMADO DE LA CONSULTA ##

// WHERE
$params[] = $id_seguimiento;
$types .= "i";

$sql = "UPDATE canjer_premios_colaborador_sugerencias SET " . implode(", ", $set) . " WHERE id=?";

$stmt = $conexion->prepare($sql);
$stmt->bind_param($types, ...$params);
$resultado = $stmt->execute();

$stmt->close();
echo json_encode($resultado);
?>