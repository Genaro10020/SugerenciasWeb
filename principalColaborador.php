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
    <link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet"> 
    <!--Subtitulos-->
    <link href="https://fonts.googleapis.com/css2?family=Stint+Ultra+Condensed&display=swap" rel="stylesheet" rel="stylesheet"> 
    <!--Contenido-->
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Lexend+Zetta:wght@300&family=Stint+Ultra+Condensed&display=swap" rel="stylesheet">
    <!--Incluyendo Estilo-->
    <link rel="stylesheet" type="text/css"  href="estilos/miestilo.css">
    <!--Iconos boostrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>Sugerencias</title>
</head>
    <body>
    <style>
        

            #app{
                font-family: 'Handlee', cursive;
            }
            .titulo{
                   /* font-family: 'Luckiest Guy', cursive;
                   font-family: 'Lexend Zetta', sans-serif;*/
                    color: white; 

                    font-family: 'Stint Ultra Condensed', cursive;
              
                    /*text-shadow: 0px 0px 2px black;*/
                    /* -webkit-text-stroke: 1px black;*/
                }
            .subtitulo{
                font-family: 'Stint Ultra Condensed', cursive;
                /*font-family: 'Fredoka', sans-serif;*/
                /*font-family: 'Advent Pro', sans-serif;*/
            }    
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
                    <div class="row  d-flex justify-content-around align-items-center" style="height:10vh; background-color: rgba(181,0,0,1); box-shadow: 0px 0px 30px -2px rgba(181,0,0,1);" >
                            <div class="row align-items-center bg-white"  >
                            <!--style="box-shadow: 0px 0px 10px -2px black"-->
                                <div class="col-2 d-flex align-items-center rounded-end" style=" height:45.8833px;"><img class="img-fluid" src="img/logo_gonher.png"></img></div>
                                    <div class="col-8" style="">
                                                <div class=" inline-block">
                                                    <div class="titulo fs-1 lh-1 text-danger  text-center">Bienvenido</div>
                                                    <div class="subtitulo fs-5 lh-1 text-danger text-center mt-1" >Genaro Villanueva Pérez</div>
                                                </div>
                                    </div>
                                <div class="col-2 d-flex align-items-center rounded-start" style="height:45.8833px"><img class="img-fluid ms-2" src="img/logo_mejora_continua.png"></img></div>
                            </div>
                    </div>
                    <!--CUERPO-->
                    <div class="row" style="min-height:80vh">
                        <div class="col-6  d-flex align-items-center" >
                                    <div style="width: 18rem;" class=" d-flex align-items-center bg-danger rounded-3">
                                        <div class="inline-block text-center mb-2">
                                                <label class="card-text mt-2 text-white">1.- Mis Sugerencias.</label>
                                                <img src="img/app_sugerencia.png" class="img-fluid" alt="..." width="100px">
                                        </div>
                                     </div>
                        </div>
                        <div class="col-6  d-flex align-items-center" >
                                    <div style="width: 18rem; background-color:#f05545" class=" d-flex align-items-center rounded-3" >
                                        <div class="inline-block text-center mb-2">
                                                <label class="card-text mt-2 text-white">1.- Canjear Premio.</label>
                                                <img src="img/app_premio.png" class="img-fluid" alt="..." width="100px">
                                        </div>
                                     </div>
                        </div>
                        <div class="col-6  d-flex align-items-center" >
                                    <div style="width: 18rem; background-color:#f05545" class=" d-flex align-items-center rounded-3" >
                                        <div class="inline-block text-center mb-2">
                                                <label class="card-text mt-2 text-white">3.- Status Premio.</label>
                                                <img src="img/app_status.png" class="img-fluid" alt="..." width="100px">
                                        </div>
                                     </div>
                        </div>
                        <div class="col-6  d-flex align-items-center" >
                                    <div style="width: 18rem;" class=" d-flex align-items-center rounded-3 bg-danger" >
                                        <div class="inline-block text-center mb-2">
                                                <label class="card-text mt-2 text-white">4.- Retos.</label>
                                                <img src="img/app_retos.png" class="img-fluid" alt="..." width="100px">
                                        </div>
                                     </div>
                        </div>
                        
                        <div class="col-6 bg-danger"><div>5.- Cambio de Contraseña.</div></div>
                        <div class="col-6" style=" background-color:#f05545"><div>6.- Encuesta App.</div></div>
                        <div class="col-12 bg-danger"><div>7.- Cerrar Sesión.</div></div>
                    </div><!--FIN CUERPO-->
                            <!--FOOTER-->
                    <div class="row" style="height:10vh; background-color: rgba(181,0,0,1); box-shadow: 0px 0px 15px -2px rgba(181,0,0,1);">
                    </div><!--FIN FOOTER-->

        </div>  <!--FIN DIV CONTENEDOR-->  
</body>
</html>        
    <?php
}else{
    header("Location: index.php");
}
?>