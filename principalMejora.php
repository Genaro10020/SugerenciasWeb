<?php
session_start();
if ($_SESSION["usuario"] && $_SESSION["tipo"]=="Admin"){ 
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

    <!---->
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
                    /*text-shadow: 0px 0px 2px black;*/
                    /* -webkit-text-stroke: 1px black;*/
                }

               .div_susperior{
                background: rgb(255,255,255);
                background: linear-gradient(140deg, rgba(255,255,255,1) 24%, rgba(181,0,0,1) 24%, rgba(181,0,0,1) 76%, rgba(255,255,255,1) 76%); 
               }

               footer{
                background: rgb(181,0,0);
                background: linear-gradient(180deg, rgba(181,0,0,1) 12%, rgba(237,193,193,1) 100%); 
               }

                textarea[type]:focus,input[type]:focus, button[type]:focus {
                border: 2px solid;    
                border-color: rgb(137, 0, 0);
                /*box-shadow: 0 0px 0px rgba(0, 133, 180, 1)inset, 0 0 4px rgba( 187, 16, 16, 1);*/
                outline: 0 none;
                }
                
    </style>
    <div id="app" class="container-fluid  " >
                <!--BARRA SUPERIOR-->
            <div class="div_susperior d-flex justify-content-around align-items-center" style="height:10vh">
                <div class=""><img class="img-fluid" src="img/logo_gonher.png"></img></div>
                <div class=" titulo fs-2 lh-1 text-center">SISTEMA DE SUGERENCIAS DE MEJORA</div>
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
                            <button class="opciones   mx-lg-2 rounded-3" @click="mostrar('solicitados')" v-bind:class="{pintarSeis}">
                                Premios Solicitados
                            </button>
                            <button class="opciones   mx-lg-2 rounded-3" @click="mostrar('colaboradores')" v-bind:class="{pintarSiete}">
                                Colaborador
                            </button>
                </div>
                
            </div>
            <div style=" font-size: 15px;"><b> <?php echo $_SESSION['nombre']; ?></b></div>
                 <!--CUERPO-->
            <div class="row cuerpo_principal" style="min-height:76vh" >
            <!--////////////////////////////////////////////////////////PRINCIPAL MEJORA-->
                   <div v-if="ventana=='principalMejora'" v-cloak>
                            <!--cinta apartado-->
                            <div class="row justify-content-center align-items-start ">
                                    <div class="cintilla col-12 text-center">
                                    <b> PRINCIPAL MEJORA </b>
                                    </div>
                            </div>
                            <!--fin cinta apartado-->
                            <!-- contenido principal gonher-->
                            <div class="text-center mt-3 "><span class="badge bg-light text-dark">Implementación y validación de impactos de sugerencias:</span></div>
                            <div class="div-scroll mt-3">
                                <table class="tablaMonitoreo-sugerencias table table-striped table-bordered ">
                                <thead class="encabezado-tabla text-center text-light ">
                                    <tr >
                                    <th scope="col " class="sticky">#</th>
                                    <th scope="col">Plan de Trabajo</th>
                                    <th scope="col">Folio</th>
                                    <th scope="col">Nombre de Sugerencia</th>
                                    <th scope="col">Fecha Compromiso</th>
                                    <th scope="col">% Avance</th>
                                    <th scope="col">Implementación</th>
                                    <th scope="col">Val. Impactos</th>
                                    <th scope="col">Impacto de sugerencias</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(concentrado, index) in concentrado_sugerencias">
                                    <th scope="row" class="text-center">{{index+1}}</th>
                                    <td>
                                        <button  v-show="concentrado.check_mc=='Pendiente' && concentrado.status!='Cerrada/Fast Response'  && concentrado.status!='Cerrada/No Factible'" class="btn btn-secondary" style="font-size:.9em" data-bs-toggle="modal" data-bs-target="#modalTablaPlan" @click="consultarActividades(concentrado.id,concentrado.status),datosSugerencia(concentrado.id)"><i class="bi bi-table" ></i> {{concentrado.check_mc}}</button>
                                        <button  v-show="concentrado.check_mc=='Rechazado' && concentrado.status!='Cerrada/Fast Response'  && concentrado.status!='Cerrada/No Factible'" class="btn btn-danger" style="font-size:.9em" data-bs-toggle="modal" data-bs-target="#modalTablaPlan" @click="consultarActividades(concentrado.id,concentrado.status),datosSugerencia(concentrado.id)"><i class="bi bi-table" ></i> {{concentrado.check_mc}}</button>
                                        <button  v-show="concentrado.check_mc=='Corregido' && concentrado.status!='Cerrada/Fast Response'  && concentrado.status!='Cerrada/No Factible'" class="btn btn-warning" style="font-size:.9em" data-bs-toggle="modal" data-bs-target="#modalTablaPlan" @click="consultarActividades(concentrado.id,concentrado.status),datosSugerencia(concentrado.id)"><i class="bi bi-table"  ></i> {{concentrado.check_mc}}</button>
                                        <button  v-show="concentrado.check_mc=='Aceptado' && concentrado.status!='Cerrada/Fast Response' && concentrado.status!='Cerrada/No Factible'" class="btn btn-success" style="font-size:.9em" data-bs-toggle="modal" data-bs-target="#modalTablaPlan" @click="consultarActividades(concentrado.id,concentrado.status),datosSugerencia(concentrado.id)"><i class="bi bi-table" ></i> {{concentrado.check_mc}}</button>
                                    </td>
                                        <td>{{concentrado.folio}}</td>
                                        <td>{{concentrado.nombre_sugerencia}}</td>
                                        <td>{{concentrado.fecha_compromiso}}</td>
                                        <td v-if="concentrado.cumplimiento==100" class="text-white bg-success"><b>{{concentrado.cumplimiento}}%</b></td>
                                        <td v-else-if="concentrado.cumplimiento==99" class="text-white bg-warning" ><b>{{concentrado.cumplimiento}}%</b></td>
                                        <td v-else><b>{{concentrado.cumplimiento}}%</b></td>
                                        <td>
                                            <!--<a v-if="concentrado.status=='Cerrada/Fast Response' || concentrado.status=='Cerrada/No Factible'" data-bs-toggle="modal" data-bs-target="#modalCambiaraEnFactibilidad" style="cursor: pointer; text-decoration: underline blue;" @click="datos_modal(concentrado.id)" ><p class="fw-bold text-primary">{{concentrado.status}}</p></a>
                                            <a v-else> {{concentrado.status}}</a>-->
                                            
                                                <div class="d-inline">
                                                        <a data-bs-toggle="modal" data-bs-target="#modalCambiaraEnFactibilidad" style="cursor: pointer; text-decoration: underline blue;" @click="datos_modal(concentrado.id)" class="fw-bold text-primary me-2">{{concentrado.status}}</a>
                                                </div>
                                                <div class="d-inline">
                                                        <button  v-show="concentrado.status=='Cerrada/Fast Response' || concentrado.status=='Cerrada/No Factible'" class="btn btn-success" style="font-size:.9em" 
                                                         @click="datos_modal_detalles(concentrado.id,concentrado.folio,concentrado.numero_nomina,concentrado.causa_no_factibilidad,concentrado.cumplimiento,concentrado.analista_de_factibilidad,concentrado.colaborador,concentrado.idea_propuesta,concentrado.situacion_actual)"><i class="bi bi-table" ></i> Detalles</button>
                                                </div>
                                          
                                        </td>
                                        <td> 
                                                <div class="d-flex justify-content-around">
                                                    <div>
                                                           <div v-if="concentrado.validacion_de_impacto =='Cuantitativo'"><!--BTN VERDE-->
                                                                <button v-show="concentrado.status=='Implementada'" type="button" class="btn btn-success" @click="datos_modal(concentrado.id, concentrado.folio,'Cuantitativo',concentrado.numero_nomina)" style=" font-size:.9em">Impacto Cuantitativo</button>
                                                                <!--<button v-show="concentrado.status=='Implementada'" type="button" class="btn btn-danger ms-2" @click="vaciarValidaciondeImpacto(concentrado.id,'Cuantitativo')" title="Limpiar impacto" style=" font-size:.9em">x</button>-->
                                                           </div>
                                                           <!--<div v-else>                                                          
                                                                <button v-show="concentrado.status=='Implementada'" type="button" class="btn btn-secondary" @click="datos_modal(concentrado.id, concentrado.folio,'Cuantitativo',concentrado.numero_nomina)" style=" font-size:.9em" >Impacto Cuantitativo</button>
                                                           </div>
                                                    </div>
                                                    <div>--> 
                                                            <div v-if="concentrado.validacion_de_impacto =='Cualitativo'"><!--BTN VERDE-->
                                                                <button v-show="concentrado.status=='Implementada'" type="button" class="btn btn-success" @click="datos_modal(concentrado.id, concentrado.folio,'Cualitativo',concentrado.numero_nomina)" style=" font-size:.9em" >Impacto Cualitativo</button>
                                                               <!-- <button v-show="concentrado.status=='Implementada'" type="button" class="btn btn-danger ms-2" @click="vaciarValidaciondeImpacto(concentrado.id,'Cualitativo')" title="Limpiar impacto" style=" font-size:.9em">x</button>-->
                                                            </div>
                                                           <!-- <div v-else>
                                                                <button v-show="concentrado.status=='Implementada'" type="button" class="btn btn-secondary" @click="datos_modal(concentrado.id, concentrado.folio,'Cualitativo',concentrado.numero_nomina)" style=" font-size:.9em" >Impacto Cualitativo</button>
                                                            </div> BTN GRIS -->
                                                    </div>
                                                 </div>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalImpactoSugerencia" @click="modalImpacto"><i class="bi bi-table"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>

                      <div class="modal fade" id="modalTablaPlan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"><!--modal tabla actividades-->
                                <div class="modal-dialog modal-xl modal-dialog-centered">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tabla de actividades</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row" style="font-size:0.7em;">
                                                <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-center" ><div><b>Situación Actual:</b></div></div>
                                                <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-center"><div>{{datos_sugerencia.situacion_actual}}</div></div>
                                                <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-center" ><div><b>Idea Propuesta:</b></div></div>
                                                <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-center"><div>{{datos_sugerencia.idea_propuesta}}</div></div>
                                                <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-center" ><div><b>Impacto Primario:</b></div></div>
                                                <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-center"><div>{{datos_sugerencia.impacto_primario}}</div></div>
                                                <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-center"><div><b>Impacto Secundario:</b></div></div>
                                                <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-center"><div>{{datos_sugerencia.impacto_secundario}}</div></div>
                                                <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-center" ><div><b>Tipo de Desperdicio:</b></div></div>
                                                <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-center"><div>{{datos_sugerencia.tipo_de_desperdicio}}</div></div>
                                                <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-center"><div><b>Objetivos de Calidad y M.A.</b></div></div>
                                                <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-center"><div>{{datos_sugerencia.objetivo_de_calidad_ma}}</div></div>
                                          
                                        </div>
                                                        <div class="div-scroll"><!--Scroll-->
                                                                <table class="tablaMonitoreo-sugerencias table table-striped table-bordered text-center" style=" font-size: 12px">
                                                                    <thead class="encabezado-tabla text-center text-light ">
                                                                        <tr>
                                                                        <th scope="col">No. Actividad</th>
                                                                        <th scope="col">Descripción Actividad</th>
                                                                        <th scope="col">Responsable</th>
                                                                        <th scope="col">Fecha de Inicio</th>
                                                                        <th scope="col">Fecha de Cierre</th>
                                                                        <th scope="col">% Porcentaje</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                                <!--Consulta actividades-->
                                                                        <tr class="align-middle" v-for="(actividades,index) in concentrado_actividades">
                                                                            <th scope="row">
                                                                                <label>{{numero_orden_en_select=index+1}}</label>
                                                                            </th>
                                                                            <td>    
                                                                                <label>{{actividades.actividad}}<label></td>
                                                                            <td>
                                                                                <label>{{actividades.responsable}}<label>
                                                                            </td>
                                                                            <td><label>{{actividades.fecha_inicial}}<label></td>
                                                                            <td><label>{{actividades.fecha_final}}<label></td>
                                                                            <td>
                                                                                <div v-show="actividades.porcentaje != 100">
                                                                                    <b>Dias restantes: {{actividades.dias_restantes_actividad}}</b>
                                                                                </div>
                                                                                <div v-show ="actividades.dias_restantes_actividad > 7 && actividades.porcentaje !=100" class="bg-warning"><!--En curso-->
                                                                                    <label>{{actividades.porcentaje}}%<label>
                                                                                </div>
                                                                                <div v-show ="actividades.dias_restantes_actividad > 0 && actividades.dias_restantes_actividad <= 7 && actividades.porcentaje !=100"  style="background-color: #fd7e14;"><!--Menor Igual a 7-->
                                                                                    <label>{{actividades.porcentaje}}%<label>
                                                                                </div>
                                                                                <div v-show ="actividades.porcentaje == 100" class="bg-success"><!--100% Completadas-->
                                                                                    <label>{{actividades.porcentaje}}%<label>
                                                                                </div>
                                                                                <div v-show ="actividades.dias_restantes_actividad <= 0 && actividades.porcentaje !=100" class="bg-danger"><!--Vencida-->
                                                                                    <label>{{actividades.porcentaje}}%<label>
                                                                                </div>
                                                                              
                                                                            </td>
                                                                        </tr><!--Fin consuta actividades-->    
                                                                    </tbody>
                                                                </table>
                                                         </div><!--scroll-->
                                                <div class="d-flex justify-content-around">
                                                    <div>
                                                            <button v-show ="status!='Implementada'" type="button" class="btn btn-success" @click="actualizarVoBoPlan('Aceptado')" data-bs-dismiss="modal">Aceptado</button>
                                                    </div>
                                                    <div>
                                                            <button v-show ="status!='Implementada'" type="button" class="btn btn-danger" @click="actualizarVoBoPlan('Rechazado')" data-bs-dismiss="modal">Rechazado</button>
                                                     </div>
                                                 </div>
                                      
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    </div>
                                    </div>
                                </div>
                       </div><!--Fin Modal tabla actividades-->

                       <div class="modal fade" id="modalCambiaraEnFactibilidad" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"><!--modal cambiar a enfactibilida-->
                                <div class="modal-dialog modal-sm modal-dialog-centered">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Cambiar STATUS.</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        
                                             <div class="d-flex justify-content-center">
                                                            <button type="button" class="btn btn-success" @click="cambiaraEnFactibilidad" data-bs-dismiss="modal" style="font-size:.9em; font-weight:bold">cambiar a <b>"En Factibilidad"</b></button>
                                             </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    </div>
                                    </div>
                                </div>
                       </div><!--Fin Modal cambiar a en factibilidad-->


                       <div class="modal fade" id="modalDetallesNofactible" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"><!--modal no factible detalles-->
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Detalles NO FACTIBLE.</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">


                                                                <div class=" mt-3 text-center ">
                                                                                    <div class="row text-start" style=" font-size:0.8em;">
                                                                                      
                                                                                                    <div class="col-12 col-sm-3  mb-2 "><b>Analista:</b></div>
                                                                                                    <div class="col-12 col-sm-9  mb-2">{{nombre_analista}}</div>
                                                                                                    <div class="col-12 col-sm-3  mb-2"><b>Nombre Colaborador:</b></div>
                                                                                                    <div class="col-12 col-sm-9  mb-2">{{nombre_colaborador}}</div>
                                                                                                    <div class="col-12 col-sm-3  mb-2"><b>Situación Actual:</b></div>
                                                                                                    <div class="col-12 col-sm-9  mb-2">{{situacion_actual}}</div>
                                                                                                    <div class="col-12 col-sm-3  mb-2"><b>Idea Propuesta:</b></div>
                                                                                                    <div class="col-12 col-sm-9  mb-2">{{idea_propuesta}}</div>
                                                                                              
                                                                                    </div> 
                                                                      
                                                                                <span class="badge bg-light text-dark mb-1 mt-3">CAUSA DE NO FACTIBILIDAD</span>
                                                                                <div class="col-12 text-center bg-warning">
                                                                                    <textarea class="text-area-causa-no-factibilidad my-2" type="text"  style=" font-size:0.9em" disabled>{{causa}}</textarea>
                                                                                </div>
                                                                </div>
                                                                <div class="text-center">
                                                                   <!-- <span class="badge bg-light text-dark">TIPO DE CIERRE</span><br>
                                                                            
                                                                                        <select class="" v-model="var_tipo_de_cierre" required>
                                                                                                <option value="" disabled>Seleccione una opción..</option>
                                                                                                <option  v-for=" lista in tipo_de_cierre" :key="lista.id" >{{lista}}</option>
                                                                                        </select>-->
                                                                                  
                                                                </div>
                                                                <hr>
                                                                <div class=" mt-3 ">
                                                                            <!-- Mostrando los archivos cargados -->
                                                                       <div v-show="fileopcional.length>0">
                                                                                <div class="col-12 text-center mb-5" v-for= "(ruta_documento,index) in fileopcional">
                                                                                        <div class="col-12 text-center">
                                                                                        Descargar {{nombre_de_descarga=ruta_documento.slice((ruta_documento.lastIndexOf('/') - 1) + 2)}}<br><!--obtengo el nombre del documento con extension-->
                                                                                            <a :href="ruta_documento" :download="nombre_de_descarga">
                                                                                                <img src="img/descargar_archivo.png" style="width:100px; height:100px;"></img>
                                                                                            </a>
                                                                                        </div>
                                                                                        <!--<div class="col-12 ">
                                                                                            <button type="button" class="btn btn-danger" @click="eliminarDocumento(ruta_documento)" >Eliminar</button>
                                                                                        </div>-->
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                <div class="d-flex justify-content-center align-items-center">
                                                                         <div v-if="vistobueno==false" class="col-6 col-sm-3 text-center">  
                                                                                    <button class="btn btn-success" type="submit" style=" font-size:1em" @click="guardarPuntosnofactible()">Guardar Puntos.</button>
                                                                         </div>
                                                                         <div class="col-6 col-sm-3 text-center">  
                                                                                    <input type="number" min="0" class="form-control" v-model="puntos_no_factible" :disabled="vistobueno"></input>
                                                                         </div>
                                                                </div>
                                    </div>
                                    <div class="modal-footer">
                                                <div class="col-12 text-center">
                                                <input type="checkbox" id="checkbox" v-model="vistobueno"  @change="checknoFactibilidad()" />
                                                    <label for="checkbox" class="ms-2 text-primary">Aceptar la no factibilidad</label>
                                                </div>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    </div>
                                    </div>
                                </div>
                       </div><!--Fin Modal no factible detalles-->


                       <div class="modal fade" id="modalImpactoCuantitativo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"><!--modal impacto cuantitativo-->
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel" style="font-size:.9em;">Formulario <b>(Impacto Cuantitativo).</b></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row" v-for="concentrado in concentrado_sugerencias" >
                                                  <div v-show="concentrado.id==id_concentrado" style=" font-size:.8em;">
                                                                    <div class="row mb-2">
                                                                        <span class="badge bg-secondary text-light"> Validación de Implementación de Sugerencia FOLIO: {{folio}}</span>
                                                                    </div>
                                                                    <div class="row">
                                                                            <div class="col-12 col-sm-6">
                                                                                        <div>
                                                                                                <label><b>Impacto Primario: </b> {{concentrado.impacto_primario}}</label><br>
                                                                                                <label><b>Impacto Secundario: </b> {{concentrado.impacto_secundario}}</label><br>
                                                                                                <label><b>Tipo de Desperdicio:</b> {{concentrado.tipo_de_desperdicio}}</label><br>
                                                                                                <label><b>Objetivos de Calidad y M.A:</b> {{concentrado.objetivo_de_calidad_ma}}</label><br>
                                                                                        </div>
                                                                            </div>
                                                                            <div class="col-12 col-sm-6 d-flex justify-content-center">
                                                                                                <!-- Mostrando los archivos nuevos y cargados de PPT-->
                                                                                            <div v-show="fileppt.length>0 && cual_documento=='ppt'" >
                                                                                                    <div v-for= "(fileppts,index) in fileppt">
                                                                                            
                                                                                                            <span class="badge bg-secondary">Descargar Presentacion </span><br>
                                                                                                                <!--<div class="col-12 col-md-12">
                                                                                                                    <button type="button" class="btn btn-danger" @click="eliminarDocumento(fileppts)" >Eliminar</button>
                                                                                                                </div>-->
                                                                                                                <div class="mb-5">
                                                                                                                    <a :href="fileppts" download="Presentacion.pptx">
                                                                                                                        <img src="img/descargar_ppt.png" style="width:100px; height:100px;"></img>
                                                                                                                    </a>
                                                                                                                </div>
                                                                                                        
                                                                                                    </div>
                                                                                            </div>
                                                                            </div>
                                                                    </div>
                                                                    <div class="bg-light p-3 border rounded">
                                                                        <form @submit.prevent="guardarImpactoCuantitativo">
                                                                                <div class="row">
                                                                                        <div class="col-12 col-sm-6">
                                                                                            <label>Indicador:</label>
                                                                                            <input v-model="indicador" type="text" class="form-control" style="font-size:.8em" required disabled/>
                                                                                        </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-12 col-sm-6">
                                                                                            <label>Línea Base:</label>
                                                                                            <input  v-model="linea_base" type="text" class=" form-control" style="font-size:.8em" required disabled/>
                                                                                        </div>
                                                                                        <div class="col-12 col-sm-6">
                                                                                            <label>Resultado Esperado:</label>
                                                                                            <input v-model="resultado_esperado" type="text" class=" form-control" style="font-size:.8em" required disabled/>
                                                                                        </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-12 col-sm-3">
                                                                                            <label>% de Mejora</label>
                                                                                            <input v-model="porcentaje_de_mejora" type="text" class=" form-control" style="font-size:.8em" required/>
                                                                                        </div>
                                                                                        <div class="col-12 col-sm-5">
                                                                                            <label>Tipo de impacto:</label>
                                                                                            <select v-model="tipo_de_impacto" class=" form-control" style="font-size:.8em" required>
                                                                                                        <option value="" disabled>Seleccione una opción..</option>
                                                                                                        <option value="Bajo">Bajo</option>
                                                                                                        <option value="Medio">Medio</option>
                                                                                                        <option value="Alto">Alto</option>
                                                                                            </select>
                                                                                        </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-12 col-sm-3">
                                                                                            <label>Puntos Asignados</label>
                                                                                            <input v-model="puntos_asignados" type="number" min="0" class=" form-control" style="font-size:.8em" required/>
                                                                                        </div>
                                                                                </div>
                                                                                <div class="d-flex justify-content-center">
                                                                                        <div class="col-12 col-sm-3 text-center">  
                                                                                                <button class="btn btn-success" type="submit" style=" font-size:1em">Guardar</button>
                                                                                        </div>
                                                                                </div>
                                                                        </form>
                                                                    </div>
                                                   </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    </div>
                                    </div>
                                </div>
                       </div><!--Fin Modal impacto cuantitativo-->

                       
                       <div class="modal fade" id="modalImpactoCualitativo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"><!--modal impacto cualitativo-->
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"  style="font-size:.9em;">Formulario <b>(Impacto Cualitativo).</b></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <div class="row" v-for="concentrado in concentrado_sugerencias" >
                                                  <div v-show="concentrado.id==id_concentrado" style=" font-size:.8em;">
                                                                    <div class="row mb-2">
                                                                        <span class="badge bg-secondary text-light"> Validación de Implementación de Sugerencia FOLIO: {{folio}}</span>
                                                                    </div>
                                                                    <div class="row">
                                                                            <div class="col-12 col-sm-6">
                                                                                        <div>
                                                                                                <label><b>Impacto Primario: </b> {{concentrado.impacto_primario}}</label><br>
                                                                                                <label><b>Impacto Secundario: </b> {{concentrado.impacto_secundario}}</label><br>
                                                                                                <label><b>Tipo de Desperdicio:</b> {{concentrado.tipo_de_desperdicio}}</label><br>
                                                                                                <label><b>Objetivos de Calidad y M.A:</b> {{concentrado.objetivo_de_calidad_ma}}</label><br>
                                                                                        </div>
                                                                            </div>
                                                                            <div class="col-12 col-sm-6 d-flex justify-content-center">
                                                                                                <!-- Mostrando los archivos nuevos y cargados de PPT-->
                                                                                            <div v-show="fileppt.length>0 && cual_documento=='ppt'" >
                                                                                                    <div v-for= "(fileppts,index) in fileppt">
                                                                                            
                                                                                                            <span class="badge bg-secondary">Descargar Presentacion </span><br>
                                                                                                                <!--<div class="col-12 col-md-12">
                                                                                                                    <button type="button" class="btn btn-danger" @click="eliminarDocumento(fileppts)" >Eliminar</button>
                                                                                                                </div>-->
                                                                                                                <div class="mb-5">
                                                                                                                    <a :href="fileppts" download="Presentacion.pptx">
                                                                                                                        <img src="img/descargar_ppt.png" style="width:100px; height:100px;"></img>
                                                                                                                    </a>
                                                                                                                </div>
                                                                                                        
                                                                                                    </div>
                                                                                            </div>
                                                                            </div>
                                                                    </div>
                                                                    <div class="bg-light p-3 border rounded">
                                                                        <form @submit.prevent="guardarImpactoCualitativo">
                                                                                <div class="row">
                                                                                        <div class="col-12">
                                                                                            <label>Impacto cualitativo:</label>
                                                                                            <textarea v-model="impacto_cualitativo" type="text" class="form-control" style="font-size:.8em;" required disabled></textarea>
                                                                                        </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-12 col-sm-5">
                                                                                            <label>Tipo de impacto:</label>
                                                                                            <select v-model="tipo_impacto" class=" form-control" style="font-size:.8em" required>
                                                                                                        <option value="" disabled>Seleccione una opción..</option>
                                                                                                        <option value="Bajo">Bajo</option>
                                                                                                        <option value="Medio">Medio</option>
                                                                                                        <option value="Alto">Alto</option>
                                                                                            </select>
                                                                                        </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-12 col-sm-3">
                                                                                            <label>Puntos Asignados</label>
                                                                                            <input v-model="puntos_asignados_cualitativos" type="number" min="0" class=" form-control" style="font-size:.8em" required/>
                                                                                        </div>
                                                                                </div>
                                                                                <div class="d-flex justify-content-center">
                                                                                        <div class="col-12 col-sm-3 text-center">  
                                                                                                <button class="btn btn-success" type="submit" style=" font-size:1em">Guardar</button>
                                                                                        </div>
                                                                                </div>
                                                                        </form>
                                                                    </div>
                                                   </div>
                                        </div>
                                           

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    </div>
                                    </div>
                                </div>
                       </div><!--Fin Modal cualitativo-->

                       <div class="modal fade" id="modalImpactoSugerencia" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"><!--modal impacto cualitativo-->
                                <div class="modal-dialog modal-fullscreen modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"  style="font-size:.9em;">Concentrado <b>Impacto Sugerencias.</b></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                                        <div class="row">  <!-- contenido impacto de sugerencia-->
                                                                                <div class="col-12">                                
                                                                                        <div class="text-center mt-3 ">
                                                                                            <span class="badge bg-light text-dark">Concentrado Impacto Sugerencias</span>
                                                                                        </div>
                                                                                            <div class="div-scroll mt-3 "><!--Scroll-->
                                                                                            <table class="tablaMonitoreo-sugerencias table table-striped table-bordered text-center">
                                                                                                <thead class="encabezado-tabla text-center text-light ">
                                                                                                    <tr >
                                                                                                    <th scope="col">Folio</th>
                                                                                                    <th scope="col">Nombre de Sugerencia</th>
                                                                                                    <th scope="col">Analista de Factibilidad</th>
                                                                                                    <th scope="col">Planta</th>
                                                                                                    <th scope="col">Área</th>
                                                                                                    <th scope="col">Subárea</th>
                                                                                                    <th scope="col">Fecha real de Cierra</th>
                                                                                                    <th scope="col">Indicador</th>
                                                                                                    <th scope="col">Unidades</th>
                                                                                                    <th scope="col">Línea Base</th>
                                                                                                    <th scope="col">Periodo de Medición</th>
                                                                                                    <th scope="col">Mes 1</th>
                                                                                                    <th scope="col">Mes 2</th>
                                                                                                    <th scope="col">Mes 3</th>
                                                                                                    <th scope="col">Mes 4</th>
                                                                                                    <th scope="col">Mes 5</th>
                                                                                                    <th scope="col">Mes 6</th>
                                                                                                    <th scope="col">Mes 7</th>
                                                                                                    <th scope="col">Mes 8</th>
                                                                                                    <th scope="col">Mes 9</th>
                                                                                                    <th scope="col">Mes 10</th>
                                                                                                    <th scope="col">Mes 11</th>
                                                                                                    <th scope="col">Mes 12</th>
                                                                                                    <th scope="col">Status</th>
                                                                                                    <!--<th scope="col">Acumulado</th>-->
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                    <tr class="align-middle"  :style="pendiente_impacto.orden == 2? colorgreen : colorgris"  v-for="(pendiente_impacto, index) in concentrado_sugerencias_pendiente_impacto">
                                                                                        
                                                                                            
                                                                                       
                                                                                       <td><label>{{pendiente_impacto.folio}}</label></td>
                                                                                       <td><label>{{pendiente_impacto.nombre_sugerencia}}</label></td>
                                                                                       <td><label>{{pendiente_impacto.analista_de_factibilidad}}</label></td>
                                                                                       <td><label>{{pendiente_impacto.planta}}</label></td>
                                                                                       <td><label>{{pendiente_impacto.area}}</label></td>
                                                                                       <td><label>{{pendiente_impacto.subarea}}</label></td>
                                                                                       <td><label>{{pendiente_impacto.fecha_real_cierre}}</label>
                                                                                       
                                                                                       </td>
                                                                                       <td>
                                                                                               <input v-if="id_actualiza==index+1" class="rounded border-2" v-model="indicador" type="text" ></input> 
                                                                                               <div v-else v-for="concentrado_impacto_midiendo in concentrado_impacto_sugerencias_midiendo">
                                                                                               <!--{{pendiente_impacto.orden}}{{ "=="+concentrado_impacto_midiendo.orden}}-->
                                                                                                    <input v-if="concentrado_impacto_midiendo.id_concentrado == pendiente_impacto.id && pendiente_impacto.orden == concentrado_impacto_midiendo.orden" :value="concentrado_impacto_midiendo.indicador" class="rounded border-2 bg-light fw-bold " type="text" disabled></input>
                                                                                               </div>
                                                                                       </td>
                                                                                       <td>
                                                                                               <input v-if="id_actualiza==index+1" class="rounded border-2" v-model="unidades" type="text" ></input>
                                                                                               <div v-else v-for="concentrado_impacto_midiendo in concentrado_impacto_sugerencias_midiendo"> 
                                                                                                           <input v-if="concentrado_impacto_midiendo.id_concentrado == pendiente_impacto.id && pendiente_impacto.orden == concentrado_impacto_midiendo.orden" :value="concentrado_impacto_midiendo.unidades" class="rounded border-2 bg-light fw-bold " type="text" disabled></input> 
                                                                                               </div>
                                                                                       </td>
                                                                                       <td>
                                                                                               <input v-if="id_actualiza==index+1" class="rounded border-2" v-model="linea_base" type="text" ></input>
                                                                                               <div v-else v-for="concentrado_impacto_midiendo in concentrado_impacto_sugerencias_midiendo"> 
                                                                                                   <input v-if="concentrado_impacto_midiendo.id_concentrado == pendiente_impacto.id && pendiente_impacto.orden == concentrado_impacto_midiendo.orden" :value="concentrado_impacto_midiendo.linea_base" class="rounded border-2 bg-light fw-bold" type="text" disabled></input> 
                                                                                               </div>
                                                                                       </td>
                                                                                       <td>
                                                                                      
                                                                                               <select v-if="id_actualiza==index+1" v-model="periodo_de_medicion" class="rounded border-2  bg-body">
                                                                                                   <option value="0" disabled selected>Seleccione Periodo..</option>
                                                                                                   <option v-for="mes in 12" :value="mes" @click="vaciarMeses(pendiente_impacto.id)">{{mes}} Mes/es</option>
                                                                                               </select>
                                                                                                       <div v-else  v-for="concentrado_impacto_midiendo in concentrado_impacto_sugerencias_midiendo"> 
                                                                                                           <input v-if="concentrado_impacto_midiendo.id_concentrado == pendiente_impacto.id && pendiente_impacto.orden == concentrado_impacto_midiendo.orden" :value="concentrado_impacto_midiendo.periodo" class="rounded border-2 bg-light fw-bold" type="text" disabled></input> 
                                                                                                       </div>   
                                                                                       </td>
                                                                                       <td style="background-color: #fffadf"><!--Mes1-->
                                                                                               <div v-if="id_actualiza==index+1" v-show="periodo_de_medicion >= 1">    
                                                                                                           <span class="d-block p-1 bg-dark text-white fw-bold">{{pendiente_impacto.mes1}}</span>
                                                                                                           <span class="d-block p-1 bg-dark text-white"><input  class="rounded border-2" type="text" v-model="mes1"></input></span>
                                                                                               </div>   
                                                                                               <div v-else v-for="concentrado_impacto_midiendo in concentrado_impacto_sugerencias_midiendo">
                                                                                                       <div v-if="concentrado_impacto_midiendo.id_concentrado == pendiente_impacto.id && pendiente_impacto.orden == concentrado_impacto_midiendo.orden  && concentrado_impacto_midiendo.periodo >=1">
                                                                                                           <span  class="d-block p-1 bg-secondary text-white fw-bold">{{pendiente_impacto.mes1}}</span>
                                                                                                           <span class="d-block p-1 bg-secondary text-white ">
                                                                                                               <input  :value="concentrado_impacto_midiendo.mes1" class="border-2  text-center fw-bold" type="text" disabled></input>
                                                                                                           </span> 
                                                                                                       </div>    
                                                                                               </div>   
                                                                                       </td>
                                                                                       <td style="background-color: #fffadf">
                                                                                               <div v-if="id_actualiza==index+1" v-show="periodo_de_medicion >= 2">
                                                                                                           <span class="d-block p-1 bg-dark text-white fw-bold">{{pendiente_impacto.mes2}}</span>
                                                                                                           <span class="d-block p-1 bg-dark text-white"><input  class="rounded border-2" type="text" v-model="mes2"></input></span>
                                                                                               </div> 
                                                                                               <div v-else v-for="concentrado_impacto_midiendo in concentrado_impacto_sugerencias_midiendo">
                                                                                                       <div v-if="concentrado_impacto_midiendo.id_concentrado == pendiente_impacto.id && pendiente_impacto.orden == concentrado_impacto_midiendo.orden  && concentrado_impacto_midiendo.periodo >=2">
                                                                                                           <span  class="d-block p-1 bg-secondary text-white fw-bold">{{pendiente_impacto.mes2}}</span>
                                                                                                           <span class="d-block p-1 bg-secondary text-white ">
                                                                                                               <input  :value="concentrado_impacto_midiendo.mes2" class="border-2  text-center fw-bold" type="text" disabled></input>
                                                                                                           </span> 
                                                                                                       </div>     
                                                                                               </div>      
                                                                                       </td>
                                                                                       <td style="background-color: #fffadf">
                                                                                               <div v-if="id_actualiza==index+1" v-show="periodo_de_medicion >= 3">
                                                                                                           <span class="d-block p-1 bg-dark text-white fw-bold">{{pendiente_impacto.mes3}}</span>
                                                                                                           <span class="d-block p-1 bg-dark text-white"><input  class="rounded border-2" type="text" v-model="mes3"></input></span>
                                                                                               </div> 
                                                                                               <div v-else v-for="concentrado_impacto_midiendo in concentrado_impacto_sugerencias_midiendo">
                                                                                                       <div v-if="concentrado_impacto_midiendo.id_concentrado == pendiente_impacto.id && pendiente_impacto.orden == concentrado_impacto_midiendo.orden  && concentrado_impacto_midiendo.periodo >=3">
                                                                                                           <span  class="d-block p-1 bg-secondary text-white fw-bold">{{pendiente_impacto.mes3}}</span>
                                                                                                           <span class="d-block p-1 bg-secondary text-white ">
                                                                                                               <input  :value="concentrado_impacto_midiendo.mes3" class="border-2  text-center fw-bold" type="text" disabled></input>
                                                                                                           </span> 
                                                                                                       </div>     
                                                                                               </div>      
                                                                                       </td>
                                                                                       <td style="background-color: #fffadf">
                                                                                           <div v-if="id_actualiza==index+1" v-show="periodo_de_medicion >= 4">
                                                                                                           <span class="d-block p-1 bg-dark text-white fw-bold">{{pendiente_impacto.mes4}}</span>
                                                                                                           <span class="d-block p-1 bg-dark text-white"><input  class="rounded border-2" type="text" v-model="mes4"></input></span>
                                                                                           </div>  
                                                                                           <div v-else  v-for="concentrado_impacto_midiendo in concentrado_impacto_sugerencias_midiendo">
                                                                                                       <div v-if="concentrado_impacto_midiendo.id_concentrado == pendiente_impacto.id && pendiente_impacto.orden == concentrado_impacto_midiendo.orden  && concentrado_impacto_midiendo.periodo >=4">
                                                                                                           <span  class="d-block p-1 bg-secondary text-white fw-bold">{{pendiente_impacto.mes4}}</span>
                                                                                                           <span class="d-block p-1 bg-secondary text-white ">
                                                                                                               <input  :value="concentrado_impacto_midiendo.mes4" class="border-2  text-center fw-bold" type="text" disabled></input>
                                                                                                           </span> 
                                                                                                       </div>     
                                                                                           </div>    
                                                                                       </td>
                                                                                       <td style="background-color: #fffadf">
                                                                                           <div v-if="id_actualiza==index+1" v-show="periodo_de_medicion >= 5">
                                                                                                   <span class="d-block p-1 bg-dark text-white fw-bold">{{pendiente_impacto.mes5}}</span>
                                                                                                   <span class="d-block p-1 bg-dark text-white"><input  class="rounded border-2" type="text" v-model="mes5"></input></span>
                                                                                           </div>
                                                                                           <div v-else v-for="concentrado_impacto_midiendo in concentrado_impacto_sugerencias_midiendo">
                                                                                                       <div v-if="concentrado_impacto_midiendo.id_concentrado == pendiente_impacto.id && pendiente_impacto.orden == concentrado_impacto_midiendo.orden  && concentrado_impacto_midiendo.periodo >=5">
                                                                                                           <span  class="d-block p-1 bg-secondary text-white fw-bold">{{pendiente_impacto.mes5}}</span>
                                                                                                           <span class="d-block p-1 bg-secondary text-white ">
                                                                                                               <input  :value="concentrado_impacto_midiendo.mes5" class="border-2  text-center fw-bold" type="text" disabled></input>
                                                                                                           </span> 
                                                                                                       </div>     
                                                                                           </div>   
                                                                                       </td>
                                                                                       <td style="background-color: #fffadf">
                                                                                           <div v-if="id_actualiza==index+1" v-show="periodo_de_medicion >= 6">
                                                                                                   <span class="d-block p-1 bg-dark text-white fw-bold">{{pendiente_impacto.mes6}}</span>
                                                                                                   <span class="d-block p-1 bg-dark text-white"><input  class="rounded border-2" type="text" v-model="mes6"></input></span>
                                                                                           </div>    
                                                                                           <div v-else v-for="concentrado_impacto_midiendo in concentrado_impacto_sugerencias_midiendo">
                                                                                                       <div v-if="concentrado_impacto_midiendo.id_concentrado == pendiente_impacto.id && pendiente_impacto.orden == concentrado_impacto_midiendo.orden  && concentrado_impacto_midiendo.periodo >=6">
                                                                                                           <span  class="d-block p-1 bg-secondary text-white fw-bold">{{pendiente_impacto.mes6}}</span>
                                                                                                           <span class="d-block p-1 bg-secondary text-white ">
                                                                                                               <input  :value="concentrado_impacto_midiendo.mes6" class="border-2  text-center fw-bold" type="text" disabled></input>
                                                                                                           </span> 
                                                                                                       </div>     
                                                                                           </div>    
                                                                                       </td>
                                                                                       <td style="background-color: #fffadf">
                                                                                           <div v-if="id_actualiza==index+1" v-show="periodo_de_medicion >= 7">
                                                                                                   <span class="d-block p-1 bg-dark text-white fw-bold">{{pendiente_impacto.mes7}}</span>
                                                                                                   <span class="d-block p-1 bg-dark text-white"><input  class="rounded border-2" type="text" v-model="mes7"></input></span>
                                                                                           </div>   
                                                                                           <div v-else v-for="concentrado_impacto_midiendo in concentrado_impacto_sugerencias_midiendo">
                                                                                                       <div v-if="concentrado_impacto_midiendo.id_concentrado == pendiente_impacto.id && pendiente_impacto.orden == concentrado_impacto_midiendo.orden  && concentrado_impacto_midiendo.periodo >=7">
                                                                                                           <span  class="d-block p-1 bg-secondary text-white fw-bold">{{pendiente_impacto.mes7}}</span>
                                                                                                           <span class="d-block p-1 bg-secondary text-white ">
                                                                                                               <input  :value="concentrado_impacto_midiendo.mes7" class="border-2  text-center fw-bold" type="text" disabled></input>
                                                                                                           </span> 
                                                                                                       </div>     
                                                                                           </div>    
                                                                                       </td>
                                                                                       <td style="background-color: #fffadf">
                                                                                           <div v-if="id_actualiza==index+1" v-show="periodo_de_medicion >= 8">
                                                                                                   <span class="d-block p-1 bg-dark text-white fw-bold">{{pendiente_impacto.mes8}}</span>
                                                                                                   <span class="d-block p-1 bg-dark text-white"><input  class="rounded border-2"type="text" v-model="mes8"></input></span>
                                                                                           </div>    
                                                                                           <div v-else  v-for="concentrado_impacto_midiendo in concentrado_impacto_sugerencias_midiendo">
                                                                                                       <div v-if="concentrado_impacto_midiendo.id_concentrado == pendiente_impacto.id && pendiente_impacto.orden == concentrado_impacto_midiendo.orden  && concentrado_impacto_midiendo.periodo >=8">
                                                                                                           <span  class="d-block p-1 bg-secondary text-white fw-bold">{{pendiente_impacto.mes8}}</span>
                                                                                                           <span class="d-block p-1 bg-secondary text-white ">
                                                                                                               <input  :value="concentrado_impacto_midiendo.mes8" class="border-2  text-center fw-bold" type="text" disabled></input>
                                                                                                           </span> 
                                                                                                       </div>       
                                                                                           </div>   
                                                                                       </td>
                                                                                       <td style="background-color: #fffadf">
                                                                                           <div v-if="id_actualiza==index+1" v-show="periodo_de_medicion >= 9">
                                                                                           <span class="d-block p-1 bg-dark text-white fw-bold">{{pendiente_impacto.mes9}}</span>
                                                                                                   <span class="d-block p-1 bg-dark text-white"><input  class="rounded border-2"type="text" v-model="mes9"></input></span>
                                                                                           </div> 
                                                                                           <div v-else v-for="concentrado_impacto_midiendo in concentrado_impacto_sugerencias_midiendo">
                                                                                                       <div v-if="concentrado_impacto_midiendo.id_concentrado == pendiente_impacto.id && pendiente_impacto.orden == concentrado_impacto_midiendo.orden  && concentrado_impacto_midiendo.periodo >=9">
                                                                                                           <span  class="d-block p-1 bg-secondary text-white fw-bold">{{pendiente_impacto.mes9}}</span>
                                                                                                           <span class="d-block p-1 bg-secondary text-white ">
                                                                                                               <input  :value="concentrado_impacto_midiendo.mes9" class="border-2  text-center fw-bold" type="text" disabled></input>
                                                                                                           </span> 
                                                                                                       </div>    
                                                                                           </div>   
                                                                                       </td>
                                                                                       <td style="background-color: #fffadf">
                                                                                           <div v-if="id_actualiza==index+1" v-show="periodo_de_medicion >= 10">
                                                                                                   <span class="d-block p-1 bg-dark text-white fw-bold">{{pendiente_impacto.mes10}}</span>
                                                                                                   <span class="d-block p-1 bg-dark text-white"><input  class="rounded border-2"type="text" v-model="mes10"></input></span>
                                                                                           </div>    
                                                                                           <div v-else v-for="concentrado_impacto_midiendo in concentrado_impacto_sugerencias_midiendo">
                                                                                           <div v-if="concentrado_impacto_midiendo.id_concentrado == pendiente_impacto.id && pendiente_impacto.orden == concentrado_impacto_midiendo.orden  && concentrado_impacto_midiendo.periodo >=10">
                                                                                                           <span  class="d-block p-1 bg-secondary text-white fw-bold">{{pendiente_impacto.mes10}}</span>
                                                                                                           <span class="d-block p-1 bg-secondary text-white ">
                                                                                                               <input  :value="concentrado_impacto_midiendo.mes10" class="border-2  text-center fw-bold" type="text" disabled></input>
                                                                                                           </span> 
                                                                                                       </div>    
                                                                                           </div>  
                                                                                       </td>
                                                                                       <td style="background-color: #fffadf">
                                                                                           <div v-if="id_actualiza==index+1" v-show="periodo_de_medicion >= 11">
                                                                                                   <span class="d-block p-1 bg-dark text-white fw-bold">{{pendiente_impacto.mes11}}</span>
                                                                                                   <span class="d-block p-1 bg-dark text-white"><input  class="rounded border-2"type="text" v-model="mes11"></input></span>
                                                                                           </div>  
                                                                                           <div v-else v-for="concentrado_impacto_midiendo in concentrado_impacto_sugerencias_midiendo">
                                                                                                       <div v-if="concentrado_impacto_midiendo.id_concentrado == pendiente_impacto.id && pendiente_impacto.orden == concentrado_impacto_midiendo.orden  && concentrado_impacto_midiendo.periodo >=11">
                                                                                                           <span  class="d-block p-1 bg-secondary text-white fw-bold">{{pendiente_impacto.mes11}}</span>
                                                                                                           <span class="d-block p-1 bg-secondary text-white ">
                                                                                                               <input  :value="concentrado_impacto_midiendo.mes11" class="border-2  text-center fw-bold" type="text" disabled></input>
                                                                                                           </span> 
                                                                                                       </div>    
                                                                                           </div>       
                                                                                       </td>
                                                                                       <td style="background-color: #fffadf">
                                                                                           <div v-if="id_actualiza==index+1" v-show="periodo_de_medicion >= 12">
                                                                                                   <span class="d-block p-1 bg-dark text-white fw-bold">{{pendiente_impacto.mes12}}</span>
                                                                                                   <span class="d-block p-1 bg-dark text-white"><input  class="rounded border-2" type="text" v-model="mes12"></input></span>
                                                                                           </div>     
                                                                                           <div v-else v-for="concentrado_impacto_midiendo in concentrado_impacto_sugerencias_midiendo">
                                                                                                       <div v-if="concentrado_impacto_midiendo.id_concentrado == pendiente_impacto.id && pendiente_impacto.orden == concentrado_impacto_midiendo.orden  && concentrado_impacto_midiendo.periodo >=12">
                                                                                                           <span  class="d-block p-1 bg-secondary text-white fw-bold">{{pendiente_impacto.mes12}}</span>
                                                                                                           <span class="d-block p-1 bg-secondary text-white ">
                                                                                                               <input  :value="concentrado_impacto_midiendo.mes12" class="border-2  text-center fw-bold" type="text" disabled></input>
                                                                                                           </span> 
                                                                                                       </div>    
                                                                                           </div>     
                                                                                       </td>
                                                                                       <td>
                                                                                            <label v-show="pendiente_impacto.orden == 2">{{pendiente_impacto.status_impacto}}</label>
                                                                                       </td>
                                                                                   </tr>
                
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div><!--scroll-->
                                                                        </div>
                                                        </div><!-- contenido impacto de sugerencia-->
                                        </div>  
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                       </div><!--Fin Modal cualitativo-->


                   </div> <!--fin contenido principal gonher-->
                   <!--////////////////////////////////////////////////////////APARTADO CONCENTRADO DE SUGERENCIAS-->
                   <div v-else-if="ventana=='concentrado'" v-cloak>
                       <!--cinta apartado-->
                            <div class="row justify-content-center align-items-start ">
                                <div class="cintilla col-12 text-center">
                                   <b> CONCENTRADO DE SUGERENCIAS </b>
                                </div>
                            </div>
                        <!--fin cinta apartado-->
                            <!-- contenido principal gonher-->
                            <div class="row m-lg-2">
                                <div class="col-12 text-center inline-block">
                                    <div>
                                        <button class="boton-nuevo" @click="agregar_nueva_sugerencia, mostrar_id(0)"><i class="bi bi-plus-circle"></i> Nueva Sugerencia</button>
                                    </div>
                                </div>
                            <div class="div-scroll mt-3 ">
                                    <table class="table tablaConcentrado table-striped table-bordered" style="height:10px; ">
                                        <thead class="encabezado-tabla text-center">
                                            <tr class="text-light bg-secondary">
                                            <th scope="col" class="sticky bg-white text-dark ">Edit:Cancel/Save </th>
                                            <th scope="col">#</th>
                                            <th scope="col">%Cumplimiento</th>
                                            <th scope="col">Tipo Empleado</th>
                                            <th scope="col">Nombre sugerencias <span v-show="nueva_sugerencia==true || actualizar_sugerencia!=''" class="badge bg-primary">*</span></th>
                                            <th scope="col">Folio <span v-show="nueva_sugerencia==true || actualizar_sugerencia!=''" class="badge bg-primary">*</span></th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Causa de No factibidad</th>
                                            <th scope="col">Situación Actual <span v-show="nueva_sugerencia==true || actualizar_sugerencia!=''" class="badge bg-primary">*</span></th>
                                            <th scope="col">Idea Propuesta <span v-show="nueva_sugerencia==true || actualizar_sugerencia!=''" class="badge bg-primary">*</span></th>
                                            <th scope="col">No. de Nomina <span v-show="nueva_sugerencia==true || actualizar_sugerencia!=''" class="badge bg-primary">*</span></th>
                                            <th scope="col">Colaborador <span v-show="nueva_sugerencia==true || actualizar_sugerencia!=''" class="badge bg-primary">*</span></th> 
                                            <th scope="col">Puesto <span v-show="nueva_sugerencia==true || actualizar_sugerencia!=''" class="badge bg-primary">*</span></th>
                                            <th scope="col">Planta <span v-show="nueva_sugerencia==true || actualizar_sugerencia!=''" class="badge bg-primary">*</span><br>
                                                <button class="rounded-2 bg-success border-dark font-monospace text-light" style="font-weight: bold" data-bs-toggle="modal" data-bs-target="#modal" @click="modal_nueva_eliminar('Agregar','Planta')">Agregar +</button> &nbsp
                                                <button class="rounded-2 bg-danger border-dark  font-monospace text-light"  style="font-weight: bold" data-bs-toggle="modal" data-bs-target="#modal" @click="modal_nueva_eliminar('Eliminar','Planta')">Eliminar -</button>
                                            </th>
                                            <th scope="col">Área <span v-show="nueva_sugerencia==true || actualizar_sugerencia!=''" class="badge bg-primary">*</span><br>
                                                <button class="rounded-2 bg-success border-dark  font-monospace text-light"  style="font-weight: bold" data-bs-toggle="modal" data-bs-target="#modal" @click="modal_nueva_eliminar('Agregar','Area')">Agregar +</button> &nbsp
                                                <button class="rounded-2 bg-danger border-dark  font-monospace text-light"  style="font-weight: bold" data-bs-toggle="modal" data-bs-target="#modal" @click="modal_nueva_eliminar('Eliminar','Area')">Eliminar -</button></th>
                                            </th>
                                            <th scope="col">Área del Participante <span v-show="nueva_sugerencia==true || actualizar_sugerencia!=''" class="badge bg-primary">*</span><br>
                                                <button class="rounded-2 bg-success border-dark  font-monospace text-light"  style="font-weight: bold" data-bs-toggle="modal" data-bs-target="#modal" @click="modal_nueva_eliminar('Agregar','Area Participante')">Agregar +</button> &nbsp
                                                <button class="rounded-2 bg-danger border-dark  font-monospace text-light"  style="font-weight: bold" data-bs-toggle="modal" data-bs-target="#modal" @click="modal_nueva_eliminar('Eliminar','Area Participante')">Eliminar -</button></th>
                                            <th scope="col">Subárea <span v-show="nueva_sugerencia==true || actualizar_sugerencia!=''" class="badge bg-primary">*</span><br>
                                                <button class="rounded-2 bg-success border-dark  font-monospace text-light"  style="font-weight: bold" data-bs-toggle="modal" data-bs-target="#modal" @click="modal_nueva_eliminar('Agregar','Subarea')">Agregar +</button> &nbsp
                                                <button class="rounded-2 bg-danger border-dark  font-monospace text-light"  style="font-weight: bold" data-bs-toggle="modal" data-bs-target="#modal" @click="modal_nueva_eliminar('Eliminar','Subarea')">Eliminar -</button></th>
                                            <th scope="col">Impacto Primario <!--<span v-show="nueva_sugerencia==true || actualizar_sugerencia!=''" class="badge bg-primary">*</span>--><br v-show="nueva_sugerencia!=true">
                                                <button v-show="nueva_sugerencia!=true" class="rounded-2 bg-success border-dark  font-monospace text-light"  style="font-weight: bold" data-bs-toggle="modal" data-bs-target="#modal" @click="modal_nueva_eliminar('Agregar','Impacto')">Agregar +</button> &nbsp
                                                <button v-show="nueva_sugerencia!=true" class="rounded-2 bg-danger border-dark  font-monospace text-light"  style="font-weight: bold" data-bs-toggle="modal" data-bs-target="#modal" @click="modal_nueva_eliminar('Eliminar','Impacto')">Eliminar -</button></th>
                                            <th scope="col">Impacto Secundario <!--<span v-show="nueva_sugerencia==true || actualizar_sugerencia!=''" class="badge bg-primary">*</span>--><br v-show="nueva_sugerencia!=true">
                                                <button v-show="nueva_sugerencia!=true" class="rounded-2 bg-success border-dark  font-monospace text-light"  style="font-weight: bold" data-bs-toggle="modal" data-bs-target="#modal" @click="modal_nueva_eliminar('Agregar','Impacto')">Agregar +</button> &nbsp
                                                <button v-show="nueva_sugerencia!=true" class="rounded-2 bg-danger border-dark  font-monospace text-light"  style="font-weight: bold" data-bs-toggle="modal" data-bs-target="#modal" @click="modal_nueva_eliminar('Eliminar','Impacto')">Eliminar -</button></th>
                                            <th scope="col">Tipo de Desperdicio <!--<span v-show="nueva_sugerencia==true || actualizar_sugerencia!=''" class="badge bg-primary">*</span>--><br v-show="nueva_sugerencia!=true">
                                                <button v-show="nueva_sugerencia!=true" class="rounded-2 bg-success border-dark  font-monospace text-light"  style="font-weight: bold" data-bs-toggle="modal" data-bs-target="#modal" @click="modal_nueva_eliminar('Agregar','Desperdicio')">Agregar +</button> &nbsp
                                                <button v-show="nueva_sugerencia!=true" class="rounded-2 bg-danger border-dark font-monospace text-light"  style="font-weight: bold" data-bs-toggle="modal" data-bs-target="#modal" @click="modal_nueva_eliminar('Eliminar','Desperdicio')">Eliminar -</button></th>
                                            <th scope="col">Objetivos de Calidad M.A. <!--<span v-show="nueva_sugerencia==true || actualizar_sugerencia!=''" class="badge bg-primary">*</span>--><br v-show="nueva_sugerencia!=true">
                                                <button v-show="nueva_sugerencia!=true" class="rounded-2 bg-success border-dark  font-monospace text-light"  style="font-weight: bold" data-bs-toggle="modal" data-bs-target="#modal" @click="modal_nueva_eliminar('Agregar','Calidad')">Agregar +</button> &nbsp
                                                <button v-show="nueva_sugerencia!=true" class="rounded-2 bg-danger border-dark font-monospace text-light"  style="font-weight: bold" data-bs-toggle="modal" data-bs-target="#modal" @click="modal_nueva_eliminar('Eliminar','Calidad')">Eliminar -</button></th>
                                            <th scope="col">Fecha de Sugerencia <span v-show="nueva_sugerencia==true || actualizar_sugerencia!=''" class="badge bg-primary">*</span></th>
                                            <th scope="col">Fecha de Inicio <span v-show="nueva_sugerencia==true || actualizar_sugerencia!=''" class="badge bg-primary">*</span></th>
                                            <th scope="col">Fecha Compromiso</th>
                                            <th scope="col">Fecha real de cierre</th>
                                            <th scope="col">Analista de factibilidad <span v-show="nueva_sugerencia==true || actualizar_sugerencia!=''" class="badge bg-primary">*</span><br>
                                               <!-- <button class="rounded-2 bg-success border-dark  font-monospace text-light"  style="font-weight: bold" data-bs-toggle="modal" data-bs-target="#modal" @click="modal_nueva_eliminar('Agregar','Analista')">Agregar +</button> &nbsp
                                                <button class="rounded-2 bg-danger border-dark font-monospace text-light"  style="font-weight: bold" data-bs-toggle="modal" data-bs-target="#modal" @click="modal_nueva_eliminar('Eliminar','Analista')">Eliminar -</button></th>-->
                                            <th scope="col">Impacto Planeado</th>
                                            <th scope="col">Impacto Real (Cuantitativo)</th>
                                            <th scope="col">Creado por</th>
                                            <th scope="col">Creado</th>
                                            <th scope="col">Modificado por</th>
                                            <th scope="col">Modificado</th>
                                            <!--<th scope="col">Eliminar</th>-->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!--Nueva Sugerencia-->
                                            <tr v-show="nueva_sugerencia" class="align-middle bg-info">
                                                
                                                <td class="sticky"> 
                                                    <button type="button" class="btn btn-danger  me-2" title="Cancelar" @click="nueva_sugerencia=false"><i class="bi bi-x-circle" ></i></button>
                                                    <button type="button" class="btn btn-primary" title="Guardar" @click="guardar_nueva_sugerencia_y_actualizar('nueva','')"><i class="bi bi-check-circle"></i></button>   
                                                    
                                                </td>
                                                <th scope="row">Nueva</th>
                                                <td><label>0%</label></td>
                                                <td>
                                                    <select class="inputs-concentrado" v-model="var_sindicalizado_empleado">
                                                        <option value="" disabled>Seleccione tipo empleado...</option>
                                                        <option>Sindicalizado</option>
                                                        <option>Empleado</option>
                                                    </select>
                                                </td> 
                                                
                                                <td><textarea class="inputs-concentrado text-area" type="text"  name="nombre_sugerencia" v-model="var_nombre_sugerencias"></textarea></td>
                                                <td><input class="inputs-concentrado" type="text" v-model="var_folio"></input></td>
                                                <td><label>En Factibilidad</label></td>
                                                <td><!--<textarea class="inputs-concentrado text-area" type="text"  v-model="var_causa_no_factibilidad" >{{var_causa_no_factibilidad}}</textarea>--></td>
                                                <td><textarea class="inputs-concentrado text-area" type="text" v-model="var_situacion_actual" ></textarea></td>
                                                <td><textarea class="inputs-concentrado text-area" type="text"  v-model="var_idea_propuesta" ></textarea></td>
                                                <td><input class="inputs-concentrado" type="text"  v-model="var_nomina" ></input></td>
                                                <td><input class="inputs-concentrado" type="text"  v-model="var_colaborador" ></input></td>
                                                <td><input class="inputs-concentrado" type="text"  v-model="var_puesto" ></input></td>
                                                <td>
                                                    <select class="inputs-concentrado" v-model="var_planta" >
                                                            <option value=""  disabled>Seleccione la planta...</option>
                                                            <option v-for="planta in lista_planta" :key="planta.planta" :value="planta.planta">{{planta.planta}}</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="inputs-concentrado" v-model="var_area">
                                                            <option value="" disabled>Seleccione el área...</option>
                                                            <option v-for="area in lista_area" :key="area.area" :value="area.area">{{area.area}}</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="inputs-concentrado" v-model="var_area_participante">
                                                        <option value="" disabled>Seleccione área participante...</option>
                                                        <option v-for="area_participante in lista_area_participante" :key="area_participante.area_participante" :value="area_participante.area_participante">{{area_participante.area_participante}}</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="inputs-concentrado" v-model="var_subarea">
                                                        <option value="" disabled>Seleccione Subárea...</option>
                                                        <option v-for="subarea in lista_subarea" :key="subarea.subarea" :value="subarea.subarea">{{subarea.subarea}}</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <!--<select class="inputs-concentrado" v-model="var_impacto_primario">
                                                        <option value="" disabled>Seleccione impacto primario...</option>
                                                        <option v-for="impacto_primario in lista_impacto_primario" :key="impacto_primario.impacto" :value="impacto_primario.impacto">{{impacto_primario.impacto}}</option>
                                                    </select>-->
                                                </td>
                                                <td>
                                                    <!--<select class="inputs-concentrado" v-model="var_impacto_secundario">
                                                        <option value="" disabled>Seleccione impacto secundario...</option>
                                                        <option v-for="impacto_secundario in lista_impacto_secundario" :key="impacto_secundario.impacto" :value="impacto_secundario.impacto">{{impacto_secundario.impacto}}</option>
                                                    </select>-->
                                                </td>
                                                <td>
                                                   <!-- <select class="inputs-concentrado" v-model="var_tipo_desperdicio">
                                                        <option value="" disabled>Seleccione tipo desperdicio..</option>
                                                        <option v-for="tipo_desperdicio in lista_tipo_desperdicio" :key="tipo_desperdicio.tipo_de_desperdicio" :value="tipo_desperdicio.tipo_de_desperdicio">{{tipo_desperdicio.tipo_de_desperdicio}}</option>
                                                    </select>-->
                                                </td>
                                                <td>
                                                <!--<div  class="inputs-concentrado" style="overflow-y: scroll; max-height:50px;">
                                                <label>{{var_objetivo_de_calidadMA}}</label>
                                                    <ul>
                                                        <li v-for="objetivo_de_calidad in objetivo_de_calidadMA">
                                                            <input type="checkbox" :value="objetivo_de_calidad.objetivos_de_calidad" v-model="var_objetivo_de_calidadMA">
                                                            <label for="objetivo_de_calidad">{{objetivo_de_calidad.objetivos_de_calidad}}</label>
                                                        </li>
                                                    </ul>
                                                </div>-->
                                                </td>
                                                <td><input class="inputs-concentrado" type="date" v-model="var_fecha_sugerencia" name="fecha_de_sugerencias" ></input></td>
                                                <td><input class="inputs-concentrado" type="date" v-model="var_fecha_inicio"  name="fecha_de_inicio" ></input></td>
                                                <td><!--<input class="inputs-concentrado" type="date" v-model="var_fecha_compromiso"  name="fecha_compromiso" ></input>--></td>
                                                <td><!--<input class="inputs-concentrado" type="date" v-model="var_fecha_real_de_cierre"  name="fecha_real_de_cierre" ></input>--></td>
                                                <td>
                                                    <select class="inputs-concentrado" v-model="var_usuario_y_analista_de_factibilidad" >
                                                        <option value="" disabled>Seleccione Analista..</option>
                                                        <option v-for="factibilidad in lista_usuarios_y_analistas_factibilidad" :key="factibilidad.nombre" :value="factibilidad.nombre">{{factibilidad.nombre}}</option>
                                                    </select>
                                                </td>
                                                <td><!--<input class="inputs-concentrado" type="text" v-model="var_impacto_planeado" name="impacto planeado" >--></input></td>
                                                <td><!--<input class="inputs-concentrado" type="text" v-model="var_impacto_real" name="impacto_real" >--></input></td>
                                                <td><label>{{usuario}}</label></td>
                                                <td><label><?php echo date("d-m-Y"); ?></label></td>
                                                <td></input></td>
                                                <td></input></td>
                                                <!--<td><button type="button" class="btn btn-danger" title="Eliminar" @click="nueva_sugerencia=false"><i class="bi bi-trash"></button></i></td>-->
                                            </tr>
                                           
                                            <!--Consulta/Editar Segerencia -->  
                                            <tr class="align-middle" v-for="(concentrado, index) in concentrado_sugerencias" :key="concentrado.id" >
                                                <td class="sticky table-striped table-bordered">
                                                    <button type="button" class="btn btn-danger me-2" title="Cancelar" @click="mostrar_id('')" v-if="actualizar_sugerencia==index+1"><i class="bi bi-x-circle" ></i></button>
                                                    <button type="button" class="btn btn-primary" title="Guardar" @click="guardar_nueva_sugerencia_y_actualizar('actualizar',concentrado.id)" v-if="actualizar_sugerencia==index+1"><i class="bi bi-check-circle"></i></button>
                                                    <button type="button" class="btn btn-warning" title="Actualizar" @click="mostrar_id(index+1)" v-else><i class="bi bi-pen" ></i></button>
                                                    <button v-show="concentrado.cantidadDOC == 0" type="button" class="btn btn-secondary  ms-2" title="Subir Sugerencia"  @click="modal_subir_ver_documentos('Subir',concentrado.id,concentrado.folio,'sugerencia',concentrado.cantidadDOC)"><i class="bi bi-paperclip"></i>{{concentrado.cantidadDOC}}</button>
                                                    <button v-show="concentrado.cantidadDOC != 0" type="button" class="btn btn-success  ms-2" title="Subir Sugerencia"  @click="modal_subir_ver_documentos('Subir',concentrado.id,concentrado.folio,'sugerencia',concentrado.cantidadDOC)"><i class="bi bi-paperclip"></i>{{concentrado.cantidadDOC}}</button>
                                                    <!--Deshabilitar btn si no esta al 99% el plan (100% actividades)-->
                                                    <button v-show="concentrado.cumplimiento < 99 || concentrado.cumplimiento =='' || concentrado.status!='En Implementación' && concentrado.status!='Implementada'" type="button" class="btn btn-secondary  ms-2" title="Subir PPT(Deshabilitado)" disabled ><i class="bi bi-paperclip"></i>{{concentrado.cantidadPPT}}</button >
                                                    <button v-show="concentrado.cantidadPPT == 0 && concentrado.cumplimiento >= 99 && concentrado.status=='En Implementación' || concentrado.cantidadPPT == 0 && concentrado.cumplimiento >= 99 && concentrado.status=='Implementada'"  type="button" class="btn btn-secondary  ms-2" title="Subir PPT"  @click="modal_subir_ver_documentos('Subir',concentrado.id,concentrado.folio,'ppt',concentrado.cantidadPPT)"><i class="bi bi-paperclip"></i>{{concentrado.cantidadPPT}}</button>
                                                    <button v-show="concentrado.cantidadPPT != 0 && concentrado.cumplimiento >= 99 && concentrado.status=='En Implementación' || concentrado.cantidadPPT != 0 && concentrado.cumplimiento >= 99 && concentrado.status=='Implementada'" type="button" class="btn btn-success  ms-2" title="Subir PPT"  @click="modal_subir_ver_documentos('Subir',concentrado.id,concentrado.folio,'ppt',concentrado.cantidadPPT)"><i class="bi bi-paperclip"></i>{{concentrado.cantidadPPT}}</button>
                                                </td>
                                                <th scope="row">{{index+1}}<br><!--{{concentrado.id}}--></th>
                                                <td><label>{{concentrado.cumplimiento}}%</label></td>
                                                <td>
                                                    <select class="inputs-concentrado" v-model="var_sindicalizado_empleado"  v-if="actualizar_sugerencia==index+1">
                                                        <option>Sindicalizado</option>
                                                        <option>Empleado</option>
                                                    </select>
                                                    <label v-else>{{concentrado.sindicalizado_empleado}}</label>
                                                </td> 
                                                <td><textarea class="inputs-concentrado text-area" type="text"  name="nombre_sugerencia" v-model="var_nombre_sugerencias" v-if="actualizar_sugerencia==index+1"></textarea> <label v-else>{{concentrado.nombre_sugerencia}}</label></td>
                                                <td><input class="inputs-concentrado" type="text" v-model="var_folio" v-if="actualizar_sugerencia==index+1"></input> <label v-else>{{concentrado.folio}}</label></td>
                                                <td><label>{{concentrado.status}}</label></td>
                                                <td><textarea class="inputs-concentrado-disabled text-area-disabled" type="text" style="width: 300px;"  v-bind:title="concentrado.causa_no_factibilidad" disabled> {{concentrado.causa_no_factibilidad}}</textarea></td>
                                                <td><textarea class="inputs-concentrado text-area" type="text" v-model="var_situacion_actual"  v-if="actualizar_sugerencia==index+1"></textarea>
                                                    <textarea  v-else class="inputs-concentrado-disabled text-area-disabled" type="text" style="width: 300px;"  v-bind:title="concentrado.situacion_actual" disabled> {{concentrado.situacion_actual}}</textarea></td>
                                                <td><textarea class="inputs-concentrado text-area" type="text"  v-model="var_idea_propuesta"  v-if="actualizar_sugerencia==index+1"></textarea>
                                                    <textarea  v-else class="inputs-concentrado-disabled text-area-disabled" type="text" style="width: 300px;"  v-bind:title="concentrado.idea_propuesta" disabled> {{concentrado.idea_propuesta}}</textarea></td>
                                                <td><input class="inputs-concentrado" type="text"  v-model="var_nomina"  v-if="actualizar_sugerencia==index+1"></input><label v-else>{{concentrado.numero_nomina}}</label></td>
                                                <td><input class="inputs-concentrado" type="text"  v-model="var_colaborador"  v-if="actualizar_sugerencia==index+1"><label v-else>{{concentrado.colaborador}}</label></input></td>
                                                <td><input class="inputs-concentrado" type="text"  v-model="var_puesto"  v-if="actualizar_sugerencia==index+1"><label v-else>{{concentrado.puesto}}</label></input></td>
                                                <td>
                                                    <select  class="inputs-concentrado" v-model="var_planta" v-if="actualizar_sugerencia==index+1">
                                                            <option value=""  disabled>Seleccione la planta...</option>
                                                            <option v-for="planta in lista_planta" :key="planta.planta" :value="planta.planta">{{planta.planta}}</option>
                                                    </select>
                                                    <label v-else>{{concentrado.planta}}</label>
                                                </td>
                                                <td>
                                                    <select class="inputs-concentrado" v-model="var_area" v-if="actualizar_sugerencia==index+1">
                                                            <option value="" disabled>Seleccione el área...</option>
                                                            <option v-for="area in lista_area" :key="area.area" :value="area.area">{{area.area}}</option>
                                                    </select>
                                                    <label v-else>{{concentrado.area}}</label>
                                                </td>
                                                <td>
                                                    <select class="inputs-concentrado" v-model="var_area_participante" v-if="actualizar_sugerencia==index+1">
                                                        <option value="" disabled>Seleccione área participante...</option>
                                                        <option v-for="area_participante in lista_area_participante" :key="area_participante.area_participante" :value="area_participante.area_participante">{{area_participante.area_participante}}</option>
                                                    </select>
                                                    <label v-else>{{concentrado.area_participante}}</label>
                                                </td>
                                                <td>
                                                    <select class="inputs-concentrado" v-model="var_subarea" v-if="actualizar_sugerencia==index+1">
                                                        <option value="" disabled>Seleccione Subárea...</option>
                                                        <option v-for="subarea in lista_subarea" :key="subarea.subarea" :value="subarea.subarea">{{subarea.subarea}}</option>
                                                    </select>
                                                    <label v-else>{{concentrado.subarea}}</label>
                                                </td>
                                                <td>
                                                    <select class="inputs-concentrado" v-model="var_impacto_primario" v-if="actualizar_sugerencia==index+1">
                                                        <option value="" disabled>Seleccione impacto primario...</option>
                                                        <option v-for="impacto_primario in lista_impacto_primario" :key="impacto_primario.impacto" :value="impacto_primario.impacto">{{impacto_primario.impacto}}</option>
                                                    </select>
                                                    <label v-else>{{concentrado.impacto_primario}}</label>
                                                </td>
                                                <td>
                                                    <select class="inputs-concentrado" v-model="var_impacto_secundario" v-if="actualizar_sugerencia==index+1">
                                                        <option value="" disabled>Seleccione impacto secundario...</option>
                                                        <option v-for="impacto_secundario in lista_impacto_secundario" :key="impacto_secundario.impacto" :value="impacto_secundario.impacto">{{impacto_secundario.impacto}}</option>
                                                    </select>
                                                    <label v-else>{{concentrado.impacto_secundario}}</label>
                                                </td>
                                                <td>
                                                    <select class="inputs-concentrado" v-model="var_tipo_desperdicio" v-if="actualizar_sugerencia==index+1">
                                                        <option value="" disabled>Seleccione tipo desperdicio..</option>
                                                        <option v-for="tipo_desperdicio in lista_tipo_desperdicio" :key="tipo_desperdicio.tipo_de_desperdicio" :value="tipo_desperdicio.tipo_de_desperdicio">{{tipo_desperdicio.tipo_de_desperdicio}}</option>
                                                    </select>
                                                    <label v-else>{{concentrado.tipo_de_desperdicio}}</label>
                                                </td>
                                                <td>
                                                <div  class="inputs-concentrado" style="overflow-y: scroll; max-height:50px;"  v-if="actualizar_sugerencia==index+1">
                                                <label>{{var_objetivo_de_calidadMA}}</label>
                                                    <ul>
                                                        <li v-for="objetivo_de_calidad in objetivo_de_calidadMA">
                                                            <input type="checkbox" :value="objetivo_de_calidad.objetivos_de_calidad" v-model="var_objetivo_de_calidadMA">
                                                            <label for="objetivo_de_calidad">{{objetivo_de_calidad.objetivos_de_calidad}}</label>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <label v-else>{{concentrado.objetivo_de_calidad_ma}}</label>
                                                </td>
                                                <td><input class="inputs-concentrado" type="date" v-model="var_fecha_sugerencia" v-if="actualizar_sugerencia==index+1"></input><label v-else>{{concentrado.fecha_de_sugerencia}}</label></td>
                                                <td><input class="inputs-concentrado" type="date" v-model="var_fecha_inicio" v-if="actualizar_sugerencia==index+1"></input><label v-else>{{concentrado.fecha_de_inicio}}</label></td>
                                                <td><label>{{concentrado.fecha_compromiso}}</label></td>
                                                <td><label>{{concentrado.fecha_real_cierre}}</label></td>
                                                <td>
                                                    <select class="inputs-concentrado" v-model="var_usuario_y_analista_de_factibilidad" v-if="actualizar_sugerencia==index+1">
                                                        <option value="" disabled>Seleccione analista..</option>
                                                        <option v-for="analistas_factibilidad in lista_usuarios_y_analistas_factibilidad" :key="analistas_factibilidad.nombre" :value="analistas_factibilidad.nombre">{{analistas_factibilidad.nombre}}</option>
                                                    </select>
                                                    <label v-else>{{concentrado.analista_de_factibilidad}}</label>
                                                </td> 
                                                <td><input  class="inputs-concentrado" type="text" v-model="var_impacto_planeado" name="impacto planeado" v-if="actualizar_sugerencia==index+1 && concentrado.status=='Implementada'"></input><label v-else>{{concentrado.impacto_planeado}}</label></td>
                                                <td><input class="inputs-concentrado" type="text" v-model="var_impacto_real" name="impacto_real" v-if="actualizar_sugerencia==index+1 && concentrado.status=='Implementada'"></input><label v-else>{{concentrado.impacto_real}}</label></td>
                                                <td><label>{{usuario}}</label></td>
                                                <td><label v-if="actualizar_sugerencia==index+1"><?php echo date("d-m-Y"); ?></label><label v-else>{{concentrado.creado}}</label></td>
                                                <td>{{concentrado.modificado_por}}</td>
                                                <td>{{concentrado.modificado}}</td>
                                                <!--<td><button type="button" class="btn btn-danger" title="Eliminar" @click="eliminar_sugerencia(concentrado.id)"><i class="bi bi-trash"></button></i></td>-->
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>



                            <!-- Modal Eliminar/Actualizar-->
                            <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="exampleModalLabel" >{{titulo_modal}} </h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                        <div class="text-center" v-if="contenido_modal_agregar_eliminar=='Agregar' && tipo_agregar_eliminar!='Analista'">
                                                <input class="text-center border rounded-2 w-100" placeholder="Digite el nuevo registro" v-model="nueva_opcion"></input>
                                        </div>
                                        <div v-if="contenido_modal_agregar_eliminar=='Eliminar' && tipo_agregar_eliminar=='Planta'">
                                              <div class="row mt-1 mb-2  d-flex align-items-center" v-for="(lis_plantas,index) in lista_planta" >
                                                    <div class="col-10 text-center bg-secondary text-light"> {{index+1}} .- {{lis_plantas.planta}}</div>
                                                    <div class="col-2"><button type="button" class="btn btn-danger"  @click="eliminar_elementos_lista(lis_plantas.id)">x</button></div>
                                             </div>
                                        </div>
                                        <div v-if="contenido_modal_agregar_eliminar=='Eliminar' && tipo_agregar_eliminar=='Area'">
                                              <div class="row mt-1 mb-2  d-flex align-items-center" v-for="(lis_area,index) in lista_area" >
                                                    <div class="col-10 text-center bg-secondary text-light"> {{index+1}} .- {{lis_area.area}}</div>
                                                    <div class="col-2"><button type="button" class="btn btn-danger"  @click="eliminar_elementos_lista(lis_area.id)">x</button></div>
                                             </div>
                                        </div>
                                        <div v-if="contenido_modal_agregar_eliminar=='Eliminar' && tipo_agregar_eliminar=='Area Participante'">
                                              <div class="row mt-1 mb-2  d-flex align-items-center" v-for="(lis_area_participante,index) in lista_area_participante" >
                                                    <div class="col-10 text-center bg-secondary text-light"> {{index+1}} .- {{lis_area_participante.area_participante}}</div>
                                                    <div class="col-2"><button type="button" class="btn btn-danger"  @click="eliminar_elementos_lista(lis_area_participante.id)">x</button></div>
                                             </div>
                                        </div>
                                        <div v-if="contenido_modal_agregar_eliminar=='Eliminar' && tipo_agregar_eliminar=='Subarea'">
                                              <div class="row mt-1 mb-2  d-flex align-items-center" v-for="(lis_subarea,index) in lista_subarea" >
                                                    <div class="col-10 text-center bg-secondary text-light"> {{index+1}} .- {{lis_subarea.subarea}}</div>
                                                    <div class="col-2"><button type="button" class="btn btn-danger"  @click="eliminar_elementos_lista(lis_subarea.id)">x</button></div>
                                             </div>
                                        </div>
                                        <div v-if="contenido_modal_agregar_eliminar=='Eliminar' && tipo_agregar_eliminar=='Impacto'">
                                              <div class="row mt-1 mb-2  d-flex align-items-center" v-for="(lis_impacto,index) in lista_impacto_primario" >
                                                    <div class="col-10 text-center bg-secondary text-light"> {{index+1}} .- {{lis_impacto.impacto}}</div>
                                                    <div class="col-2"><button type="button" class="btn btn-danger"  @click="eliminar_elementos_lista(lis_impacto.id)">x</button></div>
                                             </div>
                                        </div>
                                        <div v-if="contenido_modal_agregar_eliminar=='Eliminar' && tipo_agregar_eliminar=='Desperdicio'">
                                              <div class="row mt-1 mb-2  d-flex align-items-center" v-for="(lis_desperdicio,index) in lista_tipo_desperdicio" >
                                                    <div class="col-10 text-center bg-secondary text-light"> {{index+1}} .- {{lis_desperdicio.tipo_de_desperdicio}}</div>
                                                    <div class="col-2"><button type="button" class="btn btn-danger"  @click="eliminar_elementos_lista(lis_desperdicio.id)">x</button></div>
                                             </div>
                                        </div>
                                        <div v-if="contenido_modal_agregar_eliminar=='Eliminar' && tipo_agregar_eliminar=='Calidad'">
                                              <div class="row mt-1 mb-2  d-flex align-items-center" v-for="(lis_calidad,index) in objetivo_de_calidadMA" >
                                                    <div class="col-10 text-center bg-secondary text-light"> {{index+1}} .- {{lis_calidad.objetivos_de_calidad}}</div>
                                                    <div class="col-2"><button type="button" class="btn btn-danger"  @click="eliminar_elementos_lista(lis_calidad.id)">x</button></div>
                                             </div>
                                        </div>
                                        <div v-if="contenido_modal_agregar_eliminar=='Eliminar' && tipo_agregar_eliminar=='Analista'">
                                              <div class="row mt-1 mb-2  d-flex align-items-center" v-for="(lis_calidad,index) in lista_analista_factibilidad" >
                                                    <div class="col-10 text-center bg-secondary text-light"> {{index+1}} .- {{lis_calidad.nombre}}</div>
                                                    <div class="col-2"><button type="button" class="btn btn-danger"  @click="eliminar_elementos_lista(lis_calidad.id)">x</button></div>
                                             </div>
                                        </div>

                                        <div class="text-center" v-if="contenido_modal_agregar_eliminar=='Agregar' && tipo_agregar_eliminar=='Analista'">
                                                <input class="text-center border rounded-2 w-100 mt-3" placeholder="Nombre del analista" v-model="nueva_opcion"></input><br>
                                                <input class="text-center border rounded-2 w-100 mt-3" placeholder="Correo" v-model="correo_analista"></input>
                                        </div>

                                        <div class="text-center" v-if="contenido_modal_agregar_eliminar=='Subir'">
                                                <form @submit.prevent="uploadFile()">
                                                    <!--Subir Documento Sugerencia-->
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="custom-file my-5"> 
                                                                <input type="file" id="input_file_subir"  ref="archivosydocumentos" multiple required/>{{extensiones_valida}}</input>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <button  type="submit" name="upload" class="btn btn-primary">Subir Archivos </button>
                                                        </div>
                                                    </div> 
                                                       
                                                        <!-- Mostrando los archivos nuevos cargados -->
                                                        <!--<div v-show="filenames.length>0 && cual_documento=='sugerencia'" >
                                                        <hr>
                                                                <div class="col-12" v-for= "(filename,index) in filenames">
                                                                    <div class="row">
                                                                    <span class="badge bg-success">Nuevo documento  {{index+1}} agregado</span>
                                                                            <div class="">
                                                                                <button type="button" class="btn btn-danger" @click="eliminarDocumento(filename)" >Eliminar</button>
                                                                            </div>
                                                                        <iframe  :src="filenames[index]" style="width:100%;height:500px;"></iframe>
                                                                    </div>
                                                                  //iframe src="https://vvnorth.com/Sugerencias/documentos/pdf.pdf" style="width:100%;height:500px;"></iframe>
                                                                </div>
                                                        </div>-->
                                                       
                                                        <!-- Mostrando los archivos cargados -->
                                                        <div v-show="filedoc.length>0 && cual_documento=='sugerencia'" >
                                                        <hr>
                                                                <div class="col-12" v-for= "(filedocsug,index) in filedoc">
                                                                    <div class="row">
                                                                        <span class="badge bg-secondary">Documento {{index+1}}</span><br>
                                                                            <div class="">
                                                                                <button type="button" class="btn btn-danger" @click="eliminarDocumento(filedocsug)" >Eliminar</button>
                                                                            </div>
                                                                    </div>
                                                                    <iframe  :src="filedoc[index]" style="width:100%;height:500px;"></iframe>
                                                                    
                                                                   <!-- <iframe src="https://vvnorth.com/Sugerencias/documentos/pdf.pdf" style="width:100%;height:500px;"></iframe>-->
                                                                </div>
                                                        </div>

                                                         <!-- Mostrando los archivos nuevos y cargados de PPT-->
                                                         <div v-show="fileppt.length>0 && cual_documento=='ppt'" >
                                                         <hr>
                                                                <div class="col-12" v-for= "(fileppts,index) in fileppt">
                                                                    <div class="row">
                                                                        <span class="badge bg-secondary">Documento {{index+1}}</span><br>
                                                                            <div class="col-12 col-md-12">
                                                                                <button type="button" class="btn btn-danger" @click="eliminarDocumento(fileppts)" >Eliminar</button>
                                                                            </div>
                                                                            <div class="col-12 col-md-12 mt-5">
                                                                            Descargar<br>
                                                                                <a :href="fileppts" download="Presentacion.pptx">
                                                                                    <img src="img/descargar_ppt.png" style="width:100px; height:100px;"></img>
                                                                                </a>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                         </div>
                                                        <hr>
                                                    <!---->
                                                    <!---->
                                                </form>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button v-if="contenido_modal_agregar_eliminar=='Agregar'" type="button" class="btn btn-primary "  data-bs-dismiss="modal" @click="agregar_nuevo_lista">Guardar</button>
                                </div>
                                </div>
                            </div>
                            </div>
                   </div>
                  <!--////////////////////////////////////////////////////////APARTADO PREMIOS SUGERENCIAS-->
                   <div v-else-if="ventana=='premios'" v-cloak>
                            <!--cinta apartado-->
                            <div class="row justify-content-center align-items-start ">
                                <div class="cintilla col-12 text-center">
                                   <b> ADMINISTRACIÓN DE PREMIOS </b>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12"><!--Agregar Premios-->
                                        <div class="text-center mt-3">
                                            <span class="badge bg-secondary">Agregar Productos</span>
                                        </div>
                                        <div class="div-scroll">
                                            <table class="tablaMonitoreo-sugerencias table table-striped table-bordered ">
                                            <thead class="encabezado-tabla text-center text-light ">
                                                <tr >
                                                    <th scope="col " class="sticky">Agregar</th>
                                                    <th scope="col">Código<span class="badge bg-primary">*</span></th>
                                                    <th scope="col">Descripción <span  class="badge bg-primary">*</span></th>
                                                    <th scope="col">Puntos para canjer<span class="badge bg-primary">*</span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-show="bandera_editar==false" class=" text-center">
                                                
                                                        <td class="align-middle sticky" style="  background: #f8f9fa;">
                                                        <button  class="btn btn-primary" title="Guardar Reto" @click="guardarActualizarPremios('','','Insertar')"><i class="bi bi-check-circle"></i></button>       
                                                        </td>
                                                        <td>
                                                            <input class="inputs-concentrado" type="text" v-model="codigo_premios" required></input>                  
                                                        </td>
                                                        <td>  
                                                            <textarea class="inputs-concentrado text-area" type="text" v-model="descripcion_premios" required></textarea>                 
                                                        </td>
                                                        <td>
                                                            <input class="inputs-concentrado" type="number" v-model="puntos_canjear_premios" required></input>   
                                                        </td>
                                                </tr>
                                            </tbody>
                                            </table>
                                        </div>
                                </div><!--Fin Agregar Primerios-->
                                <div class="col-12"><!--Catalago de Premios-->
                                        <div class="text-center mt-3">
                                                <span class="badge bg-secondary">Catálogo de Premios</span>
                                        </div>
                                        <div class="div-scroll">
                                                    <table class="tablaMonitoreo-sugerencias table table-striped table-bordered ">
                                                    <thead class="encabezado-tabla text-center text-light ">
                                                        <tr >
                                                            <th scope="col" class="sticky">Editar/ Subir Imagen</th>
                                                            <th scope="col">No.</th>
                                                            <th scope="col">Imagen</th>
                                                            <th scope="col">Código</th>
                                                            <th scope="col">Descripción</th>
                                                            <th scope="col">Puntos para canjer</th>
                                                            <th scope="col">Eliminar</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class=" text-center align-middle " v-for="(premios, index) in concentrado_premios">
                                                                 
                                                                <td class="sticky" style=" background: rgb(194, 194, 194)">
                                                                            
                                                                            <button v-if="actualizar_premios==index+1" type="button" class="btn btn-danger me-2" title="Cancelar" @click="editaPremio(0)" ><i class="bi bi-x-circle" ></i></button>
                                                                            <button v-show="bandera_editar_premio==false" type="button" class="btn btn-warning me-2" title="Actualizar" @click="editaPremio(index+1)"><i class="bi bi-pen" ></i></button>
                                                                            <button v-if="actualizar_premios==index+1" class="btn btn-primary me-2" title="Guardar Reto" @click="guardarActualizarPremios(0,premios.id,'Actualizar')"><i class="bi bi-check-circle"></i></button> 
                                                                            <button v-if="premios.cant_img>0" type="button" class="btn btn-success" title="Subir Imagen"  @click="modal_subir_ver_documentos('Subir',premios.id,premios.codigo_premio,'premio',premios.cant_img)" ><i class="bi bi-paperclip">{{premios.cantidad_img}}</i></button>
                                                                            <button v-else type="button" class="btn btn-secondary " title="Subir Imagen"  @click="modal_subir_ver_documentos('Subir',premios.id,premios.codigo_premio,'premio',premios.cant_img)" ><i class="bi bi-paperclip">{{premios.cantidad_img}}</i></button>    
                                                                </td>
                                                                <td>
                                                                
                                                                     <label><b>{{index+1}}</b></label>
                                                                </td>
                                                                <td>
                                                               <!-- <img class="img-thumbnail min-w-25" style="max-width:100px" :src="'http://localhost/sugerencias/'+premios.url_premio" />-->
                                                                <img class="img-thumbnail min-w-25" style="max-width:100px" :src="premios.url_premio" />
                                                                </td>
                                                                <td>
                                                                    <input v-if="actualizar_premios==index+1"  class="inputs-concentrado" type="text" v-model="act_codigo_premio" required></input>
                                                                    <label  v-else>{{premios.codigo_premio}}</label>
                                                                </td>
                                                                <td>
                                                                    <input v-if="actualizar_premios==index+1"  class="inputs-concentrado" type="text" v-model="act_descripcion_premios" required></input>
                                                                    <label v-else>{{premios.descripcion}}</label>                  
                                                                </td>
                                                                <td>
                                                                    <input v-if="actualizar_premios==index+1"  class="inputs-concentrado" type="text" v-model="act_puntos_premios" required></input>
                                                                    <label v-else >{{premios.puntos_para_canjear}}</label> 
                                                                </td>    
                                                                <td>
                                                                    <button type="button" class="btn btn-danger" title="Eliminar" @click="eliminarPremio(premios.id,premios.url_premio,premios.cant_img)"><i class="bi bi-trash"></button></i>
                                                                </td>
                                                        </tr>
                                                    </tbody>
                                                    </table>
                                                </div>
                                            
                            </div><!--Fin Premio Vigentes-->

                        <!--Inicio Modal subir imagen en premio-->
                        <!-- Modal Eliminar/Actualizar-->
                        <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="exampleModalLabel" >{{titulo_modal}} </h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                        <div class="text-center" v-if="contenido_modal_agregar_eliminar=='Subir'">
                                                <form @submit.prevent="uploadFile()">
                                                    <!--Subir Documento Sugerencia-->
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="custom-file my-5"> 
                                                                <input type="file" id="input_file_subir"  ref="ref_premio" multiple required/>{{extensiones_valida}}</input>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <button  type="submit" name="upload" class="btn btn-primary">Subir Archivos </button>
                                                        </div>
                                                    </div> 
                                                       
                                                          <!-- Mostrando los archivos cargados -->
                                                        <div v-show="filepremio.length>0 && cual_documento=='premio'" >
                                                        <hr>
                                                                <div class="col-12" v-for= "(fileprem,index) in filepremio">
                                                                    <div class="row">
                                                                        <span class="badge bg-secondary">Documento {{index+1}}</span><br>
                                                                            <div class="">
                                                                                <button type="button" class="btn btn-danger" @click="eliminarDocumento(fileprem)" >Eliminar</button>
                                                                            </div>
                                                                    </div>
                                                                    <iframe  :src="filepremio[index]" style="width:100%;height:500px;"></iframe>
                                                                    
                                                                   <!-- <iframe src="https://vvnorth.com/Sugerencias/documentos/pdf.pdf" style="width:100%;height:500px;"></iframe>-->
                                                                </div>
                                                        </div>
                                                </form>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                                </div>
                            </div>
                            </div>
                        <!--Fin Modal subir imagenes en retos-->


                        </div><!--Fin apartado premios-->

                        <!--Inicio Modal subir imagen en retos-->
                        <!-- Modal Eliminar/Actualizar-->
                            <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="exampleModalLabel" >{{titulo_modal}} </h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                        <div class="text-center" v-if="contenido_modal_agregar_eliminar=='Subir'">
                                                <form @submit.prevent="uploadFile()">
                                                    <!--Subir Documento Sugerencia-->
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="custom-file my-5"> 
                                                                <input type="file" id="input_file_subir"  ref="archivosydocumentos" multiple required/>{{extensiones_valida}}</input>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <button  type="submit" name="upload" class="btn btn-primary">Subir Archivos </button>
                                                        </div>
                                                    </div> 
                                                          <!-- Mostrando los archivos cargados -->
                                                        <div v-show="filereto.length>0 && cual_documento=='reto'" >
                                                        <hr>
                                                                <div class="col-12" v-for= "(fileimgreto,index) in filereto">
                                                                    <div class="row">
                                                                        <span class="badge bg-secondary">Documento {{index+1}}</span><br>
                                                                            <div class="">
                                                                                <button type="button" class="btn btn-danger" @click="eliminarDocumento(fileimgreto)" >Eliminar</button>
                                                                            </div>
                                                                    </div>
                                                                    <iframe  :src="filereto[index]" style="width:100%;height:500px;"></iframe>
                                                                    
                                                                   <!-- <iframe src="https://vvnorth.com/Sugerencias/documentos/pdf.pdf" style="width:100%;height:500px;"></iframe>-->
                                                                </div>
                                                        </div>
                                                </form>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                                </div>
                            </div>
                            </div>
                        <!--Fin Modal subir imagenes en retos-->
                             <!--fin cinta apartado-->
                            <!-- contenido principal gonher-->
                            
                             <!--fin contenido principal gonher-->
                   </div>
                   <!--//////////////////////////////////////////////////////APARTADO ADMINISTRACION DE RETOS-->
                   <div v-else-if="ventana=='retos'" v-cloak>
                            <div class="row justify-content-center align-items-start ">
                                <div class="cintilla col-12 text-center">
                                   <b> ADMINISTRACIÓN DE RETOS</b>
                                </div>
                            </div>
                        
                        <div class="row">
                                <div class="col-12"><!--Agregar reto-->
                                        <div class="text-center mt-3">
                                            <span class="badge bg-secondary">Agregar Reto</span>
                                        </div>
                                        <div class="div-scroll">
                                            <table class="tablaMonitoreo-sugerencias table table-striped table-bordered ">
                                            <thead class="encabezado-tabla text-center text-light ">
                                                <tr >
                                                <th scope="col " class="sticky">Guardar<span  class="badge bg-primary">*</span></th>
                                                <th scope="col">Título de Reto <span class="badge bg-primary">*</span></th>
                                                <th scope="col">Descripción del Reto <span  class="badge bg-primary">*</span></th>
                                                <th scope="col">Responsable <span class="badge bg-primary">*</span></th>
                                                <th scope="col">Planta <span class="badge bg-primary">*</span></th>
                                                <th scope="col">Área <span class="badge bg-primary">*</span></th>
                                                <th scope="col">Subárea <span  class="badge bg-primary">*</span></th>
                                                <th scope="col">Folio</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-show="bandera_editar==false" class=" text-center">
                                                
                                                        <td class="align-middle sticky" style="  background: rgb(94, 94, 94);">
                                                                <button type="submit" class="btn btn-primary" title="Guardar Reto" @click="agregarReto('Insertar')"><i class="bi bi-check-circle"></i></button> 
                                                        </td>
                                                        <td>
                                                            <textarea class="inputs-concentrado text-area" type="text"  v-model="titulo_del_reto" required></textarea>                   
                                                        </td>
                                                        <td>  
                                                            <textarea class="inputs-concentrado text-area" type="text" v-model="descripcion_del_reto" required></textarea>                 
                                                        </td>
                                                        <td>
                                                            <select class="inputs-concentrado" v-model="responsable_del_reto" required>
                                                                <option value="" disabled>Seleccione analista..</option>
                                                                <option v-for="analistas_factibilidad in lista_usuarios_y_analistas_factibilidad" :key="analistas_factibilidad.nombre" :value="analistas_factibilidad.nombre">{{analistas_factibilidad.nombre}}</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select  class="inputs-concentrado"  @change="generarFolio()" v-model="planta_en_reto" required>
                                                                    <option value=""  disabled>Seleccione la planta...</option>
                                                                    <option v-for="planta in lista_planta" :key="planta.planta" :value="planta.planta">{{planta.planta}}</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="inputs-concentrado" @change="generarFolio()" v-model="area_en_reto" required> 
                                                                    <option value="" disabled>Seleccione el área...</option>
                                                                    <option  v-for="area in lista_area" :key="area.area" :value="area.area">{{area.area}}</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                                    <select class="inputs-concentrado" v-model="subarea_en_reto" required>
                                                                        <option value="" disabled>Seleccione Subárea...</option>
                                                                        <option v-for="subarea in lista_subarea" :key="subarea.subarea" :value="subarea.subarea">{{subarea.subarea}}</option>
                                                                    </select>         
                                                        </td>
                                                        <td>
                                                                <input class="inputs-concentrado fw-bold" type="text"  v-model="folio_del_reto" disabled></input>                           
                                                        </td>
                                                    
                                                </tr>
                                            </tbody>
                                            </table>
                                        </div>
                                </div><!--Fin Agregar reto-->
                                <div class="col-12"><!--Reto Vigentes-->
                                        <div class="text-center mt-3">
                                                <span class="badge bg-secondary">Retos Vigentes</span>
                                        </div>
                                        <div class="div-scroll">
                                                    <table class="tablaMonitoreo-sugerencias table table-striped table-bordered ">
                                                    <thead class="encabezado-tabla text-center text-light ">
                                                        <tr >
                                                        <th scope="col" class="sticky">Guardar </th>
                                                        <th>No. #</th>
                                                        <th scope="col">Status </th>
                                                        <th scope="col">Reto </th>
                                                        <th scope="col">Descripción</th>
                                                        <th scope="col">Responsable </th>
                                                        <th scope="col">Planta </th>
                                                        <th scope="col">Área </th>
                                                        <th scope="col">Subárea </th>
                                                        <th scope="col">Ingreso</th>
                                                        <th scope="col">Folio</th>
                                                        <th scope="col">Eliminar</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class=" text-center align-middle " v-for="(retos, index) in concentrado_retos">
                                                                 
                                                                <td class="sticky" style=" background: rgb(194, 194, 194)">
                                                                            
                                                                <button v-if="actualizar_reto==index+1" type="button" class="btn btn-danger me-2" title="Cancelar" @click="editaReto(0)" ><i class="bi bi-x-circle" ></i></button>
                                                                            <button v-show="bandera_editar==false" type="button" class="btn btn-warning me-2" title="Actualizar" @click="editaReto(index+1)"><i class="bi bi-pen" ></i></button>
                                                                            <button v-show="bandera_editar==true" class="btn btn-primary me-2" title="Guardar Reto" @click="guardarActualizacionReto(0,retos.id,'Actualizar')"><i class="bi bi-check-circle"></i></button> 
                                                                            <button v-if="retos.cantidad_img>0" type="button" class="btn btn-success  ms-2" title="Subir Imagen" @click="modal_subir_ver_documentos('Subir',retos.id,retos.folio_reto,'reto',retos.cantidad_img)"><i class="bi bi-paperclip">{{retos.cantidad_img}}</i></button>
                                                                            <button v-else type="button" class="btn btn-secondary " title="Subir Imagen" @click="modal_subir_ver_documentos('Subir',retos.id,retos.folio_reto,'reto',retos.cantidad_img)" ><i class="bi bi-paperclip">{{retos.cantidad_img}}</i></button>    
                                                                </td>
                                                                <td >
                                                                     <label><b>{{index+1 }}</b></label>
                                                                </td>
                                                                <td>
                                                                    <select v-if="actualizar_reto==index+1" class="inputs-concentrado" v-model="act_status_reto" required>
                                                                        <option v-for="tipo_status in tipo_status_reto"  :value="tipo_status">{{tipo_status}}</option>
                                                                    </select>
                                                                    <label  v-else>{{retos.status_reto}}</label>
                                                                </td>
                                                                <td>
                                                                    <textarea v-if="actualizar_reto==index+1" class="inputs-concentrado text-area" type="text"  v-model="act_titulo_del_reto" required></textarea> 
                                                                    <label v-else>{{retos.titulo_reto}}</label>                  
                                                                </td>
                                                                <td>  
                                                                    <textarea v-if="actualizar_reto==index+1" class="inputs-concentrado text-area" type="text" v-model="act_descripcion_del_reto" required></textarea>  
                                                                    <label  v-else>{{retos.descripcion_reto}}</label>               
                                                                </td>
                                                                <td>
                                                                    <select v-if="actualizar_reto==index+1" class="inputs-concentrado" v-model="act_responsable_del_reto" required>
                                                                        <option value="" disabled>Seleccione analista..</option>
                                                                        <option v-for="analistas_factibilidad in lista_usuarios_y_analistas_factibilidad" :key="analistas_factibilidad.nombre" :value="analistas_factibilidad.nombre">{{analistas_factibilidad.nombre}}</option>
                                                                    </select>
                                                                    <label  v-else>{{retos.responsable_reto}}</label>
                                                                </td>
                                                                <td>
                                                                    <!--<select v-if="actualizar_reto==index+1"  class="inputs-concentrado" v-model="act_planta_en_reto" required>
                                                                            <option value=""  disabled>Seleccione la planta...</option>
                                                                            <option @click="generarFolio()" v-for="planta in lista_planta" :key="planta.planta" :value="planta.planta">{{planta.planta}}</option>
                                                                    </select>-->
                                                                    <label>{{retos.planta_reto}}</label>
                                                                </td>
                                                                <td>
                                                                    <!--<select v-if="actualizar_reto==index+1" class="inputs-concentrado" v-model="act_area_en_reto" required> 
                                                                            <option value="" disabled>Seleccione el área...</option>
                                                                            <option @click="generarFolio()" v-for="area in lista_area" :key="area.area" :value="area.area">{{area.area}}</option>
                                                                    </select>-->
                                                                    <label>{{retos.area_reto}}</label> 
                                                                </td>
                                                                <td>
                                                                        <select v-if="actualizar_reto==index+1" class="inputs-concentrado" v-model="act_subarea_en_reto" required>
                                                                            <option value="" disabled>Seleccione Subárea...</option>
                                                                            <option v-for="subarea in lista_subarea" :key="subarea.subarea" :value="subarea.subarea">{{subarea.subarea}}</option>
                                                                        </select>
                                                                    <label  v-else>{{retos.subarea_reto}}</label>         
                                                                </td>
                                                                <td>
                                                                    <label>{{retos.fecha}}</label>
                                                                </td>
                                                                <td>
                                                                    <label>{{retos.folio_reto}}</label>                           
                                                                </td>
                                                                <td>
                                                                    <button type="button" class="btn btn-danger" title="Eliminar" @click="eliminarReto(retos.id)"><i class="bi bi-trash"></button></i>
                                                                </td>
                                                            
                                                        </tr>
                                                    </tbody>
                                                    </table>
                                                </div>
                            </div><!--Fin Reto Vigentes-->
                        </div>

                        <!--Inicio Modal subir imagen en retos-->
                        <!-- Modal Eliminar/Actualizar-->
                            <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="exampleModalLabel" >{{titulo_modal}} </h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                        <div class="text-center" v-if="contenido_modal_agregar_eliminar=='Subir'">
                                                <form @submit.prevent="uploadFile()">
                                                    <!--Subir Documento Sugerencia-->
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="custom-file my-5"> 
                                                                <input type="file" id="input_file_subir"  ref="archivosydocumentos" multiple required/>{{extensiones_valida}}</input>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <button  type="submit" name="upload" class="btn btn-primary">Subir Archivos </button>
                                                        </div>
                                                    </div> 
                                                       
                                                          <!-- Mostrando los archivos cargados -->
                                                        <div v-show="filereto.length>0 && cual_documento=='reto'" >
                                                        <hr>
                                                                <div class="col-12" v-for= "(fileimgreto,index) in filereto">
                                                                    <div class="row">
                                                                        <span class="badge bg-secondary">Documento {{index+1}}</span><br>
                                                                            <div class="">
                                                                                <button type="button" class="btn btn-danger" @click="eliminarDocumento(fileimgreto)" >Eliminar</button>
                                                                            </div>
                                                                    </div>
                                                                    <iframe  :src="filereto[index]" style="width:100%;height:500px;"></iframe>
                                                                    
                                                                   <!-- <iframe src="https://vvnorth.com/Sugerencias/documentos/pdf.pdf" style="width:100%;height:500px;"></iframe>-->
                                                                </div>
                                                        </div>
                                                </form>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                                </div>
                            </div>
                            </div>
                        <!--Fin Modal subir imagenes en retos-->
                            
                   </div>
                   <div v-else-if="ventana=='configuracion'" v-cloak>
                    <!--//////////////////////////////////////////////////////////////////////////////APARTADO CONFIGURACIÓN-->
                    
                                <div class="row justify-content-center align-items-start ">
                                        <div class="cintilla col-12 text-center">
                                        <b> CONFIGURACIÓN</b>
                                        </div>
                                </div>
                                <div class="row  justify-content-center align-items-center">
                                   
                                                <div class="col-12 col-sm-6  col-lg-4 col-xl-3 bg-light ms-3  ms-sm-0 mt-2   border bordered-2 border-secondary rounded-2">
                                                    <form @submit.prevent="guardar_admin_y_analista" class="m-2 ">
                                                    <div class="text-center"><span class="badge text-dark ">ALTA DE ADMIN/ANALISTAS.</span></div>
                                                        <div class="mb-3">
                                                        <div><span class="badge text-dark">Usuario (No. de Nómina):</span></div>
                                                            <input type="text" class="form-control" v-model="nuevo_usuario"  required>
                                                        </div>
                                                        <div class="mb-3">
                                                        <div><span class="badge text-dark">Password:</span></div>
                                                            <input type="text" class="form-control" v-model="nuevo_password" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <div><span class="badge text-dark">Nombre Completo:</span></div>
                                                            <input type="text"   class="form-control" v-model="nuevo_nombre" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <div><span class="badge text-dark">Correo:</span></div>
                                                            <input type="email" class="form-control" v-model="nuevo_correo" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <div><span class="badge text-dark">Departamento:</span></div>
                                                            <select class="form-control" v-model="nuevo_departamento" required>
                                                                <option value="" disabled>Seleccione departamento...</option>
                                                                <option v-for="area_part in lista_area_participante" :value="area_part.area_participante">{{area_part.area_participante}}</option>
                                                            </select> 

                                                        </div>
                                                        <div class="mb-3">
                                                            <div><span class="badge text-dark">Tipo:</span></div>
                                                            <select class="form-control" v-model="var_tipo_usuario" required>
                                                                <option value="" disabled>Seleccione tipo...</option>
                                                                <option v-for="array_tipo in array_tipo_usuario" :value="array_tipo">{{array_tipo}}</option>
                                                            </select> 
                                                        </div>
                                                    
                                                        <div class="text-center">
                                                            <button class="boton-nuevo" > Aceptar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-12 ">
                                                            <div class="text-center pt-3 ">
                                                                <span class="badge bg-light text-dark" style="font-size:0.7em;">Administradores / Analistas / Responsables</span>
                                                            </div>
                                                            <div class="" style=" height:20vh; overflow-x: scroll;">
                                                                <table class="tablaMonitoreo-sugerencias table table-striped table-bordered ">
                                                                <thead class="encabezado-tabla text-center text-light ">
                                                                    <tr >
                                                                        <th scope="col" class="sticky">Editar</th>
                                                                        <th scope="col">Usuario</th>
                                                                        <th scope="col">Password</th>
                                                                        <th scope="col">Email </th>
                                                                        <th scope="col">Nombre</th>
                                                                        <th scope="col">Departamento</th>
                                                                        <th scope="col">Tipo {{}}</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr v-for="(admis_usuarios, index) in array_usuarios">
                                                                        <td>
                                                                            <button v-if="id_update==index+1" type="button" class="btn btn-danger me-2" title="Cancelar" @click="editarUsuarios(0,0)" ><i class="bi bi-x-circle" ></i></button>
                                                                            <button v-if="bandera_editar_user == false" type="button" class="btn btn-warning me-2" title="Actualizar" @click="editarUsuarios(1,index+1)"><i class="bi bi-pen" ></i></button>
                                                                            <button v-if="id_update==index+1" class="btn btn-primary me-2" title="Guardar" @click="actualizar_admin_y_analista(admis_usuarios.id)"><i class="bi bi-check-circle"></i></button> 
                                                                        </td>
                                                                        <td> 
                                                                            <input v-if="id_update==index+1" class="inputs-concentrado" type="text" v-model="u_user"/> 
                                                                            <label v-else>{{admis_usuarios.user}}</label>
                                                                        </td>
                                                                        <td><input v-if="id_update==index+1" class="inputs-concentrado" type="text" v-model="u_password"/> 
                                                                            <label v-else>{{admis_usuarios.password}}<label>
                                                                        </td>
                                                                        <td><input v-if="id_update==index+1" class="inputs-concentrado" type="text" v-model="u_email"/> 
                                                                            <label v-else>{{admis_usuarios.email}}<label>
                                                                        </td>
                                                                        <td><input v-if="id_update==index+1" class="inputs-concentrado" type="text" v-model="u_nombre"/> 
                                                                            <label v-else>{{admis_usuarios.nombre}}<label>
                                                                        </td>    
                                                                        <td>
                                                                            <select v-if="id_update==index+1" class="inputs-concentrado" v-model="u_departamento" required>
                                                                                <option value="" disabled>Seleccione departamento...</option>
                                                                                <option v-for="area_part in lista_area_participante" :value="area_part.area_participante">{{area_part.area_participante}}</option>
                                                                            </select> 
                                                                            <label v-else>{{admis_usuarios.departamento}}<label>
                                                                        </td>    
                                                                        <td>
                                                                            <select  v-if="id_update==index+1" class="inputs-concentrado" v-model="u_tipo" required>
                                                                                <option value="" disabled>Seleccione tipo...</option>
                                                                                <option v-for="array_tipo in array_tipo_usuario" :value="array_tipo">{{array_tipo}}</option>
                                                                            </select> 
                                                                            <label v-else>{{admis_usuarios.tipo}}<label>
                                                                        </td>    
                                                                    </tr>
                                                                </tbody>
                                                                </table>
                                                            </div>          
                                                </div>
                                </div>
                   </div>
                   <div v-else-if="ventana=='solicitados'" v-cloak>
                    <!--//////////////////////////////////////////////////////////////////////////////APARTADO CONFIGURACIÓN-->
                    
                                <div class="row justify-content-center align-items-start ">
                                        <div class="cintilla col-12 text-center">
                                        <b>PREMIOS SOLICITADOS</b>
                                        </div>
                                </div>
                                <div class="row  justify-content-center align-items-center">
                                                            <div class="text-center pt-3 ">
                                                                <span class="badge bg-light text-dark" style="font-size:0.7em;">Listado de Premios Solicitados</span>
                                                            </div>
                                                            <div class="" style="height:70vh; overflow-x: scroll;">
                                                                <table class="tablaMonitoreo-sugerencias table table-striped table-bordered ">
                                                                <thead class="encabezado-tabla text-center text-light ">
                                                                    <tr>
                                                                        <th scope="col" class="sticky">Editar</th>
                                                                        <th scope="col">Número de Nómina</th>
                                                                        <th scope="col">Colaborador</th>
                                                                        <th scope="col">Planta</th>
                                                                        <th scope="col">Área de Participante</th>
                                                                        <th scope="col">Fecha de Solicitud</th>
                                                                        <th scope="col">Código de Premio</th>
                                                                        <th scope="col">Cantidad (Pzs.)</th>
                                                                        <th scope="col">No. Solped</th>
                                                                        <th scope="col">Status</th>
                                                                        <!--<th scope="col">Entregado</th>-->
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr class="text-center" v-for="(status_premios, index) in concentrado_status_premios">    
                                                                         <td>
                                                                            <button v-if="id_updates==index+1" type="button" class="btn btn-danger me-2" title="Cancelar" @click="editarStutasPremioSolicitado(0,0)" ><i class="bi bi-x-circle" ></i></button>
                                                                            <button v-if="bandera_editar_solicitud == false" type="button" class="btn btn-warning me-2" title="Actualizar" @click="editarStutasPremioSolicitado(1,index+1)"><i class="bi bi-pen" ></i></button>
                                                                            <button v-if="id_updates==index+1" class="btn btn-primary me-2" title="Guardar" @click="guardarStutasPremioSolicitado(status_premios.id)"><i class="bi bi-check-circle"></i></button> 
                                                                            <button v-if="status_premios.status=='Entregado'" type="button" class="btn btn-success  ms-2" title="Subir Imagen" @click="modal_subir_ver_documentos('Subir',status_premios.id,status_premios.solped,'entregado',status_premios.cant_img_evidencia)"><i class="bi bi-paperclip"></i>{{status_premios.cant_img_evidencia}}</button>
                                                                            <button v-else-if="status_premios.solped!='' && status_premios.status=='Pte. Entrega'" type="button" class="btn btn-secondary" type="button" title="Subir evidencia de la entrega del premios." @click="modal_subir_ver_documentos('Subir',status_premios.id,status_premios.solped,'entregado',status_premios.cant_img_evidencia)"><i class="bi bi-paperclip"></i>{{concentrado_status_premios.cant_img_evidencia}}</button> 
                                                                            <button v-else-if="status_premios.solped==''" title="Coloque número de solped para que se active." class="btn btn-secondary" disabled><i class="bi bi-paperclip"></i></button>  
                                                                        </td> 
                                                                        <td >
                                                                                {{status_premios.numero_nomina}}
                                                                        </td>  
                                                                        <td>
                                                                                {{status_premios.colaborador}}   
                                                                        </td>   
                                                                        <td>
                                                                                {{status_premios.planta}}
                                                                        </td>   
                                                                        <td>
                                                                                {{status_premios.area_participante}}
                                                                        </td>   
                                                                        <td>
                                                                                {{status_premios.fecha}}
                                                                        </td>   
                                                                        <td>
                                                                                {{status_premios.codigo_premio}}
                                                                        </td> 
                                                                        <td>
                                                                                {{status_premios.cantidad}}
                                                                        </td> 
                                                                        <td >
                                                                                <input class="inputs-concentrado text-center" type="text"  v-model="numero_solped"  v-if="id_updates==index+1">
                                                                                <label v-else>{{status_premios.solped}}</label>   
                                                                        </td>   
                                                                        <td>
                                                                                    <label v-if="status_premios.status=='Entregado'" class="fw-bold text-success">{{status_premios.status}}</label>
                                                                                    <label v-else-if="status_premios.status=='Pte. Entrega'" class="fw-bold text-warning">{{status_premios.status}}</label>
                                                                                    <label v-else>{{status_premios.status}}</label>
                                                                        </td>   
                                                                        <!--<td class="text-center">
                                                                                <button class="boton-nuevo" @click="finalizarEntregaPremio(status_premios.id)" >Finalizar</button>
                                                                        </td> -->
                                                                    </tr>
                                                                </tbody>
                                                                </table>
                                                            </div>          
                                    </div>



                           <!-- Modal Eliminar/Actualizar-->
                            <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="exampleModalLabel" >{{titulo_modal}} </h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                        <div class="text-center">
                                                <form @submit.prevent="uploadFile()">
                                                    <!--Subir Documento Sugerencia-->
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="custom-file my-5"> 
                                                                <input type="file" id="input_file_subir"  ref="archivosydocumentos" multiple required/>{{extensiones_valida}}</input>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <button  type="submit" name="upload" class="btn btn-primary">Subir Archivos </button>
                                                        </div>
                                                    </div> 
                                                       
                                                          <!-- Mostrando los archivos cargados -->
                                                        <div v-show="fileentregado.length>0 && cual_documento=='entregado'" >
                                                        <hr>
                                                                <div class="col-12" v-for= "(fileimgreto,index) in fileentregado">
                                                                    <div class="row">
                                                                        <span class="badge bg-secondary">Documento {{index+1}}</span><br>
                                                                            <div class="">
                                                                                <button type="button" class="btn btn-danger" @click="eliminarDocumento(fileimgreto)" >Eliminar</button>
                                                                            </div>
                                                                    </div>
                                                                    <iframe  :src="fileentregado[index]" style="width:100%;height:500px;"></iframe>
                                                                   <!-- <iframe src="https://vvnorth.com/Sugerencias/documentos/pdf.pdf" style="width:100%;height:500px;"></iframe>-->
                                                                </div>
                                                        </div>
                                                </form>
                                        </div>
                                </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                            </div>
                        <!--Fin Modal subir imagenes en retos-->
                   </div>
                   <div v-else-if="ventana=='colaboradores'" v-cloak>
                                    <div class="row justify-content-center align-items-start ">
                                                <div class="cintilla col-12 text-center">
                                                    <b>COLABORADORES</b>
                                                </div>
                                    </div>
                                    <div class="row  justify-content-center align-items-center">
                                                            <div class="text-center pt-3 ">
                                                                <span class="badge bg-light text-dark" style="font-size:0.7em;">Listado de Colaboradores Registrados: {{ concentrado_colaboradores.Registrados}}</span><br>
                                                                <span class="badge bg-light text-dark" style="font-size:0.7em;">No Registrados: {{ concentrado_colaboradores.NoRegistrados}}</span>
                                                              
                                                            </div>

                                                                <div>
                                                                               
                                                                             
                                                                                <div class="row">
                                                                                    <div class="col-12 col-md-12"> 
                                                                                    <!-- Contenido -->
                                                                                             <div class="outer-container" style=" font-size:1em">
                                                                                                    <form @submit.prevent="subirExcelNuevosColaboradores" style="font-size:0.7em;">
                                                                                                        <div>
                                                                                                           
                                                                                                            <input type="file"  ref="documentoExcel" accept=".csv" required/></input>
                                                                                                            <button type="submit" class="btn btn-primary" style=" font-size: 0.8em" >Importar Registros</button>
                                                                                                        </div>
                                                                                                    </form>
                                                                                             </div>
                                                                                         </div>
                                                                                     </div>
                                                                    <!-- Fin Contenido --> 
                                                                    </div>

                                                            <!---->
                                                            <div class="" style="height:70vh; overflow-x: scroll;">
                                                                <table class="tablaMonitoreo-sugerencias table table-striped table-bordered ">
                                                                <thead class="encabezado-tabla text-center text-light ">
                                                                    <tr>
                                                                        <!--<th scope="col" class="sticky">Editar</th>-->
                                                                        <th scope="col" >#</th>
                                                                        <th scope="col">Nombre Colaborador</th>
                                                                        <th scope="col">Número de Nómina</th>
                                                                        <th scope="col">Password</th>
                                                                        <!--<th scope="col">Entregado</th>-->
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr class="text-center" v-for="(colaboradores, index) in concentrado_colaboradores">    
                                                                          <!--<td>
                                                                           <button v-if="id_updates==index+1" type="button" class="btn btn-danger me-2" title="Cancelar" @click="editarStutasPremioSolicitado(0,0)" ><i class="bi bi-x-circle" ></i></button>
                                                                            <button v-if="bandera_editar_solicitud == false" type="button" class="btn btn-warning me-2" title="Actualizar" @click="editarStutasPremioSolicitado(1,index+1)"><i class="bi bi-pen" ></i></button>
                                                                            <button v-if="id_updates==index+1" class="btn btn-primary me-2" title="Guardar" @click="guardarStutasPremioSolicitado(status_premios.id)"><i class="bi bi-check-circle"></i></button> 
                                                                            <button v-if="status_premios.status=='Entregado'" type="button" class="btn btn-success  ms-2" title="Subir Imagen" @click="modal_subir_ver_documentos('Subir',status_premios.id,status_premios.solped,'entregado',status_premios.cant_img_evidencia)"><i class="bi bi-paperclip"></i>{{status_premios.cant_img_evidencia}}</button>
                                                                            <button v-else-if="status_premios.solped!='' && status_premios.status=='Pte. Entrega'" type="button" class="btn btn-secondary" type="button" title="Subir evidencia de la entrega del premios." @click="modal_subir_ver_documentos('Subir',status_premios.id,status_premios.solped,'entregado',status_premios.cant_img_evidencia)"><i class="bi bi-paperclip"></i>{{concentrado_status_premios.cant_img_evidencia}}</button> 
                                                                            <button v-else-if="status_premios.solped==''" title="Coloque número de solped para que se active." class="btn btn-secondary" disabled><i class="bi bi-paperclip"></i></button> 
                                                                        </td> -->
                                                                        <td>
                                                                        <b >{{index}}</b>
                                                                        </td> 
                                                                        <td>
                                                                                {{colaboradores.colaborador}}
                                                                        </td>  
                                                                        <td>
                                                                                {{colaboradores.numero_nomina}}   
                                                                        </td>   
                                                                        <td v-if="colaboradores.password=='123456'">
                                                                                {{colaboradores.password}}
                                                                        </td> 
                                                                        <td v-else class="bg-success text-white">
                                                                            <b>{{colaboradores.password}}</b><br>{{}}
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                                </table>
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
                /*Variables Principal Mejora*/
                username: '',
                prueba: '',
                ventana: 'principalMejora',  
                pintarUno:true,
                pintarDos:false,
                pintarTres:false,
                pintarCuatro:false,
                pintarCinco: false,
                pintarSeis: false,
                pintarSiete: false,
                nueva_sugerencia:false,
                concentrado_sugerencias_pendiente_impacto: [],
                concentrado_impacto_sugerencias_midiendo:[],
                myModal:'',
                causa:'',
                fileopcional:[],
                puntos_no_factible:0,
                vistobueno:false,
                nombre_analista:'',
                nombre_colaborador:'',
                idea_propuesta:'',
                situacion_actual:'',
                //*Varibales Concetrado*/
                lista_validacion_de_impacto:['Cuantitativo','Cualitativo'],
                concentrado_actividades:[],
                folio:'',
                validacion_de_impacto:'',
                //*Varibales modal acaptado o rechazado */
                datos_sugerencia:[],
                status:'',
                /*formulario cuantitativo*/
                indicador:'',
                linea_base:'',
                resultado_esperado:'',
                porcentaje_de_mejora:'',
                tipo_de_impacto:'',
                puntos_asignados:'',
                numero_nomina:'',
                /*formulario cualitativo*/
                tipo_impacto:'',
                impacto_cualitativo:'',
                puntos_asignados_cualitativos:'',
                //*Varibales Concetrado*/
                file: '',
                filenames: [],
                filedoc: [],
                fileppt: [],
                filepremio: [],
                filereto: [],
                fileentregado: [],
                contar_DOC:0,
                contar_PPT:0,
                actualizar_sugerencia:'',
                concentrado_sugerencias:[],
                var_cumplimiento:'0',
                var_sindicalizado_empleado:'',
                var_nombre_sugerencias:'',
                var_folio:'',
                lista_status: [],
                var_status:'En Factibilidad',
                var_causa_no_factibilidad:'',
                var_situacion_actual:'',
                var_idea_propuesta:'',
                var_nomina:'',
                var_colaborador:'',
                var_puesto:'', 
                lista_planta: [],
                var_planta:'',
                lista_area: [],
                var_area:'',
                lista_area_participante: [],
                var_area_participante:'',    
                lista_subarea: [],
                var_subarea:'',
                lista_impacto_primario: [],
                var_impacto_primario:'',
                lista_impacto_secundario: [],
                var_impacto_secundario:'',
                lista_tipo_desperdicio: [],
                var_tipo_desperdicio:'',
                objetivo_de_calidadMA: [],
                var_objetivo_de_calidadMA: [],
                var_fecha_sugerencia:'',
                var_fecha_inicio:'',
                var_fecha_compromiso:'',
                var_fecha_real_de_cierre:'',
                lista_analista_factibilidad: [],
                lista_usuarios_y_analistas_factibilidad: [],
                var_usuario_y_analista_de_factibilidad:'',
                var_impacto_planeado:'',
                var_impacto_real:'',
                usuario:'<?php echo $_SESSION['usuario']; ?>',
                titulo_modal:'',
                mensaje_modal:'', 
                extensiones_valida:'',  
                contenido_modal_agregar_eliminar:'',
                nueva_opcion:'',
                tipo_agregar_eliminar:'',
                correo_analista:'',
                id_concentrado:'',
                folio_carpeta_doc:'',
                cantidadDOCFILE:0,
                cual_documento:'',
                /*Variables Premios*/
                codigo_premios:'',
                descripcion_premios:'',
                puntos_canjear_premios:'',
                /*Variables administracion de retos*/
                titulo_del_reto:'',
                descripcion_del_reto:'',
                responsable_del_reto:'',
                planta_en_reto:'',
                area_en_reto:'',
                subarea_en_reto:'',
                folio_del_reto:'',
                concentrado_retos:[],
                ultimo_folio_retos:[],
                bandera_editar:false,
                actualizar_reto:'',
                tipo_status_reto:['Activo','Cerrado','Inactivo'],
                act_status_reto:'',
                act_titulo_del_reto:'',
                act_descripcion_del_reto:'',
                act_responsable_del_reto:'',
                act_planta_en_reto:'',
                act_area_en_reto:'',
                act_subarea_en_reto:'',
                /*Variables administracion de premios*/
                concentrado_premios:[],
                codigo_premios:'',
                descripcion_premios:'',
                puntos_canjear_premios:'',
                actualizar_premios:'',
                bandera_editar_premio:'',
                act_codigo_premio:'',
                act_descripcion_premio:'',
                act_puntos_premios:'',
                url_img_premio:'',
                numberRule: [
                            v => v.length > 0 || 'campo requerido',
                            v => v > 0 || 'El valor debe ser mayor a cero'
                        ],
                /*Variables Configuracion*/
                nuevo_usuario:'',
                nuevo_password:'',
                nuevo_nombre:'',
                nuevo_correo:'',
                nuevo_departamento:'',
                array_tipo_usuario: ['Admin','Analista','Responsable'],
                var_tipo_usuario:'',
                array_usuarios:[],
                bandera_editar_user:false,
                id_update:0,
                u_user: '', 
                u_password:'', 
                u_email: '',
                u_nombre:'', 
                u_departamento:'', 
                u_tipo:'',
                /*Variables de Estatus de Premios */
                concentrado_status_premios: [],
                id_updates:0,
                bandera_editar_solicitud:false,
                numero_solped:'',
                premio_status:'',
                cssentregado:'',
                /* Variables de Impacto*/
                colorgreen:'background: url("img/verde2.jpg"); color:white; font-weight:bold;',
                colorgris:'background-color: #fbfbfb ',
                concentrado_colaboradores:[],
                suma:0,
                sumatotal:0,
                cambio_contrasenia:[],
                
            }
        },
        mounted(){

            //Consultado concentrado de sugerencias.
            this.consultado_concentrado(),
            //consultado lista status
           axios.post('lista_status.php',{
            }).then(response =>{
                this.lista_status = response.data
                console.log(this.lista_status);
            }),
             //consultado lista planta
             this.consultando_plantas(),
             //consultado lista area
             this.consultando_area(),
             //consultado lista participante
             this.consultando_area_participante(),
             //consultado lista subareas
             this.consultando_subarea(),
             //consultado lista impacto primario y secuandario
             this.consultando_impacto(),
             //consultado lista tipo desperdicio
             this.consultando_lista_de_desperdicio(),
             //consultado lista objetivo de calidad MA
             this.consulta_lista_objetivos_calidad_ma(),
             //consultado lista analistas de factibilidad
             this.consulta_lista_analista_factibilidad(),
             this.consulta_lista_usuarios_y_analistas_factibilidad(),
 
                axios.post('consulta_usuario.php',{
                    usuario: this.usuario
                }).then(response =>{
                    this.usuario = response.data.nombre
                    //console.log(this.usuario = response.data)
                    //this.objetivo_de_calidadMA = response.data
                    //console.log(this.objetivo_de_calidadMA);
                })
        },
        methods:{
            mostrar(dato){
                   this.ventana=dato;
                   if(dato=='principalMejora'){ this.pintarUno=true}else{this.pintarUno=false}
                   if(dato=='concentrado'){this.pintarDos=true}else{this.pintarDos=false}
                   if(dato=='premios'){ this.pintarTres=true;  this.consultar_concentrado_premios()}else{this.pintarTres=false}
                   if(dato=='retos'){this.pintarCuatro=true; this.consultaConcentradoRetos()}else{this.pintarCuatro=false}
                   if(dato=='configuracion'){this.pintarCinco=true; this. consultar_usuarios()}else{this.pintarCinco=false}
                   if(dato=='solicitados'){this.pintarSeis=true; this.consultar_premios_solicitados()}else{this.pintarSeis=false}
                   if(dato=='colaboradores'){this.pintarSiete=true; this.consultar_colaboradores() }else{this.pintarSiete=false}
             },
       /*METODOS PRINCIPAL MEJORA*/      
    datosSugerencia(id){
                axios.post("cunsultar_datos_sugerencia.php",{
                id_concentrado:id
                }).then(response =>{
                    console.log(this.datos_sugerencia = response.data)
                }).catch(error => {
                    console.log(error)
                })
            },                                 
    consultarActividades(id,status){
                this.id_concentrado = id
                this.status = status
                axios.post("consultando_actividades.php",{
                id_concentrado:this.id_concentrado
                }).then(response =>{
                    console.log("ARREGLO",this.concentrado_actividades = response.data)
                }).catch(error => {
                    console.log(error)
                })
            },
    actualizarVoBoPlan(aceptado_rechazado){
            axios.post('actualizar_vobo_plan.php',{
                id_concentrado:this.id_concentrado,
                aceptado_rechazado:aceptado_rechazado,
                status:this.status
            }).then(response =>{
                console.log(response.data)
                if(response.data==true){
                    this.consultado_concentrado();
                }else{
                    alert("Problemas para actualizar.")
                }
            }).catch(error => {
                console.log(error)
            })
    },
    mensajeAlNueveNueve(){
        alert("El %cumplimiento debe de estar al 99% para que se active. ")
    },
    datos_modal(id_concentrado,folio,validacion_de_impacto,nomina){
        
        this.numero_nomina = nomina
        this.id_concentrado = id_concentrado
        this.folio = folio
        this.folio_carpeta_doc = folio
        this.validacion_de_impacto = validacion_de_impacto
        this.cual_documento = 'ppt'
        
            if(this.validacion_de_impacto=="Cuantitativo"){
              this.myModal = new bootstrap.Modal(document.getElementById('modalImpactoCuantitativo'))
              this.myModal.show()
             
            }
            if(this.validacion_de_impacto=="Cualitativo"){
             this.myModal = new bootstrap.Modal(document.getElementById('modalImpactoCualitativo'))
             this.myModal.show()
            }
        this.buscarDocumentos()
        this.buscarDatosValidacionImpacto()
    },
    datos_modal_detalles(id_concentrado,folio,nomina,causa,cumplimiento,nombre_analista,nombre_colaborador,idea_propuesta,situacion_actual){
       
        if(cumplimiento==100){
            this.vistobueno=true
        }else{
            this.vistobueno=false
        }
        this.folio_carpeta_doc=folio
        this.folio = folio
        this.cual_documento = "nofactibleopcional"
        this.causa=causa
        this.id_concentrado = id_concentrado
        this.numero_nomina = nomina

        this.nombre_analista = nombre_analista
        this.nombre_colaborador = nombre_colaborador
        this.idea_propuesta = idea_propuesta
        this.situacion_actual = situacion_actual
        //id_concentrado,folio,numero_nomina,puntos

        this.buscarDocumentos()
        this.consultarPuntosNoFactible()
        this.myModal = new bootstrap.Modal(document.getElementById('modalDetallesNofactible'))
        this.myModal.show()

    },
    consultarPuntosNoFactible(){
        axios.post("consultar_puntos_no_factible.php",{
            id_concentrado:this.id_concentrado,
            folio:this.folio
        }).then(response =>{
            if(response.data!=""){
                this.puntos_no_factible=response.data;
            }
        })
    },
    guardarPuntosnofactible(){
        axios.post('guardar_actualizar_puntos_no_factible.php',{
            id_concentrado:this.id_concentrado,
            folio:this.folio,
            numero_nomina:this.numero_nomina,
            puntos:this.puntos_no_factible
        }).then(response =>{
            if(response.data[0]== true){
                alert("Puntos guardados.")
                    //this.myModal.hide();
            }else{
                alert("Algo salio mal no se pueden guardar/actualizar los puntos")
            }
        }).catch(arror =>{
            console.log(error)
        })

      /*  axios.post('guardar_actulizar_puntos_no_factible.php',{
            id_concentrado:this.id_concentrado,
            folio:this.folio,
            numero_nomina:this.numero_nomina,
            puntos:this.puntos_no_factible
        }).then(response =>{
                console.log(response.data);
        })*/
    },
    checknoFactibilidad(){
       var valor = document.getElementById("checkbox").checked;
                axios.post('check_no_factibilidad.php',{
                    id_concentrado:this.id_concentrado,
                    vistobueno:valor,
                }).then(response =>{
                    if(response.data==true){
                        this.consultado_concentrado()
                    }else{
                        alert("Error al actualizar el porcentaje en el check.")
                    }
                    
                })
      
    },
    cambiaraEnFactibilidad(){
        if(!confirm('Desea usted cambiar el status de esta sugerencia a "En Factibilidad"')) return
        axios.post('guardar_actualizar_cambiar_a_En_Factibilidad.php',{
            id_concentrado: this.id_concentrado
        }).then(response =>{
            if(response.data=="correcto"){
                this.consultado_concentrado()
            }else{
                alert('algo salio mal.')
            }
        }).catch(arror =>{
            console.log(error)
        })
    },
    buscarDatosValidacionImpacto(){
        console.log(this.validacion_de_impacto)
        axios.post('buscar_formulario_validacion_de_impacto.php',{
            id_concentrado: this.id_concentrado,
            folio:this.folio,
            cuantitativo_o_cualitativo: this.validacion_de_impacto
        }).then(response =>{
            if(this.validacion_de_impacto=="Cuantitativo")
                    {
                        this.indicador = response.data.indicador
                        this.linea_base = response.data.linea_base
                        this.resultado_esperado = response.data.resultado_esperado
                        this.porcentaje_de_mejora = response.data.porcentaje_de_mejora
                        this.tipo_de_impacto = response.data.tipo_de_impacto
                        this.puntos_asignados = response.data.puntos_asignados
                    }
            if(this.validacion_de_impacto=="Cualitativo")
                    {
                        this.impacto_cualitativo = response.data.impacto
                        this.tipo_impacto = response.data.tipo
                        this.puntos_asignados_cualitativos = response.data.puntos
                     
                    }
                
        }).catch(arror =>{
            console.log(error)
        })
    },
    guardarImpactoCuantitativo(){
                axios.post('guardar_actualizar_validacion_de_impacto_cuantitativo.php',{
                tipo_de_impacto:this.tipo_de_impacto,
                id_concentrado:this.id_concentrado,
                folio:this.folio,
                indicador:this.indicador,
                linea_base:this.linea_base,
                resultado_esperado:this.resultado_esperado,
                porcentaje_de_mejora:this.porcentaje_de_mejora,
                validacion_de_impacto:this.validacion_de_impacto,
                puntos_asignados:this.puntos_asignados,
                numero_nomina:this.numero_nomina
                }).then(response =>{
                        console.log(response.data)
                        if(response.data[0]== true && response.data[1]== true){
                           alert("Los datos se guardaron/actualizaron correctamente.")
                           this.consultado_concentrado()
                           this.myModal.hide()
                        }else{
                            alert("Fallo al guardar en una tabla o ambas")
                        }
                }).catch(arror =>{
                    console.log(error)
                })
    },
    guardarImpactoCualitativo(){
        console.log(this.impacto_cualitativo + this.tipo_impacto + this.puntos_asignados_cualitativos)
        axios.post('guardar_actualizar_validacion_de_impacto_cualitativo.php',{
                tipo_de_impacto:this.tipo_de_impacto,
                id_concentrado:this.id_concentrado,
                folio:this.folio,
                impacto_cualitativo:this.impacto_cualitativo,
                tipo_impacto:this.tipo_impacto,
                puntos_asignados_cualitativos:this. puntos_asignados_cualitativos,
                validacion_de_impacto: this.validacion_de_impacto,
                numero_nomina:this.numero_nomina
                }).then(response =>{
                        console.log(response.data)
                        if(response.data[0]== true && response.data[1]== true){
                            alert("Los datos se guardaron/actualizaron correctamente.")
                            this.consultado_concentrado()
                            this.myModal.hide()
                        }else{
                            alert("Fallo al guardar en una tabla o ambas")
                        }
                }).catch(arror =>{
                    console.log(error)
                })

    },
    vaciarValidaciondeImpacto(id_concentrado,cuali_o_cuanti){
        if(!confirm('Vaciar impacto Cuantitativo.'))return

        this.id_concentrado = id_concentrado
        axios.post('vaciar_validacion_de_impacto.php',{
                id_concentrado:this.id_concentrado,
                cuali_o_cuanti:cuali_o_cuanti
                }).then(response =>{
                        console.log(response.data)
                        if(response.data[0]== true && response.data[1]== true){
                           alert("Se vaciaron los campos de validación de impacto")
                            this.consultado_concentrado()
                        }else{
                            alert("Fallo al guardar en una tabla o ambas")
                        }
                }).catch(arror =>{
                    console.log(error)
                })
       
    },
    modalImpacto(){
        this.consultado_concentrado_pendiente_impacto()
        this.consultado_concentrado_impacto_sugerencias()
       
    },
    consultado_concentrado_pendiente_impacto(){//consulto datos del concentrado de sugerencias midiendo
                axios.post('consulta_concentrado_pendientes_impacto.php',{
                            }).then(response =>{
                                this.concentrado_sugerencias_pendiente_impacto = response.data
                                console.log(this.concentrado_sugerencias_pendiente_impacto,'CONCENTRADO')
                            })
                },
    consultado_concentrado_impacto_sugerencias(){//consulto datos del concentrado impacto midiendo
                    axios.post('consulta_concentrado_impacto_midiendo.php',{
                    }).then(response =>{
                        this.concentrado_impacto_sugerencias_midiendo = response.data
                        console.log(this.concentrado_impacto_sugerencias_midiendo)
                    }).catch(error =>{

                    })
                },
      /*FIN METODOS PRINCIPAL MEJORA*/
      /*METODOS CONCENTRADO SUGERENCIAS*/
            guardar_nueva_sugerencia_y_actualizar(nueva_o_actualizar,id_registro){

                if(this.var_sindicalizado_empleado!='' && this.var_nombre_sugerencias!='' && this.var_folio!='' && this.var_situacion_actual!='' && 
                    this.var_idea_propuesta!='' && this.var_nomina!='' && this.var_colaborador!='' && this.var_puesto!='' && this.var_planta!='' && 
                    this.var_area!='' && this.var_area_participante!='' && this.var_subarea!='' && this.var_fecha_sugerencia!='' && this.var_fecha_inicio!='' && this.var_usuario_y_analista_de_factibilidad!='' ){
                    this.actualizar_sugerencia="";//desactivar editar o actualizar
                    this.nueva_sugerencia=false;//desactivar nueva sugerencia
                        axios.post('guardar_nueva_sugerencia_y_actualizar.php',{
                            id: id_registro,
                            tipo_nueva_o_actualizar: nueva_o_actualizar,
                            cumplimiento: this.var_cumplimiento,
                            sindicalizado_empleado:this.var_sindicalizado_empleado,
                            nombre_sugerencia: this.var_nombre_sugerencias,
                            folio: this.var_folio,
                            status: this.var_status,
                            //causa_no_factibilidad: this.var_causa_no_factibilidad,
                            situacion_actual: this.var_situacion_actual,
                            idea_propuesta: this.var_idea_propuesta,
                            nomina: this.var_nomina,
                            colaborador: this.var_colaborador,
                            puesto: this.var_puesto,
                            planta: this.var_planta,
                            area: this.var_area,
                            area_participante: this.var_area_participante,
                            subarea: this.var_subarea,
                            impacto_primario: this.var_impacto_primario,
                            impacto_secundario: this.var_impacto_secundario,
                            tipo_desperdicio: this.var_tipo_desperdicio,
                            objetivo_de_calidadMA: this.var_objetivo_de_calidadMA,
                            fecha_sugerencia: this.var_fecha_sugerencia,
                            fecha_inicio: this.var_fecha_inicio,
                            fecha_compromiso: this.var_fecha_compromiso,
                            fecha_real_de_cierre: this.var_fecha_real_de_cierre,
                            analista_de_factibilidad: this.var_usuario_y_analista_de_factibilidad,
                            impacto_planeado: this.var_impacto_planeado,
                            impacto_real: this.var_impacto_real,
                            usuario: this.usuario
                        }).then(response =>{
                            console.log(response.data);
                            this.consultado_concentrado()
                        })
                }else{
                    alert('todos los campos marcados con: (*) son requeridos.')
                }
            },
            mostrar_id(id){
                    var posicion=id
                    console.log(posicion)
                    this.actualizar_sugerencia = posicion
                if(id=="0"){// nueva sugerencia
                    this.var_sindicalizado_empleado=''
                    this.var_nombre_sugerencias=''
                    this.var_folio=''
                    //this.var_causa_no_factibilidad=''
                    this.var_situacion_actual = ''
                    this.var_idea_propuesta = ''
                    this.var_nomina = ''
                    this.var_colaborador = ''
                    this.var_puesto = ''
                    this.var_planta = ''
                    this.var_area = ''
                    this.var_area_participante = ''
                    this.var_subarea = ''
                    this.var_usuario_y_analista_de_factibilidad=''
                    this.var_impacto_primario = ''
                    this.var_impacto_secundario = ''
                    this.var_tipo_desperdicio = ''
                    this.var_objetivo_de_calidadMA.splice(0,15)
                    this.var_fecha_sugerencia = ''
                    this.var_fecha_inicio = ''
                    this.nueva_sugerencia=true
                } else if (id==""){//cacelar actualizar

                } else {//llenado campos de actualizar asignandolos a las variables
                    this.nueva_sugerencia=false;
                    this.var_sindicalizado_empleado=this.concentrado_sugerencias[posicion-1].sindicalizado_empleado
                    this.var_nombre_sugerencias=this.concentrado_sugerencias[posicion-1].nombre_sugerencia
                    this.var_folio=this.concentrado_sugerencias[posicion-1].folio
                    this.var_status=this.concentrado_sugerencias[posicion-1].status
                    this.var_causa_no_factibilidad=this.concentrado_sugerencias[posicion-1].causa_no_factibilidad
                    this.var_situacion_actual = this.concentrado_sugerencias[posicion-1].situacion_actual
                    this.var_idea_propuesta = this.concentrado_sugerencias[posicion-1].idea_propuesta
                    this.var_nomina = this.concentrado_sugerencias[posicion-1].numero_nomina
                    this.var_colaborador = this.concentrado_sugerencias[posicion-1].colaborador
                    this.var_puesto = this.concentrado_sugerencias[posicion-1].puesto
                    this.var_planta = this.concentrado_sugerencias[posicion-1].planta
                    this.var_area = this.concentrado_sugerencias[posicion-1].area
                    this.var_area_participante = this.concentrado_sugerencias[posicion-1].area_participante
                    this.var_subarea = this.concentrado_sugerencias[posicion-1].subarea
                    this.var_impacto_primario = this.concentrado_sugerencias[posicion-1].impacto_primario
                    this.var_impacto_secundario = this.concentrado_sugerencias[posicion-1].impacto_secundario
                    this.var_tipo_desperdicio = this.concentrado_sugerencias[posicion-1].tipo_de_desperdicio
                    this.var_fecha_sugerencia = this.concentrado_sugerencias[posicion-1].fecha_de_sugerencia
                    this.var_fecha_inicio = this.concentrado_sugerencias[posicion-1].fecha_de_inicio
                    this.var_usuario_y_analista_de_factibilidad = this.concentrado_sugerencias[posicion-1].analista_de_factibilidad
                    var arr = this.concentrado_sugerencias[posicion-1].objetivo_de_calidad_ma.split(',')
                    var longitud = arr.length
                    this.var_objetivo_de_calidadMA.splice(0,15);
                    //console.log(longitud)
                    if(arr.length>1){
                        for (var i = 0; i < arr.length; i++){
                                    this.var_objetivo_de_calidadMA[i] = arr[i]
                        }
                    }else if(arr.length==1){
                        if(arr!="" || arr!=""){
                            this.var_objetivo_de_calidadMA[0] = arr[0]
                        }
                    }else{
                        console.log("0 POSICIONES")
                    }
                }
            },
            eliminar_sugerencia(id_eliminar){
                if(!confirm("¿Desea eliminar la sugerencia?")) return;
                axios.post('eliminar_sugerencia.php',{
                    eliminar_sugerencia:id_eliminar
                }).then(response =>{
                    if(response.data==true){// si se elimina consultar concentrado nuevamente
                        this.consultado_concentrado()
                    }
                })
            },
            consultado_concentrado(){
                axios.post('consulta_concentrado_sugerencias.php',{
                            }).then(response =>{
                                this.concentrado_sugerencias = response.data
                                console.log(this.concentrado_sugerencias);
                            })
            },
            consultando_plantas(){
                axios.post('lista_planta.php',{
                }).then(response =>{
                    this.lista_planta = response.data
                    console.log(this.lista_planta);
                })
            },
            consultando_area(){
                axios.post('lista_area.php',{
            }).then(response =>{
                this.lista_area = response.data
                console.log(this.lista_area);
            })
            },
            consultando_area_participante(){
                axios.post('lista_area_participante.php',{
                }).then(response =>{
                    this.lista_area_participante = response.data
                    console.log(this.lista_area_participante);
                })
            },
            consultando_subarea(){
                axios.post('lista_subarea.php',{
                }).then(response =>{
                    this.lista_subarea = response.data
                    console.log(this.lista_subarea);
                })
            },
            consultando_impacto(){
                axios.post('lista_impacto.php',{
                }).then(response =>{
                    this.lista_impacto_primario = response.data
                    this.lista_impacto_secundario = response.data
                    console.log(this.lista_impacto_primario);
                    console.log(this.lista_impacto_secundario);
                })
            },
            consultando_lista_de_desperdicio(){
                axios.post('lista_tipo_desperdicio.php',{
                }).then(response =>{
                    this.lista_tipo_desperdicio = response.data
                    console.log(this.lista_tipo_desperdicio);
                })
            },
            consulta_lista_objetivos_calidad_ma(){
                axios.post('lista_objetivos_calidad_ma.php',{
            }).then(response =>{
                this.objetivo_de_calidadMA = response.data
                console.log(this.objetivo_de_calidadMA);
            })
            },
            consulta_lista_analista_factibilidad(){
                axios.post('lista_analista_factibilidad.php',{
            }).then(response =>{
                this.lista_analista_factibilidad = response.data
                console.log(this.lista_analista_factibilidad);
            })
            },
            consulta_lista_usuarios_y_analistas_factibilidad(){
                axios.post('lista_usuarios_y_analistas_factibilidad.php',{
            }).then(response =>{
                this.lista_usuarios_y_analistas_factibilidad = response.data
                console.log(this.lista_usuarios_y_analistas_factibilidad);
            })
            },
            modal_nueva_eliminar(agregar_o_eliminar,tipo,folio){
                this.folio_carpeta_doc = folio
                this.tipo_agregar_eliminar = tipo
                this.titulo_modal=agregar_o_eliminar+" "+tipo //creando titulo modal
                this.contenido_modal_agregar_eliminar=agregar_o_eliminar // contenido a mostrar
            },
            agregar_nuevo_lista(){
                axios.post('agregar_nuevo_en_lista.php',{
                    nuevo_registro: this.nueva_opcion,
                    tipo: this.tipo_agregar_eliminar,
                    correo: this.correo_analista
                }).then(response =>{
                    this.nueva_opcion = ''
                    if(response.data=='planta agregada'){
                        alert("Se agrego la Planta con Éxito.")
                        this.consultando_plantas()
                    }else if(response.data=='area agregada'){
                        alert("Se agrego la Area con Éxito.")
                        this.consultando_area()
                    }else if(response.data=='area participante agregada'){
                        alert("Se agrego la Area con Éxito.")
                        this.consultando_area_participante()
                    }else if(response.data=='subarea agregada'){
                        alert("Se agrego la Subarea con Éxito.")
                        this.consultando_subarea()
                    }else if(response.data=='impacto agregada'){
                        alert("Se agrego Impacto primario con Éxito.")
                        this.consultando_impacto()
                    }else if(response.data=='desperdicio agregada'){
                        alert("Se agrego nuevo tipo de desperdicio con Éxito.")
                        this.consultando_lista_de_desperdicio()
                    }else if(response.data=='calidad agregada'){
                        alert("Se agrego nuevo objetivo de calidad MA con Éxito.")
                        this.consulta_lista_objetivos_calidad_ma()
                    }else if(response.data=='analista agregada'){
                        alert("Se agrego Analista y correo con Éxito.")
                        this.consulta_lista_analista_factibilidad()
                    }else{
                        alert("Algo salio mal al agregar.")
                    }
                })
            },
            eliminar_elementos_lista(id_eliminar){
                //console.log("ID ELIMINAR"+id_eliminar+"TIPO:"+this.tipo_agregar_eliminar)
               axios.post('eliminar_elementos_lista.php',{
                id_eliminar: id_eliminar,
                tipo: this.tipo_agregar_eliminar
               }).then(response =>{
                if(response.data=='planta eliminada'){
                        alert("Se elimino con Éxito.")
                        this.consultando_plantas()
                }else if (response.data=='area eliminada'){
                        alert("Se elimino con Éxito.")
                        this.consultando_area()
                }else if (response.data=='area participante eliminada'){
                        alert("Se elimino con Éxito.")
                        this.consultando_area_participante()
                }else if (response.data=='subarea eliminada'){
                        alert("Se elimino con Éxito.")
                        this.consultando_subarea()
                }else if (response.data=='impacto eliminada'){
                        alert("Se elimino con Éxito.")
                        this.consultando_impacto()
                }else if (response.data=='desperdicio eliminada'){
                        alert("Se elimino con Éxito.")
                        this.consultando_lista_de_desperdicio()
                }else if (response.data=='calidad eliminada'){
                        alert("Se elimino con Éxito.")
                        this.consulta_lista_objetivos_calidad_ma()
                }else if (response.data=='analista eliminada'){
                        alert("Se elimino con Éxito.")
                        this.consulta_lista_analista_factibilidad()
                }else{
                    alert("Algo salio mal al eliminar.")
                }
               })
            },
            modal_subir_ver_documentos(tipo,id_concentrado,folio,cual_documento,cantidad){
                this.id_concentrado = id_concentrado
                this.cual_documento = cual_documento
                this.cantidadDOCFILE = cantidad
                if(this.cual_documento == 'sugerencia'){
                    this.myModal = new bootstrap.Modal(document.getElementById('modal'))
                    this.myModal.show()
                    this.extensiones_valida = '(.png, .jpeg, .jpg, .pdf)'
                }else if(this.cual_documento == 'ppt'){
                    this.myModal = new bootstrap.Modal(document.getElementById('modal'))
                    this.myModal.show()
                    this.extensiones_valida = '(.docx, .ppt, .pptx)'
                }else if(this.cual_documento == 'reto'){
                    this.myModal = new bootstrap.Modal(document.getElementById('modal'))
                    this.myModal.show()
                    this.extensiones_valida = '(.png, .jpeg, .jpg, .pdf)'
                }else if(this.cual_documento == 'premio'){
                    this.myModal = new bootstrap.Modal(document.getElementById('modal'))
                    this.myModal.show()
                    this.extensiones_valida = '(.png, .jpeg, .jpg)'
                }else if(this.cual_documento == 'entregado'){
                    this.myModal = new bootstrap.Modal(document.getElementById('modal'))
                    this.myModal.show()
                    this.extensiones_valida = '(.png, .jpeg, .jpg)'
                }else{
                    this.extensiones_valida = ''
                }
                this.folio_carpeta_doc = folio
                this.titulo_modal="Subir/Ver Documentos." //creando titulo modal
                this.contenido_modal_agregar_eliminar=tipo // contenido a mostrar
                this.buscarDocumentos()
            },
            uploadFile(){
                let formData = new FormData();
               
                if(this.cual_documento=="premio"){
                    var files = this.$refs.ref_premio.files;
                    var totalfiles = this.$refs.ref_premio.files.length;
                }else{
                    var files = this.$refs.archivosydocumentos.files;
                    var totalfiles = this.$refs.archivosydocumentos.files.length;
                } 
               
                for (var index = 0; index < totalfiles; index++) {
                 formData.append("files[]", files[index]);//arreglo de documentos
                }
                formData.append("folio", this.folio_carpeta_doc);
                formData.append("cual_documento", this.cual_documento);
                formData.append("id_concentrado", this.id_concentrado);
                formData.append("cantidad", this.cantidadDOCFILE);
                axios.post("subir_documentos.php", formData,
                    {
                    headers: {"Content-Type": "multipart/form-data"}
                    })
                    .then(response => {
                        console.log(response.data);
                     if(this.cual_documento=="ppt"){
                        this.fileppt = response.data;
                        if(this.fileppt.length>0){
                            this.myModal.hide()
                            document.getElementById("input_file_subir").value=""
                            alert(this.fileppt.length + " archivo/s se han subido.")
                            this.buscarDocumentos()
                        }else{
                            alert("Verifique la extension del archivo o Intente nuevamente.")
                        }

                     }
                     if(this.cual_documento=="sugerencia"){
                        this.filedoc = response.data;
                        if(this.filedoc.length>0){
                            this.myModal.hide()
                            document.getElementById("input_file_subir").value=""
                            alert(this.filedoc.length + " archivo/s se han subido.")
                            this.buscarDocumentos()
                        }else{
                            alert("Verifique la extension del archivo o Intente nuevamente.")
                        }
                     }   
                     if(this.cual_documento=="reto"){
                        this.filereto = response.data;
                        if(this.filereto.length>0){
                            this.myModal.hide()
                            document.getElementById("input_file_subir").value=""
                            alert(this.filereto.length + " archivo/s se han subido.")
                            this.buscarDocumentos()
                        }else{
                            alert("Verifique la extension del archivo o Intente nuevamente.")
                        }
                     }  
                     if(this.cual_documento=="premio"){
                        this.filepremio = response.data;
                        if(this.filepremio.length>0){
                            this.myModal.hide()
                            document.getElementById("input_file_subir").value=""
                            alert(this.filepremio.length + " archivo/s se han subido.")
                            this.buscarDocumentos()
                        }else{
                            alert("Verifique la extension del archivo o Intente nuevamente.")
                        }
                     }   
                     if(this.cual_documento=="entregado"){
                        this.fileentregado = response.data;
                        if(this.fileentregado.length>0){
                            this.myModal.hide()
                            document.getElementById("input_file_subir").value=""
                            alert(this.fileentregado.length + " archivo/s se han subido.")
                            this.buscarDocumentos()
                        }else{
                            alert("Verifique la extension del archivo o Intente nuevamente.")
                        }
                     }   
                    
                     
                    })
                    .catch(error => {
                        console.log(error);
                    });
                },
            buscarDocumentos(){
                //alert(this.cual_documento+""+this.folio_carpeta_doc)
                this.filenames=[] //limpiado vista del documento subido en modal 
                this.filedoc=[]//limpiado vista del documento bajada en modal 
                this.fileppt=[]//limpiado vista del documento bajada en modal
                this.fileopcional=[]//limpiado vista del documento bajada en modal 
                this.fileentregado=[]//limpiado vista del documento bajada en modal 
                if(this.folio_carpeta_doc!=undefined){
                                axios.post("buscar_documentos.php",{
                                    folio_carpeta_doc:this.folio_carpeta_doc,
                                    cual_documento:this.cual_documento
                                })
                                .then(response => {
                            
                                if(this.cual_documento=="sugerencia"){
                                            this.filedoc = response.data
                                            this.cantidadDOCFILE = this.filedoc.length
                                            if(this.filedoc.length>0){
                                                console.log(this.filedoc.length + "Archivos encontrados.")
                                            }else{
                                                //alert("Sin Documentos agregados.")
                                            }
                                            this.consultado_concentrado()
                                }
                                if(this.cual_documento=="ppt"){
                                            this.fileppt = response.data
                                            this.cantidadDOCFILE = this.fileppt.length
                                            if(this.fileppt.length>0){
                                                console.log(this.fileppt.length + "Archivos encontrados.")
                                            }else{
                                                //alert("Sin Documentos agregados.")
                                            }
                                            this.consultado_concentrado()
                                    }
                                if(this.cual_documento=="reto"){
                                            this.filereto = response.data
                                            this.cantidadDOCFILE = this.filereto.length
                                            if(this.filereto.length>0){
                                                console.log(this.filereto.length + "Archivos encontrados.")
                                            }else{
                                                //alert("Sin Documentos agregados.")
                                            }
                                            this.consultaConcentradoRetos()
                                    }
                                if(this.cual_documento=="premio"){
                                            this.filepremio = response.data
                                            this.cantidadDOCFILE = this.filepremio.length
                                            if(this.filepremio.length>0){
                                                console.log(this.filepremio.length + "Archivos encontrados.")
                                            }else{
                                                //alert("Sin Documentos agregados.")
                                            }
                                            this.consultar_concentrado_premios()
                                    }
                                if(this.cual_documento=="nofactibleopcional"){
                                            this.fileopcional = response.data
                                            this.cantidadDOCFILE = this.fileopcional.length
                                            if(this.fileopcional.length>0){
                                                console.log(this.fileopcional.length + "Archivos encontrados.")
                                            }else{
                                                //alert("Sin Documentos agregados.")
                                            }
                                            //this.consultar_concentrado_premios()
                                    }
                                if(this.cual_documento=="entregado"){
                                            this.fileentregado = response.data
                                            this.cantidadDOCFILE = this.fileentregado.length
                                            if(this.fileentregado.length>0){
                                                console.log(this.fileentregado.length + "Archivos encontrados.")  
                                            }else{
                                                //alert("Sin Documentos agregados.")
                                            }
                                            this.consultar_premios_solicitados()
                                    }
                                })
                                .catch(error => {
                                    console.log(error);
                                });
                    }
                },
                
            eliminarDocumento(ruta){
               
               axios.post("eliminar_documento.php",{
                    ruta_eliminar: ruta,
                    id_concentrado: this.id_concentrado,
                    cual_documento:this.cual_documento,
                    cantidad: this.cantidadDOCFILE-1,
                }).then( reponse=>{
                    if(reponse.data=="Archivo Eliminado"){
                        this.buscarDocumentos()
                        alert("Archivo/Documento Eliminado con Éxito")
                    }else if(reponse.data=="No Eliminado"){
                        alert("Algo no salio bien no se logro Eliminar.")
                    }else{
                        alert("Error al eliminar el Documento.")
                    }

                    if(this.cual_documento=="reto"){
                        this.consultaConcentradoRetos()
                    }else if(this.cual_documento=="premio"){
                        this.consultar_concentrado_premios()
                    }else if(this.cual_documento=="entregado"){
                        this.consultar_premios_solicitados()
                    }else{
                        this.consultado_concentrado()
                    }
                    
                }).catch(error =>{
                 
                })
                   
                },  
                /*METODOS DE PREMIOS*/
                consultar_concentrado_premios(){
                    axios.post("consulta_concentrado_premios.php",{
                    }).then(response =>{
                            this.concentrado_premios=response.data
                    }).catch(arror =>{

                    })
                },
                guardarActualizarPremios(index,id_premio,insertar_actualizar){

                    if(insertar_actualizar=="Insertar"){

                            if(this.codigo_premios!='' || this.descripcion_premios!='' || this.puntos_canjear_premios )
                                {
                                    var validar= Number.isInteger(this.puntos_canjear_premios)
                                        if(validar==true){
                                                axios.post("guardar_actualizar_premio.php",{
                                                    id_premio:id_premio,
                                                    insertar_actualizar: insertar_actualizar,
                                                    codigo_premios: this.codigo_premios,
                                                    descripcion_premios: this.descripcion_premios,
                                                    puntos_canjear_premios: this.puntos_canjear_premios

                                                }).then(response =>{
                                                    console.log(response.data,'VERIFICANDO SI YA EXISTE EL DATO.')
                                                    if(response.data== true){
                                                        this.bandera_editar_premio = false
                                                        this.actualizar_premios=index
                                                        this.codigo_premios = ''
                                                        this.descripcion_premios = ''
                                                        this.puntos_canjear_premios = ''
                                                        this.consultar_concentrado_premios()
                                                    }else if(response.data=="Existe"){
                                                          alert('El código esta DUPLICADO, verifique y vuelva a guardar.')  
                                                    }else{
                                                        alert('Problemas para guardar premio en BD')
                                                    }
                                                    console.log(response.data)
                                                }).catch(error =>{

                                                })

                                        }else{
                                                alert("el campo Puntos de canje deben ser números.")
                                            }
                                }else{
                                    alert("Los campos (*) son requeridos")
                                }
                    }
                    if(insertar_actualizar=="Actualizar"){
                        
                        if(this.act_codigo_premio!='' || this.act_descripcion_premios!='' || this.act_puntos_premios )
                            {
                                    axios.post("guardar_actualizar_premio.php",{
                                        id_premio:id_premio,
                                        insertar_actualizar: insertar_actualizar,
                                        codigo_premios: this.act_codigo_premio,
                                        descripcion_premios: this.act_descripcion_premios,
                                        puntos_canjear_premios: this.act_puntos_premios
                                    }).then(response =>{
                                        if(response.data== true){
                                            this.bandera_editar_premio = false
                                            this.actualizar_premios=index
                                            this.act_codigo_premio = ''
                                            this.act_descripcion_premios = ''
                                            this.act_puntos_premios = ''
                                            this.consultar_concentrado_premios()
                                        }else if(response.data=="Existe"){
                                            alert('El código esta DUPLICADO, verifique y vuelva a guardar.')  
                                        }else{
                                            alert('Problemas para actualizar premio en BD')
                                        }
                                        console.log(response.data)
                                    }).catch(error =>{

                                    })
                            
                            }else{
                                alert("Todos los campos son requeridos")
                            }

                    }
                    
                        
                      
                },
                eliminarPremio(id_premio, ruta, cant_doc){
               if(!confirm('Seguro de elimiar Premio del Catálogo')) return 
                axios.post("eliminar_premio.php",{
                    id_premio:id_premio
                }).then(response =>{
                        if(response.data=="si"){//eliminar registro de premios
                            this.consultar_concentrado_premios()
                            alert("Premio Eliminado con Éxito")

                            this.id_concentrado = id_premio
                            this.cual_documento = 'premio'
                            this.cantidadDOCFILE = cant_doc-1
                            
                            this.eliminarDocumento(ruta)//eliminar el documento.
 
                            }else if(response.data=="No Eliminado"){
                                alert("Algo no salio bien no se logro Eliminar.")
                            }else{
                                alert("Error al eliminar Premio.")
                            }

                    
                }).catch(error =>{

                })
            },
            editaPremio(index){
                if(index==0){
                    this.actualizar_premios = index
                    this.bandera_editar_premio = false
                }else if(index!=0){
                    this.actualizar_premios = index
                    this.bandera_editar_premio = true
                    this.act_codigo_premio = this.concentrado_premios[index-1].codigo_premio
                    this.act_descripcion_premios=this.concentrado_premios[index-1].descripcion
                    this.act_puntos_premios = this.concentrado_premios[index-1].puntos_para_canjear
                }
                //alert(index)
            },
            buscarUrlImagen(index){
                alert(index)
                /*this.url_img_premio= this.concentrado_premios[index].url_premio*/
                
            },
            /*METOS ADMINISTRACION DE RETOS */
            consultaConcentradoRetos(){
                axios.post("consulta_concentrado_retos.php",{
                }).then(response =>{
                    this.concentrado_retos = response.data
                }).catch(error =>{
                   
                })

            },
            agregarReto(guardar){
                if(this.titulo_del_reto!='' || this.descripcion_del_reto!='' || this.responsable_del_reto !=''
                    || this.planta_en_reto!='' || this.area_en_reto!='' || this.subarea_en_reto!=''){

                        axios.post("guardar_actualizar_reto.php",{
                            guardar_o_actualizar: guardar,
                            titulo_del_reto: this.titulo_del_reto,
                            descripcion_del_reto: this.descripcion_del_reto,
                            responsable_del_reto: this.responsable_del_reto,
                            planta_en_reto: this.planta_en_reto,
                            area_en_reto: this.area_en_reto,
                            subarea_en_reto: this.subarea_en_reto,
                            folio_del_reto: this.folio_del_reto
                        }).then(response =>{
                            console.log()
                            if(response.data==true){
                                this.titulo_del_reto =''
                                this.descripcion_del_reto=''
                                this.responsable_del_reto=''
                                this.planta_en_reto=''
                                this.area_en_reto=''
                                this.subarea_en_reto= ''
                                this.folio_del_reto = ''
                                this.consultaConcentradoRetos()
                            }else{
                                alert("Salio mal al insertar datos del reto en BD.")
                            }
                           
                        }).catch(error =>{

                        })
                        
                        //console.log("guardar")
                }else{
                    alert("todos los campos con (*) son requeridos.")
                }    
            },    
            generarFolio(){
                if(this.planta_en_reto!='' && this.area_en_reto!=''){
                        axios.post("consulta_ultimo_folio_concentrado_retos.php",{
                            planta_en_reto: this.planta_en_reto,
                            area_en_reto: this.area_en_reto
                        }).then(response =>{
                            this.ultimo_folio_retos = response.data
                            var nuevo_numero = 1
                            console.log(this.ultimo_folio_retos.length)
                            console.log("arriba largo del arreglo")
                            if(this.ultimo_folio_retos.length>0){
                                var ultimo_folio = this.ultimo_folio_retos[0].folio_reto
                                var ultimo_numero_string=ultimo_folio.split("-").slice(-1) 
                                var ultimo_numero = parseInt(ultimo_numero_string)
                                var nuevo_numero = ultimo_numero+1
                            }
                            var anio = new Date().getFullYear()// tomando anio
                            var acadena = anio.toString();// pasandolo a cadena
                            var ultimos_dos_digitos=acadena.substr(-2)//tomando los ultimos dos digitos
                            var limpiandoplanta = this.planta_en_reto.replace(".",'')//remplazando . si exite
                            var limpiandoarea = this.area_en_reto.replace(".",'')//remplazando . si exite
                            var planta=limpiandoplanta.substr(0,3)//tomando los primero 3
                            var area=limpiandoarea.substr(0,3)//tomando los primero 3
                            var prefolio = planta+"-"+area+"-"+ultimos_dos_digitos +"-"+nuevo_numero //concatenando para formar folio
                            var mayus_folio = prefolio.toUpperCase() 
                            this.folio_del_reto = mayus_folio 
                            
                        }).catch(error =>{

                        })
                }
            },
            editaReto(index){
                if(index==0){
                    this.actualizar_reto = index
                    this.bandera_editar = false
                }else if(index!=0){
                    this.actualizar_reto = index
                    this.bandera_editar = true
                    this.act_status_reto = this.concentrado_retos[index-1].status_reto
                    this.act_titulo_del_reto=this.concentrado_retos[index-1].titulo_reto
                    this.act_descripcion_del_reto = this.concentrado_retos[index-1].descripcion_reto
                    this.act_responsable_del_reto = this.concentrado_retos[index-1].responsable_reto
                    this.act_planta_en_reto = this.concentrado_retos[index-1].planta_reto
                    this.act_area_en_reto = this.concentrado_retos[index-1].area_reto
                    this.act_subarea_en_reto = this.concentrado_retos[index-1].subarea_reto
                }
                //alert(index)
            },
 
            guardarActualizacionReto(index,id_reto,actualizar){
                axios.post("guardar_actualizar_reto.php",{
                            guardar_o_actualizar: actualizar,
                            status_reto: this.act_status_reto,
                            titulo_del_reto: this.act_titulo_del_reto,
                            descripcion_del_reto: this.act_descripcion_del_reto,
                            responsable_del_reto: this.act_responsable_del_reto,
                            planta_en_reto: this.act_planta_en_reto,
                            area_en_reto: this.act_area_en_reto,
                            subarea_en_reto: this.act_subarea_en_reto,
                            id_reto: id_reto,
                        }).then(response =>{
                            console.log(response.data)
                            if(response.data==true){
                                this.actualizar_reto = 0
                                this.bandera_editar = false
                                this.consultaConcentradoRetos()
                            }else{
                                alert("Salio mal al insertar datos del reto en BD.")
                            }
                           
                        }).catch(error =>{

                        })
            },
            eliminarReto(id_reto){
               if(!confirm('Esta seguro de eliminar este reto')) return 
                axios.post("eliminar_reto.php",{
                    id_reto:id_reto
                }).then(response =>{
                        if(response.data=="si"){
                            this.consultaConcentradoRetos()
                            alert("Reto Eliminado con Éxito")
                        }else if(response.data=="No Eliminado"){
                            alert("Algo no salio bien no se logro Eliminar.")
                        }else{
                            alert("Error al eliminar el Documento.")
                        }
                    
                }).catch(error =>{

                })
            },
        
            /*METODOS DE CONFIGURACION*/
            guardar_admin_y_analista(){
                axios.post('guardar_analista_o_admin.php',{
                    nuevo_usuario: this.nuevo_usuario,
                    nuevo_password: this.nuevo_password,
                    nuevo_nombre: this.nuevo_nombre,
                    nuevo_correo: this.nuevo_correo,
                    nuevo_departamento: this.nuevo_departamento,
                    var_tipo_usuario: this.var_tipo_usuario,
                    accion: 'guardar'
                }).then(response =>{
                    console.log(response.data);
                   if(response.data=='Bien'){
                        this.nuevo_usuario=''
                        this.nuevo_password=''
                        this.nuevo_nombre=''
                        this.nuevo_correo=''
                        this.nuevo_departamento=''
                        this.var_tipo_usuario=''
                        alert("Usuario dado de alta con Éxito.")
                        this.consulta_lista_usuarios_y_analistas_factibilidad()
                        this.consultar_usuarios()
                   }else{
                    alert("Algo salio mal.")
                   }
                })
            },
            consultar_usuarios(){
                axios.post('consulta_usuarios.php',{
                }).then(response =>{
                    this.array_usuarios=response.data
                    console.log(this.array_usuarios)
                })
            },
            editarUsuarios(bandera,index){
              
                this.id_update = index
                if(bandera==1){
                    this.bandera_editar_user = true
                    this.u_user=this.array_usuarios[index-1].user
                    this.u_password=this.array_usuarios[index-1].password
                    this.u_email=this.array_usuarios[index-1].email
                    this.u_nombre=this.array_usuarios[index-1].nombre
                    this.u_departamento=this.array_usuarios[index-1].departamento
                    this.u_tipo=this.array_usuarios[index-1].tipo

                }
                if(bandera==0){
                    this.bandera_editar_user = false
                }
            },
            actualizar_admin_y_analista(id){
                axios.post('guardar_analista_o_admin.php',{
                    nuevo_usuario:  this.u_user,
                    nuevo_password: this.u_password,
                    nuevo_nombre:  this.u_nombre,
                    nuevo_correo: this.u_email,
                    nuevo_departamento: this.u_departamento,
                    var_tipo_usuario: this.u_tipo,
                    id: id,
                    accion: 'actualizar',
                    }).then(response =>{
                    console.log(response.data);
                   if(response.data=='Bien'){
                        this.bandera_editar_user = false
                        this.id_update = 0
                        this.consulta_lista_usuarios_y_analistas_factibilidad()
                        this.consultar_usuarios()
                   }else{
                    alert("Algo salio mal.")
                   }
                })
            },
            /*PREMIOS SOLICITADOS*/
            consultar_premios_solicitados(){
                axios.post("consultar_solicitud_premios_colaborador.php",{
                }).then(response =>{
                    this.concentrado_status_premios = response.data
                })
            },
            editarStutasPremioSolicitado(bandera,index){
              this.id_updates = index
              if(bandera==1){
                  /*this.bandera_editar_user = true
                  this.u_user=this.array_usuarios[index-1].user
                  this.u_password=this.array_usuarios[index-1].password
                  this.u_email=this.array_usuarios[index-1].email
                  this.u_nombre=this.array_usuarios[index-1].nombre
                  this.u_departamento=this.array_usuarios[index-1].departamento
                  this.u_tipo=this.array_usuarios[index-1].tipo*/
                  this.numero_solped=this.concentrado_status_premios[index-1].solped
                  this.premio_status=this.concentrado_status_premios[index-1].status
              }
              if(bandera==0){
                  this.bandera_editar_solicitud = false
              }
          },
          guardarStutasPremioSolicitado(id_premio){
            axios.post("actualizar_solped_status.php",{
                id_premio: id_premio,
                numero_solped: this.numero_solped,
                premio_status: this.premio_status
            }).then(response =>{
                if(response.data==true){
                    this.id_updates=0
                    this.bandera_editar_solicitud = false
                    this.consultar_premios_solicitados()
                }else{
                    alert("Algo salio mal al actualizar Solped y Status")
                }
            })
          },
          finalizarEntregaPremio(id_premio){
            if(!confirm("El premio se a entregado al colaborador."))return
                axios.post("actualizar_solped_status.php",{
                    id_premio: id_premio,
                    numero_solped: this.numero_solped,
                    premio_status: "Entregado"
                }).then(response =>{
                    if(response.data==true){
                        this.id_updates=0
                        this.bandera_editar_solicitud = false
                        this.consultar_premios_solicitados()
                    }else{
                        alert("Algo salio mal al actualizar Solped y Status")
                    }
                })
          },
          consultar_colaboradores(){
            axios.post("consultar_colaboradores.php",{
            }).then(response =>{
                this.concentrado_colaboradores = response.data
               // console.log("AVER",this.concentrado_colaboradores)
            })
          },
          subirExcelNuevosColaboradores(){
            let formData = new FormData();
               
               
                   var files = this.$refs.documentoExcel.files;
                   var totalfiles = this.$refs.documentoExcel.files.length;
              
              
               for (var index = 0; index < totalfiles; index++) {
                formData.append("files[]", files[index]);//arreglo de documentos
               }
                axios.post("subir_excel_nuevos_colaboradores.php", formData,
                    {
                     headers: {"Content-Type": "multipart/form-data"}
                    })
                    .then(response => {
                        console.log(response.data);
                       if(response.data==true){
                            this.consultar_colaboradores();
                            alert("Subida Exitosa.")
                       }else{
                            alert("Algo salio Mal.")
                            this.consultar_colaboradores();
                       }
                    })
                    .catch(error => {
                        console.log(error);
                    });
               

          },
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