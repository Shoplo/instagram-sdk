<?php

declare(strict_types=1);

namespace Shoplo\Instagram\Serializer;

use Shoplo\Instagram\Model\Token\DebugTokenResponse;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class DebugTokenDenormalizer implements DenormalizerInterface
{
    private $normalizer;

    public function __construct(ObjectNormalizer $normalizer)
    {
        $this->normalizer = $normalizer;
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        return $this->normalizer->denormalize($data['data'], $class);
    }

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return $type === DebugTokenResponse::class;
    }
}
