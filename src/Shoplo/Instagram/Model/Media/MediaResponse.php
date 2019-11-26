<?php

declare(strict_types=1);

namespace Shoplo\Instagram\Model\Media;

class MediaResponse
{
    public const TYPE_VIDEO = 'VIDEO';

    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $caption;

    /**
     * @var MediaCollectionResponse|null
     */
    public $children;

    /**
     * @var integer
     */
    public $commentsCount;

    /**
     * @var integer
     */
    public $likeCount;

    /**
     * @var string
     */
    public $mediaType;

    /**
     * @var string
     */
    public $mediaUrl;

    /**
     * @var string
     */
    public $permalink;

    /**
     * @var string|null
     */
    public $thumbnailUrl;

    /**
     * @var \DateTimeInterface
     */
    public $timestamp;

    /**
     * @var string
     */
    public $username;

    /**
     * @var string|null
     */
    public $avatarUrl;
}
