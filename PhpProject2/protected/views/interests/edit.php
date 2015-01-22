
<?php
/* @var $this InterestsController */
/* @var $model Interests */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'interests-edit-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // See class documentation of CActiveForm for details on this,
    // you need to use the performAjaxValidation()-method described there.
    'enableAjaxValidation'=>false,
)); ?>
    
    
    <p class="note">Please Edit Your About Information below</p>
   

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'description'); ?>
        <?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
        <?php echo $form->error($model,'description'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'likes'); ?>
        <?php echo $form->textArea($model,'likes',array('rows'=>6, 'cols'=>50)); ?>
        <?php echo $form->error($model,'likes'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'hobbies'); ?>
        <?php echo $form->textArea($model,'hobbies',array('rows'=>6, 'cols'=>50)); ?>
        <?php echo $form->error($model,'hobbies'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'work'); ?>
        <?php echo $form->textArea($model,'work',array('rows'=>6, 'cols'=>50)); ?>
        <?php echo $form->error($model,'work'); ?>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton('Submit'); 
        
        echo $model->work;
        
        ?>
    </div>

<?php $this->endWidget(); ?>
    
    
 

</div><!-- form -->

