<div class="form">
	<?php echo CHtml::form("/statusComment/create/$id", "post"); ?>

	<div class="row">
		<?php echo CHtml::textArea('StatusComment[content]'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::submitbutton('Create'); ?>
	</div>

	<?php echo CHtml::endForm(); ?>
</div>