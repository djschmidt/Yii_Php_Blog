<?php

$this->pageTitle=Yii::app()->name . ' - Description';
$this->breadcrumbs=array(
	'Description',
         $model->id => Yii::app()->user->id,
);
?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'description-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	

	<div class="row">
		<?php echo $form->labelEx($model,'Description'); ?>
		<?php echo $form->textField($model,'Description'); ?>
		<?php echo $form->error($model,'Description'); ?>
	</div>

	

	

	<div class="row buttons">
		<?php echo CHtml::submitButton('Description'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->