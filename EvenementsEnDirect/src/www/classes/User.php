<?php
class User
{
    public $nickname;
    public $email;
    public function __construct($nickname,$email)
    {
        $this->email = $email;
        $this->nickname = $nickname;
    }

}
?>