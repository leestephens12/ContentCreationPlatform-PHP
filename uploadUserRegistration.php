<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>Saving Information...</title>
    </head>
    <body>

<?php

    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPass = $_POST['confirmPass'];
    $email = $_POST['email'];

    $password = password_hash($password, PASSWORD_DEFAULT);
    $confirmPass = password_hash($confirmPass, PASSWORD_DEFAULT);

    //connecting to database
    $db = new PDO('mysql:host=172.31.22.43;dbname=Lee1138287', 'Lee1138287', 'KpxdeDafpk');

    $sql = "SELECT * FROM user_info WHERE username = :username";
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':username', $username, PDO::PARAM_STR, 100);
    $cmd->execute();
    $userId = $cmd->Fetch();

    if($userId) {
        $db = null;
        header('location:register.php?usernameExists=true');
    }
    else {
        $sql = "SELECT * FROM user_info WHERE email = :email";
        $cmd = $db->prepare($sql);
        $cmd->bindParam(':email', $email, PDO::PARAM_STR, 30);
        $cmd->execute();
        $userEmail = $cmd->Fetch();
            if($userEmail){
                header('location:register.php?emailExists=true');
            }
            else {
                if($password = $confirmPass) {
                    $sql = "INSERT INTO user_info(username, password, email) VALUES(:username, :password, :email)";

                    $cmd = $db->prepare($sql);
                    $cmd->bindParam(':username', $username, PDO::PARAM_STR, 25);
                    $cmd->bindParam(':password', $password, PDO::PARAM_STR, 300);
                    $cmd->bindParam(':email', $email, PDO::PARAM_STR, 30);
                    $cmd->execute();
                    $db = null;

                    header('location:editor.php?firstTime=true');
                }
                else {
                    header('location:register.php?passNoMatch=true');
                }
            }
    }
   
    

?>
    </body>
</html>
