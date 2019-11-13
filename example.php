<?php

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpClient\ScopingHttpClient;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

require_once __DIR__.'/vendor/autoload.php';

ini_set('display_errors', 'TRUE');
error_reporting(E_ALL);

$accessToken = 'XXX';

$httpClient = new ScopingHttpClient(
    HttpClient::create(), [
    preg_quote(\Shoplo\Instagram\InstagramClient::API_BASE_URI, '') => [
        'base_uri' => \Shoplo\Instagram\InstagramClient::API_BASE_URI,
        'auth_bearer' => $accessToken,
        'headers' => [
            'Content-Type' => 'application/json; charset=utf-8',
        ],
    ],
], preg_quote(\Shoplo\Instagram\InstagramClient::API_BASE_URI, '')
);

$httpAdapter = new \Shoplo\Instagram\HttpClient\HttpClientAdapter($httpClient, $accessToken);
$encoders = [new JsonEncoder()];
$normalizers = [new ObjectNormalizer(), new \Shoplo\Instagram\MediaCollectionDenormalizer()];

$serializer = new Serializer($normalizers, $encoders);
$client = new \Shoplo\Instagram\InstagramClient($httpAdapter, $serializer);

$accountId = '17841404674614432';
$username = 'shoplo.pl';

$mediaResource = new \Shoplo\Instagram\Resource\MediaResource($client);
$rsp = $mediaResource->getMedia($accountId, $username);
print_r($rsp);
exit;
