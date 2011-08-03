<?php // We supply a default layout with the apostrophePlugin which is great for ?>
<?php // both CMS and non-CMS pages because you can easily override every section ?>
<?php // via Symfony slots. We've put this require here to ensure that we don't ?>
<?php // accidentally let this copy get out of sync with the one in the plugin. ?>
<?php // YES, you may ABSOLUTELY replace this layout.php with your own. ?>

<?php //require sfConfig::get('sf_plugins_dir') . '/apostrophePlugin/modules/a/templates/layout.php' ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UOA</title>
<!--<link href="css/layout.css" rel="stylesheet" type="text/css" />-->

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<!--<script type="text/javascript" src="js/thumb-accordion.js" language="javascript"></script>
<script type='text/javascript' src="js/flexcroll.js"></script>-->
<?php 
include_stylesheets();
include_javascripts();
?>
</head>
<body>
<?php echo $sf_content ?>
</body>
</html>