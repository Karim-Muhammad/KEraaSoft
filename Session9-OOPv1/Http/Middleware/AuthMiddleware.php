<?php

class AuthMiddleware
{

    public static function handle($url_role)
    {
        if ($url_role === null) {
            return true;
        }

        if (!Session::has('user') && ($url_role === 'admin' || $url_role === 'auth')) {
            Session::flash("errors", ['auth-msg' => 'You must login first!']);
            redirect('/auth/login');
            return false;
        }

        if (Session::has('user') && ($url_role === 'guest')) {
            redirect('/products');
            return false;
        }



        $user = Session::get('user');
        // dd($user);

        if ($url_role === 'admin' && $user['admin'] === 0) {
            Session::flash("errors", ['auth-msg' => 'You are not authorized to access this page!']);
            redirect('/error');
            return false;
        }
    }
}