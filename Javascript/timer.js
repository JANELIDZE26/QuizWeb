const startingMinutes = document.getElementById("timer").value;
let time = startingMinutes * 60;

const element = document.getElementById("countdown");
const submit = document.getElementById("submit");
let radios = document.querySelectorAll(".radio-button");

setInterval(updateTimer, 1000)

function  updateTimer (){

  const minutes = Math.floor(time/60);
  let seconds = time % 60;

  seconds = seconds < 10 ? "0"+seconds : seconds;
  if(time === 8){
    element.style.color = "red";
   }
 element.innerHTML = `${minutes}:${seconds}`;
 
 time--;
 time = time < 0 ? 0 : time;

 if(time === 0){
  radios.forEach(input => input.removeAttribute("required"))
  submit.click();
 }
}


