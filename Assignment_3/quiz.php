<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <!--<script src="./script/quiz.js"></script>-->
</head>
<body>
    <?php
    include('./includes/header.inc');
    include('./includes/menu.inc');
    ?>

    <h1 id = wikiQuiz>WIKI QUIZ</h1>

    <form id = "quizForm" name = "quizForm" method = "POST" action ="markquiz.php" novalidate = "novalidate">

        <fieldset>
            <legend>User Details</legend>

            <p><label for = "Given_Name">Given Name</label>
                <input type = "text" id = "Given_Name" maxlength = "30" name = "Given_Name" pattern="^[A-Za-z0-9? ,_-]+$" required = "required">
            </p>

            <p><label for = "Family_Name">Family Name</label>
                <input type = "text" maxlength = "30" name = "Family_Name" id = "Family_Name" required = "required">

            </p> 

            <p><label for = "Student_ID">Student ID</label>
                <input type = "text" name = "Student_ID" id = "Student_ID" pattern="^(\d{7}|\d{10})$" required = "required">

            </p>
            
        </fieldset>

        <fieldset>
            <legend>QUIZ</legend>

            <!-- QUESTION 1-->
            <p><strong>Question 1:</strong></p>
            <p><label for="Q1">Who created the first wiki?</label></p>
            <p><input type="text" name = "Q1" id = "Q1" required = "required">

            </p>
        

             <!-- QUESTION 2-->
             <p><strong>Question 2:</strong></p>
            <p>When was the first wiki launched?</p>
            <p>
                <input type="radio" id="is1994" name="Q2" value= "1994" required = "required">
                <label for="is1994">1994</label><br>
                <input type="radio" id="is1995" name="Q2" value= "1995" required = "required">
                <label for="is1995">1995</label><br>
                <input type="radio" id="is1985" name="Q2" value= "1985" required = "required">
                <label for="is1985">1985</label><br>
                <input type="radio" id="is1996" name="Q2" value= "1996" required = "required">
                <label for="is1996">1996</label><br>

   
            </p>



             <!-- QUESTION 3-->

             <p><strong>Question 3:</strong></p>
            <p>Select the Advantage/s of wikis:</p>
            <p>
            
                <input type="checkbox" id="A" name="Q3" value="asynchronous" checked="checked">
                <label for="A">Asynchronous collaborations</label><br>

                <input type="checkbox" id="B" name="Q3" value="lack confidentiality">
                <label for="B">Lack confidentiality</label><br>

                <input type="checkbox" id="C" name ="Q3" value="track trace difficulties">
                <label for="C">Tracing and tracking difficulties</label><br>

                <input type="checkbox" id="D" name ="Q3" value="availability">
                <label for="D">Availability</label><br>

                <p class = "error q3-error"></p>

            <!-- </p> -->
            
             <!-- QUESTION 4-->

         
             <p><strong>Question 4:</strong></p>
            <p>
                <label for="Q4">Select the most famous wiki</label><br>
                <select name = "Q4" id = "Q4">
                    <option value="">Please Select</option>
                    <option id="wikihow" value="wikihow">WikiHow</option>
                    <option id="wikiwikiweb" value="wikiwikiweb">WikiWikiWeb</option>
                    <option id="wikipedia" value="wikipedia">Wikipedia</option>
                    <option id="wikimedia" value="wikimedia">Wikimedia</option>
                </select>
            </p><br>

            <p class = "error q4-error"></p>
               


             <!-- QUESTION 5-->
             <p><strong>Question 5:</strong></p>
            <p>
                <label for="Q5">What new innovation/s was introduced in 1997?</label><br>
                <textarea name = "Q5" id = "Q5" rows="7" cols="50" placeholder="Write decription here ..."></textarea>
                <p class = "error q5-error"></p>
           <!--</p> -->
        
           </fieldset>

           
           <p>
            <span id="error_check" class="error"></span>
          </p>
          
        <p class = "error errmsg"></p>
        
           <p>
            <input type = "submit" value = "Submit" />
            <input type = "reset" value ="Reset form"/>
        </p>
        <!--<input type="submit" value = "click"/>-->
        
        
    </form>

    <?php
    include('./includes/footer.inc');
    ?>

</body>
</html>
