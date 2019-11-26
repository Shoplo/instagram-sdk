<?php

declare(strict_types=1);

namespace Shoplo\Instagram\Model\Token;

class DebugTokenResponse
{
    /**
     * @var string
     */
    public $type;

    /**
     * @var integer
     */
    public $dataAccessExpiresAt;

    /**
     * @var integer
     */
    public $expiresAt;
}
