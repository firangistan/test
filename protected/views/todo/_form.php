<?php
/* @var $this TodoController */
/* @var $model Todo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'todo-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'todocol'); ?>
		<?php echo $form->textField($model,'todocol',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'todocol'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'deadline'); ?>
		<!--<?php echo $form->textField($model,'deadline'); ?> -->
		<?php 
		/*$this->widget('zii.widgets.jui.CJuiDatePicker',array(
			'name'=>'Todo[deadline]',
			'options'=>array(
				'showAnim'=>'fold',
				'dateFormat' => 'yy-mm-dd',
				),
			'htmlOptions'=>array(
				'style'=>'height:20px;'
				),
			)
		); */

		Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
		$this->widget('CJuiDateTimePicker',array(
			'name' => 'Todo[deadline]',
        	'model'=>$model, //Model object
        	// 'attribute'=>'eventDate', //attribute name
        	'mode'=>'datetime', //use "time","date" or "datetime" (default)
        	'options'=>array(
        		'dateFormat' => 'yy-mm-dd',
        	) // jquery plugin options
        	)
		);
		?>
		<?php echo $form->error($model,'deadline'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'module_id'); ?>
		<?php echo $form->dropDownList($model,'module_id',$model->getModules()); ?>
		<?php echo $form->error($model,'module_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->dropDownList($model,'user_id',$model->getUserOptions()); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->