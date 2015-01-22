<?php

class SiteController extends Controller {

    public $layout = 'column1';

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
            'yiichat' => array('classs' => 'YiiChatAction'),
        );
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    public function actionCreate() {
        $model = new MyModel;

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['SomeForm'])) {
            $model->attributes = $_POST['SomeForm'];
            if ($model->validate()) {
                if ($model->save()) {

                    $message = new YiiMailMessage;
                    $message->setBody('<h1>mets-blog.com</h1>', 'text/html');
                    $message->subject = 'Service';
                    $message->addTo('mets@blog.com');
                    $message->from = 'your@email.com';
                    Yii::app()->mail->send($message);

                    $this->redirect(array('view', 'id' => $model->id));
                }
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $headers = "From: {$model->email}\r\nReply-To: {$model->email}";
                mail(Yii::app()->params['adminEmail'], $model->subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    public function actionProfile() {

        $model = new User;
        $model->id = Yii::app()->user->id;
        $model->username = Yii::app()->user->name;
        $model->description = Yii::app()->user->getDescription();





        $this->render('profile', array('model' => $model)
        );
    }
    
    
    

    /**
     * Displays the login page
     */
    public function actionLogin() {


        if (!defined('CRYPT_BLOWFISH') || !CRYPT_BLOWFISH)
            throw new CHttpException(500, "This application requires that PHP was compiled with Blowfish support for crypt().");

        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];


            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form


        $this->render('login', array('model' => $model));

        return $model;
    }
    /**
     * Displays the register page
     */
    public function actionRegister() {
        $model = new RegisterForm;
        $newUser = new User;
        $email = Yii::app()->email;


        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            Yii::app()->end();
        }

        if (isset($_POST['RegisterForm'])) {
            //$model->attribues=$_POST['RegisterForm'];
//               var_dump($_POST['RegisterForm']);
            $model->username = $_POST['RegisterForm']['username'];
            $model->password = $_POST['RegisterForm']['password'];
            $model->password = $newUser->hashPassword($model->password);
            $model->email = $_POST['RegisterForm']['email'];



            $model->validate();

            $newUser->username = $model->username;
            $newUser->password = $model->password;
            $newUser->email = $model->email;
            
            /*
            $email->to = $model->email;
            $email->subject = 'Welcome' . ' ' . $model->username;
            $email->message = 'Hello ' . $model->username . '. Welcome to the blog!';
            $email->send();
             * */
            

            if ($newUser->validate()) {


                if ($newUser->save()) {


                    Yii::app()->user->setFlash('success', "Registration was successful");
                    $this->redirect(Yii::app()->homeUrl);
                } else {
                    echo 'It was not saved';
                    echo $newUser->getErrors();
                }
            } 
            else 
            {
                echo 'Either the username or the email was not unique';
            }

        }
        //display the register form
        $this->render('register', array('model' => $model));
    }

    public function actionActivate() {

        $model = new tbl_user('activation');

        if (isset($_POST['tbl_user'])) {
            $model->attributes = $_POST['tbl_user'];
            $model = $model->findByAttributes(array('email' => $model->email, 'activation' => $model->activation));

            if ($model) {
                $model->activation = null;
                $model->save();
            }
        }
        $model = new tbl_user('activation');
        $this->render('activate', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

}
