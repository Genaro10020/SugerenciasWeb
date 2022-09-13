<?php
session_start();
if ($_SESSION["usuario"] ){ 
$incrementar=1;
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
<body id="body">
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
               
                            <button class="opciones mx-lg-2 rounded-3 " @click="mostrar('principalAnalista')"  v-bind:class="{pintarUno}" >
                               Seguimiento a Sugerencias
                            </button>  
                            <button class="opciones  mx-lg-2 rounded-3" @click="mostrar('impactoSugerencia')" v-bind:class="{pintarDos}">
                                Impacto de Sugerencias
                            </button> 

                </div>
            </div>
                 <!--CUERPO-->
            <div class="row" style="min-height:76vh">
            <!--////////////////////////////////////////////////////////PRINCIPAL MEJORA-->
                   <div v-if="ventana=='principalAnalista'">
                            <!--cinta apartado-->
                            <div class="row justify-content-center align-items-start ">
                                    <div class="cintilla col-12 text-center">
                                    <b> PRINCIPAL ANALISTA </b>
                                    </div>
                            </div>
                            <!--fin cinta apartado-->
                            <!-- contenido principal analista gonher-->
                          <div class="row">  
                            
                                <div class="col-12 col-lg-6"><!--tabla pediente factibilidad-->
                                            <div class="text-center mt-3 ">
                                                <span class="badge bg-light text-dark">Sugerencias Pendientes de Factibilidad: <?php echo $_SESSION['nombre']; ?></span>
                                            </div>
                                            <div class="div-scroll mt-3">
                                                <table class="tablaMonitoreo-sugerencias table table-striped table-bordered ">
                                                <thead class="encabezado-tabla text-center text-light ">
                                                    <tr >
                                                    <th scope="col " class="sticky">#</th>
                                                    <th scope="col">Folio</th>
                                                    <th scope="col">Nombre de Sugerencia</th>
                                                    <th scope="col">Fecha de Inicio </th>
                                                    <th scope="col">Fecha Limite </th>
                                                    <th scope="col">Status de Factibilidad</th>
                                                    <th scope="col">Status Plan de Trabajo</th>
                                                    
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(concentrado, index) in concentrado_sugerencias_pendiente_factibilidad">
                                                    <th scope="row" class="text-center">{{index+1}}</th>
                                                        <td>{{concentrado.folio}}</td>
                                                        <td>{{concentrado.nombre_sugerencia}}</td>
                                                        <td>{{concentrado.fecha_de_inicio}}</td>
                                                        <td>{{concentrado.fecha_limite}}</td>
                                                        <td class="text-center">
                                                            <button v-if="concentrado.status_factibilidad=='Pendiente'" type="button" class="btn btn-warning" style=" font-size: 1em" title="Factible o No Factible" data-bs-toggle="modal" data-bs-target="#modal" 
                                                            @click="datos_modal_factibilidad('factibilidad',concentrado.id,concentrado.folio,concentrado.status,concentrado.respuesta_analista,concentrado.check_mc)"><i class="bi bi-eye"></i> {{concentrado.status}} </button>
                                                            <button v-else="concentrado.status_factibilidad=='Vencida'" type="button" class="btn btn-danger" style=" font-size: 1em" title="Factible o No Factible" data-bs-toggle="modal" data-bs-target="#modal" 
                                                            @click="datos_modal_factibilidad('factibilidad',concentrado.id,concentrado.folio,concentrado.status,concentrado.respuesta_analista,concentrado.check_mc)"><i class="bi bi-eye"></i> {{concentrado.status}} </button>
                                                        </td>
                                                        <td>
                                                            <label> {{concentrado.check_mc}}</label>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                </table>
                                            </div>
                                 </div>
                                 <div class="col-12 col-lg-6"><!--tabla pendiente implementacion-->
                                            <div class="text-center mt-3 ">
                                                <span class="badge bg-light text-dark">Sugerencias Pendientes de Implementación: <?php echo $_SESSION['nombre']; ?></span>
                                            </div>
                                            <div class="div-scroll mt-3">
                                                <table class="tablaMonitoreo-sugerencias table table-striped table-bordered ">
                                                <thead class="encabezado-tabla text-center text-light ">
                                                    <tr >
                                                    <th scope="col " class="sticky">#</th>
                                                    <th scope="col">Folio</th>
                                                    <th scope="col">Nombre de Sugerencia</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Dias restantes</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr  v-for="(concentrado, index) in concentrado_sugerencias_pendiente_implementacion">
                                                    <th scope="row" class="text-center">{{index+1}}</th>
                                                        <td>{{concentrado.folio}}</td>  
                                                        <td>{{concentrado.nombre_sugerencia}}</td>
                                                        <td class="text-center"><label class="me-2"><b>{{concentrado.cumplimiento}}% </b></label> 
                                                        <!--Amarillo-->
                                                            <button v-show="concentrado.dias_restantes>7" type="button" class="btn btn-warning" style="font-size: 1em; " data-bs-toggle="modal" data-bs-target="#modal"  title="Ver Plan de Trabajo"
                                                            @click="datos_modal_factibilidad('En Implementación',concentrado.id,concentrado.folio,concentrado.status,concentrado.respuesta_analista,concentrado.check_mc)"><i class="bi bi-pencil"></i></i> {{concentrado.status}} </button>
                                                       
                                                            <button  v-show="concentrado.dias_restantes>=1 && concentrado.dias_restantes<=7 " type="button" class="btn"  style="font-size: 1em; background-color: #fd7e14; border: 1px solid #" data-bs-toggle="modal" data-bs-target="#modal"  title="Ver Plan de Trabajo"
                                                            @click="datos_modal_factibilidad('En Implementación',concentrado.id,concentrado.folio,concentrado.status,concentrado.respuesta_analista,concentrado.check_mc)"><i class="bi bi-pencil"></i></i> {{concentrado.status}} </button>
                                                     
                                                            <button v-show="concentrado.dias_restantes<=0"  type="button" class="btn btn-danger" style="font-size: 1em;" data-bs-toggle="modal" data-bs-target="#modal"  title="Ver Plan de Trabajo"
                                                            @click="datos_modal_factibilidad('En Implementación',concentrado.id,concentrado.folio,concentrado.status,concentrado.respuesta_analista,concentrado.check_mc)"><i class="bi bi-pencil"></i></i> {{concentrado.status}} </button>
                                                        </td>
                                                        <td class="text-center " style="vertical-align:middle" >
                                                            <label class=" my-around ">{{concentrado.dias_restantes}}</label>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                </table>
                                            </div>
                                 </div>
                            </div>
                             <!--fin contenido principal analista gonher-->
                 <!-- Factibilidad -->
                    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="font-size:.8em">
                            <div class="modal-dialog modal-xl modal-dialog-centered " >
                                <div class="modal-content " >
                                                <div class="modal-header">        
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                            <div class="d-flex justify-content-center mt-3 ">
                                                                <span class="badge bg-light text-dark">FACTIBILIDAD DE SUGERENCIA FOLIO: {{folio}} </span>
                                                            </div>
                                                                <div class="modal-body alert alert-secondary">
                                                                        <div class="">
                                                                            <div class="" v-for="(concentrado,index) in concentrado_sugerencias_pendiente_implementacion">
                                                                                        <div v-if="concentrado.id==id_concentrado_general">
                                                                                        <label class=" fw-bold mt-1">Nombre de la sugerencias: </label> {{ concentrado.nombre_sugerencia}}<br>
                                                                                        <label class=" fw-bold mt-1">Situacion Actual: </label> {{concentrado.situacion_actual}}<br>
                                                                                        <label class=" fw-bold mt-1">Idea Propuesta: </label> {{concentrado.idea_propuesta}}<br>
                                                                                        <label class=" fw-bold mt-1">Colaborador: </label> {{concentrado.colaborador}}<br>
                                                                                        <label class=" fw-bold mt-1">No. de Nomina:</label> {{concentrado.numero_nomina}}<br>
                                                                                        <label class=" fw-bold mt-1">Puesto: </label> {{concentrado.puesto}}<br>
                                                                                        <label class=" fw-bold mt-1">Área: </label> {{concentrado.area}}<br>
                                                                                        <label class=" fw-bold mt-1">Subárea: </label> {{concentrado.subarea}}<br>
                                                                                        <label class=" fw-bold mt-1">Fecha de Sugerencia: </label> {{concentrado.fecha_de_sugerencia}}<br>
                                                                                        </div>
                                                                            </div>
                                                                            <div class="" v-for="(concentrado,index) in concentrado_sugerencias_pendiente_factibilidad">
                                                                                        <div v-if="concentrado.id==id_concentrado_general">
                                                                                        <label class=" fw-bold mt-1">Nombre de la sugerencias: </label> {{ concentrado.nombre_sugerencia}}<br>
                                                                                        <label class=" fw-bold mt-1">Situacion Actual: </label> {{concentrado.situacion_actual}}<br>
                                                                                        <label class=" fw-bold mt-1">Idea Propuesta: </label> {{concentrado.idea_propuesta}}<br>
                                                                                        <label class=" fw-bold mt-1">Colaborador: </label> {{concentrado.colaborador}}<br>
                                                                                        <label class=" fw-bold mt-1">No. de Nomina:</label> {{concentrado.numero_nomina}}<br>
                                                                                        <label class=" fw-bold mt-1">Puesto: </label> {{concentrado.puesto}}<br>
                                                                                        <label class=" fw-bold mt-1">Área: </label> {{concentrado.area}}<br>
                                                                                        <label class=" fw-bold mt-1">Subárea: </label> {{concentrado.subarea}}<br>
                                                                                        <label class=" fw-bold mt-1">Fecha de Sugerencia: </label> {{concentrado.fecha_de_sugerencia}}<br>
                                                                                        </div>
                                                                            </div>
                                                                        </div>
                                                                </div>

                                                <div class="row" style="font-size:.9em">
                                                                <div class="col-12" v-for= "(documento,index) in documentos"><!--Espacio Vista Documentos-->
                                                                        <div class="col-12 alert alert-secondary">
                                                                            <div class="col-12 text-center">
                                                                                <span class="badge bg-secondary ">Documento {{index+1}}</span><br>
                                                                            </div>
                                                                            <div>
                                                                                <iframe :src="documentos[index]" style="width:100%;height:500px;"></iframe>
                                                                            </div>
                                                                        <!-- <iframe src="https://vvnorth.com/Sugerencias/documentos/pdf.pdf" style="width:100%;height:500px;"></iframe>-->
                                                                        </div>
                                                                </div><!--Fin Vista Documentos--->
                                                                      <!--Formualario-->
                                                                      <div class="col-12" v-show="factible==true"><span class="badge text-dark fs-1"><p>FACTIBLE<p></span></div>
                                                                      <div class="col-12" v-show="no_factible==true"><span class="badge text-dark fs-1"><p>NO FACTIBLE<p></span></div>
                                                                <div class="col-12" v-show="factible==true"><!--ESPACIO FACTIBLE-->
                                                                    <hr>
                                                                            <div class=" mt-3 ">
                                                                                <span class="badge bg-light text-dark">FORMULARIO IMPACTO</span>
                                                                            </div>
                                                                        <div class="col-12" style=" background-color:#e9f3e7">
                                                                                <div class="row mt-2 mx-3 ">
                                                                                    <div class="col-12 col-lg-6 ">
                                                                                        Impacto Primerio(*):<br>
                                                                                        <select class="" v-model="impacto_primario" :disabled="deshabilitar">
                                                                                                <option value="" >Seleccione una opción..</option>
                                                                                                <option  v-for=" lista in lista_impacto" :key="lista.id">{{lista.impacto}}</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-12 col-lg-6">
                                                                                        Impacto Secundario(*):<br>
                                                                                        <select class="" v-model="impacto_secundario" :disabled="deshabilitar">
                                                                                                <option value="" >Seleccione una opción..</option>
                                                                                                <option v-for=" lista in lista_impacto" :key="lista.id">{{lista.impacto}}</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>   
                                                                                <div class="row mt-2 mx-3 ">
                                                                                        <div class="col-12 col-lg-6">
                                                                                        Tipo de desperdicio(*):<br>
                                                                                            <select class="" v-model="tipo_desperdicio" :disabled="deshabilitar">
                                                                                                    <option value="" >Seleccione una opción..</option>
                                                                                                    <option  v-for=" lista in lista_tipo_desperdicio" :key="lista.id">{{lista.tipo_de_desperdicio}}</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-12 col-lg-6  mt-3 mb-2" style=" font-size: 10px">
                                                                                            Objetivos de Calidad y M.A.(*):<br>
                                                                                            <div  class="inputs-concentrado" style="overflow-y: scroll; height:80px" >
                                                                                                    <label>{{var_objetivo_de_calidadMA}}</label>
                                                                                                        <ul >
                                                                                                            <li v-for="objetivo_de_calidad in objetivo_de_calidadMA">
                                                                                                                <input type="checkbox" :value="objetivo_de_calidad.objetivos_de_calidad" v-model="var_objetivo_de_calidadMA" :disabled="deshabilitar">
                                                                                                                <label for="objetivo_de_calidad">{{objetivo_de_calidad.objetivos_de_calidad}}</label>
                                                                                                            </li>
                                                                                                        </ul>
                                                                                            </div>
                                                                                        </div>
                                                                                </div>   
                                                                                <!--<div class="col-12 text-center"> <button type="button" class="btn btn-success mb-2" style="font-size:0.9em" @click="guardarFormularioImpacto" v-show="deshabilitar==false">Guardar</button></div>-->
                                                                        </div>   
                                                                </div>
                                                                <!--fin formulario-->
                                                                <div class="col-12" v-show="factible==true" ><!--espacio Plan de trabajo-->
                                                                        <hr>
                                                                        <div class="">
                                                                            <span class="badge bg-light text-dark">PLAN DE TRABAJO</span>
                                                                        </div>
                                                                        <div class="col-12 text-center inline-block" >
                                                                            <div>
                                                                                <button  v-show="deshabilitar==false" class="boton-nuevo mb-1" @click="nueva_actividad = true, editarActividad(0)"><i class="bi bi-plus-circle"></i> Nueva Actividad</button>
                                                                            </div>
                                                                        </div>
                                                                    <div class="col-12" style=" background-color:#e9f3e7">     
                                                                        <div class="div-scroll"><!--Scroll-->
                                                                            <table class="tablaMonitoreo-sugerencias table table-striped table-bordered text-center" style=" font-size: 12px">
                                                                                <thead class="encabezado-tabla text-center text-light ">
                                                                                    <tr >
                                                                                    <th scope="col" class="sticky"></th>
                                                                                    <th scope="col">No. Actividad</th>
                                                                                    <th scope="col">Descripción Actividad</th>
                                                                                    <th scope="col">Responsable</th>
                                                                                    <th scope="col">Fecha de Inicio</th>
                                                                                    <th scope="col">Fecha de Cierre</th>
                                                                                    <th scope="col">% Porcentaje</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr class="align-middle bg-info" v-show="nueva_actividad"><!--Nueva Actividad Fila-->
                                                                                            <td class="sticky"> 
                                                                                                <button type="button" class="btn btn-danger  me-2" title="Cancelar" @click="nueva_actividad=false"><i class="bi bi-x-circle" ></i></button>
                                                                                                <button type="button" class="btn btn-primary" title="Guardar" @click="guardarEditarActividad('nuevo','')"><i class="bi bi-check-circle"></i></button>
                                                                                            </td> 
                                                                                        <th scope="row">
                                                                                            <label>{{numero_nueva_actividad}}</label></th>
                                                                                        <td>
                                                                                            <textarea class="inputs-concentrado text-area" type="text"   v-model="descripcion_actividad"></textarea></td>
                                                                                        <td>
                                                                                        <select class="inputs-concentrado" v-model="responsable_plan" >
                                                                                            <option value="" disabled>Seleccione Analista..</option>
                                                                                            <option v-for="responsable in lista_responsable_plan" :key="responsable.nombre" :value="responsable.nombre">{{responsable.nombre}}</option>
                                                                                        </select>
                                                                                        </td>
                                                                                        <td>
                                                                                            <input class="inputs-concentrado" type="date" v-model="fecha_inicial_actividad"></input></td>
                                                                                        <td>
                                                                                            <input class="inputs-concentrado" type="date" v-model="fecha_final_actividad"></input></td>
                                                                                        <td>0</td>
                                                                                    </tr><!--Fin Nueva Actividad-->
                                                                                         <!--Consulta actividades-->
                                                                                        <tr class="align-middle" v-for="(actividades, index) in concentrado_actividades">
                                                                                           
                                                                                        <td> 
                                                                                            <button v-show="check_mc!='Aceptado'" type="button" class="btn btn-danger me-2" title="Eliminar" @click="eliminarActividad(actividades.id)"><i class="bi bi-trash3-fill"></i></button>
                                                                                            <button type="button" class="btn btn-danger me-2" title="Cancelar" @click="editarActividad('')" v-if="id_actualizar==index+1"><i class="bi bi-x-circle" ></i></button>
                                                                                            <button v-show="deshabilitar==false" type="button" class="btn btn-warning me-2" title="Editar" @click="editarActividad(index+1)"><i class="bi bi-pen" ></i></button>
                                                                                            <button type="button" class="btn btn-primary " title="Guardar" @click="guardarEditarActividad('actualizar',actividades.id)" v-if="id_actualizar==index+1"><i class="bi bi-check-circle"></i></button>
                                                                                        </td> 
                                                                                            <th scope="row">
                                                                                                <label v-show="actualizar==true || check_mc=='Aceptado'">{{index+1}}</label>
                                                                                                   <!-- <select  v-model="numero_orden_en_select" v-show="actualizar==false && check_mc!='Aceptado'" title="Cambiar posición">
                                                                                                        <option  value="0" disabled>{{index+1}}</option>
                                                                                                        <option :value="index+1" v-for="numero in numero_actividad" @click="ordenarActividades(index,numero-1,numero_orden_en_select=0)">{{numero}}</option>
                                                                                                    </select>-->
                                                                                                    
                                                                                                    <select :id="'select'+index" v-show="actualizar==false && check_mc!='Aceptado'" @change="ordenarActividades(index)" title="Cambiar posición">
                                                                                                        <option  value="{{index+1}}" disabled selected>{{index+1}}</option>
                                                                                                        <option :value="numero-1" v-for="numero in numero_actividad" >{{numero}}</option>
                                                                                                    </select>  
                                                                                                     
                                                                                            </th>
                                                                                        <td>   
                                                                                            <textarea v-model="descripcion_actividad" v-if="id_actualizar==index+1" class="inputs-concentrado text-area" type="text"  ></textarea> 
                                                                                            <label v-else>{{actividades.actividad}}<label>
                                                                                                
                                                                                        </td>
                                                                                        
                                                                                       <td>
                                                                                        <select v-if="id_actualizar==index+1" class="inputs-concentrado" v-model="responsable_plan" >
                                                                                            <option value="" disabled>Seleccione Analista..</option>
                                                                                            <option v-for="responsable in lista_responsable_plan" :key="responsable.nombre" :value="responsable.nombre">{{responsable.nombre}}</option>
                                                                                        </select>
                                                                                            <label v-else>{{actividades.responsable}}<label>
                                                                                        </td>
                                                                                        <td><input v-if="id_actualizar==index+1" class="inputs-concentrado" v-model="fecha_inicial_actividad" type="date" ></input><label v-else>{{actividades.fecha_inicial}}<label></td>
                                                                                        <td><input v-if="id_actualizar==index+1" class="inputs-concentrado" v-model="fecha_final_actividad" type="date" ></input><label v-else>{{actividades.fecha_final}}<label></td>
                                                                                        <td>
                                                                                            <select :id="'select'+actividades.id" @change="actualizarPorcentajeEnActividad(actividades.id)" v-show="actualizar==false && status=='En Implementación' && check_mc=='Aceptado' && bandera_btn_finalizar!='mostrar'" class="form-control"  >
                                                                                                <option disabled selected>{{actividades.porcentaje}}%</option>
                                                                                                <option value="0">0%</option>
                                                                                                <option value="10">10%</option>
                                                                                                <option value="20">20%</option>
                                                                                                <option value="30">30%</option>
                                                                                                <option value="40">40%</option>
                                                                                                <option value="50">50%</option> 
                                                                                                <option value="60">60%</option>
                                                                                                <option value="70">70%</option>
                                                                                                <option value="80">80%</option>
                                                                                                <option value="90">90%</option>
                                                                                                <option value="100">100%</option>
                                                                                            </select>
                                                                                            <label  v-show="status!='En Implementación' && check_mc!='Aceptado'">{{actividades.porcentaje}}%<label>
                                                                                        </td>
                                                                                    </tr><!--Fin consuta actividades-->    
                                                                                </tbody>
                                                                            </table>
                                                                                 
                                                                        </div><!--scroll-->
                                                                                    <div class="text-center">
                                                                                        <span class="badge bg-light text-dark">FECHA COMPROMISO</span><br>
                                                                                             <input class="mb-3 rounded-3 border border-1 border-success" type="date" v-model="fecha_compromiso" @change="guardarFechaCompromiso" :disabled="deshabilitar"></input>
                                                                                    </div>
                                                                    </div>
                                                                    <div class="col-12 text-center">
                                                                        <button type="button" class="btn btn-success mb-2" style="font-size:0.9em" v-show="numero_actividad>0 && bandera_btn_finalizar=='mostrar' || numero_actividad>0 && check_mc==''" @click="checkPlanActividades">Finalizar Plan</button>
                                                                    </div>
                                                                    <div class="alert alert-warning fw-bold"  v-if="numero_actividad>0 && bandera_btn_finalizar!='mostrar' && check_mc=='Pendiente' || 
                                                                                                                     numero_actividad>0 && bandera_btn_finalizar!='mostrar' && check_mc=='Corregido'">
                                                                                                                     Su plan de trabajo esta siendo revisado por Mejora Continua.</div>
                                                                    <div class="alert alert-danger fw-bold"  v-if="numero_actividad>0 && bandera_btn_finalizar!='mostrar' && check_mc=='Rechazado'">
                                                                                                                     Su plan fue rechazado por Mejora Continua.</div>
                                                                    <div class="alert alert-success fw-bold"  v-if="numero_actividad>0 && bandera_btn_finalizar!='mostrar' && check_mc=='Aceptado'">
                                                                                                                    Su plan fue aceptado, favor de ejecutar en tiempo y forma.</div>
                                                                    
                                                                   
                                                                                    
                                                                                   
                                                                    
                                                                </div> <!--Fin espacio de Plana de trabajo -->  
                                                    </div><!--FIN ESPACIO FACTIBLE-->
                                                    <hr>
                                                    <div v-show="no_factible==true"><!--ESPACIO NO FACTIBLE-->
                                                    <span class="badge bg-light text-dark mb-1">ADJUNTAR EVIDENCIA DE NO FACTIBILIDAD (OPCIONAL)</span>
                                                        <form @submit.prevent="uploadFile()">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div class="custom-file my-2 ms-2"> 
                                                                                    <input type="file" id="input_file_subir"  ref="docopcionalnofactibilidad" multiple/><br>
                                                                                    <label style=" font-size:.7em;">(.png, .jpeg, .jpg, .pdf, .doc, .docx, .ppt, .pptx)</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 ms-2">
                                                                                <button  type="submit" name="upload" class="btn btn-success" style=" font-size:.7em">Subir Archivos</button>
                                                                            </div>
                                                                        </div> 
                                                        </form>

                                                        <form  @submit.prevent="guardarNofactibilidad()">
                                                                
                                                                <div class=" mt-3 ">
                                                                    
                                                                                <span class="badge bg-light text-dark mb-1">CAUSA DE NO FACTIBILIDAD</span>
                                                                                <div class="col-12 text-center bg-warning">
                                                                                    <textarea class="text-area-causa-no-factibilidad my-2" type="text" v-model="causa_no_factibilidad" style=" font-size:0.9em" required></textarea>
                                                                                </div>
                                                                </div>
                                                                <div class="text-center">
                                                                    <span class="badge bg-light text-dark">TIPO DE CIERRE</span><br>
                                                                            
                                                                                        <select class="" v-model="var_tipo_de_cierre" required>
                                                                                                <option value="" disabled>Seleccione una opción..</option>
                                                                                                <option  v-for=" lista in tipo_de_cierre" :key="lista.id" >{{lista}}</option>
                                                                                        </select>
                                                                                  
                                                                </div>
                                                                <!--<div class="alert alert-warning ">Una vez presionado "GUARDAR", esta sugerencia ya no aparecerá en la tabla de PENDIENTES DE FACTIBILIDAD.</div>-->
                                                                <div class="col-12 text-center"> <button type="submit" class="btn btn-success mt-4" style="font-size:0.9em" >Guardar</button></div>
                                                        </form>
                                                                <hr>
                                                                <div class=" mt-3 ">
                                                                <!--Adjuntar documento opcional-->
                                                                    
                                                                    <!-- Mostrando los archivos cargados -->
                                                                    <div v-show="documento_opcional.length>0 " >
                                                                    <hr>
                                                                            <div class="col-12 text-center mb-5" v-for= "(ruta_documento,index) in documento_opcional">
                                                                                    <div class="col-12 text-center">
                                                                                    Descargar {{nombre_de_descarga=ruta_documento.slice((ruta_documento.lastIndexOf('/') - 1) + 2)}}<br><!--obtengo el nombre del documento con extension-->
                                                                                        <a :href="ruta_documento" :download="nombre_de_descarga">
                                                                                            <img src="img/descargar_archivo.png" style="width:100px; height:100px;"></img>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="col-12 ">
                                                                                        <button type="button" class="btn btn-danger" @click="eliminarDocumento(ruta_documento)" >Eliminar</button>
                                                                                    </div>
                                                                                    <!--<iframe  :src="documento_opcional[index]" style="width:100%;height:500px;"></iframe>-->
                                                                                        
                                                                                    <!-- <iframe src="https://vvnorth.com/Sugerencias/documentos/pdf.pdf" style="width:100%;height:500px;"></iframe>-->
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                               
                                                    
                                                    </div>   <!--FIN ESPACIO NO FACTIBLE-->
                                                    <div class="12 modal-footer " > 
                                                        <div class="col-12 text-center">
                                                                <button v-show="status!='En Implementación' && status!='Implementada'"  type="button" class="btn btn-success btn-lg me-2 fst-italic" @click="factible = true,  no_factible = false, repuestaFactibleNoFactible('Factible')">Factible</button> 
                                                                <button v-show="status!='En Implementación' && status!='Implementada'" type="button" class="btn btn-warning btn-lg fst-italic" @click="no_factible = true, factible = false, repuestaFactibleNoFactible('No Factible')">No factible</button> 
                                                                <!--<button type="button" class="btn btn-secondary btn-sm ms-5"  data-bs-dismiss="modal" >Salir</button>-->
                                                        </div>              
                                                    </div>
                                    </div>
                                </div>
                        </div>
                             <!--fin modal-->
                   </div>
                       <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////VENTANA IMPACTO DE SUGERENCIAS-->
                    <div v-if="ventana=='impactoSugerencia'">
                                            <!--cinta apartado-->
                                            <div class="row justify-content-center align-items-start ">
                                                    <div class="cintilla col-12 text-center">
                                                     <b> CONCENTRADO IMPACTO DE SUGERENCIAS</b>
                                                    </div>
                                            </div>
                                            <!--fin cinta apartado-->
                                        <div class="row">  <!-- contenido impacto de sugerencia-->
                                                                <div class="col-12">                                
                                                                        <div class="text-center mt-3 ">
                                                                            <span class="badge bg-light text-dark">Sugerencias Pendientes de Impacto: <?php echo $_SESSION['nombre']; ?></span><br>
                                                                           <!-- {{concentrado_sugerencias_pendiente_impacto}}-->
                                                                        </div>
                                                                            <div class="div-scroll mt-3 "><!--Scroll-->
                                                                            <table class="tablaMonitoreo-sugerencias table table-striped table-bordered text-center">
                                                                                <thead class="encabezado-tabla text-center text-light ">
                                                                                    <tr >
                                                                                    <th scope="col" class="sticky">Editar/Guardar</th>
                                                                                    <th scope="col">Status</th>
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
                                                                                    <!--<th scope="col">Acumulado</th>-->
                                                                                    
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    
                                                                                <tr class="align-middle"   :style="pendiente_impacto.orden == 2? colorgreen : colorgris"  v-for="(pendiente_impacto, index) in concentrado_sugerencias_pendiente_impacto">
                                                                                        
                                                                                         <td class="sticky" style=" background: rgb(94, 94, 94); color: white;"> 
                                                                                         
                                                                                            <button v-show="btn_actualizar==true" v-if="id_actualiza==index+1" type="button" class="btn btn-danger me-2" title="Cancelar" @click="editarIndicador('','')" ><i class="bi bi-x-circle" ></i></button>
                                                                                            <button v-show="btn_actualizar==false" type="button" class="btn btn-warning me-2" title="Editar" @click="editarIndicador(pendiente_impacto.id,index+1,pendiente_impacto.orden)"><i class="bi bi-pen" ></i></button>
                                                                                            <button v-if="id_actualiza==index+1" type="button" class="btn btn-primary " title="Guardar" @click="guardarEditarIndicador(pendiente_impacto.id,pendiente_impacto.folio,pendiente_impacto.orden)" ><i class="bi bi-check-circle"></i></button>
                                                                                        </td> 
                                                                                        <td><label >{{pendiente_impacto.status_impacto}}</label></td>
                                                                                        <td><label>{{pendiente_impacto.folio}}</label></td>
                                                                                        <td><label>{{pendiente_impacto.nombre_sugerencia}}</label></td>
                                                                                        <td><label>{{pendiente_impacto.analista_de_factibilidad}}</label></td>
                                                                                        <td><label>{{pendiente_impacto.planta}}</label></td>
                                                                                        <td><label> {{pendiente_impacto.area}}</label></td>
                                                                                        <td><label>{{pendiente_impacto.subarea}}</label></td>
                                                                                        <td><label>{{pendiente_impacto.fecha_real_cierre}}</label>
                                                                                        
                                                                                        </td>
                                                                                        <td>
                                                                                                <input v-if="id_actualiza==index+1" class="rounded border-2" v-model="indicador" type="text" ></input> 
                                                                                                <div v-else v-for="concentrado_impacto_midiendo in concentrado_impacto_sugerencias_midiendo">
                                                                                                <!--{{pendiente_impacto.orden}}{{ "=="+concentrado_impacto_midiendo.orden}}-->
                                                                                                     <input v-if="concentrado_impacto_midiendo.id_concentrado == pendiente_impacto.id && pendiente_impacto.orden == concentrado_impacto_midiendo.orden" :value="concentrado_impacto_midiendo.indicador" class="rounded border-2 bg-light" type="text"  disabled></input>
                                                                                                </div>
                                                                                                    
                                                                                        </td>
                                                                                        <td>
                                                                                                <input v-if="id_actualiza==index+1" class="rounded border-2" v-model="unidades" type="text" ></input>
                                                                                                <div v-else v-for="concentrado_impacto_midiendo in concentrado_impacto_sugerencias_midiendo"> 
                                                                                                            <input v-if="concentrado_impacto_midiendo.id_concentrado == pendiente_impacto.id && pendiente_impacto.orden == concentrado_impacto_midiendo.orden" :value="concentrado_impacto_midiendo.unidades" class="rounded border-2 bg-light" type="text" disabled></input> 
                                                                                                </div>
                                                                                        </td>
                                                                                        <td>
                                                                                                <input v-if="id_actualiza==index+1" class="rounded border-2" v-model="linea_base" type="text" ></input>
                                                                                                <div v-else v-for="concentrado_impacto_midiendo in concentrado_impacto_sugerencias_midiendo"> 
                                                                                                    <input v-if="concentrado_impacto_midiendo.id_concentrado == pendiente_impacto.id && pendiente_impacto.orden == concentrado_impacto_midiendo.orden" :value="concentrado_impacto_midiendo.linea_base" class="rounded border-2 bg-light" type="text" disabled></input> 
                                                                                                </div>
                                                                                        </td>
                                                                                        <td>
                                                                                       
                                                                                                <select v-if="id_actualiza==index+1" v-model="periodo_de_medicion" class="rounded border-2  bg-body">
                                                                                                    <option value="0" disabled selected>Seleccione Periodo..</option>
                                                                                                    <option v-for="mes in 12" :value="mes" @click="vaciarMeses(pendiente_impacto.id)">{{mes}} Mes/es</option>
                                                                                                </select>
                                                                                                        <div v-else  v-for="concentrado_impacto_midiendo in concentrado_impacto_sugerencias_midiendo"> 
                                                                                                            <input v-if="concentrado_impacto_midiendo.id_concentrado == pendiente_impacto.id && pendiente_impacto.orden == concentrado_impacto_midiendo.orden" :value="concentrado_impacto_midiendo.periodo" class="rounded border-2 bg-light" type="text" disabled></input> 
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
                                                                                                                <input  :value="concentrado_impacto_midiendo.mes1" class="border-2  text-center" type="text" disabled></input>
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
                                                                                                                <input  :value="concentrado_impacto_midiendo.mes2" class="border-2  text-center" type="text" disabled></input>
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
                                                                                                                <input  :value="concentrado_impacto_midiendo.mes3" class="border-2  text-center" type="text" disabled></input>
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
                                                                                                                <input  :value="concentrado_impacto_midiendo.mes4" class="border-2  text-center" type="text" disabled></input>
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
                                                                                                                <input  :value="concentrado_impacto_midiendo.mes5" class="border-2  text-center" type="text" disabled></input>
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
                                                                                                                <input  :value="concentrado_impacto_midiendo.mes6" class="border-2  text-center" type="text" disabled></input>
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
                                                                                                                <input  :value="concentrado_impacto_midiendo.mes7" class="border-2  text-center" type="text" disabled></input>
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
                                                                                                                <input  :value="concentrado_impacto_midiendo.mes8" class="border-2  text-center" type="text" disabled></input>
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
                                                                                                                <input  :value="concentrado_impacto_midiendo.mes9" class="border-2  text-center" type="text" disabled></input>
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
                                                                                                                <input  :value="concentrado_impacto_midiendo.mes10" class="border-2  text-center" type="text" disabled></input>
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
                                                                                                                <input  :value="concentrado_impacto_midiendo.mes11" class="border-2  text-center" type="text" disabled></input>
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
                                                                                                                <input  :value="concentrado_impacto_midiendo.mes12" class="border-2  text-center" type="text" disabled></input>
                                                                                                            </span> 
                                                                                                        </div>    
                                                                                            </div>     
                                                                                        </td>
                                                                                    </tr>
  
                                                                                </tbody>
                                                                            </table>
                                                                        </div><!--scroll-->
                                                           </div>
                                        </div><!-- contenido impacto de sugerencia-->
                                        
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
                ventana: 'principalAnalista',  
                pintarUno:true,
                pintarDos:false,
                contador: 0,
                concentrado_sugerencias_pendiente_factibilidad:[],
                concentrado_sugerencias_pendiente_implementacion:[],
                status:'',
                usuario:'<?php echo $_SESSION['usuario']; ?>',
                /*varibles en modal factibilidad*/
                check_mc:'',
                mensaje_del_check_mc:'',
                factible: false,
                no_factible: false,
                tipo_factibilida_o_implementacion:'',
                folio:'',
                id_concentrado_general:0,
                lista_impacto:[],
                lista_tipo_desperdicio:[],
                objetivo_de_calidadMA:[],
                var_objetivo_de_calidadMA:[],
                impacto_primario:'',
                impacto_secundario:'',
                tipo_desperdicio:'',
                descripcion_actividad:'',
                fecha_inicial_actividad:'',
                fecha_final_actividad:'',
                lista_responsable_plan:[],
                responsable_plan:'',
                //porcentaje:0,
                documentos:[],
                nueva_actividad: false,
                actualizar: false,
                id_actualizar:0,
                concentrado_actividades:[],
                numero_actividad:0,
                numero_nueva_actividad:0,
                numero_orden_en_select:0,
                fecha_compromiso:'',
                bandera_btn_finalizar:'',
                numeros:[0,5,10,15,20,25,30,35,40,45,50,55,60,65,70,75,80,85,90,95,100],
                tipo_de_cierre:['Cerrada/Fast Response','Cerrada/No Factible'],
                /*variables en modal no factible*/
                var_tipo_de_cierre:'',
                causa_no_factibilidad:'',
                documento_opcional:[],
                nombre_de_descarga:'',
                /*Variables en Implementación*/
                suma_porcentaje_actividades:0,
                deshabilitar:false,//disable o enabled formulario impacto
                /*Variables CONCENTRADO IMPACTO DE SUGERENCIAS*/
                concentrado_sugerencias_pendiente_impacto:[],
                concentrado_impacto_sugerencias_midiendo:[],
                indicador:'',
                unidades:'',
                linea_base:'',
                periodo_de_medicion:1,
                mes1:'',
                mes2:'',
                mes3:'',
                mes4:'',
                mes5:'',
                mes6:'',
                mes7:'',
                mes8:'',
                mes9:'',
                mes10:'',
                mes11:'',
                mes12:'',
                acumulado:'',
                btn_actualizar:false,
                id_actualiza:'',
                colorgreen:'background: url("img/verde2.jpg"); color:white; font-weight:bold;',
                colorgris:'background-color: #fbfbfb ',
            }
        },
        mounted(){
            //Consultado concentrado de sugerencias.
            this.consultado_concentrado_pendiente_factibilidad(),
              //Consultado concentrado de sugerencias.
            this.consultado_concentrado_pendiente_implementacion(),
            //Consultado concentrado pendientes impacto.
            this.consultado_concentrado_pendiente_impacto(),
            //Consultado concentrado impacto Midiendo
            this.consultado_concentrado_impacto_sugerencias(),
             //Consultado usuarios.
            this.consultando_usuarios(),
            //Consultado impacto
            this.consultando_impacto(),
            //Consulta desperdiciones
            this.consultando_lista_de_desperdicio(),
            this.consulta_lista_objetivos_calidad_ma(),
            this.consulta_responsable_plan()
            
        },
        methods:{
            mostrar(dato){
                   this.ventana=dato;
                   if(dato=='principalAnalista'){ this.pintarUno=true}else{this.pintarUno=false}
                   if(dato=='impactoSugerencia'){this.pintarDos=true}else{this.pintarDos=false}
             },
            consultado_concentrado_pendiente_factibilidad(){
                axios.post('consulta_concentrado_pendientes_factibilidad.php',{
                            }).then(response =>{
                                this.concentrado_sugerencias_pendiente_factibilidad = response.data
                                console.log(this.concentrado_sugerencias_pendiente_factibilidad)
                            })
            },
            consultado_concentrado_pendiente_implementacion(){
                axios.post('consulta_concentrado_pendientes_implementar.php',{
                            }).then(response =>{
                                this.concentrado_sugerencias_pendiente_implementacion = response.data
                                console.log(this.concentrado_sugerencias_pendiente_implementacion)
                            })
            },
            consultando_usuarios(){
                axios.post('consulta_usuario.php',{
                usuario: this.usuario
                }).then(response =>{
                    this.usuario = response.data.nombre
                })
            },
            consultando_impacto(){
                axios.post('lista_impacto.php',{
                }).then(response =>{
                    this.lista_impacto = response.data
                    console.log(this.lista_impacto);
                })
            },
            datos_modal_factibilidad(tipo,index,folio,status,respuesta,check_mc){
                this.id_actualizar = ''
                this.status = status
                this.check_mc = check_mc
                if(this.check_mc=="Aceptado"){
                    this.deshabilitar = true
                }else{
                    this.deshabilitar = false
                }
                this.tipo_factibilida_o_implementacion=tipo
                if(respuesta=="Factible"){
                    this.factible=true
                    this.no_factible=false
                }else if(respuesta=="No Factible"){
                    this.factible=false
                    this.no_factible=true
                }
                this.folio=folio
                this.id_concentrado_general=index
                if(this.tipo_factibilida_o_implementacion=="factibilidad"){
                    this.buscarDocumentos_analista()
                    this.consultarFormularioImpacto()
                    this.consultarActividades()
                    this.buscarDocumentos()
                    
                } else if (this.tipo_factibilida_o_implementacion=="En Implementación"){
                    this.factible=true
                    this.no_factible=false
                    this.buscarDocumentos_analista()
                    this.consultarFormularioImpacto()
                    this.consultarActividades()
                    this.buscarDocumentos()
                }else{

                }
            },
            consultando_lista_de_desperdicio(){
                axios.post('lista_tipo_desperdicio.php',{
                }).then(response =>{
                    this.lista_tipo_desperdicio = response.data
                })
            },
            consulta_lista_objetivos_calidad_ma(){
                axios.post('lista_objetivos_calidad_ma.php',{
                }).then(response =>{
                    this.objetivo_de_calidadMA = response.data
                })
            },
            consulta_responsable_plan(){
                axios.post('lista_usuarios_y_analistas_factibilidad.php',{
                }).then(response =>{
                    this.lista_responsable_plan = response.data
                    console.log(this.lista_responsable_plan);
                })
            },
            buscarDocumentos_analista(){
                this.documentos=[] //limpiado vista del documento subido en modal 
                    axios.post("buscar_documentos.php",{
                        folio_carpeta_doc:this.folio,
                        cual_documento: 'sugerencia'
                    })
                    .then(response => {
                    this.documentos = response.data;
                    console.log(response.data);
                    if(this.documentos.length>0){
                        /*console.log(this.documentos.length + "Archivos encontrados.")*/
                    }else{
                        /*alert("Sin Documentos agregados.")*/
                    }

                    })
                    .catch(error => {
                        console.log(error);
                    });
                },
                repuestaFactibleNoFactible(respuesta){
                    axios.post("actualizar_respuesta_factible_o_nofactible.php",{
                    id_concentrado:this.id_concentrado_general,
                    respuesta: respuesta
                    }).then(response =>{
                        if(response.data == true){
                            console.log("BIEN")
                            this.consultado_concentrado_pendiente_factibilidad() /*es para refrescar el concentrado y el btn de En factibilidad, retome si es factible o no para mostra en la modal segun factible o no. 
                                                                                cuando se vuelva a presionar se mantenga a la vista el plan de actividades o sinplement no se muestre.*/
                            
                        }else{
                            alert("Algo salio mal.")
                        }
                    }).catch(error => {
                        console.log(error)
                    })
                },
                consultarFormularioImpacto(){
                axios.post("consultar_formulario_impacto_analista.php",{
                    id_concentrado: this.id_concentrado_general,
                }).then(response =>{
                        this.impacto_primario = response.data[0].impacto_primario
                        this.impacto_secundario = response.data[0].impacto_secundario
                        this.tipo_desperdicio = response.data[0].tipo_de_desperdicio
                        this.fecha_compromiso = response.data[0].fecha_compromiso
                        var arr = response.data[0].objetivo_de_calidad_ma.split(',')
                        var longitud = arr.length
                        this.var_objetivo_de_calidadMA.splice(0,15);
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
                    
                       
                }).catch(error => {

                })
                },
                /*guardarFormularioImpacto(){
                    axios.post("guardar_formulario_impacto_analista.php",{
                        id_concentrado: this.id_concentrado_general,
                        impacto_primario: this.impacto_primario,
                        impacto_secundario: this.impacto_secundario,
                        tipo_desperdicio: this.tipo_desperdicio,
                        objetivos_de_calidadMA:this.var_objetivo_de_calidadMA

                    }).then(response =>{
                        alert(response.data)
                        console.log(response.data)
                        this.consultarFormularioImpacto()
                    }).catch(error => {

                    })

                },*/
                guardarEditarActividad(tipo,id){
               
                /*console.log(this.numero_actividad+this.descripcion_actividad+this.var_responsable_plan+this.fecha_inicial_actividad+this.fecha_final_actividad)*/
                if(this.descripcion_actividad!='' && this.responsable_plan!='' && this.fecha_inicial_actividad!='' && this.fecha_final_actividad!=''){

                        axios.post("guardar_update_actividad_plan.php",{
                            tipo_nueva_actualizar:tipo,
                            id:id,
                            id_concentrado:this.id_concentrado_general,
                            numero_actividad: this.numero_nueva_actividad,
                            actividad: this.descripcion_actividad,
                            folio: this.folio,
                            responsable_plan: this.responsable_plan,
                            fecha_inicial_actividad: this.fecha_inicial_actividad,
                            fecha_final_actividad: this.fecha_final_actividad,
                           // porcentaje:this.porcentaje,
                            check_mc: this.check_mc
                        }).then(response =>{
                                console.log(response.data)
                                    if(response.data=="si"){
                                    this.id_actualizar='' // ocultando inputs de actualizar
                                    this.nueva_actividad = false //guardando y ocultando fila nuevo
                                    this.actualizar=false //guardando y ocultando fila nuevo
                                    this.consultarActividades()
                                    }else if(response.data=="no create"){
                                        alert('No se guardaron los datos.')
                                    }else if(response.data=="no update"){
                                        alert('No se actualizaron los datos')
                                    }else if(response.data=="no delete"){
                                        alert('No se elimino la actividad')
                                    }else if(response.data=="error create"){
                                        alert('Error al crear.')
                                    }else if(response.data=="error update"){
                                        alert('Error al actualizar.')
                                    }else if(response.data=="error delete"){
                                        alert('Error al eliminar.')
                                    }else {

                                    }
                            
                        }).catch(error =>{
                            console.log(error)
                        })
                }else{
                    alert("Todos los campos son requeridos.")
                }
            },
            editarActividad(id){
                
                if(id=="0"){// nueva actividad (accion del boton nuevo).
                    this.nueva_actividad=true //activando campos de nueva actividad
                    this.actualizar = false
                    this.id_actualizar = '' // ocultado edits en editar
                    this.descripcion_actividad = ''
                    this.responsable_plan = ''
                    this.fecha_inicial_actividad = ''
                    this.fecha_final_actividad = ''
                    //this.porcentaje =''
                }else if(id==""){ //accion del boton cancelar.
                    this.actualizar = false
                    this.id_actualizar = '' // ocultar edits en editar
                }else{
                    this.nueva_actividad=false    
                    this.actualizar = true
                    var posicion=id
                    this.id_actualizar = id
                    this.descripcion_actividad = this.concentrado_actividades[posicion-1].actividad
                    this.responsable_plan = this.concentrado_actividades[posicion-1].responsable
                    this.fecha_inicial_actividad = this.concentrado_actividades[posicion-1].fecha_inicial
                    this.fecha_final_actividad = this.concentrado_actividades[posicion-1].fecha_final
                   // this.porcentaje = this.concentrado_actividades[posicion-1].porcentaje
                }
               
            },
            consultarActividades(){
                    axios.post("consultando_actividades.php",{
                        id_concentrado:this.id_concentrado_general
                }).then(response =>{
                    
                    this.concentrado_actividades = response.data
                    this.numero_actividad = this.concentrado_actividades.length 
                    this.numero_nueva_actividad = this.numero_actividad + 1
                    var contar=0;
                    for(var i = 0; i < this.numero_actividad; i++){
                        if(this.concentrado_actividades[i].enviado_o_no == 'ENVIADO'){
                            contar++
                        }
                        
                    }
                    if(this.numero_actividad==contar){
                        this.bandera_btn_finalizar = "no mostrar"
                    }else{
                        this.bandera_btn_finalizar = "mostrar"
                    }

                console.log("contar:"+contar+"numero_actividaddes:"+this.numero_actividad)
                }).catch(error => {
                    console.log(error)
                })
            },
            ordenarActividades(posicion_actual){
                var selector = "select"+posicion_actual
                var posicion_nueva= document.getElementById(selector).value;
        
              console.log("posicion actual:"+posicion_actual+"Nueva posicion"+posicion_nueva)
              var datos_posicion_actual=this.concentrado_actividades[posicion_actual]
              var datos_posicion_nueva=this.concentrado_actividades[posicion_nueva]
              this.concentrado_actividades.splice(posicion_nueva,1,datos_posicion_actual)
              this.concentrado_actividades.splice(posicion_actual,1,datos_posicion_nueva)
              //console.log(this.concentrado_actividades)
              axios.post("guardar_actividades_nuevo_orden.php",{
                    nuevo_orden: this.concentrado_actividades
              }).then(response =>{
                    if(response.data==true){
                        document.getElementById(selector).value = posicion_actual; 
                    }else{
                        alert("Algo salio mal al actualizar el nuevo orden de las actividades.")
                        this.consultarActividades()
                    }   
              }).catch(error => {
                console.log("ERROR EN GUARDAR NUEVO ORDEN :-)")
              })
            },
            eliminarActividad(id){
                if(!confirm("¿Desea eliminar la actividad?")) return;
                axios.post("eliminar_actividad_plan.php",{
                            id:id,
                        }).then(response =>{
                                console.log(response.data)
                                    if(response.data=="si"){
                                    this.id_actualizar='' // ocultando inputs de actualizar
                                    this.nueva_actividad = false //guardando y ocultando fila nuevo
                                    this.actualizar=false //guardando y ocultando fila nuevo
                                    this.consultarActividades()
                                    }else if(response.data=="error delete"){
                                        alert('Erro al eliminar.')
                                    }else {
                                        alert('Erro en eliminar actividad')
                                    }
                            
                        }).catch(error =>{
                            console.log(error)
                        })

            },
            checkPlanActividades(){

                if(this.impacto_primario!='' && this.impacto_secundario!='' && this.tipo_desperdicio!='' && this.var_objetivo_de_calidadMA.length>0){
                        if(this.fecha_compromiso!=""){
                            axios.post("actualizar_check_plan_trabajo.php",{
                            impacto_primario: this.impacto_primario,
                            impacto_secundario: this.impacto_secundario,
                            tipo_desperdicio: this.tipo_desperdicio,
                            objetivos_de_calidadMA:this.var_objetivo_de_calidadMA,  

                            id_concentrado:this.id_concentrado_general,
                            enviado_o_no: 'ENVIADO',
                            check_mc: this.check_mc
                            }).then(response =>{
                                console.log(response.data)
                                if(response.data[1] == true && response.data[2] == true){
                                    alert("Su plan de trabajo sera revisado por Mejora Continua")
                                    this.bandera_btn_finalizar = "no mostrar"
                                    this.check_mc =  response.data[0]
                                    this.consultarFormularioImpacto()
                                    this.consultado_concentrado_pendiente_factibilidad()
                                    this.consultado_concentrado_pendiente_implementacion()
                                }else{
                                    alert("Algo salio mal.")
                                }
                            }).catch(error => {
                                console.log(error)
                            })
                        }else{
                            alert("Agregue la fecha compromiso y despues finalice el Plan.")
                        }
                    }else{
                        alert("Todos los campos de Formulario Impacto son requeridos, VERIFIQUE.")
                    }
            },
            guardarFechaCompromiso(){
                axios.post("guardar_fecha_compromiso.php",{
                    fecha_compromiso:this.fecha_compromiso,
                    id_concentrado:this.id_concentrado_general
                     }).then(response =>{
                        if(response.data == true){
                            alert("Fecha compromiso guardada.")
                            if(this.status == 'En Implementación'){
                                this.consultado_concentrado_pendiente_implementacion()
                            }
                        }else{
                            alert("Algo salio mal.")
                        }
                    }).catch(error => {
                        console.log(error)
                    })
            },
            guardarNofactibilidad(){
                if(this.documento_opcional.length>0){
                    if(!confirm("Nota: esta sugerencia ya no aparecera en el tablero de Pendientes de Factibilidad.")) return
                }else{
                    if(!confirm("¿No subirá archivo opcional?\n \nNota: esta sugerencia ya no aparecera en el tablero de Pendientes de Factibilidad, si realmente no es factible.")) return
                }
            
               axios.post("guardar_actualizar_causa_no_factibilidad.php",{
                    var_tipo_de_cierre: this.var_tipo_de_cierre,
                    causa_no_factibilidad: this.causa_no_factibilidad, 
                    id_concentrado: this.id_concentrado_general
                }).then(response =>{
                    if(response.data=="correcto"){
                       // window.location.reload()//recargo nuevamente pagina cuestion de MODAL
                           /* bootstrap.Modal.getOrCreateInstance(document.getElementById('modalImpactoCuantitativo')).hide()//oculto contenido
                           const items = document.getElementsByClassName("modal-backdrop fade show")// obtengo div con estas clases
                           items[0].className = ""; // sustituyo y elimino a nada. */
                        //this.consultado_concentrado_pendiente_factibilidad()
                       // this.consultado_concentrado_pendiente_implementacion()
                       window.location.reload()
                        
                    }else if(response.data=="mal"){
                        alert("No se guarda NO FACTIBLE, pongase en contacto con Mejora Continua.")
                    }else{
                        aler("Error algo salio mal.")
                    }
                }).catch(error => {

                })
            },
            buscarDocumentos(){
                    axios.post("buscar_documentos.php",{
                        folio_carpeta_doc:this.folio,
                        cual_documento:"nofactibleopcional"
                    })
                    .then(response => {
                                this.documento_opcional = response.data
                                if(this.documento_opcional.length>0){
                                    console.log(this.documento_opcional.length + "Archivos encontrados.")
                                }else{
                                    /*alert("Sin Documentos agregados.")*/
                                }
                        
                    })
                    .catch(error => {
                        console.log(error);
                    });
                },
            uploadFile(){
                let formData = new FormData();
                var files = this.$refs.docopcionalnofactibilidad.files;//guarda los archivos
                var totalfiles = this.$refs.docopcionalnofactibilidad.files.length;// tamanio de archivos a subir
                for (var index = 0; index < totalfiles; index++) {
                 formData.append("files[]", files[index]);//arreglo de documentos
                }
                formData.append("folio", this.folio);
                formData.append("cual_documento", "nofactibleopcional");
                axios.post("subir_documentos.php", formData,
                    {
                    headers: {"Content-Type": "multipart/form-data"}
                    })
                    .then(response => {

                        if(response.data.length>0){
                            document.getElementById("input_file_subir").value=""
                            this.buscarDocumentos()
                        }else{
                            alert("Verifique la extension del archivo o Intente nuevamente.")
                        }
                     
                    })
                    .catch(error => {
                        console.log(error);
                    });
                },
                eliminarDocumento(ruta){
                    axios.post("eliminar_documento.php",{
                            ruta_eliminar: ruta,
                            cual_documento: "nofactibleopcional"
                        }).then( response=>{
                            console.log(response.data)
                            if(response.data=="Archivo Eliminado"){
                                this.buscarDocumentos()
                                alert("Eliminado con Éxito")
                            }else if(response.data=="No Eliminado"){
                                alert("Algo no salio bien no se logro Eliminar.")
                            }else{
                                alert("Error al eliminar el Documento.")
                            }
                        }).catch(error =>{
                            console.log(error)
                        })
                },
                actualizarPorcentajeEnActividad(id_actividad){
                    var selector = "select"+id_actividad
                    var porcentaje_actividad= document.getElementById(selector).value;
                    axios.post("actualizar_porcentaje_en_actividad.php",{
                            id_actividad: id_actividad,
                            porcentaje_actividad: porcentaje_actividad,
                            id_concentrado:this.id_concentrado_general
                        }).then( response=>{
                            if(response.data[0]==true && response.data[1]==true){
                                console.log(response.data)
                                this.consultarActividades()
                                this.consultado_concentrado_pendiente_implementacion()
                                alert("Porcentaje guardado con Exito.")
                            }else{
                                alert("No se actulizados datos en una o dos tablas")
                            }
                        }).catch(error =>{
                            console.log(error)
                        })
                },  
                /*METODOS IMPACTO DE SUGERENCIA*/
                consultado_concentrado_pendiente_impacto(){//consulto datos del concentrado de sugerencias midiendo
                axios.post('consulta_concentrado_pendientes_impacto.php',{
                            }).then(response =>{
                                this.concentrado_sugerencias_pendiente_impacto = response.data
                                console.log(this.concentrado_sugerencias_pendiente_impacto,'ARREGLO FINAL')
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
                editarIndicador(id,index_actualizar,ordenar){
                   // console.log(this.concentrado_impacto_sugerencias_midiendo)
                        console.log(index_actualizar)

                        if(index_actualizar==""){ //accion del boton cancelar.
                            this.btn_actualizar = false
                            this.id_actualiza = '' // ocultar edits en editar
                        }else{  

                            if(this.concentrado_impacto_sugerencias_midiendo.length>0)
                            {

                                for (let index = 0; index < this.concentrado_impacto_sugerencias_midiendo.length; index++) 
                                        {// si existe un registro colocalo a las variables
                                            if(this.concentrado_impacto_sugerencias_midiendo[index].id_concentrado == id && this.concentrado_impacto_sugerencias_midiendo[index].orden == ordenar){
                                                this.btn_actualizar = true
                                                this.id_actualiza = index_actualizar

                                                this.indicador = this.concentrado_impacto_sugerencias_midiendo[index].indicador
                                                this.unidades = this.concentrado_impacto_sugerencias_midiendo[index].unidades
                                                this.linea_base = this.concentrado_impacto_sugerencias_midiendo[index].linea_base
                                                this.periodo_de_medicion = this.concentrado_impacto_sugerencias_midiendo[index].periodo
                                                this.mes1 = this.concentrado_impacto_sugerencias_midiendo[index].mes1
                                                this.mes2 = this.concentrado_impacto_sugerencias_midiendo[index].mes2
                                                this.mes3 = this.concentrado_impacto_sugerencias_midiendo[index].mes3
                                                this.mes4 = this.concentrado_impacto_sugerencias_midiendo[index].mes4
                                                this.mes5 = this.concentrado_impacto_sugerencias_midiendo[index].mes5
                                                this.mes6 = this.concentrado_impacto_sugerencias_midiendo[index].mes6
                                                this.mes7 = this.concentrado_impacto_sugerencias_midiendo[index].mes7
                                                this.mes8 = this.concentrado_impacto_sugerencias_midiendo[index].mes8
                                                this.mes9 = this.concentrado_impacto_sugerencias_midiendo[index].mes9
                                                this.mes10 = this.concentrado_impacto_sugerencias_midiendo[index].mes10
                                                this.mes11 = this.concentrado_impacto_sugerencias_midiendo[index].mes11
                                                this.mes12 = this.concentrado_impacto_sugerencias_midiendo[index].mes12
                                                break;
                                            }else{
                                                this.btn_actualizar = true
                                                this.id_actualiza = index_actualizar
                                                this.indicador = ''
                                                this.unidades = ''
                                                this.linea_base = ''
                                                this.periodo_de_medicion = 1
                                                this.mes1 = ''
                                                this.mes2 = ''
                                                this.mes3 = ''
                                                this.mes4 = ''
                                                this.mes5 = ''
                                                this.mes6 = ''
                                                this.mes7 = ''
                                                this.mes8 = ''
                                                this.mes9 = ''
                                                this.mes10 = ''
                                                this.mes11 = ''
                                                this.mes12 = ''

                                            }
                                    }
                            }else{// de lo contrario nadas activa los input
                                                this.btn_actualizar = true
                                                this.id_actualiza = index_actualizar
                                                this.indicador = ''
                                                this.unidades = ''
                                                this.linea_base = ''
                                                this.periodo_de_medicion = 1
                                                this.mes1 = ''
                                                this.mes2 = ''
                                                this.mes3 = ''
                                                this.mes4 = ''
                                                this.mes5 = ''
                                                this.mes6 = ''
                                                this.mes7 = ''
                                                this.mes8 = ''
                                                this.mes9 = ''
                                                this.mes10 = ''
                                                this.mes11 = ''
                                                this.mes12 = ''
                                            }
                    }
                },
                guardarEditarIndicador(id_concentrado,folio,orden){
                    console.log(id_concentrado+""+orden)
                    axios.post('guardar_actualizar_datos_impacto.php',{
                    id_concentrado: id_concentrado,
                    indicador: this.indicador,
                    folio:folio,
                    unidades: this.unidades,
                    linea_base: this.linea_base,
                    periodo_de_medicion: this.periodo_de_medicion,
                    mes1:this.mes1,
                    mes2:this.mes2,
                    mes3:this.mes3,
                    mes4:this.mes4,
                    mes5:this.mes5,
                    mes6:this.mes6,
                    mes7:this.mes7,
                    mes8:this.mes8,
                    mes9:this.mes9,
                    mes10:this.mes10,
                    mes11:this.mes11,
                    mes12:this.mes12,
                    orden:orden
                    }).then(response =>{
                        console.log(response.data)
                        if(response.data== true){
                            this.btn_actualizar = false//oculta btn guardar
                            this.id_actualiza = ''//ocular inpust 
                            alert("Datos guardados con éxito.")
                            this.consultado_concentrado_impacto_sugerencias()
                        }else{
                            alert("Los datos no se gardaron")
                        }
                        
                    }).catch(error =>{

                    })
                    
                },
                vaciarMeses(id){

                    if(this.periodo_de_medicion==1){
                                for (let index = 0; index < this.concentrado_impacto_sugerencias_midiendo.length; index++)
                                    {
                                        if(this.concentrado_impacto_sugerencias_midiendo[index].id_concentrado == id)
                                            {
                                            this.mes1 = this.concentrado_impacto_sugerencias_midiendo[index].mes1
                                            this.mes2 = ''
                                            this.mes3 = ''
                                            this.mes4 = ''
                                            this.mes5 = ''
                                            this.mes6 = ''
                                            this.mes7 = ''
                                            this.mes8 = ''
                                            this.mes9 = ''
                                            this.mes10 = ''
                                            this.mes11 = ''
                                            this.mes12 = ''
                                            break
                                            }else{
                                            this.mes1 =''
                                            this.mes2 = ''
                                            this.mes3 = ''
                                            this.mes4 = ''
                                            this.mes5 = ''
                                            this.mes6 = ''
                                            this.mes7 = ''
                                            this.mes8 = ''
                                            this.mes9 = ''
                                            this.mes10 = ''
                                            this.mes11 = ''
                                            this.mes12 = ''
                                            }
                                    }
                            }else if(this.periodo_de_medicion==2){
                                for (let index = 0; index < this.concentrado_impacto_sugerencias_midiendo.length; index++)
                                    {
                                        if(this.concentrado_impacto_sugerencias_midiendo[index].id_concentrado == id)
                                            {
                                            this.mes1 = this.concentrado_impacto_sugerencias_midiendo[index].mes1
                                            this.mes2 = this.concentrado_impacto_sugerencias_midiendo[index].mes2
                                            this.mes3 = ''
                                            this.mes4 = ''
                                            this.mes5 = ''
                                            this.mes6 = ''
                                            this.mes7 = ''
                                            this.mes8 = ''
                                            this.mes9 = ''
                                            this.mes10 = ''
                                            this.mes11 = ''
                                            this.mes12 = ''
                                            break
                                            }else{
                                            this.mes1 =''
                                            this.mes2 = ''
                                            this.mes3 = ''
                                            this.mes4 = ''
                                            this.mes5 = ''
                                            this.mes6 = ''
                                            this.mes7 = ''
                                            this.mes8 = ''
                                            this.mes9 = ''
                                            this.mes10 = ''
                                            this.mes11 = ''
                                            this.mes12 = ''
                                            }
                                    }
                            }else if(this.periodo_de_medicion==3){
                                for (let index = 0; index < this.concentrado_impacto_sugerencias_midiendo.length; index++)
                                    {
                                        if(this.concentrado_impacto_sugerencias_midiendo[index].id_concentrado == id)
                                            {
                                            this.mes1 = this.concentrado_impacto_sugerencias_midiendo[index].mes1
                                            this.mes2 = this.concentrado_impacto_sugerencias_midiendo[index].mes2
                                            this.mes3 = this.concentrado_impacto_sugerencias_midiendo[index].mes3
                                            this.mes4 = ''
                                            this.mes5 = ''
                                            this.mes6 = ''
                                            this.mes7 = ''
                                            this.mes8 = ''
                                            this.mes9 = ''
                                            this.mes10 = ''
                                            this.mes11 = ''
                                            this.mes12 = ''
                                            break    
                                            }else{
                                            this.mes1 =''
                                            this.mes2 = ''
                                            this.mes3 = ''
                                            this.mes4 = ''
                                            this.mes5 = ''
                                            this.mes6 = ''
                                            this.mes7 = ''
                                            this.mes8 = ''
                                            this.mes9 = ''
                                            this.mes10 = ''
                                            this.mes11 = ''
                                            this.mes12 = ''
                                            }
                                    }

                            }else if(this.periodo_de_medicion==4){
                                for (let index = 0; index < this.concentrado_impacto_sugerencias_midiendo.length; index++)
                                    {
                                        if(this.concentrado_impacto_sugerencias_midiendo[index].id_concentrado == id)
                                            {
                                            this.mes1 = this.concentrado_impacto_sugerencias_midiendo[index].mes1
                                            this.mes2 = this.concentrado_impacto_sugerencias_midiendo[index].mes2
                                            this.mes3 = this.concentrado_impacto_sugerencias_midiendo[index].mes3
                                            this.mes4 = this.concentrado_impacto_sugerencias_midiendo[index].mes4
                                            this.mes5 = ''
                                            this.mes6 = ''
                                            this.mes7 = ''
                                            this.mes8 = ''
                                            this.mes9 = ''
                                            this.mes10 = ''
                                            this.mes11 = ''
                                            this.mes12 = ''
                                            break    
                                            }else{
                                            this.mes1 =''
                                            this.mes2 = ''
                                            this.mes3 = ''
                                            this.mes4 = ''
                                            this.mes5 = ''
                                            this.mes6 = ''
                                            this.mes7 = ''
                                            this.mes8 = ''
                                            this.mes9 = ''
                                            this.mes10 = ''
                                            this.mes11 = ''
                                            this.mes12 = ''
                                            }
                                    }

                            }else if(this.periodo_de_medicion==5){
                                for (let index = 0; index < this.concentrado_impacto_sugerencias_midiendo.length; index++)
                                    {
                                        if(this.concentrado_impacto_sugerencias_midiendo[index].id_concentrado == id)
                                            {
                                            this.mes1 = this.concentrado_impacto_sugerencias_midiendo[index].mes1
                                            this.mes2 = this.concentrado_impacto_sugerencias_midiendo[index].mes2
                                            this.mes3 = this.concentrado_impacto_sugerencias_midiendo[index].mes3
                                            this.mes4 = this.concentrado_impacto_sugerencias_midiendo[index].mes4
                                            this.mes5 = this.concentrado_impacto_sugerencias_midiendo[index].mes5
                                            this.mes6 = ''
                                            this.mes7 = ''
                                            this.mes8 = ''
                                            this.mes9 = ''
                                            this.mes10 = ''
                                            this.mes11 = ''
                                            this.mes12 = ''
                                            break    
                                            }else{
                                            this.mes1 =''
                                            this.mes2 = ''
                                            this.mes3 = ''
                                            this.mes4 = ''
                                            this.mes5 = ''
                                            this.mes6 = ''
                                            this.mes7 = ''
                                            this.mes8 = ''
                                            this.mes9 = ''
                                            this.mes10 = ''
                                            this.mes11 = ''
                                            this.mes12 = ''
                                            }
                                    }

                            }else if(this.periodo_de_medicion==6){
                                    for (let index = 0; index < this.concentrado_impacto_sugerencias_midiendo.length; index++)
                                        {
                                            if(this.concentrado_impacto_sugerencias_midiendo[index].id_concentrado == id)
                                                {
                                                this.mes1 = this.concentrado_impacto_sugerencias_midiendo[index].mes1
                                                this.mes2 = this.concentrado_impacto_sugerencias_midiendo[index].mes2
                                                this.mes3 = this.concentrado_impacto_sugerencias_midiendo[index].mes3
                                                this.mes4 = this.concentrado_impacto_sugerencias_midiendo[index].mes4
                                                this.mes5 = this.concentrado_impacto_sugerencias_midiendo[index].mes5
                                                this.mes6 = this.concentrado_impacto_sugerencias_midiendo[index].mes6
                                                this.mes7 = ''
                                                this.mes8 = ''
                                                this.mes9 = ''
                                                this.mes10 = ''
                                                this.mes11 = ''
                                                this.mes12 = ''
                                                break    
                                                }else{
                                                this.mes1 =''
                                                this.mes2 = ''
                                                this.mes3 = ''
                                                this.mes4 = ''
                                                this.mes5 = ''
                                                this.mes6 = ''
                                                this.mes7 = ''
                                                this.mes8 = ''
                                                this.mes9 = ''
                                                this.mes10 = ''
                                                this.mes11 = ''
                                                this.mes12 = ''
                                                }
                                        }

                            }else if(this.periodo_de_medicion==7){
                                for (let index = 0; index < this.concentrado_impacto_sugerencias_midiendo.length; index++)
                                        {
                                            if(this.concentrado_impacto_sugerencias_midiendo[index].id_concentrado == id)
                                                {
                                                this.mes1 = this.concentrado_impacto_sugerencias_midiendo[index].mes1
                                                this.mes2 = this.concentrado_impacto_sugerencias_midiendo[index].mes2
                                                this.mes3 = this.concentrado_impacto_sugerencias_midiendo[index].mes3
                                                this.mes4 = this.concentrado_impacto_sugerencias_midiendo[index].mes4
                                                this.mes5 = this.concentrado_impacto_sugerencias_midiendo[index].mes5
                                                this.mes6 = this.concentrado_impacto_sugerencias_midiendo[index].mes6
                                                this.mes7 = this.concentrado_impacto_sugerencias_midiendo[index].mes7
                                                this.mes8 = ''
                                                this.mes9 = ''
                                                this.mes10 = ''
                                                this.mes11 = ''
                                                this.mes12 = ''
                                                break    
                                                }else{
                                                this.mes1 =''
                                                this.mes2 = ''
                                                this.mes3 = ''
                                                this.mes4 = ''
                                                this.mes5 = ''
                                                this.mes6 = ''
                                                this.mes7 = ''
                                                this.mes8 = ''
                                                this.mes9 = ''
                                                this.mes10 = ''
                                                this.mes11 = ''
                                                this.mes12 = ''
                                                }
                                        }


                            }else if(this.periodo_de_medicion==8){
                                for (let index = 0; index < this.concentrado_impacto_sugerencias_midiendo.length; index++)
                                        {
                                            if(this.concentrado_impacto_sugerencias_midiendo[index].id_concentrado == id)
                                                {
                                                this.mes1 = this.concentrado_impacto_sugerencias_midiendo[index].mes1
                                                this.mes2 = this.concentrado_impacto_sugerencias_midiendo[index].mes2
                                                this.mes3 = this.concentrado_impacto_sugerencias_midiendo[index].mes3
                                                this.mes4 = this.concentrado_impacto_sugerencias_midiendo[index].mes4
                                                this.mes5 = this.concentrado_impacto_sugerencias_midiendo[index].mes5
                                                this.mes6 = this.concentrado_impacto_sugerencias_midiendo[index].mes6
                                                this.mes7 = this.concentrado_impacto_sugerencias_midiendo[index].mes7
                                                this.mes8 = this.concentrado_impacto_sugerencias_midiendo[index].mes8
                                                this.mes9 = ''
                                                this.mes10 = ''
                                                this.mes11 = ''
                                                this.mes12 = ''
                                                break    
                                                }else{
                                                this.mes1 =''
                                                this.mes2 = ''
                                                this.mes3 = ''
                                                this.mes4 = ''
                                                this.mes5 = ''
                                                this.mes6 = ''
                                                this.mes7 = ''
                                                this.mes8 = ''
                                                this.mes9 = ''
                                                this.mes10 = ''
                                                this.mes11 = ''
                                                this.mes12 = ''
                                                }
                                        }

                            }else if(this.periodo_de_medicion==9){
                                    for (let index = 0; index < this.concentrado_impacto_sugerencias_midiendo.length; index++)
                                            {
                                                if(this.concentrado_impacto_sugerencias_midiendo[index].id_concentrado == id)
                                                    {
                                                    this.mes1 = this.concentrado_impacto_sugerencias_midiendo[index].mes1
                                                    this.mes2 = this.concentrado_impacto_sugerencias_midiendo[index].mes2
                                                    this.mes3 = this.concentrado_impacto_sugerencias_midiendo[index].mes3
                                                    this.mes4 = this.concentrado_impacto_sugerencias_midiendo[index].mes4
                                                    this.mes5 = this.concentrado_impacto_sugerencias_midiendo[index].mes5
                                                    this.mes6 = this.concentrado_impacto_sugerencias_midiendo[index].mes6
                                                    this.mes7 = this.concentrado_impacto_sugerencias_midiendo[index].mes7
                                                    this.mes8 = this.concentrado_impacto_sugerencias_midiendo[index].mes8
                                                    this.mes9 = this.concentrado_impacto_sugerencias_midiendo[index].mes9
                                                    this.mes10 = ''
                                                    this.mes11 = ''
                                                    this.mes12 = ''
                                                    break    
                                                    }else{
                                                    this.mes1 =''
                                                    this.mes2 = ''
                                                    this.mes3 = ''
                                                    this.mes4 = ''
                                                    this.mes5 = ''
                                                    this.mes6 = ''
                                                    this.mes7 = ''
                                                    this.mes8 = ''
                                                    this.mes9 = ''
                                                    this.mes10 = ''
                                                    this.mes11 = ''
                                                    this.mes12 = ''
                                                    }
                                            }
                            
                            }else if(this.periodo_de_medicion==10){
                                    for (let index = 0; index < this.concentrado_impacto_sugerencias_midiendo.length; index++)
                                                {
                                                    if(this.concentrado_impacto_sugerencias_midiendo[index].id_concentrado == id)
                                                        {
                                                        this.mes1 = this.concentrado_impacto_sugerencias_midiendo[index].mes1
                                                        this.mes2 = this.concentrado_impacto_sugerencias_midiendo[index].mes2
                                                        this.mes3 = this.concentrado_impacto_sugerencias_midiendo[index].mes3
                                                        this.mes4 = this.concentrado_impacto_sugerencias_midiendo[index].mes4
                                                        this.mes5 = this.concentrado_impacto_sugerencias_midiendo[index].mes5
                                                        this.mes6 = this.concentrado_impacto_sugerencias_midiendo[index].mes6
                                                        this.mes7 = this.concentrado_impacto_sugerencias_midiendo[index].mes7
                                                        this.mes8 = this.concentrado_impacto_sugerencias_midiendo[index].mes8
                                                        this.mes9 = this.concentrado_impacto_sugerencias_midiendo[index].mes9
                                                        this.mes10 = this.concentrado_impacto_sugerencias_midiendo[index].mes10
                                                        this.mes11 = ''
                                                        this.mes12 = ''
                                                        break    
                                                        }else{
                                                        this.mes1 =''
                                                        this.mes2 = ''
                                                        this.mes3 = ''
                                                        this.mes4 = ''
                                                        this.mes5 = ''
                                                        this.mes6 = ''
                                                        this.mes7 = ''
                                                        this.mes8 = ''
                                                        this.mes9 = ''
                                                        this.mes10 = ''
                                                        this.mes11 = ''
                                                        this.mes12 = ''
                                                        }
                                                }

                            }else if(this.periodo_de_medicion==11){
                                            for (let index = 0; index < this.concentrado_impacto_sugerencias_midiendo.length; index++)
                                                {
                                                    if(this.concentrado_impacto_sugerencias_midiendo[index].id_concentrado == id)
                                                        {
                                                        this.mes1 = this.concentrado_impacto_sugerencias_midiendo[index].mes1
                                                        this.mes2 = this.concentrado_impacto_sugerencias_midiendo[index].mes2
                                                        this.mes3 = this.concentrado_impacto_sugerencias_midiendo[index].mes3
                                                        this.mes4 = this.concentrado_impacto_sugerencias_midiendo[index].mes4
                                                        this.mes5 = this.concentrado_impacto_sugerencias_midiendo[index].mes5
                                                        this.mes6 = this.concentrado_impacto_sugerencias_midiendo[index].mes6
                                                        this.mes7 = this.concentrado_impacto_sugerencias_midiendo[index].mes7
                                                        this.mes8 = this.concentrado_impacto_sugerencias_midiendo[index].mes8
                                                        this.mes9 = this.concentrado_impacto_sugerencias_midiendo[index].mes9
                                                        this.mes10 = this.concentrado_impacto_sugerencias_midiendo[index].mes10
                                                        this.mes11 = this.concentrado_impacto_sugerencias_midiendo[index].mes11
                                                        this.mes12 = ''
                                                        break    
                                                        }else{
                                                        this.mes1 =''
                                                        this.mes2 = ''
                                                        this.mes3 = ''
                                                        this.mes4 = ''
                                                        this.mes5 = ''
                                                        this.mes6 = ''
                                                        this.mes7 = ''
                                                        this.mes8 = ''
                                                        this.mes9 = ''
                                                        this.mes10 = ''
                                                        this.mes11 = ''
                                                        this.mes12 = ''
                                                        }
                                                }

                            }
                            else if(this.periodo_de_medicion==12){
                                 for (let index = 0; index < this.concentrado_impacto_sugerencias_midiendo.length; index++)
                                                {
                                                    if(this.concentrado_impacto_sugerencias_midiendo[index].id_concentrado == id)
                                                        {
                                                        this.mes1 = this.concentrado_impacto_sugerencias_midiendo[index].mes1
                                                        this.mes2 = this.concentrado_impacto_sugerencias_midiendo[index].mes2
                                                        this.mes3 = this.concentrado_impacto_sugerencias_midiendo[index].mes3
                                                        this.mes4 = this.concentrado_impacto_sugerencias_midiendo[index].mes4
                                                        this.mes5 = this.concentrado_impacto_sugerencias_midiendo[index].mes5
                                                        this.mes6 = this.concentrado_impacto_sugerencias_midiendo[index].mes6
                                                        this.mes7 = this.concentrado_impacto_sugerencias_midiendo[index].mes7
                                                        this.mes8 = this.concentrado_impacto_sugerencias_midiendo[index].mes8
                                                        this.mes9 = this.concentrado_impacto_sugerencias_midiendo[index].mes9
                                                        this.mes10 = this.concentrado_impacto_sugerencias_midiendo[index].mes10
                                                        this.mes11 = this.concentrado_impacto_sugerencias_midiendo[index].mes11
                                                        this.mes12 = this.concentrado_impacto_sugerencias_midiendo[index].mes12
                                                        break    
                                                        }else{
                                                        this.mes1 =''
                                                        this.mes2 = ''
                                                        this.mes3 = ''
                                                        this.mes4 = ''
                                                        this.mes5 = ''
                                                        this.mes6 = ''
                                                        this.mes7 = ''
                                                        this.mes8 = ''
                                                        this.mes9 = ''
                                                        this.mes10 = ''
                                                        this.mes11 = ''
                                                        this.mes12 = ''
                                                        }
                                                }
                       
                            }

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