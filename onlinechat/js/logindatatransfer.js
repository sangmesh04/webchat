const form = document.querySelector(".login form"),
continueBtn = form.querySelector(".button input");


form.onsubmit = (e)=>{
    e.preventDefault();
}

continueBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "backend/login.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              if(data === "success"){
                location.href = "home.php";
              }else{
                location.href = "main.php";
              }
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}