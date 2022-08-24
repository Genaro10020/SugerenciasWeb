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
                </div>
            </div>
                 <!--CUERPO-->
            <div class="row" style="min-height:76vh">
            <!--////////////////////////////////////////////////////////PRINCIPAL MEJORA-->
                   <div v-if="ventana=='principalMejora'">
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
                                        <td>{{concentrado.cumplimiento}}%</td>
                                        <td>
                                            <!--<a v-if="concentrado.status=='Cerrada/Fast Response' || concentrado.status=='Cerrada/No Factible'" data-bs-toggle="modal" data-bs-target="#modalCambiaraEnFactibilidad" style="cursor: pointer; text-decoration: underline blue;" @click="datos_modal(concentrado.id)" ><p class="fw-bold text-primary">{{concentrado.status}}</p></a>
                                            <a v-else> {{concentrado.status}}</a>-->
                                            <a data-bs-toggle="modal" data-bs-target="#modalCambiaraEnFactibilidad" style="cursor: pointer; text-decoration: underline blue;" @click="datos_modal(concentrado.id)" ><p class="fw-bold text-primary">{{concentrado.status}}</p></a>
                                        </td>
                                        <td> 
                                                <div class="d-flex justify-content-around">
                                                    <div>
                                                           <div v-if="concentrado.validacion_de_impacto =='Cuantitativo'"><!--BTN VERDE-->
                                                                <button v-show="concentrado.status=='Implementada'" type="button" class="btn btn-success" @click="datos_modal(concentrado.id, concentrado.folio,'Cuantitativo',concentrado.numero_nomina)" style=" font-size:.9em" data-bs-toggle="modal" data-bs-target="#modalImpactoCuantitativo">Impacto Cuantitativo</button>
                                                                <button v-show="concentrado.status=='Implementada'" type="button" class="btn btn-danger ms-2" @click="vaciarValidaciondeImpacto(concentrado.id,'Cuantitativo')" title="Limpiar impacto" style=" font-size:.9em">x</button>
                                                           </div>
                                                           <div v-else><!--BTN GRIS-->                                                           
                                                                <button v-show="concentrado.status=='Implementada'" type="button" class="btn btn-secondary" @click="datos_modal(concentrado.id, concentrado.folio,'Cuantitativo',concentrado.numero_nomina)" style=" font-size:.9em" data-bs-toggle="modal" data-bs-target="#modalImpactoCuantitativo">Impacto Cuantitativo</button>
                                                           </div> 
                                                    </div>
                                                    <div>
                                                            <div v-if="concentrado.validacion_de_impacto =='Cualitativo'"><!--BTN VERDE-->
                                                                <button v-show="concentrado.status=='Implementada'" type="button" class="btn btn-success" @click="datos_modal(concentrado.id, concentrado.folio,'Cualitativo',concentrado.numero_nomina)" style=" font-size:.9em" data-bs-toggle="modal" data-bs-target="#modalImpactoCualitativo">Impacto Cualitativo</button>
                                                                <button v-show="concentrado.status=='Implementada'" type="button" class="btn btn-danger ms-2" @click="vaciarValidaciondeImpacto(concentrado.id,'Cualitativo')" title="Limpiar impacto" style=" font-size:.9em">x</button>
                                                            </div>
                                                            <div v-else><!--BTN GRIS-->
                                                                <button v-show="concentrado.status=='Implementada'" type="button" class="btn btn-secondary" @click="datos_modal(concentrado.id, concentrado.folio,'Cualitativo',concentrado.numero_nomina)" style=" font-size:.9em" data-bs-toggle="modal" data-bs-target="#modalImpactoCualitativo">Impacto Cualitativo</button>
                                                            </div>  
                                                    </div>
                                                 </div>
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
                                                                                            <input v-model="indicador" type="text" class="form-control" style="font-size:.8em" required/>
                                                                                        </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-12 col-sm-6">
                                                                                            <label>Línea Base:</label>
                                                                                            <input  v-model="linea_base" type="text" class=" form-control" style="font-size:.8em" required/>
                                                                                        </div>
                                                                                        <div class="col-12 col-sm-6">
                                                                                            <label>Resultado Esperado:</label>
                                                                                            <input v-model="resultado_esperado" type="text" class=" form-control" style="font-size:.8em" required/>
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
                                                                                            <input v-model="puntos_asignados" type="number" class=" form-control" style="font-size:.8em" required/>
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
                                                                                            <textarea v-model="impacto_cualitativo" type="text" class="form-control" style="font-size:.8em;" required></textarea>
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
                                                                                            <input v-model="puntos_asignados_cualitativos" type="number" class=" form-control" style="font-size:.8em" required/>
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


                   </div> <!--fin contenido principal gonher-->
                   <!--////////////////////////////////////////////////////////APARTADO CONCENTRADO DE SUGERENCIAS-->
                   <div v-else-if="ventana=='concentrado'">
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
                                                <td><input class="inputs-concentrado" type="text" v-model="var_impacto_planeado" name="impacto planeado" ></input></td>
                                                <td><input class="inputs-concentrado" type="text" v-model="var_impacto_real" name="impacto_real" ></input></td>
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
                                                    <button v-show="concentrado.cantidadDOC == 0"type="button" class="btn btn-secondary  ms-2" title="Subir Sugerencia" data-bs-toggle="modal" data-bs-target="#modal" @click="modal_subir_ver_documentos('Subir',concentrado.id,concentrado.folio,'sugerencia',concentrado.cantidadDOC)"><i class="bi bi-paperclip"></i>{{concentrado.cantidadDOC}}</button>
                                                    <button v-show="concentrado.cantidadDOC != 0" type="button" class="btn btn-success  ms-2" title="Subir Sugerencia" data-bs-toggle="modal" data-bs-target="#modal" @click="modal_subir_ver_documentos('Subir',concentrado.id,concentrado.folio,'sugerencia',concentrado.cantidadDOC)"><i class="bi bi-paperclip"></i>{{concentrado.cantidadDOC}}</button>
                                                    <!--Deshabilitar btn si no esta al 99% el plan (100% actividades)-->
                                                    <button v-show="concentrado.cumplimiento < 99 || concentrado.cumplimiento =='' || concentrado.status!='En Implementación' && concentrado.status!='Implementada'" type="button" class="btn btn-secondary  ms-2" title="Subir PPT(Deshabilitado)" disabled ><i class="bi bi-paperclip"></i>{{concentrado.cantidadPPT}}</button >
                                                    <button v-show="concentrado.cantidadPPT == 0 && concentrado.cumplimiento >= 99 && concentrado.status=='En Implementación' || concentrado.cantidadPPT == 0 && concentrado.cumplimiento >= 99 && concentrado.status=='Implementada'"  type="button" class="btn btn-secondary  ms-2" title="Subir PPT" data-bs-toggle="modal" data-bs-target="#modal" @click="modal_subir_ver_documentos('Subir',concentrado.id,concentrado.folio,'ppt',concentrado.cantidadPPT)"><i class="bi bi-paperclip"></i>{{concentrado.cantidadPPT}}</button>
                                                    <button v-show="concentrado.cantidadPPT != 0 && concentrado.cumplimiento >= 99 && concentrado.status=='En Implementación' || concentrado.cantidadPPT != 0 && concentrado.cumplimiento >= 99 && concentrado.status=='Implementada'" type="button" class="btn btn-success  ms-2" title="Subir PPT" data-bs-toggle="modal" data-bs-target="#modal" @click="modal_subir_ver_documentos('Subir',concentrado.id,concentrado.folio,'ppt',concentrado.cantidadPPT)"><i class="bi bi-paperclip">{{concentrado.cantidadPPT}}</i></button>
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
                                                <td><label>{{concentrado.causa_no_factibilidad}}</label></td>
                                                <td><textarea class="inputs-concentrado text-area" type="text" v-model="var_situacion_actual"  v-if="actualizar_sugerencia==index+1"></textarea><label v-else>{{concentrado.situacion_actual}}</label></td>
                                                <td><textarea class="inputs-concentrado text-area" type="text"  v-model="var_idea_propuesta"  v-if="actualizar_sugerencia==index+1"></textarea><label v-else>{{concentrado.idea_propuesta}}</label></td>
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
                                                <td><input class="inputs-concentrado" type="text" v-model="var_impacto_planeado" name="impacto planeado" v-if="actualizar_sugerencia==index+1"></input><label v-else>{{concentrado.impacto_planeado}}</label></td>
                                                <td><input class="inputs-concentrado" type="text" v-model="var_impacto_real" name="impacto_real" v-if="actualizar_sugerencia==index+1"></input><label v-else>{{concentrado.impacto_real}}</label></td>
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
                   <div v-else-if="ventana=='premios'">
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
                                                
                                                        <td class="align-middle">
                                                        <button  class="btn btn-primary" title="Guardar Reto" @click="guardarActualizarPremios('','','Insertar')"><i class="bi bi-check-circle"></i></button>       
                                                        </td>
                                                        <td>
                                                            <input class="inputs-concentrado" type="text" v-model="codigo_premios" required></input>                  
                                                        </td>
                                                        <td>  
                                                            <textarea class="inputs-concentrado text-area" type="text" v-model="descripcion_premios" required></textarea>                 
                                                        </td>
                                                        <td>
                                                            <input class="inputs-concentrado" type="text" v-model="puntos_canjear_premios" required></input>   
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
                                                                            <button v-show="bandera_editar_premio==true" class="btn btn-primary me-2" title="Guardar Reto" @click="guardarActualizarPremios(0,premios.id,'Actualizar')"><i class="bi bi-check-circle"></i></button> 
                                                                            <button v-if="premios.cant_img>0" type="button" class="btn btn-success" title="Subir Imagen" data-bs-toggle="modal" @click="modal_subir_ver_documentos('Subir',premios.id,premios.codigo_premio,'premio',premios.cant_img)" data-bs-target="#modal"><i class="bi bi-paperclip">{{premios.cantidad_img}}</i></button>
                                                                            <button v-else type="button" class="btn btn-secondary " title="Subir Imagen" data-bs-toggle="modal" @click="modal_subir_ver_documentos('Subir',premios.id,premios.codigo_premio,'premio',premios.cant_img)" data-bs-target="#modal"><i class="bi bi-paperclip">{{premios.cantidad_img}}</i></button>    
                                                                </td>
                                                                <td>
                                                                
                                                                     <label><b>{{index+1}}</b></label>
                                                                </td>
                                                                <td>
                                                                <img class="img-thumbnail min-w-25" style="max-width:100px" :src="'http://localhost/sugerencias/'+premios.url_premio" />
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
                   <div v-else-if="ventana=='retos'">
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
                                                
                                                        <td class="align-middle">
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
                                                                            <button v-if="retos.cantidad_img>0" type="button" class="btn btn-success  ms-2" title="Subir Imagen" data-bs-toggle="modal" @click="modal_subir_ver_documentos('Subir',retos.id,retos.folio_reto,'reto',retos.cantidad_img)" data-bs-target="#modal"><i class="bi bi-paperclip">{{retos.cantidad_img}}</i></button>
                                                                            <button v-else type="button" class="btn btn-secondary " title="Subir Imagen" data-bs-toggle="modal" @click="modal_subir_ver_documentos('Subir',retos.id,retos.folio_reto,'reto',retos.cantidad_img)" data-bs-target="#modal"><i class="bi bi-paperclip">{{retos.cantidad_img}}</i></button>    
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
                   <div v-else-if="ventana=='configuracion'">
                    <!--//////////////////////////////////////////////////////////////////////////////APARTADO CONFIGURACIÓN-->
                    
                                <div class="row justify-content-center align-items-start ">
                                        <div class="cintilla col-12 text-center">
                                        <b> CONFIGURACIÓN</b>
                                        </div>
                                </div>
                                <div class="row h-100">
                               
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="col-12 col-sm-6 col-lg-4 col-xl-3 col-xxl-2 bg-light  border bordered-2 border-secondary rounded-2">
                                            <form @submit.prevent="guardar_admin_y_analista" class="m-2">
                                            <div class="text-center"><span class="badge text-dark ">ALTA DE USUARIOS/ANALISTAS.</span></div>
                                                <div class="mb-3">
                                                <div><span class="badge text-dark">Usuario (No. de Control):</span></div>
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
                                                    <div><span class="badge text-dark">Departamente:</span></div>
                                                    <input type="text"   class="form-control" v-model="nuevo_departamento" required>
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
                nueva_sugerencia:false,
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
                /*Variables Configuracion*/
                nuevo_usuario:'',
                nuevo_password:'',
                nuevo_nombre:'',
                nuevo_correo:'',
                nuevo_departamento:'',
                array_tipo_usuario: ['Admin','Analista'],
                var_tipo_usuario:'',
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
                   if(dato=='configuracion'){this.pintarCinco=true}else{this.pintarCinco=false}
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
                    console.log(this.concentrado_actividades = response.data)
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
        this.buscarDocumentos()
        this.buscarDatosValidacionImpacto()
        
        
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
                           /*const items = document.getElementsByClassName("modal-backdrop fade show")// obtengo div con estas clases
                           items[0].className = ""; // sustituyo y elimino a nada. 
                           bootstrap.Modal.getOrCreateInstance(document.getElementById('modalImpactoCuantitativo')).hide()//oculto contenido*/
                            this.consultado_concentrado()
                            //window.location.reload();
                            
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
                            //window.location.reload();
                           alert("Los datos se guardaron/actualizaron correctamente.")
                           /*const items = document.getElementsByClassName("modal-backdrop fade show")// obtengo div con estas clases
                           items[0].className = ""; // sustituyo y elimino a nada. 
                           bootstrap.Modal.getOrCreateInstance(document.getElementById('modalImpactoCualitativo')).hide()//oculto contenido*/
                          
                            this.consultado_concentrado()
                            
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
                    this.extensiones_valida = '(.png, .jpeg, .jpg, .pdf)'
                }else if(this.cual_documento == 'ppt'){
                    this.extensiones_valida = '(.docx, .ppt, .pptx)'
                }else if(this.cual_documento == 'reto'){
                    this.extensiones_valida = '(.png, .jpeg, .jpg, .pdf)'
                }else if(this.cual_documento == 'premio'){
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
                            //this.cantidadDOCFILE = this.fileppt.length
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
                           // this.cantidadDOCFILE = this.filedoc.length
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
                           // this.cantidadDOCFILE = this.filedoc.length
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
                           // this.cantidadDOCFILE = this.filedoc.length
                            document.getElementById("input_file_subir").value=""
                            alert(this.filepremio.length + " archivo/s se han subido.")
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
                //alert(this.folio_carpeta_doc+this.cual_documento)
                this.filenames=[] //limpiado vista del documento subido en modal 
                this.filedoc=[]//limpiado vista del documento bajada en modal 
                this.fileppt=[]//limpiado vista del documento bajada en modal 
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
                                                /*alert("Sin Documentos agregados.")*/
                                            }
                                            this.consultado_concentrado()
                                }
                                if(this.cual_documento=="ppt"){
                                            this.fileppt = response.data
                                            this.cantidadDOCFILE = this.fileppt.length
                                            if(this.fileppt.length>0){
                                                console.log(this.fileppt.length + "Archivos encontrados.")
                                            }else{
                                                /*alert("Sin Documentos agregados.")*/
                                            }
                                            this.consultado_concentrado()
                                    }
                                if(this.cual_documento=="reto"){
                                            this.filereto = response.data
                                            this.cantidadDOCFILE = this.filereto.length
                                            if(this.filereto.length>0){
                                                console.log(this.filereto.length + "Archivos encontrados.")
                                            }else{
                                                /*alert("Sin Documentos agregados.")*/
                                            }
                                            this.consultaConcentradoRetos()
                                    }
                                if(this.cual_documento=="premio"){
                                            this.filepremio = response.data
                                            this.cantidadDOCFILE = this.filepremio.length
                                            if(this.filepremio.length>0){
                                                console.log(this.filepremio.length + "Archivos encontrados.")
                                            }else{
                                                /*alert("Sin Documentos agregados.")*/
                                            }
                                            this.consultar_concentrado_premios()
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
                                        axios.post("guardar_actualizar_premio.php",{
                                            id_premio:id_premio,
                                            insertar_actualizar: insertar_actualizar,
                                            codigo_premios: this.codigo_premios,
                                            descripcion_premios: this.descripcion_premios,
                                            puntos_canjear_premios: this.puntos_canjear_premios

                                        }).then(response =>{
                                            if(response.data== true){
                                                this.bandera_editar_premio = false
                                                this.actualizar_premios=index

                                                this.codigo_premios = ''
                                                this.descripcion_premios = ''
                                                this.puntos_canjear_premios = ''
                                                this.consultar_concentrado_premios()
                                            }else{
                                                alert('Problemas para guardar premio en BD')
                                            }
                                            console.log(response.data)
                                        }).catch(error =>{

                                        })
                                
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
                            alert("Premio Eliminado con Éxito")//AQUI

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
        
            /*METODOS DE ADMINISTRACION*/
            guardar_admin_y_analista(){
                axios.post('guardar_analista_o_admin.php',{
                    nuevo_usuario: this.nuevo_usuario,
                    nuevo_password: this.nuevo_password,
                    nuevo_nombre: this.nuevo_nombre,
                    nuevo_correo: this.nuevo_correo,
                    nuevo_departamento: this.nuevo_departamento,
                    var_tipo_usuario: this.var_tipo_usuario
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
                   }else{
                    alert("Algo salio mal.")
                   }
                })
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