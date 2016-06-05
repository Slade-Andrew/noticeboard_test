<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<?php echo Asset::css('bootstrap.css'); ?>
    <?php echo Asset::css('noticeboard.css'); ?>
	<style>
		body { margin: 40px; }
	</style>
</head>
<body>
	<header>
        <nav class="navbar navbar-default" role="navigation">
            <?php //echo Asset::img('nb_header.png'); ?>
           <div id="logo" class="navbar-header">
              <a class="navbar-brand" href="#"><?php //echo Asset::img('nb_logo.png'); ?></a>
           </div>
        </nav>
    </header>
	<div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <h1><?php echo Html::anchor('notices', $title); ?></h1>
            </div>
            <div class="col-md-4">
                
                    <?php
                        if (isset($user_info))
                        {
                            echo $user_info;
                        }
                        else
                        {
                            if (Auth::instance()->check())
                            {
                                $link = array('Welcome back '.Auth::instance()->get_screen_name(), Html::anchor('users/logout', 'Logout'));
                                echo Form::label('Welcome back '.Auth::get('username'));
                                echo Html::anchor('users/logout', 'Logout', array('class' => 'btn btn-success'));
                            }
                            else
                            {
                                $link = array(Html::anchor('users/login', 'Login'), Html::anchor('users/register', 'Register'));
                                echo Html::anchor('users/login', 'Login', array('class' => 'btn btn-success'));
                                echo Html::anchor('users/register', 'Register', array('class' => 'btn btn-primary'));
                            }
                            //echo Html::ul($link);
                        }
                    ?>
        </div>
            <div class="row">
            </div>
                <hr>
            <div class="col-md-12">    
                <?php if (Session::get_flash('success')): ?>
                            <div class="alert alert-success">
                                <strong>Success</strong>
                                <p>
                                <?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
                                </p>
                            </div>
                <?php endif; ?>
                <?php if (Session::get_flash('error')): ?>
                            <div class="alert alert-danger">
                                <strong>Error</strong>
                                <p>
                                <?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
                                </p>
                            </div>
                <?php endif; ?>
            </div>
        </div>
        
                <?php echo $content; ?>
            
		<footer>
			<p class="pull-right">Page rendered in {exec_time}s using {mem_usage}mb of memory.</p>
			<p>
				<a href="http://fuelphp.com">FuelPHP</a> is released under the MIT license.<br>
				<small>Version: <?php echo e(Fuel::VERSION); ?></small>
			</p>
		</footer>
	</div>
</body>
</html>
