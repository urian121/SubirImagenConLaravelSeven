<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="shortcut icon" href="{{ asset ('img/logo-mywebsite-urian-viera.svg') }}"/>
    <title>Subir Imagen con Laravel 7 :: WebDeveloper Urian Viera</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/picnic.min.css') }}">


    <!---Notificaciones en Bootstrap ---->
    <link rel="stylesheet" href="{{ asset('css/Lobibox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/notifications.css') }}">
    <style>
      #capa{
        background-color: #ccc;
        color: crimson;
        font-weight: bold;
        padding: 5px 0px;
      }
      .foto{
        width: 100%;
        width: 100px !important;
        max-height: 200px;
      }
    .miniprofile {
    border-radius: 50%;    /* Make it a circle */
    margin: 0 auto;        /* Center horizontally */
    width: 30%;            /* 60% width */
    padding-bottom: 30%;   /* 60% height */
    }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top" style="background-color: #563d7c !important;">
    <span class="navbar-brand">
        <img src="{{ asset ('img/logo-mywebsite-urian-viera.svg') }}" alt="Web Developer Urian Viera" width="120">
        Web Developer Urian Viera
    </span>
</nav>


<div class="container top">

<h3 class="text-center mt-5">
    <br> Como Subir Imagen usando 
    <span style="color: #ff2d20;">
        <img src="{{ asset('img/laravel.png') }}" alt="laravel" width="120px">
    </span>
</h3>

<div class="row text-center" id="capa">
  <div class="col-md-6"> 
    <span>Registrar Imagen</span>
  </div>
  <div class="col-md-6"> 
    <span>Lista de Imagenes</span>
  </div>
</div>
<hr>


<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="body">
      <div class="row clearfix">
        <div class="col-sm-6">
        <form method="POST" action="{{ route('guardarImgTwo') }}" class="login-form" enctype="multipart/form-data">
            @csrf
              <div class="row">
                <div class="col-md-12">
                      <label class="dropimage miniprofile">
                        <input title="Hacer Click aqui" type="file" name="nombreImg" accept="image/*" required="true">
                      </label>
                </div>
                <div class="col-md-12 text-center p-5">
                  <button class="btn btn-success">Subir Fotos</button>
                </div>
              </div>  
          </form>
         </div>
          <div class="col-sm-6">
              <div class="row">
                  @foreach ($imagenes as $imagen)
                    <div class="col-md-4 p-2">
                      <img src="/fotos/{{ $imagen->nombreImg }}" alt="Foto" class="foto">
                    </div>
                  @endforeach
              </div>
          </div>
      </div>
           


    </div>
  </div>
</div>


</div>


<script src="{{ asset('js/jquery-3.5.1.js') }}"></script>  
<script src="{{ asset('js/bootstrap.min.js') }}"></script> 

<!--- Notificacion en Bootstrap --->
<script src="{{ asset('js/Lobibox.js') }}"></script>
<script src="{{ asset('js/notification-active.js') }}"></script>

<script type="text/javascript">
document.addEventListener("DOMContentLoaded", function() {
  [].forEach.call(document.querySelectorAll('.dropimage'), function(img){
    img.onchange = function(e){
      var inputfile = this, reader = new FileReader();
      reader.onloadend = function(){
        inputfile.style['background-image'] = 'url('+reader.result+')';
      }
      reader.readAsDataURL(e.target.files[0]);
    }
  });
});
</script>
</body>
</html>