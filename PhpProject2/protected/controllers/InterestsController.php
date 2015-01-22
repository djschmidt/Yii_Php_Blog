<?php

class InterestsController extends Controller {

    public $Descript;
    public $Hobbies;
    public $Work;
    public $Likes;
    
    private $_model;

    public function actionIndex() {
        $this->render('index');
    }

    public function actions() {
        return array(
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }
    /*
        calls edit view where the user can edit their user information
     */
    public function actionEdit() {
        $model = new EditForm;
        $userInterests = new Interests();

        if (isset($_POST['EditForm'])) {

            $model->description = $_POST['EditForm']['description'];
            $model->hobbies = $_POST['EditForm']['hobbies'];
            $model->likes = $_POST['EditForm']['likes'];
            $model->work = $_POST['EditForm']['work'];
            $model->username = Yii::app()->user->name;


            $model->validate();
            
           
            

            $userInterests->description = $model->description;
            $userInterests->hobbies = $model->hobbies;
            $userInterests->likes = $model->likes;
            $userInterests->work = $model->work;
            $userInterests->username = $model->username;
            
           
            
            



            if ($userInterests->validate()) {


                if ($userInterests->save()) {


                    Yii::app()->user->setFlash('success', "User information was successfully Updated");
                    $this->Descript = $userInterests->description;
                    $this->Hobbies = $userInterests->hobbies;
                    
                    $this->render('about', array('model' => $model)
                        );
                    $this->redirect(array('about'));
                   
                       
        
                } else {
                    echo 'It was not saved';
                }
            }
        }

        $this->render('edit', array('model' => $model));
    }
    
    
        public function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'photo' and 'edit' actions
                'actions'=>array('photo','edit'),
                'users'=>array('*'),
            ),
            
        );
    }


    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }
    
    //calls the about page which displays user information
    
    public function actionAbout() {
        $model = $this->loadModel();
      
       $this->render('about', array('model' => $model) );
        
        
    }

    public function actionPhoto() {
        $model = $this->loadModel();


        if (isset($_POST['Interests'])) {

            $_POST['Interests']['image'] = $model->image;
            $rnd = rand(0, 9999);
            $model->attributes = $_POST['Interests'];
            $uploadedFile = CUploadedFile::getInstance($model, 'image');
            $fileName = "{$rnd}-{$uploadedFile}";
            $model->image = $fileName;

            $model->validate();

            if ($model->save()) {

                if (!empty($uploadedFile)) {  // check if uploaded file is set or not
                    $uploadedFile->saveAs(Yii::app()->basePath . '/../banner/' . $model->image);
                }
                $this->redirect(array('photo', 'id' => $model->id));
            }
        }

        $this->render('photo', array(
            'model' => $model,
        ));
    }

    public function loadModel() {

        $model = Interests::model();
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    protected function newInterests($post) {
        $interests = new Interests;

        if (isset($_POST['Interests'])) {
            $interests->attributes = $_POST['Interests'];
        }
        return $interests;
    }

    public function actionVideo() {
        $this->render('video');
    }

}
