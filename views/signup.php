<!DOCTYPE html>
<html lang="en">
    <?php 
        $appBasePath = $_SERVER['DOCUMENT_ROOT'].'/vacationsportal';
        include_once($appBasePath.'/parts/head.php');
    ?>
    <body>
        <div id="login-box" class="d-flex justify-content-center">

            <form method="post" name="signup">
                <h4 id="wfa">Sign Up</h4>

                <input type="text" name="username" placeholder="Enter FirstName" autcomplete="off" value="<?=$_SESSION['signup']['username']?>">
                <?php if (!empty($_SESSION['validationErrors']['username'])): ?>
                <div class="validationErrors"> 
                    <?= $_SESSION['validationErrors']['username'] ?>
                </div>
                <?php endif; ?>

                <input type="text" name="lastname" placeholder="Enter LastName" autcomplete="off" value="<?=$_SESSION['signup']['lastname']?>">
                <?php if (!empty($_SESSION['validationErrors']['lastname'])): ?>
                <div class="validationErrors"> 
                    <?= $_SESSION['validationErrors']['lastname'] ?>
                </div>
                <?php endif; ?>
                
                <input type="email" name="email" placeholder="Enter email" autcomplete="off" value="<?=$_SESSION['signup']['email']?>">
                <?php if (!empty($_SESSION['validationErrors']['email'])): ?>                
                <div class="validationErrors"> 
                    <?= $_SESSION['validationErrors']['email'] ?>
                </div>
                <?php endif; ?>                
                
                <input type="password" name="password" placeholder="Enter password" autcomplete="off">
                <?php if (!empty($_SESSION['validationErrors']['password'])): ?>                
                <div class="validationErrors"> 
                    <?= $_SESSION['validationErrors']['password'] ?>
                </div>
                <?php endif; ?>
                
                <input type="password" name="password2" placeholder="Confirm password" autcomplete="off">
                <?php if (!empty($_SESSION['validationErrors']['password2'])): ?>                
                <div class="validationErrors"> 
                    <?= $_SESSION['validationErrors']['password2'] ?>
                </div>
                <?php endif; ?>
                
                <input class="button button1" type="submit" value="Register">

                <a class="link" href="login.php">Login </a>
            </form>
        </div>
    </body>
</html>