$(document).ready(function(){
$("#name").empty();
$("#email").empty();
$("#contact").empty();
$("#address").empty();
$("#password").empty();
$("#signup").on('submit',(function(e) {
e.preventDefault();
$("#invalid").empty();
if($("#name").val()=="")
{
    $("#msg_name").show();
            
    $("#msg_name").html("Please Enter the name");
}
else if($("#email").val()=="")
{
    $("#msg_email").show();
            
    $("#msg_email").html("Please Enter the email");

}
else if($("#address").val()=="")
{
    $("#msg_add").show();
    $("#msg_add").html("Please Enter the Address");
}
else if($("#password").val()=="")
{
    $("#msg_pass").show();
    $("#msg_pass").html("Password should not be empty");
}
else if($("#password").val().length<6)
{
    $("#msg_pass").show();
    $("#msg_pass").html("Password should atlest of 6 digit");
}
else
    {
        var pattern = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/ ;
        var mobile_patt = /^[789]\d{9}$/;
        if(!pattern.test($("#email").val()))
        {
            $("#msg_email").show();
            
            $("#msg_email").html("Incorrect email formate");    
        }
        else if(!mobile_patt.test($("#contact").val()))
        {
            $("#msg_mob").show();
            $("#msg_mob").html("Mobile Number should start with 7,8 or 9");
        }
        else
        {
            $.ajax({
            url: "signup_script.php",  
            type: "POST",       
            data: new FormData(this),
            contentType: false,      
            cache: false,            
            processData:false,
             success:function(data)
             {
                 $("#invalid").html(data);  
             },
             error: function(jqXHR, exception) //In case of error
                            {
                                    alert("Error requesting " + jqXHR.status +exception);

                            } 
            });     

        }
    }
    }));
    $("#login").on('submit',(function(e) {
         $.ajax({
            url: "login_submit.php",  
            type: "POST",       
            data: new FormData(this),
            contentType: false,      
            cache: false,            
            processData:false,
             success:function(data)
             {
                 
                 if(data=="")
                 {
                     window.location.href = "products.php";
                 }
                 $("#invalid2").html(data);  
             },
             error: function(jqXHR, exception) //In case of error
                            {
                                    alert("Error requesting " + jqXHR.status +exception);

                            } 
            });     

    }));
});
$(function(){
    $("#contact").focus(function(){
       $("#msg_mob").hide(); 
    });
    $("#name").focus(function(){
       $("#msg_name").hide(); 
    });
    $("#email").focus(function(){
       $("#msg_email").hide(); 
    });
    $("#address").focus(function(){
       $("#msg_add").hide(); 
    });
    $("#password").focus(function(){
       $("#msg_pass").hide(); 
    }); 
});
