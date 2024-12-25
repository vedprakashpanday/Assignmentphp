

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <form id="signForm" >

       <label for="email">Email :</label>
        <input type="email" name="semail" id="email" placeholder="Enter Your Email Here">
        <div id="msg-box4" class="msg-box" ></div>

        <label for="pswd">Password :</label>
        <input type="password" name="spass" id="pass" placeholder="Enter Your Password Here">
        <div id="msg-box5" class="msg-box" ></div>
       

        <input type="submit" value="submit" id="submit">
        <input type="reset" value="Reset" id="reset">
        
        
        
        <p>Not Register? <span><a href="signup.php">SignUp</a></span></p>


  

</form>

<script src="script.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script>
   
$(document).ready(function () {
   


   $("#submit").on("click",function(e)
       {
          
           e.preventDefault();

           
            var email=$("#email").val();
            var pass=$("#pass").val();
           

               $.ajax({
                   url : "slogin.php",
                   type : "POST",
                   data : { Uemail:email , Upass:pass },
                   success : function(data){
                    try {
                    // Parse the response
                    var result = JSON.parse(data);

                    if (result.success) {
                        // Successful signup
                        $("#msg-box4").text("Login SuccessFull").css({"color":"green"}).show();
                       window.location.href= "Home.php";
                        
                    }  else

{
    if (result.email) 
                      {
                        console.log(result.email);
                            $("#msg-box4").text(result.email).css({"color":"red"}).show();
                             
                            
                           
                        }
                        if (result.pass)
                         {
                            console.log(result.pass);
                            $("#msg-box5").text(result.pass).css({"color":"red"}).show();
                               
                           
                        }
                    }
                }
                catch (e) {
                    console.error("Error parsing response:",data);
                }
                   },
               });
            
           });
});
</script>
</body>
</html>