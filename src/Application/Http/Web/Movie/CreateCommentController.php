<?php

namespace Juliana\Cinema\Application\Http\Web\Movie;

use Exception;
use Juliana\Cinema\Application\Http\Response;
use Juliana\Cinema\Domain\Comment\CreateCommentService;
use Juliana\Cinema\Framework\Session\Session;
use Juliana\Cinema\Infra\User\HttpUserFactory;

class CreateCommentController
{
    private CreateCommentService $service;
    private HttpUserFactory $factory;

    public function __construct(CreateCommentService $service, HttpUserFactory $factory)
    {
        $this->service = $service;
        $this->factory = $factory;
    }

    public function __invoke(int $id)
    {
        $user = $this->factory->fromSession();

        try {
            $this->service->create($user, $id, $_POST);
        } catch (Exception $e) {
            Response::redirect("movies/$id", Session::danger($e->getMessage()));
        }

        Response::redirect("movies/$id", Session::success("Comentário adicionado com sucesso"));
    }
}