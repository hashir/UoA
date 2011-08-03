<div class="product-teaser">
    <?php if($entries->getImageUrl() == "plus.jpg"){$rel = "rel='form'";}else{$rel='';}?>
    <a href="javascript:void(0)" <?php echo $rel?> id="box_<?php echo $entries->getId() ?>">
        <img src="/uploads/<?php echo ($entries->getPhoto() == '')? $entries->getImageUrl(): $entries->getPhoto() ?>" width="160" height="160" />
        <div class="teaser-info"><?php echo substr($entries->getStory(),0,75) ?>...</div>
    </a>
</div>
<div id="story_<?php echo $entries->getId() ?>" style="display:none;"><?php echo $entries->getStory() ?></div>
<div id="name_<?php echo $entries->getId() ?>" style="display:none;"><?php echo $entries->getName() ?></div>
<div id="image_<?php echo $entries->getId() ?>" style="display:none;"><?php echo ($entries->getPhoto() == '')? $entries->getImageUrl(): $entries->getPhoto() ?></div>
<div id="date_<?php echo $entries->getId() ?>" style="display:none;"><?php echo date("M jS Y",strtotime($entries->getCreatedAt())) ?></div>
           
                   