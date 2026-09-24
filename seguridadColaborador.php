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
            <?php if ($_SESSION["esSyma"]): ?>
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
            <!--ESTO SOLO LE APARECE A LOS RESPONSABLES -->
            <?php if (($_SESSION["esResponsableHallazgo"] ?? false) !== false): ?>
                <div class="text-center pt-3">
                    <button class="btn btn-danger btn-sm me-1" @click="misHallazgos()">
                        Mis Hallazgos
                    </button>
                    <button class="btn btn-danger btn-sm me-1" @click="concentradoHallazgos()">
                        Concentrado
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
                                <td>
                                    <!-- Estado (Intacto según tus requerimientos) -->
                                    <div class="mb-2">
                                        <span class="badge rounded-pill shadow-sm" :class="obtenerEstado(concentrado.status).color"
                                            :style="obtenerEstado(concentrado.status).style 
                                            ? { backgroundColor: obtenerEstado(concentrado.status).style, color: obtenerEstado(concentrado.status).textColor }
                                            :{ color: obtenerEstado(concentrado.status).textColor} ">
                                            {{ obtenerEstado(concentrado.status).title }}
                                        </span>
                                    </div>

                                    <!-- Sección de Comentarios con Títulos en Negrita (Propuesta 2) -->
                                    <div v-if="concentrado.status === 'esperando_syma' || concentrado.status === 'finalizado'" class="mt-2 text-dark small" style="line-height: 1.3;">
                                        
                                        <!-- Comentario del responsable -->
                                        <div v-if="concentrado.comentario_responsable !== '' && concentrado.comentario_responsable !== null" class="mb-1">
                                            <strong class="text-secondary d-block">Comentario del responsable:</strong>
                                            <span class="text-muted text-break">{{ concentrado.comentario_responsable }}</span>
                                            <br>
                                        </div>
                                        
                                        <!-- Comentario de SYMA -->
                                        <div v-if="concentrado.comentario_syma !== '' && concentrado.comentario_syma !== null">
                                            <strong class="text-secondary d-block">Comentario de SYMA:</strong>
                                            <span class="text-muted text-break">{{ concentrado.comentario_syma }}</span>
                                        </div>

                                    </div>
                                </td>

                                <!-- <td>{{concentrado.descripcion_hallazgo}}</td>
                                <td v-if="concentrado.status == 'Sin Atender' || concentrado.status == 'En Proceso' || concentrado.status == 'Atendido' || concentrado.status == 'Comentario' || concentrado.status == 'Finalizar'">
                                    <span class="badge bg-dark" style="font-size:12px;">{{concentrado.status}}</span>
                                </td>
                                <td v-else><span class="badge bg-info" style="font-size:12px;">Finalizado:</span> {{concentrado.status}}</td> -->
                            </tr>
                        </tbody>
                    </table>
                    <div v-else class="d-flex  justify-content-center">
                        <span class="alert bg-warning ">No cuenta con hallazgos reportados, esperamos tu participación.</span>
                    </div>
                </div><!--scroll-->

            </div><!--FIN CUERPO-->

            <!-- CONCENTRADO DE HALLAZGOS SOLO PARA EL ADMINISTRADOR -->
            <div v-show="bandera_misHallazgosOconcentrado == 'Concentrado'" class="row justify-content-center pt-2"
                style="min-height:75vh;">

                <!-- CONTENEDOR PRINCIPAL MAS COMPACTO Y CENTRADO -->
                <div class="col-12 col-xxl-10 px-3">

                    <!-- WRAPPER CON SCROLL VERTICAL Y ENCABEZADO FIJO -->
                    <div class="table-responsive shadow-sm rounded bg-white border" style="max-height: 68vh; overflow-y: auto;">

                        <table v-if="concentrado_hallazgos.length > 0" class="table table-hover align-middle mb-0"
                            style="font-size: 0.9rem;">

                            <!-- THEAD FIJO, CENTRADO Y ALINEADO VERTICALMENTE -->
                            <thead class="sticky-top text-white text-uppercase tracking-wider text-center align-middle"
                                style="background-color: rgb(137, 0, 0); z-index: 10; font-size: 0.75rem;">
                                <tr>
                                    <th scope="col" class="py-3 ps-3 text-center align-middle" style="width: 50px;">#</th>
                                    <th scope="col" class="py-3 text-center align-middle">Identificador & Fecha</th>
                                    <th scope="col" class="py-3 text-center align-middle">Colaborador</th>
                                    <th scope="col" class="py-3 text-center align-middle">Tipo y Descripción</th>
                                    <th scope="col" class="py-3 text-center align-middle">Ubicación (Planta / Área)</th>
                                    <th scope="col" class="py-3 text-center align-middle">Evidencia</th>
                                    <th scope="col" class="py-3 text-center align-middle">Estatus / Acciones</th>
                                    <?php if (($_SESSION["esResponsableHallazgo"] ?? true) !== true): ?>
                                    <th scope="col" class="py-3 text-center pe-3 align-middle" style="width: 70px;">Borrar</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>

                            <tbody class="border-top-0">
                                <tr v-for="(concentrado, index) in concentrado_hallazgos" :key="concentrado.id"
                                    class="border-bottom">

                                    <!-- Columna # -->
                                    <td class="ps-3 fw-bold text-secondary text-center">{{ index + 1 }}</td>

                                    <!-- ID y Fecha agrupados -->
                                    <td class="text-center">
                                        <div class="d-flex flex-column align-items-center">
                                            <span class="fw-bold text-dark"><i class="bi bi-hash text-muted"></i>{{ concentrado.id
                                                }}</span>
                                            <span class="text-muted" style="font-size: 0.8rem;"><i
                                                    class="bi bi-calendar3 me-1"></i>{{ concentrado.fecha_hallazgo }}</span>
                                        </div>
                                    </td>

                                    <!-- Colaborador y Nómina (Nombre Completo sin recortes) -->
                                    <td>
                                        <div class="fw-semibold text-dark mb-1" style="font-size: 0.9rem; line-height: 1.2;">{{
                                            concentrado.colaborador }}</div>
                                        <span class="text-muted font-monospace" style="font-size: 0.75rem;"><i
                                                class="bi bi-person-badge me-1"></i>{{ concentrado.numero_nomina }}</span>
                                    </td>

                                    <!-- Tipo y Descripción (Sin scroll interno, texto completamente visible y adaptable) -->
                                    <td style="min-width: 220px;">
                                        <span class="badge bg-dark mb-1">{{ concentrado.tipo_hallazgo }}</span>
                                        <div class="text-secondary"
                                            style="font-size: 0.85rem; word-break: break-word; white-space: normal;">
                                            {{ concentrado.descripcion_hallazgo }}
                                        </div>
                                    </td>

                                    <!-- Planta y Área (Estructura expandida para evitar solapamiento de íconos) -->
                                    <td>
                                        <div class="d-flex flex-column gap-1 py-1">
                                            <span class="fw-semibold text-dark" style="font-size: 0.9rem;">{{ concentrado.planta
                                                }}</span>
                                            <span class="text-muted d-flex align-items-center" style="font-size: 0.8rem;">
                                                <i class="bi bi-geo-alt text-danger me-1 flex-shrink-0"></i>
                                                <span>{{ concentrado.nombreArea }}</span>
                                            </span>
                                        </div>
                                    </td>

                                    <!-- Evidencia -->
                                    <td class="text-center">
                                        <button type="button"
                                            class="btn btn-sm btn-light border text-secondary px-2 py-1 text-nowrap shadow-sm"
                                            @click="ampliarImgHallazgo(index)" title="Ver evidencia fotográfica">
                                            <i class="bi bi-eye text-danger me-1"></i> Ver Evidencia
                                        </button>
                                    </td>

                                    <!-- Estatus y Botones de Acción  -->
                                    <td style="min-width: 200px;">
                                        <div class="d-flex flex-column gap-1.5 py-2">

                                            <!-- Estados  -->
                                            <div class="d-flex flex-column gap-2 mb-2">
                                                <!-- Badge de estado (Tus clases y métodos intactos) -->
                                                <span class="badge w-100 py-1.5 fw-medium rounded-pill shadow-sm" 
                                                    :class="obtenerEstado(concentrado.status).color"
                                                    :style="obtenerEstado(concentrado.status).style 
                                                                ? { backgroundColor: obtenerEstado(concentrado.status).style, color: obtenerEstado(concentrado.status).textColor }
                                                                : { color: obtenerEstado(concentrado.status).textColor }">
                                                    {{ obtenerEstado(concentrado.status).title }}
                                                </span>

                                                
                                                <div v-if="accionesHallazgos(concentrado).puedeVerSeguimiento" class="text-muted small text-center px-1">
                                                    <div class="fw-semibold text-dark">
                                                        <span v-if="(concentrado.comentario_syma !== '' && concentrado.comentario_syma !== null) || hallazgosContinuando[String(concentrado.id)] === true">
                                                            <span>Completa la información pendiente y agrega tu comentario obligatorio.</span>
                                                        </span>
                                                        <span v-else>
                                                            <i class="bi bi-person-check me-1"></i>
                                                            <span>Tomado por: </span>
                                                            {{ validar_usuario(concentrado) ? 'SYMA' : concentrado.usuario }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Botones de flujo dinámicos organizados en fila -->
                                            <div class="d-flex flex-row flex-wrap gap-1 justify-content-center">
                                                <button v-if="accionesHallazgos(concentrado).puedeAtender"
                                                    class="btn btn-sm btn-success px-2 py-1 d-flex align-items-center gap-1 shadow-sm" style="font-size: 11px;"
                                                    @click="btnStatus('en_proceso', concentrado.id)">
                                                    <i class="bi bi-play-circle"></i> Atender
                                                </button>

                                                <?php if (($_SESSION["esResponsableHallazgo"] ?? true) !== true): ?>
                                                <button v-if="concentrado.status == 'sin_atender'"
                                                    class="btn btn-sm btn-warning text-dark px-2 py-1 d-flex align-items-center gap-1 shadow-sm"
                                                    style="font-size: 11px;" @click="btnStatus('finalizado', index)">
                                                    <i class="bi bi-check2-all"></i> Finalizar
                                                </button>
                                                <?php endif; ?>

                                                <button v-if="accionesHallazgos(concentrado).puedeAtendido"
                                                    class="btn btn-sm px-2 py-1 d-flex align-items-center gap-1 shadow-sm text-white"
                                                    style="font-size: 11px; background-color: #0ca678; border-color: #0ca678;"
                                                    @click="btnStatus('atendido', concentrado.id)">
                                                    <i class="bi bi-check-circle"></i> Atendido
                                                </button>

                                                <!-- Botones de Fotos y Comentario -->
                                                <button v-if="accionesHallazgos(concentrado).puedeVerImagen" type="button"
                                                    class="btn btn-sm btn-light border text-dark px-2 py-1 d-flex align-items-center justify-content-center gap-1 shadow-sm flex-fill"
                                                    style="font-size: 11px; min-width: 90px;" title="Subir Imagen"
                                                    @click="modal_subir_ver_documentos('Subir', concentrado.nombreArea, concentrado.id, 'evidencia_hallazgo', concentrado.cant_img_evidencia)">
                                                    <i class="bi bi-images text-primary"></i> Fotos ({{
                                                    concentrado.cant_img_evidencia }})
                                                </button>

                                                <button v-if="accionesHallazgos(concentrado).puedeComentar"
                                                    class="btn btn-sm btn-light border text-dark px-2 py-1 d-flex align-items-center justify-content-center gap-1 shadow-sm flex-fill"
                                                    style="font-size: 11px; min-width: 90px;"
                                                    @click="modal_comentario(concentrado.id, concentrado.status, concentrado.comentario_syma, concentrado.comentario_responsable)">
                                                    <i class="bi bi-chat-left-text text-secondary"></i> Comentario
                                                </button> 
                                                <button v-if="accionesHallazgos(concentrado).puedeContinuar"
                                                    class="btn btn-sm btn-light border text-dark px-2 py-1 d-flex align-items-center justify-content-center gap-1 shadow-sm flex-fill"
                                                    style="font-size: 11px; min-width: 90px;"
                                                    @click="continuarProcesoSyma(concentrado.id)">
                                                    <i class="bi bi-chat-left-text text-secondary"></i> Continuar ---
                                                </button>                                                 

                                                <button v-if="accionesHallazgos(concentrado).puedeEnviarSyma"
                                                    class="btn btn-sm btn-primary px-2 py-1 d-flex align-items-center gap-1 shadow-sm" style="font-size: 11px;"
                                                    @click="btnStatus('esperando_syma', concentrado.id)">
                                                    <i class="bi bi-send-check"></i> Guardar información
                                                </button>

                                                <button v-if="accionesHallazgos(concentrado).puedeFinalizar"
                                                    class="btn btn-sm btn-primary px-2 py-1 d-flex align-items-center gap-1 shadow-sm" style="font-size: 11px;"
                                                    @click="btnStatus('finalizado', concentrado.id)">
                                                    <i class="bi bi-save"></i> Guardar información
                                                </button>

                                                <!-- Botón de Editar en verde con ícono de lápiz -->
                                                <button v-if="accionesHallazgos(concentrado).puedeEditar"
                                                    class="btn btn-sm btn-success px-2 py-1 d-flex align-items-center gap-1 shadow-sm text-white"
                                                    style="font-size: 11px;" @click="btnStatus('atendido', concentrado.id)">
                                                    <i class="bi bi-pencil-square"></i> Editar
                                                </button>

                                                <!-- Botón de Comentario Final -->
                                                <button v-if="accionesHallazgos(concentrado).puedeVerComentarioFinal"
                                                    class="btn btn-sm px-2 py-1 d-flex align-items-center justify-content-center gap-1 shadow-sm flex-fill text-white"
                                                    style="font-size: 11px; background-color: #495057; border-color: #495057; min-width: 90px;"
                                                    @click="modal_comentario(concentrado.id, concentrado.status, concentrado.comentario_syma, concentrado.comentario_responsable)">
                                                    <i class="bi bi-chat-square-text text-light"></i> Comentario
                                                </button>
                                            </div>
                                        </div>
                                    </td>

                                    <?php if (($_SESSION["esResponsableHallazgo"] ?? true) !== true): ?>
                                    <!-- Botón de Eliminar optimizado para móvil -->
                                    <td class="text-center pe-3 align-middle">
                                        <button type="button"
                                            class="btn btn-outline-danger btn-sm d-inline-flex justify-content-center align-items-center shadow-sm"
                                            style="width: 32px; height: 32px; border-radius: 6px !important;"
                                            title="Eliminar registro" @click="eliminarHallazgo(index)">
                                            <i class="bi bi-trash3" style="font-size: 0.9rem; pointer-events: none;"></i>
                                        </button>
                                    </td>
                                    <?php endif; ?>
                                </tr>
                            </tbody>
                        </table>

                        <!-- Estado Vacío -->
                        <div v-else class="text-center py-5">
                            <div class="alert alert-warning d-inline-block mb-0 px-4 py-3 shadow-sm">
                                <i class="bi bi-exclamation-triangle me-2"></i> No existen hallazgos reportados por el momento.
                            </div>
                        </div>
                    </div>

                    <!-- PAGINACIÓN -->
                    <div v-if="concentrado_hallazgos.length > 0"
                        class="d-flex flex-wrap justify-content-between align-items-center py-3 px-2">
                        <span class="text-muted" style="font-size: 0.8rem;">Mostrando registros activos</span>
                        <nav aria-label="Paginación de hallazgos">
                            <ul class="pagination pagination-sm mb-0 shadow-sm">
                                <li class="page-item disabled">
                                    <a class="page-link text-secondary" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link text-white border-0 fw-bold" style="background-color: rgb(137, 0, 0);"
                                        href="#">1</a>
                                </li>
                                <li class="page-item"><a class="page-link text-dark" href="#">2</a></li>
                                <li class="page-item"><a class="page-link text-dark" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link text-dark" href="#">Siguiente</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!--FIN CUERPO-->

            <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">{{titulo_modal}} con id único: {{this.folio_carpeta_doc}}</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="text-center" v-if="contenido_modal_agregar_eliminar=='Subir'">
                                <form @submit.prevent="uploadFile('admin')">
                                    <!--Subir Documento Sugerencia-->
                                    <div v-if="puedeEditarImagen" class="row">
                                        <div class="col-12">
                                            <div class="custom-file my-5">
                                                <input type="file" id="input_file_subir" ref="archivosydocumentos" multiple
                                                    required accept=".png,.jpeg,.jpg"><span>{{
                                                    extensiones_valida }}</span></input>
                                            </div>
                                        </div>
                                        <div  class="col-12">
                                            <button type="submit" name="upload" class="btn btn-primary">Subir Archivos</button>
                                        </div>
                                    </div>

                                    <!-- Mostrando los archivos cargados -->
                                    <div v-show="filedoc.length>0 && cual_documento=='evidencia_hallazgo'">
                                        <hr>
                                        <div class="col-12" v-for="(filedochallazgoc,index) in filedoc">
                                            <div class="row">
                                                <span class="badge bg-secondary">Imagen {{index+1}}</span><br>
                                                <div v-if="puedeEditarImagen">
                                                    <button type="button" class="btn btn-danger"
                                                        @click="eliminarDocumento(filedochallazgoc)">Eliminar</button>
                                                </div>
                                            </div>
                                            <iframe :src="filedoc[index]" style="width:100%;height:500px;"></iframe>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- APARTADO RESPONSABLES -->
            <div v-show="bandera_misHallazgosOconcentrado == 'Responsables'" class="row justify-content-center pt-2" style="min-height:75vh;">
                <div class="d-grid gap-2 col-2 mx-auto">
                    <button class="btn btn-success mb-2" type="button" @click='reserVarGuardar(), modalNuevoResponsable()'><i class="bi bi-person-plus"></i> Nuevo Responsable</button>
                </div>
                <div style="height: 70vh; overflow-x: scroll;">
                    <table class="table table-striped" style="font-size: 0.8em;">
                        <thead>
                            <tr style="background:rgb(137, 0, 0); height:5px; color:white; font-size: 1em;">
                                <th scope="col" class="text-center align-middle">#</th>
                                <th scope="col" class="text-center align-middle">Planta</th>
                                <th scope="col" class="text-center align-middle">Secciones</th>
                                <th scope="col" class="text-center align-middle">Areas</th>
                                <th scope="col" class="text-center align-middle">Nombres</th>
                                <th scope="col" class="text-center align-middle">Correos</th>
                                <th scope="col" class="text-center align-middle">Cambiar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(secciones, seccion, indexa) in responsables_secciones" class="align-middle" :key="indexa">

                                <td class="text-center align-middle"><b>{{indexa+1}}</b></td>
                                <td class="text-center align-middle">{{secciones.planta}} </td>
                                <td class="text-center align-middle">{{secciones.seccion}}</td>
                                <td class="align-middle">
                                    <ul>
                                        <li v-for="area in secciones.areas">
                                            {{area}}
                                        </li>
                                    </ul>
                                </td>
                                <td class="align-middle">
                                    <ul>
                                        <li v-for="usuario in secciones.usuarios">
                                            {{usuario}}
                                        </li>
                                    </ul>
                                </td>
                                <td class="align-middle">
                                    <ul>
                                        <li v-for="email in secciones.emails">
                                            {{email}}
                                        </li>
                                    </ul>
                                </td>
                                <td class="text-center align-middle">

                                    <div class="d-grid gap-2 col-6 mx-auto">
                                        <button class="btn btn-warning btn-sm" style="border-radius: 10px;" type="button" @click="reseteaVar(), modalCambioSeccion(secciones)">Cambiar</button>
                                        <button class="btn btn-danger btn-sm" style="border-radius: 10px;" type="button" @click="reseteaResp(), modalEliminaResp(secciones)">Eliminar</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>


            <!-- MODAL PARA DAR DE ALTA UN NUEVO RESPONSABLE -->
            <div class="modal fade" id="modalNuevoResponsable" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Agregar Nuevo Responsable</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" @click="reserVarGuardar()"></button><!-- @click=" " AGREGA EN ESTE CLICK EL METODO PARA RESETEAR VARIABLES NUEVO RESPONSABLE-->
                        </div>
                        <form @submit.prevent="agregarNuevoResponsable()">
                            <div class="modal-body" style="display: flex; flex-wrap: wrap; gap: 10px;">
                                <!-- nombre -->
                                <div class="input-group input-group-sm flex-nowrap" style="flex: 1 1 100%;">
                                    <span class="input-group-text" id="addon-wrapping"><i class="bi bi-person"></i></span>
                                    <input type="text" class="form-control fs-8" placeholder="Nombre" aria-label="Nombre" aria-describedby="addon-wrapping" v-model="nombre_newresp">
                                </div>
                                <!-- correo -->
                                <div class="input-group input-group-sm flex-nowrap" style="flex: 1 1 45%;">
                                    <span class="input-group-text" id="addon-wrapping">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-at" viewBox="0 0 16 16">
                                            <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2zm3.708 6.208L1 11.105V5.383zM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2z" />
                                            <path d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648m-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z" />
                                        </svg>
                                    </span>
                                    <input type="text" class="form-control fs-8" placeholder="Correo" aria-label="Correo" aria-describedby="addon-wrapping" v-model="correo_newresp">
                                </div>
                                <!-- nomina -->
                                <div class="input-group input-group-sm flex-nowrap" style="flex: 1 1 45%;">
                                    <span class="input-group-text" id="addon-wrapping"><i class="bi bi-123"></i></span>
                                    <input type="text" class="form-control fs-8" placeholder="Nomina" aria-label="Nomina" aria-describedby="addon-wrapping" v-model="nomina_newresp">
                                </div>
                                <!-- seccion -->
                                <div style="width: 100%;">
                                    <select v-model="seccion_elegida" class="form-select form-select-sm p-10" aria-label=".form-select-sm example">
                                        <option value="" disabled selected>Elige una sección...</option>
                                        <option v-for="secc in secciones" :key="secc.id" :value="secc.id">
                                            {{secc.nombre}} ({{secc.planta}})
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal" style="border-radius: 18px;" @click="reserVarGuardar()">Cerrar</button><!-- @click=" " AGREGA EN ESTE CLICK EL METODO PARA RESETEAR VARIABLES NUEVO RESPONSABLE-->
                                <button type="submit" class="btn btn-sm btn-warning" style="border-radius: 18px;">Guardar</button>
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
                            <select v-model="responsable_seleccionado" class="form-select form-select-sm" style="border-radius: 12px;" aria-label=".form-select-sm example">
                                <option value="" disabled selected>Seleccione un responsable</option>
                                <option v-for="usuario in responsablesDeFila" :key="usuario.id" :value="usuario.id">
                                    {{usuario.usuario}}
                                </option>
                            </select>
                            <select v-model="seccion_seleccionada" class="form-select form-select-sm" style="border-radius: 12px;" aria-label=".form-select-sm example">
                                <option value="" disabled selected>Mover a...</option>
                                <option v-for="sec in secciones" :key="sec.id" :value="sec.id">
                                    {{sec.nombre}} ({{sec.planta}})
                                </option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal" style="border-radius: 18px;" @click="reseteaVar()">Cerrar</button>
                            <button type="button" class="btn btn-sm btn-warning" style="border-radius: 18px;" @click="guardarCambioSeccion()">Guardar Cambio</button>
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
                            <select v-model="responsable_aeliminar" class="form-select form-select-sm" style="border-radius: 12px;" aria-label=".form-select-sm example">
                                <option value="" disabled selected>Seleccione un responsable</option>
                                <option v-for="user in responsablesDeFila" :key="user.id" :value="user.id">
                                    {{user.usuario}}
                                </option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal" style="border-radius: 18px;" @click="reseteaResp()">Cerrar</button>
                            <button type="button" class="btn btn-sm btn-warning" style="border-radius: 18px;" @click="eliminarResponsable()">Eliminar</button>
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


            <div class="modal fade" id="mimodal_comentario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Comentario id {{id_comentario}} </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <!-- SOLO RESPONSABLE -->
                                <?php if (($_SESSION["esResponsableHallazgo"] ?? false) !== false) : ?>
                                <div v-if="comentario_responsable === '' || comentario_responsable === null">
                                    <label for="textarea_comentario" class="form-label">Escriba su comentario Responsable</label>
                                    <textarea class="form-control" id="textarea_comentario" v-model="comentario_responsable" rows="3"
                                        style="outline:none;resize:none"></textarea>
                                </div>
                                <div v-else>
                                    <label for="textarea_comentario" class="form-label">Comentario de Syma</label>
                                    <textarea class="form-control" id="textarea_comentario" v-model="comentario" rows="3"
                                        style="outline:none;resize:none" disabled></textarea>                                    
                                </div>


                                <?php else: ?>
                                    <!-- SOLO SYMA -->
                                <div v-if="hallazgosContinuando[String(id_comentario)] === true || (comentario !== '' || comentario !== null)">
                                    <label for="textarea_comentario" class="form-label">Escriba su comentario Syma</label>
                                    <textarea class="form-control" id="textarea_comentario" v-model="comentario" rows="3"
                                        style="outline:none;resize:none"></textarea>
                                </div>
                                <div v-else>
                                    <label for="textarea_comentario" class="form-label">Comentario Del Responsable</label>
                                    <textarea class="form-control" id="textarea_comentario" v-model="comentario_responsable"
                                        rows="3" style="outline:none;resize:none" disabled></textarea>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

                            <?php if (($_SESSION["esResponsableHallazgo"] ?? false) !== false): ?>
                            <button v-if="puedeGuardarComentario" type="button" class="btn btn-primary"
                                @click="guardar_comentario(comentario_responsable,id_comentario)">Guardar ss</button>
                            <?php else: ?>
                            <button v-if="puedeGuardarComentario" type="button" class="btn btn-primary"
                                @click="guardar_comentario(comentario,id_comentario)">Guardar</button>
                            <?php endif ?>
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
                    status_hallazgos: [],
                    //status de cada hallazgo
                    status: '',
                    comentario: '',
                    posicion: '',

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
                    nomina_newresp: '',
                    ///Elimina responsable
                    responsable_aeliminar: '',
                    id_concentrado: '',
                    cual_documento: '',
                    cantidadDOCFILE: '',
                    myModal: '',
                    extensiones_valida: '',
                    folio_carpeta_doc: '',
                    titulo_modal: '',
                    contenido_modal_agregar_eliminar: '',
                    filedoc: '',
                    objetoCantImgBD: '',
                    filedocUpdate: '',
                    comentario_responsable: '',
                    id_hallazgo: '',
                    hallazgoImagen: [],
                    hallazgoComentario: [],
                    editarHallazgoResponsableEvi: false,
                    esResponsableHallazgo: <?= !empty($_SESSION['esResponsableHallazgo']) ? 'true' : 'false' ?>,
                    idUsuarioActual: <?= json_encode($_SESSION['usuario'] ?? null) ?>,
                    esSyma: <?= !empty($_SESSION['esSyma']) ? 'true' : 'false' ?>,
                    verComentarioSyma: {},
                    // hallazgoContinuar: [],
                    hallazgosContinuando: {},
                    id_comentario: null,
                    estados: [
                        {
                            id: 'sin_atender',
                            title: 'Sin Atender',
                            color: 'bg-secondary',
                            textColor: '#fff'
                        },
                        {
                            id: 'en_proceso',
                            title: 'En Proceso',
                            color: 'bg-primary',
                            textColor: '#fff'
                        },
                        {
                            id: 'atendido',
                            title: 'Atendido',
                            style:  '#AF38D4', // #ECEB5F #F6F58F #FFDF20
                            textColor: '#fff'
                        },
                        {
                            id: 'esperando_syma',
                            title: 'En espera de validación SYMA',
                            style: '#ffda0aef',
                            textColor: '#212529'
                        },
                        {
                            id: 'finalizado',
                            title: 'Finalizado',
                            color: 'bg-success',
                            textColor: '#fff'
                        }
                    ]
                }
            },
            mounted() {
                //this.consultar_plantas()
                this.consultar_hallazgos()
                this.consultar_areas_enerya_y_riasa()
            },
            watch: {
                verComentarioSyma(){
                    console.log("viendo this.verComentarioSyma " + this.verComentarioSyma[id])
                },
                verComentarioOtro(){
                    console.log("dsfjksfj")
                    console.log("viendo this.continuar_syma " + this.hallazgosContinuando[String(this.id_comentario)])
                }
            },
            computed: {

                accionesHallazgos() {
                    return (hallazgo) => {
                        const usuario = Number(hallazgo.iniciado_por) === Number(this.idUsuarioActual)
                        const responsable = this.esResponsableHallazgo === true
                        const usuarioSyma = hallazgo.iniciado_por === '60083' || hallazgo.iniciado_por === '16299'
                        const syma = this.esSyma === true
                        const key = String(hallazgo.id)
                        const continuar = this.hallazgosContinuando[key] === true

                        return {
                            puedeAtender:
                                hallazgo.status === 'sin_atender',
                            puedeAtendido:
                                hallazgo.status === 'en_proceso' && ((usuario && !usuarioSyma) || (usuarioSyma && syma)),
                            puedeEnviarSyma:
                                hallazgo.status === 'atendido' && responsable && usuario &&
                                hallazgo.comentario_responsable !== null && hallazgo.comentario_responsable !== '' &&
                                hallazgo.cant_img_evidencia > 0,
                            puedeContinuar: 
                                (hallazgo.status === 'esperando_syma' && !usuarioSyma && syma && !continuar &&  (hallazgo.comentario_syma === null || hallazgo.comentario_syma === '') && hallazgo.comentario_responsable !== ''),   
                            puedeEditar: 
                                hallazgo.status === 'esperando_syma' && hallazgo.status !== 'finalizado' && responsable && usuario,                                                            
                            puedeFinalizar:
                                (hallazgo.status === 'esperando_syma' && !responsable && hallazgo.comentario_syma !== '' && hallazgo.comentario_syma !== null) ||
                                (hallazgo.status === 'atendido' && !responsable && hallazgo.comentario_syma !== '' && hallazgo.comentario_syma !== null),

                            puedeVerImagen:
                                (hallazgo.status === 'atendido' && ((usuario && !usuarioSyma) || (usuarioSyma && syma))) ||
                                (hallazgo.status === 'esperando_syma' && syma) ||
                                (hallazgo.status === 'finalizado' && ((responsable && !usuarioSyma) || (usuarioSyma && syma) || syma)),
                            puedeEditarImagen:
                                (hallazgo.status === 'finalizado' && ((usuario && !usuarioSyma) || syma )) ||
                                (hallazgo.status === 'atendido' && ((usuario && !usuarioSyma) || (usuarioSyma && syma))),
                            puedeComentar:
                                (hallazgo.status === 'atendido' && ((usuario && !usuarioSyma) || (usuarioSyma && syma))) ||
                                (hallazgo.status === 'esperando_syma' && syma),
                            puedeVerComentarioFinal:
                                hallazgo.status === 'finalizado' && ((usuario && !usuarioSyma) || syma ),
                            puedeVerSeguimiento:
                                hallazgo.status !== 'sin_atender' && hallazgo.status !== 'finalizado' && !usuario,
                            puedeGuardarComentario: 
                                (hallazgo.status === 'finalizado' && (continuar && syma) || (!continuar && syma)) ||
                                (hallazgo.status === 'atendido' && ((usuario && !usuarioSyma) || (usuarioSyma && syma))) ||
                                (hallazgo.status === 'esperando_syma' && syma),
                        }
                    }
                },
                puedeEditarImagen() {
                    if(!this.hallazgoImagen){
                        console.log("es falso")
                        return false
                    }
                    return this.accionesHallazgos(this.hallazgoImagen).puedeEditarImagen
                },
                puedeGuardarComentario() {
                    if(!this.hallazgoComentario) {
                        console.log("es Falso")
                        return false
                    }
                    return this.accionesHallazgos(this.hallazgoComentario).puedeGuardarComentario
                },
            },
            methods: {
                obtenerEstado(status){
                    const syma = this.esSyma === true
                    const estado = this.estados.find(
                        estado => estado.id === status
                    )

                    if (status === 'esperando_syma' && syma) {
                        return {
                            ...estado,
                            title: 'Reporte de responsable',
                            color: 'bg-danger bg-opacity-25',
                            textColor: '#fff'
                        }
                    }
                    return estado
                },
                validar_usuario(concentrado){
                    const usuarioSyma = concentrado.iniciado_por === '60083' || concentrado.iniciado_por === '16299'
                    return usuarioSyma
                },
                continuarProcesoSyma(id) {
                    const key = String(id);

                    this.hallazgosContinuando[key] = true;
                },
                /*consultar_plantas(){
                                axios.post('lista_planta.php',{
                                    }).then(response =>{
                                        console.log("Respuesta de consultar plantas",response.data.map(items=> items.planta));
                                        console.log
                                        //console.log(this.lista_planta);
                                    })         
                },*/
                consultar_areas_enerya_y_riasa() {
                    axios.get('consultar_areas_enerya_riasa.php', {}).then(response => {
                        this.areas_enerya = response.data.Enerya;
                        this.areas_riasa = response.data.Riasa;
                        console.log("Repuesta de consultar las areas ", response.data)
                    }).catch(error => {
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
                                                    // 
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

                consultarResponables() {
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
                modalNuevoResponsable() {
                    this.myModal = new bootstrap.Modal(document.getElementById('modalNuevoResponsable'));
                    this.myModal.show();

                    this.secciones = Object.values(this.responsables_secciones).map(seccion => {
                        return {
                            id: seccion.id_seccion,
                            nombre: seccion.seccion,
                            planta: seccion.planta
                        };
                    });
                },

                reserVarGuardar() {
                    this.correo_newresp = '';
                    this.nombre_newresp = '';
                    this.nomina_newresp = '';
                    this.seccion_elegida = '';
                },
                agregarNuevoResponsable() {

                    console.log("Nombre: ", this.nombre_newresp);
                    console.log("Correo: ", this.correo_newresp);
                    console.log("nomina: ", this.nomina_newresp);
                    console.log("Seccion: ", this.seccion_elegida);
                    if (this.nombre_newresp == '' || this.correo_newresp == '' || this.seccion_elegida == '' || this.nomina_newresp == '') {
                        return alert("Todos los campos son requeridos.")
                    }

                    axios.post('guardar_nuevoResponsable_syma.php', {
                        nombre_newresp: this.nombre_newresp,
                        correo_newresp: this.correo_newresp,
                        nomina_newresp: this.nomina_newresp,
                        seccion_elegida: this.seccion_elegida,
                    }).then(response => {
                        console.log("hola guardar nuevo THEN", response.data);
                        if (response.data == true) {

                            this.consultarResponables();
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: "¡Se agregó nuevo Responsable!",
                                showConfirmButton: false,
                                timer: 1500
                            });
                        } else {
                            alert("Algo salió mal al agregar:( ")
                        }
                    })

                    this.myModal.hide();
                },
                ///FIN AGREGA NUEVO RESP

                ///ACTUALIZA RESP
                modalCambioSeccion(fila) {
                    //fila trae secciones, que muestra el contenido de la fila en la que se presionó btn cambiar

                    // Abrir modal
                    this.myModal = new bootstrap.Modal(document.getElementById('modalCambioSeccion'));
                    this.myModal.show();

                    //Asignar
                    this.responsablesDeFila = fila.usuarios.map((usuario, index) => {
                        return {
                            usuario: usuario,
                            id: fila.ids_usuarios[index]
                        };
                    });
                    this.secciones = Object.values(this.responsables_secciones).map(seccion => {
                        return {
                            id: seccion.id_seccion,
                            nombre: seccion.seccion,
                            planta: seccion.planta
                        };
                    });
                    //imprimiendo p/verificar
                    console.log("fila", fila)
                    console.log("responsables_secciones", this.responsables_secciones)

                    console.log("secciones", this.secciones)
                    console.log("responsablesDeFila", this.responsablesDeFila)
                },

                reseteaVar() {
                    this.responsablesDeFila = [];
                    this.secciones = [];
                    this.responsable_seleccionado = '';
                    this.seccion_seleccionada = '';
                },
                guardarCambioSeccion() {
                    console.log("responsable_seleccionado", this.responsable_seleccionado)
                    console.log("seccion_seleccionada", this.seccion_seleccionada)

                    if (this.responsable_seleccionado == '' || this.seccion_seleccionada == '') {
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
                        if (response.data == true) {

                            this.consultarResponables();
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: "¡Se guardó el cambio!",
                                showConfirmButton: false,
                                timer: 1500
                            });
                        } else {
                            alert("Algo salió mal al cambiar :(");
                        }
                    })

                    this.myModal.hide();
                    //manda  a llamar el qu ete trae todo lo responsables pa que se actualice

                },
                ///FIN ACTUALIZA RESP

                ///ELIMINA RESP

                modalEliminaResp(fila) {
                    this.myModal = new bootstrap.Modal(document.getElementById('modalEliminaResp'));
                    this.myModal.show();

                    this.responsablesDeFila = fila.usuarios.map((usuario, index) => {
                        return {
                            usuario: usuario,
                            id: fila.ids_usuarios[index]
                        };
                    });
                },
                reseteaResp() {
                    console.log("resetearesp")
                    this.responsable_aeliminar = '';
                },
                eliminarResponsable() {
                    console.log("usuario: ", this.responsable_aeliminar)
                    if (this.responsable_aeliminar == '') {
                        return
                    }

                    axios.post('eliminar_responsable_syma.php', {
                        usuario_id: this.responsable_aeliminar,
                    }).then(response => {
                        console.log("hola eliminar resp THEN", response.data);
                        if (response.data == true) {

                            this.consultarResponables();
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: "Se eliminó el Responsable",
                                showConfirmButton: false,
                                timer: 1500
                            });
                        } else {
                            alert("Algo salió mal al eliminar :( ")
                        }
                    })

                    this.myModal.hide();

                },
                ///FIN ELIMINA RESP
                btnVoz() {
                    <?php if (isset($_GET['app'])) { ?>
                        window.location.href = "ejecutarDictadoVozSeguridad.php";
                    <?php
                    } else { ?>
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

                    <?php
                    } ?>

                },

                /*########################################
                                CONCENTRADO 
                ########################################*/

                /*----- Consultar hallazgos para la tabla -----*/
                consultar_hallazgos_concentrado() {
                    
                    const data = {}    

                     if(this.esResponsableHallazgo === true){
                        data.tipo = 'responsableHallazgo'
                     } else {
                        data.tipo = 'admin'
                     }

                    axios.post('consultar_hallazgos_syma.php', data)
                    .then(response => {
                        console.log("Esto después")
                            this.listaFiltrada = response.data.filter((item, index, self) =>
                            index === self.findIndex((t) => t.id === item.id)
                            );
                            this.concentrado_hallazgos = this.listaFiltrada
                        console.log('lo que llega es:', response.data);

                        this.objetoCantImgBD = this.concentrado_hallazgos.map(item => ({
                            id: item.id,
                            cant_img_evidencia: item.cant_img_evidencia
                        }))

                        // this.objetoCantImgBD = imgCant
                        //console.log('los id son:',this.concentrado_hallazgos[index][2])
                        //console.log(" RESPUESTAA",response.data);

                    })
                },


                btnStatus(accion, id_hallazgo) {
                    this.id_hallazgo = id_hallazgo

                    console.log("this.id_hallazgo: " + this.id_hallazgo)

                    axios.post('actualizar_status_hallazgo_syma.php', {
                        accion: accion,
                        id: id_hallazgo,
                        tipo: accion
                    }).then(response => {
                        if(response.data.status = 'false'){
                            alert(response.data.mensaje)
                            this.consultar_hallazgos_concentrado();
                        }
                        this.status_hallazgos = response.data
                        this.consultar_hallazgos_concentrado();
                    }).catch(error => {
                        console.log("Error en estatus" + error)
                    })
                },

                eliminarHallazgo(posicion) {
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
                                if (response.data === true) {
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

                /*----- Comentarios de syma y responsables -----*/
                modal_comentario(id, status, comentarioSyma, comentarioResponsable) {                                   

                    const syma = this.esSyma === true
                    console.log("soy sima " + syma)
                    this.id_comentario = id;

                    this.hallazgoComentario = this.concentrado_hallazgos.find(
                        ch => String(ch.id) === String(this.id_comentario)
                    )

                    console.log("He traído eso: ", this.hallazgoComentario)                     

                    if (this.esResponsableHallazgo) {
                        console.log("Es responsable")
                        if (status === 'en_proceso') {
                            this.comentario_responsable = '';
                            (console.log("if responsable"))
                        } else {
                            console.log("else responsable")
                            this.comentario_responsable = comentarioResponsable;
                            this.comentario = comentarioSyma;
                             console.log("Comentarios del responsable = " + this.comentario_responsable)
                        }
                    } else {
                        if (status === 'en_proceso') {
                            this.comentario = '';
                        } else {
                            this.comentario = comentarioSyma;
                            this.comentario_responsable = comentarioResponsable;
                        }
                        // this.verComentarioSyma = false
                        console.log("no es responsable")
                    }

                    // this.comentario = comentario;
                    //console.log('Mi comentario es:',comentario)
                    //console.log('Mi posicion es:',this.posicion)
                    // console.log('Mi id es:',id);
                    this.myModal = new bootstrap.Modal(document.getElementById('mimodal_comentario'))
                    this.myModal.show();
                },

                guardar_comentario(comentario, posicion) {

                    if (comentario.trim() !== '') {
                        const data = {
                            id: this.id_comentario,
                            tipo: 'guardar_actualizar_comentario'
                        };

                        if (this.esResponsableHallazgo === true) {
                            data.comentario_responsable = comentario;
                        } else {
                            data.accion = comentario;
                        }

                        axios.post('actualizar_status_hallazgo_syma.php', data)
                            .then(response => {
                                console.log("Se ha guardado.")
                                this.consultar_hallazgos_concentrado();

                            }).catch(error => {
                                console.log("Error al guardar " + error)
                            })
                    }
                    this.myModal.hide();
                },





                /*----- Subir evidencia de proceso de hallazgo -----*/
                modal_subir_ver_documentos(tipo, id_concentrado, folio, cual_documento, cantidad) {

                    this.id_concentrado = id_concentrado
                    this.cual_documento = cual_documento
                    this.cantidadDOCFILE = cantidad
                    this.folio_carpeta_doc = folio
                    this.titulo_modal = "Subir/Ver Documentos." //creando titulo modal
                    this.contenido_modal_agregar_eliminar = tipo // contenido a mostrar

                    this.hallazgoImagen = this.concentrado_hallazgos.find(
                        ch => String(ch.id) === String(this.folio_carpeta_doc)
                    )

                    console.log("He traído eso: ", this.hallazgoImagen)                       

                    if (this.cual_documento === 'evidencia_hallazgo') {
                        this.myModal = new bootstrap.Modal(document.getElementById('modal'))
                        this.myModal.show()
                        this.extensiones_valida = '(.png, .jpeg, .jpg)'
                    } else {
                        this.extensiones_valida = ''
                    }
                    this.buscarDocumentos(true)
                },

                cantidadImagenes() {

                    const objetoActual = this.objetoCantImgBD.find(obj => obj.id === this.folio_carpeta_doc);

                    if (!objetoActual) {
                        console.log("No existe ese id.")
                        return;
                    }

                    if (this.cantidadDOCFILE === objetoActual.cant_img_evidencia) {
                        console.log("No hay cambios.")
                        return;
                    }

                    axios.put('actualizar_status_hallazgo_syma.php', {
                        tipo: 'Actualizar_imagenes',
                        id: this.folio_carpeta_doc,
                        cant_img_actual: this.cantidadDOCFILE
                    }).then(response => {
                        this.consultar_hallazgos_concentrado()
                    }).catch(error => {
                        console.log("Error 500: " + error)
                    })
                },
                buscarDocumentos(sincronizarCantImg = false) {
                    this.filedoc = [] //limpiado vista del documento bajada en modal 
                    if (!this.folio_carpeta_doc) return

                    axios.post("buscar_documentos.php", {
                        folio_carpeta_doc: this.folio_carpeta_doc,
                        id_concentrado: this.id_concentrado,
                        cual_documento: this.cual_documento,
                        hallazgoEvidencia: 'hallazgo_Evidencia'
                    }).then(response => {
                        if (this.cual_documento == "evidencia_hallazgo") {
                            this.filedoc = response.data
                            this.cantidadDOCFILE = this.filedoc.length

                            if (sincronizarCantImg) {
                                this.cantidadImagenes()
                            }
                            if (this.filedoc.length > 0) {
                                console.log(this.cantidadDOCFILE + "Archivos encontrados.")
                            }

                        }
                    }).catch(error => {
                        console.log(error);
                    });
                },
                uploadFile(tipo_usuario) {
                    let formData = new FormData();

                    this.usuarioT = tipo_usuario;

                    const files = this.$refs.archivosydocumentos.files
                    const totalfiles = files.length


                    for (let index = 0; index < totalfiles; index++) {
                        formData.append('files[]', files[index])
                    }

                    formData.append("folio", this.folio_carpeta_doc);
                    formData.append("cual_documento", this.cual_documento);
                    formData.append("id_concentrado", this.id_concentrado);
                    formData.append("cantidad", this.cantidadDOCFILE);
                    formData.append("tipo_usuario", this.usuarioT);
                    formData.append('tipoArchivo', 'hallazgoEvidencia')

                    axios.post("subir_documentos.php", formData, {
                        headers: {
                            "Content-Type": "multipart/form-data"
                        }
                    }).then(response => {
                        console.log(response.data);
                        if (this.cual_documento == "evidencia_hallazgo") {
                            this.filedoc = response.data;
                            this.filedocUpdate = this.filedoc.length;
                            if (this.filedoc.length > 0) {
                                this.myModal.hide()
                                document.getElementById("input_file_subir").value = ""
                                alert(this.filedoc.length + " archivo/s se han subido.")
                                this.buscarDocumentos()
                                this.consultar_hallazgos_concentrado()
                            } else {
                                alert("Verifique la extension del archivo o Intente nuevamente.")
                            }
                        }
                    }).catch(error => {
                        console.log(error);
                    });
                },
                eliminarDocumento(ruta) {
                    if (!confirm("Desea eliminar el Documento ¿Esta seguro?")) {
                        return true
                    }

                    axios.put("eliminar_documento.php", {
                        ruta_eliminar: ruta,
                        folio_carpeta_doc: this.folio_carpeta_doc,
                        id_concentrado: this.id_concentrado,
                        cual_documento: this.cual_documento,
                        cantidad: this.cantidadDOCFILE - 1
                    }).then(response => {
                        if (response.data == "Archivo Eliminado") {
                            this.buscarDocumentos()
                            this.consultar_hallazgos_concentrado()
                            this.myModal.hide();
                            alert("Archivo/Documento Eliminado con Éxito")
                        } else if (response.data == "No Eliminado") {
                            alert("Algo no salio bien no se logro Eliminar.")
                        } else {
                            console.log('mostrar', response.data)
                            alert("Error al eliminar el Documento.")
                        }
                    }).catch(error => {
                        console.log("error 500" + error)
                    })
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