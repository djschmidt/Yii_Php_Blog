<?php

class Email extends CApplicationComponent {

    public $type = 'text/html';
    public $to = null;
    public $subject = '';
    public $from = null;
    public $replyTo = null;
    public $returnPath = null;
    public $cc = null;
    public $bcc = null;
    public $message = '';
    public $delivery = 'php';
    public $language = 'uni';
    public $contentType = 'utf-8';
    public $view = null;
    public $viewVars = null;
    public $layout = null;
    public $lineLength = 70;

    public function __construct() {
        Yii::setPathOfAlias('email', dirname(__FILE__) . '/views');
    }

    public function send($arg1 = null) {

        if ($arg1 === null) {
            $message = $this->message;
        } else {
            $message = $arg1;
        }



        $to = $this->processAddresses($this->to);
        return $this->mail($to, $this->subject, $message);
    }

    private function mail($to, $subject, $message) {
      
                $message = wordwrap($message, $this->lineLength);
                mb_language($this->language);
                return mb_send_mail($to, $subject, $message, implode("\r\n", $this->createHeaders()));
       
    }

    private function createHeaders() {
        $headers = array();

        //maps class variable names to header names
        $map = array(
            'from' => 'From',
            'cc' => 'Cc',
            'bcc' => 'Bcc',
            'replyTo' => 'Reply-To',
            'returnPath' => 'Return-Path',
        );
        foreach ($map as $key => $value) {
            if (isset($this->$key))
                $headers[] = "$value: {$this->processAddresses($this->$key)}";
        }
        $headers[] = "Content-Type: {$this->type}; charset=" . $this->contentType;
        $headers[] = "MIME-Version: 1.0";

        return $headers;
    }

    private function processAddresses($addresses) {
        return (is_array($addresses)) ? implode(', ', $addresses) : $addresses;
    }

}
