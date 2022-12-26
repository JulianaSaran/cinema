<?php

namespace Juliana\Cinema\Application\Http\Web\Movie;

use Juliana\Cinema\Application\Http\Response;
use Juliana\Cinema\Domain\Category\ListCategoryService;
use Juliana\Cinema\Domain\Movie\MovieDetailedService;
use Juliana\Cinema\Framework\Blade\Template;

class UpdatePageController
{
    private MovieDetailedService $movieService;
    private ListCategoryService $categoryService;
    private Template $template;

    public function __construct(MovieDetailedService $movieService,
                                ListCategoryService  $categoryService,
                                Template             $template)
    {
        $this->categoryService = $categoryService;
        $this->template = $template;
        $this->movieService = $movieService;
    }

    public function __invoke(int $id)
    {
        $movie = $this->movieService->getMovie($id);
        $categories = $this->categoryService->getAll();

        $content = $this->template->process("dashboard.editMovie", ['movie' => $movie, 'categories' => $categories]);

        Response::html(200, $content)->render();
    }

}