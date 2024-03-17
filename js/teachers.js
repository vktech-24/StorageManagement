var logout=document.querySelectorAll("#logout");

logout.forEach((out)=>{
   out.addEventListener('click',(e)=>{
      if(confirm('Are You Sure To Logout')==true){
         window.location.replace("index.php");
         e.preventDefault();
      }
   })
})

const inputname=document.getElementById('file');
var filename=document.querySelector('.filename')

inputname.addEventListener('change',function(){
   const file=inputname.files[0];
   if(file){
      filename.innerHTML=file.name;
   }
})

document.addEventListener('DOMContentLoaded', function () {
   const checkbox = document.getElementById('check');
   const dropMenu = document.querySelector('.drop');

   checkbox.addEventListener('change', function () {
       if (checkbox.checked) {
         dropMenu.style.display='flex';
       } else {
         dropMenu.style.display='none';
       }
   });
});
