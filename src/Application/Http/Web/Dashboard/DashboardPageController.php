<?php

namespace Juliana\Cinema\Application\Http\Web\Dashboard;

use Juliana\Cinema\Application\Http\Response;
use Juliana\Cinema\Domain\Dashboard\DashboardService;
use Juliana\Cinema\Framework\Blade\Template;


class DashboardPageController
{
    private Template $template;
    private DashboardService $service;

    public function __construct(DashboardService $service, Template $template)
    {
        $this->service = $service;
        $this->template = $template;
    }

    public function __invoke()
    {
        $dashboard = $this->service->load();

        $content = $this->template->process("dashboard", ["dashboard" => $dashboard]);

        Response::html(200, $content)->render();
    }
}