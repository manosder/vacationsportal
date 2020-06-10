<?php
$appBasePath = $_SERVER['DOCUMENT_ROOT'] . '/vacationsportal';
include_once($appBasePath . '/data/database.php');
include_once($appBasePath . '/data/models/Application.php');

class ApplicationService
{

    static public function getAllApplicationsForLoggedInUser()
    {
        global $con;
        $id = $_SESSION['user_id'];
        $query = "select * from applications where user_id = ? order by date_submitted desc";

        $statement = $con->prepare($query);
        $statement->bind_param('i', $id);
        $statement->execute();

        $result = $statement->get_result();

        $applications = [];

        while ($app_row = $result->fetch_assoc()) {
            array_push($applications, Application::fromDbOject($app_row));
        }
        return $applications;
    }
    static public function getAllPendingMessages()
    {
        global $con;
        $query = "select * from applications where status = 2";
        $result = mysqli_query($con, $query);

        if ($result->num_rows > 0) {
            $applications = [];

            while ($app_row = $result->fetch_assoc()) {
                array_push($applications, Application::fromDbOject($app_row));
            }
            return $applications;
        } else {
            return array();
        }
    }
    static public function createApplication($object)
    {
        global $con;
        $object->status = 2;
        $query = "insert into applications (
            user_id,
            vac_start,
            vac_end,
            days,
            message,
            reason,
            status) values(?, ?, ?, ?, ?, ?, ?)";

        $statement = $con->prepare($query);
        $statement->bind_param('ississi', $object->user_id, $object->date_from, $object->date_to, $object->days, $object->message, $object->reason, $object->status);
        $statement->execute();
    }
    static public function acceptApplication($object)
    {
        global $con;
        $query = "update applications set status = ?, reply_message = ? where id = ? ";

        $statement = $con->prepare($query);
        $statement->bind_param('isi', $object->status, $object->reply_message, $object->id);
        $statement->execute();
    }
    static public function rejectApplication($object)
    {
        global $con;
        $query = "update applications set status = ?, reply_message = ? where id = ? ";
        $statement = $con->prepare($query);
        $statement->bind_param('isi', $object->status, $object->reply_message, $object->id);
        $statement->execute();
    }
}
