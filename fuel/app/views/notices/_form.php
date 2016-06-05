<?php echo Form::open(array("class"=>"form-horizontal")); ?>
	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Title', 'nb_title', array('class'=>'control-label')); ?>
			<?php echo Form::input('nb_title', Input::post('nb_title', isset($notice) ? $notice->nb_title : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Title')); ?>
		</div>
		<div class="form-group">
			<?php echo Form::label('Message', 'nb_message', array('class'=>'control-label')); ?>
			<?php echo Form::textarea('nb_message', Input::post('nb_message', isset($notice) ? $notice->nb_message : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Message')); ?>
		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-success')); ?>
            <?php echo Html::anchor('notices', 'Back', array('class' => 'btn btn-primary')); ?>
        </div>
	</fieldset>
<?php echo Form::close(); ?>