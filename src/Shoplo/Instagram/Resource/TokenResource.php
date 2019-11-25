<?php

declare(strict_types=1);

namespace Shoplo\Instagram\Resource;

use Shoplo\Instagram\InstagramClient;
use Shoplo\Instagram\Model\Token\TokenResponse;

class TokenResource
{
    /** @var InstagramClient */
    private $instagramClient;

    /**
     * CallbackResource constructor.
     * @param InstagramClient $InstagramClient
     */
    public function __construct(InstagramClient $InstagramClient)
    {
        $this->instagramClient = $InstagramClient;
    }

    private function getExtendTokenUrl(string $exchangeToken)
    {
        return sprintf(
            '/oauth/access_token?grant_type=fb_exchange_token&client_id=%s&client_secret=%s&fb_exchange_token=%s',
            $this->instagramClient->appId,
            $this->instagramClient->appSecret,
            $exchangeToken
        );
    }

    public function exchangeToken(string $exchangeToken): TokenResponse
    {
        return $this->instagramClient->get(
            TokenResponse::class,
            $this->getExtendTokenUrl($exchangeToken)
        );
    }
}
