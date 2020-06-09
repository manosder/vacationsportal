<!DOCTYPE html>
<html lang="en">
<?php 
    $appBasePath = $_SERVER['DOCUMENT_ROOT'].'/vacationsportal';
    include_once($appBasePath.'/parts/head.php');

?>
    <body>
        <?php include_once($appBasePath.'/parts/navbar.php');?>
        <div id="login-box" class="d-flex justify-content-center">
            <form class="form-group" method="post">
                <h4 id="wfa"> Update user details</h4>

                <input type="hidden" name="user_id" value="<?=$_GET['user_id'] ?>" >        
                
                <label for="user_id">First Name:</label>
                <input type="text" name="username" value="<?=$_GET['username'] ?>" >
                
                <label for="lastname">Last Name:</label>
                <input type="text" name="lastname" value="<?=$_GET['lastname'] ?>" >
                
                <label for="email">Email:</label>
                <input type="email"  name="email" value="<?=$_GET['email'] ?>" >

                <input type="password" name="password" placeholder="enter new password..">
                <input type="password" name="password2" placeholder="enter password again">
                
                <label for="is_admin">Choose role for the user</label>
                <select id="wfa" id="is_admin" name="is_admin" >
                    <option value="0">Employee</option>
                    <option value="1">Supervisor</option>
                </select>
                
                <input class="button button1" type="submit" value="Update User">
            </form>
        </div>
    </body>
</html>