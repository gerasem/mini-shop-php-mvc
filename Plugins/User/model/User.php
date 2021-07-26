<?php

class User
{
    public static function register($name, $email, $password)
    {
        $user           = R::dispense('user');
        $user->name     = $name;
        $user->email    = $email;
        $user->password = password_hash($password, PASSWORD_DEFAULT);
        R::store($user);
        return true;
    }


    /**
     * Check Name (min 2 symbols)
     */
    public static function checkName($name)
    {
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }


    /**
     * Check Password (min 6 symbols)
     */
    public static function checkPassword($password)
    {
        if (strlen($password) >= 6) {
            return true;
        }

        return false;
    }


    /**
     * Check email
     */
    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }

        return false;
    }


    /**
     * Check email exists
     */
    public static function checkEmailExists($email)
    {
        if (R::count('user', ' email = ? ', [$email])) {
            return true;
        }

        return false;
    }


    /**
     * Check user exists
     */
    public static function checkUserData($email, $password)
    {
        $user = R::findOne(
            'user',
            'email = ?',
            [$email]
        );
        if ($user) {
            if (password_verify($password, $user->password)) {
                return $user->id;
            }
        }

        return false;
    }


    /**
     * session start
     */

    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }


    /**
     * Check user logged
     */
    public static function checkLogged()
    {
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
        header("Location: /user/login");
    }


    /**
     * return true if $_SESSION['user'] not exists
     */
    public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }

        return true;
    }


    /**
     * Get user by id
     */
    public static function getUserById($id)
    {
        if ($id) {
            $user = R::findOne(
                'user',
                'id = ?',
                [$id]
            );

            return $user;
        }
    }


    /**
     * Edit user data (name and password)
     */
    public static function edit($id, $name, $email, $password)
    {

        $user = R::findOne(
            'user',
            'id = ?',
            [$id]
        );
        if (!empty($name)) {
            $user->name = $name;
        }
        if (!empty($email)) {
            $user->email = $email;
        }
        if (!empty($password)) {
            $user->password = password_hash($password, PASSWORD_DEFAULT);
        }
        R::store($user);

        return $user;
    }
}

