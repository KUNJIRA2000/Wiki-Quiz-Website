"use strict";


function getData()
{

		const username = document.getElementById("username");
        username.innerHTML =  localStorage.getItem("firstname") + " " + localStorage.getItem("lastname");

        const ID = document.getElementById("studentID");
        ID.innerHTML = localStorage.getItem("studentID");

        const redobtn = document.getElementById("redobtn");

      

        const mark= document.getElementById("totalmark");
        mark.innerHTML = localStorage.getItem("totalmark");

        const LatestAttempts = localStorage.getItem("attempts");
        const final_attempt = document.getElementById("attempts");

        const num_attempts = JSON.parse(localStorage.getItem("num_attempts")) || [];
    
        final_attempt.innerHTML = LatestAttempts;
 
        const score = {
            ID: ID.innerHTML,
            Mark: mark.innerHTML,
            Attempt: LatestAttempts
        };
    
    num_attempts.push(score);
    num_attempts.splice(2);
    localStorage.setItem("num_attempts", JSON.stringify(num_attempts));
    console.log(num_attempts);

    
}

function init()
{
    getData();
}

window.onload = init;