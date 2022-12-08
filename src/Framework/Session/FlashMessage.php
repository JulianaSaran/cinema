<?php

namespace Juliana\Cinema\Framework\Session;

class FlashMessage
{
    public string $type;
    public string $message;

    public function __construct(string $type, string $message)
    {
        $this->type = $type;
        $this->message = $message;
    }

    public static function fromSession(): FlashMessage
    {
        $type = $_SESSION["type"] ?? "";
        $message = $_SESSION["msg"] ?? "";
        $_SESSION["type"] = "";
        $_SESSION["msg"] = "";

        return new FlashMessage($type, $message);
    }

    public function hasMessage(): bool
    {
        return $this->type !== "" && $this->message !== "";
    }
}