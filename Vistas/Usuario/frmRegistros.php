<section class="contacto pb-4">
  <div class="container text-justify">
    <div class="row contactos p-3">
      <div class="col-6 text-center">
        <h2>ALTA REGISTRO</h2>
        <div class="position-relative d-inline-block">
          <img src="img/tarjeta.png" class="card-img-top img">
          <div id="numeroCuenta" class="position-absolute" style="top: 60%; left: 50%; transform: translate(-50%, -50%); font-size: 34px; color: black;">
            <!-- Aquí se mostrará el Prestamo -->
          </div>
        </div>
      </div>
      <div class="col-6">

        <form action="index?clase=controladorpublico&metodo=registrousuarios" method="post" name="form1" id="form1" enctype="multipart/form-data">
          

        <div class="form-group">
                <label for="exampleFormControlTextarea1">Ingresa Nombre Equipo</label>
                <input type="text" name="txtEquipo" class="form-control" placeholder="Ingresa el Nombre del Equipo" maxlength="16" onkeypress="return soloLetras(event)">
            </div>


            <div class="form-group">
                <label for="exampleFormControlTextarea1">Ingresa el Nombre</label>
                <input type="text" name="txtNombre" class="form-control" placeholder="Ingresa el Nombre" maxlength="16" onkeypress="return soloLetras(event)">
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Ingresa el Apellido Paterno</label>
                <input type="text" name="txtAp" class="form-control" placeholder="Ingresa el apellido paterno" maxlength="16" onkeypress="return soloLetras(event)">
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Ingresa el Apellido Materno</label>
                <input type="text" name="txtAm" class="form-control" placeholder="Ingresa el apellido materno" maxlength="16" onkeypress="return soloLetras(event)">
            </div>

            
            <input type="submit" name="btnAltaC" value="agregar" class="btn btn-outline-primary">
        </form>

      </div>
    </div>
  </div>
</section>


<script>
  // Función para permitir solo letras en el campo de texto
  function soloLetras(event) {
    var charCode = (event.which) ? event.which : event.keyCode;
    
    // Permitir letras mayúsculas (A-Z), minúsculas (a-z) y espacios (charCode == 32)
    if ((charCode >= 65 && charCode <= 90) || (charCode >= 97 && charCode <= 122) || charCode == 32) {
        return true;
    } else {
        event.preventDefault();
        return false;
    }
}
</script>