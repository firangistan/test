<?php
/* @var $this StatusStatusController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Status Statuses',
);

$this->menu=array(
	array('label'=>'Create StatusStatus', 'url'=>array('create')),
	array('label'=>'Manage StatusStatus', 'url'=>array('admin')),
);
?>

<h1>Status Statuses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
