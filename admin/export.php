<?php 

    require_once('../dompdf/autoload.inc.php');
    use Dompdf\Dompdf;

    // create a new instance of Dompdf
    $dompdf = new Dompdf();
    
// set the default font family and size
$dompdf->set_option('defaultFont', 'DejaVu Sans');
$dompdf->set_option('defaultFontSize', 12);

// disable font subsetting
$dompdf->set_option('isFontSubsettingEnabled', false);

    
    // load your HTML content into the Dompdf instance
    $html = '<!DOCTYPE html>
    <html lang="en">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
      body { font-family: DejaVu Sans, sans-serif; }
    </style>
    </head>
    <body>
        <h1>Tiêu đề: '.$_GET['title'].'</h1>
        <h3>
    Mô tả: '.$_GET['alias'].'
        </h3>
        <br>
        <p>Nội dung: '.$_GET['hometext'].'   </p>
    </body>
    </html>';
    $dompdf->loadHtml($html);
    
    // render the PDF
    $dompdf->render();
    
    // output the PDF to the browser
    $dompdf->stream('document.pdf');
    ?>