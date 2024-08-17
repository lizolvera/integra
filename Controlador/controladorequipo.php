<?php
    session_start();
    include_once 'Modelo/clsequipo.php';

    class controladorequipo
    {
        private $vista;
    
        public function CrearEquipos() {
            $equipo = new clsequipo();
            $datoID = $_SESSION['id'];  // Se obtiene el ID del usuario desde la sesión
        
            if (!empty($_POST)) {
                $idUsuario = $_POST['txtid'];        // ID del usuario
                $NombreEquipo = $_POST['txtnombre']; // Nombre del equipo
                $Descripcion = $_POST['txtDescripcion']; // Descripción del equipo
        
                // Realizar la inserción
                $result = $equipo->InsertarEquipos($NombreEquipo, $Descripcion, date('Y-m-d'), $idUsuario);
        
                // Redireccionar o mostrar un mensaje dependiendo del resultado
                if ($result) {
                    echo "<script>alert('Equipo registrado exitosamente.');</script>";
                } else {
                    echo "<script>alert('Error al registrar el equipo.');</script>";
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