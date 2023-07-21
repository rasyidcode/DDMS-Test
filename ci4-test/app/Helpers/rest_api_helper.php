<?php

use CodeIgniter\HTTP\ResponseInterface;

if (!function_exists('send_success')) {
    function send_success(array $data, int $statusCode = ResponseInterface::HTTP_OK): ResponseInterface
    {
        return response()
            ->setContentType('application/json')
            ->setJSON([
                'success'   => true,
                'data'      => $data
            ])
            ->setStatusCode($statusCode);
    }
}

if (!function_exists('send_error')) {
    function send_error(array $errors, int $statusCode = ResponseInterface::HTTP_INTERNAL_SERVER_ERROR): ResponseInterface
    {
        return response()
            ->setContentType('application/json')
            ->setJSON([
                'success'   => false,
                'errors'    => $errors
            ])
            ->setStatusCode($statusCode);
    }
}