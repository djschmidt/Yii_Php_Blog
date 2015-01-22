<?php
 
Yii::import('application.vendors.*');
require_once 'Zend/Loader.php';
Zend_Loader::loadClass('Zend_Gdata_YouTube');
Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
 
     $authenticationURL = 'https://www.google.com/accounts/ClientLogin';
 
     $httpClient = Zend_Gdata_ClientLogin::getHttpClient(
                      $username          = 'shozin1',
                      $password           = 'Danika-91',
                      $service           = 'youtube',
                      $client           = null,
                      $source           = 'PhpProject2',
                      $loginToken           = null,
                      $loginCaptcha      = null,
                      $authenticationURL);
 
     $devkey = 'AI39si7GamMvrkfWpbGa_wkW07-FSctNNFBbCDsZViAO49QXzlw1we9kfOmZxiOha2pnVvODKcFJxleDfAKLssx7PwxCPfMzPA';
 
          $yt = new Zend_Gdata_YouTube($httpClient, '', '', $devkey);
          $video = new Zend_Gdata_YouTube_VideoEntry();
 
 
          $video->setVideoTitle('My Blog');
          $video->setVideoDescription('This is my blog.');
          $video->setVideoPrivate();
          $video->setVideoCategory('People'); // see Youtube. Else you may get an error. Avoid using People & Blogs. People alone or Blogs alone is good.
          $video->SetVideoTags('apps');
          $handler_url     = 'http://gdata.youtube.com/action/GetUploadToken';
          $token_array     = $yt->getFormUploadToken($video, $handler_url);
          $token          = $token_array['token'];
          $post_url     = $token_array['url'];
          $next_url      = 'http://djschmidt.dev/PhpProject2/index.php/?r=interests/video';
?>
 
<form action="<?php echo $post_url ?>?nexturl=<?php echo $next_url ?>"
method="post" enctype="multipart/form-data">
     <input name="file" type="file"/>
     <input name="token" type="hidden" value="<?php echo $token ?>"/>
     <input value="Upload Video File" type="submit" />
</form>