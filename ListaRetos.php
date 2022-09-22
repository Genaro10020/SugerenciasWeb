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
                                                    <div class="titulo lh-1 mt-3 text-dark fs-2 fw-bold text-center" >Lista Retos</div>
                                                    <div class="subtitulo fs-5 lh-1  text-center mt-1 text-secondary mb-3 " ><?php echo $_SESSION['nombre']; ?></div>
                                                </div>
                                    </div>
                                <div class=" col-2 d-flex align-items-center rounded-start" style="height:45.8833px"><img class="img-fluid ms-2" src="img/logo_mejora_continua.png"></img></div>
                            </div>
                    </div>
                    <!--CUERPO-->
                    <div class="row "  style="min-height:80vh; font-size: 0.9em" >
                            <div v-if="detalles_reto==false">
                                    <div class="col-12 mt-3  d-flex" style=" background:#e7e7e7;">
                                        <p>NOTA: Anota el folio del reto en el apartado “Reto” del Formato de Sugerencia. 
                                            Recuerda que las sugerencias que tengan un impacto en los retos definidos serán 
                                            acreedoras a un puntaje más alto.  
                                        </p>
                                    </div>    
 
                                    <div class="col-12">
                                            <div  style="max-height: 75vh; overflow-x: auto;"><!--scroll-->
                                                    <table class="table table-striped " style=" font-size: 0.9em;">
                                                    <thead >
                                                        <tr class="table_encabezado align-middle" style="background:rgb(137, 0, 0); height:5px; color:white; font-size: 0.9em;">
                                                            <th scope="col">#</th>
                                                            <th scope="col">Folio</th>
                                                            <th scope="col">Título de Reto</th>
                                                        </tr>
                                                    </thead>
                                                        <tbody>
                                                            <tr class=" align-middle text-center fw-normal " v-for="(retos, index) in concentrado_retos">
                                                                <td>{{index+1}}</td>
                                                                <td><label class="folio fst-italic text-primary" style="cursor:pointer" @click="consultar_reto(retos.folio_reto)"><b>{{retos.folio_reto}}</b></label></td>
                                                                <td>{{retos.titulo_reto}}</td>
                                                            </tr>
                                                        </tbody>
                                                        </table>
                                                </div><!--scroll-->
                                    </div>
                            </div> 
                            <div v-else>
                                    <div class="row justify-content-center">
                                        <div v-for="reto in reto_folio"class="row row-cols-1 text-center mt-3 justify-content-center">
                                            <div class="col-10 col-sm-8 col-lg-6  col-xl-4" style=" background-color:#eaeaea"><b>Folio</b></div>
                                            <div class="col">{{reto.folio_reto}}</div>
                                            <div class="col-10 col-sm-8 col-lg-6  col-xl-4" style=" background-color:#eaeaea"><b>Responsable</b></div>
                                            <div class="col">{{reto.responsable_reto}}</div>
                                            <div class="col-10 col-sm-8 col-lg-6  col-xl-4" style=" background-color:#eaeaea"><b>Planta</b></div>
                                            <div class="col">{{reto.planta_reto}}</div>
                                            <div class="col-10 col-sm-8 col-lg-6  col-xl-4" style=" background-color:#eaeaea"><b>Área</b></div>
                                            <div class="col">{{reto.area_reto}}</div>
                                            <div class="col"><b>Descripción del Reto</b></div>
                                            <textarea class="text-area-causa-no-factibilidad my-2" type="text"  style=" font-size:0.9em" disabled>{{reto.descripcion_reto}}</textarea>
                                        </div>
                                    </div>
                                     <!-- Mostrando los archivos cargados -->
                                    <div v-show="filereto.length>0 " class="d-flex justify-content-center" >
                                        <hr>
                                
                                                <div  v-for= "(fileimgreto,index) in filereto">
                                                        <span class="badge bg-secondary">Documento {{index+1}}</span><br>
                                                        <iframe  :src="filereto[index]" style="height:100%; width: 100%;"></iframe>
                                                </div>
                                    </div>
                                  

                                            
                       



                       
                            </div>          
                                    <div class="col-12 col-lg-12 d-flex align-items-end justify-content-center" >
                                                    <div id="opciones" style="width: 18rem;" class=" d-flex align-items-center justify-content-center " >
                                                        <div class="row text-center mb-2 d-flex justify-content-center align-items-center">
                                                                <div v-if="detalles_reto==false" @click="redireccionar('Atras')" class="btn_principal_coloborador text-center col-12 d-flex align-items-center justify-content-center" style="cursor: pointer"> 
                                                                    <div> <img src="img/app_atras.png" class="img-fluid" alt="..." style=" width: 50px;" ></div>
                                                                </div>   
                                                                <div v-else @click="detalles_reto=false" class="btn_principal_coloborador text-center col-12 d-flex align-items-center justify-content-center" style="cursor: pointer"> 
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
                concentrado_retos:[], 
                reto_folio:[], 
                detalles_reto:false,
                filereto:[],
                folio_carpeta_doc:'',
                cantidadDOCFILE:0, 
                cual_documento:'',
            }
        },
        mounted(){
            this.consultar_concentrado_retos()
        },
        methods:{
            redireccionar(opciones){
                if(opciones=='Atras'){
                    window.location.href="principalColaborador.php"
                }
               
            },
            consultar_concentrado_retos(){
                    axios.post("consulta_concentrado_retos.php",{
                    }).then(response =>{
                            this.concentrado_retos=response.data
                    }).catch(error =>{

                    })
                },
            consultar_reto(folio){
                this.folio_reto= folio
                this.cual_documento="reto"
                axios.post('consulta_concentrado_retos.php',{
                folio_reto: folio
                        }).then(response =>{
                            this.reto_folio = response.data
                            if(this.reto_folio.length > 0){
                                this.detalles_reto=true
                                this.buscarDocumentos()
                            }else{
                                alert("No logramos localizar ese folio, póngase en contacto con Mejora Continua")
                            }
                            
                        })
                }, 
                buscarDocumentos(){
                console.log(this.folio_reto,this.cual_documento)
                
                this.filereto=[]
                if(this.folio_reto!=""){
                                axios.post("buscar_documentos.php",{
                                    folio_carpeta_doc:this.folio_reto,
                                    cual_documento:this.cual_documento
                                })
                                .then(response => {
                                           
                                 
                                            this.filereto = response.data
                                            console.log(response.data,this.filereto.length);
                                            
                                            
                                            if(this.filereto.length>0){
                                                console.log(this.filereto.length + "Archivos encontrados.")
                                            }else{
                                                alert("Sin Documentos agregados.")
                                            }
                                            
                                    
                                })
                                .catch(error => {
                                    console.log(error);
                                });
                    }else{

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