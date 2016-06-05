<ul class="nav nav-pills">
	<li class='<?php echo Arr::get($subnav, "edit" ); ?>'><?php echo Html::anchor('comments/edit','Edit');?></li>
	<li class='<?php echo Arr::get($subnav, "create" ); ?>'><?php echo Html::anchor('comments/create','Create');?></li>

</ul>
<h2>Editing Comment</h2>
<br/>
<?php $notice = isset($notice) ? $notice : ''; ?>
<?php echo $form; ?>
<p><?php echo Html::anchor('notices/view/'.$comment->notice_id, 'Back'); ?></p>