<?php

namespace Juliana\Cinema\Framework\Session;

class Session
{
    public array $data = [];

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public static function success(string $message, array $data = []): Session
    {
        return new Session(
            array_merge(
                ['type' => 'success', 'msg' => $message],
                $data,
            ),
        );
    }

    public static function danger(string $message): Session
    {
        return new Session([
            'type' => 'danger',
            'msg' => $message,
        ]);
    }

    public static function info(string $message): Session
    {
        return new Session([
            'type' => 'info',
            'msg' => $message,
        ]);
    }
}