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


    <?php

        if(!isset($_POST["Given_Name"]))
        {
            header("location:quiz.php");
        }

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

            $errmsg = "";		//Error message
 
    

            if(empty($_POST["Given_Name"]))
            {
                $errmsg .= "<p>First name cannot be blank!</p>";
            }
            else
            {
                $firstname = sanitise_input($_POST["Given_Name"]);
    
                if(!preg_match("/[A-Za-z0-9? ,_-]{1,30}$/", $firstname))
                {
                    $errmsg .= "<p>First name must contain only alphacharacters, spaces and hyphens of no longer than 30 characters</p>";
                }
            }
    
            if(empty($_POST["Family_Name"]))
            {
                $errmsg .= "<p>Last name cannot be blank!</p>";
            }
            else
            {
                $lastname = sanitise_input($_POST["Family_Name"]);
    
                if(!preg_match("/^[A-Za-z0-9? ,_-]{1,30}$/", $lastname))
                {
                    $errmsg .= "<p>Last name must contain only alphacharacters, spaces and hyphens of no longer than 30 characters</p>";
                }
            }
    
            if(empty($_POST["Student_ID"]))
            {
                $errmsg .= "<p>Student ID cannot be blank!</p>";
            }
            else
            {
                $studentID = sanitise_input($_POST["Student_ID"]);
    
                if(!preg_match("/^[0-9]{7,10}$/", $studentID))
                {
                    $errmsg .= "<p>Student ID must be 7 or 10 digits</p>";
                }
            }
    
            if(empty($_POST["Q1"]))
            {
                $errmsg .= "<p>Question 1 cannot be blank!</p>";
            }
            else
            {
                $question1 = sanitise_input($_POST["Q1"]);
            }
    
            if(empty($_POST["Q2"]))
            {
                $errmsg .= "<p>Question 2 cannot be blank!</p>";
            }
            else
            {
                $question2 = sanitise_input($_POST["Q2"]);
            }
    
            if(empty($_POST["Q3"]))
            {
                $errmsg .= "<p>Question 3 cannot be blank!</p>";
            }
            else
            {
                $question3 = sanitise_input($_POST["Q3"]);
            }
    
            if(empty($_POST["Q4"]))
            {
                $errmsg .= "<p>Question 4 cannot be blank!</p>";
            }
            else
            {
                $question4 = sanitise_input($_POST["Q4"]);
            }
    
            if(empty($_POST["Q5"]))
            {
                $errmsg .= "<p>Question 5 cannot be blank!</p>";
            }
            else
            {
                $question5 = sanitise_input($_POST["Q5"]);
            }

            if ($errmsg != "") {
                die($errmsg . "\n<p><a href=\"quiz.php\">Return to Application</a></p>");
            }

            $totalScore = 0;

            if(strtolower($question1) == "ward cunning")
            {
                $totalScore++;
            }
            if(strtolower($question2) == "1995")
            {
                $totalScore++;
            }
            if(strtolower($question3) == "asynchronous")
            {
                $totalScore++;
            }
            if(strtolower($question4) == "wikipedia")
            {
                $totalScore++;
            }
            if(strtolower($question5)  == "roadmaps")
            {
                $totalScore++;
            }

            
            $attempt = 0;
            if($totalScore != 0)
            {
                $attempt++;
                

                $table = "attempts";

                $create_table = "CREATE TABLE IF NOT EXISTS $table ( 
                `attempt_id` INT NOT NULL AUTO_INCREMENT , 
                `date_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
                `firstname` VARCHAR(30) NOT NULL , 
                `lastname` VARCHAR(30) NOT NULL , 
                `studentID` INT(10) NOT NULL , 
                `num_attempt` INT NOT NULL , 
                `score_attempt` INT NOT NULL , 
                PRIMARY KEY (`attempt_id`)) 
                ENGINE = InnoDB;";

                $open_table = mysqli_query($conn, $create_table);

                if(!$open_table)
                {
                    echo "<p>Database connection failure2</p>";
                }
                else
                {
                    //checking for 2nd attempt
                    $check_attempt_query = "SELECT num_attempt FROM $table WHERE studentID = '$studentID'";                    $result_check_attempt = mysqli_query($conn,$check_attempt_query);
                    
                    if(!$result_check_attempt)
                    {
                        echo "<p>Database connection failure</p>";
                    }
                    else
                    {
                        $row = mysqli_num_rows($result_check_attempt); 
                        if($row == 1)
                        {
                            $attempt++;
                        }
                        else if ($row == 2)
                        {
                            $errmsg = "You have already had 2 attempts. NO MORE ATTEMPTS";
                            die($errmsg . "\n<p><a href=\"quiz.php\">Return to Application</a></p>");
                        }
                        
                    }
                    


                    $Add_attempt = "INSERT INTO $table(firstname, lastname, studentID, num_attempt, score_attempt) VALUES ('$firstname', '$lastname', '$studentID', '$attempt', '$totalScore')";

                    $result = mysqli_query($conn, $Add_attempt);

                    if(!$result)
                    {
                        echo "<p>Database connection failure3</p>";
                    }
                    else
                    {

                        $query = "SELECT * FROM $table where studentID LIKE '%$studentID%'";

                        $result = mysqli_query($conn, $query);

                        if(!$result)
                        {
                            echo "<p>Something is wrong with", $query, "</p>";
                        }
                        else
                        {
                            //$sID = 0;
                            echo "<table border = \"1\">\n";
                            echo "<tr>\n"
                                . "<th scope=\"col\">First Name</th>\n "
                                . "<th scope=\"col\">Last Name</th>\n "
                                . "<th scope=\"col\">Student ID</th>\n "
                                . "<th scope=\"col\">Score</th>\n "
                                . "<th scope=\"col\">Attempt</th>\n "
                                . "</tr>\n ";
                            
                                
                            while ($row = mysqli_fetch_assoc($result)) 
                            {
                                echo "<tr>\n ";
                                echo "<td>", $row["firstname"], "</td>\n";
                                echo "<td>", $row["lastname"], "</td>\n";
                                echo "<td>", $row["studentID"], "</td>\n";
                                echo "<td>", $row["score_attempt"], "</td>\n";
                                echo "<td>", $row["num_attempt"], "</td>\n";
                                echo "</tr>\n ";
                                
                            }
                            echo "</table>\n ";

                            $check = mysqli_num_rows($result);
        
                            if($check < 2)
                            {
                        
                                echo "\n<p><a href=\"quiz.php\">Redo Quiz</a></p>";
                            }
                            else
                            {
                    
                                echo "You had $check attempts. You have no attempts left";
                                //mysql_free_result($result);

                            }

                            
                        }

                    }
                }
            }
            else
            {
                $errmsg = "You got ZERO! Try Again";
                die($errmsg . "\n<p><a href=\"quiz.php\">Return to Application</a></p>");
            }


        }
        mysqli_close($conn);
        
?>
    <?php
        include('./includes/footer.inc');
    ?>
    
</body>
</html>
