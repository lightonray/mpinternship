<?php

class LoginContr extends Login {
    
    private $loginusername;
    private $signupassword;

    public function __construct($loginusernamee,$signupassword)
    {
        $this->loginusername = $loginusernamee;
        $this->signupassword = $signupassword;
    }

    public function logIn() {
        if($this->emptyInput() == false) {
            // echo "Empty Input";
            header("location:../login.php?error=emptyinput");
            exit();
        }

        $this->getUser($this->loginusername,$this->signupassword);
        
    }

    private function emptyInput() {
        $result = false;
        if(empty($this->loginusername) || empty($this->signupassword)) {
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }

   

    
}