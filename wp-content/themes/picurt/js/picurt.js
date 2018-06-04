
//delete user start

 $(document).ready(function() {

 


        $('#cnfrm_del_yes').click(function() {

           var user_delt_nonce = $("#user_del_nonce").val();

          $.ajax({
              type: "POST",
              url: templateDir+"/ajaxlogin.php",
        data: {user_delete_nonce:user_delt_nonce },
              cache: false,
              success: function(data, status){ data = $.trim(data);

 
                 if (data === 'Delete') {
                  

                  window.location.assign(siteUrl);

   }else {

     

   }

              }

          });


         

            return false;

        });

        });



//delete user end


    


 
//reset-password start


    $(document).ready(function() {

 


        $('#resetBtn').click(function() {


          var old_pas = $("#old_sup_pass").val();
          var new_pas = $("#new_sup_pas").val();
          var new_cpas = $("#new_sup_cpas").val();
          var user_pas_nonce = $("#user_pass_nonce").val();

          $.ajax({
              type: "POST",
              url: templateDir+"/ajaxlogin.php",
        data: {old_pass:old_pas, new_pass:new_pas, new_pass_confirm:new_cpas, user_pass_nonce:user_pas_nonce },
              cache: false,
              success: function(data, status){ data = $.trim(data);
                if (data === 'Reset') {
                  
                  window.location.assign(siteUrl);



   }else {


    $(".alert").css("display", "block");
                       $(".alert pre").text("Invalid Details");
                       $(".alert").fadeOut(6000)
     

   }

              }

          });


         

            return false;

        });

        });


//reset-password end


// sign up login start

  $(document).ready(function(){

        $(".signform").click(function(){

          
            $("#id01").css("display", "block");

        return false;
        });


    });



var modal1 = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal1) {
            $("#id01").css("display", "none");

    }
}



    $(document).ready(function() {
    
            $('#signup, #login, .close').click(function() {
          
    $(".reg_suc").css("display", "none");
                      $(".form-holder .input").val("");
                              $(".log_error").css("display", "none");
                              $("#alert").css("display", "none");

          
        });


        $('#loginBtn').click(function() {
          var user_name = $("#user_sin_name").val();
          var user_pas = $("#user_sin_pass").val();
          var user_log_nonce = $("#user_sin_nonce").val();

 
          $.ajax({
              type: "POST",
              url: templateDir+"/ajaxlogin.php",
        data: {user_login: user_name, user_pass:user_pas, pic_login_nonce:user_log_nonce },
              cache: false,
              success: function(data, status){ data = $.trim(data);
 
                if (data === 'Login') {
window.location.assign(siteUrl+'/editprofile');
                      $(".form-holder .input").val("");

                            }else if (data === 'profile') {
window.location.assign(siteUrl+'/profile');
                      $(".form-holder .input").val("");

                            }else {
                
                $(".alert").css("display", "block");
                       $(".alert pre").text("Invalid User Name or Password");
                       }
              }

          });

            return false;

        });


        $('#signupBtn').click(function() {
          var user_name = $("#user_sup_name").val();
          var user_email = $("#user_sup_email").val();
          var user_pas = $("#user_sup_pas").val();
          var user_cpas = $("#user_sup_cpas").val();
          var user_sup_nonce = $("#user_sup_nonce").val();

          $.ajax({
              type: "POST",
              url: templateDir+"/ajaxlogin.php",
        data: {user_login:user_name, user_email:user_email, user_pass:user_pas, user_pass_confirm:user_cpas, pic_register_nonce:user_sup_nonce },
              cache: false,
              success: function(data, status){ data = $.trim(data);
                if (data === 'Signup') {
          $( "#login" ).trigger( "click" );
            $(".form-holder .input").val("");

                  $(".reg_suc").css("display", "block");


   }else {
     
                  $(".alert").css("display", "block");
                       $(".alert pre").text(data);

   }

              }

          });

            return false;

        });


    });

// sign up login end