<?php 


session_start();  
session_destroy(); 
session_start();  

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv='cache-control' content='no-cache'><!--Evitar cache-->
<meta http-equiv='expires' content='0'><!--Evitar cache-->
<meta http-equiv='pragma' content='no-cache'><!--Evitar cache-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
    <link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet"> 
</head>
<body>
    <style>
            .titulo{
                    font-family: 'Luckiest Guy', cursive;
                    color: white;
                    /*text-shadow: 0px 0px 1px black;
                    -webkit-text-stroke: 1px black;*/
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
            <div class="div_susperior d-flex justify-content-around align-items-center " style="height:10vh">
                <div class=""><img class="img-fluid" src="img/logo_gonher.png"></img></div>
                <div class=" titulo fs-2 lh-1 text-center mt-2 mt-sm-0">Sistema de Sugerencias de Mejora</div>
                <div class=""><img class="img-fluid" style=" max-height: 80px;" src="img/opex.png" ></img></div>
            </div>
            <div class="row" style="height:80vh">
                    <div class="col-12 col-sm-6 d-flex align-items-center justify-content-center rounded-3 mt-2" style="background:#f5f5f5">
                        <form @submit.prevent="verificar" class="rounded-3 shadow"  style="background: rgb(181,0,0);">
                                <div class="row rounded-3  d-flex align-items-center m-1 " style="background:#f9f9f9">
                                   
                                        <div class="col-12 mt-5" style="color:#920f0f; font-weight:bold">
                                            No. de Nómina
                                            <input v-model="username" type="text" class="form-control "  autocomplete="off"></input>
                                            
                                        </div>
                                        <div class="col-12 mt-5" style="color:#920f0f; font-weight:bold" > 
                                            Contraseña
                                            <input v-model="password" type="password" class="form-control" autocomplete="off"></input>
                                        </div>
                                        <div class="col-12 my-5 text-center"> 
                                            <button  type="submit" class="btn btn-danger">E n t r a r</button>
                                                <div v-show="mostrar" class="alert alert-warning ">
                                                    <b>{{mensaje_negrita}}</b>
                                                </div> 
                                        </div>
                                        
                                </div>
                                <div class="form-check">
                                        <input type="checkbox" id="checkbox" v-model="remember">
                                        <label class="text-light" for="checkbox">Recordarme</label>
                                </div>
                             
                                
                        </form>
                    </div>
                    
                    <div class="col-12 col-sm-6 d-flex align-items-center justify-content-center">
                        <div class="row">
                            <div class="col-12">
                                <img class="img-fluid" src="img/img_index.png"></img>
                            </div>
                        </div>
                    </div>
                    
            </div>
            <div class="row d-none d-sm-block" style="height:10vh;   background: url(img/pie.jpg); background-repeat: repeat-x; background-size: 8% 100%;">
          
            </div>
        
    </div>
    

    
<script>
    
    const vue3 = 
    {
        data(){
            return {
                mostrar:false,
                mensaje:'',
                mensaje_negrita:'',
                username: '<?php if(isset($_COOKIE["remember"])){if($_COOKIE["remember"]=="true" || $_COOKIE["remember"]==1){echo $_COOKIE["login_usuario"];}else{echo "";}}?>',    
                password: '<?php if(isset($_COOKIE["remember"])){ if($_COOKIE["remember"]=="true" || $_COOKIE["remember"]==1){echo base64_decode($_COOKIE["login_password"]);}else{echo "";}}?>',
                val:0,
                remember: '<?php if(isset($_COOKIE["remember"])){ if($_COOKIE["remember"]=="true" || $_COOKIE["remember"]==1){echo "true";}else{echo "false";}}?>'
            }
        },
        mounted(){
           
        },
        methods:{
            verificar(){
                axios.post('index_verificando.php',{
                usuario:this.username,
                contrasena: this.password,
                recordar: this.remember
                }).then(response =>{
                    console.log(response.data)
                   if(response.data=='Admin'){
                      window.location.href = "principalMejora.php"
                    }else if(response.data=='Analista') {
                        window.location.href = "principalAnalista.php"
                    }else if(response.data=='Colaborador'){

                           window.location.href = "principalColaborador.php"
                        
                    }else{
                            this.mostrar=true;
                            this.mensaje_negrita= 'Usuario/Contraseña Incorrecta'
                        setTimeout(()=>{
                            this.mostrar=false;
                        },3000);
                    }
                })
            },
        }
    }
    var mountedApp = Vue.createApp(vue3).mount('#app');
</script>
</body>
</html>