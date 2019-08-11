<?php

namespace Traffic\Controllers;

class BaseController
{

    protected function success(array $data, string $message = '', int $code = 200)
    {
        return [
            'data' => $data,
            'message' => $message,
            'code' => $code
        ];
    }

    protected function error(string $message = 'Bad Request', int $code = 400)
    {
        return [
            'message' => $message,
            'code' => $code
        ];
    }

}
