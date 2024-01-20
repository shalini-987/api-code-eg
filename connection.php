<?php

require 'vendor/autoload.php'; // Include the Composer autoloader

use Aws\S3\S3Client;

// AWS credentials
$accessKey = 'SVIA5MPCT7C7OIXHLSS3';
$secretKey = 'Q+wSbBgJT9XRdKZQB6BVzRJqdP9S2y9Mj4ISwS4J';
$region = 'ap-south-1'; // Update this with your S3 bucket region

// S3 bucket and object details
$bucket = 'ssnimages';
$key = 'logo/SSN+logo+Dark_V2.ai';

// Create an S3 client
$s3 = new S3Client([
    'version' => 'latest',
    'region' => $region,
    'credentials' => [
        'key' => $accessKey,
        'secret' => $secretKey,
    ],
]);

// Specify the save path on your local machine
$localFilePath = '/path/to/save/SSN_logo_Dark_V2.ai';

// Download the file from S3
try {
    $result = $s3->getObject([
        'Bucket' => $bucket,
        'Key' => $key,
        'SaveAs' => $localFilePath,
    ]);

    echo 'File downloaded successfully.' . PHP_EOL;
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage() . PHP_EOL;
}
