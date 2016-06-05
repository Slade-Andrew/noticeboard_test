<?php if (Auth::instance()->check()) : ?>
    <p><?php echo Html::anchor('comments/create/'.$notice->id, 'Add new Comment'); ?></p>
<?php endif; ?>
<h2>
	<strong>Title:</strong>
	<?php echo $notice->nb_title; ?></h2>
<p>
	<strong>Message:</strong>
	<?php echo $notice->nb_message; ?></p>
    
<h3>Comments</h3>
<ul>
<?php foreach ($comments as $comment) : ?>
    <li>
        <ul>
      
        <li><strong>Name:</strong> <?php echo $comment['username']; ?></li>
            <li><strong>Comment:</strong><br /><?php echo $comment['comment']; ?></li>
            <?php if ($comment['userid'] == Auth::get('id')) : ?>
                <li><p><?php echo Html::anchor('comments/edit/'.$comment['commentid'], 'Edit'); ?>|
                <?php echo Html::anchor('comments/delete/'.$comment['commentid'], 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?></li>
            <?php endif; ?>
        </ul>
    </li>
<?php endforeach; ?>
</ul>

<?php
	if ($notice->user_id == Auth::get('id'))
	{
		echo Html::anchor('notices/edit/'.$notice->id, 'Edit', array('class' => 'btn btn-primary'));
	}
	echo Html::anchor('notices', 'Back', array('class' => 'btn btn-success'));
?>
