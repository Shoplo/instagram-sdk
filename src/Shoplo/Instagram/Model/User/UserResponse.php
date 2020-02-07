<?php

declare(strict_types=1);

namespace Shoplo\Instagram\Model\User;

class UserResponse
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var string|null
     */
    public $biography;

    /**
     * @var string|null
     */
    public $profilePictureUrl;
}
