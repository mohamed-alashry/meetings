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

if (!function_exists('hasPermissionUser')) {
    /**
     * get current user.
     *
     * @return Boolean
     */
    function hasPermissionUser($name)
    {
        return in_array($name, auth()->user()->permissions->pluck('name')->toArray());
    }
}
