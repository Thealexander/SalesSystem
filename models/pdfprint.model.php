<?php
//TODO: Corregir
  require_once '../include/vendor/autoload.php';
  use Dompdf\Dompdf;
  use Dompdf\Options;

class PdfPrint extends Conexion {
    public function generatePdfVenta($ventId) {
        try {
            $options = new Options();
            $options->set('isHtml5ParserEnabled', true);
            $options->set('isPhpEnabled', true);
            $options->set('isRemoteEnabled', true);

            $dompdf = new Dompdf($options);

            $css = file_get_contents('../assets/css/stylepdf.css');

            $ventaModel = new Sales();
            $cabezera = $ventaModel->getVenta($ventId);

            // Initialize variables
            $documento = '';
            $empresa = '';
            $empresaruc = '';
            $empresacorreo = '';
            $empresatelf = '';
            $clinom = '';
            $cliruc = '';
            $clidirecc = '';
            $clicorreo = '';
            $fechcrea = '';
            $pago = '';
            $subtotal = '';
            $igv = '';
            $total = '';

            foreach ($cabezera as $rowc) {
                $documento = $rowc["DOC_NOM"];
                $empresa = $rowc["EMP_NOM"];
                $empresaruc = $rowc["EMP_RUC"];
                $empresacorreo = $rowc["EMP_CORREO"];
                $empresatelf = $rowc["EMP_TELF"];
                $clinom = $rowc["CLI_NOM"];
                $cliruc = $rowc["CLI_RUC"];
                $clidirecc = $rowc["CLI_DIRECC"];
                $clicorreo = $rowc["CLI_CORREO"];
                $fechcrea = $rowc["FECH_CREA"];
                $pago = $rowc["PAG_NOM"];
                $subtotal = $rowc["VENT_SUBTOTAL"];
                $igv = $rowc["VENT_IGV"];
                $total = $rowc["VENT_TOTAL"];
            }

            $detalle = $ventaModel->getVentaDetalle($ventId);
            $tbody = "";
            foreach ($detalle as $row) {
                $tbody .= '
                    <tr>
                        <td class="service">' . $row["CAT_NOM"] . '</td>
                        <td class="desc">' . $row["PROD_NOM"] . '</td>
                        <td class="service">' . $row["UND_NOM"] . '</td>
                        <td class="unit">' . $row["PROD_PVENTA"] . '</td>
                        <td class="qty">' . $row["DETV_CANT"] . '</td>
                        <td class="total">' . $row["DETV_TOTAL"] . '</td>
                    </tr>
                ';
            }

            // HTML content
            $html = '
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="utf-8">
                    <title>v-' . $ventId . '</title>
                    <style>' . $css . '</style>
                </head>
                <body>
                    <!-- Your HTML content here -->
                </body>
                </html>
            ';

            $dompdf->loadHtml($html);
            $dompdf->render();

            // Headers for PDF
            header('Content-Type: application/pdf');
            header('Content-Disposition: inline; filename=v-' . $ventId . '.pdf');
            header('Cache-Control: public, must-revalidate, max-age=0');
            header('Pragma: public');

            // Output PDF to the browser
            $fileLocation = "../assets/pdf/venta/v-" . $ventId . ".pdf";
            $dompdf->output();
            file_put_contents($fileLocation, $dompdf->output());

            exit();
        } catch (Exception $e) {
            // Handle the exception gracefully
            error_log("Error generating PDF: " . $e->getMessage());
            // Redirect or display an error message to the user
            exit("An error occurred while generating the PDF.");
        }
    }
}

?>