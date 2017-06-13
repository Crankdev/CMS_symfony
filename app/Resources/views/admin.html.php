<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="ADMIN">

        <title>Website admin</title>
<style>
    @media  (min-width:900px){
        form{
            width: 50%;
        }
    }

    input[type=text],textarea, select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }


    input[type=submit],input[type=file] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

</style>

		<!--img src="<?php// echo $view['assets']->getUrl('images/logo.png') ?>" /-->
            <!-- Add custom CSS here -->
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="http://ivaynberg.github.io/select2/select2-3.4.5/select2.css" rel="stylesheet">

        <link href="<?php echo $view['assets']->getUrl('style/admin/css/css/my.css') ?>" rel="stylesheet" />

        <link rel="stylesheet" href="<?php echo $view['assets']->getUrl('style/admin/css/bootstrap.css')?>" >
        <link rel="stylesheet" href="<?php echo $view['assets']->getUrl('style/admin/css/sb-admin.css') ?>" >
        <link rel="stylesheet" href="<?php echo $view['assets']->getUrl('style/admin/js/fancybox/jquery.fancybox.css') ?>" >
        <link rel="stylesheet" href="<?php echo $view['assets']->getUrl('style/admin/js/chosen/chosen.css') ?>" >
        <link rel="stylesheet" href="<?php echo $view['assets']->getUrl('style/admin/css/jquery-sortable.css') ?>" >
        <link rel="stylesheet" href="<?php //echo $view['assets']->getUrl('style/css/bootstrap.css') ?>" >
        <link rel="stylesheet" href="<?php //echo $view['assets']->getUrl('style/css/animate.css') ?>" >
        <link rel="stylesheet" href="<?php //echo $view['assets']->getUrl('style/css/font-awesome.css') ?>" >
        <link rel="stylesheet" href="<?php echo $view['assets']->getUrl('style/css/responsive.css') ?>" >
        <link rel="stylesheet" href="<?php //echo $view['assets']->getUrl('style/css/custom.css') ?>" >
            <!-- Google Fonts-->
            <link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300" rel="stylesheet" type="text/css">

            <!-- JS -->
            <script>
                var editor = ace.edit("editor");
                editor.setTheme("ace/theme/monokai");
                editor.getSession().setMode("ace/mode/php");
            </script>
            <script src="http://ivaynberg.github.io/select2/select2-3.4.5/select2.js"></script>
            <script  src="<?php echo $view['assets']->getUrl('style/admin/js/chosen/chosen.jquery.js') ?>" type="text/javascript"></script>
            <script  src="<?php echo $view['assets']->getUrl('style/admin/lib/js/scripts.js') ?>" type="text/javascript"></script>
            <script  src="<?php echo $view['assets']->getUrl('style/admin/js/jquery-1.10.2.js') ?>" type="text/javascript"></script>
            <script  src="<?php echo $view['assets']->getUrl('style/admin/js/jquery-sortable.js') ?>" type="text/javascript"></script>
            <script  src="<?php echo $view['assets']->getUrl('style/admin/js/fancybox/jquery.fancybox.js') ?>" type="text/javascript"></script>
            <script  src="<?php echo $view['assets']->getUrl('style/admin/js/bootstrap.js') ?>" type="text/javascript"></script>
            <script  src="<?php echo $view['assets']->getUrl('style/admin/js/ace/ace.js') ?>" type="text/javascript" charset="utf-8"></script>
            <script  src="<?php echo $view['assets']->getUrl('style/admin/js/tablesorter/jquery.tablesorter.js') ?>" type="text/javascript"  charset="utf-8"></script>
            <script  src="<?php echo $view['assets']->getUrl('style/admin/js/tablesorter/tables.js')  ?>" type="text/javascript" charset="utf-8"></script>
            <script  src="<?php echo $view['assets']->getUrl('style/admin/js/redactor/fontcolor.js') ?>" type="text/javascript" charset="utf-8"></script>
            <script  src="<?php echo $view['assets']->getUrl('style/admin/js/redactor/redactor.js') ?>" type="text/javascript" ></script>
            <!-- End JS -->
        <link rel="icon" type="image/x-icon" href="<?php echo $view['assets']->getUrl('favicon.ico') ?>" />
    </head>
    <body>
		<div id="wrapper">
			<!-- Sidebar -->
			<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="">Siladuha.com.ua CMS</a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<!--menu-->
					<ul class="nav navbar-nav navbar-right navbar-user">
						<li class="dropdown user-dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Site admin <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
								<li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
								<li class="divider"></li>
								<li><a href=""><i class="fa fa-power-off"></i> Log Out</a></li>
							</ul>
						</li>
					</ul>
					<ul class="nav navbar-nav side-nav">
						<li><a href='<?php echo $view['router']->path('admin_index_menu') ?>'>MENU</a></li>
                        <li><a href='<?php echo $view['router']->path('admin_index_listit') ?>'>LISTIT</a></li>
                        <li><a href='<?php echo $view['router']->path('admin_index_project') ?>'>PROJECT</a></li>
                        <li><a href='<?php echo $view['router']->path('admin_index_activity') ?>'>ACTIVITIES</a></li>
                        <li><a href='<?php echo $view['router']->path('admin_index_foto') ?>'>FOTO</a></li>
                        <li><a href='<?php echo $view['router']->path('admin_index_people') ?>'>PEOPLE</a></li>

						<!--li class="dropdown" ><a href="#" class="dropdown-toggle" data-toggle="dropdown">Users 2</a>
							<ul class="dropdown-menu">
								<li class="active"><a >Users 1</a></li>
								<li><a>Users 1</a></li>
								<li><a>Users 1</a></li>
								<li><a>Users 1</a></li>
							</ul>
						</li-->
					</ul>
				</div><!-- /.navbar-collapse -->
			</nav>

			<div id="page-wrapper">
				<!--Pages-->

				<div class="col-lg-12 admin_inside">
					
					<?php $view['slots']->output('body') ?>

					</div>
				</div>
			</div><!-- /#page-wrapper -->
		</div><!-- /#wrapper -->
    </body>
</html>
