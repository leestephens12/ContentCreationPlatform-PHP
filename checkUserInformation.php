<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>Saving Information...</title>
    </head>
    <body>
<?php

    $username = $_POST['username'];
    $password = $_POST['password'];

    //connecting to database
    $db = new PDO('mysql:host=172.31.22.43;dbname=Lee1138287', 'Lee1138287', 'KpxdeDafpk');

    $sql = "SELECT * FROM user_info WHERE username = :username";

    $cmd = $db->prepare($sql);
    $cmd->bindParam(':username', $username, PDO::PARAM_STR, 100);
    $cmd->execute();

    //user id gets the username that is outputted from our database search
    $userId = $cmd->Fetch();

    if(!$userId) {
        $db = null;
        header('location:login.php?wrongUser=true');
    }
    else{

        if(password_verify($password, $userId['password'])) {
            session_start();
    
            $_SESSION['username'] = $username;
            $db = null;
            header('location:editor.php');
        }
        else {
            $db = null;
            header('location:login.php?invalidPass=true');
        }
    }
    
?>
    </body>
</html>
