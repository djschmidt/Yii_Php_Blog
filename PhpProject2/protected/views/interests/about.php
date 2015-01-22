

<?php
/*
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'description',
        'hobbies',
    ),
));

*/  



$this->breadcrumbs=array(
    'EditForm',
    'Interests'=>array('index'),
);


?>



<div class="slider">

    <div class="slide active-slide">
        <div class="container">
            <div class="row">
                <div class="slide-copy col-xs-5">
                    <h1>Description</h1><br>

                    <p> <?php echo $this->Descript ?> </p>

                </div>

            </div>
        </div>      
    </div>  

    <div class="slide slide-feature">
        <div class="container">
            <div class="row">
                <div class="slide-copy col-xs-5">
                    <h1>Likes/Entertainment</h1><br>

                    <p><?php echo $this->Likes; ?></p>
                </div>

            </div>
        </div>      
    </div> 

    <div class="slide">
        <div class="container">
            <div class="row">
                <div class="slide-copy col-xs-5">
                    <h1>Hobbies</h1><br>

                    <p> <?php echo $model->hobbies; ?></p>
                </div>
            </div>
        </div>      
    </div> 


    <div class="slide">
        <div class="container">
            <div class="row">
                <div class="slide-copy col-xs-5">
                    <h1>Work and Education</h1><br>
                    <p> <?php echo $this->Work; ?> </p>


                </div>
            </div>
        </div>      
    </div> 
</div>




<?php
echo Yii::app()->user->getDescription();


$this->menu = array(
    array('label' => 'Edit Description', 'url' => array('description')),
);
?>

<div class ="slider-nav">
    <a href ="#" class="arrow-prev"><img src="http://s3.amazonaws.com/codecademy-content/courses/ltp2/img/flipboard/arrow-prev.png"</a>
    <ul class="slider-dots">
        <li class="dot active-dot">&nbsp &bull;</li>
        <li class ="dot">&bull;</li>
        <li class="dot">&bull;</li>
        <li class="dot">&bull;</li>
    </ul>
    <a href="#" class="arrow-next"><img src="http://s3.amazonaws.com/codecademy-content/courses/ltp2/img/flipboard/arrow-next.png"></a>
</div>


<script>

    var main = function() {

        $('.arrow-next').click(function() {


            var currentSlide = $('.active-slide');
            var nextSlide = currentSlide.next();
            var currentDot = $('.active-dot');
            var nextDot = currentDot.next();

            if (nextSlide.length === 0)
            {
                nextSlide = $('.slide').first();
                nextDot = $('.dot').first();
            }

            currentSlide.fadeOut(600);
            currentSlide.removeClass('active-slide');
            nextSlide.fadeIn(600);
            nextSlide.addClass('active-slide');
            currentDot.removeClass('active-dot');
            nextDot.addClass('active-dot');

        });

        $('.arrow-prev').click(function() {

            var currentSlide = $('.active-slide');
            var prevSlide = currentSlide.prev();
            var currentDot = $('.active-dot');
            var prevDot = currentDot.prev();

            if (prevSlide.length === 0)
            {
                prevSlide = $('.slide').last();
                prevDot = $('.dot').last();

            }

            currentSlide.fadeOut(600);
            currentSlide.removeClass('active-slide');
            prevSlide.fadeIn(600);
            prevSlide.addClass('active-slide');
            currentDot.removeClass('active-dot');
            prevDot.addClass('active-dot');



        });
    };

    $(document).ready(main);





</script>

<?php

echo CHtml::button('Edit', array('submit' => array('interests/edit')));

?>



