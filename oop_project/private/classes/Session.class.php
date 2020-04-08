<?php

class Session
{
    private $admin_id;
    public $username;
    private $last_login;

    public function __construct()
    {
        // turn on sessions if needed
        session_start();
        if(!empty($_SESSION))
        {
            $this->check_stored_login();
        }
    }

    public function login($admin)
    {
        if($admin)
        {
            //prevent session fixation attacks
            // regenerate the session ID when someone logs in again
            session_regenerate_id();
            $this->admin_id =  $_SESSION["admin_id"] = $admin->id;
            $this->username =  $_SESSION["username"] = $admin->username;
            $this->last_login =  $_SESSION["last_login"] =  time();
        }
        return true;
    }

    public function is_logged_in()
    {
        return isset($this->admin_id);
    }

    public function logout()
    {
        unset($_SESSION["admin_id"]);
        unset($_SESSION["username"]);
        unset($_SESSION["last_login"]);
        unset($this->admin_id);
        unset($this->username);
        unset($this->last_login);
        return true;
    }

    private function check_stored_login()
    {
        // if someone logged in previous
        if($_SESSION["admin_id"])
        {
            $this->admin_id = $_SESSION["admin_id"];
            $this->username = $_SESSION["username"];
            $this->last_login = $_SESSION["last_login"];
        }
    }

}
?>