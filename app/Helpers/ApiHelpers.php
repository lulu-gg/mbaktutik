<?php

namespace App\Helpers;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class ApiHelpers
{
    public static function responseData(mixed $data = null,  string $status = '', string $message = '', int  $statusCode = 200): JsonResponse
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data'    => $data,
        ], $statusCode);
    }


    public static function responseUnautorized(string $message = 'Unauthorized'): JsonResponse
    {
        return response()->json([
            'status' => 'error',
            'message'    => $message,
        ], 401);
    }

    public static function responseInvalidValidate(ValidationException $exception): JsonResponse
    {
        return response()->json([
            'status' => 'error',
            'message' => 'Invalid Request',
            'errors' => $exception->errors(),
        ], 422);
    }

    public static function responseError(Exception $exception): JsonResponse
    {
        return response()->json([
            'status' => 'error',
            'message' => 'Server Error',
            'errors' => $exception->getMessage(),
        ], 500);
    }
}
