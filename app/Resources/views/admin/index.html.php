<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $view['assets']->getUrl('style/admin/css/bootstrap.min.css')?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo $view['assets']->getUrl('style/admin/css/signin.css')?>" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="container login_container">

    <form class="form-signin" role="form" onsubmit="return login()">
        <h2 class="form-signin-heading">Sign to CMS</h2>
        <input type="text" name="email" class="form-control" placeholder="Login" required autofocus>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <label class="checkbox">
            <input type="checkbox" name="remember" value="1"> Remember me
        </label>
        <input type="hidden" name="submit" value="1">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>

</div> <!-- /container -->
<script src="<?php echo $view['assets']->getUrl('style/admin/js/jquery-1.10.2.js')?>"></script>
<script src="code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script type="text/javascript">
    function login(){

        $.ajax({
            type: "POST",
            data: $('form').serialize(),
            success: function(data){
                if (data == 'ok'){
                    window.location.replace("<?=Config::SITE_ROOT.'admin'?>");
                }else{
                    $('.login_container').effect( "shake", {'times' : 4} );
                    $('.form-signin-heading').attr( "style", 'color:red' ).html(data);
                    $('form input[name="email"]').focus();
                }
            }
        });

        return false
    }
</script>
</body>
</html>
