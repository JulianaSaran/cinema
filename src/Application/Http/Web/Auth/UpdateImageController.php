<?php

namespace Juliana\Cinema\Application\Http\Web\Auth;

use Exception;
use Juliana\Cinema\Application\Http\Response;
use Juliana\Cinema\Domain\User\Auth\UpdateUserImageService;
use Juliana\Cinema\Framework\Session\Session;
use Juliana\Cinema\Infra\User\HttpUserFactory;

class UpdateImageController
{
    private UpdateUserImageService $service;
    private HttpUserFactory $factory;

    public function __construct(UpdateUserImageService $service, HttpUserFactory $factory)
    {
        $this->service = $service;
        $this->factory = $factory;
    }

    public function __invoke()
    {
        $user = $this->factory->fromSession();

        try {
            $this->service->updateImage($user->id, $_FILES);
        } catch (Exception $e) {
            Response::redirect("account", Session::danger($e->getMessage()));
        }

        Response::redirect("account", Session::success('Atualizado com sucesso'));

    }
}
