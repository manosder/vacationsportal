<?php

class ApplicationValidator
{
    public $validationErrors = [];

    public function validate(Application $app): bool
    {

        $length = strlen($app->reason);
        if (($length < 2)) {
            $this->validationErrors['reason'] = 'Write something more';
        }
        if ($app->days  === 0) {
            $this->validationErrors['duration'] = 'Make sure that Date To is later than Date From';
        }


        return empty($this->validationErrors);
    }

    public function getErrors(): array
    {
        return $this->validationErrors;
    }
}
