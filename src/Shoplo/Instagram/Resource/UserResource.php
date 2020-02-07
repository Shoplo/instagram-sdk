<?php

declare(strict_types=1);

namespace Shoplo\Instagram\Resource;

use Shoplo\Instagram\InstagramClient;
use Shoplo\Instagram\Model\User\UserResponse;

class UserResource
{
    private $instagramClient;

    public function __construct(InstagramClient $InstagramClient)
    {
        $this->instagramClient = $InstagramClient;
    }

    private function getUserUrl(string $accountId): string
    {
        return \sprintf(
            '%s?fields=id,biography,profile_picture_url',
            $accountId
        );
    }

    public function getUser(string $accountId): UserResponse
    {
        return $this->instagramClient->get(
            UserResponse::class,
            $this->getUserUrl($accountId)
        );
    }
}
