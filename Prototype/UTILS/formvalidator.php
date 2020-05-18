<?php

    class Validator{

        public static function emailExists($emailP){
            $mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'Prototype14');
            
            $stmt1 = $mybd->prepare("CALL SelectFromClients()");
            //Liaison des paramètres de la procédure.

            $stmt1->execute(); 
            
            while ($donnees = $stmt1->fetch())
            {
                if($donnees['email'] == $emailP){
                    $mybd = null;
                    return true;
                }
            }
            $mybd = null;
            return false;
        }
        
        public static function passwordExists($pwP){
            $mybd = new PDO('mysql:host=167.114.152.54;dbname=dbequipe14;charset=utf8', 'equipe14', 'Prototype14');
            
            $stmt1 = $mybd->prepare("CALL SelectFromClients()");
            //Liaison des paramètres de la procédure.

            $stmt1->execute(); 
            
            while ($donnees = $stmt1->fetch())
            {
                if($donnees['password'] == $pwP){
                    $mybd = null;
                    return true;
                }
            }
            $mybd = null;
            return false;
        }

        public static function validate_login_email($email)
        {
            if(empty($email))
            {
                return false;
            }
            
            if(self::emailExists($email)){
                return true;
            }
        
            return false;
        }

        public static function validate_login_password($pw)
        {
            if(empty($pw))
            {
                return false;
            }
            
            if(self::passwordExists($pw)){
                return true;
            }
        
            return false;
        }

        public static function validate_email($email)
        {
            if(empty($email))
            {
                return false;
            }
            
            if(self::emailExists($email)){
                return false;
            }
            
            
            $reg="/^([0-9a-zA-Z]([-\.\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*[0-9a-zA-Z]\.)+[a-zA-Z]{2,9})$/";
            if(preg_match_all($reg, $email))
            {
                return true;
            }
            return false;
        }

        public static function validate_PhoneNumber($phone){
            if(empty($phone)){
                return false;
            }

            $reg = "^\d{3}[-]\d{3}[-]\d{4}$^";
            if(preg_match($reg,$phone)){
                return true;
            }
            return false;
        }


        public static function validate_PostalCode($pc){
            if(empty($pc)){
                return false;
            }

            $reg = "/^[A-Za-z]\d[A-Za-z][ -]?\d[A-Za-z]\d$/";
            if(preg_match($reg,$pc)){
                return true;
            }
            return false;
        }
        public static function validate_password($password, $vpassword)
        {
            if(empty($password))
            {
                return false;
            }
            else if($password != $vpassword)
            {
                return false;
            }

            //$reg1="/[a-z]+/";
            //$reg2="/[A-Z]+/";
            //$reg3="/[0-9]+/";
            //$reg4="/[!@#$%^&*(){}+=|\/?.]+/";
            //$reg5 = "/[\s]/";

            //toutes les conditions (si true == condition de fail)
            //switch(true){
               // case(!preg_match($reg1,$password)):
                 //   return false;
               // case(!preg_match($reg2,$password)):
                //    return false;
                //case(!preg_match($reg3,$password)):
                //    return false;
                //case(!preg_match($reg4,$password)):
                 //   return false;
                //case(preg_match($reg5,$password)):
                 //   return false;
                //case(strlen($password) < 8):
                 //   return false;
        

            //si toutes les conditions de fail ne sont pas satisfaite, retourn true (le password est valide)
            return true;
        }

        public static function sanitize($input){
            $input = stripslashes($input);
            $input = htmlentities($input);
            $input = strip_tags($input);
            return $input;
        }

        
    }


?>
