<?php
session_start();
if ($_SESSION["usuario"]){ 
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
                            <div class="row m-lg-5">
                                <div class="col-12 text-center inline-block">
                                    <div class="">
                                        <button class="boton-nuevo" @click="agregar_nueva_sugerencia, mostrar_id(0)"><i class="bi bi-plus-circle"></i> Nueva Sugerencia</button>
                                    </div>
                                    <div class="mt-1" v-show="nueva_sugerencia==true" >
                                        
                                    </div>
                                   
                                </div>
                            <div class="div-scroll mt-3 ">
                     
                                    <table class="table tablaConcentrado table-striped table-bordered" style="height:10px; ">
                                        <thead class="encabezado-tabla">
                                            <tr class="text-light bg-secondary">
                                            <th scope="col" class="sticky bg-white text-dark ">Edit:Cancel/Save</th>
                                            <th scope="col">#</th>
                                            <th scope="col">%Cumplimiento</th>
                                            <th scope="col">Nombre sugerencias</th>
                                            <th scope="col">Folio</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Causa de No factibidad</th>
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
                                            <th scope="col">Impacto Secundario</th>
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
                                            <!--Nueva Sugerencia-->
                                            <tr v-show="nueva_sugerencia" class="align-middle bg-info">
                                                
                                                <td class="sticky"> 
                                                    <button type="button" class="btn btn-danger  me-2" title="Cancelar" @click="nueva_sugerencia=false"><i class="bi bi-x-circle" ></i></button>
                                                    <button type="button" class="btn btn-primary" title="Guardar" @click="guardar_nueva_sugerencia_y_actualizar('nueva','')"><i class="bi bi-check-circle"></i></button>   
                                                </td>
                                                <th scope="row">Nueva</th>
                                                <td><label>0%</label></td>
                                                <td><textarea class="inputs-concentrado text-area" type="text"  name="nombre_sugerencia" v-model="var_nombre_sugerencias"></textarea></td>
                                                <td><input class="inputs-concentrado" type="text" v-model="var_folio"></input></td>
                                                <td><label>En Factibilidad</label></td>
                                                <td>
                                                <textarea class="inputs-concentrado text-area" type="text"  v-model="var_causa_no_factibilidad" >{{var_causa_no_factibilidad}}</textarea></td>
                                                <td><textarea class="inputs-concentrado text-area" type="text" v-model="var_situacion_actual" ></textarea></td>
                                                <td><textarea class="inputs-concentrado text-area" type="text"  v-model="var_idea_propuesta" ></textarea></td>
                                                <td><input class="inputs-concentrado" type="text"  v-model="var_nomina" ></input></td>
                                                <td><input class="inputs-concentrado" type="text"  v-model="var_colaborador" ></input></td>
                                                <td><input class="inputs-concentrado" type="text"  v-model="var_puesto" ></input></td>
                                                <td>
                                                    <select class="inputs-concentrado" v-model="var_planta" >
                                                            <option value=""  disabled>Seleccione la planta...</option>
                                                            <option v-for="planta in lista_planta" :key="planta" :value="planta">{{planta}}</option>
                                                            <option value="" class="text-success">Nuevo Planta (+)</option>
                                                            <option value=""  class="text-danger">Eliminar Planta (-)</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="inputs-concentrado" v-model="var_area">
                                                            <option value="" disabled>Seleccione el área...</option>
                                                            <option v-for="area in lista_area" :key="area" :value="area">{{area}}</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="inputs-concentrado" v-model="var_area_participante">
                                                        <option value="" disabled>Seleccione área participante...</option>
                                                        <option v-for="area_participante in lista_area_participante" :key="area_participante" :value="area_participante">{{area_participante}}</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="inputs-concentrado" v-model="var_subarea">
                                                        <option value="" disabled>Seleccione Subárea...</option>
                                                        <option v-for="subarea in lista_subarea" :key="subarea" :value="subarea">{{subarea}}</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="inputs-concentrado" v-model="var_impacto_primario">
                                                        <option value="" disabled>Seleccione impacto primario...</option>
                                                        <option v-for="impacto_primario in lista_impacto_primario" :key="impacto_primario" :value="impacto_primario">{{impacto_primario}}</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="inputs-concentrado" v-model="var_impacto_secundario">
                                                        <option value="" disabled>Seleccione impacto secundario...</option>
                                                        <option v-for="impacto_secundario in lista_impacto_secundario" :key="impacto_secundario" :value="impacto_secundario">{{impacto_secundario}}</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="inputs-concentrado" v-model="var_tipo_desperdicio">
                                                        <option value="" disabled>Seleccione tipo desperdicio..</option>
                                                        <option v-for="tipo_desperdicio in lista_tipo_desperdicio" :key="tipo_desperdicio" :value="tipo_desperdicio">{{tipo_desperdicio}}</option>
                                                    </select>
                                                </td>
                                                <td>
                                                <div  class="inputs-concentrado" style="overflow-y: scroll; max-height:50px;">
                                                <label>{{var_objetivo_de_calidadMA}}</label>
                                                    <ul>
                                                        <li v-for="objetivo_de_calidad in objetivo_de_calidadMA">
                                                            <input type="checkbox" :value="objetivo_de_calidad" v-model="var_objetivo_de_calidadMA">
                                                            <label for="objetivo_de_calidad">{{objetivo_de_calidad}}</label>
                                                        </li>
                                                    </ul>
                                                </div>
                                                </td>
                                                <td><input class="inputs-concentrado" type="date" v-model="var_fecha_sugerencia" name="fecha_de_sugerencias" ></input></td>
                                                <td><input class="inputs-concentrado" type="date" v-model="var_fecha_inicio"  name="fecha_de_inicio" ></input></td>
                                                <td><input class="inputs-concentrado" type="date" v-model="var_fecha_compromiso"  name="fecha_compromiso" ></input></td>
                                                <td><input class="inputs-concentrado" type="date" v-model="var_fecha_real_de_cierre"  name="fecha_real_de_cierre" ></input></td>
                                                <td><input class="inputs-concentrado" type="text" v-model="var_analista_de_factibilidad"  name="analista_de_factibilidad" ></td>
                                                <td><input class="inputs-concentrado" type="text" v-model="var_impacto_planeado" name="impacto planeado" ></input></td>
                                                <td><input class="inputs-concentrado" type="text" v-model="var_impacto_real" name="impacto_real" ></input></td>
                                                <td><label>{{usuario}}</label></td>
                                                <td><label><?php echo date("Y/m/d"); ?></label></td>
                                                <td></input></td>
                                                <td></input></td>
                                                <td><button type="button" class="btn btn-danger" title="Eliminar" @click="nueva_sugerencia=false"><i class="bi bi-trash"></button></i></td>
                                            </tr>
                                           
                                            <!--Consulta/Editar Segerencia -->
                                            <tr class="align-middle" v-for="(concentrado, index) in concentrado_sugerencias" :key="concentrado.id" >
                                                <td class="sticky table-striped table-bordered">
                                                    <button type="button" class="btn btn-danger me-2" title="Cancelar" @click="mostrar_id('')" v-if="actualizar_sugerencia==index+1"><i class="bi bi-x-circle" ></i></button>
                                                    <button type="button" class="btn btn-primary" title="Guardar" @click="guardar_nueva_sugerencia_y_actualizar('actualizar',concentrado.id), mostrar_id('')" v-if="actualizar_sugerencia==index+1"><i class="bi bi-check-circle"></i></button>
                                                    <button type="button" class="btn btn-warning" title="Actualizar" @click="mostrar_id(index+1)" v-else><i class="bi bi-pen" ></i></button>
                                                </td>
                                                <th scope="row">{{index+1}}<br><!--{{concentrado.id}}--></th>
                                                <td><label>0%</label></td>
                                                <td><textarea class="inputs-concentrado text-area" type="text"  name="nombre_sugerencia" v-model="var_nombre_sugerencias" v-if="actualizar_sugerencia==index+1"></textarea> <label v-else>{{concentrado.nombre_sugerencia}}</label></td>
                                                <td><input class="inputs-concentrado" type="text" v-model="var_folio" v-if="actualizar_sugerencia==index+1"></input> <label v-else>{{concentrado.folio}}</label></td>
                                                <td><label>En Factibilidad</label></td>
                                                <td><textarea class="inputs-concentrado text-area" type="text"  v-model="var_causa_no_factibilidad" v-if="actualizar_sugerencia==index+1">{{var_causa_no_factibilidad}}</textarea><label v-else>{{concentrado.causa_no_factibilidad}}</label></td>
                                                <td><textarea class="inputs-concentrado text-area" type="text" v-model="var_situacion_actual"  v-if="actualizar_sugerencia==index+1"></textarea><label v-else>{{concentrado.situacion_actual}}</label></td>
                                                <td><textarea class="inputs-concentrado text-area" type="text"  v-model="var_idea_propuesta"  v-if="actualizar_sugerencia==index+1"></textarea><label v-else>{{concentrado.idea_propuesta}}</label></td>
                                                <td><input class="inputs-concentrado" type="text"  v-model="var_nomina"  v-if="actualizar_sugerencia==index+1"></input><label v-else>{{concentrado.numero_nomina}}</label></td>
                                                <td><input class="inputs-concentrado" type="text"  v-model="var_colaborador"  v-if="actualizar_sugerencia==index+1"><label v-else>{{concentrado.colaborador}}</label></input></td>
                                                <td><input class="inputs-concentrado" type="text"  v-model="var_puesto"  v-if="actualizar_sugerencia==index+1"><label v-else>{{concentrado.puesto}}</label></input></td>
                                                <td>
                                                    <select  class="inputs-concentrado" v-model="var_planta" v-if="actualizar_sugerencia==index+1">
                                                            <option value=""  disabled>Seleccione la planta...</option>
                                                            <option v-for="planta in lista_planta" :key="planta" :value="planta">{{planta}}</option>
                                                    </select>
                                                    <label v-else>{{concentrado.planta}}</label>
                                                </td>
                                                <td>
                                                    <select class="inputs-concentrado" v-model="var_area" v-if="actualizar_sugerencia==index+1">
                                                            <option value="" disabled>Seleccione el área...</option>
                                                            <option v-for="area in lista_area" :key="area" :value="area">{{area}}</option>
                                                    </select>
                                                    <label v-else>{{concentrado.area}}</label>
                                                </td>
                                                <td>
                                                    <select class="inputs-concentrado" v-model="var_area_participante" v-if="actualizar_sugerencia==index+1">
                                                        <option value="" disabled>Seleccione área participante...</option>
                                                        <option v-for="area_participante in lista_area_participante" :key="area_participante" :value="area_participante">{{area_participante}}</option>
                                                    </select>
                                                    <label v-else>{{concentrado.area_participante}}</label>
                                                </td>
                                                <td>
                                                    <select class="inputs-concentrado" v-model="var_subarea" v-if="actualizar_sugerencia==index+1">
                                                        <option value="" disabled>Seleccione Subárea...</option>
                                                        <option v-for="subarea in lista_subarea" :key="subarea" :value="subarea">{{subarea}}</option>
                                                    </select>
                                                    <label v-else>{{concentrado.subarea}}</label>
                                                </td>
                                                <td>
                                                    <select class="inputs-concentrado" v-model="var_impacto_primario" v-if="actualizar_sugerencia==index+1">
                                                        <option value="" disabled>Seleccione impacto primario...</option>
                                                        <option v-for="impacto_primario in lista_impacto_primario" :key="impacto_primario" :value="impacto_primario">{{impacto_primario}}</option>
                                                    </select>
                                                    <label v-else>{{concentrado.impacto_primario}}</label>
                                                </td>
                                                <td>
                                                    <select class="inputs-concentrado" v-model="var_impacto_secundario" v-if="actualizar_sugerencia==index+1">
                                                        <option value="" disabled>Seleccione impacto secundario...</option>
                                                        <option v-for="impacto_secundario in lista_impacto_secundario" :key="impacto_secundario" :value="impacto_secundario">{{impacto_secundario}}</option>
                                                    </select>
                                                    <label v-else>{{concentrado.impacto_secundario}}</label>
                                                </td>
                                                <td>
                                                    <select class="inputs-concentrado" v-model="var_tipo_desperdicio" v-if="actualizar_sugerencia==index+1">
                                                        <option value="" disabled>Seleccione tipo desperdicio..</option>
                                                        <option v-for="tipo_desperdicio in lista_tipo_desperdicio" :key="tipo_desperdicio" :value="tipo_desperdicio">{{tipo_desperdicio}}</option>
                                                    </select>
                                                    <label v-else>{{concentrado.tipo_de_desperdicio}}</label>
                                                </td>
                                                <td>
                                                <div  class="inputs-concentrado" style="overflow-y: scroll; max-height:50px;"  v-if="actualizar_sugerencia==index+1">
                                                <label>{{var_objetivo_de_calidadMA}}</label>
                                                    <ul>
                                                        <li v-for="objetivo_de_calidad in objetivo_de_calidadMA">
                                                            <input type="checkbox" :value="objetivo_de_calidad" v-model="var_objetivo_de_calidadMA">
                                                            <label for="objetivo_de_calidad">{{objetivo_de_calidad}}</label>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <label v-else>{{concentrado.objetivo_de_calidad_ma}}</label>
                                                </td>
                                                <td><input class="inputs-concentrado" type="date" v-model="var_fecha_sugerencia" v-if="actualizar_sugerencia==index+1"></input><label v-else>{{concentrado.fecha_de_sugerencia}}</label></td>
                                                <td><input class="inputs-concentrado" type="date" v-model="var_fecha_inicio" v-if="actualizar_sugerencia==index+1"></input><label v-else>{{concentrado.fecha_de_inicio}}</label></td>
                                                <td><input class="inputs-concentrado" type="date" v-model="var_fecha_compromiso" v-if="actualizar_sugerencia==index+1"></input><label v-else>{{concentrado.fecha_compromiso}}</label></td>
                                                <td><input class="inputs-concentrado" type="date" v-model="var_fecha_real_de_cierre" v-if="actualizar_sugerencia==index+1"></input><label v-else>{{concentrado.fecha_real_cierre}}</label></td>
                                                <td><input class="inputs-concentrado" type="text" v-model="var_analista_de_factibilidad" name="analista_de_factibilidad" v-if="actualizar_sugerencia==index+1"><label v-else>{{concentrado.analista_de_factibilidad}}</label></td>
                                                <td><input class="inputs-concentrado" type="text" v-model="var_impacto_planeado" name="impacto planeado" v-if="actualizar_sugerencia==index+1"></input><label v-else>{{concentrado.impacto_planeado}}</label></td>
                                                <td><input class="inputs-concentrado" type="text" v-model="var_impacto_real" name="impacto_real" v-if="actualizar_sugerencia==index+1"></input><label v-else>{{concentrado.impacto_real}}</label></td>
                                                <td><label>{{usuario}}</label></td>
                                                <td><label v-if="actualizar_sugerencia==index+1"><?php echo date("Y/m/d"); ?></label><label v-else>{{concentrado.creado}}</label></td>
                                                <td>{{concentrado.modificado_por}}</td>
                                                <td>{{concentrado.modificado}}</td>
                                                <td><button type="button" class="btn btn-danger" title="Eliminar" @click="eliminar_sugerencia(concentrado.id)"><i class="bi bi-trash"></button></i></td>
                                            </tr>
                                        </tbody>
                                    </table>
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
                             <!--fin cinta apartado-->
                            <!-- contenido principal gonher-->
                            
                             <!--fin contenido principal gonher-->
                   </div>
                   <div v-else-if="ventana=='retos'">
                            <div class="row justify-content-center align-items-start ">
                                <div class="cintilla col-12 text-center">
                                   <b> ADMINISTRACIÓN DE RETOS</b>
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
                nueva_sugerencia:false,
                contador: 0,
                actualizar_sugerencia:'',
                concentrado_sugerencias:[],
                var_cumplimiento:'0',
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
                var_analista_de_factibilidad:'',
                var_impacto_planeado:'',
                var_impacto_real:'',
                usuario:'<?php echo $_SESSION['usuario']; ?>'   
            }
        },
        mounted(){
            //Consultado concentrado de sugerencias.
            axios.post('consulta_concentrado_sugerencias.php',{
            }).then(response =>{
                this.concentrado_sugerencias = response.data
                console.log(this.concentrado_sugerencias);
            }),
            //consultado lista status
           axios.post('lista_status.php',{
            }).then(response =>{
                this.lista_status = response.data
                console.log(this.lista_status);
            }),
             //consultado lista planta
           axios.post('lista_planta.php',{
            }).then(response =>{
                this.lista_planta = response.data
                console.log(this.lista_planta);
            }),
            //consultado lista area
           axios.post('lista_area.php',{
            }).then(response =>{
                this.lista_area = response.data
                console.log(this.lista_area);
            })
            //consultado lista participante
           axios.post('lista_area_participante.php',{
            }).then(response =>{
                this.lista_area_participante = response.data
                console.log(this.lista_area_participante);
            }),
             //consultado lista subareas
           axios.post('lista_subarea.php',{
            }).then(response =>{
                this.lista_subarea = response.data
                console.log(this.lista_subarea);
            }),
             //consultado lista impacto primario
            axios.post('lista_impacto.php',{
            }).then(response =>{
                this.lista_impacto_primario = response.data
                this.lista_impacto_secundario = response.data
                console.log(this.lista_impacto_primario);
                console.log(this.lista_impacto_secundario);
            }),
            //consultado lista tipo desperdicio
            axios.post('lista_tipo_desperdicio.php',{
            }).then(response =>{
                this.lista_tipo_desperdicio = response.data
                console.log(this.lista_tipo_desperdicio);
            }),
            //consultado lista objetivo de calidad MA
            axios.post('lista_objetivos_calidad_ma.php',{
            }).then(response =>{
                this.objetivo_de_calidadMA = response.data
                console.log(this.objetivo_de_calidadMA);
            }),
            //consultado lista impacto primario
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
                   if(dato=='premios'){ this.pintarTres=true}else{this.pintarTres=false}
                   if(dato=='retos'){this.pintarCuatro=true}else{this.pintarCuatro=false}
                   if(dato=='configuracion'){this.pintarCinco=true}else{this.pintarCinco=false}
             },
            guardar_nueva_sugerencia_y_actualizar(nueva_o_actualizar,id_registro){
                this.nueva_sugerencia=false;
               
                axios.post('guardar_nueva_sugerencia_y_actualizar.php',{
                    id: id_registro,
                    tipo_nueva_o_actualizar: nueva_o_actualizar,
                    cumplimiento: this.var_cumplimiento,
                    nombre_sugerencia: this.var_nombre_sugerencias,
                    folio: this.var_folio,
                    status: this.var_status,
                    causa_no_factibilidad: this.var_causa_no_factibilidad,
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
                    analista_de_factibilidad: this.var_analista_de_factibilidad,
                    impacto_planeado: this.var_impacto_planeado,
                    impacto_real: this.var_impacto_real,
                    usuario: this.usuario,
                }).then(response =>{
                    console.log(response.data);
                    this.consultado_concentrado()
                       
                })
            },
            mostrar_id(id){
                    var posicion=id
                    console.log(posicion)
                    this.actualizar_sugerencia = posicion
                if(id=="0"){// nueva sugerencia
                    this.var_nombre_sugerencias=''
                    this.var_folio=''
                    this.var_causa_no_factibilidad=''
                    this.var_situacion_actual = ''
                    this.var_idea_propuesta = ''
                    this.var_nomina = ''
                    this.var_colaborador = ''
                    this.var_puesto = ''
                    this.var_planta = ''
                    this.var_area = ''
                    this.var_area_participante = ''
                    this.var_subarea = ''
                    this.var_impacto_primario = ''
                    this.var_impacto_secundario = ''
                    this.var_tipo_desperdicio = ''
                    this.var_objetivo_de_calidadMA.splice(0,15)
                    this.nueva_sugerencia=true
                } else if (id==""){//cacelar actualizar

                } else {//actualizar sugerencias
                    this.nueva_sugerencia=false;
                    this.var_nombre_sugerencias=this.concentrado_sugerencias[posicion-1].nombre_sugerencia
                    this.var_folio=this.concentrado_sugerencias[posicion-1].folio
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
                    var arr = this.concentrado_sugerencias[posicion-1].objetivo_de_calidad_ma.split(',')
                    var longitud = arr.length
                    this.var_objetivo_de_calidadMA.splice(0,15);
                    //console.log(longitud)
                    if(arr.length>1){
                        for (var i = 0; i < arr.length; i++){
                                    this.var_objetivo_de_calidadMA[i] = arr[i]
                        }
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