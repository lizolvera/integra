
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Estilos/bootstrap.min.css" rel="stylesheet">
    <link href="Estilos/style.css" rel="stylesheet">
      
    

    <title> Inicio </title>
</head>

<body>

<!-- Barra superior fija con opciones principales de menú -->
<nav class="cabecera-color navbar navbar-expand-lg navbar-dark p-4 " >
<div class="container">
    
    <a href="#"><img src="img/logo2.jpg" alt="logo black fire" class="tamaño"></a>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-2">
            <li class="nav-item active">
                <a class="nav-link" href="/tareasColaborativas/index?clase=controladorpublico&metodo=inicio">Inicio </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/tareasColaborativas/index?clase=controladorpublico&metodo=registrousuarios">Registrarse</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/tareasColaborativas/index?clase=controladorpublico&metodo=login">Iniciar Sesion</a>
            </li>
           

        </ul>
                
    </div>
</div>
</nav>

       <!-- Este es el cuerpo -->
    <?php include_once($vista); ?> 


<!-- Este es el pie de la pagina -->
<footer>
    <div class="text-center">
        <p> &copy; Sitio desarrollado por Equipo 4 - <?php date('d-m-Y H:i') ?> </p>
    </div>
</footer>

</body>
</html>