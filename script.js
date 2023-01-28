//Contact Form in PHP
const form = document.querySelector("form"),
statusTxt = form.querySelector(".button-area span");

form.onsubmit = (e) => {
  e.preventDefault(); // prevent form refresh
  statusTxt.style.color = "#88d6c4"; // display message
  statusTxt.style.display = "block";
  statusTxt.innerText = "Sending your message...";

  let xhr = new XMLHttpRequest(); // create new xml object
  xhr.open("POST", "message.php", true); // send post request to message.php
  xhr.onload = ()=>{
    if(xhr.readyState == 4 && xhr.status == 200){ //check if ajax request is sent and fulfilled
      let response = xhr.response;
      // form validation
      if(response.indexOf("required") != -1 || response.indexOf("valid") != -1 || response.indexOf("failed") != -1){
        statusTxt.style.color = "red";
      }else{
        form.reset();
        setTimeout(()=>{
          statusTxt.style.display = "none";
        }, 3000);
      }
      statusTxt.innerText = response;
    }
  }
  let formData = new FormData(form); // create new FormData object
  xhr.send(formData); // send form data
}