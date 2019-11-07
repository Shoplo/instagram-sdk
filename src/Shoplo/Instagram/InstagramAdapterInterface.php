<?php

declare(strict_types=1);

namespace Shoplo\Instagram;

interface InstagramAdapterInterface
{
    public function get(string $url, array $parameters = [], array $headers = []);

    public function setAccessToken(string $accessToken): void;
}
