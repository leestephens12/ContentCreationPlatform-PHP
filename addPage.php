<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Page</title>
        <link href="css/addPage.css" rel="stylesheet">
    </head>
    <body>
    <!--logout to terminate users session-->
        <header>
            <a href="logout.php">Log Out</a>
            <br><br>
            <a href="editor.php">Back to Editor</a>
        </header>
        <main>
            <h1>Create Page</h1>
            <!--creating a form to pass information along to validate it and input in database-->
            <form method="post" action="validateAddPage.php">
            <div class="title">
                <label for="title">Title: </label>
                <input type="text" id="title" name="title" value="">
            </div>
            <div class="content">
                <label for="content">Content: </label>
                <textarea id="content" name="content" rows="10" cols="50"></textarea>
            </div>
            <!--submit button to bring me to my next page and bring over inputs-->
                <input id="submit" type="submit" value="Submit">
            </form>
<?php
    //if there was a title variable in the url it will poplate the title and content inputs so user can edit them
    if(!empty($_GET['title'])) {
        $title = $_GET['title'];
        $content = $_GET['content'];

        echo('<script>document.getElementById("title").value="'.$title.'"</script>');
        echo('<script>document.getElementById("content").value="'.$content.'"</script>');
    }
?>  
        </main>
    </body>
</html>