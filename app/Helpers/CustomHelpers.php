<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CustomHelpers
{

    /**
     * Function to check is nav-link active
     * @param string|array $path can be string or array
     * @param boolean $checkPrefix
     * @return string
     */
    public static function isActive($path)
    {
        return request()->is("$path") || request()->is("$path/*") ? 'active' : '';
    }

    /**
     * Function to check is nav-link active
     * @param string|array $path can be string or array
     * @param boolean $checkPrefix
     * @return string
     */
    public static function isActiveBool($path, $checkPrefix = false)
    {
        if (is_array($path)) {
            foreach ($path as $item) {
                if (request()->is($item)) return true;

                if ($checkPrefix && request()->is("$item/*")) return true;
            }


            return;
        }

        return request()->is($path);
    }

    /**
     *
     * Function to format phone number
     * @param string phone number you want to format
     * @return string
     */
    public static function phoneFormat($phone)
    {
        return "(" . substr($phone, 0, 2) . ") " . substr($phone, 2, 3) . " " . substr($phone, 6);
    }

    /**
     *
     * Function to check selected form
     *
     */
    public static function isOptionSelected($key, $value, $oldValue = null)
    {
        if ($oldValue == null) $oldValue = old($key);
        return ((old($key) ??  $oldValue) == $value) ? 'selected' : '';
    }

    /**
     *
     * Function to convert date to format
     *
     */
    public static function formatDate($date)
    {
        return $date != null ? ($date)->format('M d Y,  h:i a') : '-';
    }

    /**
     *
     * Function to generate random x digit
     *
     */
    public static function randomNumber($digits = 10, $prefix = null, $suffix = null)
    {
        $random = str_pad(rand(0, pow(10, $digits) - 1), $digits, '0', STR_PAD_LEFT);

        if ($prefix) $random = $prefix . $random;
        if ($suffix) $random = $random . $suffix;

        return $random;
    }

    /**
     *
     * Function to upload file
     * @param Request $request
     * @param string $path
     * @param string $oldPath
     * @param string $fileKey
     * @return Request $result
     */
    public static function uploadFile($request, $path, $oldPath = null, $fileKey = 'file', $resultString = false)
    {
        $fileName = Str::uuid() . '.' . $request->$fileKey->extension();
        $request->$fileKey->move(public_path($path), $fileName);

        if ($oldPath) File::delete(public_path($path . $oldPath));

        $result = new Request($request->all());
        $result->merge([$fileKey => $fileName]);

        return $resultString ? $result->$fileKey : $result;
    }
}
