function soloNumeros(event) {
    var charCode;
    if (event.which) {
        charCode = event.which;
    } else {
        charCode = event.keyCode;
    }

    if (charCode < 48 || charCode > 57) {
        event.preventDefault();
        return false;
    }

    return true;
}

function actualizarNumeroCuenta(valor) {
    document.getElementById('numeroCuenta').textContent = valor;
}
