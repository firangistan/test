<?php
/* @var $this StatusController */
/* @var $data Status */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode(User::model()->findByPk($data->user_id)->name); ?>
	<br />

	<?php echo CHtml::link('Like','#',array('submit'=>array('statusStatus/like','id'=>$data->id)));  ?>

	<?php echo $this->renderPartial('/statusComment/_form', array('model' => new StatusComment, 'id' => $data->id)); ?>

	<?php 
	$criteria = new CDbCriteria;
	$criteria->select = 'id, content, user_id';
	$criteria->condition = 'status_id=:statusid';
	$criteria->params=array(':statusid'=>$data->id);
	$comments = StatusComment::model()->findAll($criteria);
	if($comments !== null) {
		foreach ($comments as $show) {
			?>
			<div class="row">
				<?php echo "Comment ".CHtml::encode($show['content']); ?>
				<?php echo "By ".CHtml::encode(User::model()->findByPk($show['user_id'])->name); ?>
			</div>
			<?php
		}
	}
	?>
	
</div>