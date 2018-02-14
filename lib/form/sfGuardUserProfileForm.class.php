<?php

/**
 * sfGuardUserProfile form.
 *
 * @package    social
 * @subpackage form
 * @author     Pablo Garaizar <garaizar@deusto.es>
 */
class sfGuardUserProfileForm extends BasesfGuardUserProfileForm
{
  public function configure()
  {
    unset(
      $this['created_at'], $this['updated_at'], $this['user_id']
    );
    $this->widgetSchema['photo'] = new sfWidgetFormInputFile(array('label' => 'Photo'));
    $this->validatorSchema['photo'] = new sfValidatorFile(array(
      'required' => false,
      'path' => sfConfig::get('sf_upload_dir').'/profiles',
      'mime_types' => 'web_images',
    ));
    $years = range(date('Y') - 100, date('Y') + 10);
    $this->setWidget('birthday', new sfWidgetFormI18nDate(array(
      'culture'      => sfContext::getInstance()->getUser()->getCulture(),
      'month_format' => 'name', 
      'years'        => array_combine($years, $years)
    )));
    $this->widgetSchema->setLabels(array(
      'academic_promotion' => 'Graduation year',
      'personal_info_is_public' => 'Personal information',
      'location_info_is_public' => 'Location',
      'academic_info_is_public' => 'Academic information',
      'pictures_info_is_public' => 'Pictures',
      'pages_info_is_public' => 'Pages',
      'friends_info_is_public' => 'Friends',
      'tos_accept' => 'Allow my data to be used for research purposes'
    ));
  }
}
