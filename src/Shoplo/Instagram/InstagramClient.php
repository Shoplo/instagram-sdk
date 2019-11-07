<?php

declare(strict_types=1);

namespace Shoplo\Instagram;

use Symfony\Component\Serializer\SerializerInterface;

class InstagramClient
{
    public const API_BASE_URI = 'https://graph.facebook.com/v5.0/';

    /** @var InstagramAdapterInterface */
    public $requestAdapter;

    /** @var SerializerInterface */
    public $serializer;

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

        $implements = class_implements($type);

        if (isset($implements['IteratorAggregate'])) {
            $response = json_decode($response, true);
            if (isset ($response['business_discovery']['media']['data'])) {
                $response['paging'] = $response['business_discovery']['media']['paging'] ?? [];
                $response['items'] = $response['business_discovery']['media']['data'];
            }
            $response = json_encode($response);
        }

        return $this->serializer->deserialize($response, $type, 'json');
    }
}
