<?php

namespace Juliana\Cinema\Application\Http\Web\Movie;

use Juliana\Cinema\Application\Http\Response;
use Juliana\Cinema\Domain\Category\ListCategoryService;
use Juliana\Cinema\Framework\Blade\Template;

class NewMovieController
{
    private ListCategoryService $service;
    private Template $template;

    public function __construct(ListCategoryService $service, Template $template)
    {
        $this->service = $service;
        $this->template = $template;
    }

    public function __invoke()
    {
        $categories = $this->service->getAll();
        $content = $this->template->process("dashboard.new", ['categories' => $categories]);

        Response::html(200, $content)->render();
    }
}
