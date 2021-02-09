<?php

declare(strict_types=1);

namespace Shoplo\Instagram\Serializer;

use Shoplo\Instagram\Model\Media\MediaResponse;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class MediaDenormalizer implements DenormalizerInterface
{
    private $normalizer;

    public function __construct(ObjectNormalizer $normalizer)
    {
        $this->normalizer = $normalizer;
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        /** @var MediaResponse $mediaResponse */
        $mediaResponse = $this->normalizer->denormalize($data, $class);

        return $mediaResponse;
    }

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === MediaResponse::class;
    }
}
