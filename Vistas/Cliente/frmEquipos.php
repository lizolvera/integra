<section class="contacto pb-4">
  <div class="container text-justify">
    <div class="row contactos p-3">
      <div class="col-6 text-center">
        <h2>REGISTRO EQUIPOS</h2>
        
        <div class="position-relative d-inline-block">
          <img src="img/img7.jpg" class="card-img-top img">
          <div id="numeroCuenta" class="position-absolute" style="top: 60%; left: 50%; transform: translate(-50%, -50%); font-size: 34px; color: black;">
            <!-- Aquí se mostrará el número de cuenta -->
          </div>
        </div>
      </div>
      <div class="col-6">
        <form action="/tareasColaborativas/index?clase=controladorequipo&metodo=CrearEquipos" method="post" name="form1" id="form1" enctype="multipart/form-data">

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Id Usuario</label>
            <input type="text" name="txtid" value="<?php echo $datoID; ?>" class="form-control" placeholder="ingresa tu id" maxlength="4" onkeypress="return soloNumeros(event)">
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Nombre del equipo</label>
            <input type="text" name="txtnombre" class="form-control" placeholder="ingresa el nombre del equipo" maxlength="50" pattern="[A-Za-z ]*" title="Solo se permiten letras">
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Descripcion del equipo</label>
            <input type="textbox" name="txtDescripcion" class="form-control" placeholder="Ingresa la descripcion del equipo" maxlength="100" onkeypress="return soloNumeros(event)" oninput="actualizarNumeroCuenta(this.value)">
          </div>

          <input type="submit" name="btnRetirar" value="Retirar" class="btn btn-outline-primary">
        </form>
      </div>
    </div>
  </div>
</section>

<script>
  // Función para actualizar el número de cuenta en la imagen de la tarjeta
  function actualizarNumeroCuenta(valor) {
    document.getElementById('numeroCuenta').textContent = valor;
  }

  // Al cargar la página, actualizar el número de cuenta en la imagen de la tarjeta
  document.addEventListener('DOMContentLoaded', function() {
    var numeroCuenta = "<?php echo $numerodeCuenta; ?>";
    actualizarNumeroCuenta(numeroCuenta);
  });

  // Función para permitir solo números en el campo de texto
  function soloNumeros(event) {
    var charCode = (event.which) ? event.which : event.keyCode;
    if (charCode < 48 || charCode > 57) {
        event.preventDefault();
        return false;
    }
    return true;
  }
</script>
