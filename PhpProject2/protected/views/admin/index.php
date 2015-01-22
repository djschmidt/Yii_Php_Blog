

<script>
    
    /*
    $(document).ready(function(){
        $('#menu').accordion({collapsible: true, active: false});
    });
    */
    
    
 
</script>
<div id ="menus">
    <h1>Users</h1>
    <div>   
        <p>
            <?php
            $this->widget('zii.widgets.CListView', array(
                'dataProvider' => $dataProvider,
                'itemView' => '_view',
            )); 
            ?>
        </p>
    </div>
</div>


<?php
/* @var $this AdminController */
/* @var $dataProvider CActiveDataProvider */


$this->breadcrumbs=array(
    'Users',
);

$this->menu=array(
    array('label'=>'Create User', 'url'=>array('create')),
    array('label'=>'Manage User', 'url'=>array('admin')),
);
 
?>  