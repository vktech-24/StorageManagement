var logout=document.getElementById("logout-btn");

logout.addEventListener('click',(e)=>{
   if(confirm('Are You Sure To Logout')==true){
      window.location.replace("students.php");
      e.preventDefault();
   }
})