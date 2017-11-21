 <?php
    require('phpToPDF.php');
    ob_start();
    include('Estadisticas.php');
    $my_html = ob_get_clean();
    $pdf_options = array(
      "source_type" => 'html',
      "source" => $my_html,
      "action" => 'save',
      "save_directory" => '/my_pdfs',
      "file_name" => 'Estadisticas.pdf');
    phptopdf($pdf_options);
?> 