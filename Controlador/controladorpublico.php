<?php
include_once 'Modelo/clslogin.php';

class controladorpublico
{
    private $vista;

    public function inicio()
    {        
        $vista="Vistas/Inicio/frmcontenidopublico.php";
        include_once("Vistas/frmpublica.php");
    }    
    
    public function login()
    {
        $acceso = new clslogin();

        if (!empty($_POST))
        {
            $NOM = $_POST['txtNombre']; // Asegúrate de usar $NOM consistentemente
            $datos = $acceso->ConsultaUsuario($NOM);

            if ($datos) {
                session_start();
                $_SESSION['id'] = $datos['intIdUsuario'];
                $_SESSION['nombre'] = $datos['nombre_completo']; // Asegúrate de usar el nombre correcto del campo

                $vista = "Vistas/Inicio/frmcontenidoCliente.php";
                include_once("Vistas/frmCliente.php");
            } else {
                header("Location: index.php");
            }        
        }
        else
        {
            $vista = "Vistas/Usuario/login.php";
            include_once("Vistas/frmpublica.php");
        }
    }

    public function registrousuarios() {
        $acceso = new clslogin();
    
        if (!empty($_POST)) {
            $nomequipo = $_POST['txtEquipo'];
            $nombre = $_POST['txtNombre'];
            $ap = $_POST['txtAp'];
            $am = $_POST['txtAm'];
        
            $result = $acceso->RegistraUsuario($nomequipo, $nombre, $ap, $am);
    
            if ($result) {
                echo "<script>alert('Cliente registrado exitosamente.');</script>";
            } else {
                echo "<script>alert('Error al registrar el cliente.');</script>";
            }
    
            $vista = "Vistas/Usuario/frmRegistros.php";
            include_once("Vistas/frmpublica.php");
        } else {
            $vista = "Vistas/Usuario/frmRegistros.php";
        }
        include_once("Vistas/frmpublica.php");
    }
}