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
     <script src="https://unpkg.com/vue@3.2.36/dist/vue.global.js"></script>
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
      <!-- Google Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKsYbP446ry3WxVoBLRrnApgMUetyCSrs&libraries=places"></script>
    <title>Sugerencias</title>
</head>
    <body>
    <style>
        

        /* #app{
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
                                        <div class="titulo lh-1 mt-3 text-dark fs-2 fw-bold text-center">Mi ubicación</div>
                                        <div class="subtitulo fs-5 lh-1  text-center mt-1 text-secondary mb-3"><?php echo $_SESSION['nombre']; ?></div>
                                    </div>
                                </div>
                            <div class=" col-2 d-flex align-items-center rounded-start" style="height:45.8833px"><img class="img-fluid ms-2" style=" max-height:80px;" src="img/logo_opex.jpg"></img></div>
                        </div>
                    </div>
                    <!--CUERPO-->
                   <div class=" d-flex flex-column justify-content-center py-4" style="min-height:80vh">

                     <!-- BUSCADOR DE DIRECCIÓN -->
               <div class="row justify-content-center">
                                            
                    <div class="col-12">
                        <div class="alert alert-primary ">
                            <label for="autocomplete" class="form-label fw-semibold my-0" style="font-size: 13px;">
                                🔎 Buscar dirección:
                            </label>
                            <input 
                            style="font-size: 11px;"
                                type="text" 
                                id="autocomplete" 
                                :disabled="bloquear"
                                class="form-control shadow-sm fw-normal "
                                placeholder="Coloque su direccion numero de calle, colonia, ciudad, estado o código postal">

                                          
                        </div>
                         <div class="col-12 d-flex flex-column align-items-center justify-content-center">
                                        <span class="alert alert-success fw-bold text-dark m-0" style="font-size: 13px;">
                                            <label class="text-dark">Vivo en</label> 🏡: {{ direccionCompleta }}
                                        </span>
                                        <span  v-if="bloquear==true"class="alert alert-warning fw-normal font-monospace p-1 m-0" style="font-size: 10px;">
                                            Puedes editar tu dirección en "Editar mi ubicación"
                                        </span>
                                         <span  v-else class="alert alert-warning fw-normal font-monospace p-1 m-0" style="font-size: 10px;">
                                           Si no has guardado esta ubicación y aquí vives presiona "Guardar mi ubicación"
                                        </span>
                                    </div>
                        <div class="d-flex flex-column">
                        <label class="text-dark mb-2" style="font-size: 11px;">Puedo buscar mi dirección, tengo tres opciones:</label>
                        <label class="text-secondary" style="font-size: 11px;">Opción 1: Al buscar una dirección, arrastrar el marcador para ajustar la ubicación exacta.</label>
                        <label class="text-secondary" style="font-size: 11px;">Opción 2: Colocar la dirección manualmente en el buscador.</label>
                        <label class="text-secondary" style="font-size: 11px;">Opción 3: Colocar la dirección solicitada en el formulario y presionar "buscar ubicación del formulario."</label>
                    </div>
                        </div>
                       
                </div>
                        
                            <!-- MAPA -->
                <div class="row justify-content-center mb-4">
                    <div class="col-12 col-lg-10">
                        <div class="card shadow-sm">
                            <div class="card-body p-2">
                                <div id="map" class="w-100 rounded" style="height:500px;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                    <!-- COORDENADAS -->
                    <div class="row justify-content-center">

                        

                        <div class="col-12 col-md-8 col-lg-6">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <div class="row g-3">
                                       


                                            <form @submit.prevent="guardarUbicacion" class="row" >

                                             <button type="button"
                                                    v-show="bloquear"
                                                    class="btn btn-warning"
                                                    @click="editarUbicacion">
                                                    ✏ Editar mi ubicación
                                                    </button>

                                                    <button type="button"
                                                            v-show="!bloquear"
                                                            class="btn btn-danger "
                                                            @click="cancelarUbicacion">
                                                            ❌ Cancelar
                                                    </button>
                                              
                                          
                                                      
                                                    <div class="col-md-6" style="font-size: 12px;">
                                                        <label :class="turno !== '' ? 'text-success fw-bold' : 'text-dark '">Turno</label>
                                                        <select
                                                            style="font-size: 12px;"
                                                            class="form-control shadow-sm rounded-3" 
                                                            :class="{'border-primary border-2': turno}"
                                                            v-model="turno"
                                                            required
                                                            :disabled="bloquear">
                                                            <option disabled value="">Seleccione un turno</option>
                                                            <option value="Turno Fijo (8 a.m. a 6 p.m.)">Turno Fijo (8 a.m. a 6 p.m.)</option>
                                                            <option value="Turno Rotativo (12 Hrs)">Turno Rotativo (12 Hrs)</option>
                                                            <option value="Turno Rotativo (8 Hrs)">Turno Rotativo (8 Hrs)</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-6" style="font-size: 12px;">
                                                         <label :class="utilizacion !== '' ? 'text-success fw-bold' : 'text-dark '">Utilización</label>
                                                        <select
                                                            style="font-size: 12px;"
                                                            class="form-control shadow-sm rounded-3" 
                                                            :class="{'border-primary border-2': utilizacion}"
                                                            v-model="utilizacion"
                                                            required
                                                            :disabled="bloquear">
                                                            <option disabled value="">¿Usas en transporte?</option>
                                                            <option value="si">Sí</option>
                                                            <option value="no">No</option>
                                                            <option value="a veces">A veces</option>
                                                        </select>
                                                    </div>
                                                            
                                                                                                    
                                                    <div class="col-md-6" style="font-size: 12px;">
                                                        <label :class="lat !== '' ? 'text-success fw-bold' : 'text-dark '">
                                                            Latitud
                                                        </label>
                                                        <input type="text" style="font-size: 12px;"
                                                            class="form-control" 
                                                            :class="{'border-primary border-2': lat}"
                                                            v-model="lat"
                                                            disabled
                                                            >
                                                    </div>

                                                    <div class="col-md-6" style="font-size: 12px;">
                                                        <label :class="lng !== '' ? 'text-success fw-bold' : 'text-dark '">
                                                            Longitud
                                                        </label>
                                                        <input type="text" style="font-size: 12px;"
                                                            class="form-control " 
                                                            :class="{'border-primary border-2': lng}"
                                                            v-model="lng"
                                                            disabled
                                                            >
                                                    </div>

                                                    <div class="col-md-6" style="font-size: 12px;">
                                                        <label :class="estado !== '' ? 'text-success fw-bold' : 'text-dark '">Estado</label>
                                                        <input type="text" style="font-size: 12px;"
                                                            class="form-control shadow-sm rounded-3"
                                                            :class="{'border-primary border-2': estado}" 
                                                            v-model="estado"
                                                            :disabled="bloquear"
                                                            required
                                                            >
                                                    </div>

                                                    <div class="col-md-6" style="font-size: 12px;">
                                                       <label :class="ciudad !== '' ? 'text-success fw-bold' : 'text-dark '">Ciudad</label>
                                                        <input type="text" style="font-size: 12px;"
                                                            class="form-control shadow-sm rounded-3" 
                                                            :class="{'border-primary border-2': ciudad}"
                                                            v-model="ciudad"
                                                            :disabled="bloquear"
                                                            required
                                                            >
                                                    </div>

                                                    <div class="col-md-6" style="font-size: 12px;">
                                                       <label :class="colonia !== '' ? 'text-success fw-bold' : 'text-dark '">Colonia</label>
                                                        <input type="text" style="font-size: 12px;"
                                                            class="form-control shadow-sm rounded-3" 
                                                            :class="{'border-primary border-2': colonia}"
                                                            v-model="colonia"
                                                            :disabled="bloquear"
                                                            >
                                                    </div>

                                                    <div class="col-md-6" style="font-size: 12px;">
                                                        <label :class="calle !== '' ? 'text-success fw-bold' : 'text-dark '">Calle</label>
                                                        <input type="text" style="font-size: 12px;"
                                                            class="form-control shadow-sm rounded-3" 
                                                            :class="{'border-primary border-2': calle}"
                                                            v-model="calle"
                                                            :disabled="bloquear"
                                                            >
                                                    </div>

                                                    <div class="col-md-6" style="font-size: 12px;">
                                                        <label :class="numero !== '' ? 'text-success fw-bold' : 'text-dark '">Número</label>
                                                        <input type="text" style="font-size: 12px;"
                                                            class="form-control shadow-sm rounded-3" 
                                                            :class="{'border-primary border-2': numero}"
                                                            v-model="numero"
                                                            :disabled="bloquear"
                                                            >
                                                    </div>

                                                    <div class="col-md-6" style="font-size: 12px;">
                                                        <label :class="cp !== '' ? 'text-success fw-bold' : 'text-dark '">Código Postal</label>
                                                        <input type="text" style="font-size: 12px;"
                                                            class="form-control shadow-sm rounded-3" 
                                                            :class="{'border-primary border-2': cp}"
                                                            v-model="cp"
                                                            :disabled="bloquear"
                                                            >
                                                    </div>

                                                     
                                                     <div class="d-flex justify-content-center gap-2 mt-4 flex-wrap">

                                                      <button type="submit"
                                                            v-show="!bloquear"
                                                            class="btn btn-success my-2">
                                                        💾 Guardar mi ubicación
                                                    </button>

                                                    <button type="button"
                                                                v-show="!bloquear"
                                                                class="btn btn-primary my-2"
                                                                @click="buscarDireccion" >
                                                            🔎 Buscar ubicación del formulario
                                                     </button>
                                                    </div>   

                                    </form>
                        
                                </div>
                            </div>
                        </div>
                    </div>
                        
                    </div>  
                    <div class="col-12 col-lg-12 d-flex align-items-end justify-content-center" >
                                    <div id="opciones" style="width: 18rem;" class=" d-flex align-items-center justify-content-center " >
                                        <div class="row text-center mb-2 d-flex justify-content-center align-items-center">
                                                <div v-if="seguimiento==false" @click="redireccionar('Atras')" class="btn_principal_coloborador text-center col-12 d-flex align-items-center justify-content-center" style="cursor: pointer"> 
                                                    <div> <img src="img/app_atras.png" class="img-fluid" alt="..." style=" width: 50px;" ></div>
                                                </div>   
                                                <div v-else @click="seguimiento=false" class="btn_principal_coloborador text-center col-12 d-flex align-items-center justify-content-center" style="cursor: pointer"> 
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
                            turno: '',
                            utilizacion:'',
                            lat: 25.704569879880868,
                            lng: -100.52591986340332,
                            estado: '',
                            ciudad: '',
                            colonia: '',
                            calle: '',
                            numero: '',
                            cp: '',
                            map: null,
                            marker: null,
                            bloquear: false,
                            seguimiento: false,
                            locationButton: null, 
                        }
                    },
                    mounted(){
                        this.requestMylocation();
                    },
                    computed: {
                    direccionCompleta() {
                        return [
                            this.calle,
                            this.numero,
                            this.colonia,
                            this.ciudad,
                            this.estado,
                            this.cp
                        ]
                        .filter(valor => valor && valor.trim() !== "")
                        .join(", ");
                    }
                },
                methods:{
          editarUbicacion() {
                this.bloquear = false;

                if (this.marker) {
                    this.marker.setDraggable(true);
                }

                // Mostrar u ocultar botón según bloquear
                if (this.locationButton) {
                    this.locationButton.style.display = this.bloquear ? "none" : "inline-block";
                }
            },
            cancelarUbicacion() {
                    this.bloquear = true;

                    if (this.marker) {
                        this.marker.setDraggable(false);
                    }

                    // Mostrar u ocultar botón según bloquear
                    if (this.locationButton) {
                        this.locationButton.style.display = this.bloquear ? "none" : "inline-block";
                    }
                    this.requestMylocation();
                },
              requestMylocation() {
                        axios.get('consultar_mi_ubicacion.php')
                    .then(response => {
                        if (response.data.success === true) {
                            // Si hay coordenadas guardadas
                            console.log("UBICACIÓN ENCONTRADA:", response.data);
                            this.lat = parseFloat(response.data.resultado['latitude']);
                            this.lng = parseFloat(response.data.resultado['longitude']);
                            this.calle = response.data.resultado['street'];
                            this.numero = response.data.resultado['number'];
                            this.turno = response.data.resultado['work_shift'];
                            this.utilizacion = response.data.resultado['utilization'];
                            this.bloquear = true;
                        } 
                        // Inicializar el mapa con las coordenadas actuales (guardadas o default)
                            this.initMap(this.lat, this.lng);
                            
                    })
                    .catch(error => {
                        console.error(error);
                        // En caso de error también usamos coordenadas por default
                        this.initMap(this.lat, this.lng);
                    });
            },
            async guardarUbicacion() {
                // Crear el objeto con los datos
                const payload = {
                    turno: this.turno,
                    utilizacion:this.utilizacion,
                    latitud: this.lat,
                    calle:this.calle,
                    numero:this.numero,
                    longitud: this.lng,
                };
                try {
                    // Enviar POST al servidor
                    const response = await axios.post('guardar_actualizar_mi_ubicacion.php', payload);
                    // Manejar la respuesta
                    console.log("RESPUESTA INSERCION",response.data);
                    if (response.data.success === true) {
                        alert('Ubicación guardada correctamente ✅');
                        this.bloquear = true;
                            if (this.marker) {
                                this.marker.setDraggable(false);
                            }
                    } else {
                        alert('Error al guardar la ubicación ❌');
                    }
                } catch (error) {
                    console.error(error);
                        alert('Ocurrió un error al guardar la ubicación ❌');
                }
            },
            initMap(latitud,longitud){
                const ubicacionInicial = { lat: latitud, lng:  longitud};

                this.map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 15,
                    center: ubicacionInicial
                });

                this.marker = new google.maps.Marker({
                    position: ubicacionInicial,
                    map: this.map,
                    draggable: !this.bloquear,
                    icon: { url: "img/ubicacion.png", scaledSize: new google.maps.Size(27, 27) }
                });

                this.lat = ubicacionInicial.lat;
                this.lng = ubicacionInicial.lng;

                //Si no hay dirección, obtener dirección al cargar el mapa

                    this.obtenerDireccion(this.lat, this.lng);
                
               

                // AUTOCOMPLETE
                const input = document.getElementById("autocomplete");
                const autocomplete = new google.maps.places.Autocomplete(input);

                autocomplete.bindTo("bounds", this.map);

                autocomplete.addListener("place_changed", () => {

                    const place = autocomplete.getPlace();
                    if (!place.geometry) return;

                    const location = place.geometry.location;

                    this.map.setCenter(location);
                    this.map.setZoom(17);
                    this.marker.setPosition(location);

                    this.lat = location.lat();
                    this.lng = location.lng();

                    this.obtenerDireccion(this.lat, this.lng);
                });

                // Cuando se arrastra el marcador
                this.marker.addListener("dragend", (event) => {

                    this.lat = event.latLng.lat();
                    this.lng = event.latLng.lng();

                    this.obtenerDireccion(this.lat, this.lng);
                });

               // En initMap
                this.locationButton = document.createElement("button");
                this.locationButton.innerHTML = "📌 Localízame";
                this.locationButton.classList.add("btn","btn-sm","btn-warning");
                this.locationButton.style.marginBottom = "30px";
                // Mostrar u ocultar según bloquear
                this.locationButton.style.display = this.bloquear ? "none" : "inline-block";

                // Agregar al DOM
                document.body.appendChild(this.locationButton);

                this.map.controls[google.maps.ControlPosition.BOTTOM_CENTER].push(this.locationButton);

                this.locationButton.addEventListener("click", () => {

                    if (!navigator.geolocation) {
                        alert("Tu navegador no soporta geolocalización");
                        return;
                    }

                    this.locationButton.innerHTML = "⏳ Obteniendo ubicación...";

                    navigator.geolocation.getCurrentPosition(
                        (position) => {

                            const pos = {
                                lat: position.coords.latitude,
                                lng: position.coords.longitude,
                            };

                            this.map.setCenter(pos);
                            this.map.setZoom(17);
                        if (!this.bloquear) this.marker.setPosition(pos); // solo mover si desbloqueado

                            this.lat = pos.lat;
                            this.lng = pos.lng;

                            this.obtenerDireccion(this.lat, this.lng);

                            this.locationButton.innerHTML = "🏡 Ubicación actualizada";
                            this.locationButton.classList.remove("btn-warning");
                            this.locationButton.classList.add("btn-primary");

                        },
                        () => {
                            alert("Error al obtener ubicación");
                            this.locationButton.innerHTML = "📌 Localízame";
                            this.locationButton.classList.remove("btn-primary");
                            this.locationButton.classList.add("btn-warning");
                        },
                        {
                            enableHighAccuracy: true,
                            maximumAge: 0,
                            timeout: 5000
                        }
                    );

                });

            },
        obtenerDireccion(lat, lng) {
                console.log("Obteniendo dirección para:", lat, lng);
                const geocoder = new google.maps.Geocoder();

                const latlng = {
                    lat: parseFloat(lat),
                    lng: parseFloat(lng)
                };

                geocoder.geocode({ location: latlng }, (results, status) => {

                    if (status === "OK" && results[0]) {
                        const components = results[0].address_components;
                        const getComponent = (type) => {
                            const comp = components.find(c => c.types.includes(type));
                            return comp ? comp.long_name : "";
                        };

                        this.estado  = getComponent("administrative_area_level_1");
                        this.ciudad  = getComponent("locality");
                        this.colonia = getComponent("sublocality") || getComponent("neighborhood");
                        if(this.bloquear==false){
                                this.calle   = getComponent("route");
                                this.numero  = getComponent("street_number");
                        }
                        this.cp      = getComponent("postal_code");

                    }

                });
            },
            buscarDireccion() {
                const geocoder = new google.maps.Geocoder();
                // Construimos la dirección desde el formulario
                const direccion = `
                    ${this.calle} ${this.numero},
                    ${this.colonia},
                    ${this.ciudad},
                    ${this.estado},
                    ${this.cp}
                `;

                geocoder.geocode({ address: direccion }, (results, status) => {

                    if (status === "OK" && results[0]) {
                        const location = results[0].geometry.location;

                        this.lat = location.lat();
                        this.lng = location.lng();

                        this.map.setCenter(location);
                        this.map.setZoom(17);
                        this.marker.setPosition(location);

                    } else {
                        alert("No se encontró la dirección");
                    }

                });
            },
            redireccionar(opciones){
                if(opciones=='Sugerencias'){
                    window.location.href=""
                }
                if(opciones=='Atras'){
                    window.location.href="principalColaborador.php"
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