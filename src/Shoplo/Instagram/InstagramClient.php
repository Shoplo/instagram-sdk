<?php

declare(strict_types=1);

namespace Shoplo\Instagram;

use Symfony\Component\Serializer\SerializerInterface;

class InstagramClient
{
    public const API_BASE_URI = 'https://graph.facebook.com/v5.0/';

    private $requestAdapter;

    private $serializer;

    public function __construct(InstagramAdapterInterface $requestAdapter, SerializerInterface $serializer)
    {
        $this->requestAdapter = $requestAdapter;
        $this->serializer = $serializer;
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
