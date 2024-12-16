<?php
session_start();
if ($_SESSION["usuario"] && $_SESSION["tipo"] == "Colaborador") {
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
        <link rel="stylesheet" type="text/css" href="estilos/miestilo.css">
        <!--Iconos boostrap-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
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
            <?php if ($_SESSION["usuario"] == "60083"): ?>
                <div class="text-center pt-3">
                    <button class="btn btn-danger btn-sm me-1" @click="misHallazgos()">
                        Mis Hallazgos
                    </button>
                    <button class="btn btn-danger btn-sm" @click="concentradoHallazgos()">
                        Concentrado
                    </button>
                </div>
            <?php endif; ?>

            <!--APARTADO PARA ENVIAR Y VER HALLAZGOS PROPIOS-->
            <div v-show="bandera_misHallazgosOconcentrado == true" class="row justify-content-center" style="min-height:75vh;">


                <div class="contenedorHallazgo mt-3 pb-2 row justify-content-center">
                    <div class="form-group mb-3">
                        <label for="descripcionHallazgo">Descripción del hallazago:</label>
                        <textarea @keyup="hayTextoHallazgo()" class="form-control" id="descripcionHallazgo" rows="3"></textarea>
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
                                    <option v-for="area in areas_enerya" :value="area">
                                        {{area}}
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div v-if="select_planta=='Riasa'" :disabled="select_planta==''"> <!--areas riasa-->
                            <div class="pt-2"> <!--- AREAS --->
                                <select v-model="select_area" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                    <option value="" disabled>Seleccione Área </option>
                                    <option v-for="area in areas_riasa" :value="area">
                                        {{area}}
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!--boton de enviar-->
                    <div class="d-flex justify-content-center pt-2">
                        <button class="btn btn-success" :disabled="select_tipo=='' || select_planta=='' || select_area == '' || descripcion == false" @click="enviarHallazgo()">
                            enviar
                        </button>
                    </div>
                    <div class=" d-flex justify-content-center">
                        <span v-show="bandera_msj_hallazgo==true" class="badge bg-primary text-white mt-2" style="font-size:10px;">
                            Su hallazgo fue enviado
                        </span>
                    </div>
                </div>

                <div style="height:1em;">

                </div>

                <!-- TABLA DE CONCENTRADO DE HALLAZGOS PROPIOS -->
                <div class="div-scroll-vertial"><!--scroll-->

                    <table v-if="concentrado_hallazgos.length>0" class="table table-striped " style=" font-size: 0.8em;">
                        <thead>
                            <tr style="background:rgb(137, 0, 0); height:5px; color:white; font-size: 1em;">
                                <th scope="col">#</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Descripción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(concentrado, index) in concentrado_hallazgos">
                                <td>{{index+1}}</td>
                                <td>{{concentrado.tipo_hallazgo}} </td>
                                <td>{{concentrado.descripcion_hallazgo}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div v-else class="d-flex  justify-content-center">
                        <span class="alert bg-warning ">No cuenta con hallazgos reportados, esperamos tu participación.</span>
                    </div>
                </div><!--scroll-->

            </div><!--FIN CUERPO-->

            <!-- CONCENTRADO DE HALLAZGOS SOLO PARA EL ADMINISTRADOR -->

            <div v-show="bandera_misHallazgosOconcentrado == false" class="row justify-content-center pt-2" style="min-height:75vh;">

                <!-- TABLA DE CONCENTRADO DE HALLAZGOS PROPIOS -->
                <div class="div-scroll-vertial"><!--scroll-->
                    <table v-if="concentrado_hallazgos.length>0" class="table table-striped" style=" font-size: 0.8em;">
                        <thead>
                            <tr style="background:rgb(137, 0, 0); height:5px; color:white; font-size: 1em;">
                                <th scope="col">#</th>
                                <th scope="col">Colaborador</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Planta</th>
                                <th scope="col">Área</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(concentrado, index) in concentrado_hallazgos">
                                <td>{{index+1}}</td>
                                <td>{{concentrado.colaborador}} </td>
                                <td>{{concentrado.tipo_hallazgo}} </td>
                                <td>{{concentrado.descripcion_hallazgo}}</td>
                                <td>{{concentrado.planta}} </td>
                                <td>{{concentrado.area}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div v-else class="d-flex  justify-content-center">
                        <span class="alert bg-warning ">No existen hallazgos reportados por el momento.</span>
                    </div>
                </div><!--scroll-->


            </div><!--FIN CUERPO-->


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
                    bandera_misHallazgosOconcentrado: true,

                    areas_enerya: [
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
                    ],

                    areas_riasa: [
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
                    ],
                    movil: false,
                    ultimo_id: '',
                }
            },
            mounted() {
                this.consultar_hallazgos()
            },
            methods: {

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

                        this.movil = <?php echo isset($_GET['app']) ? 'true' : 'false'; ?>;
                        alert(this.movil);
                        if (this.movil === true) { //Saber si se guardo desde APP
                            <?php if ($_SESSION['usuario'] == '65799') {
                            ?>
                                this.ultimo_id = response.data.ultimo_id;
                                window.location.href = "ejecutarCamaraMovilSeguridad.php?UltimoID=" + this.ultimo_id;
                            <?php
                            } ?>
                        } else { //Saber si se guardo desde Movil
                            setTimeout(() => {
                                this.bandera_msj_hallazgo = false
                            }, 4000)

                            <?php if ($_SESSION['usuario'] == '65799') {
                            ?>
                                alert("Se guardado desde la Web.")
                            <?php
                            } ?>
                        }
                        this.consultar_hallazgos()

                    })

                },

                consultar_hallazgos() {
                    axios.post('consultar_hallazgos_syma.php', {
                        tipo: 'usuarios'
                    }).then(response => {
                        this.concentrado_hallazgos = response.data
                        console.log(response.data);
                    })
                },

                consultar_hallazgos_concentrado() {
                    axios.post('consultar_hallazgos_syma.php', {
                        tipo: 'admin'
                    }).then(response => {
                        this.concentrado_hallazgos = response.data
                        //console.log('lo que llega es:',response.data);
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
                    this.bandera_misHallazgosOconcentrado = true;
                    this.consultar_hallazgos();
                },

                concentradoHallazgos() {
                    this.bandera_misHallazgosOconcentrado = false;
                    this.consultar_hallazgos_concentrado();
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