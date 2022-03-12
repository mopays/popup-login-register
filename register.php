<?php
            require_once('connect.php');
            if(isset($_REQUEST['sing_up'])){
                $username = strip_tags($_REQUEST['txt_username']);
                $email = $_REQUEST['txt_email'];
                $password = $_REQUEST['txt_password'];

                if(empty($username)){
                    $errorMsg[] = "Please enter username";
                }else if(empty($email)){
                    $errorMsg[] = "Please enter email";
                }else if(empty($password)){
                    $errorMsg[] = "Please enter password";
                }else{
                    try{
                        $select_data = $db->prepare("SELECT username, email FROM tbl_user WHERE username = :uname OR email = :uemail");
                        $select_data->bindParam(':uname', $username);
                        $select_data->bindParam(':uemail' ,$email);
                        $select_data->execute();
                        $row = $select_data->fetch(PDO::FETCH_ASSOC);

                        if($row['username'] == $username){
                            $errorMsg[] = "Sorry username is already exits";
                        }else if($row['email'] == $email){
                            $errorMsg[] = "Sorry email is already exits";
                        }else{
                            $new_password = password_hash($password, PASSWORD_DEFAULT);
                            $insert_data = $db->prepare("INSERT INTO tbl_user (username, email, password) VALUES(:uname, :uemail, :upassword)");
                            $insert_data->bindParam(':uname', $username);
                            $insert_data->bindParam(':uemail', $email);
                            $insert_data->bindParam(':upassword', $new_password);
                            $insert_data->execute();

                            $insertMsg = "Resister success....";
                            header('refresh:1;index.php');
                        }
                    }catch(PDOException $e){
                        echo $e->getMessage();
                    }
                }

            }
        ?>