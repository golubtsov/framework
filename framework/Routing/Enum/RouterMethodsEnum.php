<?php

namespace Framework\Routing\Enum;

class RouterMethodsEnum
{
    const GET = 'GET';
    const POST = 'POST';
    const PUT = 'PUT';
    const DELETE = 'DELETE';

    public static function getMethods(): array
    {
        return [
            RouterMethodsEnum::GET,
            RouterMethodsEnum::POST,
            RouterMethodsEnum::PUT,
            RouterMethodsEnum::DELETE
        ];
    }
}