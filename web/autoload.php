<?php
header('Access-Control-Allow-Origin: *');
error_reporting(E_ALL);
ini_set('display_errors', '1');
ob_start();

date_default_timezone_set("Asia/Kolkata");
$EntryDate=date('Y-m-d');
$EntryDateTime=date('d-m-Y h:i:s a');
$Months=array('NA','January','February','March','April','May','June','July','August','September','October','November','December');
$Days=array('NA','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');

include_once dirname(__FILE__).'/Components/Sanitize.php';
include_once dirname(__FILE__).'/Components/CSRFToken.php';
include_once dirname(__FILE__).'/session.php';

function printArray($data,$die=false){
    echo '<pre>';
    print_r($data);
    echo '</pre>';
    if($die){
      die();
    }
}

function redirectTo($url){
    header('location:'.$url);
    ob_end_flush(); exit;
}

 function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function getSidebar(){
    includeFileWithVariables(__DIR__.'/Pages/navBar.php');
}

function getTemplateCss(){
    includeFileWithVariables(__DIR__.'/Pages/templateCss.php');
}
function getTemplateJs(){
    includeFileWithVariables(__DIR__.'/Pages/templateJs.php');
}

function getTopbar(){
    includeFileWithVariables(__DIR__.'/Pages/topBar.php');
}
function getFooter(){
    includeFileWithVariables(__DIR__.'/Pages/footer.php');
}

function includeFileWithVariables($filePath, $print = true){
    $output = NULL;
    if(file_exists($filePath)){
        // Extract the variables to a local namespace
        //extract($variables);

        // Start output buffering
        ob_start();

        // Include the template file
        include $filePath;

        // End buffering and return its contents
        $output = ob_get_clean();
    }
    if ($print) {
        print $output;
    }
    return $output;

}

