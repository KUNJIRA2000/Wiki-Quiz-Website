<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <!--<script src="./script/result.js"></script>-->
</head>
<body>
<?php 
    include('./includes/header.inc');
    include('./includes/menu.inc');
?>


    <fieldset>
        <legend>Your Marks</legend>
        <p class = "hidden">Username: <span id= "username"></span></p>
        <p class = "hidden">Student ID: <span id = "studentID"></span></p>
        <p class = "hidden">Total Mark:  <span id = "totalmark"></span></p>
        <p class = "hidden">Total Attempts:  <span id = "attempts"></span></p>
        <br>
    </fieldset>

    <p id = "high">
        <span id = "final"></span>
    </p>

    <p><a href="https://mercury.swin.edu.au/cos10011/s102088859/Assignment%202/quiz.html"><input type="button" value = "Redo Quiz" id ="redoBtn" ></a></p>

    <?php 
    include('./includes/footer.inc') ;
?>
</body>
</html>