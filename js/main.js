;(function ($) {
    $(document).ready(function () {
        // User Registration
        $("#regsubmit").on("click", function () {
            var name = $("#name").val();
            var username = $("#username").val();
            var password = $("#password").val();
            var email = $("#email").val();
            var datastring = 'name=' + name + '&username=' + username + '&password=' + password + '&email=' + email;

            $.ajax({
                type: "POST",
                url: "getregister.php",
                data: datastring,
                success: function(response){
                    $("#state").html(response);
                }
            })
            return false;
        })

        // User Login 
        $("#loginsubmit").on("click", function(){
            var email = $("#email").val();
            var password = $("#password").val();
            var datastring = 'email=' + email +'&password='+ password;

            $.ajax({
                type: "POST",
                url: "getlogin.php",
                data: datastring,
                success: function(response){
                    if ($.trim(response) == "redirect"){
                        window.location = "exam.php";
                    }else{
                        $("#state").html(response);
                    }
                }
            })
            return false;
        })
    });
})(jQuery);
