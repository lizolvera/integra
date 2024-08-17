<?php
session_start();
include_once 'Modelo/clsReportes.php';
include_once 'LibreriaFPDF/fpdf.php';

class controladorreportes
{
    private $vista;

    public function reporteCuenta()
    {    
        $reporte = new clsReportes(); //clase que está en el modelo

        // Esta la copié del controladordecliente xd
        $datoID = $_SESSION['id'];
        
        $numerodeCuenta = $reporte->obtenerNumerodeCuenta($datoID);
        if (!empty($_POST)) {

            // Recibo la caja de texto del formulario html
            $nocuenta = $_POST['txtNoCuenta'];

            // Verificar si el número de cuenta ingresado es igual al del cliente logueado
            if ($nocuenta === $numerodeCuenta) {
            
                // Iniciar el buffer de salida
                ob_start();

                // Crear el objeto FPDF
                $pdf = new FPDF();
                // Agregar una página
                $pdf->AddPage();

                // Ruta absoluta a la imagen
                $imagePath = realpath('./img/Logo1.png'); // Asegúrate de que la ruta sea correcta

                // Verificar si la imagen existe
                if ($imagePath && file_exists($imagePath)) {
                    $pdf->Cell(190, 30, $pdf->Image($imagePath, 130, 12, 60, 30), 0, 1, 'R');
                } else {
                    // Manejar el error de imagen faltante
                    $pdf->SetFont('Arial', 'B', 14);
                    $pdf->Cell(0, 10, 'Logo no disponible', 0, 1, 'R');
                }

                // Establecer la fuente y el tamaño de la fecha
                $pdf->SetFont('Arial', '', 9);
            
                // Agregar la fecha
                $fecha = date("Y-m-d H:i:s");
                $pdf->SetXY(10, 12); // Posicionar la fecha en la esquina superior izquierda
                $pdf->Cell(0, 10, utf8_decode('Fecha: ' . $fecha), 0, 1, 'L');

                // Nombre del estado de cuenta
                $pdf->SetFont('Arial', 'B', 11);
                $pdf->Cell(0, 40, utf8_decode('Estado de cuenta: ' . $_SESSION['nombre']), 0, 1, 'C');
                $pdf->SetFont('Arial', 'B', 12);
                $pdf->Cell(0, 10, utf8_decode('Número de cuenta: ' . $nocuenta), 0, 1, 'C');

                // Consulta a la base de datos
                $Consulta = $reporte->ConsultaCuenta($nocuenta);    

                // Centrar la tabla
                $pdf->SetLeftMargin(35); // Ajustar el margen izquierdo para centrar la tabla
                //por si no a hecho ningun movimiento xd
                if ($Consulta->num_rows > 0) {
                    // Establecer la fuente y el tamaño del encabezado de la tabla
                    $pdf->SetFont('Arial', 'B', 10);
                    // Imprimir los encabezados de la tabla
                    $pdf->Cell(40, 10, 'Cuenta', 1, 0, 'C');
                    $pdf->Cell(40, 10, 'Total $', 1, 0, 'C');
                    $pdf->Cell(40, 10, 'Movimiento', 1, 1, 'C'); // Usar 1 para salto de línea
                    // Establecer la fuente y el tamaño del contenido de la tabla
                    $pdf->SetFont('Arial', '', 10);
                    // Imprimir los datos de la tabla
                    while ($row = $Consulta->fetch_assoc()) {
                        $pdf->Cell(40, 10, $row["vchno_cuenta"], 1, 0, 'L');
                        $pdf->Cell(40, 10, $row["fltTotal"], 1, 0, 'C');
                        $pdf->Cell(40, 10, $row["Movimiento"], 1, 1, 'C'); // Usar 1 para salto de línea
                    }
                    // Salto de línea después de la tabla
                    $pdf->Ln(10);

                    $reporte->conectar->close();
                } else {
                    // Limpiar el buffer de salida y no enviar su contenido al navegador
                    ob_end_clean();
                    ///por si no a hecho ningun movimiento xd
                    echo "<script>alert('Número de cuenta incorrecto, no se encontraron registros.');</script>";
                    $vista = "Vistas/Cliente/frmEstado.php"; 
                    include_once("Vistas/frmCliente.php");
                    return;
                }

                // Limpiar el buffer de salida y no enviar su contenido al navegador
                ob_end_clean();

                // Mostrar el PDF
                $pdf->Output();
            } else {
                ///aca por si el wn elimina la cuenta ya puesta y pone una que no es
                echo "<script>alert('Número de cuenta incorrecto.');</script>";
                $vista = "Vistas/Cliente/frmEstado.php"; 
                include_once("Vistas/frmCliente.php");
                return;
            }
        } else {
            $vista="Vistas/Cliente/frmEstado.php"; 
            include_once("Vistas/frmCliente.php");
        }
    }
}
?>