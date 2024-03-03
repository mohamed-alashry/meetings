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
        if (auth()->id() == 1) return true;
        return in_array($name, auth()->user()->permissions->pluck('name')->toArray());
    }
}
