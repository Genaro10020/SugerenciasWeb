<?php
session_start();
if ($_SESSION["usuario"] ){ 
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
                            <!-- contenido principal analista gonher-->
                          <div class="row">  
                                <div class="col-6 col-"><!--tabla pediente factibilidad-->
                                            <div class="text-center mt-3 ">
                                                <span class="badge bg-light text-dark">Sugerencias Pendientes de Factibilidad: <?php echo $_SESSION['nombre']; ?></span>
                                            </div>
                                            <div class="div-scroll mt-3">
                                                <table class="tablaMonitoreo-sugerencias table table-striped table-bordered ">
                                                <thead class="encabezado-tabla text-center text-light ">
                                                    <tr >
                                                    <th scope="col " class="sticky">#</th>
                                                    <th scope="col">Folio</th>
                                                    <th scope="col">Nombre de Sugerencia</th>
                                                    <th scope="col">Fecha de Inicio </th>
                                                    <th scope="col">Fecha Limite </th>
                                                    <th scope="col">Status de Factibilidad</th>
                                                    
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(concentrado, index) in concentrado_sugerencias_pendiente_factibilidad">
                                                    <th scope="row" class="text-center">{{index+1}}</th>
                                                        <td>{{concentrado.folio}}</td>
                                                        <td>{{concentrado.nombre_sugerencia}}</td>
                                                        <td>{{concentrado.fecha_de_inicio}}</td>
                                                        <td>{{concentrado.fecha_limite}}</td>
                                                        <td class="text-center">
                                                            <button v-if="concentrado.status_factibilidad=='Pendiente'" type="button" class="btn btn-warning" style=" font-size: 1em" data-bs-toggle="modal" data-bs-target="#modal" @click="datos_modal_factibilidad('factibilidad',concentrado.id,concentrado.folio)"><i class="bi bi-eye"></i> {{concentrado.status}} </button>
                                                            <button v-else="concentrado.status_factibilidad=='Vencida'" type="button" class="btn btn-danger" style=" font-size: 1em" data-bs-toggle="modal" data-bs-target="#modal" @click="datos_modal_factibilidad('factibilidad',concentrado.id,concentrado.folio)"><i class="bi bi-eye"></i> {{concentrado.status}} </button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                </table>
                                            </div>
                                 </div>
                                 <div class="col-6"><!--tabla pendiente implementacion-->
                                            <div class="text-center mt-3 ">
                                                <span class="badge bg-light text-dark">Sugerencias Pendientes de Implementación: <?php echo $_SESSION['nombre']; ?></span>
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
                                                    <tr v-for="(concentrado, index) in concentrado_sugerencias_pendiente_implementacion">
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
                             <!--fin contenido principal analista gonher-->
    <!-- Factibilidad -->
                    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="font-size:.8em">
                            <div class="modal-dialog modal-xl modal-dialog-centered " >
                                <div class="modal-content " >
                                                <div class="modal-header">        
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                            <div class="d-flex justify-content-center mt-3 ">
                                                                <span class="badge bg-light text-dark">FACTIBILIDAD DE SUGERENCIA FOLIO: {{folio}} </span>
                                                            </div>
                                                                <div class="modal-body alert alert-secondary">
                                                                        <div class="">
                                                                            <div class="" v-for="(concentrado,index) in concentrado_sugerencias_pendiente_factibilidad">
                                                                                        <div v-if="concentrado.id==posicion">
                                                                                        <label class=" fw-bold mt-1">Nombre de la sugerencias: </label> {{ concentrado.nombre_sugerencia}}<br>
                                                                                        <label class=" fw-bold mt-1">Situacion Actual: </label> {{concentrado.situacion_actual}}<br>
                                                                                        <label class=" fw-bold mt-1">Idea Propuesta: </label> {{concentrado.idea_propuesta}}<br>
                                                                                        <label class=" fw-bold mt-1">Colaborador: </label> {{concentrado.colaborador}}<br>
                                                                                        <label class=" fw-bold mt-1">No. de Nomina:</label> {{concentrado.colaborador}}<br>
                                                                                        <label class=" fw-bold mt-1">Puesto: </label> {{concentrado.puesto}}<br>
                                                                                        <label class=" fw-bold mt-1">Área: </label> {{concentrado.area}}<br>
                                                                                        <label class=" fw-bold mt-1">Subárea: </label> {{concentrado.subarea}}<br>
                                                                                        <label class=" fw-bold mt-1">Fecha de Sugerencia: </label> {{concentrado.fecha_de_sugerencia}}<br>
                                                                                        </div>
                                                                            </div>
                                                                        </div>
                                                                </div>

                                                <div class="row" style="font-size:.9em">
                                                                <div class="col-12 col-xl-6" v-for= "(documento,index) in documentos"><!--Espacio Vista Documentos-->
                                                                        <div class="col-12 alert alert-secondary">
                                                                            <div class="col-12 text-center">
                                                                                <span class="badge bg-secondary ">Documento {{index+1}}</span><br>
                                                                            </div>
                                                                            <iframe :src="documentos[index]" style="width:100%;height:500px;"></iframe>
                                                                            
                                                                        <!-- <iframe src="https://vvnorth.com/Sugerencias/documentos/pdf.pdf" style="width:100%;height:500px;"></iframe>-->
                                                                        </div>
                                                                </div><!--Fin Vista Documentos--->
                                                                <div class="col-12">
                                                                            <div class="text-center mt-3 ">
                                                                                <span class="badge bg-light text-dark">FORMULARIO </span>
                                                                            </div>
                                                                        <div class="col-12 alert alert-secondary">
                                                                           
                                                                                <div class="row mt-2 mx-3 ">
                                                                                    <div class="col-12 col-lg-6 ">
                                                                                        Impacto Primerio:<br>
                                                                                        <select class="" >
                                                                                                <option  v-for=" lista in lista_impacto" :key="lista.id">{{lista.impacto}}</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-12 col-lg-6">
                                                                                        Impacto Secundario:<br>
                                                                                        <select class="" >
                                                                                                <option v-for=" lista in lista_impacto" :key="lista.id">{{lista.impacto}}</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>   
                                                                                <div class="row mt-2 mx-3 ">
                                                                                        <div class="col-12 col-lg-6">
                                                                                        Tipo de desperdicio:<br>
                                                                                            <select class="" >
                                                                                                    <option  v-for=" lista in lista_tipo_desperdicio" :key="lista.id">{{lista.tipo_de_desperdicio}}</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-12 col-lg-6  mt-3 mb-2" style=" font-size: 10px">
                                                                                            Objetivos de Calidad y M.A.:<br>
                                                                                            <div  class="inputs-concentrado" style="overflow-y: scroll; height:80px" >
                                                                                                    <label>{{var_objetivo_de_calidadMA}}</label>
                                                                                                        <ul>
                                                                                                            <li v-for="objetivo_de_calidad in objetivo_de_calidadMA">
                                                                                                                <input type="checkbox" :value="objetivo_de_calidad.objetivos_de_calidad" v-model="var_objetivo_de_calidadMA">
                                                                                                                <label for="objetivo_de_calidad">{{objetivo_de_calidad.objetivos_de_calidad}}</label>
                                                                                                            </li>
                                                                                                        </ul>
                                                                                            </div>
                                                                                        </div>
                                                                                </div>   
                                                                            </div>   
                                                                </div>
                                                                <div class="col-12"><!--espacio Plan de trabajo-->
                                                                        <div class="text-center my-3 ">
                                                                            <span class="badge bg-light text-dark">PLAN DE TRABAJO</span>
                                                                        </div>
                                                                        <div class="col-12 text-center inline-block">
                                                                            <div>
                                                                                <button class="boton-nuevo mb-1" @click="nueva_actividad = true"><i class="bi bi-plus-circle"></i> Nueva Actividad</button>
                                                                            </div>
                                                                        </div>
                                                                        <div class="div-scroll">
                                                                            <table class="tablaMonitoreo-sugerencias table table-striped table-bordered text-center" style=" font-size: 12px">
                                                                                <thead class="encabezado-tabla text-center text-light ">
                                                                                    <tr >
                                                                                    <th scope="col" class="sticky"></th>
                                                                                    <th scope="col">No. Actividad</th>
                                                                                    <th scope="col">Descripción Actividad</th>
                                                                                    <th scope="col">Responsable</th>
                                                                                    <th scope="col">Fecha de Inicio</th>
                                                                                    <th scope="col">Fecha de Cierre</th>
                                                                                    <th scope="col">% Porcentaje</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr class="align-middle bg-info" v-show="nueva_actividad"><!--Nueva Actividad Fila-->
                                                                                            <td class="sticky"> 
                                                                                                <button type="button" class="btn btn-danger  me-2" title="Cancelar" @click="nueva_actividad=false"><i class="bi bi-x-circle" ></i></button>
                                                                                                <button type="button" class="btn btn-primary" title="Guardar" @click="guardarActividad"><i class="bi bi-check-circle"></i></button>
                                                                                            </td> 
                                                                                        <th scope="row">
                                                                                            <label>{{numero_actividad}}</label></th>
                                                                                        <td>
                                                                                            <textarea class="inputs-concentrado text-area" type="text"  name="nombre_sugerencia" v-model="actividad"></textarea></td>
                                                                                        <td>
                                                                                        <select class="inputs-concentrado" v-model="var_responsable_plan" >
                                                                                            <option value="" disabled>Seleccione Analista..</option>
                                                                                            <option v-for="responsable in lista_responsable_plan" :key="responsable.nombre" :value="responsable.nombre">{{responsable.nombre}}</option>
                                                                                        </select>
                                                                                        </td>
                                                                                        <td>
                                                                                            <input class="inputs-concentrado" type="date" v-model="fecha_inicial_actividad"></input></td>
                                                                                        <td>
                                                                                            <input class="inputs-concentrado" type="date" v-model="fecha_final_actividad"></input></td>
                                                                                        <td>0</td>
                                                                                    </tr><!--Fin Nueva Actividad-->
                                                                                    <tr class="align-middle" v-for="actividades in concentrado_actividades"><!--Consulta actividades-->
                                                                                        <td> 
                                                                                              <button type="button" class="btn btn-danger  me-2" title="Cancelar" @click="nueva_actividad=false"><i class="bi bi-x-circle" ></i></button>
                                                                                        </td> 
                                                                                        <th scope="row"></th>
                                                                                        <td>
                                                                                            <textarea class="inputs-concentrado text-area" type="text"  name="nombre_sugerencia" ></textarea><label>{{actividades.actividad}}<label></td>
                                                                                        <td>
                                                                                        <select class="inputs-concentrado"  >
                                                                                            <option value="" disabled>Seleccione Analista..</option>
                                                                                            <option v-for="responsable in lista_responsable_plan" :key="responsable.nombre" :value="responsable.nombre">{{responsable.nombre}}</option>
                                                                                        </select>
                                                                                            <label>{{actividades.actividad}}<label>
                                                                                        </td>
                                                                                        <td><input class="inputs-concentrado" type="date" ></input><label>{{actividades.fecha_inicial}}<label></td>
                                                                                        <td><input class="inputs-concentrado" type="date" ></input><label>{{actividades.fecha_final}}<label></td>
                                                                                        <td>0</td>
                                                                                    </tr><!--Fin consuta actividades-->    
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                </div> <!--Fin espacio de Plana de trabajo -->  
                                                    </div>
                                                    <div class="12 modal-footer " > 
                                                        <div class="col-12 text-center">
                                                                <button type="button" class="btn btn-success btn-lg me-2 fst-italic">Factible</button> 
                                                                <button type="button" class="btn btn-warning btn-lg fst-italic  ">No factible</button> 
                                                                <button type="button" class="btn btn-secondary btn-sm ms-5"  data-bs-dismiss="modal" >Cancelar</button>
                                                        </div>              
                                                    </div>
                                    </div>
                                </div>
                        </div>
                             <!--fin modal-->
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
                contador: 0,
                concentrado_sugerencias_pendiente_factibilidad:[],
                concentrado_sugerencias_pendiente_implementacion:[],
                /*varibles en modal factibilidad*/
                tipo_factibilida_o_implementacion:'',
                folio:'',
                posicion:0,
                lista_impacto:[],
                lista_tipo_desperdicio:[],
                objetivo_de_calidadMA:[],
                var_objetivo_de_calidadMA:[],
                actividad:'',
                fecha_inicial_actividad:'',
                fecha_final_actividad:'',
                lista_responsable_plan:[],
                var_responsable_plan:'',
                documentos:[],
                nueva_actividad: true,
                concentrado_actividades:[],
                numero_actividad:0,
            }
        },
        mounted(){
            //Consultado concentrado de sugerencias.
            this.consultado_concentrado_pendiente_factibilidad(),
              //Consultado concentrado de sugerencias.
            this.consultado_concentrado_pendiente_implementacion(),
             //Consultado usuarios.
            this.consultando_usuarios(),
            //Consultado impacto
            this.consultando_impacto(),
            //Consulta desperdiciones
            this.consultando_lista_de_desperdicio(),
            this.consulta_lista_objetivos_calidad_ma(),
            this.consulta_responsable_plan(),
            this.consultarActividades()

        },
        methods:{
            mostrar(dato){
                   this.ventana=dato;
                   if(dato=='principalAnalista'){ this.pintarUno=true}else{this.pintarUno=false}
                   if(dato=='concentrado'){this.pintarDos=true}else{this.pintarDos=false}
             },
            consultado_concentrado_pendiente_factibilidad(){
                axios.post('consulta_concentrado_pendientes_factibilidad.php',{
                            }).then(response =>{
                                this.concentrado_sugerencias_pendiente_factibilidad = response.data
                                console.log(this.concentrado_sugerencias_pendiente_factibilidad)
                            })
            },
            consultado_concentrado_pendiente_implementacion(){
                axios.post('consulta_concentrado_pendientes_implementar.php',{
                            }).then(response =>{
                                this.concentrado_sugerencias_pendiente_implementacion = response.data
                                console.log(this.concentrado_sugerencias_pendiente_implementacion)
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
            datos_modal_factibilidad(tipo,index,folio){
                this.tipo_factibilida_o_implementacion=tipo
                this.folio=folio
                this.posicion=index
                if(this.tipo_factibilida_o_implementacion=="factibilidad"){
                    this.buscarDocumentos_analista()
                } else if (this.tipo_factibilida_o_implementacion=="implementacion"){

                }else{

                }
            },
            consultando_lista_de_desperdicio(){
                axios.post('lista_tipo_desperdicio.php',{
                }).then(response =>{
                    this.lista_tipo_desperdicio = response.data
                })
            },
            consulta_lista_objetivos_calidad_ma(){
                axios.post('lista_objetivos_calidad_ma.php',{
                }).then(response =>{
                    this.objetivo_de_calidadMA = response.data
                })
            },
            consulta_responsable_plan(){
                axios.post('lista_usuarios_y_analistas_factibilidad.php',{
                }).then(response =>{
                    this.lista_responsable_plan = response.data
                    console.log(this.lista_responsable_plan);
                })
            },
            buscarDocumentos_analista(){
                this.documentos=[] //limpiado vista del documento subido en modal 
                    axios.post("buscar_documentos.php",{
                        folio_carpeta_doc:this.folio
                    })
                    .then(response => {
                    this.documentos = response.data;
                    //console.log(response.data);
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
            guardarActividad(){
                console.log(this.numero_actividad+this.actividad+this.var_responsable_plan+this.fecha_inicial_actividad+this.fecha_final_actividad)
                /*axios.post("guardar_plan_actividad.php",{
                    numero_actividad: this.numero_actividad,
                    actividad: this.actividad,
                    responsable_plan: this.var_responsable_plan,
                    fecha_inicial_actividad: this.fecha_inicial_actividad,
                    fecha_final_actividad: this.fecha_final_actividad
                }).then(response =>{

                }).catch(error =>){
                    console.log(error)
                }*/
            },
            consultarActividades(){
                    axios.post("consultando_actividades.php",{
                }).then(response =>{
                    this.concentrado_actividades = response.data
                    this.numero_actividad = this.concentrado_actividades.length +1
                }).catch(error => {
                    console.log(error)
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