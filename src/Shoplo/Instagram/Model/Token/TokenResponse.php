<?php

declare(strict_types=1);

namespace Shoplo\Instagram\Model\Token;

class TokenResponse
{
    /**
     * @var string
     */
    public $accessToken;

    /**
     * @var string
     */
    public $tokenType;

    /**
     * @var integer
     */
    public $expiresIn;
}
