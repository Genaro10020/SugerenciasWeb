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
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet"> 
    <!--Subtitulos-->
    <link href="https://fonts.googleapis.com/css2?family=Stint+Ultra+Condensed&display=swap" rel="stylesheet" rel="stylesheet"> 
    <!--Contenido-->
    <link href="https://fonts.googleapis.com/css2?family=Andika&display=swap" rel="stylesheet"> 
    <!--Incluyendo Estilo-->
    <link rel="stylesheet" type="text/css"  href="estilos/miestilo.css">
    <!--Iconos boostrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>Sugerencias</title>
</head>
    <body>
    <style>
        

          /*  #app{
                 font-family: 'Andika', sans-serif;
                
            }*/
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
                                                    <div class="titulo lh-1 mt-3 text-dark fs-2 fw-bold text-center" >Encuesta APP</div>
                                                    <div class="subtitulo fs-5 lh-1  text-center mt-1 text-secondary mb-3 " ><?php echo $_SESSION['nombre']; ?></div>
                                                </div>
                                    </div>
                                <div class=" col-2 d-flex align-items-center rounded-start" style="height:45.8833px"><img class="img-fluid ms-2" src="img/logo_mejora_continua.png"></img></div>
                            </div>
                    </div>
                    <!--CUERPO-->
                    <div class="row"  style="min-height:80vh; font-size: 0.9em" >


                    <div class="row justify-content-center">
                                        <div class="row row-cols-1 text-center mt-2 justify-content-center ">
                                            <div class="col-10 col-sm-8 col-lg-6  col-xl-4" style=" background-color:#eaeaea"><b>NOTA: Selecciona los números del 1 al 5, donde el 1 es Malo y el 5 es Excelente.</b></div>
                                            <div class="col h-25"> 
                                                        <form class="mt-5">
                                                            <fieldset>
                                                                <legend><h6>1. ¿La navegación en la App te pareció sencilla?</h6></legend>
                                                                <label>
                                                                    <input type="radio" name="numero" value="1" class=" m-2"> 1
                                                                </label>
                                                                <label>
                                                                    <input type="radio" name="numero" value="2" class=" m-2"> 2
                                                                </label>
                                                                <label>
                                                                    <input type="radio" name="numero" value="3" class=" m-2"> 3
                                                                </label>
                                                                <label>
                                                                    <input type="radio" name="numero" value="3" class=" m-2"> 4
                                                                </label>
                                                            </fieldset>
                                                        </form>
                                            </div>
                                            <div class="col h-25"> 
                                                        <form class="mt-5">
                                                            <fieldset>
                                                                <legend><h6>2. ¿El uso de la App para el seguimiento de las sugerencias te resulto útil?</h6></legend>
                                                                <label>
                                                                    <input type="radio" name="numero" value="1" class=" m-2"> 1
                                                                </label>
                                                                <label>
                                                                    <input type="radio" name="numero" value="2" class=" m-2"> 2
                                                                </label>
                                                                <label>
                                                                    <input type="radio" name="numero" value="3" class=" m-2"> 3
                                                                </label>
                                                                <label>
                                                                    <input type="radio" name="numero" value="3" class=" m-2"> 4
                                                                </label>
                                                            </fieldset>
                                                        </form>
                                            </div>
                                            <div class="col h-25"> 
                                                        <form class="mt-5">
                                                            <fieldset>
                                                                <legend><h6>3. ¿El apartado de “Canjear Premios” fue sencillo de entender?</h6></legend>
                                                                <label>
                                                                    <input type="radio" name="numero" value="1" class=" m-2"> 1
                                                                </label>
                                                                <label>
                                                                    <input type="radio" name="numero" value="2" class=" m-2"> 2
                                                                </label>
                                                                <label>
                                                                    <input type="radio" name="numero" value="3" class=" m-2"> 3
                                                                </label>
                                                                <label>
                                                                    <input type="radio" name="numero" value="3" class=" m-2"> 4
                                                                </label>
                                                            </fieldset>
                                                        </form>
                                            </div>  
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <div class="col-6 col-sm-4  col-lg-3 col-xl-2 mt-3">
                                                <div class="">
                                                        <div class="mb-4">
                                                            <div  class="col-12 rounded-pill mt-3 text-center p-2 text-white"  
                                                            style=" background:green; cursor: pointer; box-shadow: -5px 0px 5px 2px rgba(172,230,179,1);">
                                                            Confirmar <i class="bi bi-check-circle-fill"></i>
                                                            </div>
                                                        </div>
                                                </div>
                                        </div>
                                    </div>


                                        <div class="col-12 col-lg-12 d-flex align-items-end justify-content-center" >
                                            <div id="opciones" style="width: 18rem;" class=" d-flex align-items-center justify-content-center my-2" >
                                                <div class="row text-center mb-2 d-flex justify-content-center align-items-center">
                                                        <div  @click="redireccionar('Atras')" class="btn_principal_coloborador text-center col-12 d-flex align-items-center justify-content-center" style="cursor: pointer"> 
                                                            <div> <img src="img/app_atras.png" class="img-fluid" alt="..." style=" width: 50px;" ></div>
                                                        </div>        
                                                </div>
                                            </div>
                                        </div>
                                 
                    </div><!--FIN CUERPO-->
                            <!--FOOTER-->
                    <div class="row" style="height:10vh; background-color: rgba(181,0,0,1); box-shadow: 0px 0px 12px -2px black;">
                    </div><!--FIN FOOTER-->
        </div>  <!--FIN DIV CONTENEDOR-->  
</body>

<script>

    const vue3 = 
    {
        data(){
            return {
                concentrado_premios_entregar:[], 
                numero_nomina:<?php echo $_SESSION['usuario']; ?>
            }
        },
        mounted(){
            
        },
        methods:{
            redireccionar(opciones){
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