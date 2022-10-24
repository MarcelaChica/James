@extends('layouts.app')
@section('title', __('Welcome'))
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5><span class="text-center fa fa-home"></span> @yield('title')</h5>
                </div>
                <div class="card-body">
                    <h5>
                        @guest

                        <!-- //insertar contenido de pagina// -->
                        <!DOCTYPE html>
                        <html lang="sp">

                        <head>
                            <meta charset="UTF-8">
                            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>James Escuela de Tenis</title>
                            <link rel="stylesheet" href="css/style.css">
                            <link rel="stylesheet" href="css/personalizado.css">
                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
                        </head>

                        <body>


                           
                            <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
                                <!-- <div>
                                <video class="videoIntro" src="video/tenis.mp4" autoplay="true" muted="true" loop="true"></video>
                                </div> -->
                                <header>

                                    <nav class="navbar navbar-light bg-light">
                                        <!-- <div="logo">
                                            <img src="img/logo actualizado y original.png" alt="foto" width="150" height="150">
                                        </div> -->
                                        <div class="container-fluid">
                                            <a class="navbar-brand" href="#">
                                                <img src="/img/logo actualizado y original.png" alt="foto" width="150" height="150" class="d-inline-block align-text-top">
                                            </a>

                                            </div>
                                                
                                            <nav class="navbar navbar-expand-lg navbar-light menuNav">
                                            <div class="container-fluid">

                                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                                <span class="navbar-toggler-icon menuHamb"></span>
                                                </button>
                                                <div class=" navbar-collapse" id="navbarSupportedContent">

                                                <div class=" navbar-collapse" id="navbarSupportedContent">

                                        <div>
                                            <ul>
                                                <li><a href="#header">
                                                        <font color="black"> CONTÁCTANOS</font>
                                                    </a>
                                                </li>
                                                <li><a href="">
                                                        <font color="black"> PREGUNTAS FRECUENTES</font>
                                                    </a>
                                                </li>
                                                <li><a href="about">
                                                        <font color="black"> NOSOTROS</font>
                                                    </a>
                                                </li>
                                                <li><a href="about">
                                                        <font color="black"> RESERVA</font>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>

                                        </div>

                                    
                                    </nav>

                                </header>

                                <br><br><br><br>
                                <br><br><br><br>
                                <br><br><br><br>
                        </div>

                        
                        <center>
                            <section>
                                <div class = "box-container">
                            <h2>CLASES A DOMICILIO SERVICIOS</h2><br>
                            <br> 
                            <div>
                            <img src="/img/icono1.jpg" alt="whatsApp" width="60" height="60">
                                <div class="contenido">
                                    <section id="informacion">
                                        <article class="articulo">
                                            <h3>CATEGORIAS</h3><br>
                                            <a href="">Leer más</a>
                                        </article>
                                        </div><br>

                                        <div>
                                        <img src="/img/icono2.jpg" alt="whatsApp" width="60" height="60">
                                        <article class="articulo">
                                            <h3>PERFILES PROFESORES</h3><br>
                                            <a href="">Leer más</a>
                                        </article>
                                        </div><br>
                                        
                                        <div>
                                        <img src="/img/icono3.jpg" alt="whatsApp" width="60" height="60">
                                        <article class="articulo">
                                            <h3>RESEÑAS DE ALUMNOS</h3><br>
                                            <a href="">Leer más</a>
                                        </article>
                                        </div><br>

                                        <div>
                                        <img src="/img/c3a9dc29-4c92-4669-a622-1044f1cbd0c8.jpg" alt="whatsApp" width="60" height="60">
                                        <article class="articulo">
                                            <h3>GALERIAS</h3><br>
                                            <a href="">Leer más</a>
                                        </article>
                                        </div><br>
                                    </section>
                                </div>
                            </div>
                            </section>
                        </center>
                    

                                <footer>
                                    <div class="final">
                                        <a name="footer">
                                            <br><br><br><br><br><br><br>Contáctanos: +57 (310) 835-4061 <br>
                                            Email: james.escueladetenis@gmail.com &nbsp;
                                            <a href="mailto:james.escueladetenis@gmail.com"> Enviar correo
                                            </a> <br>

                                            <a href="https://instagram.com/james_escuela_de_tenis?igshid=YmMyMTA2M2Y=">
                                                <img src="img/logo-instagram-transparent.png" alt="instagram" width="45" height="45"> &nbsp;&nbsp;
                                            </a>

                                            <img src="/img/logo-whatsapp.png" alt="whatsApp" width="60" height="60">
                                            <br><br><br>copyright - James Escuela de Tenis
                                        </a>
                                    </div>
                                </footer>

                            </div>

                        </body>

                        </html>

                        @else
                        Hola {{ Auth::user()->name }}, Bienvenido a {{ config('app.name', 'Laravel') }}.
                        @endif
                    </h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection