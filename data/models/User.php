<?php 

 class User {
    public $user_id;
    public $username;
    public $lastname;
    public $email;
    public $password;
    public $is_admin;
    public $created_at;

    static public function fromDbOject($dbObject)
    {
        $user = new User();
        $user->user_id    = $dbObject['id'];
        $user->username   = $dbObject['username'];
        $user->lastname   = $dbObject['lastname'];
        $user->email      = $dbObject['email'];
        $user->password   = $dbObject['password'];
        $user->is_admin   = $dbObject['is_admin'];
        $user->created_at = $dbObject['created_at'];

        return $user;
    }
}