<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ChatHandler extends YiiChatDbHandlerBase{
    
    protected function getDb(){
        return Yii::app()->db;
    }
    
    protected function createPostUniqueId()
    {
        return hash('sha1',$this->getChatId().time().rand(1000,9999));
    }
    
    protected function getDateFormatted($value)
    {
        return Yii::app()->formate->formatDateTime($value);
    }
    
    protected function acceptMessage($message)
    {
        return $message;
    }
    
    
}