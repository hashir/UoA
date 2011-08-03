<?php

require_once dirname(__FILE__).'/../lib/entriesGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/entriesGeneratorHelper.class.php';

/**
 * entries actions.
 *
 * @package    asandbox
 * @subpackage entries
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class entriesActions extends autoEntriesActions
{
//    public function executeIndex(sfWebRequest $request)
//  {
//    // sorting
////    if ($request->getParameter('sort') && $this->isValidSortColumn($request->getParameter('sort')))
////    {
////      $this->setSort(array($request->getParameter('sort'), $request->getParameter('sort_type')));
////    }
//$this->setSort(array('id', 'DESC'));
//    // pager
//    if ($request->getParameter('page'))
//    {
//      $this->setPage($request->getParameter('page'));
//    }
//
//    $this->pager = $this->getPager();
//    $this->sort = $this->getSort();
//  }
  
  public function executeIndex(sfWebRequest $request)
  {
     
        $this->form = new EntriesForm();
      
      if($request->isMethod('post') )
      {
          $this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));
          if($this->form->isValid())
          {
              $this->form->getObject()->setAuthPublish(1);
              $this->form->save();
              
              $this->getUser()->setFlash('notice', 'Your Life Impact story is now under review. You’ll receive an email shortly if your story has been published. Thank you for helping us to inspire others to make a positive impact on the world.');
              
//              $this->goalTracker = '<script>pageTracker._trackPageview("/thanks-fb"); </script>';
          }
         
      }
      $this->setSort(array('id', 'DESC'));
    // pager
    if ($request->getParameter('page'))
    {
      $this->setPage($request->getParameter('page'));
    }

    $this->pager = $this->getPager();
    $this->sort = $this->getSort();
  }
  
  public function executeFbtab(sfWebRequest $request)
  {
      $this->form = new EntriesForm();
      $httpReferrer = parse_url($request->getReferer());
      $hostParts = explode('.', $httpReferrer['host']);
//      var_dump($hostParts);
      if($request->isMethod('post') && !in_array('facebook', $hostParts))
      {
          $this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));
          if($this->form->isValid())
          {
              $this->form->getObject()->setAuthPublish(1);
              $this->form->save();
              $this->getUser()->setFlash('message', 'Your Life Impact story is now under review. You’ll receive an email shortly if your story has been published. Thank you for helping us to inspire others to make a positive impact on the world.');
              $this->goalTracker = '<script>pageTracker._trackPageview("/thanks-direct"); </script>';
          }
      }  
      //$this->moveVideo();
  }
  
  /**
   * YT API KEY: AI39si53nkZgrhA-nJLOurfN5yOdLdQeWHK_M08w1A19kfwa718lRXR8Dilcpnc1D0BVXn8KLAfSyYdYbdrd3X7bgDV0ma59Zg
   */
  
  public function moveVideo($video)
  {
    ProjectConfiguration::registerZend();
    $httpClient = Zend_Gdata_ClientLogin::getHttpClient('manuel.oteroborjas@adelaide.edu.au','watchm3now','youtube',null,'lifeimpact',null,null,'https://www.google.com/accounts/ClientLogin');
    $applicationId 	= 'lifeimpact';
    $clientId 		= 'lifeimpact';

    $yt = new Zend_Gdata_YouTube($httpClient, $applicationId, $clientId,YOUTUBE_DEVELOPER_KEY);
    $yt->setMajorProtocolVersion(2);  
    
  }
  
  public function executeTerms()
  {
      
  }
  
  public function executeCreate(sfWebRequest $request)
  {
    $this->form = $this->configuration->getForm();
    $this->entries = $this->form->getObject();

    $this->processForm($request, $this->form);

    $this->setTemplate('index');
    
    $this->setSort(array('id', 'DESC'));
    // pager
    if ($request->getParameter('page'))
    {
      $this->setPage($request->getParameter('page'));
    }

    $this->pager = $this->getPager();
    $this->sort = $this->getSort();
  }
   public function executeEdit(sfWebRequest $request)
  {$this->redirect('entries/index');
  }
}
