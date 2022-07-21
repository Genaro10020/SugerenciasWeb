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
                                        <td>{{concentrado.folio}}</td>
                                        <td>{{concentrado.nombre_sugerencia}}</td>
                                        <td>{{concentrado.fecha_compromiso}}</td>
                                        <td>{{concentrado.cumplimiento}}</td>
                                        <td>PENDIENTE</td>
                                        <td>PENDIENTE</td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
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
                                            <th scope="col">Nombre sugerencias <span v-show="nueva_sugerencia==true || actualizar_sugerencia!=''" class="badge bg-primary">*</span></th>
                                            <th scope="col">Folio <span v-show="nueva_sugerencia==true || actualizar_sugerencia!=''" class="badge bg-primary">*</span></th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Causa de No factibidad <span v-show="nueva_sugerencia==true || actualizar_sugerencia!=''" class="badge bg-primary">*</span></th>
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
                                                <td><label><?php echo date("d/m/Y"); ?></label></td>
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
                                                    <button type="button" class="btn btn-success  ms-2" title="Subir PDF" data-bs-toggle="modal" data-bs-target="#modal" @click="modal_subir_ver_documentos('Subir',concentrado.folio)"><i class="bi bi-paperclip"></i></button>
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
                                                <td><!--<input class="inputs-concentrado" type="date" v-model="var_fecha_compromiso" v-if="actualizar_sugerencia==index+1"></input><label v-else>{{concentrado.fecha_compromiso}}</label></td>-->
                                                <td><!--<input class="inputs-concentrado" type="date" v-model="var_fecha_real_de_cierre" v-if="actualizar_sugerencia==index+1"></input><label v-else>{{concentrado.fecha_real_cierre}}</label></td>-->
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
                                                <td><label v-if="actualizar_sugerencia==index+1"><?php echo date("d/m/Y"); ?></label><label v-else>{{concentrado.creado}}</label></td>
                                                <td>{{concentrado.modificado_por}}</td>
                                                <td>{{concentrado.modificado}}</td>
                                                <!--<td><button type="button" class="btn btn-danger" title="Eliminar" @click="eliminar_sugerencia(concentrado.id)"><i class="bi bi-trash"></button></i></td>-->
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                           

                            <!-- Modal Eliminar/Actualizar Planta -->
                            <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="exampleModalLabel" >{{titulo_modal}}</h6>
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
                                                <form @submit.prevent="uploadFile">
                                                    <!---->
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="custom-file my-5"> 
                                                                <input type="file" id="input_file_subir"  ref="uploadfiles" multiple required/>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <button  type="submit" name="upload" class="btn btn-primary">Subir Archivos</button>
                                                        </div>
                                                    </div> 
                                                       
                                                        <!-- Mostrando los archivos nuevos cargados -->
                                                        <div v-show="filenames.length>0" >
                                                        <hr>
                                                                <div class="col-12" v-for= "(filename,index) in filenames">
                                                                    <div class="row">
                                                                    <span class="badge bg-success">Nuevo documento  {{index+1}} agregado</span>
                                                                            <div class="">
                                                                                <button type="button" class="btn btn-danger" @click="eliminarDocumento(filename)" >Eliminar</button>
                                                                            </div>
                                                                        <iframe  :src="filenames[index]" style="width:100%;height:500px;"></iframe>
                                                                    </div>
                                                                   <!-- <iframe src="https://vvnorth.com/Sugerencias/documentos/pdf.pdf" style="width:100%;height:500px;"></iframe>-->
                                                                </div>
                                                        </div>
                                                       
                                                        <!-- Mostrando los archivos cargados -->
                                                        <div v-show="fileconsult.length>0" >
                                                        <hr>
                                                                <div class="col-12" v-for= "(fileconsulta,index) in fileconsult">
                                                                    <div class="row">
                                                                        <span class="badge bg-secondary">Documento {{index+1}}</span><br>
                                                                            <div class="">
                                                                                <button type="button" class="btn btn-danger" @click="eliminarDocumento(fileconsulta)" >Eliminar</button>
                                                                            </div>
                                                                    </div>
                                                                    <iframe  :src="fileconsult[index]" style="width:100%;height:500px;"></iframe>
                                                                    
                                                                   <!-- <iframe src="https://vvnorth.com/Sugerencias/documentos/pdf.pdf" style="width:100%;height:500px;"></iframe>-->
                                                                </div>
                                                        </div>
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
                contador: 0,
                file: '',
                filenames: [],
                fileconsult: [],
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
                lista_analista_factibilidad: [],
                var_analista_de_factibilidad:'',
                lista_usuarios_y_analistas_factibilidad: [],
                var_usuario_y_analista_de_factibilidad:'',
                var_impacto_planeado:'',
                var_impacto_real:'',
                usuario:'<?php echo $_SESSION['usuario']; ?>',
                titulo_modal:'',
                mensaje_modal:'',   
                contenido_modal_agregar_eliminar:'',
                nueva_opcion:'',
                tipo_agregar_eliminar:'',
                correo_analista:'',
                folio_carpeta_doc:'',
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
                   if(dato=='premios'){ this.pintarTres=true}else{this.pintarTres=false}
                   if(dato=='retos'){this.pintarCuatro=true}else{this.pintarCuatro=false}
                   if(dato=='configuracion'){this.pintarCinco=true}else{this.pintarCinco=false}
             },
            guardar_nueva_sugerencia_y_actualizar(nueva_o_actualizar,id_registro){

                if(this.var_nombre_sugerencias!='' && this.var_folio!='' && this.var_causa_no_factibilidad!='' && this.var_situacion_actual!='' && 
                    this.var_idea_propuesta!='' && this.var_nomina!='' && this.var_colaborador!='' && this.var_puesto!='' && this.var_planta!='' && 
                    this.var_area!='' && this.var_area_participante!='' && this.var_subarea!='' && this.var_fecha_sugerencia!='' && this.var_fecha_inicio!=''){
                    this.actualizar_sugerencia="";//desactivar editar o actualizar
                    this.nueva_sugerencia=false;//desactivar nueva sugerencia
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
                    this.var_usuario_y_analista_de_factibilidad = this.var_subarea = this.concentrado_sugerencias[posicion-1].analista_de_factibilidad
                    this.var_impacto_primario = this.concentrado_sugerencias[posicion-1].impacto_primario
                    this.var_impacto_secundario = this.concentrado_sugerencias[posicion-1].impacto_secundario
                    this.var_tipo_desperdicio = this.concentrado_sugerencias[posicion-1].tipo_de_desperdicio
                    this.var_fecha_sugerencia = this.concentrado_sugerencias[posicion-1].fecha_de_sugerencia
                    this.var_fecha_inicio = this.concentrado_sugerencias[posicion-1].fecha_de_inicio
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
            modal_subir_ver_documentos(tipo,folio){
                this.folio_carpeta_doc = folio
                this.titulo_modal="Suber/Ver Documentos." //creando titulo modal
                this.contenido_modal_agregar_eliminar=tipo // contenido a mostrar
                this.buscarDocumentos()
            },
            uploadFile(){
                let formData = new FormData();
                var files = this.$refs.uploadfiles.files;
                var totalfiles = this.$refs.uploadfiles.files.length;
                for (var index = 0; index < totalfiles; index++) {
                 formData.append("files[]", files[index]);//arreglo de documentos
                }
                formData.append("folio", this.folio_carpeta_doc);
                axios.post("subir_documentos.php", formData,
                    {
                    headers: {"Content-Type": "multipart/form-data"}
                    })
                    .then(response => {
                    this.filenames = response.data;
                    if(this.filenames.length>0){
                        document.getElementById("input_file_subir").value=""
                        alert(this.filenames.length + " archivo/s se han subido.")
                    }else{
                        alert("Intente nuevamente.")
                    }

                    })
                    .catch(error => {
                        console.log(error);
                    });
                },
            buscarDocumentos(){
                this.filenames=[] //limpiado vista del documento subido en modal 
                this.fileconsult=[]//limpiado vista del documento bajada en modal 
                    axios.post("buscar_documentos.php",{
                        folio_carpeta_doc:this.folio_carpeta_doc
                    })
                    .then(response => {
                    this.fileconsult = response.data;
                    //console.log(response.data);
                    if(this.fileconsult.length>0){
                        console.log(this.fileconsult.length + "Archivos encontrados.")
                    }else{
                        /*alert("Sin Documentos agregados.")*/
                    }

                    })
                    .catch(error => {
                        console.log(error);
                    });
                },
            eliminarDocumento(ruta){
               
               axios.post("eliminar_documento.php",{
                    ruta_eliminar: ruta
                }).then( reponse=>{
                    if(reponse.data=="Archivo Eliminado"){
                        this.buscarDocumentos()
                        alert("Eliminado con Éxito")
                    }else if(reponse.data=="No Eliminado"){
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