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
    });
})(jQuery);
