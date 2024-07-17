<script>
jQuery(document).ready(function(){
    jQuery("#login_form").submit(function(e){
        e.preventDefault(); // Prevent default form submission

        var formData = jQuery(this).serialize(); // Serialize form data

        // AJAX request
        $.ajax({
            type: "POST",
            url: "login.php", // URL to your login handling script
            data: formData, // Serialized form data
            success: function(response){
                if(response.trim() === 'true') {
                    // Successful login message
                    $.jGrowl("Welcome to CHMSC Learning Management System", { header: 'Access Granted' });
                    var delay = 2000; // 2 seconds delay
                    setTimeout(function(){ window.location = 'dashboard.php' }, delay); // Redirect to dashboard.php
                } else {
                    // Failed login message
                    $.jGrowl("Please check your username and password", { header: 'Login Failed' });
                }
            }
        });
    });
});
</script>
