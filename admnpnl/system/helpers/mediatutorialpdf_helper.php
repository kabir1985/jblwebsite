<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

function generate_pdf($object, $filename='', $direct_download=TRUE)
{
 require_once("dompdf/dompdf_config.inc.php");
 //
 $dompdf= new DOMPDF();
 $dompdf->load_html($object);
 $dompdf->render();
 //
 if($direct_download == TRUE)
 	$dompdf->stream($filename);
 else
 	return $dompdf->output();	
}

function generate_pdf_landscape($object, $filename='', $direct_download=TRUE)
{
 require_once("dompdf/dompdf_config.inc.php");
 //
 $dompdf= new DOMPDF();
 $dompdf->load_html($object);
 $dompdf->set_paper("a4", "landscape" );
 $dompdf->render();
 //
 if($direct_download == TRUE)
 	$dompdf->stream($filename);
 else
 	return $dompdf->output();	
}

function generate_pdf_landscape_legal($object, $filename='', $direct_download=TRUE)
{
 require_once("dompdf/dompdf_config.inc.php");
 //
 $dompdf= new DOMPDF();
 $dompdf->load_html($object);
 $dompdf->set_paper("legal", "landscape" );
 $dompdf->render();
 //
 if($direct_download == TRUE)
 	$dompdf->stream($filename);
 else
 	return $dompdf->output();
    
}

function pdf_create($html, $filename='', $stream=TRUE) 
{
    require_once("dompdf/dompdf_config.inc.php");
    $savein = 'pdf/report_doc/';
    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    $dompdf->set_paper("legal", "landscape" );
    $dompdf->render();

    $pdf = $dompdf->output();      // gets the PDF as a string

    file_put_contents($savein.str_replace("/","-",$filename), $pdf);    // save the pdf file on server
    
    unset($html);
    unset($dompdf); 

}


?>