<?php

declare(strict_types=1);

namespace Shoplo\Instagram\Resource;

use Shoplo\Instagram\InstagramClient;
use Shoplo\Instagram\Model\Media\MediaCollectionResponse;
use Shoplo\Instagram\Model\Media\MediaIdCollectionResponse;

class MediaResource
{
    private $instagramClient;

    public function __construct(InstagramClient $InstagramClient)
    {
        $this->instagramClient = $InstagramClient;
    }

    private function getMediaUrl(string $accountId, string $username, int $limit = 50, $after = null): string
    {
        if (null !== $after) {
            return sprintf(
                '%s?fields=business_discovery.username(%s){followers_count,profile_picture_url,media.limit(%s).after(%s){ig_id,comments_count,like_count,caption,media_url,permalink,timestamp,media_type,username,children{media_type,media_url}}}',
                $accountId,
                $username,
                $limit,
                $after
            );
        }

        return sprintf(
            '%s?fields=business_discovery.username(%s){followers_count,profile_picture_url,ig_id,media.limit(%s){comments_count,like_count,caption,media_url,permalink,timestamp,media_type,username,children{media_type,media_url}}}',
            $accountId,
            $username,
            $limit
        );
    }

    public function getMediaIds(string $accountId, $limit = 50): MediaIdCollectionResponse
    {
        return $this->instagramClient->get(
            MediaIdCollectionResponse::class,
            sprintf('%s/media?fields=id,ig_id&limit=%d', $accountId, $limit)
        );
    }

    public function getMedia(string $accountId, string $username, $limit = 50, $after = null): MediaCollectionResponse
    {
        return $this->instagramClient->get(
            MediaCollectionResponse::class,
            $this->getMediaUrl($accountId, $username, $limit, $after)
        );
    }
}
