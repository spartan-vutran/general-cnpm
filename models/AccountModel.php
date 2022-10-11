<?php
    class AccountModel extends DB{
        use tool;
        
        public function register($name, $pass, $email, $phonenumber, $fullname, $gender, $birthday, $point =0, $admin =1){
            $isExistAcc = $this->checkExistEmail($email);
            $isExistUsername = $this->checkExistUsername($name);
            if($isExistAcc || $isExistUsername){
                return false;
            }
            $pass = $this->getScurityHash($pass);
            $gender = $gender == "True" ? 1 : 0;
            $query = "INSERT INTO customer(UserName, Password, Email, PhoneNumber, FullName,Gender, Point, Admin,BirthDay) 
            VALUES ('$name', '$pass', '$email','$phonenumber', '$fullname', '$gender ', '$point', '$admin', '$birthday')";
            $result = $this->excute($query);
            return $result == "true";
        }

        public function checkExistEmail($email){
            $query = "SELECT * FROM customer WHERE Email = '$email'";
            $result = $this->excuteResult($query, true, false);
            return $result? true : false;
       }
        public function checkExistUsername($name){
            $query = "SELECT * FROM customer WHERE UserName = '$name'";
            $result = $this->excuteResult($query, true, false);
            return $result? true : false;
   }

        public function login($username, $password){
            $query = "SELECT * FROM customer WHERE UserName = '$username'";
            $User = $this->excuteResult($query, true);
            $obj = json_decode($User,true);
            $result = false;
            if($obj && password_verify($password, $obj["Password"])){
                $result = true;
                $_SESSION["login"] = true;
                $_SESSION["account"] = $User;
            }
            return $result;
        }

        public function logout(){
            session_destroy();
        }

        public function getAllAccount(){
            $query = "SELECT * FROM customer";
            $accountlist = $this->excuteResult($query);
            return $accountlist;
        }
        function deleteAccount($id){
            $query = "DELETE FROM customer 
            WHERE Id = '$id'";
            $result = $this->excute($query);
            return $result == "true";
        }
        function getDetailAccount($id){
            $query = "SELECT * FROM customer
            WHERE id = '$id'
            ";
            $result = $this->excuteResult($query, true);
            return $result;
        }
        function UpdateAccount($id, $gender, $fullName, $email, $admin, $phone){
            $query = "UPDATE customer
            SET Gender='$gender', Email='$email', FullName='$fullName', Admin='$admin', PhoneNumber = '$phone'
            WHere Id = '$id'
            ";
            $result = $this->excute($query);
            return $result;
        }
    }
?>