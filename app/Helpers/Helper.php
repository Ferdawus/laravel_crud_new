<?php
    declare(strict_types=1);
    function send_ms(string $msg, bool $status, int $code){
        $res=[
            'status'     => $status,
            'message'    => $msg,
        ];

        return response()->json($res,$code);
    }





?>
