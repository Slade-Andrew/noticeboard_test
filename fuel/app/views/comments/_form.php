<?php echo Form::open(array("class"=>"form-horizontal")); ?>
    <fieldset>
        <?php /*?><div class="form-group">
            <?php echo Form::label('Name', 'name', array('class'=>'control-label')); ?>
            <?php echo Auth::instance()->get_screen_name(); ?>
        </div><?php */?>
        <div class="form-group">
            <?php echo Form::label('Comment', 'comment', array('class'=>'control-label')); ?>
            <?php echo Form::textarea('comment', Input::post('comment', isset($comment) ? $comment->comment : ''), array('cols' => 60, 'rows' => 8)); ?>
        </div>
        <div class="actions">
            <?php echo Form::hidden('notice_id', Input::post('notice_id', isset($notice) ? $notice : '')); ?>
            <?php echo Form::hidden('user_id', Input::post('user_id', isset($user) ? $user : '')); ?>
            <?php echo Form::submit('submit', 'Submit', array('class' => 'btn btn-primary')); ?>
        </div>
    </fieldset>
<?php echo Form::close(); ?>