<?php
define('URL', 'https://example.com');
define('API_URL', 'https://api.example.com');

define('ROOT_PATH', __DIR__);
define('ENV', 'development');

function __fatalErrorHandler()
{
    $error = error_get_last();

    if ($error !== null && in_array($error['type'],
        array(E_ERROR, E_PARSE, E_CORE_ERROR, E_CORE_WARNING,
            E_COMPILE_ERROR, E_COMPILE_WARNING, E_RECOVERABLE_ERROR))) {

        $message = $error['message'] . ' ' . $error['file'] . ':' . $error['line'];
        echo json_encode([
            'status'  => 'error',
            'code'    => 1003,
            'message' => $message,
        ]);
        die;
    }
}

register_shutdown_function('__fatalErrorHandler');
