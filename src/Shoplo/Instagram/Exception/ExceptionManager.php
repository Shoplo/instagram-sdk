<?php

declare(strict_types=1);

namespace Shoplo\Instagram\Exception;

use Symfony\Contracts\HttpClient\ResponseInterface;

class ExceptionManager
{
    public static function throwException(\Throwable $e)
    {
        $body = null;

        if (method_exists($e, 'getResponse')) {
            if ($e->getResponse() instanceof ResponseInterface) {
                $body = $e->getResponse()->toArray(false);
            } else {
                $body = json_decode($e->getResponse()->getBody()->getContents(), true);
            }
        }

        switch ($e->getCode()) {
            case 400:
                throw new ValidationException($e, $body);
                break;
            case 401:
                throw new AuthorizationException($e, $body);
                break;
            case 404:
                throw new NotFoundException($e, $body);
                break;
            case 500:
                throw new BackendException($e, $body);
                break;
            default:
                throw $e;
        }
    }
}
