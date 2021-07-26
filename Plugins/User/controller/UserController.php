<?php
include ROOT . '/Plugins/User/model/User.php';

class UserController extends AppController
{

    public function register()
    {
        $name = '';
        $email = '';
        $password = '';
        $result = false;

        if (isset($_POST['submit'])) {
            $name = $this->clearData($_POST['name']);
            $email = $this->clearData($_POST['email']);
            $password = $this->clearData($_POST['password']);

            $errors = false;

            if (!User::checkName($name)) {
                $errors[] = 'name is too short';
            }

            if (!User::checkEmail($email)) {
                $errors[] = 'wrong email';
            }

            if (!User::checkPassword($password)) {
                $errors[] = 'password is too short';
            }

            if (User::checkEmailExists($email)) {
                $errors[] = 'user with this email already exists';
            }

            if ($errors === false) {
                $result = User::register($name, $email, $password);
            }
        }

        require_once ROOT . '/Plugins/User/view/register.php';
        return true;
    }

    public function login()
    {
        $email = '';
        $password = '';

        if (isset($_POST['submit'])) {
            $email = $this->clearData($_POST['email']);
            $password = $this->clearData($_POST['password']);

            $errors = false;

            if (!User::checkEmail($email)) {
                $errors[] = 'wrong email';
            }

            if (!User::checkPassword($password)) {
                $errors[] = 'password is too short';
            }

            $userId = User::checkUserData($email, $password);

            if($userId === false) {
                $errors[] = 'you entered an incorrect username or email';
            } else {
                User::auth($userId);
                header("Location: /");
                exit;
            }
        }

        require_once ROOT . '/Plugins/User/view/login.php';
        return true;
    }

    public function logout() {
        unset($_SESSION['user']);
        header("Location: /");
    }
}