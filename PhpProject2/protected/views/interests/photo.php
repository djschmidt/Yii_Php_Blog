<?php
$this->breadcrumbs = array(
    'Interests' => array('index'),
    $model->id,
);
?>



<div class="form">

    <p> <h1> Photos </h1> <br>

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'Interests',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
        'htmlOptions' => array(
            'enctype' => 'multipart/form-data',
        ),
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <?php echo $form->errorSummary($model); ?>



    <div class="row">
        <?php echo $form->labelEx($model, 'image'); ?>
        <?php echo CHtml::activeFileField($model, 'image'); ?>  
        <?php echo $form->error($model, 'image'); ?>
    </div>

    <?php if ($model->isNewRecord != '1')  ?>

    <div class="row">
        <?php
        echo CHtml::image(Yii::app()->request->baseUrl.'/banner/'.$model->image, "image", array("width" => 200));

        echo CHtml::image(Yii::app()->baseUrl.'/banner/'.$model->image, 'kassadin');
        ?>  



    </div>

    <div class="row buttons">

        <?php echo CHtml::submitButton($model->isNewRecord ? 'Photo' : 'Save');
        ?>



    </div>
    <p> <h1> Videos  </h1> <br> 

    <p> <h2>Please enter the video url or video code below </h2>


    <form action ="proteted/views/interests/photo.php"  method="post">
        
        Code/Url: <input type="text" name="code"><br>
        <input type="submit">
        
    </form>


    <?php 
    
        
    
    $code = 'H2c6HR0DzUQ';
    
    //'5sdtFJvDsuE'
    
    $this->widget('ext.Yiitube', array('v' => $code , 'hd' => 'true'));
    
    
    ?>

    <?php $this->endWidget(); ?>

</div>


