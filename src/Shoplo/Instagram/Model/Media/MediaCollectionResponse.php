<?php

declare(strict_types=1);

namespace Shoplo\Instagram\Model\Media;

use Shoplo\Instagram\Model\BaseCollectionResponse;

class MediaCollectionResponse extends BaseCollectionResponse
{
    /**
     * @var MediaResponse[]
     */
    public $items;
}