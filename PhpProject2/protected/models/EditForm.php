<?php

class EditForm extends CFormModel {

    public $description;
    public $likes;
    public $hobbies;
    public $work;
    public $username;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules() {
        return array(
            
            array('description, likes, hobbies, work', 'length', 'max'=>500),
            array('username','length','max'=>20),
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'description' => 'Description',
            'likes' => 'Likes',
            'hobbies' => 'Hobbies',
            'work' => 'Work',
            'username' =>'Username',
        );
    }

    /**
     * Authenticates the password.
     * This is the 'authenticate' validator as declared in rules().
     */
    public function authenticate($attribute, $params) {
        
    }

    /**
     * Logs in the user using the given username and password in the model.
     * @return boolean whether login is successful
     */
    public function login() {
        
    }

}
