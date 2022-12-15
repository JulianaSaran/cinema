<?php

namespace Juliana\Cinema\Application\Http;

use Juliana\Cinema\Framework\Session\Session;

class Response
{
    private int $status;
    private string $content;
    private string $type;

    public function __construct(int $status, string $content, string $type)
    {
        $this->status = $status;
        $this->content = $content;
        $this->type = $type;
    }

    public static function json(int $status, $data): Response
    {
        return new Response($status, json_encode($data), 'application/json');
    }

    public static function html(int $status, string $content = ""): Response
    {
        return new Response($status, $content, "text/html");
    }

    public static function redirect(string $location, ?Session $session = null): void
    {
        if($session !== null)
        {
            $_SESSION = array_merge($_SESSION, $session->data);
        }

        $serverName = __BASE_URL__;

        header("HTTP/1.1 301");
        header("Content-Type: text/html");
        header("Location: $serverName/$location");

        exit;
    }

    public function render(?Session $session = null): void
    {
        if($session !== null)
        {
            $_SESSION = $session->data;
        }

        header("HTTP/1.1 $this->status");
        header("Content-Type: $this->type");
        echo $this->content;
        exit;
    }
}