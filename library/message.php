<?php
class Message {
    public static function showMessage(string $message, string $status = "success") {
        exit(json_encode([ "status" => $status, "message" => $message ]));
    }

    public static function error(string $message) {
        self::showMessage($message, "error");
    }

    public static function success(string $message) {
        self::showMessage($message, "success");
    }

    public static function errorClose(string $message, mysqli $db) {
        $db->close();
        self::error($message);
    }

    public static function successClose(string $mess, mysqli $db) {
        $db->close();
        self::success($mess);
    }
}