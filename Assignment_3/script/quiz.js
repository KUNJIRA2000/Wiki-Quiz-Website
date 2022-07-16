"use strict";

function storeData()
{

        var firstname = document.getElementById("Given_Name").value;
		var lastname = document.getElementById("Family_Name").value;
		var studentID = document.getElementById("Student_ID").value;

        localStorage.setItem("firstname", firstname);
		localStorage.setItem("lastname",lastname);
		localStorage.setItem("studentID", studentID);

		return false;

}

function validate()
{
	var result = true;

	var isA = document.getElementById("A").checked;
	var isB = document.getElementById("B").checked;
	var isC = document.getElementById("C").checked;
	var isD = document.getElementById("D").checked;
	var Question4 = document.getElementById("Q4").value;
	var Question5 = document.getElementById("Q5").value;

	if(!(isA||isB||isC||isD))
	{
		showError("q3-error", "You must select an answer!");
		result = false;
	}

	if(Question4 == "")
	{
		showError("q4-error", "You must select an answer!");
		result = false;
	}

	if( Question5 == "")
	{
		showError("q5-error", "This cannot be blank!");
		result = false;
	}

	var a = new Array(quizForm.Q1.value, quizForm.Q2.value, quizForm.Q3.value, quizForm.Q4.value, quizForm.Q5.value);
	var rightAnswers = new Array ("ward cunning", 1995, "asynchronous", "wikipedia", "roadmaps" );

	var score = 0;
	var attempt = 0;

        for(var i = 0; i<5 ; i++)
		{
            if(a[i] == rightAnswers[i]) 
			{
				score++;
			}
        }

	
		
	if(result == false)
	{
		showError("errmsg", "Please check if you have answered all questions");
	}
	else
	{
		if(score == 0)
			{
				//alert("zero");
				showError("scoremsg", "You have scored zero. Try again");
				result = false;
			}
			else
			{
				attempt++;
				localStorage.setItem("totalmark", score.toString());
				localStorage.setItem("attempts", attempt.toString());
			}
		storeData();
		
	}

	return result;
}

//Error Message
function showError(errorElement, err_msg)
{
	document.querySelector("." + errorElement).classList.add("display-error");
	document.querySelector("." + errorElement).innerHTML = err_msg;
}

//Clear Error Messages
function clearError()
{
	var errors = document.querySelectorAll(".error");
	for(let error of errors)
	{
		error.classList.remove("display-error");
	}
}

function prefill()
{
	if(localStorage.firstname != undefined)
	{
		document.getElementById("Given_Name").value = localStorage.firstname;
		document.getElementById("Family_Name").value = localStorage.lastname;
		document.getElementById("Student_ID").value = localStorage.studentID;
	}
}


function init()
{
	prefill();
    var quizForm = document.getElementById("quizForm");
	clearError();
	quizForm.onsubmit = validate;
	clearError();
	
	
}

window.onload = init;
