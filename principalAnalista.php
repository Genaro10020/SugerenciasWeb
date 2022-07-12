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
               
                            <button class="opciones mx-lg-2 rounded-3 " @click="mostrar('principalAnalista')"  v-bind:class="{pintarUno}" >
                               Impacto de Sugerencias
                            </button>  
                            <!--<button class="opciones  mx-lg-2 rounded-3" @click="mostrar('concentrado')" v-bind:class="{pintarDos}">
                                Concentrado de sugerencias
                            </button>-->  

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
                            <!-- contenido principal gonher-->
                          <div class="row">  
                                <div class="col-6 col-">
                                            <div class="text-center mt-3 ">
                                                <span class="badge bg-light text-dark">Sugerencias Pendientes de Factibilidad: <?php echo $_SESSION['usuario']; ?></span>
                                            </div>
                                            <div class="div-scroll mt-3">
                                                <table class="tablaMonitoreo-sugerencias table table-striped table-bordered ">
                                                <thead class="encabezado-tabla text-center text-light ">
                                                    <tr >
                                                    <th scope="col " class="sticky">#</th>
                                                    <th scope="col">Folio</th>
                                                    <th scope="col">Nombre de Sugerencia</th>
                                                    <th scope="col">Fecha de Inicio</th>
                                                    <th scope="col">Fecha Limite</th>
                                                    <th scope="col">Status de Factibilidad</th>
                                                    
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(concentrado, index) in concentrado_sugerencias">
                                                    <th scope="row" class="text-center">{{index+1}}</th>
                                                        <td>{{concentrado.folio}}</td>
                                                        <td>{{concentrado.nombre_sugerencia}}</td>
                                                        <td>{{concentrado.fecha_de_inicio}}</td>
                                                        <td>CALCULAR EN AUTOMATICO 7 DIAS</td>
                                                        <td>{{concentrado.status}}</td>
                                                      
                                                    </tr>
                                                </tbody>
                                                </table>
                                            </div>
                                 </div>
                                 <div class="col-6">
                                            <div class="text-center mt-3 ">
                                                <span class="badge bg-light text-dark">Sugerencias Pendientes de Implementación: <?php echo $_SESSION['usuario']; ?></span>
                                            </div>
                                            <div class="div-scroll mt-3">
                                                <table class="tablaMonitoreo-sugerencias table table-striped table-bordered ">
                                                <thead class="encabezado-tabla text-center text-light ">
                                                    <tr >
                                                    <th scope="col " class="sticky">#</th>
                                                    <th scope="col">Folio</th>
                                                    <th scope="col">Nombre de Sugerencia</th>
                                                    <th scope="col">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(concentrado, index) in concentrado_sugerencias">
                                                    <th scope="row" class="text-center">{{index+1}}</th>
                                                        <td>{{concentrado.folio}}</td>
                                                        <td>{{concentrado.nombre_sugerencia}}</td>
                                                        <td>{{concentrado.cumplimiento}}</td>
                                                    </tr>
                                                </tbody>
                                                </table>
                                            </div>
                                 </div>
                            </div>
                             <!--fin contenido principal gonher-->
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
                pintarTres:false,
                pintarCuatro:false,
                pintarCinco: false,
                contador: 0,
                concentrado_sugerencias:[],
            }
        },
        mounted(){
            //Consultado concentrado de sugerencias.
            this.consultado_concentrado(),
             //Consultado usuarios.
            this.consultando_usuarios()
        },
        methods:{
            mostrar(dato){
                   this.ventana=dato;
                   if(dato=='principalAnalista'){ this.pintarUno=true}else{this.pintarUno=false}
                   if(dato=='concentrado'){this.pintarDos=true}else{this.pintarDos=false}
                   if(dato=='premios'){ this.pintarTres=true}else{this.pintarTres=false}
                   if(dato=='retos'){this.pintarCuatro=true}else{this.pintarCuatro=false}
                   if(dato=='configuracion'){this.pintarCinco=true}else{this.pintarCinco=false}
             },
            consultado_concentrado(){
                axios.post('consulta_concentrado_sugerencias.php',{
                            }).then(response =>{
                                this.concentrado_sugerencias = response.data
                               // console.log(this.concentrado_sugerencias);
                            })
            },
            consultando_usuarios(){
                axios.post('consulta_usuario.php',{
                usuario: this.usuario
                }).then(response =>{
                    this.usuario = response.data.nombre
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