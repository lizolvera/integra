<section class="contacto pb-4">
  <div class="container text-justify">
    <div class="row contactos p-3">
      <div class="col-6 text-center">
        <h2>DEPOSITOS</h2>
        <div class="position-relative d-inline-block">
          <img src="img/tarjeta.png" class="card-img-top img">
          <div id="numeroCuenta" class="position-absolute" style="top: 60%; left: 50%; transform: translate(-50%, -50%); font-size: 34px; color: black;">
            <!-- Aquí se mostrará el número de cuenta -->
          </div>
        </div>
        <p>x</p>
      </div>
      <div class="col-6">
        <form action="/Banco/index?clase=controladorreportes&metodo=reporteCuenta" method="post" name="form1" id="form1" enctype="multipart/form-data">
          
        <div class="form-group">
            <label for="exampleFormControlTextarea1">No. Cuenta</label>
            <input type="text" name="txtNoCuenta" value="<?php echo $numerodeCuenta; ?>" class="form-control" placeholder="Ingresa el No de Cuenta" maxlength="16" onkeypress="return soloNumeros(event)" oninput="actualizarNumeroCuenta(this.value)">
          </div>

          <!-- <div class="form-group">
            <label for="exampleFormControlTextarea1">Ingresa el No. Cuenta</label>
            <input type="text" name="txtNoCuenta" class="form-control" placeholder="Ingresa el No de Cuenta" maxlength="16" onkeypress="return soloNumeros(event)" oninput="actualizarNumeroCuenta(this.value)">
          </div> -->
        
        <!-- <div class="form-group">
            <label for="exampleFormControlTextarea1">Ingresa el No. Cuenta</label>
            <input type="text" name="txtNoCuenta" class="form-control" placeholder="Ingresa el No de Cuenta" oninput="actualizarNumeroCuenta(this.value)">
          </div> -->
          <input type="submit" name="btnVer" value="Ver" class="btn btn-outline-primary">
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