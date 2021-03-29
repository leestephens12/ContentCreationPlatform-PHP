<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>Editor +</title>
    </head>
    <body>
<?php
    session_start();
    $username = $_SESSION['username'];
    echo('<h1>Welcome '.$username.'</h1>');
    echo('<h2>What would you like to do today?</h2>');

    if(!empty($_GET['firstTime'])) {
        echo('<script>
                alert("Wlecome, I see this is your first time here. To begin add a page and begin to have fun");
            </script>');
    }

?>
        <button><a href="addPage.php"></a>Add Page</button>
        <button id="delete"><a href="deletePage.php"></a>Delete Page</button>
    </body>
</html>