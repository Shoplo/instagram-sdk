<?php

declare(strict_types=1);

namespace Shoplo\Instagram\Resource;

use Shoplo\Instagram\InstagramClient;
use Shoplo\Instagram\Model\Media\MediaCollectionResponse;

class MediaResource
{
    /** @var InstagramClient */
    private $getResponseClient;

    /**
     * CallbackResource constructor.
     * @param InstagramClient $InstagramClient
     */
    public function __construct(InstagramClient $InstagramClient)
    {
        $this->getResponseClient = $InstagramClient;
    }

    private function getMediaUrl($accountId, $username, $limit = 50, $after = null)
    {
        if (null !== $after) {
            return sprintf(
                '%s?fields=business_discovery.username(%s){followers_count,media.limit(%s).after(%s){comments_count,like_count,caption,media_url,media_type,children{media_type,media_url}}}',
                $accountId,
                $username,
                $limit,
                $after
            );
        }

        return sprintf(
            '%s?fields=business_discovery.username(%s){followers_count,media.limit(%s){comments_count,like_count,caption,media_url,media_type,children{media_type,media_url}}}',
            $accountId,
            $username,
            $limit
        );
    }

    public function getMedia(string $accountId, string $username, $limit = 50, $after = null): MediaCollectionResponse
    {
        return $this->getResponseClient->get(
            MediaCollectionResponse::class,
            $this->getMediaUrl($accountId, $username, $limit, $after)
        );
    }
}
