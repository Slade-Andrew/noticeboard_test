<?php if ($notices): ?>
    <div class="row post_row">
        <?php foreach ($notices as $notice): ?>
            <div class="col-md-2 post">
                <div class="row">
                    <div class='col-md-12'>
                        <h3><?php echo $notice->nb_title; ?></h3>
                    </div>
                </div>
                <div class="row">
                    <div class='col-md-12'>
                        <?php $id = $notice->id; echo Html::anchor('notices/view/'.$id, $notice->nb_message, array('class' => 'fancybox fancybox.iframe', 'id' => 'notice'.$id)); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?php
                            /*echo Html::anchor('notices/view/'.$notice->id, $comment_links[$notice->id], array('class' => 'btn btn-success'));
                            if ($notice->user_id == Auth::get('id'))
                            {
                                echo Html::anchor('notices/edit/'.$notice->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-primary'));
                                echo Html::anchor('notices/delete/'.$notice->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-small btn-danger', 'onclick' => "return confirm('Are you sure?')"));
                            }*/
                        ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
<p>No Notices.</p>

<?php endif; ?>
<?php echo Html::anchor('notices/create'/*.$user->id*/, 'Add new Notice', array('class' => 'fancybox fancybox.iframe btn btn-success')); ?>
<?php
	/*if (Auth::instance()->check())
	{
		echo Html::anchor('notices/create', 'Add new Notice');
	}*/
?>