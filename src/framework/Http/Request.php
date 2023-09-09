<?php

namespace src\framework\Http;

use src\framework\Http\Exceptions\Request\UndefinedKeyRequestException;

class Request
{
    private static string $HEADER_JSON = 'application/json';

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

    public static function createFromGlobals(): static
    {
        return new static($_GET, $_POST, $_COOKIE, $_FILES, $_SERVER);
    }

    /**
     * @param string|array $keys
     * @return string|array|UndefinedKeyRequestException
     */
    public function getParams(string|array $keys = ''): string|array|UndefinedKeyRequestException|null
    {
        /** @var array $res */

        if ($keys == '') {
            return $this->params;
        }

        if (is_array($keys)) {
            foreach ($keys as $item) {

                if (is_null($this->params[$item])) {
                    return new UndefinedKeyRequestException("Undefined array key \"$item\".");
                } else {
                    $res[$item] = $this->params[$item];
                }
            }

            return $res;

        } else {

            if (is_null($this->params[$keys])) {
                return new UndefinedKeyRequestException("Undefined array key \"$keys\".");
            }

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

    public function getHeaders(string $key): string|array
    {
        return empty($key) ? $this->server : $this->server[$key];
    }

    public function isJson(): bool
    {
        return $this->server['HTTP_ACCEPT'] == self::$HEADER_JSON;
    }
}