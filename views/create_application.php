<!DOCTYPE html>
<html lang="en">
    <?php 
        $appBasePath = $_SERVER['DOCUMENT_ROOT'].'/vacationsportal';
        include_once($appBasePath.'/parts/head.php');
    ?>
    <body>
        <?php include_once($appBasePath.'/parts/navbar.php');?>
        <div id="login-box"  class="container request-form-container d-flex justify-content-center">
            <form method="post" name="vacationRequest">
                <h4 id="wfa"> Vacation Request</h4>

                <label for="datefrom" style="text-decoration:underline;margin-top:10px;">Start Date:</label><br>
                <input type="date" name="datefrom" value="<?=$_SESSION['vacationRequest']['datefrom']?>"><br><br>
                
                <label for="dateto" style="text-decoration:underline;">End Date:</label><br>
                <input type="date" name="dateto" value="<?=$_SESSION['vacationRequest']['dateto']?>"><br><br>
               
                <label for="reason" style="text-decoration:underline;">Reason:</label><br>
                <textarea id="reason" name="reason"><?=$_SESSION['vacationRequest']['reason']?></textarea><br>
                <?php if (!empty($_SESSION['validationErrors']['reason'])): ?>
                <div class="validationErrors"> 
                    <?= $_SESSION['validationErrors']['reason'] ?>
                </div>
                <?php endif; ?>
               
                <input class="button button1" type="submit" value="Request"><br><br>
            </form>
        </div>
    </body>
    <script>
        <?php include_once($appBasePath.'/js/script.js');?>
    </script>
</html>