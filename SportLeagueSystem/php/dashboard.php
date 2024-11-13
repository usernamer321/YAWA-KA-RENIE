<?php
session_start(); 

// Check if the user is logged in
include 'db_connect.php';

if (!isset($_SESSION['userid'])) {
    header("Location: login.php");
    exit();
}

echo "<h1>Welcome, " . $_SESSION['username'] . "!</h1>";
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE-edge">
<meta name="viewport" content="width=device-width, intial-scale=1.0">
<title>Sports League System</title>

<!--fav-icon-->
<link rel="shortcut icon" href="22"/>
<style>
    /* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    width: 400px;
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
body{
    margin:0px;
    padding: 0px;
    font-family: calibri;
    background-color: floralwhite;
}
*{
    box-sizing: border-box;
}
ul{
    list-style: none;
}
a{
    text-decoration: none;
}
button{
    outline: none;
    border: none;
}
input{
    outline: none;
    border: none;
}
.main{

    width:100%;
    height:768px;
    position: relative;
}
.logo img{
    height: 60px;
    width: 50px;
}
nav{
    display: flex;
    align-items: center;
    justify-content: space-around;
    padding: 0px 30px;
    background-color:#fff;
    box-shadow: 2px 2px 20px rgba(255, 151, 103, 0.164);
    z-index: 1;
    width:100%;
    position: fixed;
    left: 0px;
    top: 0px;
}
nav ul{
    display: flex;
    margin:0px;
    padding: 0px;
}
nav ul li a{
    height:40px;
    line-height: 43px;
    margin: 8px;
    padding: 0px 10px;
    display: flex;
    font-size: 0.9rem;
    text-transform: uppercase;
    font-weight: 400;
    color:#111;
    letter-spacing: 1px;
    transition: 0.4s ease-in-out;
}
.active{
    background-color: #F14D5D;
    color: #fff;
}
nav ul li a:hover{
    border-radius: 5px;
    background-color: #F14D5D;
    color:#fff;
    box-shadow: 5px 10px 30px rgba(219, 74, 6, 0.5);
    transition: all ease 0.2s;
}
.home-content{
    display: flex;
    justify-content: space-around;
    align-items: center;
    position: absolute;
    left: 50%;
    top:50%;
    transform: translate(-50%,-50%);
    width:90%;

}
.home-img{
    width:500px;
    height:400px;
    margin:20px;
}
.home-img img{
    width: 100%;
    height: 100%;
    object-fit: contain;
    object-position: center;
}
.home-text{
    width:500px;
    margin: 20px;
}
.home-text h1{
    font-size: 3.5rem;
    line-height: 55px;
    color:#22252e;
    letter-spacing: 1px;
    font-weight: 700;
    margin: 0px;
}
.home-text p{
    font-size: 1rem;
    color:#777474;
}
.home-text span{
    color: #F14D5D;
    text-decoration: underline;
}
.main-login{
    width:120px;
    height:40px;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #F14D5D;
    color:#fff;
    box-shadow: 5px 10px 30px rgba(219, 74, 6, 0.5);
    text-transform: uppercase;
    transition: 0.3s ease-in-out;
}
.main-login:hover{
    background-color: #F14D5D;
    transition: all ease 0.3s;
}
.arrow{
    align-self: end;
    width:50%;
    border-right: 1px solid #F14D5D;
    height: 20%;
    margin-bottom:20em ;
    position: absolute;
    bottom: 5px;
    right: 70px;
    animation: arrow-animation ease 1.5s;

}
.arrow::after{
    content: '';
    position: absolute;
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 11px 11px 0px 11px;
    border-color: #F14D5D transparent transparent transparent;
    right: -0.7em;
    bottom: -2px;
}
.scroll{
    position: absolute;
    bottom: 260px;
    right:55px;
    font-weight: 600;
}
@keyframes arrow-animation{
    0%{
        bottom: 70px;
        opacity: 0.2;
    }
    100%{
        bottom: 5px;
        opacity: 1;
    }
}
.services{
    background-size: 1000px;
    background-position: center;
}
.services-heading{
    margin-top: 60px;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    flex-direction: column;
}
.services-heading h2{
    line-height: 55px;
    font-size: 2.2rem;
    color:#22252e;
    letter-spacing: 1px;
    font-weight: 700;
    margin: 0px;
}
.services-heading p{
    font-size: 1rem;
    color:#777474;
    width:50%;
}
.box-container{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    margin: 20px 30px;
}
.box{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width:300px;
    height: 400px;
    text-align: center;
    box-shadow: 2px 2px 20px rgba(90,118,253,0.15);
    border-radius: 10px;
    background-color: #fff;
    margin: 20px;
    flex-grow: 1;
}
.box img{
    height:150px;
    margin:150px;
}
.box font{
    font-size: 1.5rem;
    color: #22252e;
    letter-spacing: 1px;
    font-weight: 700;
}
.box p{
    font-size: 1rem;
    color: #777474;
    display: block;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 500px;
}
.box a{
    width: 150px;
    height:40px;
    display: flex;
    justify-content: center;
    align-items: center;
    border: 2px solid #5a76fd;
    text-transform: uppercase;
    margin: auto;
    border-radius: 5px;
    font-weight: 600;
    font-size: 0.9rem;
    color:#5a76fd;
    margin:0px;
}
.box a:hover{
    background-color: #5a76fd;
    color:#fff;
    box-shadow: 5px 10px 30px rgba(90,118,253,0.5);
    transition: all ease 0.3s;
}

.box{
    width: 100px;
    height: 400px;
    background-color: skyblue;
    box-shadow: 2px 2px 30px rgba(0,0,0,0.05);
    display: center;
    flex-direction: column;
    align-items: center;
    justify-content: space-between;
    padding: 10px;
    border-radius: 10px;
    margin: 10px;
    position: relative;
}
.about{

    width:100%;
    height:768px;
    position: relative;
}
.about-content{
    display: flex;
    justify-content: space-around;
    align-items: center;
    position: absolute;
    left: 50%;
    top:50%;
    transform: translate(-50%,-50%);
    width:90%;

}
.about-img{
    width:500px;
    height:400px;
    margin:20px;
}
.about-img img{
    width: 100%;
    height: 100%;
    object-fit: contain;
    object-position: center;
}
.about-text{
    width:500px;
    margin: 20px;
}
.about-text h1{
    font-size: 3.5rem;
    line-height: 55px;
    color:#22252e;
    letter-spacing: 1px;
    font-weight: 700;
    margin: 0px;
}
.about-text p{
    font-size: 1rem;
    color:#777474;
}
.about-text span{
    color: #F14D5D;
    text-decoration: underline;
}
.about-login{
    width:120px;
    height:40px;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #f54417;
    color:#fff;
    box-shadow: 5px 10px 30px rgba(219, 74, 6, 0.5);
    text-transform: uppercase;
    transition: 0.3s ease-in-out;
}
.about-login:hover{
    background-color: #F14D5D;
    transition: all ease 0.3s;
}
.section-5-text{
    text-align: center;
    padding-bottom: 40px;
}
.section-5-text h1{
    font-family: Roboto;
font-style: normal;
font-weight: bold;
font-size: 2.5rem;
line-height: 47px;
color: #000000;
}
.section-5-text p{
    font-family: Roboto;
font-style: normal;
font-weight: normal;
font-size: 1rem;
line-height: 21px;
color: #545454;
}
.section-5-text-btn{
    margin-top: 90px;
    margin-bottom: 60px;
}
.section-5-text-btn input{
    width: 30%;
height: 53px;
border: none;
outline: none;
font-size:20px;
background: #F3F3F3;
box-shadow: 5px 10px 30px rgba(219, 74, 6, 0.5);
padding-left: 20px;
}
.section-5-text-btn button{
    background: #fd0000;
    width: 221px;
height: 53px;
margin-left: 15px;
font-family: Roboto;
font-style: normal;
font-weight: normal;
font-size: 18px;
line-height: 21px;
text-align: center;

color: #FFFFFF;
}
footer{
    width:100%;
    text-align: center;
    padding: 0px 5%;
    border-top: 1px solid rgba(231, 9, 9, 0.2);
}
footer a,
footer p{
    color:#000000;
}
nav .menu-btn{
    display: none;
}
@media(max-width:1100px){
    nav{
        justify-content: space-between;
        height: 65px;
    }
    .menu{
        display: none;
        position: absolute;
        top: 65px;
        left: 0px;
        background-color: #fff;
        border-bottom: 4px solid #F14D5D;
        width:100%;
    }
    .menu li{
        width:100%;
    }
    nav .menu li a{
        width:100%;
        height: 40px;
        justify-content: center;
        align-items: center;
        margin:0px;
        padding: 25px;
        border:1px solid rgba(38,38,38,0.03);
    }
    nav .menu-icon{
        cursor: pointer;
        float: right;
        padding: 28px 20px;
        position: relative;
        user-select: none;
    }
    nav .menu-icon .nav-icon{
        background-color: #333333;
        display: block;
        height: 2px;
        position: relative;
        transition: background 0.2s ease-out;
        width:18px;
    }
    nav .menu-icon .nav-icon:before,
    nav .menu-icon .nav-icon:after{
        background: #333333;
        content: '';
        display: block;
        height: 100%;
        position: absolute;
        transition: all ease-out 0.2s;
        width:100%;
    }
    nav .menu-icon .nav-icon:before{
        top: 5px;
    }
    nav .menu-icon .nav-icon:after{
        top:-5px;
    }
    nav .menu-btn:checked ~ .menu-icon .nav-icon{
        background: transparent;
    }
    nav .menu-btn:checked ~ .menu-icon .nav-icon:before{
        transform: rotate(-45deg);
        top: 0;
    }
    nav .menu-btn:checked ~ .menu-icon .nav-icon:after{
        transform: rotate(45deg);
        top: 0;
    }
    nav .menu-btn{
        display: none;
    }
    nav .menu-btn:checked ~ .menu{
        display: block;
    }
    .home-img{
        display: none;
    }
    .home-text{
        width:100%;
        justify-content: center;
        align-items: center;
        display: flex;
        flex-direction: column;
        height: 45vh;
        margin: 0px;
    }
    .home-content{
        text-align: center;
        width:100%;
        margin:0px;
        position: static;
        transform: translate(0px,70px);
        box-shadow: 2px 2px 30px rgba(255, 102, 55, 0.178);
    }
    .home-text h1{
        color:rgb(0, 0, 0);
        padding: 0px 20px;
        font-size: 2.5rem;
    }
    .home-text p{
        color:rgba(32, 32, 32, 0.85);
        margin: 10px 0px 20px 0px;
        width:50%;
    }
    
    .about-img{
        display: none;
    }
    .about-text{
        width:100%;
        justify-content: center;
        align-items: center;
        display: flex;
        flex-direction: column;
        height: 45vh;
        margin: 0px;
    }
    .about-content{
        text-align: center;
        width:100%;
        margin:0px;
        position: static;
        transform: translate(0px,70px);
        box-shadow: 2px 2px 30px rgba(255, 102, 55, 0.178);
    }
    .about-text h1{
        color:rgb(0, 0, 0);
        padding: 0px 20px;
        font-size: 2.5rem;
    }
    .about-text p{
        color:rgba(32, 32, 32, 0.85);
        margin: 10px 0px 20px 0px;
        width:50%;
    }
    
    .arrow{
        height: 70px;
    }
   
   .main{
  
        padding: 75px 0px 0px 0;
        background: url('images/hero-bg.png') no-repeat center center;
        background-size: cover;
        height: 900px;
   }.arrow{
       left: 2%;
       margin-bottom: 15em;
   }.scroll{
       left: 48%;
       bottom: 200px;
   }
}
@media(max-width:720px){
    .home-text p{
        width:70%;
        text-align: center;
    }
    .home-content h1{
        font-size: 1.9rem;
        padding: 10px 10px;
        line-height: 30px;
    }
    .about-text p{
        width:70%;
        text-align: center;
    }
    .about-content h1{
        font-size: 1.9rem;
        padding: 10px 10px;
        line-height: 30px;
    }
    .services{
        margin-top: -120px;
    }
    .services-heading{
        margin:20px;

    }
    .services-heading h2{
        font-size: 1.7rem;
        line-height: 40px;
    }
    .services-heading p{
        width:100%;
    }
    .box{
        width:100%;
        margin: 20px 0px !important;
        padding: 0px 20px;
        flex-grow: 1;
    }
    .box img{
        height: 100px;
        width:100%;
        object-fit: contain;
    }
    .section-5-text{
        margin-top: -250px;
    }
    .section-5-text-btn input{
        width: 80%;
    }
    .section-5-text-btn button{
        margin-top:20px;
    }
    footer p,a{
        font-size: 0.9rem;
        text-align: center;
    }
    footer{
        padding: 0px 10px;
    }
}
</style>
</head>

<body>
    
    <section class="main" style="background-image: url('sport.jpg');background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover; ">
        
        <nav>
            <a href="#" class="logo">
                <img src="logo.png" width="320px" />
            </a>
            <input class="menu-btn" type="checkbox" id="menu-btn"/>
            <label class="menu-icon" for="menu-btn">
                <span class="nav-icon"></span>
            </label>
            <ul class="menu" style="border-radius: 5px;">
                <li><a href="create_category.php" style="width:auto; border-radius: 5px; cursor: pointer; background-color: #F14D5D; color: #fff;">Create Event</a></li>

                 <form action="create_category.php" method="POST">
                    <button type="submit">Add Event</button>
                 </form>
               
              <li><a href="../start.html" class="active" onclick="document.getElementById('id01').style.display='block'" style="width:auto; border-radius: 5px; cursor: pointer; background-color: goldenrod;">Log Out</a></li>
              <li><a href="" class="active" onclick="document.getElementById('id01').style.display='block'" style="width:auto; border-radius: 5px; cursor: pointer; background-color: blue;">Admin Mode</a></li>
            </ul>
        </nav>
    
        <!--main-content-->
        <div class="home-content">
            
            <!--text-->
            <div class="home-text" >
                
                <h3 style="color: white; letter-spacing: 3px;">Heroics</h3>
                <h1 style="color: floralwhite; font-family: sans-serif;"> Sports League System</h1>
                <br>
                <br>
                <p style="color: white;">The Barangay Sports League System is a local-level sports program that aims to foster community participation, promote physical fitness, and develop sports talent among the youth and residents of a barangay (village or district). It is a grassroots-level initiative designed to encourage sports activities across a range of disciplines within communities.</p>
            <!--login-btn-->
            <a href="feature.html" class="main-login" style="border-radius: 5px;">Create New</a>
            </div>
            <!--img-->
            <div class="home-img" style="width: 500px;">
                <img src="balls.jpg" width="500px" style="text-shadow: 20px 22px;"/>
                <marquee width="100%" direction="left" onmouseover="this.stop();"
                onmouseout="this.start();">
                    <a href="#" style="color: white;">kapuyag skwela.</a>
                    </marquee>
                    <marquee width="100%" direction="right" onmouseover="this.stop();"
                onmouseout="this.start();">
                    <a href="#" style="color: white;">padayun lang ta</a>
                    </marquee>
            </div>
            
        </div>
        
        <!--arrow-->
        <div class="arrow"></div>
        <span class="scroll">Scroll</span>
    </section>
    
    <!--services----------------------->
    <section class="services">
        <!--heading----------->
        <div class="services-heading">
            <h2>Sports Available</h2>
           
        </div>
        <!--box-container----------------->
        <div class="box-container">
            <!--box-1-------->
            <div class="box">
                <img src="basket.jpg" style="width:400px;height:500px;">
                <font>Basketball</font>
                 

                    <br>
                <!--btn--------->
                <a href="feature.html">Inquire</a>
            </div>
            <!--box-2-------->
            <div class="box">
                        <img src="volleyball.jpg" style="width:400px;height:500px;">
                <font>Volleyball </font>
             
              <br>
                <!--btn--------->
                <a href="feature.html">Inquire</a>
            </div>
            <!--box-3-------->
            <div class="box">
              <img src="badminton.jpg" style="width:400px;height:500px;">
                <font>Badminton</font>
              
                    <br>
           
                <!--btn--------->
                <a href="feature.html">Inquire</a>
            </div>
            <!--box-4-------->
            <div class="box">
               <img src="tennis.jpg" style="width:400px;height:500px;">
                <font>Tennis</font>
               
                    <br>
           
                <!--btn--------->
                <a href="feature.html">Inquire</a>  
            </div>
            <!--box-1-------->
            
        </div>
    </section>
    <br>
       <br>
          <br>
             <br>
                <br>
                   <br>
                      <br>
                         <br>
                            <br>
                               <br>
                                  <br>
                                     <br>
                                        <br>
                                           <br>
                                              <br>
                                                 <br>
                                                    <br>
                                                       <br>
                                                          <br>
    <!--footer------------->
    <footer>
        <p>Copyright (C) - 2023 | Developed By ZyCodes</a> </p>
    </footer>
    <script>
        // Get the modal
        var modal = document.getElementById('id01');
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        </script>
</body>

</html>
