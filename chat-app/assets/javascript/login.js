const form = document.querySelector('.login form'),
continueBtn = form.querySelector('.button input'),
errorText = form.querySelector('.error-txt');
console.log('james')
form.onsubmit = (e) =>{
    e.preventDefault(); // preventing form from submitting
}
continueBtn.onclick = () =>{
   // starting ajax

   let xhr = new XMLHttpRequest (); // creating xml object
   xhr.open('POST', 'php/login.php', true); // this might cause an error in the future directory is incorrect
   
   xhr.onload = ()=>{
       if(xhr.readyState == XMLHttpRequest.DONE){
           if(xhr.status == 200){
               let data = xhr.response;
              
               if(data == 1 ){ 
                location.href ='users.php'
                
               }else{
            
                errorText.textContent = data
                errorText.style.display='block';
                

               }
            
              
           }
       }

   }
   // we have to send the form to php through ajax 
   let formData = new FormData(form); // creating new formData
   xhr.send(formData);// sending the form data to php 
}