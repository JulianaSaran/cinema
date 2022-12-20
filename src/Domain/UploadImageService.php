<?php

namespace Juliana\Cinema\Domain;

use Exception;

class UploadImageService
{
    public function upload(string $key, string $targetPath)
    {
        if (empty($_FILES[$key])) {
            throw new Exception('Imagem não consta');
        }

        $image = $_FILES[$key];

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

        move_uploaded_file($image['tmp_name'], $targetPath . '/' . $image['name']);

        return $image['name'];
    }

}