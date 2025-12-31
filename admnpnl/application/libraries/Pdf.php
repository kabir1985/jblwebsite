<?php defined('BASEPATH') OR exit('No direct script access allowed');
 //Dompdf namespace use Dompdf\Dompdf;
 use Dompdf\Dompdf;
class Pdf
{ 
public function __construct()
{
require_once dirname(__FILE__).'/Dompdf/autoload.inc.php';
$pdf = new Dompdf();
//$pdf->setChroot('/var/www/html/assets/images/others/');
$pdf->set_option('isRemoteEnabled',TRUE);
$CI = & get_instance();
$CI->dompdf = $pdf; 
} 
} ?>
