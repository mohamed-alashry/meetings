<?php

namespace App\Helpers;

use Carbon\Carbon;

trait HelperToolsTrait
{
    /**
     * Generate Random String.
     *
     * @param int $length
     * @return void
     */
    public function generate_random_code($length = 8)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }

    /**
     * Generate Random Char.
     *
     * @param int $length
     * @return void
     */
    public function generate_random_code_letter($length = 8)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }

    /**
     * Generate Random Numeric.
     *
     * @param int $length
     * @return void
     */
    public function generate_random_code_numeric($length = 8)
    {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }

    /**
     * Generate Expired At.
     *
     * @param int $minuets
     * @return void
     */
    public function generate_expired_after($minuets = 60)
    {
        $newDateTime = Carbon::now()->addMinutes($minuets);
        return $newDateTime;
    }
}
