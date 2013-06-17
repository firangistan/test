<!--  This is a partial -->

<?php foreach ($status as $statuses): ?>
	<div class="author">
		<p>Created by :<?php echo CHtml::encode($statuses->user->name); ?></p>
	</div>
	<?php echo CHtml::link('Delete','#',array('submit'=>array('status/delete','id'=>$statuses->id),'confirm'=>'Are you sure?'));  ?>

	<div class="content">
		<p><?php echo CHtml::encode($statuses->status); ?></p>
	</div>

	<?php endforeach; ?>