<?php

declare(strict_types=1);

namespace Shoplo\Instagram\Model\Media;

use Shoplo\Instagram\Model\BaseCollectionResponse;

class MediaIdCollectionResponse extends BaseCollectionResponse
{
    /**
     * @var MediaIdResponse[]
     */
    public $data;
}
