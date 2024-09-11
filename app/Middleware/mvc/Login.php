<?php

namespace App\Middleware\mvc;

use App\Controllers\Controller;
use Flight;

class Login extends Controller
{
    public function before(): void
    {
        dd("ok");
        if (isset($_COOKIE['token'])) {
            $header_token = $_COOKIE['token'];
            $db = Flight::db();
            $tokenCount = $db->prepare('SELECT COUNT(*) as token_count FROM tokens WHERE `token` = :token');
            $tokenCount->execute([
                ':token' => $header_token,
            ]);
            $result = $tokenCount->fetchAll();
            $result = end($result)['token_count'];
            if (intval($result) === 0) {
                Flight::redirect("https://editor.salamlang.ir");
            }
        } else {
            Flight::redirect("https://editor.salamlang.ir");
        }
    }
}
