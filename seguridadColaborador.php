<?php
session_start();
if ($_SESSION["usuario"] && $_SESSION["tipo"] == "Colaborador") {
    $fotoTomada = "false";
    if (isset($_GET["FotoTomada"])) {
        $fotoTomada = $_GET["FotoTomada"];
    }
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
        <!--Sweet Alert -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        <link rel="stylesheet" type="text/css" href="estilos/miestilo.css">
        <!--Iconos boostrap-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <title>Sugerencias</title>
    </head>

    <body>
        <style>
            /* #app{
            font-family: 'Andika', sans-serif;
        }*/

            /*ENCABEZADO */
            .titulo {
                color: white;
                font-family: 'Fjalla One', sans-serif;

            }

            .subtitulo {

                font-family: 'Stint Ultra Condensed', cursive;

            }

            .btn_principal_coloborador {
                border-radius: 100px;
                height: 50px;
                width: 50px;
                box-shadow: 0px 0px 2px black;
                background-color: rgb(158, 0, 0);

            }

            .btn_principal_coloborador:hover {
                border-radius: 100px;
                height: 50px;
                width: 50px;
                box-shadow: 0px 0px 10px rgb(0, 0, 0);
                background-color: rgb(35, 54, 226);
            }

            /*FIN ENCABEZADO*/

            .contenedorHallazgo {
                width: 94%;
                height: 100%;
                border: 1px solid gray;
            }
        </style>


        <div id="app" class="container-fluid  "><!--BODY-->
            <!--BARRA SUPERIOR-->
            <div class="row  d-flex justify-content-around align-items-center" style="height:10vh; background-color: rgba(181,0,0,1); box-shadow: 0px 0px 12px -2px black;">
                <div class="row align-items-center bg-white">
                    <!--style="box-shadow: 0px 0px 10px -2px black"-->
                    <div class="col-2 d-flex align-items-center rounded-end" style=" height:45.8833px;"><img class="img-fluid" src="img/logo_gonher.png"></img></div>
                    <div class="col-8 d-flex align-items-center justify-content-center">
                        <div>
                            <div class="titulo lh-1 mt-3 text-dark fs-2 fw-bold text-center">Seguridad</div>
                            <div class="subtitulo fs-5 lh-1  text-center mt-1 text-secondary mb-3"><?php echo $_SESSION['nombre']; ?></div>
                        </div>
                    </div>
                    <div class=" col-2 d-flex align-items-center rounded-start" style="height:45.8833px"><img class="img-fluid ms-2" style=" max-height:80px;" src="img/logo_opex.jpg"></img></div>
                </div>
            </div>
            <!--CUERPO-->

            <!--ESTO SOLO LE APARECE AL ADMIN -->
            <?php if ($_SESSION["usuario"] == "60083" || $_SESSION["usuario"] == "16299" ): ?>
                <div class="text-center pt-3">
                    <button class="btn btn-danger btn-sm me-1" @click="misHallazgos()">
                        Mis Hallazgos
                    </button>
                    <button class="btn btn-danger btn-sm me-1" @click="concentradoHallazgos()">
                        Concentrado
                    </button>
                    <button class="btn btn-danger btn-sm" @click="responsables()">
                        Responsables
                    </button>
                </div>
            <?php endif; ?>

            <!--APARTADO PARA ENVIAR Y VER HALLAZGOS PROPIOS-->
            <div v-show="bandera_misHallazgosOconcentrado == 'MisHallazgos'" class="row justify-content-center" style="min-height:75vh;">

                <div class="contenedorHallazgo mt-3 pb-2 row justify-content-center">
                    <label for="descripcionHallazgo">Descripción del hallazgo:</label>
                    <div class="form-group row">

                        <div class="col-11">
                            <textarea inputmode="text" @keyup="hayTextoHallazgo()" style="outline:none; resize:none" v-model="texto" class="form-control d-flex" id="descripcionHallazgo" rows="3"></textarea>
                        </div>

                        <div class="col-1 d-flex align-items-center">
                                <button :class="{'btn btn-danger': listo_micro !== true,'btn btn-success': listo_micro === true}" @click="btnVoz()">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-mic" viewBox="0 0 16 16">
                                        <path d="M3.5 6.5A.5.5 0 0 1 4 7v1a4 4 0 0 0 8 0V7a.5.5 0 0 1 1 0v1a5 5 0 0 1-4.5 4.975V15h3a.5.5 0 0 1 0 1h-7a.5.5 0 0 1 0-1h3v-2.025A5 5 0 0 1 3 8V7a.5.5 0 0 1 .5-.5" />
                                        <path d="M10 8a2 2 0 1 1-4 0V3a2 2 0 1 1 4 0zM8 0a3 3 0 0 0-3 3v5a3 3 0 0 0 6 0V3a3 3 0 0 0-3-3" />
                                    </svg>
                                </button>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                    <?php if (isset($_GET['app'])) { ?>
                        <span class="badge alert-info">Si el botón micrófono no realiza ninguna acción actualice su App.</span>
                    <?php } ?>
                    </div>
                    <!--<div class="text-center" style="border:1px solid red; height:30%; width:100%;">
                            <?php if (isset($_GET['app'])) { ?>
                                 <div class="col-12 " style="margin-top:10%">     
                                            <div class="col-12 offset-lg-4 col-lg-4 d-flex justify-content-center">
                                                <a href="ejecutarCamaraMovilSeguridad.php" class="btn_photo"> <img src="img/photo.png" class="img-responsive" width="50"/></a>
                                            </div>
                                            <div class="col-12 offset-lg-4 col-lg-4 d-flex justify-content-center">
                                                <label class="alert alert-info mt-1" style="font-size:0.8em">Tomar evidencia</label>
                                            </div>
                                </div>
                            <?php
                            } else {
                            ?>
                                <span class="badge alert-danger">Dispositivo no compatible con cámara. (Solo Android)</span>
                            <?php
                            } ?>     
                            </div>-->
                    <div class="pt-2"> <!-- TIPO ---->
                        <select v-model="select_tipo" class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option value="" disabled selected>Tipo de hallazgo</option>
                            <option value="Acto inseguro">Acto inseguro</option>
                            <option value="Condición insegura">Condición insegura</option>
                        </select>
                    </div>

                    <div class="pt-2"> <!--- PLANTA --->
                        <select v-model="select_planta" @change="select_area=''" class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option value="" disabled selected>Seleccione una planta</option>
                            <option value="Enerya">Enerya</option>
                            <option value="Riasa">Riasa</option>
                        </select>

                        <div v-if="select_planta=='Enerya'" :disabled="select_planta==''"> <!--areas enerya-->
                            <div class="pt-2"> <!--- AREAS --->
                                <select v-model="select_area" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                    <option value="" disabled>Seleccione Área </option>
                                    <option v-for="area in areas_enerya" :value="area.id">
                                        {{area.area}}
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div v-if="select_planta=='Riasa'" :disabled="select_planta==''"> <!--areas riasa-->
                            <div class="pt-2"> <!--- AREAS --->
                                <select v-model="select_area" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                    <option value="" disabled>Seleccione Área </option>
                                    <option v-for="area in areas_riasa" :value="area.id">
                                        {{area.area}}
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!--boton de enviar-->
                    <div class="d-flex justify-content-center pt-2">
                        <button class="btn btn-success" :disabled="select_tipo=='' || select_planta=='' || select_area == '' || texto.trim()==''" @click="enviarHallazgo()">
                            enviar
                        </button>
                    </div>
                    <div class=" d-flex justify-content-center">
                        <span v-show="bandera_msj_hallazgo==true" class="badge bg-primary text-white mt-2" style="font-size:10px;">
                            Su hallazgo fue enviado
                        </span>
                    </div>
                    <div class=" d-flex justify-content-center">
                        <span v-show="foto_tomada=='true'" class="badge bg-primary text-white mt-2" style="font-size:10px;">
                            La fotografía se guardo con éxito.
                        </span>
                    </div>
                </div>

                <div style="height:1em;">

                </div>

                <!-- TABLA DE CONCENTRADO DE HALLAZGOS PROPIOS -->
                <div class="div-scroll-vertial"><!--scroll-->

                    <table v-if="concentrado_hallazgos.length>0" class="table table-striped " style=" font-size: 0.8em;">
                        <thead>
                            <tr class="align-middle text-center" style="background:rgb(137, 0, 0); height:5px; color:white; font-size: 1em;">
                                <th scope="col">#</th>
                                <th v-if="movil==true" scope="col">Fotografía</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="align-middle" v-for="(concentrado, index) in concentrado_hallazgos">
                                <td class="text-center">{{index+1}}</td>
                                <td v-if="movil==true" class="text-center">
                                    <div v-if="concentrado.existe_foto==1">
                                        <img :src="'fotografiaSeguridad/' + numero_nomina + '/' + concentrado.id + '/fotografia.jpeg?'+Math.random()" class="img-responsive" width="50" alt="Sin Fotografía" />
                                    </div>
                                    <div v-else class="d-flex text-center">
                                        <div class="col-12 d-flex justify-content-center">
                                            <div class="col-12 d-flex-colum justify-content-center text-center">
                                                <a :href="'ejecutarCamaraMovilSeguridad.php?UltimoID=' + concentrado.id+'&&NumeroNomina='+numero_nomina" class="btn_photo mx-auto">

                                                    <img src="img/photo.png" class="img-responsive" width="50" />
                                                </a>
                                                <span class="badge alert-warning">Tomar Fotografía</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">{{concentrado.tipo_hallazgo}} </td>
                                <td>{{concentrado.descripcion_hallazgo}}</td>
                                <td v-if="concentrado.status == 'Sin Atender' || concentrado.status == 'En Proceso' || concentrado.status == 'Atendido' || concentrado.status == 'Comentario' || concentrado.status == 'Finalizar'">
                                    <span class="badge bg-dark" style="font-size:12px;">{{concentrado.status}}</span>
                                </td>
                                <td v-else><span class="badge bg-info" style="font-size:12px;">Finalizado:</span> {{concentrado.status}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div v-else class="d-flex  justify-content-center">
                        <span class="alert bg-warning ">No cuenta con hallazgos reportados, esperamos tu participación.</span>
                    </div>
                </div><!--scroll-->

            </div><!--FIN CUERPO-->

            <!-- CONCENTRADO DE HALLAZGOS SOLO PARA EL ADMINISTRADOR -->

            <div v-show="bandera_misHallazgosOconcentrado == 'Concentrado'" class="row justify-content-center pt-2" style="min-height:75vh;">

                <!-- TABLA DE CONCENTRADO DE HALLAZGOS PROPIOS -->
                <div class="div-scroll-vertial"><!--scroll-->
                    <table v-if="concentrado_hallazgos.length>0" class="table table-striped" style="font-size: 0.8em;">
                        <thead>
                            <tr style="background:rgb(137, 0, 0); height:5px; color:white; font-size: 1em;">
                                <th scope="col">#</th>
                                <th scope="col">ID Identificador</th>
                                <th scope="col">Fecha del hallazgo</th>
                                <th scope="col">Colaborador</th>
                                <th scope="col">Nomina</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Planta</th>
                                <th scope="col">Área</th>
                                <th scope="col">Evidencia</th>
                                <th scope="col">Status</th>
                                <th scope="col">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(concentrado, index) in concentrado_hallazgos" class="align-middle">
                                <td><b>{{index+1}}</b></td>
                                 <td>ID Unico:<b> {{concentrado.id}}</b>
                                <td>{{concentrado.fecha_hallazgo}}
                                <td>{{concentrado.colaborador}} </td>
                                <td>{{concentrado.numero_nomina}}</td>
                                <td>{{concentrado.tipo_hallazgo}} </td>
                                <td>{{concentrado.descripcion_hallazgo}}</td>
                                <td>{{concentrado.planta}} </td>
                                <td>{{concentrado.nombreArea}}</td>
                                <td>
                                    <button type="button" :id="'boton'+index" class="btn btn-sm me-2" @click="ampliarImgHallazgo(index)" style="padding:0px;"> <!--v-show="bandera_ampliarImg == 'existe'+index"-->
                                        <img alt="" style="border: 1px solid black; width: 200px; height: 200px;" :src="'fotografiaSeguridad/'+concentrado.numero_nomina+'/'+concentrado.id+'/'+'fotografia.jpeg'" :id="'Imagen'+index" @error="(event) => hola(event,index,'')"></img> <!--"-->
                                    </button>
                                </td>
                                <td style="min-width:120px; vertical-align:middle;">
                                    <div class="d-flex justify-content-center">
                                        <div class="row d-flex justify-content-center align-items-center" style="width:100%;height:100%;">
                                            <span v-if="concentrado.status == 'Sin Atender' || concentrado.status == 'En Proceso' || concentrado.status == 'Atendido'" class="badge rounded-pill bg-danger mb-1">{{concentrado.status}}</span>
                                            <span v-if="concentrado.status == 'Finalizar'" class="badge rounded-pill bg-danger mb-1">Atendido</span>
                                            <button v-if="concentrado.status == 'Sin Atender'" class="col-5 me-1 btn btn-sm btn-success d-flex justify-content-center align-items-center" style="font-size:10px;" @click="btnStatus('En Proceso',index)">
                                                Atender
                                            </button>
                                            <button v-if="concentrado.status == 'Sin Atender'" class="col-5 btn btn-sm btn-warning d-flex justify-content-center align-items-center" style="font-size:10px;" @click="btnStatus('Finalizar',index)">
                                                Finalizar
                                            </button>

                                            <button v-if="concentrado.status == 'En Proceso'" class="col-12 btn btn-sm btn-primary d-flex justify-content-center align-items-center" style="font-size:10px;" @click="btnStatus('Atendido',index)">
                                                Atendido
                                            </button>
                                            <button v-if="concentrado.status == 'Atendido' || concentrado.status == 'Finalizar'" class="col-12 btn btn-sm btn-primary d-flex justify-content-center align-items-center" style="font-size:10px;" @click="modal_comentario(concentrado.id,concentrado.status,index)">
                                                Comentario
                                            </button>
                                            <button v-if="concentrado.status != 'Atendido' && concentrado.status != 'Sin Atender' && concentrado.status != 'En Proceso' && concentrado.status != 'Finalizar'" class="col-12 btn btn-sm btn-success d-flex justify-content-center align-items-center" style="font-size:10px;" @click="modal_comentario(concentrado.id,concentrado.status,index)">
                                                Comentario
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td style= "vertical-align:middle;">
                                    <button type="button" class="col-12 btn btn-sm btn-danger d-flex justify-content-center align-items-center  rounded-circle" style="width: 40px; height: 40px;" @click= "eliminarHallazgo(index)"><i class="bi bi-trash3-fill"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div v-else class="d-flex  justify-content-center">
                        <span class="alert bg-warning ">No existen hallazgos reportados por el momento.</span>
                    </div>
                </div><!--scroll-->


            </div><!--FIN CUERPO-->

            <!-- APARTADO RESPONSABLES -->
            <div v-show="bandera_misHallazgosOconcentrado == 'Responsables'" class="row justify-content-center pt-2" style="min-height:75vh;">
                <div class="d-grid gap-2 col-2 mx-auto">
                    <button class="btn btn-success mb-2" type="button" @click = 'reserVarGuardar(), modalNuevoResponsable()'><i class="bi bi-person-plus"></i> Nuevo Responsable</button>
                </div>
                <div style="height: 70vh; overflow-x: scroll;">
                    <table class="table table-striped" style="font-size: 0.8em;">
                        <thead>
                            <tr style="background:rgb(137, 0, 0); height:5px; color:white; font-size: 1em;">
                                <th scope="col" class= "text-center align-middle">#</th>
                                <th scope="col" class= "text-center align-middle">Planta</th>
                                <th scope="col" class= "text-center align-middle">Secciones</th>
                                <th scope="col" class= "text-center align-middle">Areas</th>
                                <th scope="col" class= "text-center align-middle">Nombres</th>
                                <th scope="col" class= "text-center align-middle">Correos</th>
                                <th scope="col" class= "text-center align-middle">Cambiar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(secciones, seccion, indexa) in responsables_secciones" class="align-middle">
                                
                                <td class= "text-center align-middle"><b>{{indexa+1}}</b></td>
                                <td class= "text-center align-middle">{{secciones.planta}} </td>
                                <td class= "text-center align-middle">{{secciones.seccion}}</td>
                                <td class="align-middle">
                                    <ul>
                                        <li v-for="area in secciones.areas">
                                            {{area}}    
                                        </li>
                                    </ul>
                                </td>
                                <td class="align-middle"><ul>
                                        <li v-for="usuario in secciones.usuarios">
                                            {{usuario}}    
                                        </li>
                                    </ul>
                                </td>
                                <td class="align-middle"><ul>
                                        <li v-for="email in secciones.emails">
                                            {{email}}    
                                        </li>
                                    </ul>
                                </td>
                                <td class= "text-center align-middle">
                                      
                                    <div class="d-grid gap-2 col-6 mx-auto">
                                        <button class="btn btn-warning btn-sm" style="border-radius: 10px;" type="button" @click="reseteaVar(), modalCambioSeccion(secciones)">Cambiar</button>
                                        <button class="btn btn-danger btn-sm"style="border-radius: 10px;"  type="button" @click="reseteaResp(), modalEliminaResp(secciones)">Eliminar</button>
                                    </div>
                                </td>
                            </tr>  
                        </tbody>
                    </table>
                </div>
            </div>


            <!-- MODAL PARA DAR DE ALTA UN NUEVO RESPONSABLE -->
            <div  class="modal fade" id="modalNuevoResponsable" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Nuevo Responsable</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" @click="reserVarGuardar()"></button><!-- @click=" " AGREGA EN ESTE CLICK EL METODO PARA RESETEAR VARIABLES NUEVO RESPONSABLE-->
                    </div>
                    <form @submit.prevent="agregarNuevoResponsable()">
                        <div class="modal-body" style="display: flex; flex-wrap: wrap; gap: 10px;">
                            <!-- nombre -->
                            <div class="input-group input-group-sm flex-nowrap" style="flex: 1 1 45%;">
                                <span class="input-group-text" id="addon-wrapping"><i class="bi bi-person"></i></span>
                                <input type="text" class="form-control fs-8" placeholder="Nombre" aria-label="Nombre" aria-describedby="addon-wrapping" v-model="nombre_newresp">
                            </div>
                            <!-- correo -->
                            <div class="input-group input-group-sm flex-nowrap" style="flex: 1 1 45%;">
                                <span class="input-group-text" id="addon-wrapping">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-at" viewBox="0 0 16 16">
                                        <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2zm3.708 6.208L1 11.105V5.383zM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2z"/>
                                        <path d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648m-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z"/>
                                    </svg>
                                </span>
                                <input type="text" class="form-control fs-8" placeholder="Correo" aria-label="Correo" aria-describedby="addon-wrapping" v-model="correo_newresp">
                            </div>
                            <!-- seccion -->
                            <div style="width: 100%;">
                                <select v-model ="seccion_elegida" class="form-select form-select-sm p-10" aria-label=".form-select-sm example">
                                    <option value="" disabled selected>Elige una sección...</option>
                                    <option v-for="secc in secciones" :key="secc.id" :value="secc.id">
                                        {{secc.nombre}} ({{secc.planta}})
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal" style="border-radius: 18px;" @click="reserVarGuardar()">Cerrar</button><!-- @click=" " AGREGA EN ESTE CLICK EL METODO PARA RESETEAR VARIABLES NUEVO RESPONSABLE-->
                            <button type="submit" class="btn btn-sm btn-warning"  style="border-radius: 18px;" >Guardar</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>

            <!-- MODAL PARA CAMBIAR DE SECCION AL RESPONSABLE -->
            <div class="modal fade" id="modalCambioSeccion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cambiar Sección</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" @click="reseteaVar()"></button>
                    </div>
                    <div class="modal-body" style="display: flex; gap: 10px;">
                        <select v-model ="responsable_seleccionado" class="form-select form-select-sm" style="border-radius: 12px;" aria-label=".form-select-sm example">
                            <option value="" disabled selected>Seleccione un responsable</option>
                            <option  v-for="usuario in responsablesDeFila" :key="usuario.id" :value="usuario.id">
                                {{usuario.usuario}}
                            </option>
                        </select>
                        <select v-model ="seccion_seleccionada"class="form-select form-select-sm" style="border-radius: 12px;" aria-label=".form-select-sm example">
                            <option value="" disabled selected>Mover a...</option>
                            <option v-for="sec in secciones" :key="sec.id" :value="sec.id">
                                {{sec.nombre}} ({{sec.planta}})
                            </option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal" style="border-radius: 18px;" @click="reseteaVar()">Cerrar</button>
                        <button type="button" class="btn btn-sm btn-warning"  style="border-radius: 18px;" @click="guardarCambioSeccion()">Guardar Cambio</button>
                    </div>
                    </div>
                </div>
            </div>
            <!-- FIN MODAL CAMBIO SECCION -->

            <!-- MODAL PARA ELIMINAR RESPONSABLE -->
            <div class="modal fade" id="modalEliminaResp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-SM modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Eliminar Responsable</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" @click="reseteaResp()"></button>
                    </div>
                    <div class="modal-body" style="display: flex; gap: 10px;">
                        <select v-model ="responsable_aeliminar" class="form-select form-select-sm" style="border-radius: 12px;" aria-label=".form-select-sm example">
                            <option value="" disabled selected>Seleccione un responsable</option>
                            <option  v-for="user in responsablesDeFila" :key="user.id" :value="user.id">
                                {{user.usuario}}
                            </option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal" style="border-radius: 18px;" @click="reseteaResp()">Cerrar</button>
                        <button type="button" class="btn btn-sm btn-warning"  style="border-radius: 18px;" @click="eliminarResponsable()">Eliminar</button>
                    </div>
                    </div>
                </div>
            </div>
            <!-- FIN MODAL ELIMINAR RESPONSABLE -->

            <!-- BOTON ATRAS -->
            <div id="opciones" style="min-height:5vh; max-height:5vh;" class=" d-flex align-items-center justify-content-center ">
                <div class="row text-center mb-2 d-flex justify-content-center align-items-center">
                    <div v-if="seguimiento==false" @click="redireccionar('Atras')" class="btn_principal_coloborador text-center col-12 d-flex align-items-center justify-content-center" style="cursor: pointer">
                        <div> <img src="img/app_atras.png" class="img-fluid" alt="..." style=" width: 50px;"></div>
                    </div>
                    <div v-else @click="seguimiento=false" class="btn_principal_coloborador text-center col-12 d-flex align-items-center justify-content-center" style="cursor: pointer">
                        <div> <img src="img/app_atras.png" class="img-fluid" alt="..." style=" width: 50px;"></div>
                    </div>
                </div>
            </div>

            <!--FOOTER-->
            <div class="row" style="height:10vh; background-color: rgba(181,0,0,1); box-shadow: 0px 0px 12px -2px black;">
            </div><!--FIN FOOTER-->


            <!-- MODAL AMPLIAR IMAGEN DE HALLAZGO --------------------------------------------->

            <div v-for="(concentrado,index) in concentrado_hallazgos" class="modal" id="modal_hallazgo" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Hallazgo:</h5>
                            {{hallazgo}}
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center d-flex align-items-center justify-content-center">
                            <img class="" alt="" style="border: 1px solid black; width: 90%; height: 90%;" :src="ruta"></img>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!--MODAL COMENTARIO --->
            <div v-for="(concentrado, index) in concentrado_hallazgos" class="modal fade" id="mimodal_comentario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Comentario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="textarea_comentario" class="form-label">Escriba su comentario</label>
                            <textarea class="form-control" id="textarea_comentario" v-model="comentario" rows="3" style="outline:none;resize:none"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" @click="guardar_comentario(comentario,concentrado.id)">Guardar</button>
                    </div>
                    </div>
                </div>
            </div>
        </div> <!--FIN DIV CONTENEDOR-->
    </body>

    <script>
        const vue3 = {
            data() {
                return {
                    seguimiento: false,
                    select_planta: '',
                    select_area: '',
                    select_tipo: '',
                    descripcion: false,
                    bandera_msj_hallazgo: false,
                    concentrado_hallazgos: [],
                    bandera_misHallazgosOconcentrado: 'MisHallazgos',
                    id_: '',
                    idHallazgo_: '',
                    nomina: '',
                    ruta: '',
                    hallazgo: '',
                    hay_imagen: [],
                    texto: <?php echo isset($_GET['app']) && isset($_GET['dictado']) ? json_encode(urldecode($_GET['dictado'])) : "''"; ?>,
                    escuchando: false,
                    reconocer_voz: null,
                    status_hallazgos:[],

                    //status de cada hallazgo
                    status:'',
                    comentario:'',
                    posicion:'',

                    /*areas_enerya: [
                        'Placas',
                        'Ensamble',
                        'Formación',
                        'Etiquetado',
                        'Sala de Ácidos',
                        'Cuarto de Rectificadores',
                        'Almacén Embarques',
                        'Laboratorio Eléctrico',
                        'Seguridad y Medio Ambiente',
                        'Recursos Humanos',
                        'Oficinas Generales',
                        'Almacén Refacciones',
                        'Almacén Materia Prima',
                        'Almacén Seco',
                        'Almacén Reposo',
                        'Almacén Gases',
                        'Servicios Generales',
                        'Calidad',
                        'Mantenimiento',
                        'Contratistas',
                        'Periféricos',
                        'Baterías Industriales',
                        'Subestación de Oxigeno',
                        'Cuarto de Compresores',
                        'Osmosis'
                    ],*/

                    /*areas_riasa: [
                        'Triturador #1',
                        'Triturador #2',
                        'Grupo Industrial',
                        'Lingotera',
                        'Pailas',
                        'Hornos',
                        'Die Cast',
                        'Coating',
                        'Plata Tratadora de Agua',
                        'Inyectora',
                        'Lavandería',
                        'Almacén Refacciones',
                        'Almacén Materia Prima',
                        'Almacén de Plomos',
                        'Almacén Aliantes',
                        'Almacén de Químicos y Gases',
                        'Laboratorio F y Q',
                        'Calidad',
                        'Mantenimiento',
                        'Contratistas',
                        'Periféricos',
                        'Filtro Prensa',
                        'Área de Cargas',
                        'Subestación de Oxigeno',
                        'Área de Diesel',
                        'Cuarto de Compresores',
                        'Osmosis'
                    ],*/
                    movil: <?php echo isset($_GET['app']) ? 'true' : 'false'; ?>,
                    ultimo_id: '',
                    numero_nomina: <?php echo $_SESSION["usuario"]; ?>,
                    foto_tomada: <?php echo $fotoTomada; ?>,
                    capturando_voz: false,
                    listo_micro: false,
                    ///Cambiar seccion responsable (Actualiza)
                    responsables_secciones: [],
                    responsablesDeFila: [], ///traerá unicamente los responsables de la fila/seccion seleccionada
                    secciones: [], ///aqui traeré todas las secciones existentes
                    seccion_seleccionada: '',
                    responsable_seleccionado: '',
                    ///Agregar seccion nuevo responsable (Crea)
                    seccion_elegida: '',
                    correo_newresp: '',
                    nombre_newresp: '',
                    ///Elimina responsable
                    responsable_aeliminar: '',

                }
            },
            mounted() {
                //this.consultar_plantas()
                this.consultar_hallazgos()
                this.consultar_areas_enerya_y_riasa()
            },
            methods: {
                /*consultar_plantas(){
                              axios.post('lista_planta.php',{
                                    }).then(response =>{
                                        console.log("Respuesta de consultar plantas",response.data.map(items=> items.planta));
                                        console.log
                                        //console.log(this.lista_planta);
                                    })         
                },*/
                consultar_areas_enerya_y_riasa(){
                    axios.get('consultar_areas_enerya_riasa.php',{
                    }).then(response =>{
                        this.areas_enerya = response.data.Enerya;
                        this.areas_riasa = response.data.Riasa;
                        console.log("Repuesta de consultar las areas ",response.data)
                    }).catch(error =>{
                        console.log("Algo salio mal en axios :-(")
                    });
                },
                hola(event, numero, idHallazgo) {
                    event.target.src = 'fotografiaSeguridad/sinFoto.png';
                    let deshabilitarBoton = document.getElementById('boton' + idHallazgo + numero);
                    if (deshabilitarBoton !== null) {
                        //deshabilitarBoton.addAtribute(disabled);
                        deshabilitarBoton.disabled = true;
                    }
                    //cosole.log("No hay Imagen",'boton' + idHallazgo + numero)
                },

                ampliarImgHallazgo(index) {
                    this.id_ = this.concentrado_hallazgos[index].id;
                    this.nomina = this.concentrado_hallazgos[index].numero_nomina;

                    this.ruta = 'fotografiaSeguridad/' + this.nomina + '/' + this.id_ + '/' + 'fotografia.jpeg?' + Math.random();

                    this.hallazgo = this.concentrado_hallazgos[index].descripcion_hallazgo;

                    //console.log(this.id_, this.idHallazgo_, this.nomina)
                    console.log('la ruta es:', this.ruta)

                    this.myModal = new bootstrap.Modal(document.getElementById('modal_hallazgo'))
                    this.myModal.show();
                },

                hayTextoHallazgo() {
                    let hallazgo = document.getElementById("descripcionHallazgo").value
                    hallazgo = hallazgo.trim();
                    if (hallazgo !== '') {
                        this.descripcion = true;
                    } else {
                        this.descripcion = false;
                    }
                },


                enviarHallazgo() {

                    let descripcion = document.getElementById("descripcionHallazgo").value

                    //console.log('enviamos:)',descripcion,this.select_planta,this.select_area);

                    axios.post('guardar_hallazgo_syma.php', {
                        descripcion: descripcion,
                        tipo: this.select_tipo,
                        planta: this.select_planta,
                        area: this.select_area,
                        //guardarDesdeElCelular: <?php //echo  isset($_GET['app']) ? true : '"No celular"'; 
                                                    ?>

                    }).then(response => {
                        console.log('respuesta:', response.data);
                        document.getElementById("descripcionHallazgo").value = '';
                        this.select_tipo = '';
                        this.select_planta = '';
                        this.select_area = '';
                        this.bandera_msj_hallazgo = true;


                        //alert(this.movil);
                        if (this.movil === true) { //Saber si se guardo desde APP
                            this.ultimo_id = response.data.ultimo_id;
                            window.location.href = "ejecutarCamaraMovilSeguridad.php?UltimoID=" + this.ultimo_id + "&&NumeroNomina=" + this.numero_nomina;
                        } else { //Saber si se guardo desde Movil
                            setTimeout(() => {
                                this.bandera_msj_hallazgo = false
                            }, 7000)
                        }
                        this.consultar_hallazgos()

                    })

                },

                consultar_hallazgos() {
                    this.concentrado_hallazgos = []
                    setTimeout(() => {
                        this.foto_tomada = 'false';
                    }, 7000)

                    axios.post('consultar_hallazgos_syma.php', {
                        tipo: 'usuarios'
                    }).then(response => {
                        this.concentrado_hallazgos = response.data
                        //console.log(response.data);
                    })
                },

                consultar_hallazgos_concentrado() {
                    this.concentrado_hallazgos = []
                    axios.post('consultar_hallazgos_syma.php', {
                        tipo: 'admin'
                    }).then(response => {
                        this.concentrado_hallazgos = response.data
                        console.log('lo que llega es:',response.data);
                        //console.log('los id son:',this.concentrado_hallazgos[index][2])
                        //console.log(" RESPUESTAA",response.data);

                    })
                },

                consultarResponables(){
                    this.responsables_secciones = []
                    axios.post('consultar_responsables_syma.php', {
                        tipo: 'admin'
                    }).then(response => {
                        this.responsables_secciones = response.data
                        console.log('llega:', this.responsables_secciones);

                    })
                },

                redireccionar(opciones) { //btn para ir al menu principal
                    if (opciones == 'Sugerencias') {
                        window.location.href = ""
                    }
                    if (opciones == 'Atras') {
                        window.location.href = "principalColaborador.php"
                    }

                },

                misHallazgos() {
                    this.bandera_misHallazgosOconcentrado = 'MisHallazgos';
                    this.consultar_hallazgos();
                },

                concentradoHallazgos() {
                    this.bandera_misHallazgosOconcentrado = 'Concentrado';
                    this.consultar_hallazgos_concentrado();
                },

                responsables() {
                    this.bandera_misHallazgosOconcentrado = 'Responsables';
                    console.log("Entraste al apartado de Responsables")
                    this.consultarResponables();
                },
                
                ///AGREGA NUEVO RESP
                modalNuevoResponsable(){
                    this.myModal = new bootstrap.Modal(document.getElementById('modalNuevoResponsable'));
                    this.myModal.show();

                    this.secciones = Object.values(this.responsables_secciones).map(seccion => {
                        return { id: seccion.id_seccion, nombre: seccion.seccion, planta: seccion.planta };
                    });
                },

                reserVarGuardar(){
                    this.correo_newresp = '';
                    this.nombre_newresp ='';
                    this.seccion_elegida ='';
                },
                agregarNuevoResponsable(){


                    console.log("Nombre: ", this.nombre_newresp);
                    console.log("Correo: ", this.correo_newresp);
                    console.log("Seccion: ", this.seccion_elegida);
                    if(this.nombre_newresp == '' || this.correo_newresp == '' || this.seccion_elegida == ''){
                        return alert("Todos los campos son requeridos.")
                    }

                    axios.post('guardar_nuevoResponsable_syma.php', {
                        nombre_newresp: this.nombre_newresp,
                        correo_newresp: this.correo_newresp,
                        seccion_elegida: this.seccion_elegida,
                    }).then(response => {
                        console.log("hola guardar nruvo THEN", response.data);
                        if(response.data == true){
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: "¡Se agregó nuevo Responsable!",
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }else{
                            alert("Algo salió mal al agregar:( ")
                        }    
                    })
                    
                    this.myModal.hide();
                    this.responsables();
                },
                ///FIN AGREGA NUEVO RESP

                ///ACTUALIZA RESP
                modalCambioSeccion(fila){
                    //fila trae secciones, que muestra el contenido de la fila en la que se presionó btn cambiar

                    // Abrir modal
                    this.myModal = new bootstrap.Modal(document.getElementById('modalCambioSeccion'));
                    this.myModal.show();

                    //Asignar
                    this.responsablesDeFila = fila.usuarios.map((usuario, index) => {
                    return { usuario: usuario, id: fila.ids_usuarios[index] };
                    });
                    this.secciones = Object.values(this.responsables_secciones).map(seccion => {
                        return { id: seccion.id_seccion, nombre: seccion.seccion, planta: seccion.planta };
                    });
                    //imprimiendo p/verificar
                    console.log("fila",fila)
                    console.log("responsables_secciones",this.responsables_secciones)

                    console.log("secciones", this.secciones)
                    console.log("responsablesDeFila", this.responsablesDeFila)                    
                },
                
                reseteaVar(){
                    this.responsablesDeFila = [];
                    this.secciones = [];
                    this.responsable_seleccionado = '';
                    this.seccion_seleccionada = '';
                },
                guardarCambioSeccion(){
                    console.log("responsable_seleccionado", this.responsable_seleccionado)
                    console.log("seccion_seleccionada", this.seccion_seleccionada)

                    if( this.responsable_seleccionado == '' || this.seccion_seleccionada =='' ){
                        return
                    }

                    let idresponsable_seleccionado = parseInt(this.responsable_seleccionado);
                    let idseccion_seleccionada = parseInt(this.seccion_seleccionada);

                    console.log("responsable_seleccionado ID", idresponsable_seleccionado)
                    console.log("seccion_seleccionada ID", idseccion_seleccionada)

                    
                    axios.post('actualizar_seccion_syma.php', {
                        seccion_id: idseccion_seleccionada,
                        id_resp: idresponsable_seleccionado,
                    }).then(response => {
                        console.log("hola THEN", response.data);
                        if(response.data == true){
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: "¡Se guardó el cambio!",
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }else{
                            alert("Algo salió mal al cambiar :(");
                        }    
                    })

                    this.myModal.hide();
                    this.responsables();
                    //manda  a llamar el qu ete trae todo lo responsables pa que se actualice
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "¡Se guardó el cambio!",
                        showConfirmButton: false,
                        timer: 1500
                    });
                },
                ///FIN ACTUALIZA RESP

                ///ELIMINA RESP

                modalEliminaResp(fila){
                    this.myModal = new bootstrap.Modal(document.getElementById('modalEliminaResp'));
                    this.myModal.show();

                    this.responsablesDeFila = fila.usuarios.map((usuario, index) => {
                    return { usuario: usuario, id: fila.ids_usuarios[index] };
                    });
                },
                reseteaResp(){
                    console.log("resetearesp")
                    this.responsable_aeliminar = '';
                },
                eliminarResponsable(){
                    console.log("usuario: ", this.responsable_aeliminar)
                    if( this.responsable_aeliminar==''){
                        return
                    }

                    axios.post('eliminar_responsable_syma.php', {
                        usuario_id: this.responsable_aeliminar,
                    }).then(response => {
                        console.log("hola eliminar resp THEN", response.data);
                        if(response.data == true){
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: "Se eliminó el Responsable",
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }else{
                            alert("Algo salió mal al eliminar :( ")
                        }    
                    })
                    
                    this.myModal.hide();
                    this.responsables();

                },
                ///FIN ELIMINA RESP
                btnVoz() {
                    <?php if (isset($_GET['app'])) { ?>
                        window.location.href = "ejecutarDictadoVozSeguridad.php";
                    <?php
                    } else {
                    ?>
                        const recognition = new(window.SpeechRecognition || window.webkitSpeechRecognition)();
                        recognition.lang = 'es-ES';
                        recognition.interimResults = true;
                        recognition.start()
                        this.listo_micro = true; // Micrófono listo para escuchar


                        recognition.onresult = (event) => {
                            this.capturando_voz = true;
                            let result = event.results[event.resultIndex];
                            if (result.isFinal) {
                                //alert("insertando");
                                this.texto += result[0].transcript;
                                this.capturando_voz = false;
                                this.listo_micro = false;
                            }
                        };

                        recognition.onerror = (event) => {
                            console.error("Error en el reconocimiento de voz: ", event.error);
                            alert("Acepte los permisos en el navegador " + event.error)
                            this.capturando_voz = false;
                            this.listo_micro = false;
                        };

                    <?php } ?>

                },

                btnStatus(accion,posicion){
                    this.status = accion;
                    let id = this.concentrado_hallazgos[posicion].id;
                    //console.log('mi id es:',id);
                    switch (accion){
  
                        case 'En Proceso':{
                            //console.log('estamos en proceso')
                            break;
                        }
                        case "Finalizar":{
                            //console.log('estamos en finalizar')
                            break;
                        }
                        case "Atendido":{
                            //console.log('estamos en atendido')
                            break;
                        }
                        case "Comentario":{
                            //console.log('estamos en comentario')
                            break;
                        }
                        default:{
                            //console.log('estamos en default')
                            break;
                        }
                    }

                    axios.post('actualizar_status_hallazgo_syma.php', {
                        accion: this.status,
                        id: id,
                    }).then(response => {
                        this.status_hallazgos = response.data
                        this.concentrado_hallazgos[posicion].status = this.status
                        //console.log(this.concentrado_hallazgos[posicion].status = this.status);
                    })
                },

                guardar_comentario(comentario,posicion){

                    if(comentario != ''){
                        this.comentario = comentario;
                        //console.log('Mi id es:',this.id);

                        axios.post('actualizar_status_hallazgo_syma.php', {
                            accion: this.comentario,
                            id: this.id,
                        }).then(response => {
                            this.concentrado_hallazgos[this.posicion].status = this.comentario
                        })
                    }/*else{
                        console.log('esta vacio')
                    }*/
                    this.myModal.hide();
                },

                modal_comentario(id,comentario,index){
                    this.posicion = index;
                    this.id = id;

                    if(comentario == 'Atendido' || comentario == 'Finalizar'){
                        this.comentario = '';
                    }else{
                        this.comentario = comentario;
                    }

                   // this.comentario = comentario;
                    //console.log('Mi comentario es:',comentario)
                    //console.log('Mi posicion es:',this.posicion)
                   // console.log('Mi id es:',id);
                    this.myModal = new bootstrap.Modal(document.getElementById('mimodal_comentario'))
                    this.myModal.show();
                },

                eliminarHallazgo(posicion){
                    console.log("HOLA ELIMINAR")
                    let id = this.concentrado_hallazgos[posicion].id;
                    console.log(id)

                    Swal.fire({
                        title: "¿Seguro que desea eliminar?",
                        text: "Este hallazgo se eliminará de forma definitiva",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#d33",
                        cancelButtonColor: "rgba(162, 162, 162, 1)",
                        cancelButtonText: "Cancelar",
                        confirmButtonText: "Sí, eliminar!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            axios.delete('eliminar_hallazgo_syma.php', {
                                params: {
                                    id: id,
                                }
                            }).then(response => {
                                if(response.data === true){
                                     Swal.fire({
                                        title: "Eliminado!",
                                        text: "Se eliminó el hallazgo",
                                        icon: "success"
                                    });
                                    this.concentradoHallazgos();
                                }
                            }).catch(error => {
                                console.error("Error deleting:", error);
                                Swal.fire({
                                    title: "Error!",
                                    text: "Surgió un problema al eliminar el hallazgo.",
                                    icon: "error"
                                });
                            });
                        }
                    });
                    
                },

            }
        }
        var mountedApp = Vue.createApp(vue3).mount('#app');
    </script>

    </html>
<?php
} else {
    header("Location: index.php");
}
?>