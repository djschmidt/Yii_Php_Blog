<?php
echo CHtml::image(Yii::app()->baseUrl . '/banner/' . $model->image, 'kassadin');

$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'username',
    ),
));
?>

