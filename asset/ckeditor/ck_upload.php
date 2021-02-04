<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require './../../vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\Route53\Route53Client;
use Aws\S3\Exception\S3Exception;
$bucketName = "dadaji-bhartiya-sanskruti-chair";

// AWS DETAILS
// $CKEditorFuncNum = $_GET['CKEditorFuncNum']; 
// $IAM_KEY = 'AKIAXDGTPD32F4XXZ3SD';
// $IAM_SECRET = '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';

// WASABI DETAILS
$bucketName = 'test-rao';
$IAM_KEY= 'D1LJCO5WO10TNJH4P1YP';
$IAM_SECRET= 'ZbFJouHEB1bn92HbJjhQNyUCd1UT2H1dOEsIBI4D';

$sepext = explode('.', strtolower($_FILES['upload']['name'])); 
$type = end($sepext);    /** gets extension **/ 

$imgset = array( 
    'maxsize' => 2000, 
    'maxwidth' => 1024, 
    'maxheight' => 800, 
    'minwidth' => 10, 
    'minheight' => 10, 
    'type' => array('bmp', 'gif', 'jpg', 'jpeg', 'png'), 
); 

// $s3 = S3Client::factory(array(
//     'region' => 'us-west-2',
//     'version' => '2006-03-01',
//     'use_path_style_endpoint' => true,
//     'credentials' => [
//         'key' => $IAM_KEY,
//         'secret' => $IAM_SECRET,
//     ]
// ));

$s3 = Route53Client::factory(array(
    // 'endpoint' => 's3.wasabisys.com',
    'region' => 'us-east-2',
    'version' => 'latest',
    // 'profile' => 'wasabi',
    'use_path_style_endpoint' => true,
    'credentials' => [
        'key' => $IAM_KEY,
        'secret' => $IAM_SECRET,
    ]
));


try {
    
    $result = $s3->putObject([
        'Bucket' => $bucketName,
        'Key'    => $_FILES['upload']['name'],
        'ACL'    => 'public-read',
        // 'Body' => fopen($_FILES['upload']['tmp_name'], 'r'),
        'SourceFile' => $_FILES['upload']['tmp_name'],
    ]);
    $msg = $type .' successfully uploaded: \\n- Size: '. number_format($_FILES['upload']['size']/1024, 2, '.', '') .' KB'; 

    $url = $result['ObjectURL'];
    $re = in_array($type, $imgset['type']) ? "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>":'<script>var cke_ob = window.parent.CKEDITOR; for(var ckid in cke_ob.instances) { if(cke_ob.instances[ckid].focusManager.hasFocus) break;} cke_ob.instances[ckid].insertHtml(\' \', \'unfiltered_html\'); alert("'. $msg .'"); var dialog = cke_ob.dialog.getCurrent();dialog.hide();</script>'; 
} catch (S3Exception $e) {
    $re = $e->getMessage() . PHP_EOL;
}


@header('Content-type: text/html; charset=utf-8'); 
echo $re;