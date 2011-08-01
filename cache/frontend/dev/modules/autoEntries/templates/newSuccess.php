<?php use_helper('I18N', 'Date') ?>
<?php include_partial('entries/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('New Entries', array(), 'messages') ?></h1>

  <?php include_partial('entries/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('entries/form_header', array('entries' => $entries, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('entries/form', array('entries' => $entries, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('entries/form_footer', array('entries' => $entries, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
