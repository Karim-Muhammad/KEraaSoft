<?php

/**
 * Guest means user is not logged in
 */
class AuthMiddleware
{

    public static function handle($url_role)
    {
        // If url role is null or guest, then it's public
        if ($url_role === null) {
            return true;
        }


        // If user is logged in, and its role is admin, then it's authorized
        if ((Session::get('user')['role'] ?? false) === 'admin') {
            return true;
        }

        // If Authenticated user enter login or register page, then redirect.
        if (Session::has('user')) {
            if ($url_role === 'guest' || $url_role === 'admin') {

                if ($url_role === 'guest') {
                    Session::flash("errors", ['auth-msg' => "You already logged in!"]);
                }

                if ($url_role === "admin") {
                    Session::flash("errors", ['auth-msg' => "You are not authorized to access this page!"]);
                }

                redirect('/');
                return false;
            }

            return true;
        }

        // If user is not authenticated (logged in), and $url_role not null, then redirect to login page
        if (!Session::has('user')) {
            if ($url_role === 'guest') {
                return true;
            }

            Session::flash("errors", ['auth-msg' => 'You must login first!']);
            redirect('/auth/login');

            return false;
        }

        // ELSE
        /**
         * Check if role of user is match with url role
         * If not, redirect to error page
         */
        if ((Session::get('user')['role'] ?? false) !== $url_role) {
            Session::flash("errors", ['auth-msg' => 'You are not authorized to access this page!']);
            redirect('/error');

            return false;
        }
    }
}