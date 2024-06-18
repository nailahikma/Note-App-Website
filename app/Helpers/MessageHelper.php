<?php

namespace App\Helpers;

class MessageHelper{
    public static function error($status, $message){
        return response()->json([
            'status' => $status,
            'messages' => $message,
        ], 200);
    }

    public static function  resultAuth($status, $msg, $data, $responCode, $token){
        return response()->json([
            'status' => $status,
            'message' => $msg,
            'data' => $data,
            'token' => $token
        ], $responCode);
    }
}