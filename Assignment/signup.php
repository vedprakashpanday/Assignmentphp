
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

   <form id="signForm" >

        
        <label for="name">Name :</label>
        <input type="text" name="sname" id="name" placeholder="Enter Your Name Here">
       <div id="msg-box" class="msg-box">  </div>

        <label for="email">Email :</label>
        <input type="email" name="semail" id="email" placeholder="Enter Your Email Here">
        <div id="msg-box1" class="msg-box" ></div>

        <label for="pswd">Password :</label>
        <input type="password" name="spass" id="pass" placeholder="Enter Your Password Here">
        <div id="msg-box2" class="msg-box" ></div>

        <label for="cpswd">Confirm Password:</label>
        <input type="password" name="spass" id="cpass" placeholder="Confirm Your Password Here">
       <div id="msg-box3" class="msg-box" ></div>

        <input type="submit" value="submit" id="submit">
        <input type="reset" value="Reset" id="reset">
        
        <p>Already An User? <span><a href="login.php">Login</a></span></p>


   

</form>

<script src="script.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script>

$(document).ready(function () {
   


    $("#submit").on("click",function(e)
        {
           
            e.preventDefault();

            $("#msg-box").text("");
        $("#msg-box1").text("");
        $("#msg-box2").text("");
        $("#msg-box3").text("");


             var name=$("#name").val();
             var email=$("#email").val();
             var pass=$("#pass").val();
             var cpass=$("#cpass").val();

                $.ajax({
                    url : "sdetail.php",
                    type : "POST",
                    data : { Uname:name , Uemail:email , Upass:pass , Ucpass:cpass },
                    success : function(data){

                         try {
                    // Parse the response
                    var result = JSON.parse(data);

                    if (result.success) {
                        // Successful signup
                        $("#msg-box").text("Signup SuccessFull").css({"color":"green"}).show();
                       window.location.href= "login.php";
                        
                    } 
                
                               
                                else

                                {
                                    
                                    if (result.name) 
                                    {                                       
                                    console.log(result.name);
                                        
                            $("#msg-box").text(result.name).css({"color":"red"}).show();
                              
                            
                           
                                    }

                      if (result.email) 
                      {
                        console.log(result.email);
                            $("#msg-box1").text(result.email).css({"color":"red"}).show();
                             
                            
                           
                        }
                        if (result.pass)
                         {
                            console.log(result.pass);
                            $("#msg-box2").text(result.pass).css({"color":"red"}).show();
                               
                           
                        }
                        if (result.cpass) 
                        {
                            console.log(result.cpass);
                            $("#msg-box3").text(result.cpass).css({"color":"red"}).show();
                            
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