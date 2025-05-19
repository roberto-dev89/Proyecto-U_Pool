<?php
require('fpdf/fpdf.php');

if (isset($_POST["aa"])) {
    $nombre = $_REQUEST['nombre'];
    $email = $_REQUEST['email'];

    // Crear instancia de FPDF
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, 'Información del Usuario', 0, 1, 'C');
    $pdf->Ln(10);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, 'Nombre: ' . $nombre, 0, 1);
    $pdf->Cell(0, 10, 'Email: ' . $email, 0, 1);

    // Generar nombre de archivo único
    $filename = 'usuario_info_' . time() . '.pdf';

    // Guardar el PDF en el servidor
    $pdf->Output('F', $filename);

    // Descargar el PDF
    header('Content-disposition: attachment; filename=' . $filename);
    header('Content-type: application/pdf');
    readfile($filename);

    // Eliminar el archivo después de la descarga
    unlink($filename);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Generar PDF desde Formulario PHP</title>
</head>
<body>
    <h2>Ingrese la Información:</h2>
    <form action="generar_pdf.php" method="post">
        Nombre: <input type="text" name="nombre"><br>
        Email: <input type="email" name="email"><br>
        <input type="submit" id="aa" name="aa" value="Generar PDF">
    </form>
</body>
</html>
