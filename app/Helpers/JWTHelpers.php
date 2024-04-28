<?php

namespace App\Helpers;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTHelpers
{
    public static function encode(array $data)
    {
        $key = self::getSecretKey();
        return JWT::encode($data, $key, 'HS256');
    }

    public static function decode(String $token)
    {
        $key = self::getSecretKey();
        $decoded = JWT::decode($token, new Key($key, 'HS256'));
        return $decoded;
    }

    public static function getSecretKey()
    {
        return env('JWT_SECRET');
    }

    public static function getUser()
    {
        try {
            $token = request()->header('x-auth');
            if ($token == null) return null;
            $decoded = JWTHelpers::decode($token);
            return $decoded?->user;
        } catch (\Exception $e) {
            return null;
        }
    }
}
