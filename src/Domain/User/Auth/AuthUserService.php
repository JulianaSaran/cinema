<?php

namespace Juliana\Cinema\Domain\User\Auth;

use Exception;
use Juliana\Cinema\Domain\User\User;
use Juliana\Cinema\Domain\User\UserRepository;


class AuthUserService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function auth(array $data): User
    {
        //Localizar o usuário por email
         $user = $this->userRepository->loadByEmail($data['email']);

        //Verifica se a senha informada pelo usuário é igual a que está no banco
         if(password_verify($data['password'], $user->password) === false)
         {
             throw new Exception('Senha inválida');
         }

         return $user;
    }
}