<h2>New <span class='muted'>Notice</span></h2>
<br>

<?php //echo render('notices/_form'); ?>


<p><?php //echo Html::anchor('notices', 'Back'); ?></p>

<?php //$user = isset($user) ? $user : ''; ?>
<!--<h2 class="first">New Notice</h2>-->
<?php //echo $form; ?>

<?php
	if (Auth::instance()->check())
	{
		echo $form;
	}
	else
	{
		echo 'User not logged in!';
		//Session::set_flash('error', 'User not logged in!');
		//Response::redirect('user/login');
	}
?>
<p><?php //echo Html::anchor('notices', 'Back'); ?></p>
<p><?php //echo Html::anchor('notices/view/'.$notice, 'Back'); ?></p>
