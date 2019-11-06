<?php

declare(strict_types=1);

namespace Shoplo\Instagram\Exception;

class BaseException extends \Exception
{
    protected $responseParsed;

    public function __construct(\Throwable $previous, $body = null)
    {
        $code = $previous->getCode();
        $msg = $previous->getMessage();
        if (null !== $body) {
            $msg = $body['error']['message'];
        }
        $this->responseParsed = serialize($body);
        parent::__construct(
            $msg,
            $code,
            $previous
        );
    }

    /**
     * @return string[]
     */
    public function getResponseParsed(): array
    {
        return unserialize($this->responseParsed);
    }
}