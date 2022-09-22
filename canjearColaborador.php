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
                                                                    
                                                                    <img @click="buscarDocumentos(premios.codigo_premio)" class="img-thumbnail min-w-25" style="max-width:100px; cursor:pointer" :src="premios.url_premio" data-bs-toggle="modal" data-bs-target="#exampleModal"/>
                                                                </td>
                                                                <td><label class="folio fst-italic" style=" font-size:0.7em">{{premios.descripcion}}</label></td>
                                                                <td>
                                                                        <div>
                                                                            <select :id="'select'+premios.id" @change="agregarCanasta(premios.id,premios.codigo_premio,premios.url_premio,premios.descripcion,premios.puntos_para_canjear,'<?php echo $_SESSION["usuario"]; ?>')"> 
                                                                                    <option value="0" selected disabled>Cant. Art.</option>
                                                                                    <option value="0">0</option>
                                                                                    <option value="1">1</option>
                                                                                    <option value="2">2</option>
                                                                                    <option value="3">3</option>
                                                                                    <option value="4">4</option>
                                                                                    <option value="5">5</option>
                                                                                <select>  
                                                                            <div  v-for="(canasta, index) in arreglo_canasta">
                                                                                 <span v-if="canasta.id_premio==premios.id" class="badge bg-dark">{{bandera=canasta.cantidad}}<br>(x Confirmar)</span> 
                                                                            </div>                                                  
                                                                         <div>   
                                                                </td>
                                                                <td>{{premios.puntos_para_canjear}}</td>
                                                            </tr>
                                                        </tbody>
                                                        </table>
                                                </div><!--scroll-->
                                                <div v-show="mostrar" class="alert alert-warning" role="alert">
                                                    <b class="alert-link">{{mensaje}}</b>
                                                </div>
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
                                                <div class="col-4 col-sm-5 col-lg-2 rounded-lg-end bg-danger text-white" >
                                                    <b>{{puntos_seleccionado}} Puntos</b>
                                                </div>
                                        </div>
                                        <div v-if="arreglo_canasta.length>0"  class="row justify-content-center align-items-start mx-1" >
                                                <div class="col-8 col-sm-5 col-lg-2 rounded-lg-start text-white" style=" background: #8B0000; ">
                                                    Puntos Restantes
                                                </div>
                                                <div class="col-4 col-sm-5 col-lg-2 rounded-lg-end bg-success text-white">
                                                   <b> {{puntos_restantes}} Puntos</b>
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
                                 
                      

                        <!--MODAL CARRUCEL-->
                        <!-- Button trigger modal -->
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Galería</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                                <div class="modal-body">
                                                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                                                    <!--<div class="carousel-indicators">
                                                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                                    </div>-->
                                                            <div class="carousel-inner  text-centerr">
                                                                <!-- Mostrando los archivos cargados -->
                                                                <div v-show="filepremio.length>0 && cual_documento=='premio'"  class="text-center justify-content-center"> 
                                                                                <div :class=" counter == 0 ? 'activo' : 'no_activo' " >
                                                                                    <img  :src="filepremio[counter]" style="width:80%;" class="img-responsive"></img>
                                                                                    
                                                                                </div>
                                                                </div>
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="d-flex justify-content-around ">
                                                        <button class=" rounded-3 bg-dark" type="button" data-bs-target="#carouselExampleIndicators" v-on:click="menos()" style=" border: 0px">
                                                            <span class="carousel-control-prev-icon mt-1" aria-hidden="true"></span>
                                                            <span class="visually-hidden">Previous</span>
                                                        </button>
                                                        <label><b>{{counter+1}} / {{filepremio.length}}</b></label>
                                                        <button class="rounded-3 bg-dark" type="button" data-bs-target="#carouselExampleIndicators" v-on:click="mas()" style=" border: 0px">
                                                            <span class="carousel-control-next-icon mt-1" aria-hidden="true"></span>
                                                            <span class="visually-hidden">Next</span>
                                                        </button>
                                                    </div>
                                                   
                                </div>
                                
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                            </div>
                        </div>
                        </div>
                        <!--FIN MODAL CARRUCEL-->

                    
                            
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
                arreglo_falses:[],
                exceso_gasto:false,
                numeros:[1,2,3,4,5,6],
                mostrar:false,
                mensaje:'',
                filepremio: [],
                cantidadDOCFILE:0,
                folio_carpeta_doc:'',
                cual_documento:'',
                activo:'carousel-item active',
                no_activo:'carousel-item',
                counter:0,
                
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
            agregarCanasta(id_premio,codigo,url,descripcion,puntos,numero_nomina){

                var selector = "select"+id_premio
                var cantidad= document.getElementById(selector).value;
                console.log(cantidad)
                
                //var puntos_selec=this.puntos_seleccionado
                var verificando_si_alcanza=Math.round(cantidad*puntos)
                //alert("Cantidad: "+cantidad+"Puntos: "+puntos+"Suma: "+verificando_si_alcanza+"Total de puntos:"+this.total_puntos)
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
                                            this.mostrar=true;
                                            this.mensaje= 'Algo salio mal al insertar su premio a canasta acuda a Mejora Continua para solucionar.'
                                            setTimeout(()=>{
                                                this.mostrar=false;
                                            },3000);
                                        }
                                        //  this.arreglo_canasta=response.data
                                    }).catch(error =>{

                                    })
                        }else{ 
                                this.mostrar=true;
                                this.mensaje= "Esta excediendo los puntos, no tienes: "+verificando_si_alcanza+" Puntos"
                                setTimeout(()=>{
                                    this.mostrar=false;
                                },3000);
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
                                    this.mostrar=true;
                                    this.mensaje= "Esta excediendo los puntos, elimine artículos."
                                    setTimeout(()=>{
                                        this.mostrar=false;
                                    },3000);
                            }
                        }).catch(error =>{

                        })
                    }else{
                                    this.mostrar=true;
                                    this.mensaje= "Elimine artículos o presione en el Botón CANCELAR."
                                    setTimeout(()=>{
                                        this.mostrar=false;
                                    },3000);
                    }
                },
                vaciarCanasta(numero_nomina){
                    axios.post("canasta_vaciar_premios.php",{
                        numero_nomina:numero_nomina
                    }).then(response =>{
                        if(response.data==true){
                            this.exceso_gasto=false
                                    this.mostrar=true;
                                    this.mensaje= "Cancelado con éxito."
                                    setTimeout(()=>{
                                        this.mostrar=false;
                                    },3000);
                                this.consultarCanasta(numero_nomina)
                                this.bandera=0;
                               
                        }else{
                            this.mostrar=true;
                                    this.mensaje= "Hay problemas pase con Mejora Continua."
                                    setTimeout(()=>{
                                        this.mostrar=false;
                                    },3000);
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
                            this.mostrar=true;
                                    this.mensaje= "Hay problemas al solicitar los premios, pase con Mejora Continua"
                                    setTimeout(()=>{
                                        this.mostrar=false;
                                    },3000);
                           
                        }
                            
                    }).catch(error =>{

                    })

                },
                buscarDocumentos(folio_carpeta_doc){
                    this.counter=0;
                    this.cual_documento='premio'
                    this.folio_carpeta_doc=folio_carpeta_doc;
                //alert(this.folio_carpeta_doc+this.cual_documento)
                if(this.folio_carpeta_doc!=undefined){
                                axios.post("buscar_documentos.php",{
                                    folio_carpeta_doc:this.folio_carpeta_doc,
                                    cual_documento:this.cual_documento
                                })
                                .then(response => {
                                            this.filepremio = response.data
                                            this.cantidadDOCFILE = this.filepremio.length
                                            if(this.filepremio.length>0){
                                                console.log(this.filepremio.length + "Archivos encontrados.")
                                            }else{
                                                /*alert("Sin Documentos agregados.")*/
                                            }
                                })
                                .catch(error => {
                                    console.log(error);
                                });
                    }
                },
                mas(){
                    this.counter+=1;
                        if(this.counter==this.filepremio.length){
                            this.counter=0;
                        }
                },
                menos(){
                    this.counter-=1;
                        if(this.counter<0){
                            this.counter=this.filepremio.length-1;
                        }
                },
               
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