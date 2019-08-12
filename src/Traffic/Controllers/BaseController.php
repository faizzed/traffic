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

    protected function getDate($input)
    {
        if(preg_match("/\d{4}-\d{2}-\d{2}/", $input, $match)) {
            if (is_array($match)){
                return $match[0] ?? '';
            }

            return $match;
        }

        return "";
    }

}
