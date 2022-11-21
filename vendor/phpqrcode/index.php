<?php    
    $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    $PNG_WEB_DIR = 'temp/';
    include "qrlib.php";    
    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);    
    $filename = $PNG_TEMP_DIR.'test.png';
    $errorCorrectionLevel = 'L';
    $matrixPointSize = 20;
    if (isset($_REQUEST['size']))
        $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 10);
    if (isset($_REQUEST['data'])) {    
        QRcode::png($_REQUEST['data'], $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
        
    } else {    
        QRcode::png('PHP QR Code :)', $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
    }    
        
    //display generated file
    echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" />';
    ?>