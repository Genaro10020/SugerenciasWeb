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
        

            /* #app{
                font-family: 'Andika', sans-serif;
                
            }*/
            select{
                font-size: 0.7em;
            }
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
                                                    <div class="titulo lh-1 mt-3 text-dark fs-2 fw-bold text-center" >Canjear Premios</div>
                                                    <div class="subtitulo fs-5 lh-1  text-center mt-1 text-secondary mb-3 " >Genaro Villanueva Pérez</div>
                                                </div>
                                    </div>
                                <div class=" col-2 d-flex align-items-center rounded-start" style="height:45.8833px"><img class="img-fluid ms-2" src="img/logo_mejora_continua.png"></img></div>
                            </div>
                    </div>
                    <!--CUERPO-->
                    <div class="row cuerpo" style="min-height:80vh; font-size: 0.9em" >
                            

                                    <div class="col-12  justify-content-center">
                                        <div class="row justify-content-center align-items-start pt-1 mx-1 my-1">
                                                <div class="col-8 col-sm-5 col-lg-2 rounded-start text-white" style=" background: #8B0000">
                                                    Puntos disponibles
                                                </div>
                                                <div class="col-4 col-sm-5 col-lg-2 rounded-end bg-primary text-white">
                                                    {{total_puntos}} Puntos
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-12 ">
                                            <div  style="max-height: 60vh; overflow-x: auto;"><!--scroll-->
                                                    <table class="table table-striped " style=" font-size: 0.9em;">
                                                    <thead >
                                                        <tr class="table_encabezado align-middle" style="background:rgb(137, 0, 0); height:5px; color:white; font-size: 0.8em;">
                                                            <th scope="col">#</th>
                                                            <th scope="col">Imagen</th>
                                                            <th scope="col">Descripción</th>
                                                            <th scope="col">Cant.</th>
                                                            <th scope="col">Pts. requeridos</th>
                                                        </tr>
                                                    </thead>
                                                        <tbody>
                                                            <tr class=" align-middle text-center fw-normal " v-for="(premios, index) in concentrado_premios">
                                                                <td>{{index+1}}</td>
                                                                <td>
                                                                    <img class="img-thumbnail min-w-25" style="max-width:100px" :src="'http://localhost/sugerencias/'+premios.url_premio" />
                                                                </td>
                                                                <td><label class="folio fst-italic" style=" font-size:0.7em">{{premios.descripcion}}</label></td>
                                                                <td>
                                                                
                                                                        <div v-if="arreglo_canasta.length>0">
                                                                        <!--raiz-->{{bandera=''}}
                                                                            <div   v-for="canasta in arreglo_canasta">
                                                                            <!--otrodiv-->
                                                                                <select v-if="bandera==''" id="selectconarreglo">  
                                                                                        <option v-if="canasta.id_premio==premios.id"  :value="canasta.cantidad">{{canasta.cantidad }} {{ bandera='Art'}}</option>
                                                                                        <option  else-if="bandera!='Art.'" v-for= "numero in numeros" :value="numero-1"  @click="agregarCanasta(premios.id,premios.codigo_premio,premios.url_premio,premios.descripcion,numero-1,premios.puntos_para_canjear,'<?php echo $_SESSION["usuario"]; ?>')">{{numero-1 }} {{bandera='Art.'}}</option>
                                                                                </select>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                        <div v-else>
                                                                            
                                                                            <select id="selectnoarreglo"> 
                                                                                    <option else v-for= "numero in numeros" :value="numero-1"  @click="agregarCanasta(premios.id,premios.codigo_premio,premios.url_premio,premios.descripcion,numero-1,premios.puntos_para_canjear,'<?php echo $_SESSION["usuario"]; ?>')">{{numero-1}} {{bandera='Art.'}}</option>
                                                                            <select>     
                                                                        </div>
                                                                            
                                                                            
                                                                       <!-- <div if=" arreglo_canasta.length>0">
                                                                            <div v-for="canasta in arreglo_canasta">
                                                                                    <span v-if="canasta.id_premio==premios.id" class="badge bg-dark">1 Art.<br>(x Confirmar)</span>
                                                                            </div>
                                                                        </div>-->

                                                                        
                                                                      
                                                                        
                                                                </td>
                                                                <td>{{premios.puntos_para_canjear}}</td>
                                                               
                                                            </tr>
                                                        </tbody>
                                                        </table>
                                                </div><!--scroll-->
                                                <div v-if="arreglo_canasta.length>0" class="row justify-content-around align-items-start text-white mb-1">
                                                            <div class="col-12 text-center lh-1" style=" height:16px;"><span class="text-dark" style=" font-size:0.7em">
                                                                     Confirmar (Inicia el proceso de entrega.)
                                                                <br> Limpiar (Borra los artículos por confirmar.)</p></span>
                                                            </div>
                                                            <div v-if="exceso_gasto==false" class="col-3 col-lg-2 col-xl-1 rounded-pill mt-3 text-center p-2 btn_confirmar"  @click="aceptarCanjerPremios('<?php echo $_SESSION["usuario"];?>')">
                                                                Confirmar <i class="bi bi-check-circle-fill"></i>
                                                                
                                                            </div>
                                                            
                                                            <div class="col-3 col-lg-2 col-xl-1 rounded-pill mt-3 text-center p-2 btn_cancelar" @click="vaciarCanasta('<?php echo $_SESSION["usuario"];?>')">
                                                                Limpiar <i class="bi bi-eraser-fill"></i>
                                                            </div>
                                                </div>
                                    </div>
                                        <div class="row justify-content-center align-items-start mx-1" >
                                                <div class="col-8 col-sm-5 col-lg-2 rounded-lg-start text-white" style=" background: #8B0000;">
                                                    Puntos Seleccionados
                                                </div>
                                                <div class="col-4 col-sm-5 col-lg-2 rounded-lg-end bg-success text-white" >
                                                    {{puntos_seleccionado}} Puntos
                                                </div>
                                        </div>
                                        <div class="row justify-content-center align-items-start mx-1" >
                                                <div class="col-8 col-sm-5 col-lg-2 rounded-lg-start text-white" style=" background: #8B0000; ">
                                                    Puntos Restantes
                                                </div>
                                                <div class="col-4 col-sm-5 col-lg-2 rounded-lg-end bg-danger text-white">
                                                    {{puntos_restantes}} Puntos
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
                                                <!--<div class="row text-center mb-2 d-flex justify-content-end">
                                                        <div  @click="redireccionar('Atras')" class="btn_principal_coloborador text-center col-12 d-flex align-items-center justify-content-center" style="cursor: pointer"> 
                                                            <div> <img src="img/app_atras.png" class="img-fluid" alt="..." style=" width: 50px;" ></div>
                                                        </div>        
                                                </div>-->
                                        </div>
                                 
                      



                    
                            
                    </div><!--FIN CUERPO-->
                            <!--FOOTER-->
                    <div class="row" style="height:10vh; background-color: rgba(181,0,0,1); box-shadow: 0px 0px 12px -2px black;">
                    </div><!--FIN FOOTER-->
        </div>  <!--FIN DIV CONTENEDOR-->  
</body>

<script>

/*function noatras(){
window.location.hash="no-back-button";
window.location.hash="Again-No-back-button"
window.onhashchange=function(){
window.location.hash="no-back-button";
                    }
}*/
    const vue3 = 
    {
        data(){
            return {
                concentrado_premios:[], 
                total_puntos:0,
                arreglo_canasta:[], 
                puntos_seleccionado:0,
                puntos_restantes:0,
                bandera:'',
                exceso_gasto:false,
                numeros:[1,2,3,4,5,6]
                
            }
        },
        mounted(){
            this.consultar_concentrado_premios(),
            this.consultar_total_punto()
            this.consultarCanasta(<?php echo $_SESSION["usuario"]; ?>)
            
        },
        methods:{
            redireccionar(opciones){
                if(opciones=='Atras'){
                    window.location.href="principalColaborador.php"
                }
               
            },
            consultar_concentrado_premios(){
                    axios.post("consulta_concentrado_premios.php",{
                    }).then(response =>{
                            this.concentrado_premios=response.data
                    }).catch(error =>{

                    })
                }, 
            consultar_total_punto(){
                    axios.post("consultar_total_puntos_colaborador.php",{
                    }).then(response =>{
                            this.total_puntos=response.data
                    }).catch(error =>{

                    })
                },
            agregarCanasta(id_premio,codigo,url,descripcion,cantidad,puntos,numero_nomina){
                var puntos_selec=this.puntos_seleccionado
                var verificando_si_alcanza=Math.round(puntos_selec+(cantidad*puntos))
                if(verificando_si_alcanza<=this.total_puntos){
                    this.exceso_gasto=false
                         axios.post("canasta_canjear_premios.php",{
                            id_premio:id_premio,
                                    codigo_premio:codigo,
                                    img_url:url,
                                    descripcion:descripcion,
                                    puntos:puntos,
                                    cantidad:cantidad,
                                    numero_nomina:numero_nomina
                                    }).then(response =>{
                                        if( response.data==true){
                                            this.consultarCanasta(numero_nomina)
                                        }else{
                                            alert("Algo salio mal al insertar su premio a canasta acuda a Mejora Continua para solucionar.")
                                        }
                                        //  this.arreglo_canasta=response.data
                                    }).catch(error =>{

                                    })
                        }else{ 
                                alert("Esta excediendo los puntos, no tines: "+verificando_si_alcanza+" Puntos")
                            }

                },
                consultarCanasta(numero_nomina){
                    if(this.exceso_gasto==false){
                        axios.post("canasta_consultar_premios.php",{
                        numero_nomina:numero_nomina
                        }).then(response =>{
                            this.arreglo_canasta=response.data
                            var sumando = 0
                            if(this.arreglo_canasta.length>0){
                                for (let i = 0; i < this.arreglo_canasta.length; i++) {
                                    sumando =  Math.round(this.arreglo_canasta[i].puntos_para_canjear*this.arreglo_canasta[i].cantidad)+sumando
                                }
                            }else{
                                this.puntos_seleccionado = 0
                            }
                            this.puntos_seleccionado = sumando
                            this.puntos_restantes = Math.round(this.total_puntos-sumando)
                            if(Math.sign(this.puntos_restantes)==1 || Math.sign(this.puntos_restantes)==0){//1 es positivo 0 es 0 puntos
                                this.exceso_gasto=false
                            }else{ 
                                this.exceso_gasto=true
                                alert("Esta excediendo los puntos, elimine artículos.")
                            }
                        }).catch(error =>{

                        })
                    }else{
                        alert("Elimine artículos o presione en el Botón CANCELAR.")
                    }
                },
                vaciarCanasta(numero_nomina){
                    axios.post("canasta_vaciar_premios.php",{
                        numero_nomina:numero_nomina
                    }).then(response =>{
                        if(response.data==true){
                            this.exceso_gasto=false
                            alert('Cancelado con exito.')
                                this.consultarCanasta(numero_nomina)
                                this.bandera=0;
                               
                        }else{
                            alert('Hay problemas pase con Mejora Continua')
                        }
                            
                    }).catch(error =>{

                    })
                }, 
                aceptarCanjerPremios(numero_nomina){
                    axios.post("canasta_aceptar_premios.php",{
                        numero_nomina:numero_nomina
                    }).then(response =>{
                        console.log(response.data)
                        if(response.data==true){
                            alert('Premios solicitado con éxito.')
                            this.consultar_total_punto()
                            this.consultarCanasta(numero_nomina)
                                
                                document.getElementById("options").value = "0"; 
                        }else{
                            alert('Hay problemas al pedir los premios, pase con Mejora Continua')
                        }
                            
                    }).catch(error =>{

                    })

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