<!DOCTYPE html>
<html class="no-js">
<head>
    <title>CHMSC LMS</title>
    <meta name="description" content="Learning Management System">
    <meta name="keywords" content="CHMSC LMS,CHMSCLMS,CHMSC,LMS,CHMSCLMS.COMXA">
    <meta name="author" content="JOHN KEVIN LORAYNA">
    <meta charset="UTF-8">
    <!-- Bootstrap and other CSS links -->
    <link href="admin/images/favicon.ico" rel="icon" type="image">
    <link href="admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="admin/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="admin/bootstrap/css/font-awesome.css" rel="stylesheet" media="screen">
    <link href="admin/bootstrap/css/my_style.css" rel="stylesheet" media="screen">
    <link href="admin/vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
    <link href="admin/assets/styles.css" rel="stylesheet" media="screen">
    <!-- calendar css -->
    <link href="admin/vendors/fullcalendar/fullcalendar.css" rel="stylesheet" media="screen">
    <!-- index css -->
    <link href="admin/bootstrap/css/index.css" rel="stylesheet" media="screen">
    <!-- data table css -->
    <link href="admin/assets/DT_bootstrap.css" rel="stylesheet" media="screen">
    <!-- notification -->
    <link href="admin/vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" media="screen">
    <!-- wysiwug -->
    <link rel="stylesheet" type="text/css" href="admin/vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css">
    <!-- Latest jQuery from CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- jGrowl for notifications -->
    <script src="admin/vendors/jGrowl/jquery.jgrowl.js"></script>
</head>

<body>
    <form id="login_form" class="form-signin" method="post">
        <h3 class="form-signin-heading"><i class="icon-lock"></i> Sign in</h3>
        <input type="text" class="input-block-level" id="username" name="username" placeholder="Username" required>
        <input type="password" class="input-block-level" id="password" name="password" placeholder="Password" required>
        <button data-placement="right" title="Click Here to Sign In" id="signin" name="login" class="btn btn-info" type="submit">
            <i class="icon-signin icon-large"></i> Sign in
        </button>
    </form>

    <script>
        $(document).ready(function(){
            // Initialize tooltips with delay
            $('#signin').tooltip({ delay: { show: 500, hide: 0 } });

            // Handle form submission with AJAX
            $("#login_form").submit(function(e){
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "login.php",
                    data: formData,
                    success: function(html){
                        if(html == 'true') {
                            $.jGrowl("Loading File Please Wait...", { sticky: true });
                            $.jGrowl("Welcome to CHMSC Learning Management System", { header: 'Access Granted' });
                            setTimeout(function(){ window.location = 'dashboard_teacher.php'; }, 1000);
                        } else if (html == 'true_student') {
                            $.jGrowl("Welcome to CHMSC Learning Management System", { header: 'Access Granted' });
                            setTimeout(function(){ window.location = 'student_notification.php'; }, 1000);
                        } else {
                            $.jGrowl("Please Check your username and Password", { header: 'Login Failed' });
                        }
                    }
                });
                return false;
            });
        });
    </script>

    <div id="button_form" class="form-signin">
        New to CHMSC OLMS
        <hr>
        <h3 class="form-signin-heading"><i class="icon-edit"></i> Sign up</h3>
        <button data-placement="top" title="Sign In as Student" id="btn_student" onclick="window.location='signup_student.php'" class="btn btn-info" type="button">I'm a Student</button>
        <div class="pull-right">
            <button data-placement="top" title="Sign In as Teacher" id="btn_teacher" onclick="window.location='signup_teacher.php'" class="btn btn-info" type="button">I'm a Teacher</button>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            // Initialize tooltips for signup buttons
            $('#btn_student').tooltip({ delay: { show: 500, hide: 0 } });
            $('#btn_teacher').tooltip({ delay: { show: 500, hide: 0 } });
        });
    </script>
</body>
</html>
