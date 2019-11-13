<?php

declare(strict_types=1);

namespace Shoplo\Instagram\Serializer;

use Shoplo\Instagram\Model\Media\MediaCollectionResponse;
use Symfony\Component\Serializer\Normalizer\CacheableSupportsMethodInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class MediaCollectionDenormalizer extends ObjectNormalizer implements CacheableSupportsMethodInterface
{
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        $return = $data;
        if (isset($data['business_discovery']['media']['data'])) {
            $return['paging'] = $data['business_discovery']['media']['paging'] ?? [];
            $return['items'] = $data['business_discovery']['media']['data'];
        } elseif (\array_key_exists('data', $data)) {
            $return['items'] = $data['data'];
        }

        return parent::denormalize($return, $class, $format, $context);

    }

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === MediaCollectionResponse::class;
    }

    public function hasCacheableSupportsMethod(): bool
    {
        return __CLASS__ === \get_class($this);
    }
}
