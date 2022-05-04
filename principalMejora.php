<?php
session_start();
if ($_SESSION["usuario"]){
$_SESSION['usuario']; 
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
    <!--Incluyendo Estilo-->
    <link rel="stylesheet" type="text/css"  href="estilos/miestilo.css">
    <title>Principal Mejora</title>
</head>
<body>
<style>
            .titulo{
                    font-family: 'Luckiest Guy', cursive;
                    -webkit-text-stroke: 1px white;
                }

               .div_susperior{
                background: rgb(255,255,255);
                background: linear-gradient(140deg, rgba(255,255,255,1) 24%, rgba(181,0,0,1) 24%, rgba(181,0,0,1) 76%, rgba(255,255,255,1) 76%); 
               }

               footer{
                background: rgb(181,0,0);
                background: linear-gradient(180deg, rgba(181,0,0,1) 12%, rgba(237,193,193,1) 100%); 
               }

                input[type]:focus, button[type]:focus {
                border-color: #7b0808;
                box-shadow: 0 0px 0px rgba(0, 133, 180, 1)inset, 0 0 4px rgba( 187, 16, 16, 1);
                outline: 0 none;
                }

              
    </style>
    <div id="app" class="container-fluid  " >
                <!--BARRA SUPERIOR-->
            <div class="div_susperior d-flex justify-content-around align-items-center" style="height:10vh">
                <div class=""><img class="img-fluid" src="img/logo_gonher.png"></img></div>
                <div class=" titulo fs-2 lh-1 text-center">Principal Mejora Continua</div>
                <div class=""><img class="img-fluid" src="img/logo_mejora_continua.png"></img></div>
            </div>
             <!--BARRA MENÚ-->
            <div class="row" style="height:2vh">
                <div class="d-flex justify-content-center text-white">
                            <button class="opciones  m-lg-1 p-1 rounded-3">
                                Concentrado de sugerencias
                            </button>  
                            <button class="opciones m-lg-1 p-1 rounded-3">
                                Administración de Premios
                            </button>
                            <button class="opciones  m-lg-1 p-1 rounded-3">
                                Administración de Retos
                            </button>
                            <button class="opciones  m-lg-1 p-1 rounded-3">
                                Configuración
                            </button>
                </div>
            </div>
                 <!--CUERPO-->
            <div class="row" style="height:78vh">
                   
                           
              
            </div>
                <!--FOOTER-->
            <div class="row" style="height:10vh;   background: url(img/pie.jpg); background-repeat: repeat; background-size: 5% 50%;">
           
            </div>
        
    </div>

<script>
    const vue3 = 
    {
        data(){
            return {
                username: '',
                password: ''  
            }
        },
        mounted(){
            
        },
        methods:{
            verificar(){
                axios.post('index_verificando.php',{
                usuario:this.username,
                contrasena: this.password
                }).then(response =>{
                    console.log(response.data)
                    if(response.data=='Si'){
                      window.location.href = "principalMejora.php"
                    }else{
                        alert("Usuario/Contraseña Incorrecta")
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