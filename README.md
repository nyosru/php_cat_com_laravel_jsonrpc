# php-cat-com-laravel-jsonrpc
 функции для работы с json-rpc в ларавели


--- установка ---
composer require php_cat_com/laravel_jsonrpc

--- код использования в контроллере ---

подключите RunController

    use RunController; // ( любой другой, везде замените название )



и в функции запускаем обработку ( приём запроса, отправка в метод класса и возвращаем результат )

    public static function jsonRpcRequest(Request $request, RunController $controller)
    {
        try {
            $result = JsonRpc::sendRequest( $request, $controller );
            return JsonRpc::success($result, $request['id']);
        } catch (\Exception $e) {
            return JsonRpc::error($e->getMessage());
        }
    }