<?php
include_once "../services/user.php";

class UserValidator
{
    public $validationErrors = [];

    public function validate(User $user): bool
    {
        $length = strlen($user->username);
        if (($length < 3) || ($length > 255)) {
            $this->validationErrors['username'] = 'Invalid length';
        }

        $length = strlen($user->lastname);
        if (($length < 3) || ($length > 255)) {
            $this->validationErrors['lastname'] = 'Invalid length';
        }       

        if (!filter_var($user->email, FILTER_VALIDATE_EMAIL) || empty($user->email) ) {
            $this->validationErrors['email'] = 'Invalid email passed';
        }
        if (strlen($user->password) < 6){
            $this->validationErrors['password'] = 'Password must be greater than 6 Characters';
        }
        if ($user->password != $user->cpassword){
            $this->validationErrors['password2'] = 'Password do not match';
        }
        if (!$this->is_email_unique($user->email)){
            $this->validationErrors['email'] = 'User already exists.';
        }
    
        return empty($this->validationErrors);
    }
    private function is_email_unique(string $email)
    {
        return null === UserService::getByEmail($email);
    }
    public function getErrors(): array
    {
        return $this->validationErrors;
    }
}
