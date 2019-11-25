<?php

declare(strict_types=1);

namespace Shoplo\Instagram\Model\Token;

class TokenResponse
{
    /**
     * @var string
     */
    public $access_token;

    /**
     * @var string
     */
    public $token_type;

    /**
     * @var integer
     */
    public $expires_in;
}
