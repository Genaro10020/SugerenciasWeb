<?php
session_start();
if ($_SESSION["usuario"] && $_SESSION["tipo"]=="Colaborador"){ 
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
    <link href="https://fonts.googleapis.com/css2?family=Patua+One&display=swap" rel="stylesheet">
    <!--Subtitulos-->
    <link href="https://fonts.googleapis.com/css2?family=Stint+Ultra+Condensed&display=swap" rel="stylesheet" rel="stylesheet"> 
    <!--Contenido-->
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet"> 
    <!--Incluyendo Estilo-->
    <link rel="stylesheet" type="text/css"  href="estilos/miestilo.css">
    <!--Iconos boostrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>Sugerencias</title>
</head>
    <body>
    <style>
        

            
            .titulo{
                    color: white; 
                    font-family: 'Fjalla One', sans-serif;

                }
            .subtitulo{
                
                font-family: 'Stint Ultra Condensed', cursive;

            }    
            .btn_principal_coloborador{
                border-radius:100px;
                height:50px;
                width:50px;
                box-shadow: 0px 0px 2px black;
                background-color: rgb(158, 0, 0);
                
            }
            .btn_principal_coloborador:hover{
                border-radius:100px;
                height:50px;
                width:50px;
                box-shadow: 0px 0px 10px rgb(0, 0, 0);
                background-color: rgb(35, 54, 226);
            }
            .folio{
                color:blue;
                cursor: pointer;
            }
            .folio:hover{
                color:purple;
                cursor: pointer;
            }
           
           /* #opciones{
                box-shadow: 0px 2px 10px black;
                background-color:#fda4a4
            }

            #opciones:hover{
                    background-color: #901313;
                    color: white;
            }*/

            .div_susperior{
            background: rgb(255,255,255);
            background: linear-gradient(140deg, rgba(255,255,255,1) 24%, rgba(181,0,0,1) 24%, rgba(181,0,0,1) 76%, rgba(255,255,255,1) 76%); 
            }

            textarea[type]:focus,input[type]:focus, button[type]:focus {
            border: 2px solid;    
            border-color: rgb(137, 0, 0);
            /*box-shadow: 0 0px 0px rgba(0, 133, 180, 1)inset, 0 0 4px rgba( 187, 16, 16, 1);*/
            outline: 0 none;
            } 
    </style>        
        <div id="app" class="container-fluid  " ><!--BODY-->
                <!--BARRA SUPERIOR-->
                    <div class="row  d-flex justify-content-around align-items-center" style="height:10vh; background-color: rgba(181,0,0,1); box-shadow: 0px 0px 12px -2px black;" >
                            <div class="row align-items-center bg-white"  >
                            <!--style="box-shadow: 0px 0px 10px -2px black"-->
                                <div class="col-2 d-flex align-items-center rounded-end" style=" height:45.8833px;"><img class="img-fluid" src="img/logo_gonher.png"></img></div>
                                    <div class="col-8 d-flex align-items-center justify-content-center">
                                                <div>
                                                    <div class="titulo lh-1 mt-3 text-dark fs-1 fw-bold text-center">Mis sugerencias</div>
                                                    <div class="subtitulo fs-5 lh-1  text-center mt-1 text-secondary mb-3" >Genaro Villanueva Pérez</div>
                                                </div>
                                    </div>
                                <div class=" col-2 d-flex align-items-center rounded-start" style="height:45.8833px"><img class="img-fluid ms-2" src="img/logo_mejora_continua.png"></img></div>
                            </div>
                    </div>
                    <!--CUERPO-->
                    <div class="row justify-content-center" style="min-height:85vh">
                                <div v-if="seguimiento==false">
                                        <div class="div-scroll-vertial"><!--scroll-->
                                            <table class="table table-striped mt-3" style=" font-family :Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">
                                            <thead >
                                                <tr style=" background:rgb(137, 0, 0); height:5px; color:white">
                                                    <th scope="col">#</th>
                                                    <th scope="col">Folio</th>
                                                    <th scope="col">Descripcion</th>
                                                </tr>
                                            </thead>
                                                <tbody>
                                                    <tr v-for="(concentrado, index) in concentrado_sugerencias" style=" font-size: 0.8em;">
                                                        <td>{{index+1}}</td>
                                                        <td><label class="folio fst-italic" @click="seguimiento=true"><b>{{concentrado.folio}}</b></label></td>
                                                        <td>{{concentrado.nombre_sugerencia}}</td>
                                                    </tr>
                                                </tbody>
                                                </table>
                                        </div><!--scroll-->
                                </div>    
                                <!--Seguimiento-->
                                 <div v-else>
                                        <div class="div-scroll-vertial"><!--scroll-->
                                                <div class=" d-flex flex-column mb-3 mt-3 text-center">
                                                    <div class="col-12 col-lg-4 offset-lg-4  fw-bold" style=" background:#efefef">Folio</div>
                                                    <div class="col-12 col-lg-4 offset-lg-4" style=" font-family :Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">Flex item 2</div>
                                                    <div class="col-12 col-lg-4 offset-lg-4  fw-bold" style=" background:#efefef">Descripción</div>
                                                    <div class="col-12 col-lg-4 offset-lg-4"  style=" font-family :Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">Flex item 3</div>
                                                    <div class="col-12 col-lg-4 offset-lg-4  fw-bold" style=" background:#efefef">Analista de Factibilidad</div>
                                                    <div class="col-12 col-lg-4 offset-lg-4"  style=" font-family :Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">Flex item 3</div>
                                                    <div class="col-12 col-lg-4 offset-lg-4  p-1 fw-bold" style=" background:#053b78; color:white">Seguimiento</div>
                                                            <div>
                                                                    <div class="col-12 col-lg-4 offset-lg-4  p-1 bg-danger fw-bold" style="color:white">No Factible</div>
                                                                    <div class="col-12 col-lg-4 offset-lg-4  mt-2 fw-bold">Causa de No Factibilidad:</div>
                                                                    <div class="col-12 col-lg-4 offset-lg-4  p-1 ">
                                                                            <textarea class="form-control"  style="height: 100%" disabled></textarea>
                                                                    </div>
                                                            </div>
                                                            <div>
                                                                    <div class=" d-flex justify-content-center mb-1">
                                                                        <div class="col-4 col-sm-4 col-lg-1  d-flex justify-content-center">
                                                                            <div class="rounded-pill  d-flex align-items-center justify-content-center" style=" height:50px; width: 50px; background: linear-gradient(to bottom, #b5bdc8 0%,#828c95 36%,#28343b 100%);"><img src="img/app_listo.png" style=" height:50px; width:50px"> </img></div>
                                                                        </div>
                                                                        <div class="col-8 col-sm-8 col-lg-3  d-flex">
                                                                            <input type="text" class="form-control me-1" disabled>
                                                                        </div>
                                                                    </div>

                                                                    <div class=" d-flex justify-content-center  mb-1">
                                                                        <div class="col-4 col-sm-4 col-lg-1  d-flex justify-content-center">
                                                                            <div class="rounded-pill bg-secondary d-flex align-items-center justify-content-center" style=" height:50px; width: 50px;  background: linear-gradient(to bottom, #b5bdc8 0%,#828c95 36%,#28343b 100%);"><img src="img/app_listo.png" style=" height:50px; width:50px"> </img> </div>
                                                                        </div>
                                                                        <div class="col-8 col-sm-8 col-lg-3  d-flex">
                                                                            <input type="text" class="form-control me-1" disabled>
                                                                        </div>
                                                                    </div>

                                                                     <div class=" d-flex justify-content-center  mb-1">
                                                                        <div class="col-4 col-sm-4 col-lg-1  d-flex justify-content-center">
                                                                            <div class="rounded-pill bg-secondary d-flex align-items-center justify-content-center" style=" height:50px; width: 50px;  background: linear-gradient(to bottom, #b5bdc8 0%,#828c95 36%,#28343b 100%);"><img src="img/app_listo.png" style=" height:50px; width:50px"> </img> </div>
                                                                        </div>
                                                                        <div class="col-8 col-sm-8 col-lg-3  d-flex">
                                                                            <input type="text" class="form-control me-1" disabled>
                                                                        </div>
                                                                    </div>

                                                                    <div class=" d-flex justify-content-center  mb-1">
                                                                        <div class="col-4 col-sm-4 col-lg-1  d-flex justify-content-center">
                                                                            <div class="rounded-pill bg-secondary d-flex align-items-center justify-content-center" style=" height:50px; width: 50px;  background: linear-gradient(to bottom, #b5bdc8 0%,#828c95 36%,#28343b 100%);"><img src="img/app_listo.png" style=" height:50px; width:50px"> </img> </div>
                                                                        </div>
                                                                        <div class="col-8 col-sm-8 col-lg-3  d-flex">
                                                                            <input type="text" class="form-control me-1" disabled>
                                                                        </div>
                                                                    </div>

                                                                    <div class=" d-flex justify-content-center  mb-1 text-white">
                                                                        <div class="col-6 col-sm-6 col-lg-2  d-flex justify-content-center p-3" style=" background:#053b78; color:white"> 
                                                                            <b>Status:</b>
                                                                        </div>
                                                                        <div class="col-6 col-sm-6 col-lg-2  d-flex justify-content-center bg-primary p-3">
                                                                            Status
                                                                        </div>
                                                                    </div>
                                                            </div>


                                                    <div class="col-12 col-lg-4 offset-lg-4  p-2 fw-bold">Puntos Asignados</div>
                                                    <div class="col-12 col-lg-4 offset-lg-4  p-2 "><input type="text" class="form-control" disabled></div>      
                                                            
                                                    
                                                </div>
                                        </div>
                                 </div>   
                                 <div class="col-12 col-lg-4 d-flex align-items-end justify-content-center" >
                                                    <div id="opciones" style="width: 18rem;" class=" d-flex align-items-center justify-content-center " >
                                                        <div class="row text-center mb-2 d-flex justify-content-center align-items-center">
                                                                <div v-if="seguimiento==false" @click="redireccionar('Atras')" class="btn_principal_coloborador text-center col-12 d-flex align-items-center justify-content-center"> 
                                                                    <div> <img src="img/app_atras.png" class="img-fluid" alt="..." style=" width: 50px;" ></div>
                                                                </div>   
                                                                <div v-else @click="seguimiento=false" class="btn_principal_coloborador text-center col-12 d-flex align-items-center justify-content-center"> 
                                                                    <div> <img src="img/app_atras.png" class="img-fluid" alt="..." style=" width: 50px;" ></div>
                                                                </div>        
                                                        </div>
                                                    </div>
                                        </div> 
                    </div><!--FIN CUERPO-->
                            <!--FOOTER-->
                    <div class="row" style="height:5vh; background-color: rgba(181,0,0,1); box-shadow: 0px 0px 12px -2px black;">
                    </div><!--FIN FOOTER-->
        </div>  <!--FIN DIV CONTENEDOR-->  
</body>

<script>
    const vue3 = 
    {
        data(){
            return {
                concentrado_sugerencias:[],
                seguimiento:false
            }
        },
        mounted(){
            this.concentrado_sugerencias_colaborador()
            
        },
        methods:{
            concentrado_sugerencias_colaborador(){
                axios.post('consulta_concentrado_sugerencias_colaborador.php',{
                            }).then(response =>{
                                console.log(response.data)
                                this.concentrado_sugerencias = response.data
                            })
            },
            redireccionar(opciones){
                if(opciones=='Sugerencias'){
                    window.location.href=""
                }
                if(opciones=='Atras'){
                    window.location.href="principalColaborador.php"
                }
               
            }
        }
    }
    var mountedApp = Vue.createApp(vue3).mount('#app');
</script>
</html>        
    <?php
}else{
    header("Location: index.php");
}
?>