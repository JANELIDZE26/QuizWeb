const form = document.getElementById("form");
const userName = document.getElementById("user");
const fullName = document.getElementById("fullname");
const button  = document.getElementById("submit");
const inputs  = document.querySelectorAll(".inputs");
let showAttention = true;


form.addEventListener("submit", function(event){
    const password = document.getElementById("password");
    const confirmPass = document.getElementById("confirm-password");

    const regexTest = /\d/g;
    const checkPass = regexTest.test(password.value);
    const checkConfirm = password.value === confirmPass.value;
    const checkUpper = password.value !== password.value.toLowerCase();
    const checkLength = password.value.length > 5;
    
    if(!checkPass || !checkUpper || !checkConfirm || !checkLength){
        event.preventDefault();
        

        if(showAttention){


            userName.style.borderBottom = "1px solid red";
            fullName.style.borderBottom = "1px solid red";
            password.style.borderBottom = "1px solid red";
            confirmPass.style.borderBottom = "1px solid red";
            // button.style.borderBottom = "1px solid red";
            // button.style.color = "red";
            const html = "<p class='login-attention'>Your Password Does not meet Requirements!</p>";
          
            console.log(inputs);
            inputs.forEach(element => element.classList.add("error"));
            document.getElementById("attention").insertAdjacentHTML("beforeend",html);

            showAttention = false;
        }


        
    }
})
