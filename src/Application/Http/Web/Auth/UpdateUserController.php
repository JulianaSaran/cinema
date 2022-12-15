<?php

namespace Juliana\Cinema\Application\Http\Web\Auth;

use Exception;
use Juliana\Cinema\Application\Http\Response;
use Juliana\Cinema\Domain\User\UpdateUserService;
use Juliana\Cinema\Framework\Session\Session;
use Juliana\Cinema\Infra\User\HttpUserFactory;

class UpdateUserController
{
    private UpdateUserService $service;
    private HttpUserFactory $factory;

    public function __construct(UpdateUserService $service, HttpUserFactory $factory)
    {
        $this->service = $service;
        $this->factory = $factory;
    }

    public function __invoke()
    {
        $user = $this->factory->fromSession();

        try {
            $this->service->update($user->id, $_POST);
        } catch (Exception $e) {
            Response::redirect( "account", Session::danger($e->getMessage()));
        }

        Response::redirect("account", Session::success('Alterado com sucesso'));
    }


}

