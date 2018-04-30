<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>AJAX: Sign Up Page</title>

        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <script>
            function validateForm() {
                return false;
            }
        </script>
        <script>
            $(document).ready( function(){
                $("#username").change(function() {
                    //alert($("#username").val());
                    $.ajax({
                        
                        type: "GET",
                        url: "checkUsername.php",
                        dataType: "json",
                        data: { "username": $("#username").val()},
                        success: function(data,status) {
                           
                            if(!data){
                                document.getElementById("uName").style.color = "blue";
                                $("#uName").html(" Username AVAILABLE");
                            } else{
                                document.getElementById("uName").style.color = "red";
                                $("#uName").html(" Username ALREADY TAKEN!");
                            }
                            // $("#county").html("<option>- Select One- </option>");
                            // for(var i =0; i< data.length; i++){
                            //     $("#county").append("<option>" + data[i].county + "</option>");
                            // }
                        },
                        complete: function(data,status) { //optional, used for debugging purposes
                        //alert(status);
                        }
                        
                    });
                    
                })
                $("#repassword").change(function() {
                    if($("#password").val()!=$("#repassword").val()){
                        $("#myPassword").html("PASSWORD DOES NOT MATCH!");
                        error=true;
                    }
                    else{
                        $("#myPassword").html("Passed.");
                        error = false;
                    }
                });
                $("#state").change(function() {
                    $.ajax({
                        
                        type: "GET",
                        url: "http://itcdland.csumb.edu/~milara/ajax/countyList.php",
                        dataType: "json",
                        data: { "state": $("#state").val()},
                        success: function(data,status) {
                            $("#county").html("<option>- Select One- </option>");
                            for(var i =0; i< data.length; i++){
                                $("#county").append("<option>" + data[i].county + "</option>");
                            }
                        },
                        complete: function(data,status) { //optional, used for debugging purposes
                        //alert(status);
                        }
                        
                    });
                })
                $("#zipCode").change( function(){ 
                    $.ajax({

                        type: "GET",
                        url: "http://itcdland.csumb.edu/~milara/ajax/cityInfoByZip.php",
                        dataType: "json",
                        data: { "zip": $("#zipCode").val() },
                        success: function(data,status) {
                             if(data==false){
                                //  alert("NO FOUND");
                                $("#zCode").html(" Invalid Zipcode");
                                error = true;
                            }
                            else {
                               $("#zCode").html(""); 
                               error = false;
                            }
                              $("#city").html(data.city);
                              $("#latitude").html(data.latitude);
                              $("#longitude").html(data.longitude);
                            
                         
                        },
                        complete: function(data,status) { //optional, used for debugging purposes
                        //alert(status);
                        }
                    
                    });
                                
                });
                
            }); //documentReady
           
        
        </script>
    
    </head>

    <body>
    
       <h1> Sign Up Form </h1>
    
        <form onsubmit="return validateForm()">
            <fieldset>
               <legend>Sign Up</legend>
                First Name:  <input type="text"><br> 
                Last Name:   <input type="text"><br> 
                Email:       <input type="text"><br> 
                Phone Number:<input type="text"><br><br>
                Zip Code:    <input type="text" id="zipCode"><span id = "zCode"></span><br>
                City:        <span id="city"></span>
                <br>
                Latitude:    <span id="latitude"></span>
                <br>
                Longitude:   <span id="longitude"></span>
                <br><br>
                State: 
                <select id="state">
                    <option value="">Select One</option>
                    <option value="ca"> California</option>
                    <option value="ny"> New York</option>
                    <option value="tx"> Texas</option>
                    <option value="va"> Virginia</option>
                </select><br />
                
                Select a County: <select id="county"></select><br>
                
                Desired Username: <input type="text" id="username"><span id="uName"></span><br>
                
                Password: <input type="password"><br>
                
                Type Password Again: <input type="repassword"><span id="myPassword"></span><br>
                
                <input type="submit" id = "signUp" value="Sign up!">
            </fieldset>
        </form>
    
    </body>
</html>