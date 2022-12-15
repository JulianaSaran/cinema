<?php

namespace Juliana\Cinema\Domain\User\Auth;

use Exception;
use Juliana\Cinema\Domain\User\UserRepository;

class UpdateUserImageService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function updateImage(int $id, array $files)
    {
        $user = $this->userRepository->loadById($id);

        if (empty($files['image'])) {
            throw new Exception('Imagem não consta');
        }

        $image = $files['image'];

        if ($image['error'] === 1) {
            throw new Exception('Tamanho de imagem excedida');
        }

        if (!file_exists($image['tmp_name'])) {
            throw new Exception('Imagem não encontrada');
        }

        $mimeType = $image['type'];
        $allowedMimeType = ['image/jpeg', 'image/png', 'image/jpg'];

        if (!in_array($mimeType, $allowedMimeType)) {
            throw new Exception('Formato não permitido');
        }

        move_uploaded_file($image['tmp_name'], __PUBLIC_DIR__.'/img/users/'. $image['name']);

        $user->image = $image['name'];

        $this->userRepository->updateImage($user);
    }
}