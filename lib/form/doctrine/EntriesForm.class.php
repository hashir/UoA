<?php

/**
 * Entries form.
 *
 * @package    asandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EntriesForm extends BaseEntriesForm
{
  public function configure()
  {
      $this->disableCSRFProtection();
      unset($this->widgetSchema['created_at']);
      unset($this->widgetSchema['updated_at']);
      unset($this->validatorSchema['created_at']);
      unset($this->validatorSchema['updated_at']);
      $this->setWidget('photo', new sfWidgetFormInputFile());
      $this->setWidget('email', new sfWidgetFormInputText(array('default'=>'Not Published')));
      $this->setValidator('photo', new sfValidatorFile(array(
        'mime_type_guessers' => array('guessFromFileinfo'),
        'mime_categories' => array(
              'digital_assets' => array(
                'image/jpeg',
                'image/pjpeg',
                'image/png',
                'image/x-png',
                'image/gif',
                'video/mpeg',
                'video/mp4',
                'video/quicktime',
                'video/x-ms-asf',
                'video/x-msvideo',
                'video/x-sgi-movie',
                'video/x-ms-wmv',
            )),
        'mime_types' => 'digital_assets',         
        'path' => sfConfig::get('sf_upload_dir'),
        'required' => false,
      )));
      
      $this->setValidator('story', new sfValidatorString(array('required' => true)));
      $this->setValidator('auth_publish', new sfValidatorBoolean(array('required' => true)));
  }
}
