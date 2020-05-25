<?php
class User
{
    public $email;
    public $passwd;
    public function __construct($email,$passwd)
    {
        $this->email = $email;
        $this->passwd = sha1($passwd);
    }

}
?>