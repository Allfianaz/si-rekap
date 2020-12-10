<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>

<head>
    <title><?= $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Blue Multiple Forms template Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Custom Theme files -->
    <link href="<?= base_url() ?>/lgn/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- //Custom Theme files -->
    <!-- web font -->
    <link href="//fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">
    <!-- //web font -->
</head>

<body>
    <!-- main -->
    <div class="main">
        <h1>SI-REKAP | LOGIN</h1>
        <div class="main-w3lsrow">
            <!-- login form -->
            <div class="login-form login-form-left">
                <div class="agile-row">
                    <h2>Administrator</h2>
                    <div class="login-agileits-top">
                        <form action="/auth/loginAdministrator" method="post">
                            <p>NIP </p>
                            <input type="text" class="NIP" name="NIP" required="" data-inputmask="'mask': '999-99-99999'" autofocus />
                            <p>Password</p>
                            <input type="password" class="password" name="password" required="" />
                            <input type="submit" value="Sign In">
                        </form>
                    </div>
                </div>
            </div>
            <!-- sign up form -->
            <div class="login-form agileits-right">
                <div class="agile-row">
                    <h2>User</h2>
                    <div class="login-agileits-top">
                        <form action="/auth/loginUser" method="post">
                            <p>NIP </p>
                            <input type="text" class="NIP" name="NIP" required="" data-inputmask="'mask': '999-99-99999'" />
                            <p>Password</p>
                            <input type="password" class="password" name="password" required="" />
                            <input type="submit" value="Sign In">
                        </form>
                    </div>
                </div>
                <div class="clear"> </div>
            </div>
        </div>
        <!-- //main -->
        <?= $this->include('_partials/js.php') ?>
</body>

</html>