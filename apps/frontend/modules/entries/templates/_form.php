<form action="<?php echo url_for('entries/index') ?>" method="POST" enctype="multipart/form-data">                   
    	<div class="form-lft">
            <div class="form-listing"><label>NAME <span>*</span></label><?php                        
                        echo $form['name']->render(array('class'=>'input-part'));
                        if($form['name']->hasError()) echo '<span class="formerror">' . $form['name']->getError() . '</span>'; ?></div>
            <div class="clr"></div>
            <div class="form-listing"><label>Email <span>*</span></label><input type="text" name="entries[email]" value="Not Published" onfocus="javascript:this.value=''" class="input-part" id="entries_email" /><?php 
                         
                        if($form['email']->hasError()) echo '<span class="formerror">' . $form['email']->getError() . '</span>';?></div>
            <div class="clr"></div>
            <div class="form-listing"><label>Photo / Video</label>
                        <?php 
                                                
                        if($form['photo']->hasError()) echo '<span class="formerror">' . $form['photo']->getError() . '</span>';
                        echo $form['photo']->render(array('class'=>'input-part')); 
                        
                        ?>
                        </div>
            <div class="clr"></div>
            <div class="size-txt">Minimum size 250 x 250px</div>
            <div class="clr"></div>
            <div class="form-listing"><label>Your<br /> Impact <span>*</span></label><?php 
                        if($form['story']->hasError()) echo '<span class="formerror" style="padding-left:0px;">' . $form['story']->getError() . '</span>';
                        echo $form['story']->render(array('class'=>'text-area-part')); ?></div>
            <div class="clr"></div>
            <!--<div><a href="#" id="slick-up">submit</a></div>-->
            <div class="clr"></div>
        </div>
        <div class="form-rht">
            <?php if($form['auth_publish']->hasError()) echo '<div class="formerror" style="padding-left:0px;">' . $form['auth_publish']->getError() . '</div>';?>
            <div class="check-box-input"><?php echo $form['auth_publish']->render(); ?></div>
            <div class="check-box-content">I agree that the University of Adelaide may publish my information as supplied <span>*</span></div>
            <div class="clr"></div>
            <div class="check-box-input"><?php echo $form['auth_contact']->render(); ?></div>
            <div class="check-box-content">I agree to receive ongoing email communications from the University of Adelaide</div>
            <div class="clr"></div>
            <div class="check-box-input"><?php echo $form['notify_publish']->render(); ?></div>
            <div class="check-box-content">Notify me if my story is published</div>
            <div class="clr"></div>
            <div class="submit-part">
			<div class="right"><input  type="image" src="/images/submit-btn.png"/></div>
            </div>
            
        	<div class="clr"></div>
        </div>
        </form>