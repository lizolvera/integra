    <?php
    session_start();
    include_once 'Modelo/clsCliente.php';

    class controladorcliente {
        private $vista;
    
        public function AgregarTareas() {
            $cliente = new clsCliente();
            $datoID = $_SESSION['id'];  // Se obtiene el ID del usuario desde la sesión
    
            if (!empty($_POST)) {
                $idC = $_POST['txtid'];
                $tare = $_POST['txtTarea'];
                $desc = $_POST['txtDescripcion'];
    
                // Realizar la inserción
                $result = $cliente->insertarTareas($tare, $desc, $idC);
    
                // Redireccionar o mostrar un mensaje dependiendo del resultado
                if ($result) {
                    echo "<script>alert('Tarea registrada exitosamente.');</script>";
                } else {
                    echo "<script>alert('Error al registrar la tarea.');</script>";
                }
    
                $vista = "Vistas/Inicio/frmcontenidoCliente.php";
                include_once("Vistas/frmCliente.php");
            } else {
                switch ($_GET['op']) {
                    case 1:
                        $vista = "Vistas/Cliente/frmTareas.php";
                        break;
                    case 2:
                        $vista = "Vistas/Cliente/frmEquipos.php";
                        break;
                    default:
                        $vista = "Vistas/Cliente/frmEstado.php";
                }
                include_once("Vistas/frmCliente.php");
            }
        }
    }    