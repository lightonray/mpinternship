<?php 
    class Register extends Dbh {
        

        protected function addUser($username,$password,$email,$phone){
            
            $stmt = $this->connect()->prepare('INSERT INTO users (username,password,email,phone) VALUES (?,?,?,?);');

            $hashedpwd = password_hash($password, PASSWORD_DEFAULT);

            if(!$stmt->execute(array($username,$hashedpwd,$email,$phone))){
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }
    
            $stmt = null;
        }
    }
?>