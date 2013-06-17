<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Users',
);

$this->menu=array(
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Manage User', 'url'=>array('admin')),
	array('label' => 'View Modules', 'url' => array('module/')),
	array('label' => 'View TODO', 'url' => array('todo/')),
);
?>

<h1>Hello <?php echo ucfirst(CHtml::encode($user['name'])); ?></h1>
Amount spent : <?php echo $this->renderPartial('_money', array('money'=>$user->moneys)); ?>

<div class="row">
	<?php if($days > 0) echo "You have ".$days." left"; ?>
</div>

<?php echo $this->renderPartial('/status/_form', array('model'=>$status)); ?>

<?php if(Yii::app()->user->hasFlash('statusSubmitted')): ?>
	<div class="flash-message">
		<?php echo Yii::app()->user->getFlash('statusSubmitted'); ?>
	</div>
<?php endif; ?>

<?php /*echo $this->renderPartial('_status', array('status'=>$user->statuses));*/ ?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider2,
	'itemView'=>'/status/_view',
)); ?>