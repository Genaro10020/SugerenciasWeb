<?php
session_start();
if ($_SESSION["usuario"]){
$_SESSION['usuario']; 
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
     <script src="https://unpkg.com/vue@next"></script>
    <!--Axios--> 
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!--Titulo fuente-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet"> 
    <!--Subtitulos-->
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Goldman&family=Koulen&display=swap" rel="stylesheet"> 
    <!--Incluyendo Estilo-->
    <link rel="stylesheet" type="text/css"  href="estilos/miestilo.css">
    <!--Iconos boostrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>Sugerencias</title>
</head>
<body>
<style>
                .titulo{
                        font-family: 'Luckiest Guy', cursive;
                        color: white; 
                        text-shadow: 0px 0px 2px black;
                        -webkit-text-stroke: 1px black;
                    }

               .div_susperior{
                background: rgb(255,255,255);
                background: linear-gradient(140deg, rgba(255,255,255,1) 24%, rgba(181,0,0,1) 24%, rgba(181,0,0,1) 76%, rgba(255,255,255,1) 76%); 
               }

               footer{
                background: rgb(181,0,0);
                background: linear-gradient(180deg, rgba(181,0,0,1) 12%, rgba(237,193,193,1) 100%); 
               }

                input[type]:focus, button[type]:focus {
                border-color: #7b0808;
                box-shadow: 0 0px 0px rgba(0, 133, 180, 1)inset, 0 0 4px rgba( 187, 16, 16, 1);
                outline: 0 none;
                }

              
    </style>
    <div id="app" class="container-fluid  " >
                <!--BARRA SUPERIOR-->
            <div class="div_susperior d-flex justify-content-around align-items-center" style="height:10vh">
                <div class=""><img class="img-fluid" src="img/logo_gonher.png"></img></div>
                <div class=" titulo fs-2 lh-1 text-center">SISTEMA DE SUGERENCIAS DE MEJORA CONTINUA</div>
                <div class=""><img class="img-fluid" src="img/logo_mejora_continua.png"></img></div>
            </div>
             <!--BARRA MENÚ-->
            <div class="row" style="height:4vh">
                <div class="d-flex justify-content-center text-white align-items-center" >
               
                            <button class="opciones mx-lg-2 rounded-3 " @click="mostrar('principalMejora')"  v-bind:class="{pintarUno}" >
                                Principal Mejora
                            </button>  
                            <button class="opciones  mx-lg-2 rounded-3" @click="mostrar('concentrado')" v-bind:class="{pintarDos}">
                                Concentrado de sugerencias
                            </button>  
                            <button class="opciones  mx-lg-2  rounded-3" @click="mostrar('premios')" v-bind:class="{pintarTres}">
                                Administración de Premios
                            </button>
                            <button class="opciones  mx-lg-2  rounded-3" @click="mostrar('retos')" v-bind:class="{pintarCuatro}">
                                Administración de Retos
                            </button>
                            <button class="opciones   mx-lg-2 rounded-3" @click="mostrar('configuracion')" v-bind:class="{pintarCinco}">
                                Configuración
                            </button>
             
                </div>
            </div>
                 <!--CUERPO-->
            <div class="row" style="height:76vh">
            <!--////////////////////////////////////////////////////////-->
                   <div v-if="ventana=='principalMejora'">
                            <!--cinta apartado-->
                            <div class="row justify-content-center align-items-start ">
                                    <div class="cintilla col-12 text-center">
                                    <b> PRINCIPAL MEJORA </b>
                                    </div>
                            </div>
                            <!--fin cinta apartado-->
                            <!-- contenido principal gonher-->
                            
                             <!--fin contenido principal gonher-->
                   </div>
                   <!--////////////////////////////////////////////////////////-->
                   <div v-else-if="ventana=='concentrado'">
                       <!--cinta apartado-->
                            <div class="row justify-content-center align-items-start ">
                                <div class="cintilla col-12 text-center">
                                   <b> CONCENTRADO DE SUGERENCIAS </b>
                                </div>
                            </div>
                        <!--fin cinta apartado-->
                            <!-- contenido principal gonher-->
                            <div class="row m-lg-5">
                                <div class="col-12 text-center">
                                    <button class="boton-nuevo"><i class="bi bi-plus-circle"></i> Nueva Sugerencia</button>
                                </div>
                                <div class="div-scroll">
                                    <table class="table tablaConcentrado table-striped">
                                        <thead>
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Editar/Guardar</th>
                                            <th scope="col">%Cumplimiento</th>
                                            <th scope="col">Nombre sugerencias</th>
                                            <th scope="col">Folio</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Causa de No factividad</th>
                                            <th scope="col">Situación Actual</th>
                                            <th scope="col">Idea Propuesta</th>
                                            <th scope="col">No. de Nomina</th>
                                            <th scope="col">Colaborador</th> 
                                            <th scope="col">Puesto</th>
                                            <th scope="col">Planta</th>
                                            <th scope="col">Área</th>
                                            <th scope="col">Área del Participante</th>
                                            <th scope="col">Subárea</th>
                                            <th scope="col">Impacto Primario</th>
                                            <th scope="col">Impacto Secuandario</th>
                                            <th scope="col">Tipo de Desperdicio</th>
                                            <th scope="col">Objetivos de Calidad M.A.</th>
                                            <th scope="col">Fecha de Sugerencia</th>
                                            <th scope="col">Fecha de Inicio</th>
                                            <th scope="col">Fecha Compromiso</th>
                                            <th scope="col">Fecha real de cierre</th>
                                            <th scope="col">Analista de factibilidad</th>
                                            <th scope="col">Impacto Planeado</th>
                                            <th scope="col">Impacto Real (Cuantitativo)</th>
                                            <th scope="col">Creado por</th>
                                            <th scope="col">Creado</th>
                                            <th scope="col">Modificado por</th>
                                            <th scope="col">Modificado</th>
                                            <th scope="col">Eliminar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="align-middle">
                                                <th scope="row">0</th>
                                                <td><button type="button" class="btn btn-success" title="Guardar"><i class="bi bi-check-circle"></i></button></td>
                                                <td></input><label>0%</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="Nombre Sugerencia" name="nombre_sugerencia" ></input><label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="Folio" name="folio" ></input><label style="display:none;">Otto</label></td>
                                                <td><label >En Factibilidad</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="causa de no factibilidad" name="causa_no_factibilidad" ></input><label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="situacion actul" name="situacion_actual" ></input><label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="idea propuesta" name="idea_propuesta" ></input><label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="nomina" name="nomina" ></input><label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="colaborador" name="colaborador" ></input><label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="puesto" name="puesto" ></input><label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="planta" name="planta" ></input><label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="area" name="area" ></input><label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="area del participante" name="area_participante" ></input><label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="subárea" name="subarea" ></input><label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="impacto primario" name="impacto_primario" ></input><label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="impacto secundario" name="impacto_recundario" ></input><label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="tipo de desperdicio" name="tipo_de_desperdicio" ></input><label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="objetivo de calidad M.A." name="objetivo_de_calidadMA" ></input><label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="fecha de sugerencias" name="fecha_de_sugerencias" ></input><label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="fecha de inicio" name="fecha_de_inicio" ></input><label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="fecha compromiso" name="fecha_compromiso" ></input><label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="fecha real de cierre" name="fecha_real_de_cierre" ></input><label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="analista de factibilidad" name="analista_de_factibilidad" ></input><label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="impacto planeado" name="impacto planeado" ></input><label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="impacto real" name="impacto_real" ></input><label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="creado por" name="creado_por" ></input><label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="creado" name="creado_fecha" ></input><label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="modificado por" name="modificado_por" ></input><label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="modificado fecha" name="modificado_fecha" ></input><label style="display:none;">Otto</label></td>
                                                <td><button type="button" class="btn btn-danger" title="Eliminar"><i class="bi bi-trash"></button></i></td>
                                            </tr>
                                            <tr class="align-middle">
                                                <th scope="row">1</th>
                                                <td><button type="button" class="btn btn-warning" title="Actualizar"><i class="bi bi-pen"></i></button></td>
                                                <td><input class="inputs-concentrado" type="text" value="% porcentaje" name="porcentaje" disabled></input><label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="Nombre Sugerencia" name="nombre_sugerencia" ></input><label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="Folio" name="folio" ></input><label style="display:none;">Otto</label></td>
                                                <td>
                                                    <select class="inputs-concentrado">
                                                        <option v-for="status in lista_status" :key="status" :value="status">{{status}}</option>
                                                    </select>
                                                <label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="causa de no factibilidad" name="causa_no_factibilidad" ></input><label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="situacion actul" name="situacion_actual" ></input><label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="idea propuesta" name="idea_propuesta" ></input><label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="nomina" name="nomina" ></input><label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="colaborador" name="colaborador" ></input><label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="puesto" name="puesto" ></input><label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="planta" name="planta" ></input><label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="area" name="area" ></input><label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="area del participante" name="area_participante" ></input><label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="subárea" name="subarea" ></input><label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="impacto primario" name="impacto_primario" ></input><label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="impacto secundario" name="impacto_recundario" ></input><label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="tipo de desperdicio" name="tipo_de_desperdicio" ></input><label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="objetivo de calidad M.A." name="objetivo_de_calidadMA" ></input><label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="fecha de sugerencias" name="fecha_de_sugerencias" ></input><label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="fecha de inicio" name="fecha_de_inicio" ></input><label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="fecha compromiso" name="fecha_compromiso" ></input><label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="fecha real de cierre" name="fecha_real_de_cierre" ></input><label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="analista de factibilidad" name="analista_de_factibilidad" ></input><label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="impacto planeado" name="impacto planeado" ></input><label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="impacto real" name="impacto_real" ></input><label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="creado por" name="creado_por" ></input><label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="creado" name="creado_fecha" ></input><label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="modificado por" name="modificado_por" ></input><label style="display:none;">Otto</label></td>
                                                <td><input class="inputs-concentrado" type="text" value="modificado fecha" name="modificado_fecha" ></input><label style="display:none;">Otto</label></td>
                                                <td><button type="button" class="btn btn-danger" title="Eliminar"><i class="bi bi-trash"></button></i></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                             <!--fin contenido principal gonher-->
                   </div>
                  <!--////////////////////////////////////////////////////////-->
                   <div v-else-if="ventana=='premios'">
                            <!--cinta apartado-->
                            <div class="row justify-content-center align-items-start ">
                                <div class="cintilla col-12 text-center">
                                   <b> ADMINISTRACIÓN DE PREMIOS </b>
                                </div>
                            </div>
                             <!--fin cinta apartado-->
                            <!-- contenido principal gonher-->
                            
                             <!--fin contenido principal gonher-->
                   </div>
                   <div v-else-if="ventana=='retos'">
                            <div class="row justify-content-center align-items-start ">
                                <div class="cintilla col-12 text-center">
                                   <b> ADMINISTRACIÓN DE RETOS </b>
                                </div>
                            </div>
                   </div>
                   <div v-else-if="ventana=='configuracion'">
                        <div class="row justify-content-center align-items-start ">
                                <div class="cintilla col-12 text-center">
                                   <b> CONFIGURACIÓN</b>
                                </div>
                            </div>
                   </div>
                           
              
            </div>
                <!--FOOTER-->
            <div class="row" style="height:10vh; background: url(img/pie.jpg); background-repeat: repeat-x; background-size: 8% 100%;">
           
            </div>
        
    </div>

<script>
    const vue3 = 
    {
        data(){
            return {
                username: '',
                prueba: '',
                ventana: 'principalMejora',  
                pintarUno:true,
                pintarDos:false,
                pintarTres:false,
                pintarCuatro:false,
                pintarCinco: false,
                lista_status: [],

            }
        },
        mounted(){
           axios.post('lista_status.php',{

            }).then(response =>{
               
                this.lista_status = response.data
                console.log(this.lista_status);
            })

        },
        methods:{
                mostrar(dato){
                   this.ventana=dato;
                   if(dato=='principalMejora'){ this.pintarUno=true}else{this.pintarUno=false}
                   if(dato=='concentrado'){this.pintarDos=true}else{this.pintarDos=false}
                   if(dato=='premios'){ this.pintarTres=true}else{this.pintarTres=false}
                   if(dato=='retos'){this.pintarCuatro=true}else{this.pintarCuatro=false}
                   if(dato=='configuracion'){this.pintarCinco=true}else{this.pintarCinco=false}
                   
             }
        }
    }
    var mountedApp = Vue.createApp(vue3).mount('#app');
</script>

</body>
</html>  
<?php
}else{
    header("Location: index.php");
}
?>