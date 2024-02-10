<?php



if (!function_exists('currentUser')) {
    /**
     * get current user.
     *
     * @return User
     */
    function currentUser()
    {
        return auth()->user();
    }
}
