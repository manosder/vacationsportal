<?php
$appBasePath = $_SERVER['DOCUMENT_ROOT'] . '/vacationsportal';
include_once($appBasePath . '/data/database.php');
include_once($appBasePath . '/data/models/User.php');

class UserService
{

    static public function getAll(): array
    {
        global $con;
        $query = "select * from users";
        $dbusers = $con->query($query);

        $userslist = [];

        while ($user_row = mysqli_fetch_assoc($dbusers)) {
            $userslist[] = User::fromDbOject($user_row);
        }

        $dbusers->close();

        return $userslist;
    }
    static public function getByEmail(string $email): ?User
    {
        global $con;
        $query = "select * from users where email = ? ";

        $statement = $con->prepare($query);
        $statement->bind_param('s', $email);
        $statement->execute();

        $result = $statement->get_result();

        if ($result->num_rows == 0) {
            return null;
        }

        $user_row = $result->fetch_assoc();
        return User::fromDbOject($user_row);
    }
    static public function getByUsername(string $username): ?User
    {
        global $con;
        $query = "select * from users where username = ? ";

        $statement = $con->prepare($query);
        $statement->bind_param('s', $username);
        $statement->execute();

        $result = $statement->get_result();

        if ($result->num_rows == 0) {
            return null;
        }

        $user_row = $result->fetch_assoc();
        return User::fromDbOject($user_row);
    }

    // static public function getById(int $user_id): ?User
    // {
    //     global $con;
    //     $query = "select * from users where user_id = ? ";

    //     $statement = $con->prepare($query);
    //     $statement->bind_param('i', $user_id);
    //     $statement->execute();

    //     $result = $statement->get_result();

    //     if( $result->num_rows == 0){
    //         return null;
    //     }

    //     $user_row = $result->fetch_assoc();
    //     return User::fromDbOject($user_row);

    // }

    static public function createUser(User $object): void
    {
        global $con;
        $query = "insert into users (username,lastname,email,password,is_admin) values (?, ?, ?, ?, ?)";

        $statement = $con->prepare($query);
        $object->status = 0;
        $statement->bind_param('ssssi', $object->username, $object->lastname, $object->email, $object->password, $object->status);
        $statement->execute();
    }
    static public function updateUser(User $object): void
    {
        global $con;
        $query = "update users set username = ?, lastname = ?, email = ?, password = ?, is_admin = ? where id = ? ";

        $statement = $con->prepare($query);
        $statement->bind_param('ssssii', $object->username, $object->lastname, $object->email, $object->password, $object->status, $object->user_id);
        $statement->execute();
    }
}
