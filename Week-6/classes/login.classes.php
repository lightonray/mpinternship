<?php

class Login extends Dbh {
    
    protected function getUser($signupusername, $signuppassword){
        $stmt = $this->connect()->prepare('SELECT password FROM users WHERE username = ?');

        if (!$stmt->execute(array($signupusername))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../login.php?error=usernotfound");
            exit();  
        }

        $pwdHashed = $stmt->fetch(PDO::FETCH_ASSOC)['password'];

        $checkPwd = password_verify($signuppassword, $pwdHashed);

        if ($checkPwd == false) {
            $stmt = null;
            header("location: ../login.php?error=wrongpassword");
            exit();  
        } elseif ($checkPwd == true) {
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE username = ?');

            if (!$stmt->execute(array($signupusername))) {
                $stmt = null;
                header("location: ../login.php?error=stmtfailed");
                exit();
            }

            if ($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: ../login.php?error=usernotfound");
                exit();  
            }

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            session_start();

            $_SESSION["user_id"] = $user["user_id"];
            $_SESSION["username"] = $user["username"];
        }

        $stmt = null;
    }
}