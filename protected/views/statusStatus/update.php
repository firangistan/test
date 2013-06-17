<?php
/* @var $this StatusStatusController */
/* @var $model StatusStatus */

$this->breadcrumbs=array(
	'Status Statuses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List StatusStatus', 'url'=>array('index')),
	array('label'=>'Create StatusStatus', 'url'=>array('create')),
	array('label'=>'View StatusStatus', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage StatusStatus', 'url'=>array('admin')),
);
?>

<h1>Update StatusStatus <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>