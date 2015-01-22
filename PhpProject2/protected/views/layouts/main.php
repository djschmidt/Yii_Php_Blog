<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en   ">-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />

    <!-- blueprint CSS framework -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
    <!--[if lt IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

    <t src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


</head> 

<body>


    <div class="container" id="page">

        <div id="header">

            <div id="logo" style ="color: black;font-size:larger"><?php echo CHtml::encode(Yii::app()->name); ?></div>
        </div><!-- header -->



        <div id="mainmenu">

            <?php
            Yii::app()->clientScript->registerCoreScript('jquery.ui');

            Yii::app()->clientScript->registerCssFile(
                    Yii::app()->clientScript->getCoreScriptUrl() .
                    '/jui/css/base/jquery-ui.css'
            );
            ?>
            
            
           


            <?php
            $this->widget('zii.widgets.CMenu', array(
                'items' => array(
                    array('label' => 'Home', 'url' => array('post/index')),
                    array('label' => 'Users', 'url' => array('admin/index'), 'visible' => !Yii::app()->user->isGuest && Yii::app()->user->name == 'admin'),
                    array('label' => 'About', 'url' => array('interests/about'),'visible' => !Yii::app()->user->isGuest),
                    array('label' => 'Contact', 'url' => array('site/contact')),
                    array('label' => 'Login', 'url' => array('site/login'), 'visible' => Yii::app()->user->isGuest),
                    array('label' => 'Register', 'url' => array('/site/register', 'view' => 'register'), 'visible' => Yii::app()->user->isGuest),
                    array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('site/logout'), 'visible' => !Yii::app()->user->isGuest),
                    //array('label' => 'Photos/Videos' , 'url' => array('interests/photo'),'visible' => !Yii::app()->user->isGuest ),

                ),
             
            ));
            ?>


        </div><!-- mainmenu -->




        <?php
        $this->widget('application.extensions.SocialShareButton.SocialShareButton', array(
            'style' => 'horizontal',
            'networks' => array('facebook', 'googleplus', 'linkedin', 'twitter'),
            'data_via' => '', //twitter username (for twitter only, if exists else leave empty)
        ));
        ?>




        <div id="comments" style ="color:black;font-size:medium">


            <?php if (!Yii::app()->user->isGuest) $this->widget('UserMenu'); ?> 
            <div>
                  
                <p>
                    <?php
                    $this->widget('TagCloud', array(
                        'maxTags' => Yii::app()->params['tagCloudCount'],
                    ));
                    ?>
                </p>
            </div>
           
            <?php
            
            $this->widget('RecentComments', array(
                'maxComments' => Yii::app()->params['recentCommentCount'],
            ));
              
            ?>



            <?php if (!Yii::app()->user->isGuest && 'view' == 'main') $this->widget('UserMenu'); ?>

            <?php
            $this->widget('SearchBlock', array());
            ?>



        </div>     


        <button id="hide">Toggle</button>





        <script>

            function clear_div()
            {

                document.getElementById("mainDiv").innnerHTML = '';
            }
            function create_radio_button() {

                var inputRadio = "<input name='rad' type='radio' value='red' onclick = 'text_color()'>red<br>";
                inputRadio += "<input name='rad' type='radio' value ='blue' onclick ='text_color()'>blue<br>";
                inputRadio += "<input name='rad' type='radio' value ='green' onclick = 'text_color()'>green<br>";
                inputRadio += "<input name= 'rad' type='radio' value ='black' onclick = 'text_color()'>black<br>";
                document.getElementById("mainDiv").innerHTML = inputRadio;
            }

            function change_font_buttons() {

                var fontRadio = "<input name ='font' type='radio' value='smaller' onclick = 'change_font()'>Smaller<br>";
                fontRadio += "<input name='font' type='radio' value='medium' onclick = 'change_font()'>Medium<br>";
                fontRadio += "<input name='font' type='radio' value='large' onclick = 'change_font()'>Large<br>";
                fontRadio += "<input name='font' type='radio' value='larger' onclick = 'change_font()'>Larger<br>";
                document.getElementById("mainDiv").innerHTML = fontRadio;
            }

            function change_font()
            {
                var a = document.getElementById("logo");
                var b = document.getElementById("comments");
                var c = document.getElementById("posts");
                var arr = document.getElementById("mainDiv").childNodes;
                var font;

                for (var i = 0; i < arr.length; i++)
                {
                    if (arr[i].checked)
                    {
                        font = arr[i].value;
                    }

                }

                if (font === "larger")
                {
                    a.style.fontSize = "larger";
                    b.style.fontSize = "larger";
                    c.style.fontSize = "larger";
                }
                else if (font === "smaller")
                {
            
                    a.style.fontSize = "smaller";
                    b.style.fontSize = "smaller";
                    c.style.fontSize = "smaller";
                }
                else if (font === "large")
                {
                    a.style.fontSize = "large";
                    b.style.fontSize = "large";               
                    c.style.fontSize = "large";
                }

                else
                {
                    a.style.fontSize = "medium";
                    b.style.fontSize = "medium";
                    c.style.fontSize = "medium";
                }

            }


            //Similar to the change_font function only accesses the mainDiv when it containts the color radio buttons then changes
            //the color of the text contatined in the usersTextArea and the messagesTextArea
            function text_color() {

                var a = document.getElementById("logo");
                var b = document.getElementById("comments");
                var c = document.getElementById("posts");
                var arr = document.getElementById("mainDiv").childNodes;
                var color;

                for (var i = 0; i < arr.length; i++)
                {
                    if (arr[i].checked)
                    {
                        color = arr[i].value;
                    }
                }

                if (color === "red")
                {
                    a.style.color = "red";
                    b.style.color = "red";
                    c.style.color = "red";
                }
                else if (color === "blue")
                {
                    a.style.color = "blue";
                    b.style.color = "blue";
                    c.style.color = "blue";
                }
                else if (color === "green")
                {
                    a.style.color = "green";
                    b.style.color = "green";
                    c.style.color = "green";
                }
                else if (color === "black")
                {
                    a.style.color = "black";
                    b.style.color = "black";
                    c.style.color = "black";
                }
                else
                {
                    a.style.color = "black";
                    b.style.color = "black";
                    c.style.color = "black";
                }
            }
            
            
            
      
          

        </script>





        <script>

          
            $(document).ready(function() {

                $("#header").click(function() {

                    $(this).fadeOut('slow');
                    $(this).fadeIn('slow');

                });


                $("#header").hover(function() {

                    $(this).addClass("red");

                }, function() {
                    $(this).removeClass("red");
                });




            });

            $(document).ready(function()
            {

                $("#hide").click(function()
                {
                    $("#posts").fadeOut("slow");
                });

            });

            $(document).ready(function()
            {
                $("#gauge").click(function()
                {
                    $(this).fadeOut("slow");

                });
            });

            $(document).ready(function()
            {


                $("#hide").click(function()
                {
                    $("#posts").fadeToggle("slow");

                });



            });

            $(document).ready(function()
            {

                $('#posts').accordion({collapsible: true, active: false});

            });
            
            
           




        </script>







        <div id="gauge">

            <?php
            //$this->widget('ext.egauge.EGauge', array('value' => 10));
            ?>
            <?php
            //$this->widget('ext.egauge.Egauge', array('value' => 50));
            ?>

            <?php
            //$this->widget('ext.egauge.EGauge', array('value' => 100));
            ?>

        </div>









        <?php
        /*
        $lang = $_GET['lang']; //Yii::app()->language;
        echo $lang . '<br/>';
        Yii::app()->setLanguage($lang);
         * */
       
        ?>





        <div id="posts" style ="color:black;font-size:medium">
            <h1> Page Info </h1>
            <div>
                <p>
                    <?php
                    $this->widget('zii.widgets.CBreadcrumbs', array(
                        'links' => $this->breadcrumbs,
                    ));
                    ?><!-- breadcrumbs -->

                    <?php echo $content; ?>
                </p>
            </div>

        </div>  









        <select id ="Options" name="Options">
            <option  value ="option" onclick ="clear_div()" >Settings</option>
            <option   value ="color" onclick ="create_radio_button()"> Text_Color</option>
            <option  value ="fonts" onclick ="change_font_buttons()">Font_Size</option>
        </select>
        <div id = "mainDiv">

        </div>


        <div id="footer">
            Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
            All Rights Reserved.<br/>
            <?php echo Yii::powered(); ?>
        </div><!-- footer -->


    </div><!-- page -->





</body>
</html>