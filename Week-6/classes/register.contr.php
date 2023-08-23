<?php


class RegisterContr extends Register{
    private $username;
    private $password;
    private $cpassword;
    private $email;
    private $phone; 

    public function __construct($username,$password,$cpassword,$email,$phone){
        $this->username = $username;
        $this->password = $password;
        $this->cpassword = $cpassword;
        $this->email = $email;
        $this->phone = $phone;
    }


    public function SignUp(){
        if($this->emptyInput() == false){
            header("location:../index.php?error=emptyinput");
            exit();
        }
        if($this->invalidEmail() == false){
            header("location:../index.php?error=invalidemail");
            exit();
        }

        $this->addUser($this->username,$this->password,$this->email,$this->phone);
        
        header("location: ../login.php?success=registered");
        exit();
    }



    private function emptyInput() {
        $result = false;
        if(empty($this->username) || empty($this->password) || empty($this->email) ||  empty($this->phone)) 
        {
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }

    private function invalidEmail(){
        $result = false;
        if(!filter_var($this->email,FILTER_VALIDATE_EMAIL)){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }

    private function passwordMatch(){
        $result = false;
        if($this->password !== $this->cpassword) {
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }


}
