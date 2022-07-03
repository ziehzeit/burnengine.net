<?php

namespace Ziehzeit\Burnengine\Extensions\Core;

use Exception;
use JetBrains\PhpStorm\Internal\LanguageLevelTypeAware;

class BurnExceptions extends  Exception
{
    private string $url = 'Find the docs at <a href="http://localhost:8080">Docs!</a>';

    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message.$this->getUrl(), $code, $previous);
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }
}