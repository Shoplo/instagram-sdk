<?php

declare(strict_types=1);

namespace Shoplo\Instagram\Serializer;

use Shoplo\Instagram\Model\Media\MediaCollectionResponse;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class MediaCollectionDenormalizer implements DenormalizerInterface
{
    private $normalizer;

    public function __construct(ObjectNormalizer $normalizer)
    {
        $this->normalizer = $normalizer;
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        $return = [];

        if (\array_key_exists('data', $data)) {
            $return['items'] = $data['data'];
        }

        return $this->normalizer->denormalize($return, $class);
    }

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === MediaCollectionResponse::class;
    }
}
