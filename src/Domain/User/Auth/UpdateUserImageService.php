<?php

namespace Juliana\Cinema\Domain\User\Auth;

use Exception;
use Juliana\Cinema\Domain\UploadImageService;
use Juliana\Cinema\Domain\User\UserRepository;

class UpdateUserImageService
{
    private UserRepository $userRepository;
    private UploadImageService $uploader;

    public function __construct(UserRepository $userRepository, UploadImageService $uploader)
    {
        $this->userRepository = $userRepository;
        $this->uploader = $uploader;
    }

    public function updateImage(int $id)
    {
        $user = $this->userRepository->loadById($id);
        $user->image = $this->uploader->upload('image', __PUBLIC_DIR__.'/img/users/');

        $this->userRepository->updateImage($user);
    }
}