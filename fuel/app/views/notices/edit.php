<h2>Editing <span class='muted'>Notice</span></h2>
<br>

<?php echo render('notices/_form'); ?>
<p>
	<?php echo Html::anchor('notices/view/'.$notice->id, 'View'); ?> |
	<?php echo Html::anchor('notices', 'Back'); ?></p>
