<?php
session_start();
if ($_SESSION["usuario"] && $_SESSION["tipo"]=="Colaborador"){ 
    ?>
<?php $id_seguimiento_premio = $_GET['id']; ?>
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
    <!--Fechas-->
    <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&display=swap" rel="stylesheet">
    <!--Incluyendo Estilo-->
    <link rel="stylesheet" type="text/css"  href="estilos/miestilo.css">
    <!--Iconos boostrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- Animación bootstrap -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
     
    <title>Sugerencias</title>

  <style>
    body {
        background-color: #F5F5F5;
    }
    .titulo {
      color: white;
      font-family: 'Fjalla One', sans-serif;
    }

    .subtitulo {
      font-family: 'Stint Ultra Condensed', cursive;
    }

    .btn_principal_colaborador {
      border-radius: 100px;
      height: 50px;
      width: 50px;
      box-shadow: 0px 0px 2px black;
      background-color: rgb(158, 0, 0);
    }

    .btn_principal_colaborador:hover {
      border-radius: 100px;
      height: 50px;
      width: 50px;
      box-shadow: 0px 0px 10px rgb(0, 0, 0);
      background-color: rgb(35, 54, 226);
    }

    .div_superior {
      background: rgb(255, 255, 255);
      background: linear-gradient(140deg, rgba(255, 255, 255, 1) 24%, rgba(181, 0, 0, 1) 24%, rgba(181, 0, 0, 1) 76%, rgba(255, 255, 255, 1) 76%);
    }

    .bg-gris-paso {
      background-color: #DEE2E6 !important;
    }

    /* Corrección de selector: textarea no lleva [type] */
    textarea:focus,
    input[type]:focus,
    button[type]:focus {
      border: 2px solid;
      border-color: rgb(137, 0, 0);
      outline: 0 none;
    }

    .order-card {
      cursor: pointer;
      transition: 0.2s;
    }

    .order-card:hover {
      transform: translateY(-2px);
      box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15);
    }

    .icon-box {
      width: 48px;
      height: 48px;
      background: #B50000;
    }
    /* Tipografía para fechas */
    .afacad-flux {
      font-family: "Afacad Flux", sans-serif;
      font-optical-sizing: auto;
      font-style: normal;
      font-variation-settings: "slnt" 0;
    }
    .text-color-red {
      color: #B50000;
    }

    /* componentes del estatus */
    .component-square {
    width: 48px;
    height: 48px;
    }
    .icon-size {
    width: 24px;
    height: 24px;
    }
    @media (min-width: 768px) {
    .component-square {
        width: 64px;
        height: 64px;
    }
    .icon-size {
        width: 32px;
        height: 32px;
    }
    }
  </style>
</head>
<body>
  <div id="app" class="container-fluid"><!--BODY-->
    <!--BARRA SUPERIOR-->
    <div class="row d-flex justify-content-around align-items-center"
      style="height:10vh; background-color: rgba(181,0,0,1); box-shadow: 0px 0px 12px -2px black;">
      <div class="row align-items-center bg-white w-100">
        <div class="col-2 d-flex align-items-center rounded-end" style="height:45.8833px;">
          <img class="img-fluid" src="img/logo_gonher.png" alt="Logo Gonher">
        </div>
        <div class="col-8 d-flex align-items-center justify-content-center">
          <div>
            <div class="titulo lh-1 mt-3 text-dark fs-2 fw-bold text-center">Estatus Premios</div>
            <div class="subtitulo fs-5 lh-1 text-center mt-1 text-secondary mb-3">
              <?php echo $_SESSION['nombre']; ?>
            </div>
          </div>
        </div>
        <div class="col-2 d-flex align-items-center rounded-start" style="height:45.8833px">
          <img class="img-fluid ms-2" style="max-height:80px" src="img/logo_opex.jpg" alt="Logo Opex">
        </div>
      </div>
    </div>

    <!--CUERPO-->
    <div class="row cuerpo" style="min-height:80vh; font-size: 0.9em">
      <div class="col-12">
        <div style="max-height: 75vh; overflow-y: auto;"><!--scroll-->
          <!-- INICIO DEL CUERPO -->
          <div class="container py-4 rounded mt-1">

            <div class="mb-2 mb-md-3 mt-2 mt-md-4">
              <div class="subtitulo fs-2 lh-1 text-center mt-1 text-secondary mb-3">Seguimiento de Envío</div>



                <!-- CÓDIGO DE TARJETAS DE DETALLE DE SEGUIMIENTO -->
              <div class="d-flex flex-column flex-md-row">
                <div v-for="(step, index) in steps" :key="step.key" class="flex-fill position-relative  pb-3">

                  <!-- línea horizontal (solo desktop) -->
                  <div v-if="index !== steps.length - 1" class="d-none d-md-block position-absolute top-10 start-50"
                    :class="index < currentIndex ? 'icon-box' : 'bg-gris-paso'"
                    style="height:8px;width:100%;margin-top:17px;z-index:0;"></div>

                  <div class="d-flex flex-md-column align-items-start align-items-md-center text-md-center">

                  <div class="d-flex flex-column align-items-center me-3 me-md-0 position-relative">


                      <div class="d-flex align-items-center justify-content-center"
                        style="width:40px;height:40px;z-index:2;"
                        :class="index <= currentIndex ? 'icon-box' : 'bg-gris-paso'">


                        <!-- PALOMITA -->
                        <svg v-if="index <= currentIndex" width="28" height="28" viewBox="0 0 24 24" fill="none"
                          stroke="#fff" stroke-width="2">
                          <path d="M20 6 9 17l-5-5" />
                        </svg>
                        <!-- CÍRCULO -->
                        <svg v-else width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#6C757D"
                          stroke-width="2">
                          <circle cx="12" cy="12" r="10" />
                        </svg>
                      </div>
                      <!-- línea vertical (solo mobile) -->
                      <div v-if="index !== steps.length - 1" class="d-block d-md-none position-absolute"
                          :class="index < currentIndex ? 'icon-box' : 'bg-gris-paso'"
                          style="width: 8px; height: 50px; left: 16px; top: 45px; z-index: 0;">
                      </div>

                  </div>
                    <!-- TEXTO -->
                    <div class="pt-1 pt-md-3 pb-4 pb-md-0">
                      <div class="fw-bold subtitulo fs-4 fw-normal ":class="index <= currentIndex ? 'text-color-red' : 'text-secondary'">
                        {{ step.title }}
                      </div>
                      <div class="small text-secondary subtitulo fs-5">
                        {{ step.description }}
                      </div>
                      <div class="text-muted small">
                        <span class="afacad-flux fw-normal " v-if="getStepState(index) !== 'pending'">
                          {{ formatodeFecha(ObtenerFechaStep(step)) }}
                        </span>
                        <span v-else>Pendiente</span>
                      </div>

                    </div>

                  </div>
                </div>
              </div>
            </div>

            <!-- fin de tarjetas de detalle de seguimiento -->
          

          </div> <!-- FIN CONTAINER INFO -->
        </div><!--FIN SCROLL-->
      </div>

      <div class="col-12 d-flex align-items-end justify-content-center">
        <div id="opciones" style="width: 18rem;" class="d-flex align-items-center justify-content-center my-2">
          <div class="row text-center mb-2 d-flex justify-content-center align-items-center">
            <div @click="redireccionar('Atras')"
              class="btn_principal_colaborador text-center col-12 d-flex align-items-center justify-content-center"
              style="cursor: pointer">
              <div><img src="img/app_atras.png" class="img-fluid" alt="Atrás" style="width: 50px;"></div>
            </div>
          </div>
        </div>
      </div>
    </div><!--FIN CUERPO-->

    <!--FOOTER-->
    <div class="row" style="height:10vh; background-color: rgba(181,0,0,1); box-shadow: 0px 0px 12px -2px black;"></div>
    <!--FIN FOOTER-->
  </div> <!--FIN DIV CONTENEDOR-->
</body>

<script>


  const vue3 = 
  {
      data(){
        return {
          pedidoActual: {},
          currentStatus: '',
          Estatus_premio: [],
          mostrar: false,
          mensaje: '',
          fecha_solped_respaldo: '',
          id_seguimiento_premio:<?php echo $id_seguimiento_premio; ?>,

          steps: [
          {
              key: "Pte. Solped",
              title: "Pedido Solicitado",
              description: "Se registró tu pedido.",
              date: "fecha"

          },
          {
              key: "Pte. Entrega",
              title: "En preparación",
              description: "Estamos preparando tu pedido.",
              date: "fecha_solped"
          },
          {
              key: "Pte. Llegada",
              title: "En reparto",
              description: "Tu pedido va en camino.",
              date: "fecha_oc"
          },
          {
              key: "Pte. Repartir",
              title: "Listo para recoger",
              description: "Puedes pasar a recogerlo.",
              date: "fecha_llegada"
          },
          {
              key: "Entregado",
              title: "Entregado",
              description: "Pedido completado.",
              date: "fecha_entrega"
          }
          ]
        }
    },
      computed: {
      // convierte el estado actual en número
        currentIndex() {
            const idx = this.steps.findIndex(
                step => step.key === this.currentStatus
            );

            return idx >= 0 ? idx : 0;
        }
      },
      mounted(){
          this.consultarPremioStatus(this.id_seguimiento_premio)
      },
      methods:{
        redireccionar(opciones){
            if(opciones=='Atras'){
                window.location.href="statusPremio.php"
            }
        },
    calcularStatusUsuario(pedido) {
        if(pedido.fecha_entrega) return "Entregado";
        if (pedido.producto_llego == 1) return "Pte. Repartir";
        if (pedido.fecha_llegada) return "Pte. Llegada";
        if (pedido.oc_generada) return "Pte. Llegada";
        if (pedido.solped) return "Pte. Entrega";
        return "Pte. Solped";
    },
        consultarPremioStatus(){
          axios.post("consultar_status_premio_colaborador.php",{
              id_seguimiento_premio: this.id_seguimiento_premio
          }).then(response =>{
              this.Estatus_premio = response.data


              if(this.Estatus_premio.length > 0){
                  this.pedidoActual = response.data[0]

                  console.log("Pedido:", this.pedidoActual);

                  this.currentStatus = this.calcularStatusUsuario(this.pedidoActual);
                  // this.currentStatus = this.pedidoActual.status

                  console.log("Status usuario:", this.currentStatus);
              }else{
                  this.mostrar = true;
                  this.mensaje = "0 Artículos pendientes."

                  setTimeout(()=>{
                      this.mostrar = false;
                  },3000);
              }
          }).catch(error =>{
              console.log(error)
          })
        },
        formatodeFecha(fecha) {
          if (!fecha) return '';
          let fixed = fecha.replace(/-/g, '/');

          if (fixed.length === 10) {
            fixed += ' 00:00';
          }

          const date = new Date(fixed);
          if (isNaN(date.getTime())) return '';

          const meses = [
            'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
          ];
          const dia = String(date.getDate()).padStart(2, '0');
          const mes = meses[date.getMonth()];
          const anio = date.getFullYear();
          const hora = String(date.getHours()).padStart(2, '0');
          const minutos = String(date.getMinutes()).padStart(2, '0');

          return `${dia} ${mes} ${anio} ${hora}:${minutos}`;
        },
        ObtenerFechaStep(step) {

            if (!this.pedidoActual) return '';

            if (step.key === 'Pte. Entrega') {

                if (
                    this.pedidoActual.oc_generada &&
                    this.pedidoActual.fecha_solped_respaldo
                ) {
                    return this.pedidoActual.fecha_solped_respaldo;
                }

                return this.pedidoActual.fecha_solped || '';
            }

            return this.pedidoActual[step.date] || '';
        },
        getStepState(index) {
            if (index < this.currentIndex) return 'done';
            if (index === this.currentIndex) return 'active';
            return 'pending';
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