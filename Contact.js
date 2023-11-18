const form = document.querySelector("form"),
statusTxt = form.querySelector(".button-area span");


form.onsubmit = (e)=>{
    e.preventDefault();
    statusTxt.innerText = "Sending your message...";
    statusTxt.style.color = "#f9f4f4";
    statusTxt.style.display = "block";


    let xhr = new XMLHttpRequest();
    xhr.open("POST","Contact.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState == 4 && xhr.status == 200){
            let response = xhr.response;
            if(response.indexOf("Email and Message is required!") != -1 || response.indexOf("Enter a valid Email address!") || response.indexOf("Sorry, failed to send your Message!")){
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
    let formData = new FormData(form);
    xhr.send(formData);
}