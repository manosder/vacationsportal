<?php 
$appBasePath = $_SERVER['DOCUMENT_ROOT'].'/vacationsportal';
include_once($appBasePath.'/data/database.php');
include_once($appBasePath.'/data/models/Application.php');

class ApplicationService {

    static public function getAllApplicationsForLoggedInUser()
    {   
        global $con;
        $id = $_SESSION['user_id'];
        $query = "select user_id,date_submitted ,vac_start,vac_end,days,status,message,reply_message,reason from applications where user_id = '$id' order by date_submitted desc";
        $dbapplications = mysqli_query($con,$query);
    
        $applications = [];
        
        while ($app_row = mysqli_fetch_assoc($dbapplications)) {
            array_push($applications,Application::fromDbOject($app_row));
        }
        return $applications;

    }
    static public function getAllPendingMessages()
    {   
        global $con;
        $query = "select id,user_id,date_submitted ,vac_start,vac_end,days,status,message,reply_message,reason from applications where status = 2";
        $dbapplications = mysqli_query($con,$query);
    
        if( mysqli_num_rows($dbapplications) > 0)
        {
            $applications = array();
            
            while ($app_row = mysqli_fetch_assoc($dbapplications)) {
                array_push($applications,Application::fromDbOject($app_row));
            }
            return $applications;
        }
        else {
            return array();
        }
    }
    static public function createApplication($object)
    {   
        global $con;
        $query = "insert into applications (user_id,vac_start,vac_end,days,message,reason,status) 
            values(
                '$object->user_id',
                '$object->date_from',
                '$object->date_to',
                '$object->days', 
                '$object->message',                               
                '$object->reason',
                '$object->status'
            )";
        $dbapp = mysqli_query($con,$query);
        // var_dump($query);
    }
    static public function acceptApplication($object)
    {   
        global $con;
        $query = "update applications set status ='$object->status', reply_message = '$object->reply_message' where id ='$object->id' ";
        $dbacceptapp = mysqli_query($con,$query);
    }
    static public function rejectApplication($object)
    {   
        global $con;
        $query = "update applications set status = '$object->status', reply_message = '$object->reply_message' where id = '$object->id' ";
        $dbrejectapp = mysqli_query($con,$query);
    }
}