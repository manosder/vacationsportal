<?php 

class Application {

    public $user_id;
    public $date_from;
    public $date_to;
    public $days;
    public $message;
    public $reply_message;
    public $reason;
    public $date_submitted;
    public $status;

    static public function fromDbOject ($dbObject)
    {
        $app = new Application();
        $app->id   = $dbObject['id'];
        $app->user_id = $dbObject['user_id'];
        $app->date_from = $dbObject['vac_start'];
        $app->date_to = $dbObject['vac_end'];
        $app->days = $dbObject['days'];
        $app->message = $dbObject['message'];
        $app->reply_message = $dbObject['reply_message'];
        $app->reason = $dbObject['reason'];
        $app->date_submitted = $dbObject['date_submitted'];
        $app->status = $dbObject['status'];

        return $app;
    }
}