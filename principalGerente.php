<?php
session_start();
if ($_SESSION["usuario"] ){ 
$incrementar=1;
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
     <!--VUE 3-->
     <script src="https://unpkg.com/vue@3.2.36/dist/vue.global.js"></script>
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
<body id="body">
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
    <div id="app" class="container-fluid">
        <!--BARRA SUPERIOR-->
        <div class="div_susperior d-flex justify-content-around align-items-center" style="height:10vh">
            <div class=""><img class="img-fluid" src="img/logo_gonher.png"></img></div>
            <div class=" titulo fs-2 lh-1 text-center">
                SISTEMA DE SUGERENCIAS DE MEJORA
                <br>
                <div class="pt-2" style="font-size:15px">
                    <?php echo $_SESSION['nombre']; ?>
                </div>
            </div>
            <div class=""><img class="img-fluid ms-2" style=" height:80px;" src="img/logo_opex.jpg"></img></div>
        </div>

        <div class="row justify-content-center align-items-start pt-3" style="min-height:5vh;">
                <div class="cintilla col-12 text-center">
                    <b> PRINCIPAL GERENTE </b>
                </div>
         </div>
        <!--CUERPO-->
        <div class="row" style="min-height:75vh;">
            <!-- contenido principal gerente gonher-->
            <div class="row justify-content-center">  
                <div class="col-12"><!--tabla pediente factibilidad-->
                    <div class="text-center mt-3">
                        <span class="badge bg-light text-dark">Pendientes de Revision</span>
                    </div>
                    <div class="div-scroll mt-3">
                        <table class="tablaMonitoreo-sugerencias table table-striped table-bordered ">
                            <thead class="encabezado-tabla text-center text-light ">
                                <tr>
                                    <th scope="col" class="sticky">#</th>
                                    <th scope="col">Folio</th>
                                    <th scope="col">Nombre de Sugerencia</th>
                                    <th scope="col">Fecha de Inicio </th>
                                    <th scope="col "> Nombre del analista</th>
                                    <th scope="col">Status de Factibilidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(no_factibles, index) in sugerencias_no_factibles">
                                    <th scope="row" class="text-center">{{index+1}}</th>
                                    <td>{{no_factibles.folio}}</td>
                                    <td>{{no_factibles.nombre_sugerencia}}</td>
                                    <td>{{no_factibles.fecha_de_inicio}}</td>
                                    <td> {{no_factibles.analista_de_factibilidad}}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-warning" style=" font-size: 1em" title="Factible o No Factible" @click="datos_modal_factibilidad('factibilidad',no_factibles.id,no_factibles.folio,no_factibles.numero_nomina, no_factibles.status,no_factibles.respuesta_analista,no_factibles.check_mc,no_factibles.validacion_de_impacto,no_factibles.causa_no_factibilidad)"><i class="bi bi-eye"></i> {{no_factibles.status}} </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--fin contenido principal gerente gonher-->

            <!-- Factibilidad -->
            <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="font-size:.8em">
                <div class="modal-dialog modal-xl modal-dialog-centered " >
                    <div class="modal-content " >
                        <div class="modal-header">        
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="d-flex justify-content-center mt-3 ">
                            <span class="badge bg-light text-dark">FACTIBILIDAD DE SUGERENCIA FOLIO: {{folio}}</span>
                        </div>
            <!--FIN ESPACIO FACTIBLE-->
                            
                        <!--ESPACIO NO FACTIBLE-->
                        <div v-show="no_factible==true">
                            <form  @submit.prevent="guardarNofactibilidad()">
                                <div class="mt-3">
                                    <span class="badge bg-light text-dark mb-1">CAUSA DE NO FACTIBILIDAD</span>
                                    <div class="col-12 text-center bg-warning">
                                        <textarea class="text-area-causa-no-factibilidad my-2" disabled type="text" :value="comentario_nf" style="font-size:0.9em;" required></textarea>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <span class="badge bg-light text-dark">TIPO DE CIERRE</span><br>
                                    <select class="" :value="status" disabled required>
                                        <option value="" disabled>Seleccione una opción..</option>
                                        <option  v-for=" lista in tipo_de_cierre" :key="lista.id" >{{lista}}</option>
                                    </select>             
                                </div>                    
                            </form>
                            <hr>
                        </div>   
                        <!--FIN ESPACIO NO FACTIBLE-->
                        
                        <div class="12 modal-footer" style="font-size:.9em"> 
                            <div class="col-12 text-center">
                                <button type="button" class="btn btn-success btn-sm me-2 " @click="respuesta('Factible', status)">Factible</button> 
                                <button type="button" class="btn btn-warning btn-sm" @click="respuesta('No Factible', status)">No factible</button> 
                            </div>                               
                            <!--btn salir --> 
                        </div>
                    </div>
                </div>
            </div>
        <!--fin modal-->
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
               
                status:'',
                usuario:'<?php echo $_SESSION['usuario']; ?>',

                /*varibles en modal factibilidad*/
                check_mc:'',

                factible: false,
                no_factible: false,
                
                tipo_factibilida_o_implementacion:'',
                
                folio:'',
                id_concentrado_general:0,
                lista_impacto:[],
                numero_nomina:'',
                tipo_impacto:'',

                lista_responsable_plan:[],
                responsable_plan:'',

                documentos:[],

                id_actualizar:0,

                tipo_de_cierre:['Cerrada/Fast Response','Cerrada/No Factible'],

                /*variables en modal no factible*/
                causa_no_factibilidad:'',

                documento_opcional:[],
                /*Variables en Implementación*/
                deshabilitar:false,//disable o enabled formulario impacto
                /*Variables CONCENTRADO IMPACTO DE SUGERENCIAS*/
                concentrado_sugerencias_pendiente_impacto:[],
                concentrado_impacto_sugerencias_midiendo:[],

                sugerencias_no_factibles: [],
                modal:'',
                comentario_nf: '',
            }
        },
        mounted(){

            //Consultado concentrado pendientes impacto.
            this.consultado_concentrado_pendiente_impacto(),
            //Consultado concentrado impacto Midiendo
            this.consultado_concentrado_impacto_sugerencias(),
             //Consultado usuarios.
            this.consultando_usuarios(),
            //Consultado impacto
            this.consultando_impacto(),
            this.consulta_responsable_plan()
            this.consulta_no_factibles();
        },
        methods:{
            consulta_no_factibles(){

                this.causa_no_factibilidad = [];
                axios.post('consulta_no_factibles.php',{
                }).then(response =>{
                    this.sugerencias_no_factibles = response.data
                    console.log('las no factibles son:',this.sugerencias_no_factibles)
                })
            },
            
            consultando_usuarios(){
                axios.post('consulta_usuario.php',{
                usuario: this.usuario
                }).then(response =>{
                    this.usuario = response.data.nombre
                })
            },

            consultando_impacto(){
                axios.post('lista_impacto.php',{
                }).then(response =>{
                    this.lista_impacto = response.data
                    console.log(this.lista_impacto);
                })
            },
            
            datos_modal_factibilidad(tipo,index,folio,numero_nomina,status,respuesta,check_mc,tipo_impacto,comentario_nf){
                this.modal = new bootstrap.Modal(document.getElementById('modal'))
                this.modal.show();
                this.id_actualizar = ''
                this.status = status
                this.check_mc = check_mc
                this.comentario_nf = comentario_nf
                if(this.check_mc=="Aceptado" || this.check_mc=="Pendiente" | this.check_mc=="Corregido"){
                    this.deshabilitar = true
                }else{
                    this.deshabilitar = false
                }
                this.tipo_factibilida_o_implementacion=tipo
                if(respuesta=="Factible"){
                    this.factible=true
                    this.no_factible=false
                     
                }else if(respuesta=="No Factible"){
                    this.factible=false
                    this.no_factible=true
                }
                this.folio=folio
                this.numero_nomina = numero_nomina
                this.id_concentrado_general=index
                this.tipo_impacto = tipo_impacto

            },

            consulta_responsable_plan(){
                axios.post('lista_responsables_y_analistas_factibilidad.php',{
                }).then(response =>{
                    this.lista_responsable_plan = response.data
                    console.log(this.lista_responsable_plan);
                })
            },

            buscarDocumentos_analista(){
                this.documentos=[] //limpiado vista del documento subido en modal 
                    axios.post("buscar_documentos.php",{
                    folio_carpeta_doc:this.folio,
                    cual_documento: 'sugerencia'
                })
                .then(response => {
                this.documentos = response.data;
                console.log(response.data);
                if(this.documentos.length>0){
                    /*console.log(this.documentos.length + "Archivos encontrados.")*/
                }else{
                    /*alert("Sin Documentos agregados.")*/
                }

                })
                .catch(error => {
                    console.log(error);
                });
            },

                respuesta(factibilidad, status){
                    
                    if(factibilidad == 'Factible'){ 
                        if(!confirm("Esta sugerencia pasará a Factible. ¿Desea continuar?")){return}
                    }
                    if(factibilidad == 'No Factible'){
                        if(!confirm("Esta sugerencia pasará a No Factible. ¿Desea continuar?")){return}
                    }

                    axios.post("actualizar_factibilidad_gerente.php",{
                    id:this.id_concentrado_general,
                    respuesta: factibilidad,
                    status_actual: status
                    }).then(response =>{
                        console.log(response.data)
                        if(response.data == true){
                            if(factibilidad == 'Factible'){
                            //let confirmarcion = confirm("Esta sugerencia pasará a Factible. ¿Desea continuar?");

                                alert("La sugerencia se asignó como factible.");
                                this.factible=true
                                this.no_factible=false
                                this.modal.hide();
                           

                            }else if(factibilidad == 'No Factible'){
  
                                    alert("La sugerencia pasará a No factible.");
                                    this.factible=false
                                    this.no_factible=true
                                    this.modal.hide();
                                
                            }
                            this.consulta_no_factibles();
                            
                        }else{
                            alert("Algo salio mal.")

                        }  
                        
                    }).catch(error => {
                        console.log(error)
                    })
                },

            buscarDocumentos(){
                    axios.post("buscar_documentos.php",{
                        folio_carpeta_doc:this.folio,
                        cual_documento:"nofactibleopcional"
                    })
                    .then(response => {
                                this.documento_opcional = response.data
                                if(this.documento_opcional.length>0){
                                    console.log(this.documento_opcional.length + "Archivos encontrados.")
                                }else{
                                    /*alert("Sin Documentos agregados.")*/
                                }
                        
                    })
                    .catch(error => {
                        console.log(error);
                    });
                },

                /*METODOS IMPACTO DE SUGERENCIA*/
                consultado_concentrado_pendiente_impacto(){//consulto datos del concentrado de sugerencias midiendo
                axios.post('consulta_concentrado_pendientes_impacto.php',{
                            }).then(response =>{
                                this.concentrado_sugerencias_pendiente_impacto = response.data
                                console.log(this.concentrado_sugerencias_pendiente_impacto,'ARREGLO FINAL')
                            })
                },
                consultado_concentrado_impacto_sugerencias(){//consulto datos del concentrado impacto midiendo
                    axios.post('consulta_concentrado_impacto_midiendo.php',{
                    }).then(response =>{
                        this.concentrado_impacto_sugerencias_midiendo = response.data
                        console.log(this.concentrado_impacto_sugerencias_midiendo)
                    }).catch(error =>{

                    })
                },

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