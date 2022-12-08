<?php

namespace Juliana\Cinema\Framework\Blade;

use Exception;
use Jenssegers\Blade\Blade;
use Juliana\Cinema\Infra\User\HttpUserFactory;

class Template
{
    private const ROOT_DIR = __DIR__ . '/../../..';

    private Blade $blade;
    private HttpUserFactory $userFactory;

    public function __construct(HttpUserFactory $userFactory)
    {
        $this->blade = new Blade(self::ROOT_DIR . '/templates', self::ROOT_DIR . '/var/cache');
        $this->userFactory = $userFactory;
    }

    public function process(string $view, array $data = []): string
    {
        try {
            $user = $this->userFactory->fromSession();
        } catch (Exception) {
            $user = null;
        }

        return $this->blade->render($view, array_merge($data, [
            "user" => $user,
            ]));
    }
}