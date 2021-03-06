<?php
  // Compatible with sf_escaping_strategy: true
  $aEvent = isset($aEvent) ? $sf_data->getRaw('aEvent') : null;
  $options = isset($options) ? $sf_data->getRaw('options') : null;
?>

<h3 class="a-blog-item-title"><?php echo link_to($aEvent['title'], 'a_event_post', $aEvent) ?></h3>

	<?php if ($options['aBlogMeta']): ?>
		<?php include_partial('aEvent/meta', array('aEvent' => $aEvent)) ?>
	<?php endif ?>
	
<?php if($options['maxImages'] && $aEvent->hasMedia()): ?>		
	<div class="a-blog-item-media">
		<?php include_component('aSlideshowSlot', 'slideshow', array(
	  'items' => $aEvent->getMediaForArea('blog-body', 'image', $options['maxImages']),
	  'id' => 'a-slideshow-blogitem-'.$aEvent['id'],
	  'options' => $options['slideshowOptions']
	  )) ?>
	</div>
<?php endif ?>

 <div class="a-blog-item-excerpt-container">
	<div class="a-blog-item-excerpt">
		<?php echo $aEvent->getTextForArea('blog-body', $options['excerptLength']) ?>
	</div>
	<div class="a-blog-read-more">
		<?php echo link_to('Read More', 'a_event_post', $aEvent, array('class' => 'a-blog-more')) ?>
	</div>
</div>