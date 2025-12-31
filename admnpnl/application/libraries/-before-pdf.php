<?php

/* defined('BASEPATH') OR exit('No direct script access allowed');

  class pdf extends CI_Controller {

  public function __construct() {
  parent::__construct();
  require_once dirname(__FILE__) . '/dompdf/autoload.inc.php';
  $pdf = new DOMPDF();
  $CI = & get_instance();
  $CI->dompdf = $pdf;
  }

  }

  defined('BASEPATH') OR exit('No direct script access allowed');

  use Dompdf\Dompdf;
  class pdf  extends Dompdf{

  public function __construct() {
  require_once dirname(__FILE__) . '/dompdf/autoload.inc.php';
  $pdf = new DOMPDF();
  $CI = & get_instance();
  $CI->dompdf = $pdf;
  }

  }

  ?> */


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

class pdf extends Dompdf {

    public function __construct() {
        parent::__construct();
    }

    function createPDF($html, $filename = '', $download = TRUE, $paper = 'A4', $orientation = 'portrait') {
        $dompdf = new Dompdf();
        $dompdf-> set_option('isRemoteEnabled',TRUE);
        $dompdf->load_html($html);
        $dompdf->set_paper($paper, $orientation);
        $dompdf->render();
        if ($download) {
            $dompdf->stream($filename . '.pdf', array('Attachment' => 1));
        } else {
            $dompdf->stream($filename . '.pdf', array('Attachment' => 0));
        }
    }

}

?>