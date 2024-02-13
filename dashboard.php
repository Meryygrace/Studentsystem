<?php
session_start();

 $id=$_SESSION['ID'];

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
  <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
     <link rel="stylesheet" type="text/css" href="login2.css"> 
</head>
<body>

  
 

 <nav id="navbar" class="">
  <div class="nav-wrapper">
    <!-- Navbar Logo -->
    <div class="logo">
      <!-- Logo Placeholder for Illustration -->
    </div>

    <!-- Navbar Links -->
<ul id="menu">
<li><a href="#home">Home</a></li>
  <li><a href="#div2">Contact</a></li>
   <li><a href="#div1">About</a></li>
    <li><a href="#services">
      <?php

$con=mysqli_connect("fdb1034.awardspace.net","4440708_student","Student123*","4440708_student");
$query=mysqli_query($con,"SELECT username from auth where id='$id'");
if ($query->num_rows>0) {
  $row=mysqli_fetch_assoc($query);
  ?>
<?php echo "Admin: ".$row['username'];?>
  <?php
}



      ?>
    </a></li>
     <li><form method="post" onsubmit="return confirm('Final decission?')"><button name="logout" class="logout">Logout</button></form>

     </li>
    </ul>
  </div>
</nav>


<div class="n">
  <ul id="menu" >
 <li><a href="#home">Home</a></li>
  <li><a href="#div2">Contact</a></li>
   <li><a href="#div1">About</a></li>
    <li><a href="#services">Edit profile</a></li>
     <li><form method="post" onsubmit="return confirm('Final decission?')"><button name="logout" class="logout">Logout</button></form>
 </ul>
</div>
<center>
  <form method="post">
       <input class="in2" type=""  placeholder="  search" name="fname">
       <button class="btnsearch" name="search"><li class="fas fa-search"></li></button>
     </form>
<table class="table2" >

 


  <?php 
if (isset($_POST['search'])) {
  # code...
$fname=$_POST['fname'];
$con=mysqli_connect("fdb1034.awardspace.net","4440708_student","Student123*","4440708_student");

$query=mysqli_query($con,"SELECT * from info Where fname like '%$fname%' && u_id ='$id'");
if ($query->num_rows >0) {
  # code...
echo ' 
<h4>Edit info</h4>
<tr>
      <th style="background-color: dodgerblue;color: white">First Name</th>
          <th style="background-color: dodgerblue;color: white" >Middle Name</th>
              <th style="background-color: dodgerblue;color: white">Last Name</th>
                  <th style="background-color: dodgerblue;color: white">Age</th>
                      <th style="background-color: dodgerblue;color: white">Gender</th>
                       <th style="background-color: dodgerblue;color: white">Year Level</th>
                        <th style="background-color: dodgerblue;color: white">Course</th>
                         <th style="background-color: dodgerblue;color: white">Section</th>
                          <th style="background-color: dodgerblue;color: white">Save</th>
                         <th style="background-color: dodgerblue;color: white">Drop</th>
    
  </tr> ';
 while($row=mysqli_fetch_assoc($query)){

?>
<form method="post" action="addstud.php">
  <tr>
<td><input class="in3" type="text" value="<?php echo $row['fname']  ?>" name="fname">
<td><input  class="in3"  type="text" value="<?php echo $row['mname']  ?>"  name="mname">
<td><input  class="in3" type="text" value="<?php echo $row['lname']  ?>"  name="lname">
<td><input class="in3"  type="text" value="<?php echo $row['age'] ?>"  name="age">
<td><input  class="in3" type="text" value="<?php echo $row['gender']  ?>" name="gender">
<td><input class="in3"  type="text" value="<?php echo $row['year']  ?>"  name="year">
<td><input  class="in3" type="text" value="<?php echo $row['course'] ?>"  name="course">
<td><input  class="in3" type="text" value="<?php echo $row['section'] ?>"  name="section">
  <input  class="in3" type="hidden" value="<?php echo $row['id'] ?>"  name="id">
  <td><input class="in3" style="text-align: center;color: blue" type="submit" value="save" name="edit">
  <td> <input class="in3" type="submit" style="text-align: center;color: red" value="drop" name="delete">
</tr>
</form>

<?php
}}
else{
  echo "<center>No results found!</center>";
}

}
   ?>
</table>

<br>


<style type="text/css">
  .n{
    display: none;
  }
</style>


<?php
if (isset($_POST['logout'])) {

  echo'<script>window.location.href="index.php";</script>';
  # code...
}

?>

<!-- Menu Icon -->
<div class="menuIcon">
 
</div>





<div id="sidebar">
               
               <center>

                 <form method="post" onsubmit="return validateForm()" action="addstud.php">
                  <div class="div2">
                      <button id="closeButton" style="background-color: blue;border: none"><li class="fas fa-times" style="color: red;border: none;background-color: white;font-size: 20px;position: absolute;top: 50px;left: 20px"></li></button>
                  <br><br><h1 style="font-family: Cursive, Times, serif;">New student</h1>
            

                
              <input class="in1" placeholder="First Name" type="text" name="fname" required="required">
                <input class="in1" placeholder="Middle Name" type="text" name="mname" required="required">
                  <input class="in1" placeholder="Last Name"   type="text" name="lname" required="required">
                     <input class="in1" placeholder="Age" name="age"  type="number" required="required">  <br><br>
                          Gender <select name="gender">
                            <option>Male</option>
                              <option>Female</option>
                               
                          </select><br>
                          <input class="in1" name="num"  type="hidden" value="1" > 
                        <input type="hidden" value="<?php echo $_SESSION['ID']; ?>" name="u_id">
                        
                          Year Level <select name="year">
                            <option>1st year</option>
                              <option>2nd year</option>
                                <option>3rd year</option>
                                  <option>4th year</option>
                          </select><br>
                          Course <select name="course">
                            <option>BSIT</option>
                              <option>BSIS</option>
                                <option>BSCE</option>
                                  <option>BSCS</option>
                          </select><br>
                            Section <select name="section">
                            <option>A</option>
                              <option>B</option>
                                <option>C</option>
                                  <option>D</option>
                          </select>
                  </div>
                    <button name="insert" class="Sign-in" style="position: relative;top: 40px;">submit</button>
                  </form>
                
               </center>
           

           </div>
       </div>







<center><br>
  <div class="container2">
  <div class="background">
    <form><br>
      <button class="btnadd" id="openButto">Add Student</button>
    </form>
  </div>
   <div class="background2"><br><br>
    <center> <h4 style="color: gray;">Your Students Records</h4>
  

  <table>
    <tr>
      <th>First Name</th>
          <th>Middle Name</th>
              <th>Last Name</th>
                  <th>Age</th>
                      <th>Gender</th>
                       <th>Year Level</th>
                        <th>Course</th>
                         <th>Section</th>
                         
    </tr>

   
     <?php 
   // connecting to the database.
   $mysqli = new mysqli('fdb1034.awardspace.net', '4440708_student', 'Student123*', '4440708_student');
   if($mysqli->connect_errno != 0){
      echo $mysqli->connect_error;
      exit();
   }else{
      $mysqli->set_charset("utf8mb4");  
   }
?>

   <?php
   // get the total nr of rows.
   $records = $mysqli->query("select * from info");
   $nr_of_rows = $records->num_rows;
   
   // Setting the number of rows to display in a page.
   $rows_per_page = 2;
 
   // calculating the nr of pages.
   $pages = ceil($nr_of_rows / $rows_per_page);
 
   // Setting the start from, value.
   $start = 0;


if(isset($_GET['page-nr'])){
      $page = $_GET['page-nr'] - 1;
      $start = $page * $rows_per_page;
   }
 
   // Query the database based on the calculated $start value, 
   // and the fixed $rows_per_page value.
   $result = $mysqli->query("SELECT * FROM info where u_id='$id' LIMIT $start, $rows_per_page");
?>


      <?php 
         while($row = $result->fetch_assoc()){
            ?>
               
<tr>
<td><?php echo $row['fname'] ?>
<td><?php echo $row['mname']  ?>
<td><?php echo $row['lname']  ?>
<td><?php echo $row['age'] ?>
<td><?php echo $row['gender']  ?>
<td><?php echo $row['year']  ?>
<td><?php echo $row['course'] ?>
<td><?php echo $row['section'] ?>
</td>
         <?php
         }
      ?>
 

    <div class="page-info">
      <?php 
         if(!isset($_GET['page-nr'])){
            $page = 1;
         }else{
            $page = $_GET['page-nr'];
         }
      ?>
     
   </div>
<br>



    <a class="a" href="?page-nr=1">First</a>
     <?php 
         if(isset($_GET['page-nr']) && $_GET['page-nr'] > 1){
            ?> <a class="a" href="?page-nr=<?php echo $_GET['page-nr'] - 1 ?>">Previous</a> <?php
         }else{
            ?> <a>Previous </a>  <?php
         }
      ?>

     <div class="page-numbers">
         <?php 
            if(!isset($_GET['page-nr'])){
               ?> <a class="active a" href="?page-nr=1">1</a> <?php
               $count_from = 2;
            }else{
               $count_from = 1;
            }
         ?>
         
         <?php
            for ($num = $count_from; $num <= $pages; $num++) {
               if($num == @$_GET['page-nr']) {
                  ?> <a class="active a" href="?page-nr=<?php echo $num ?>"><?php echo $num ?></a> <?php
               }else{
                  ?> <a class="a" href="?page-nr=<?php echo $num ?>"><?php echo $num ?></a> <?php
               }
            }
         ?>
      </div>


 <?php 
      if(!isset($_GET['page-nr'])){
         ?> <a class="active a" href="?page-nr=1">1</a> <?php
         $count_from = 2;
      }else{
         $count_from = 1;
      }
   ?>
    

    <?php 
      if(isset($_GET['page-nr'])){
         if($_GET['page-nr'] >= $pages){
            ?> <a>Next</a> <?php
         }else{
            ?> <a class="a" href="?page-nr=<?php echo $_GET['page-nr'] + 1 ?>">Next</a> <?php
         }
      }else{
         ?> <a class="a" href="?page-nr=2">Next</a> <?php
      }
   ?><a class="a" href="?page-nr=<?php echo $pages ?>">Last</a>

<br><br><br>

    
  </table>
    </center>

   </div></div>



<div class="container4">

<div class="div4"><br>
  <strong><p>Your Students</p></strong>
  <hr>
   <?php $con = mysqli_connect("fdb1034.awardspace.net","4440708_student","Student123*","4440708_student");
  $query=mysqli_query($con,"SELECT num FROM info where u_id='$id'");
  $sum=0;
  if ($query->num_rows>0) {
   while($row =$query->fetch_assoc()){
    $sum += $row['num'];
   }
   ?>
  <?php
  echo "<h2>".$sum."</h2>"; 
 
  }else{
    echo "<h2>0</h2>";
  }
   ?>
           
</div>
<div class="div5"><br>
  <strong><p>Overall</p></strong>
  <hr>
     <?php $con = mysqli_connect("4440708_student","4440708_student","Student123*","4440708_student");
  $query=mysqli_query($con,"SELECT num FROM info");
  $sum=0;
  if ($query->num_rows>0) {
   while($row =$query->fetch_assoc()){
    $sum += $row['num'];
   }
   ?>
  <?php
  echo "<h2>".$sum."</h2>"; 
 
  }else{
    echo "<h2>0</h2>";
  }
   ?>
</div>


</div>
 
     
     
   </div>
</center>
</div>
   <br>   <br>   <br>   <br>   <br>   <br>   
  <center><strong><p style="color: gray">About us</p></strong></center>
 <div class="background" id="div1"><br>
  
   <br>
   
 </div>
<p style="width: 60%">We build this system together with my fellow members. and our purpose is to organize the sudent information using the online flatform. In this we can do some edit or delete the student information if necessary this system can helps us to gather any records of a college students for any purpose this system also provide a functionality to recognize a specific students name, year level,course gender and etch. </p>
<br><br>

<div class="contact" id="div2">
  <br><h2 style="color: white"> Contact us</h2>
  <p>09435453</p>
  <a href="">facebook</a><br><br>

  <p>location: cpsu</p>
  <p>More info</p>
</div>



</body>
</html>

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
   const openButton = document.getElementById('openButto');
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

<style type="text/css">
.contact{
  width: 100%;
  height: 400px;
  background-color: dodgerblue;
}

    a.active{
   background-color: #0d81cd;
   color: #fff;
}

.a{
   display: inline-block;
   text-decoration: none;
   color: #006cb3;
   padding: 10px 20px;
   border: thin solid #d4d4d4;
   transition: all 0.3s;
   font-size: 12px;
margin-right: 10px;
}
 
a.active{
   background-color: #0d81cd;
   color: #fff;
   font-size: 13px;
}
.page-info{
 
   font-size: 18px;
   font-weight: bold;
}
 
.pagination{
   margin-top: 20px;
}
.content p{
   margin-bottom: 15px;
}
.page-numbers{
   display: inline-block;
}




  .in3{
    text-align: center;
    width: 100px;
    box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
  }
.table2{
  width: 70%;
  height: 30px;
}
  .div6{
    height: 400px;
    width:70%;
     box-shadow: rgba(255, 255, 255, 0.1) 0px 1px 1px 0px inset, rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;

  }
  td{
  
text-align: center;
  }
  .in1{
    text-align: center;
  }
  .container4{
    

    display: flex;
    flex-wrap: wrap;

  }
hr{
  width: 50%;
  color: red;
  border: solid 2px;
}
  .div4, .div5{
    margin-left: 40px;
    width: 20%;
    height: 130px;
    border-radius: 20px;
    background-color: white;
    box-shadow: rgba(255, 255, 255, 0.1) 0px 1px 1px 0px inset, rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;
  }
  .btnadd{
    width:25%;
    height: 40px;
    background-color: dodgerblue;
    color: white;
    transition: 0.1s ease;
border-radius: 20px;
  }
  .btnadd:hover{
    transform: scale(1.1);
  }
  .in2{
    font-size: 13px;
    background-color: lightgray;
    border-radius: 10px;
    height: 30px;
  }
  .btnsearch:hover{
    transform: scale(1.1);
  }
  .btnsearch{
    transition: 0.1s ease;
    background-color: dodgerblue;color: white;width: 50px;
    height: 50px;
    border-radius: 100%;
  }
  .container3{
    background-color: white;
    width: 90%;
    height: 300px;
  
  }
  table{
    width: 100%;
 
   left: 20px;
   height: 80px;

  }
  th{
   
    font-family: Cursive, Times, serif;
    letter-spacing: 1px;
    height: 20px;
   text-align: center;
   
    font-size: 13px;
  }
.container2{
  height: 450px;
  display: flex;
  flex-wrap: wrap;
overflow: auto;
}
.background2{
 
    width: 66%;
    height: 400px;
    background-repeat: no-repeat;
    background-size: cover;
   
    top: 40px;
    background-color: white;
  }
  .background{
    background-image: url('b.avif');
    width: 33.2%;
    height: 400px;
    background-repeat: no-repeat;
    background-size: cover;
   
    top: 40px;
  }
  .logout{
    width: 100px;
    height: 30px;
    background-color: white;
    color: red;
    
    transition: 0.1s ease;
  }
  .logout:hover{
    transform: scale(1.1);
  }
  * {
  border: 0;
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body {
  background-color: white;
  font-family: Lato, Helvetica, Arial, sans-serif;
}

a {
  color: inherit;
  font-family: inherit;
  font-size: inherit;
  text-decoration: none;
}


/*======================================================
                          Navbar
  ======================================================*/
#navbar {
  background: white;
  color: rgb(13, 26, 38);
 
  top: 0;
  height: 60px;
  line-height: 60px;
  width: 100vw;
  z-index: 10;
}

.nav-wrapper {
  margin: auto;
  text-align: center;
  width: 70%;
} @media(max-width: 768px) {
    .nav-wrapper {
      width: 90%;
    }
  } @media(max-width: 638px) {
      .nav-wrapper {
        width: 10%;
      }
    } 


.logo {
  float: left;
  margin-left: 28px;
  font-size: 1.5em;
  height: 30px;
  letter-spacing: 1px;
  text-transform: uppercase;
} @media(max-width: 768px) {
    .logo {
/*       margin-left: 5px; */
    }
  }

#navbar ul {
  display: inline-block;
  float: right;
  list-style: none;
  /* margin-right: 14px; */
  margin-top: -2px;
  text-align: right;
  transition: transform 0.5s ease-out;
  -webkit-transition: transform 0.5s ease-out;
} @media(max-width: 640px) {

ul{
  display: flex;
}
li{
  margin-right: 10px;
  list-style-type: none;
}
.n{
  display: flex;
}



.table2{
  width: 100%;
}
 .in3{
    width: 50px;
   box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
  }
.div4,.div5{
  height: 150px;
  width: 200px;
}
td{
  font-size: 11px;
}
table{
    width: 100%;
   position: none;
   left: 0px;

  }

.container3{
    background-color: white;
    width: 550px;
    height: 300px;

  
  }
th{
  font-size: 11px;
}
.background2{
  width: 550px;
}
.background{
  width: 550px;
}



    #navbar ul {
      display: none;
    }
  } @media(orientation: landscape) {
      #navbar ul {
        display: inline-block;
      }
    }

#navbar li {
  display: inline-block;
}

#navbar li a {
  color: rgb(13, 26, 38);
  display: block;
  font-size: 0.7em;
  height: 50px;
  letter-spacing: 1px;
  margin: 0 20px;
  padding: 0 4px;
  position: relative;
  text-decoration: none;
  text-transform: uppercase;
  transition: all 0.5s ease;
  -webkit-transition: all 0.5s ease;
}

#navbar li a:hover {
  /* border-bottom: 1px solid rgb(28, 121, 184); */
  color: rgb(28, 121, 184);
  transition: all 1s ease;
  -webkit-transition: all 1s ease;
}

/* Animated Bottom Line */
#navbar li a:before, #navbar li a:after {
  content: '';
  position: absolute;
  width: 0%;
  height: 1px;
  bottom: -1px;
  background: rgb(13, 26, 38);
}

#navbar li a:before {
  left: 0;
  transition: 0.5s;
}

#navbar li a:after {
  background: rgb(13, 26, 38);
  right: 0;
  /* transition: width 0.8s cubic-bezier(0.22, 0.61, 0.36, 1); */
}

#navbar li a:hover:before {
  background: rgb(13, 26, 38);
  width: 100%;
  transition: width 0.5s cubic-bezier((0.22, 0.61, 0.36, 1));
}

#navbar li a:hover:after {
  background: transparent;
  width: 100%;
  /* transition: 0s; */
}



/*======================================================
                    Mobile Menu Menu Icon
  ======================================================*/
@media(max-width: 640px) {
  .menuIcon {
    cursor: pointer;
    display: block;
    position: fixed;
    right: 15px;
    top: 20px;
    height: 23px;
    width: 27px;
    z-index: 12;
  }

  /* Icon Bars */
  .icon-bars {
    background: rgb(13, 26, 38);
    position: absolute;
    left: 1px;
    top: 45%;
    height: 2px;
    width: 20px;
    -webkit-transition: 0.4s;
    transition: 0.4s;
  } 

  .icon-bars::before {
    background: rgb(13, 26, 38);
    content: '';
    position: absolute;
    left: 0;
    top: -8px;
    height: 2px;
    width: 20px;
/*     -webkit-transition: top 0.2s ease 0.3s;
    transition: top 0.2s ease 0.3s; */
    -webkit-transition: 0.3s width 0.4s;
    transition: 0.3s width 0.4s;
  }

  .icon-bars::after {
    margin-top: 0px;
    background: rgb(13, 26, 38);
    content: '';
    position: absolute;
    left: 0;
    bottom: -8px;
    height: 2px;
    width: 20px;
/*     -webkit-transition: top 0.2s ease 0.3s;
    transition: top 0.2s ease 0.3s; */
    -webkit-transition: 0.3s width 0.4s;
    transition: 0.3s width 0.4s;
  }

  /* Bars Shadows */
  .icon-bars.overlay {
    background: rgb(97, 114, 129);
    background: rgb(183, 199, 211);
    width: 20px;
    animation: middleBar 3s infinite 0.5s;
    -webkit-animation: middleBar 3s infinite 0.5s;
  } @keyframes middleBar {
      0% {width: 0px}
      50% {width: 20px}
      100% {width: 0px}
    } @-webkit-keyframes middleBar {
        0% {width: 0px}
        50% {width: 20px}
        100% {width: 0px}
      }

  .icon-bars.overlay::before {
    background: rgb(97, 114, 129);
    background: rgb(183, 199, 211);
    width: 10px;
    animation: topBar 3s infinite 0.2s;
    -webkit-animation: topBar 3s infinite 0s;
  } @keyframes topBar {
      0% {width: 0px}
      50% {width: 10px}
      100% {width: 0px}
    } @-webkit-keyframes topBar {
        0% {width: 0px}
        50% {width: 10px}
        100% {width: 0px}
      }

  .icon-bars.overlay::after {
    background: rgb(97, 114, 129);
    background: rgb(183, 199, 211);
    width: 15px;
    animation: bottomBar 3s infinite 1s;
    -webkit-animation: bottomBar 3s infinite 1s;
  } @keyframes bottomBar {
      0% {width: 0px}
      50% {width: 15px}
      100% {width: 0px}
    } @-webkit-keyframes bottomBar {
        0% {width: 0px}
        50% {width: 15px}
        100% {width: 0px}
      }


  /* Toggle Menu Icon */
  .menuIcon.toggle .icon-bars {
    top: 5px;
    transform: translate3d(0, 5px, 0) rotate(135deg);
    transition-delay: 0.1s;
    transition: transform 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
  }

  .menuIcon.toggle .icon-bars::before {
    top: 0;
    transition-delay: 0.1s;
    opacity: 0;
  }

  .menuIcon.toggle .icon-bars::after {
    top: 10px;
    transform: translate3d(0, -10px, 0) rotate(-270deg);
    transition-delay: 0.1s;
    transition: transform 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
  }

  .menuIcon.toggle .icon-bars.overlay {
    width: 20px;
    opacity: 0;
    -webkit-transition: all 0s ease 0s;
    transition: all 0s ease 0s;
  }
}


/*======================================================
                   Responsive Mobile Menu 
  ======================================================*/
.overlay-menu {
  background: lightblue;
  color: rgb(13, 26, 38);
  display: flex;
  align-items: center;
  justify-content: center;
  position: absolute;
  top: 0;
  right: 0;
  padding-right: 15px;
  transform: translateX(-100%);
  width: 100vw;
  height: 100vh;
  -webkit-transition: transform 0.2s ease-out;
  transition: transform 0.2s ease-out;
}

.overlay-menu ul, .overlay-menu li {
  display: block;
  position: relative;
}

.overlay-menu li a {
  display: block;
  font-size: 1.8em;
  letter-spacing: 4px;
/*   opacity: 0; */
  padding: 10px 0;
  text-align: right;
  text-transform: uppercase;
  -webkit-transition: color 0.3s ease;
  transition: color 0.3s ease;
/*   -webkit-transition: 0.2s opacity 0.2s ease-out;
  transition: 0.2s opacity 0.2s ease-out; */
}

.overlay-menu li a:hover,
.overlay-menu li a:active {
  color: rgb(28, 121, 184);
  -webkit-transition: color 0.3s ease;
  transition: color 0.3s ease;
}
</style>
<script type="text/javascript">
  
  /*============================================================================
                                    Évelym S.
                    https://www.linkedin.com/in/evelym-santos/
  ============================================================================*/

    // Navigation
        // Responsive Toggle Navigation =============================================
        let menuIcon = document.querySelector('.menuIcon');
        let nav = document.querySelector('.overlay-menu');

        menuIcon.addEventListener('click', () => {
            if (nav.style.transform != 'translateX(0%)') {
                nav.style.transform = 'translateX(0%)';
                nav.style.transition = 'transform 0.2s ease-out';
            } else { 
                nav.style.transform = 'translateX(-100%)';
                nav.style.transition = 'transform 0.2s ease-out';
            }
        });


        // Toggle Menu Icon ========================================
        let toggleIcon = document.querySelector('.menuIcon');

        toggleIcon.addEventListener('click', () => {
            if (toggleIcon.className != 'menuIcon toggle') {
                toggleIcon.className += ' toggle';
            } else {
                toggleIcon.className = 'menuIcon';
            }
        });
</script>