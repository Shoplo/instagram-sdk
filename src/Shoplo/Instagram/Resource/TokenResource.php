<?php

declare(strict_types=1);

namespace Shoplo\Instagram\Resource;

use Shoplo\Instagram\InstagramClient;
use Shoplo\Instagram\Model\Token\DebugTokenResponse;
use Shoplo\Instagram\Model\Token\TokenResponse;

class TokenResource
{
    private $instagramClient;

    public function __construct(InstagramClient $InstagramClient)
    {
        $this->instagramClient = $InstagramClient;
    }

    private function getExtendTokenUrl(string $tokenToExchange): string
    {
        return sprintf(
            '/oauth/access_token?grant_type=fb_exchange_token&client_id=%s&client_secret=%s&fb_exchange_token=%s',
            $this->instagramClient->appId,
            $this->instagramClient->appSecret,
            $tokenToExchange
        );
    }

    private function getDebugTokenUrl(string $tokenToDebug, string $appAccessToken): string
    {
        return sprintf(
            '/debug_token?input_token=%s&access_token=%s',
            $tokenToDebug,
            $appAccessToken
        );
    }

    private function getAppAccessTokenUrl(): string
    {
        return sprintf(
            '/oauth/access_token?grant_type=client_credentials&client_id=%s&client_secret=%s&',
            $this->instagramClient->appId,
            $this->instagramClient->appSecret
        );
    }

    public function exchangeToken(string $tokenToExchange): TokenResponse
    {
        return $this->instagramClient->get(
            TokenResponse::class,
            $this->getExtendTokenUrl($tokenToExchange)
        );
    }

    public function debugToken(string $tokenToDebug, string $appAccessToken): DebugTokenResponse
    {
        return $this->instagramClient->get(
            DebugTokenResponse::class,
            $this->getDebugTokenUrl($tokenToDebug, $appAccessToken)
        );
    }

    public function appAccessToken(): TokenResponse
    {
        return $this->instagramClient->get(
            TokenResponse::class,
            $this->getAppAccessTokenUrl()
        );
    }
}
