<ul class="nav nav-pills">
	<li class='<?php echo Arr::get($subnav, "edit" ); ?>'><?php echo Html::anchor('comments/edit','Edit');?></li>
	<li class='<?php echo Arr::get($subnav, "create" ); ?>'><?php echo Html::anchor('comments/create','Create');?></li>

</ul>
<p>Create</p>
<?php $notice = isset($notice) ? $notice : ''; ?>
<h2 class="first">New Comment</h2>
<?php echo $form; ?>
<p><?php echo Html::anchor('notices/view/'.$notice, 'Back'); ?></p>