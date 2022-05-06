const searchBar = document.querySelector(".users .search input"),
searchBtn =document.querySelector(".users .search button"),
usersList =document.querySelector(".users .users-list");

searchBtn.onclick = () =>{
    searchBar.classList.toggle("active");
    searchBar.focus();
    searchBtn.classList.toggle('active')
    searchBar.value = '';
}
searchBar.onkeyup = () =>{
    let searchTerm = searchBar.value;
    if(searchTerm !=''){
        searchBar.classList.add('active')
    }else{
        searchBar.classList.add('active')
    }
    let xhr = new XMLHttpRequest (); // creating xml object
    xhr.open('POST', 'php/search.php', true); // this might cause an error in the future directory is incorrect
    
    xhr.onload = ()=>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                usersList.innerHTML = data;
               
            }
        }
 
    }
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send('searchTerm='+ searchTerm);
}
setInterval(()=>{
    // starting ajax

   let xhr = new XMLHttpRequest (); // creating xml object
   xhr.open('GET', 'php/users.php', true); // this might cause an error in the future directory is incorrect
   
   xhr.onload = ()=>{
       if(xhr.readyState == XMLHttpRequest.DONE){
           if(xhr.status == 200){
               let data = xhr.response;
               if(!searchBar.classList.contains('active')){ // if active dont contain active in searchbar add the data 
                usersList.innerHTML=data;
            }   
              
           }
       }

   }
   xhr.send();
},1000); // this function will run after secomd