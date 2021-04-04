<?php
include_once 'Handler.php';

class RegistrationHandler extends Handler
{
    /**
     * Returns 1 if the username is unique else 0
     * @param string $username
     * @return int
     */
    public function is_username_valid(string $username): int
    {
        foreach ($this->accounts as $acc) {
            if ($acc["username"] == $username) {
                return 0;
            }
        }

        return 1;
    }

    /**
     * Compare two given passwords if equals return true else false
     * Returns 1 if the two given passwords are the same
     * Returns 0 if the two given passwords are not the same
     * @param string $pwd1
     * @param string $pwd2
     * @return int
     */
    public function is_passwords_match(string $pwd1, string $pwd2): bool
    {
        if (strcmp($pwd1, $pwd2) !== 0) {
            return false;
        }

        return true;
    }

    /**
     * Check if email is valid with regex
     * @param string $email
     * @return bool <b>is_email_valid</b> returns 1 if the <i>email</i> is valid, 0 if it does not
     */
    public function is_email_valid(string $email) : bool
    {
        $pattern = "/^[a-zA-Z]+[a-zA-Z0-9\.-]*@[a-zA-Z]{2,}\.[a-z]{2,4}$/";

        //  preg_match($pattern, $subject) Returns 1 if the pattern was found in the string and 0 if not
        //  error_reporting(0);
        if (preg_match($pattern, $email) == 1){
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param string $password
     * @return bool <b>is_password_length_valid</b> returns true if the <i>password</i>
     * length is equal or greater then 8 characters, false if it does not
     */
    public function is_password_length_valid(string $password) : bool
    {
        if (strlen($password) >= 8)
            return true;

        return false;
    }
}