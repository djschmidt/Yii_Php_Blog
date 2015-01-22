<?php

$this->pageTitle=Yii::app()->name . ' - Search results';
$this->breadcrumbs=array(
    'Search Results',
);
?>

<h3>
    Search Results for: "<?php echo CHtml::encode($term); ?>" 
</h3>

<?php if(!empty($results)): ?>
        <?php foreach($results as $result):
 ?>
            <p>Title: <?php echo $query->highlightMatches(CHtml::encode($result->title));?> </p>
        
            <P>Link: <?php echo CHtml::link($query->highlightMatches(CHtml::encode($result->link)), CHtml::encode($result->link)); ?></p>
            <p>Content: <?php echo $query->highlightMatches(CHtml::encode($result->content)); ?></p>
            
            <hr/>
                <?php endforeach; ?>
                
          <?php else: ?>
            <p class ="error">No results matched your search terms.</p>
          <?php endif; ?>



    
