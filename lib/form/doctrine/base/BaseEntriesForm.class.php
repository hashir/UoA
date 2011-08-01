<?php

/**
 * Entries form base class.
 *
 * @method Entries getObject() Returns the current form's model object
 *
 * @package    asandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEntriesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'name'           => new sfWidgetFormInputText(),
      'email'          => new sfWidgetFormInputText(),
      'photo'          => new sfWidgetFormInputText(),
      'story'          => new sfWidgetFormTextarea(),
      'auth_publish'   => new sfWidgetFormInputCheckbox(),
      'auth_contact'   => new sfWidgetFormInputCheckbox(),
      'notify_publish' => new sfWidgetFormInputCheckbox(),
      'approved'       => new sfWidgetFormInputCheckbox(),
      'source'         => new sfWidgetFormChoice(array('choices' => array('YOUTUBE' => 'YOUTUBE', 'TWITTER' => 'TWITTER', 'DIRECT' => 'DIRECT'))),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'           => new sfValidatorString(array('max_length' => 255)),
      'email'          => new sfValidatorEmail(array('max_length' => 255)),
      'photo'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'story'          => new sfValidatorString(),
      'auth_publish'   => new sfValidatorBoolean(),
      'auth_contact'   => new sfValidatorBoolean(array('required' => false)),
      'notify_publish' => new sfValidatorBoolean(array('required' => false)),
      'approved'       => new sfValidatorBoolean(array('required' => false)),
      'source'         => new sfValidatorChoice(array('choices' => array(0 => 'YOUTUBE', 1 => 'TWITTER', 2 => 'DIRECT'), 'required' => false)),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('entries[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Entries';
  }

}
