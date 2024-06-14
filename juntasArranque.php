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
        <link rel="stylesheet" type="text/css" href="estilos/miestilo.css?v=1.0">
        <!--Iconos boostrap-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <title>Sugerencias</title>
    </head>

    <body>
        <style>
            /*  #app{
                 font-family: 'Andika', sans-serif;
                
            }*/
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

            .div_susperior {
                background: rgb(255, 255, 255);
                background: linear-gradient(140deg, rgba(255, 255, 255, 1) 24%, rgba(181, 0, 0, 1) 24%, rgba(181, 0, 0, 1) 76%, rgba(255, 255, 255, 1) 76%);
            }


            textarea[type]:focus,
            input[type]:focus,
            button[type]:focus {
                border: 2px solid;
                border-color: rgb(137, 0, 0);
                /*box-shadow: 0 0px 0px rgba(0, 133, 180, 1)inset, 0 0 4px rgba( 187, 16, 16, 1);*/
                outline: 0 none;
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
                            <div class="titulo lh-1 mt-3 text-dark fs-2 fw-bold text-center">EAD</div>
                            <div class="subtitulo fs-5 lh-1  text-center mt-1 text-secondary mb-3 "><?php echo $_SESSION['nombre']; ?></div>
                        </div>
                    </div>
                    <div class=" col-2 d-flex align-items-center rounded-start" style="height:45.8833px"><img class="img-fluid ms-2" style="max-height:80px" src="img/logo_opex.jpg"></img></div>
                </div>
            </div>
            <!--CUERPO-->
            <div class="row cuerpo" style="min-height:80vh; font-size: 1em">
                <div class="col-12 d-flex justify-content-center">
                    <div class="col-10 col-sm-8 col-lg-4 col-xl-3 text-center align-self-center rounded shadow" style=" background-color:#eaeaea;">
                        <div class="col-12 p-3 rounded-1" style=" background-color:#eaeaea"><b>Junta de Arraque</b></div>
                        <div class="col-12 d-flex">
                            <div class="col-6">
                                <i class="bi bi-hourglass-top"></i><label><b>Hora Inicia:</b> <span class="badge rounded-pill bg-primary">{{hora_inicial}}</span><label>
                            </div>
                            <div class="col-6">
                                <i class="bi bi-hourglass-bottom"></i><label><b>Hora Final:</b> <span class="badge rounded-pill bg-primary">{{hora_final}}</span><label>
                            </div>
                        </div>
                        <div class="col h-25 p-3" style="font-size:0.8em">

                            <ul class="text-start">
                                <li v-for="(tema,index) in temas" class="mb-2" style="margin-bottom: 2px; ">
                                    <input v-model="temasCheck[index]" class="me-3" type="checkbox" :disabled="temasCheck[index]==true" />
                                    {{index+1}}.- {{tema.tema}}
                                </li>
                            </ul>
                            <label><b>{{datosEquipo.nombre_ead}}</b></label><br>
                            <label><b>Integrantes</b></label>
                            <ul class="text-start">
                                <br>
                                <li v-for="(integrante,index) in integrantesEAD" style="margin-bottom: 2px;">
                                    <input class="me-2" v-model="asistieron" :value="integrante.id" type="checkbox" />
                                    {{index+1}}.- {{integrante.colaborador}}
                                </li>
                            </ul>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div v-if="hora_inicial==''" class="rounded-circle bg-success d-flex justify-content-center align-items-center shadow p-5  mb-3 text-white" @click="tomarFechaActual()" style="width: 25px; height: 25px; cursor:pointer">
                                <b>Iniciar Junta</b>
                            </div>
                            <div v-else class="rounded-circle bg-warning  shadow p-5 mb-3 d-flex justify-content-center align-items-center flex-column" @click="guardarJunta()" style="width: 100px; height: 100px; cursor: pointer;">
                                <span><b>{{this.tiempo_transcurrido}}</b></span>
                                <span style="font-size:1.5em;"><b>Finalizar</b></span>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center">
                            <button v-if="hora_inicial" type="button" class="btn_cancelar col-12 rounded-pill text-center p-2 text-white border-0 w-25 mb-3" @click="limpiar()">
                                <i class="bi bi-stopwatch-fill"></i> Reiniciar
                            </button>
                        </div>
                        <?php if(isset($_GET['app'])){
                        ?>
                                <div v-if="existeJuntaYSinFoto=='Junta y Sin Foto'" class="col-12 " style="margin-top:10%">     
                                    <div class="col-12 offset-lg-4 col-lg-4 d-flex justify-content-center">
                                        <a href="ejecutarCamaraMovil.php" class="btn_photo"> <img src="img/photo.png" class="img-responsive" width="50"/></a>
                                    </div>
                                    <div class="col-12 offset-lg-4 col-lg-4 d-flex justify-content-center">
                                        <label class="alert alert-info mt-1" style="font-size:0.8em">Fotografía pendiente del día {{hoy}}</label>
                                    </div>
                                </div>      
                        <?php
                        }else{
                            ?>
                                <div v-if="numero_nomina=='65799' || movil!='true'">
                                    <!--<button @click="activarCamara">Activar Cámara (En desarrollo)</button>
                                    <button @click="capturarImagen">Capturar Imagen</button>
                                    <video ref="video" autoplay></video>-->
                                </div>
                            <?php
                            }
                        ?>
                        <div v-show="mostrar" class="alert alert-warning" role="alert">
                            <b class="alert-link">{{mensaje}}</b>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-12 d-flex align-items-end justify-content-center">
                    <div id="opciones" style="width: 18rem;" class=" d-flex align-items-center justify-content-center my-2">
                        <div class="row text-center mb-2 d-flex justify-content-center align-items-center">
                            <div @click="redireccionar('Atras')" class="btn_principal_coloborador text-center col-12 d-flex align-items-center justify-content-center" style="cursor: pointer">
                                <div> <img src="img/app_atras.png" class="img-fluid" alt="..." style=" width: 50px;"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!--FIN CUERPO-->
            <!--FOOTER-->
            <div class="row" style="height:10vh; background-color: rgba(181,0,0,1); box-shadow: 0px 0px 12px -2px black;">
            </div><!--FIN FOOTER-->
        </div> <!--FIN DIV CONTENEDOR-->
    </body>



    <script>

        const vue3 = {
            data() {
                return {
                    mostrar: false,
                    mensaje: '',
                    numero_nomina: <?php echo $_SESSION['usuario']; ?>,
                    id_ead: <?php echo $_SESSION['id_ead']; ?>,
                    temas: [],
                    datosEquipo: [],
                    integrantesEAD: [],
                    juntas_arraque: [],
                    asistieron: [],
                    temasCheck: [],
                    hora_inicial: '',
                    hora_final: '',
                    tiempo_transcurrido: '',
                    mostarBtn: false,
                    fotografia: null,
                    movil:'',
                    existeJuntaYSinFoto:'Sin junta',
                    hoy:'',
                }
            },
            mounted() {
                this.consultarEAD()
                this.consultarTemas()
                this.consultarJuntasDeArranque()
            },
            methods: {
               
                redireccionar(opciones) {
                    if (opciones == 'Atras') {
                        window.location.href = "principalColaborador.php"
                    }
                },
                consultarEAD() {
                    
                   
                    axios.get('consultar_ead.php', {}).then(response => {
                        if (response.data[0] == true) {
                            this.integrantesEAD = response.data[1]
                            this.asistieron = response.data[1].map(integrante => integrante.id)
                            this.datosEquipo = response.data[2]
                        } else {
                            console.log("Algo salio mal en consulta", response.data)
                        }
                    }).catch(error => {
                        console.log('Error en axios', error)
                    })
                },
                consultarTemas() {
                    axios.get('consultar_temas.php', {}).then(response => {
                        if (response.data[0] == true) {
                            this.temas = response.data[1]
                        } else {
                            console.log("Algo salio mal en consulta", response.data)
                        }

                    }).catch(error => {
                        console.log('Error en axios', error)
                    })
                },
                consultarJuntasDeArranque(){
                    this.movil=<?php echo isset($_GET['app']) ? 'true' : 'false'; ?>;
                    axios.get('consultar_juntas_arranque.php',{
                        params: {
                            id_ead:this.id_ead
                        }
                    }).then(response =>{
                       
                        if(response.data[0]==true){
                            this.juntas_arraque = response.data[1];
                            var juntas = this.juntas_arraque
                            const fecha_actual = new Date().toISOString().slice(0, 10); // formato "YYYY-MM-DD"
                            this.hoy = fecha_actual;
                            const existeFecha = juntas.some(item => {
                            const fechaItem = new Date(item.hora_inicial).toISOString().slice(0, 10);
                            console.log(fechaItem + "==" + fecha_actual);
                            return fechaItem === fecha_actual;
                            });

                            if (existeFecha==false) {
                                this.existeJuntaYSinFoto = "Sin Junta";
                            } else {
                                const existeFechaYFotografia = juntas.some(item => {
                                const fechaItem = new Date(item.hora_inicial).toISOString().slice(0, 10);
                                return fechaItem === fecha_actual && item.fotografia === "Si";
                                });
                                
                                if (existeFechaYFotografia==true) {
                                    this.existeJuntaYSinFoto = "Junta y Foto";
                                } else {
                                    this.existeJuntaYSinFoto = "Junta y Sin Foto";
                                }
                            }
                        }else{
                            console.log("No se logro la consulta en juntas de arranque")
                        }
                        console.log(this.existeJuntaYSinFoto)
                    }).catch({

                    })
                },
                tomarFechaActual() {
                    var fecha = new Date();
                    var anio = fecha.getFullYear();
                    var mes = fecha.getMonth() + 1; // Se suma 1 porque los meses comienzan en 0
                    var dia = fecha.getDate();

                    var fecha = new Date();
                    var hora = fecha.getHours();
                    var minutos = fecha.getMinutes();
                    var segundos = fecha.getSeconds();

                    if (this.tiempo_transcurrido != '') {
                        return
                    }
                    this.hora_inicial = anio + "-" + mes + "-" + dia + " " + hora + ":" + minutos + ":" + segundos
                    console.log('Iniciar', this.hora_inicial)
                    // Iniciar temporizador
                    this.temporizador = setInterval(() => {
                        // Obtener la fecha actual
                        var fecha_actual = new Date();
                        var hora_actual = fecha_actual.getHours();
                        var minutos_actual = fecha_actual.getMinutes();
                        var segundos_actual = fecha_actual.getSeconds();

                        // Calcular el tiempo transcurrido
                        var segundos_transcurridos = segundos_actual - segundos;
                        if (segundos_transcurridos < 0) {
                            segundos_transcurridos += 60;
                            minutos_actual--;
                        }
                        var minutos_transcurridos = minutos_actual - minutos;
                        if (minutos_transcurridos < 0) {
                            minutos_transcurridos += 60;
                            hora_actual--;
                        }
                        var horas_transcurridas = hora_actual - hora;

                        // Mostrar el tiempo transcurrido
                        this.tiempo_transcurrido = horas_transcurridas + ":" + minutos_transcurridos + ":" + segundos_transcurridos;
                        console.log('Tiempo transcurrido', this.tiempo_transcurrido);
                    }, 1000);
                    // Fin temporizador


                },
                activarCamara() {
                    // Verifica si el atributo es nulo
                    if (video.getAttribute("ref") === null) {
                        video.style.display = "none"; // Si es nulo oculta el video
                    } else {
                        video.style.display = "block";
                    }
                    navigator.mediaDevices.getUserMedia({
                        video: true
                    }).then(stream => {
                        this.$refs.video.srcObject = stream;
                    }).catch(error => {
                        console.error('Error al acceder a la cámara:', error);
                    });
                },
                capturarImagen() {
                    const canvas = document.createElement('canvas');
                    const video = this.$refs.video;
                    canvas.width = video.videoWidth;
                    canvas.height = video.videoHeight;
                    const ctx = canvas.getContext('2d');
                    ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
                    // Agregar el canvas al DOM
                    document.body.appendChild(canvas);
                    const dataURL = canvas.toDataURL('image/png');
                    // Convertir el canvas a un Blob
                    let formData = new FormData();
                    formData.append("imagen", dataURL);
                    formData.append("id_ead", this.id_ead);
                    // Luego puedes enviar this.fotografia por Axios como un archivo
                    axios.post("guardarFotografia.php", formData, {
                        headers: {
                            "Content-Type": "multipart/form-data"
                        }
                    }).then(response => {
                        this.mostrar = true
                        this.mensaje = 'Éxito' + response.data;
                        setTimeout(() => {
                            this.mostrar = false
                            this.mensaje = ''
                        }, 5000);

                    }).catch(error => {
                        this.mostrar = true
                        this.mensaje = 'Error' + response.data;
                        setTimeout(() => {
                            this.mostrar = false
                            this.mensaje = ''
                        }, 5000);
                    });
                },

                guardarJunta() {
                    if (this.temasCheck != '') { // verifico que seleccione minimo un tema
                        var todosTrue = this.temasCheck.every(numero => numero == true) // busco que todos sean true
                        if (todosTrue && this.temasCheck.length == this.temas.length) { // si son true pero el check temas tiene el mismo tamaño continuan y guarda
                            clearInterval(this.temporizador); // Detener temporizador
                            //tomando fechas
                            var fecha = new Date();
                            var anio = fecha.getFullYear();
                            var mes = fecha.getMonth() + 1; // Se suma 1 porque los meses comienzan en 0
                            var dia = fecha.getDate();

                            var fecha = new Date();
                            var hora = fecha.getHours();
                            var minutos = fecha.getMinutes();
                            var segundos = fecha.getSeconds();
                            this.hora_final = anio + "-" + mes + "-" + dia + " " + hora + ":" + minutos + ":" + segundos
                            //tomando fechas
                            var porcentaje = (this.asistieron.length / this.integrantesEAD.length) * 100; //asistencia;
                            porcentaje = parseFloat(porcentaje.toFixed(2));
                            axios.post('guardar_junta_arranque.php', {
                                nombre_ead: this.datosEquipo.nombre_ead,
                                ids_integrantes: this.datosEquipo.integrantes,
                                ids_asistentes: this.asistieron,
                                asistencia: porcentaje,
                                hora_inicial: this.hora_inicial,
                                hora_final: this.hora_final,
                                tiempo_transcurrido: this.tiempo_transcurrido,
                            }).then(response => {
                                if (response.data == true) {
                                    this.hora_inicial = ''
                                    this.hora_final = ''
                                    this.tiempo_transcurrido = ''
                                    this.mostarBtn = false
                                    this.temasCheck = []
                                    this.mostrar = true
                                    this.mensaje = 'Guardada con Éxito';
                                    //this.consultarJuntasDeArranque()
                                    this.ejecutarCamaraMovil()
                                    /*setTimeout(() => {
                                        this.mostrar = false
                                        this.mensaje = ''
                                    }, 10000);*/
                                } else {
                                    this.mostrar = true
                                    this.mensaje = 'Algo salió mal, si persiste el problema reportarlo con Mejora Continua';
                                    setTimeout(() => {
                                        this.mostrar = false
                                        this.mensaje = ''
                                    }, 5000);
                                }
                            }).catch(error => {
                                console.log('Error', error);
                            })
                        } else {
                            this.mostrar = true
                            this.mensaje = 'Todos los puntos deben estar seleccionados';
                            setTimeout(() => {
                                this.mostrar = false
                                this.mensaje = ''
                            }, 5000);
                        }
                    } else {
                        this.mostrar = true
                        this.mensaje = 'No ha seleccionado ningún tema.';
                        setTimeout(() => {
                            this.mostrar = false
                            this.mensaje = ''
                        }, 5000);
                    }
                },
                limpiar() {
                    clearInterval(this.temporizador);
                    this.hora_inicial = ''
                    this.hora_final = ''
                    this.tiempo_transcurrido = ''
                    this.mostarBtn = false
                    this.temasCheck = []
                    this.mostrar = false
                    this.mensaje = ''
                },
                ejecutarCamaraMovil(){
                    console.log("valor movil:",this.movil);
                        if (this.movil) {
                        window.location.href = "ejecutarCamaraMovil.php";
                        } else {
                        console.log("No es movil");
                        }
                    
                }

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