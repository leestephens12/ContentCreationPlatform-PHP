<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>User Log-In</title>
        <link href="css/registration.css" rel="stylesheet">
    </head>
    <body>
        <header>
            <h1>Editor+ Premium Package</h1>
            <h2>Log-In</h2>
        </header>
        <form method="post" action="checkUserInformation.php">
            <div class="username">
                <label for="username">Username: </label>
                <input type="text" id="username" name="username" placeholder="username" required>
                <p id="wrongUser"></p>
            </div>
            <div class="password">
                <label for="password">Password: </label>
                <input type="password" id="password" name="password" placeholder="password" required>
                <p id="wrongPass"></p>
            </div>
            <div class="buttons">
                <input type="submit" Value="Submit">
                <button><a href="register.php">Register</a></button>
            </div>
        </form>
<?php
    if(!empty($_GET['invalidPass'])) {
        echo('<style>
                .password{background-color: red;}
            </style>');
        echo('<script>
                document.getElementById("wrongPass").innerHTML = "Incorrect Password";
            </script>');
    }
    
    if(!empty($_GET['wrongUser'])) {
        echo('<style>
                .username{background-color: red;}
            </style>');
        echo('<script>
                document.getElementById("wrongUser").innerHTML = "Username Does not exist. Proceed to registration";
            </script>');
    }
?>
    </body>
</html>
