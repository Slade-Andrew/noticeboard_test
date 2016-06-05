<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
    <?php echo Asset::js(array('http://code.jquery.com/jquery-latest.js','jquery.mousewheel-3.0.6.pack.js', 'jquery.fancybox.pack.js', 'jquery.fancybox-buttons.js', 'jquery.fancybox-media.js', 'jquery.fancybox-thumbs.js')); ?>
	<?php echo Asset::css(array('bootstrap.css', 'noticeboard.css', 'jquery.fancybox.css', 'jquery.fancybox-buttons.css', 'jquery.fancybox-thumbs.css')); ?>
</head>
<body>
	
	<div class="container-fluid">
        <div class="row">
            <header class="col-md-12">
                <div class="row">
                    <div id="h_top_split" class="col-md-12">
                        <div id="logo" class="col-md-8">
                        	<?php echo Html::anchor('notices', Asset::img('nb_logo.png')); ?>
                        </div>
                        <div class="col-md-9">
                            
                                <?php
                                    if (isset($user_info))
                                    {
                                        echo '<div class="col-md-1">'.$user_info.'</div>';
                                    }
                                    else
                                    {
                                        if (Auth::instance()->check())
                                        {
                                            $link = array('Welcome back '.Auth::instance()->get_screen_name(), Html::anchor('users/logout', 'Logout'));
                                            echo '<div class="col-md-1 login_btns">'.Html::anchor('users/logout', 'Logout', array('class' => 'btn btn-danger')).'</div>';
											echo '<div class="col-md-2 login_btns login">'.Form::label('Welcome back '.Auth::get('username')).'</div>';
                                        }
                                        else
                                        {
                                            //$link = array(Html::anchor('users/login', 'Login'), Html::anchor('users/register', 'Register'));
                                            echo '<div class="col-md-1 login_btns">'.Html::anchor('users/login', 'Login', array('class' => 'btn btn-danger')).'</div>';
                                            echo '<div class="col-md-1 login_btns">'.Html::anchor('users/register', 'Register', array('class' => 'btn btn-primary')).'</div>';
                                        }
                                        //echo Html::ul($link);
                                    }
                                ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div id="h_bottom_split" class="col-md-12">
                    	<div class="col-md-10">
                        </div>
                        <div class="col-md-2">
                            
                                <?php /*
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
                                            echo Html::anchor('users/logout', 'Logout', array('class' => 'btn btn-danger'));
                                        }
                                        else
                                        {
                                            $link = array(Html::anchor('users/login', 'Login'), Html::anchor('users/register', 'Register'));
                                            echo Html::anchor('users/login', 'Login', array('class' => 'btn btn-danger'));
                                            echo Html::anchor('users/register', 'Register', array('class' => 'btn btn-primary'));
                                        }
                                        //echo Html::ul($link);
                                    }*/
                                ?>
                        </div>
                    </div>
                </div>
            </header>
        </div>
        <div class="row">
            
        </div>
            <div class="row">
            </div>
            <div class="col-md-12">    
                <?php /*if (Session::get_flash('success')): ?>
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
                <?php endif; */?>
            </div>
        </div>
        <div id="content">
        	<?php echo $content; ?>
        </div>    
		<footer>
			Noticeboard&copy;
		</footer>
	</div>
    <script type="text/javascript">
		$(document).ready(function() {
			$(".fancybox").fancybox();
			
			/* This is basic - uses default settings */
	
			$("a#single_image").fancybox();
			
			/* Using custom settings */
			
			$("a#inline").fancybox({
				'hideOnContentClick': true
			});
		});
	</script>
</body>
</html>
