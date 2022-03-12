<?php 
        
            require_once("connect.php");
            session_start();
         
                    if(isset($_SESSION['user_login'])){
                        header("refresh:1;welcome.php");
                    }
            if(isset($_REQUEST['login_btn'])){
                $username_login = strip_tags($_REQUEST['txt_email_username']);
                $email_lognin = strip_tags($_REQUEST['txt_email_username']);
                $password_login = strip_tags($_REQUEST['txt_password']);
                
                if(empty($username_login)){
                    $errorMsgs[] = "Please enter username";
                }else if(empty($email_lognin)){
                    $errorMsgs[] = "Please enter email";
                }else if(empty($password_login)){
                    $errorMsgs[] = "Please enter password";
                }else{
                    try{
                        $select_data = $db->prepare("SELECT * FROM tbl_user WHERE username = :uname OR email = :uemail ");
                        $select_data->bindParam(':uname', $username_login);
                        $select_data->bindParam(':uemail', $email_lognin);
                        $select_data->execute();
                        $row = $select_data->fetch(PDO::FETCH_ASSOC);

                        if($select_data->rowCount() > 0){
                            if($username_login == $row['username'] OR $email_lognin == $row['email']){
                                if(password_verify($password_login, $row['password'])){
                                    $_SESSION['user_login'] = $row['id'];
                                    $loginMsg = "Login success";
                                    header("refresh:1;welcome.php");
                                }else{
                                    $errorMsgs[] = "Worng password";
                                }
                            }else{
                                $errorMsgs[] = "Wrong username or email";
                            }
                        }else{
                            $errorMsgs[] = "Wrong username or email";
                        }
                    }catch(PDOException $e){
                        echo $e->getMessage();
                    }
                }
            }
?>
       

 