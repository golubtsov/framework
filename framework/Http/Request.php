<?php

namespace Framework\Http;

use Exception;
use Framework\Http\Exceptions\Request\UndefinedKeyRequest;

class Request
{
    /**
     * @param array $params
     * @param array $postData
     * @param array $cookies
     * @param array $files
     * @param array $server
     */
    public function __construct(
        private readonly array $params,
        private readonly array $postData,
        private readonly array $cookies,
        private readonly array $files,
        private readonly array $server,

    )
    {}

    /**
     * @return static
     */

    public static function createFromGlobals(): static
    {
        return new static($_GET, $_POST, $_COOKIE, $_FILES, $_SERVER);
    }

    /**
     * @param string|array $keys
     * @return string|array
     * @throws UndefinedKeyRequest
     */
    public function getParams(string|array $keys): string|array
    {
        /** @var array $res */

        if (is_array($keys)) {
            foreach ($keys as $item) {

                if (is_null($this->params[$item])) {
                    throw new UndefinedKeyRequest("Undefined array key \"$item\".");
                } else {
                    $res[$item] = $this->params[$item];
                }
            }

            return $res;

        } else {
            return $this->params[$keys];
        }
    }

    public function getMethod(): string
    {
        return $this->server['REQUEST_METHOD'];
    }

    public function getUrl(): string
    {
        return $this->server['REQUEST_URI'];
    }

    public function getFormDataAll(): array
    {
        return $this->postData;
    }

    public function getFormData(string $key):string
    {
        return $this->postData[$key];
    }

    public function getCookies(): array
    {
        return $this->cookies;
    }

    public function getCookie(string $key)
    {
        return $this->cookies[$key];
    }

    public function getFile(string $key)
    {
        return $this->files[$key];
    }
}