

 <!DOCTYPE html>
   <html>
   <head>
   	<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
       <link rel="stylesheet" type="text/css" href="styles.css">
        <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
    <link rel="stylesheet" type="text/css" href="login2.css">
   </head>
   <body>
       <div class="container">

<div class="nav">
	<a href="#div1"><button  class="create">About us</button></a>
</div>

   <center><br>
    <div style="display: flex;width: 100%">
   	<h1 style="position: relative;top: 0px;font-family: Cursive, Times, serif;color: dimgray">College Student, Management System</h1>
   <img src="b.jpg" width="100px" height="100px"></div>

   <div class="div1"><br>
   	<?php
  if (isset($_GET['msg'])) {
  	echo '<center><p style="color:orange">'.$_GET['msg'].'</center>';
  }else{


  	?>
<div class="margin"><h2>Sign-in</h2></div>
  	<?php
  
  }?>
  
   	<form method="post" action="login.php">
     <input class="in1" type="email" name="email" placeholder=" email" required="required"><br>
      <input class="in1" type="password" name="password" placeholder=" password" required="required"><br>
      	<button class="Sign-in" name="login">Login</button>
         </form>
     <p>Dont have an account? <button id="openButton"  class="click1"> Sign-up</button></p>
          </div>
           </center>


             <div id="sidebar">
               <button id="closeButton" style="background-color: white;border: none"><li class="fas fa-times" style="color: red;border: none;background-color: white;font-size: 20px;"></li></button>
               <center>

               	 <form method="post" onsubmit="return validateForm()" action="login.php">
               	  <div class="div2">
               	  <h1 style="font-family: Cursive, Times, serif;">Sign-up</h1>
            

                
                 <input class="in1" placeholder="username" type="text" name="username" required="required">
             		<input class="in1" placeholder="email" type="email" name="email" required="required">
             			<input class="in1" placeholder="password"  id="password" type="password" name="password" required="required">
             			   <input class="in1" placeholder="confirm password"  id="confirm-password"  type="password" required="required">
                        
             		
             			</div>
             		    <button name="register" class="Sign-in" style="position: relative;top: 40px;">submit</button>
             			</form>
               </center>
           

           </div>
       </div>
 

<center>
   <div class="background" id="div1"><br>
    <center><strong><p style="color: gray">About us</p></strong></center>
   <br>
   <p>We build this system together with my fellow members. and our purpose is to organize the sudent information using the online flatform. In this we can do some edit or delete the student information if necessary this system can helps us to gather any records of a college students for any purpose this system also provide a functionality to recognize a specific students name, year level,course gender and etch. </p>
 </div>
</center>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <style type="text/css">
      
      .background{
        position: relative;
        top: 200px;
 width: 70%;
 height: 400px;
 line-height: 40px;
 font-size: 20px;
      }
    </style>  

  </body>
</html>
<script type="text/javascript">
	function validateForm() {
  var password = document.getElementById("password").value;
  var confirmPassword = document.getElementById("confirm-password").value;
 
  if (password != confirmPassword) {
    alert("Passwords do not match!");
    return false;
  }
 
  // Form submission
  // Uncomment the line below if you want the form to submit
  // return true;
}
function myFunction() {
  var x = document.getElementById("confirm-password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>



   <script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
  var scrollLinks = document.querySelectorAll('[href^="#"]');
  
  scrollLinks.forEach(function(link) {
    link.addEventListener('click', function(e) {
      e.preventDefault();
      
      var targetId = this.getAttribute('href');
      var targetElement = document.querySelector(targetId);
      
      if (targetElement) {
        targetElement.scrollIntoView({
          behavior: 'smooth'
        });
      }
    });
  });
});



</script>


  <script>
   const openButton = document.getElementById('openButton');
   const closeButton = document.getElementById('closeButton');
   const sidebar = document.getElementById('sidebar');
 
   openButton.addEventListener('click', () => {
       sidebar.classList.add('open');
   });
 
   closeButton.addEventListener('click', () => {
       sidebar.classList.remove('open');
   });
 
   // Preserve the sidebar state when the page is refreshed using localStorage
   window.addEventListener('beforeunload', () => {
       if (sidebar.classList.contains('open')) {
           localStorage.setItem('sidebarOpen', 'true');
       } else {
           localStorage.removeItem('sidebarOpen');
       }
   });
 
   window.addEventListener('load', () => {
       if (localStorage.getItem('sidebarOpen')) {
           sidebar.classList.add('open');
       }
   });
  </script>



</body>
</html>

<style type="text/css">
	

</style>