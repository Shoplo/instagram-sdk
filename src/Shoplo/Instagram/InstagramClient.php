<?php

declare(strict_types=1);

namespace Shoplo\Instagram;

use Symfony\Component\Serializer\SerializerInterface;

class InstagramClient
{
    public const API_BASE_URI = 'https://graph.facebook.com/v7.0/';

    private $requestAdapter;

    private $serializer;

    /** @var string */
    public $appId;

    /** @var string */
    public $appSecret;

    public function __construct(InstagramAdapterInterface $requestAdapter, SerializerInterface $serializer, string $appId, string $appSecret)
    {
        $this->requestAdapter = $requestAdapter;
        $this->serializer = $serializer;
        $this->appId = $appId;
        $this->appSecret = $appSecret;
    }

    public function get(string $type, string $url, array $parameters = [], array $headers = [])
    {
        $response = $this->requestAdapter->get(
            $url,
            $parameters,
            $headers
        );

        return $this->serializer->deserialize($response, $type, 'json');
    }
}
