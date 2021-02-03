<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require './../../vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;


$bucketName = 'ckeditor';
// $bucketName = "rao-learning-buket";
$IAM_KEY = 'W7LDE7KT64ISVKOY040W';
$IAM_SECRET = 'FJK9KoiB5p89GlFqteA3p8OAdpOpSlw73ShaoWZX';

// $IAM_KEY = 'AKIAXDGTPD32F4XXZ3SD';
// $IAM_SECRET = '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';

$s3 = S3Client::factory(array(
    'endpoint' => 's3.wasabisys.com',
    'region' => 'us-west-1',
    'version' => '2006-03-01',
    'use_path_style_endpoint' => true,
    'credentials' => [
        'key' => 'W7LDE7KT64ISVKOY040W',
        'secret' => 'FJK9KoiB5p89GlFqteA3p8OAdpOpSlw73ShaoWZX',
    ]
));

// $s3 = S3Client::factory(array(
//     'region' => 'us-east-2',
//     'version' => '2006-03-01',
//     'use_path_style_endpoint' => true,
//     'credentials' => [
//         'key' => $IAM_KEY,
//         'secret' => $IAM_SECRET,
//     ]
// ));


try {
    $objects = $s3->listObjects([
        'Bucket' => $bucketName
    ]);
    $objectArray = array();
    foreach ($objects as $object) {
        $objectArray[] = $object;
    }

    print_r($objectArray);
    // $result = $s3->putObject([
    //     'Bucket' => $bucketName,
    //     'Key'    => "yash_shukla.text",
    //     'Body'   => 'Yash CHeck',
    //     'ACL'    => 'public-read'
    // ]);

    // echo $result['ObjectURL'] . PHP_EOL;
} catch (S3Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}
