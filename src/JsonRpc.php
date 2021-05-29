<?php

namespace php_cat_com;

/**
 * @final
 */
class JsonRpc
{

    // public static function sendRequest()
    // {
    //     $array = [111];
    //     return $array;
    // }

    const JSON_RPC_VERSION = '2.0';

    public static function success($result, string $id = null)
    {
        return [
            'jsonrpc' => self::JSON_RPC_VERSION,
            'result'  => $result,
            'id'      => $id,
        ];
    }

    public static function error($error)
    {
        return [
            'jsonrpc' => self::JSON_RPC_VERSION,
            'error'  => $error,
            'id'      => null,
        ];
    }

    /**
     * отправляем запрос в нужный метод подключённого класса
     */
    public static function sendRequest($request, $controller)
    {
        if (
            empty($request['method']) ||
            empty($request['params']) ||
            empty($request['id'])
        ) {
            throw new \Exception('Нехватает переменных');
        }

        return $controller->{$request['method']}(...[$request['params']]);
    }

}
