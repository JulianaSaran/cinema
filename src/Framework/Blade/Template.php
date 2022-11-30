<?php

namespace Juliana\Cinema\Framework\Blade;

use Jenssegers\Blade\Blade;

class Template
{
    private const ROOT_DIR = __DIR__ . '/../../..';

    private Blade $blade;

    public function __construct()
    {
        $this->blade = new Blade(self::ROOT_DIR . '/templates', self::ROOT_DIR . '/var/cache');
    }

    public function process(string $view, array $data = []): string
    {
        return $this->blade->render($view, $data);
    }
}