<?php 
$appBasePath = $_SERVER['DOCUMENT_ROOT'].'/vacationsportal';
include_once($appBasePath.'/data/database.php');
include_once($appBasePath.'/data/models/User.php');

class UserService {

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

        if( $result->num_rows == 0) {
            return null; 
        } 
        
        $user_row = $result->fetch_assoc();
        return User::fromDbOject($user_row);

    }
    static public function getByUsername(string $username): ?User
    {
        global $con;
        $query = "select * from users where username = '$username' ";
        $dbuser= mysqli_query($con,$query);
        $user_row = mysqli_fetch_assoc($dbuser);

        if( mysqli_num_rows($dbuser) > 0){
            return User::fromDbOject($user_row);
        }else{
            return null;
        }
    }
    
    static public function getById(int $user_id): ?User
    {
        global $con;
        $query = "select * from users where user_id = '$user_id' ";
        $dbuser= mysqli_query($con,$query);
        $user_row = mysqli_fetch_assoc($dbuser);

        if( mysqli_num_rows($dbuser) > 0){
            return User::fromDbOject($user_row);
        }else{
            return null;
        }
    }

    static public function createUser(User $object): void
    {
        global $con;
        $user_id = self::random_num(20);
        $query = "insert into users (username,lastname,email,password,is_admin,user_id) 
            values(
                '$object->username',
                '$object->lastname',
                '$object->email',
                '$object->password',
                '$object->is_admin',
                '$user_id'
            )";
        $dbuser = mysqli_query($con,$query);

    }
    static public function updateUser(User $object): void
    {
        global $con;
        $query = "update users set
            username='$object->username',
            lastname='$object->lastname',
            email='$object->email',
            password='$object->password',
            is_admin='$object->is_admin'

        where user_id= '$object->user_id' ";

        $dbuser = mysqli_query($con,$query);

    }

    public static function random_num(int $length) : string
    {
        $text = "";
        if($length < 5)
        {
            $length = 5;
        }

        $len = rand(4,$length);

        for ($i=0;$i < $len; $i++) { 
            
            $text .= rand(0,9);
        }

        return $text;
    }
}

