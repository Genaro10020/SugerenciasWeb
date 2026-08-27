<?php
session_start();
if ($_SESSION["usuario"] && $_SESSION["tipo"]=="Colaborador"){ 
    ?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!--Bootstrap 5 css-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--Bootstrap 5 js-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!--Bootstrap Separadors-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
     <!--VUE 3-->
     <script src="https://unpkg.com/vue@3.2.36/dist/vue.global.js"></script>
    <!--Axios--> 
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
     <!--Titulo fuente-->
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet"> 
    <!--Subtitulos-->
    <link href="https://fonts.googleapis.com/css2?family=Stint+Ultra+Condensed&display=swap" rel="stylesheet" rel="stylesheet"> 
    <!--Contenido-->
    <link href="https://fonts.googleapis.com/css2?family=Andika&display=swap" rel="stylesheet"> 
    <!--Incluyendo Estilo-->
    <link rel="stylesheet" type="text/css"  href="estilos/miestilo.css">
    <!--Iconos boostrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>Sugerencias</title>
</head>
<body>
  <style>
    /*  #app {
            font-family: 'Andika', sans-serif;
        }*/
    .titulo {
      color: white;
      font-family: 'Fjalla One', sans-serif;
    }

    .subtitulo {
      font-family: 'Stint Ultra Condensed', cursive;
    }

    .btn_principal_colaborador {
      border-radius: 100px;
      height: 50px;
      width: 50px;
      box-shadow: 0px 0px 2px black;
      background-color: rgb(158, 0, 0);
    }

    .btn_principal_colaborador:hover {
      border-radius: 100px;
      height: 50px;
      width: 50px;
      box-shadow: 0px 0px 10px rgb(0, 0, 0);
      background-color: rgb(35, 54, 226);
    }

    .div_superior {
      background: rgb(255, 255, 255);
      background: linear-gradient(140deg, rgba(255, 255, 255, 1) 24%, rgba(181, 0, 0, 1) 24%, rgba(181, 0, 0, 1) 76%, rgba(255, 255, 255, 1) 76%);
    }

    /* Corrección de selector: textarea no lleva [type] */
    textarea:focus,
    input[type]:focus,
    button[type]:focus {
      border: 2px solid;
      border-color: rgb(137, 0, 0);
      outline: 0 none;
    }

    .order-card {
      cursor: pointer;
      transition: 0.2s;
    }

    .order-card:hover {
      transform: translateY(-2px);
      box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15);
    }

    .icon-box {
      width: 48px;
      height: 48px;
      background: #B50000;
    }

    /* COLORES DE LOS ESTATUS */
    .bg-vino{
      background-color:#9E0000 !important;
      color:white;
    }
  </style>

  <div id="app" class="container-fluid"><!--BODY-->
    <!--BARRA SUPERIOR-->
    <div class="row d-flex justify-content-around align-items-center"
      style="height:10vh; background-color: rgba(181,0,0,1); box-shadow: 0px 0px 12px -2px black;">
      <div class="row align-items-center bg-white w-100">
        <div class="col-2 d-flex align-items-center rounded-end" style="height:45.8833px;">
          <img class="img-fluid" src="img/logo_gonher.png" alt="Logo Gonher">
        </div>
        <div class="col-8 d-flex align-items-center justify-content-center">
          <div>
            <div class="titulo lh-1 mt-3 text-dark fs-2 fw-bold text-center">Estatus Premios</div>
            <div class="subtitulo fs-5 lh-1 text-center mt-1 text-secondary mb-3">
              <?php echo $_SESSION['nombre']; ?>
            </div>
          </div>
        </div>
        <div class="col-2 d-flex align-items-center rounded-start" style="height:45.8833px">
          <img class="img-fluid ms-2" style="max-height:80px" src="img/logo_opex.jpg" alt="Logo Opex">
        </div>
      </div>
    </div>

    <!--CUERPO-->
    <div class="row cuerpo" style="min-height:80vh; font-size: 0.9em">
      <div class="col-12">
        <div style="max-height: 75vh; overflow-y: auto;"><!--scroll-->
          <div class="container py-4 rounded mt-1">
            <div class="subtitulo fs-2 text-secondary lh-1 mt-1 mb-2 text-left subtitle">
                Historial de pedidos
            </div>

            <!-- CARDS AUTOMÁTICAS PARA LOS PEDIDOS -->
            <div v-for="entregar in concentrado_premios_entregar" :key="entregar.id"
              class="mb-2 mb-md-3 mt-2 mt-md-4">

              <!-- CARD PRINCIPAL -->
              <div class="card-ctner card shadow-sm border-0 order-card" @click="toggleTracking(entregar.id)"
                style="cursor:pointer;">
                <div class="card-body d-flex align-items-center justify-content-between gap-2 p-2 p-md-3">
                  <div class="d-flex align-items-center gap-2">

                    <!-- IMAGEN -->
                    <div style="width:65px; height:65px;">
                      <img class="img-thumbnail min-w-25" style="width: 65px" :src="entregar.img_url" />
                    </div>
                    

                    <div class="flex-grow-1">
                      <h5 class="mb-1">{{ entregar.descripcion }}</h5>
                      <small class="text-muted d-block mb-1 small">
                        {{formatodeFecha(ObtenerFechaStatus(entregar))}} • <span class="fw-bold">{{ entregar.cantidad }} Producto/s </span>
                      </small>
                      <div class="d-flex align-items-center gap-2 flex-wrap">
                        <!-- Estatus de premio -->
                        <span class="badge" :class="getColorBtn(entregar)">{{ TitulosdeEstados(entregar) }}</span>
                        <span class="text-danger small">
                          {{entregar.Total_puntos_Gastados}} puntos canjeados
                        </span>
                      </div>
                    </div>
                  </div>

                  <!-- FLECHA -->
                  <div class="card-order">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none"
                      stroke="#79747E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="lucide lucide-chevron-right">
                      <path d="m9 18 6-6-6-6" />
                    </svg>
                  </div>
                </div>
              </div>

                            <!-- CARD BOTÓN -->
                  <div v-if="trackingVisible === entregar.id" class="card-ctner card shadow-sm border-0 order-card rounded-top-0 mt-0">

                    <div class="d-flex justify-content-center bg-white p-2">

                        <button
                        class="btn text-white tracking-btn"
                        style="background-color:#AB3467;"
                        @click="DetallePedido(entregar.id)">

                        Ver seguimiento

                        </button>

                    </div>
                </div>
            </div>

          </div> <!-- FIN CONTAINER INFO -->
        </div><!--FIN SCROLL-->

        <div v-show="mostrar" class="alert alert-warning mt-3" role="alert">
          <b class="alert-link">{{mensaje}}</b>
        </div>
      </div>

      <div class="col-12 d-flex align-items-end justify-content-center">
        <div id="opciones" style="width: 18rem;" class="d-flex align-items-center justify-content-center my-2">
          <div class="row text-center mb-2 d-flex justify-content-center align-items-center">
            <div @click="redireccionar('Atras')"
              class="btn_principal_colaborador text-center col-12 d-flex align-items-center justify-content-center"
              style="cursor: pointer">
              <div><img src="img/app_atras.png" class="img-fluid" alt="Atrás" style="width: 50px;"></div>
            </div>
          </div>
        </div>
      </div>
    </div><!--FIN CUERPO-->

    <!--FOOTER-->
    <div class="row" style="height:10vh; background-color: rgba(181,0,0,1); box-shadow: 0px 0px 12px -2px black;"></div>
    <!--FIN FOOTER-->
  </div> <!--FIN DIV CONTENEDOR-->
</body>

<script>

    const vue3 = {
      data(){
          return {
              trackingVisible: null,
              mostrar:false,
              mensaje:'',
              concentrado_premios_entregar:[], 
              numero_nomina:<?php echo $_SESSION['usuario']; ?>,

              EstatusPedidos: [
                {
                  statusBd: "Pte. Solped",
                  title: "Solicitado",
                  fechaStatus: "fecha"
                },
                {
                  statusBd: "Pte. Entrega",
                  title: "En Preparación",
                  fechaStatus: "fecha_solped"
                },
                {
                  statusBd: "Pte. Llegada",
                  title: "En Reparto",
                  fechaStatus: "fecha_oc"
                },
                {
                  statusBd: "Pte. Repartir",
                  title: "Listo Para Recoger",
                  fechaStatus: "fecha_llegada"
                },
                {
                  statusBd: "Entregado",
                  title: "Entregado",
                  fechaStatus: "fecha_entrega"
                }

              ]
          }
      },
      mounted() {
        this.consultar_concentrado_premios(this.numero_nomina)
      },
      methods:{
          redireccionar(opciones){
              if(opciones=='Atras'){
                  window.location.href="principalColaborador.php"
              }
          },
          DetallePedido(id) {
            window.location.href = "DetalleSeguimientoPremio.php?id=" + id;
          },
          consultar_concentrado_premios(numero_nomina){
            axios.post("consultar_status_premios.php",{
                numero_nomina,
            }).then(response =>{
                this.concentrado_premios_entregar=response.data
                if(this.concentrado_premios_entregar.length>0){
                    
                }else{
                  this.mostrar=true;
                  this.mensaje= "0 Artículos pendientes."
                  setTimeout(()=>{
                    this.mostrar=false;
                  },3000);
                }
            }).catch(error =>{
              console.log(error)
            })
          },
          toggleTracking(id) {
            this.trackingVisible = this.trackingVisible === id ? null : id;
          },
          TitulosdeEstados(entregar) {

              const status = this.calcularStatusUsuario(entregar);

              const statusPedido = this.EstatusPedidos.find(
                  s => s.statusBd === status
              );

              return statusPedido ? statusPedido.title : status;
          },
          getColorBtn(entregar) {

              const status = this.calcularStatusUsuario(entregar);

              switch(status) {
                  case 'Pte. Solped':
                      return 'bg-secondary';

                  case 'Pte. Entrega':
                      return 'bg-warning';

                  case 'Pte. Llegada':
                      return 'bg-primary';

                  case 'Pte. Repartir':
                      return 'bg-success';

                  default:
                      return 'bg-vino';
              }
          },
          formatodeFecha(fecha) {
            if (!fecha) return '';

            // 1. IMPORTANTE: Reemplazar guiones por diagonales ANTES de cualquier validación.
            // Esto evita que el navegador aplique desfases horarios (Timezone offset).
            let fixed = fecha.replace(/-/g, '/');

            // 2. Si por alguna razón la BD solo mandó la fecha (10 caracteres: YYYY/MM/DD)
            if (fixed.length === 10) {
              fixed += ' 00:00';
            }

            // 3. Crear el objeto Date con el string normalizado
            const date = new Date(fixed);

            // Validar si la fecha es correcta
            if (isNaN(date.getTime())) return '';

            const meses = [
              'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
              'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
            ];

            // 4. Extraer componentes (esto usará la hora que ya viene en el string)
            const dia = String(date.getDate()).padStart(2, '0');
            const mes = meses[date.getMonth()];
            const anio = date.getFullYear();
            const hora = String(date.getHours()).padStart(2, '0');
            const minutos = String(date.getMinutes()).padStart(2, '0');

            return `${dia} ${mes} ${anio} ${hora}:${minutos}`;
          },
          ObtenerFechaStatus(entregar) {

              const statusCalculado = this.calcularStatusUsuario(entregar);

              const statusPedido = this.EstatusPedidos.find(
                  s => s.statusBd === statusCalculado
              );

              if (!statusPedido) return '';

              if (statusCalculado === 'Pte. Entrega') {

                  if (
                      entregar.oc_generada &&
                      entregar.fecha_solped_respaldo
                  ) {
                      return entregar.fecha_solped_respaldo;
                  }

                  return entregar.fecha_solped || '';
              }

              return entregar[statusPedido.fechaStatus] || '';
          },
          calcularStatusUsuario(pedido) {
              if(pedido.fecha_entrega) return "Entregado";
              if (pedido.producto_llego == 1) return "Pte. Repartir";
              if (pedido.fecha_llegada) return "Pte. Llegada";
              if (pedido.oc_generada) return "Pte. Llegada";
              if (pedido.solped) return "Pte. Entrega";
              return "Pte. Solped";
          },
      }
  }
    var mountedApp = Vue.createApp(vue3).mount('#app');
    
</script>
</html>        
    <?php
}else{
    header("Location: index.php");
}
?>