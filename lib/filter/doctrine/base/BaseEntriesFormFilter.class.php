<?php

/**
 * Entries filter form base class.
 *
 * @package    asandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEntriesFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'email'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'photo'          => new sfWidgetFormFilterInput(),
      'story'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'auth_publish'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'auth_contact'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'notify_publish' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'approved'       => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'source'         => new sfWidgetFormChoice(array('choices' => array('' => '', 'YOUTUBE' => 'YOUTUBE', 'TWITTER' => 'TWITTER', 'DIRECT' => 'DIRECT'))),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'name'           => new sfValidatorPass(array('required' => false)),
      'email'          => new sfValidatorPass(array('required' => false)),
      'photo'          => new sfValidatorPass(array('required' => false)),
      'story'          => new sfValidatorPass(array('required' => false)),
      'auth_publish'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'auth_contact'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'notify_publish' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'approved'       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'source'         => new sfValidatorChoice(array('required' => false, 'choices' => array('YOUTUBE' => 'YOUTUBE', 'TWITTER' => 'TWITTER', 'DIRECT' => 'DIRECT'))),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('entries_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Entries';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'name'           => 'Text',
      'email'          => 'Text',
      'photo'          => 'Text',
      'story'          => 'Text',
      'auth_publish'   => 'Boolean',
      'auth_contact'   => 'Boolean',
      'notify_publish' => 'Boolean',
      'approved'       => 'Boolean',
      'source'         => 'Enum',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
    );
  }
}
