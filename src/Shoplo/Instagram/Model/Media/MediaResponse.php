<?php

declare(strict_types=1);

namespace Shoplo\Instagram\Model\Media;

class MediaResponse
{
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
     * @var string
     */
    public $thumbnailUrl;

    /**
     * @var string
     */
    public $timestamp;
}
