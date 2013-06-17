<?php
/* @var $this StatusStatusController */
/* @var $model StatusStatus */

$this->breadcrumbs=array(
	'Status Statuses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List StatusStatus', 'url'=>array('index')),
	array('label'=>'Manage StatusStatus', 'url'=>array('admin')),
);
?>

<h1>Create StatusStatus</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>