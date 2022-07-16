<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <?php
        include('./includes/header.inc');
        include('./includes/menu.inc');
    ?>

    
    
    <form method = "POST" action = "manage.php">
        <fieldset>
            <legend>Search Database</legend>
            

            <p><label for = "firstname">Given Name</label>
                <input type = "text" id = "firstname" maxlength = "30" name = "firstname" ></p>
            <p><label for = "lastname">Family Name</label>
                <input type = "text" maxlength = "30" name = "lastname" id = "lastname"></p> 
            <p><label for = "studentID">Student ID</label>
                <input type = "text" name = "studentID" id = "studentID"></p>
            <p><label for = "attempt">Attempt</label>
                <input type = "text" name = "attempt" id = "attempt"></p>
            <p><label for = "score">Score(%)</label>
                <input type = "text" name = "score" id = "score" ></p>
                <p><h5>Leave blank for entire table</h5></p>
        </fieldset>
        <input class="button" type="submit" value="Search" name="Search" />
        
    </form>

    <form method = "POST" action = "manage.php">
        <fieldset>
            <legend>Update Database</legend>

            <p><label for = "UstudentID">Student ID</label>
                <input type = "text" name = "UstudentID" id = "UstudentID"></p>
            <p><label for = "attempt">Attempt</label>
                <input type = "text" name = "Uattempt" id = "Uattempt"></p>
            <p><label for = "score">Score(%)</label>
                <input type = "text" name = "Uscore" id = "Uscore" ></p>
        </fieldset>
        <input class="button" type="submit" value="Update" name="Update" />
    </form>

    <form method = "POST" action = "manage.php">
        <fieldset>
            <legend>Delete Database</legend>

            <p><label for = "DstudentID">Student ID</label>
                <input type = "text" name = "DstudentID" id = "DstudentID"></p>
        </fieldset>
        <input class="button" type="submit" value="Delete" name="Delete" />
    </form>


    <?php

    if(isset($_POST["firstname"]))
    {
        require_once("settings.php");
    
        $conn = mysqli_connect(
            $host,
            $user,
            $pwd,
            $sql_db
        );

        if(!$conn)
        {
            echo "<p>Database connection failure</p>";
        }
        else
        {
            function sanitise_input($data)
            {
                $data = trim($data);				
                $data = stripslashes($data);		
                $data = htmlspecialchars($data);	
                return $data;
            } 

            $firstname = sanitise_input($_POST["firstname"]);
            $lastname = sanitise_input($_POST["lastname"]);
            $studentID = sanitise_input($_POST["studentID"]);
            $attempt = sanitise_input($_POST["attempt"]);
            $score = sanitise_input($_POST["score"]);

            $sql_table = "attempts";
            $query = "";


            if($firstname != "")
            {
                if($query != "")
                {
                    $query .= " AND ";
                }

                $query .= "firstname LIKE '%$firstname%'";
            }
            if($lastname != "")
            {
                if($query != "")
                {
                    $query .= " AND ";
                }

                $query .= "lastname LIKE '%$lastname%'";
            }
            if($studentID != "")
            {
                if($query != "")
                {
                    $query .= " AND ";
                }

                $query .= "studentID LIKE '%$studentID%'";
            }
            if($attempt != "")
            {
                if($query != "")
                {
                    $query .= " AND ";
                }

                $query .= "num_attempt LIKE '%$attempt%'";
            }
            if($score != "")
            {
                if($query != "")
                {
                    $query .= " AND ";
                }

                $score = $score*(1/20);

                $query .= "score_attempt LIKE '%$score%'";
            }
            if ($query != "") {
                $query = " WHERE " . $query;
            }

            $query_search = "SELECT * FROM $sql_table" . $query;
            echo "$query_search";


            $result_search = mysqli_query($conn,$query_search);

            if(!$result_search)
            {
                echo "<p>Database connection failure</p>";
            }
            else
            {
                echo "<table border = \"1\">\n";
                echo "<tr>\n"
                    . "<th scope=\"col\">Given Name</th>\n "
                    . "<th scope=\"col\">Family Name</th>\n "
                    . "<th scope=\"col\">Student ID</th>\n "
                    . "<th scope=\"col\">Score</th>\n "
                    . "<th scope=\"col\">Attempt</th>\n "
                    . "</tr>\n ";

                while ($row = mysqli_fetch_assoc($result_search)) 
                {
                    echo "<tr>\n ";
                    echo "<td>", $row["firstname"], "</td>\n";
                    echo "<td>", $row["lastname"], "</td>\n";
                    echo "<td>", $row["studentID"], "</td>\n";
                    echo "<td>", $row["score_attempt"], "</td>\n";
                    echo "<td>", $row["num_attempt"], "</td>\n";
                    echo "</tr>\n ";
                }
                echo "</table>\n";

                mysqli_free_result($result_search);
            }

            mysqli_close($conn);
        }
    }

     ?>

     <?php
     if(isset($_POST["UstudentID"]))
     {
        require_once("settings.php");
            
        $conn = mysqli_connect(
            $host,
            $user,
            $pwd,
            $sql_db
        );

        if(!$conn)
        {
            echo "<p>Database connection failure</p>";
        }
        else
        {
            $sql_table = "attempts";
            function sanitise_input2($data)
            {
                $data = trim($data);				
                $data = stripslashes($data);		
                $data = htmlspecialchars($data);	
                return $data;
            } 

            $U_studentID = sanitise_input2($_POST["UstudentID"]);
            $U_attempt = sanitise_input2($_POST["Uattempt"]);
            $U_score = sanitise_input2($_POST["Uscore"]);
    
            $query_update = "UPDATE $sql_table SET score_attempt = '$U_score' WHERE studentID = '$U_studentID' AND num_attempt = '$U_attempt'";
    
            $result_update = mysqli_query($conn,$query_update);

            if(!$result_update)
            {
                echo "<p>Database Connection failure</p>";
            }
            else
            {
                echo "<p>Data has been successfully updated!</p>";
            }


            mysqli_close($conn);

        }
    }
    

     ?>

<?php
if(isset($_POST["DstudentID"]))
{
       require_once("settings.php");
            
        $conn = mysqli_connect(
            $host,
            $user,
            $pwd,
            $sql_db
        );

        if(!$conn)
        {
            echo "<p>Database connection failure</p>";
        }
        else
        {
            $sql_table = "attempts";
            function sanitise_input3($data)
            {
                $data = trim($data);				
                $data = stripslashes($data);		
                $data = htmlspecialchars($data);
                return $data;
            } 

            $D_studentID = sanitise_input3($_POST["DstudentID"]);

            $query_delete = "DELETE FROM $sql_table WHERE studentID = '$D_studentID'";

            $result_delete = mysqli_query($conn, $query_delete);

            if(!$result_delete)
            {
                echo "<p>Database connection failure</p>";
            }
            else
            {
                echo "<p>Data has been deleted!</p>";
            }
            mysqli_close($conn);

        }
    }
    ?>



    <?php
        include('./includes/footer.inc');
    ?>
    
</body>
</html>