<!DOCTYPE html>
<html lang="en">
    <?php 
        $appBasePath = $_SERVER['DOCUMENT_ROOT'].'/vacationsportal';
        include_once($appBasePath.'/parts/head.php');
    ?>
    <body>
        <?php include_once($appBasePath.'/parts/navbar.php');?>
        <div class="jumbotron d-flex justify-content-center">
            <h3>Inbox Messages</h3>
        </div>
        <div class="container container_messages_table ">
            <div class="list">
                <?php 
                foreach($messages as $message):      
                    if(user_is_admin()) {
                        echo $message->message;
                        ?>               
                        <div id="answer_buttons" class="d-flex justify-content-left">
                            <form action ="messages" method="get" style="padding:0;width:50%;">
                                <input type="submit" name="accept" class="btn btn-success" value="Accept" />
                                <input type="hidden" id="accept" name="id" value="<?=$message->id ?>">  
                                <input type="hidden" id="accept" name="status" value="1">  
                            </form> 
                            &nbsp;	
                            <form action ="messages" method="get" style="padding:0;width:50%;">
                            <input type="submit" name="reject" class="btn btn-danger" value="Reject" />
                            <input type="hidden" id="reject" name="id" value="<?=$message->id ?>">  
                            <input type="hidden" id="reject" name="status" value="0">   
                            </form> 
                        </div>
                        <hr>
                        <?php
                    }else{
                        if (!empty($message->reply_message))
                        {
                            echo "Request from ".$message->date_submitted."<h4>".$message->reply_message.$message->date_submitted."</h4><hr>" ;     
                        }
                        else
                        {
                            echo "Request from ".$message->date_submitted."<br><h4>No reply yet.</h4><hr>";     
                        }
                    }
                endforeach; 
                if (count($messages) === 0){
                    echo "No messages";
                }
                ?>
            </div>
        </div>    
    </body>
</html>