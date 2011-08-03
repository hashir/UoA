<?php //foreach ($pager->getResults() as $i => $entries): $odd = fmod(++$i, 2) ? 'odd' : 'even' ?>  
            <?php //include_partial('entries/viewStory', array('entries' => $entries)) ?>
        <?php //endforeach; ?>
<script  type="text/javascript">
jQuery(document).ready(function(){
	jQuery(".product-teaser a").click(function(){
		boxClick(this);
	});
	jQuery(".hide-story").click(function(){
            jQuery("a.active").removeClass('active');
            hideAllDetails();
            resumeScroll();
        });
	jQuery("#slick-slidetoggle").click(function(){
		toggleForm();
	});
        
        jQuery("input[type=file]").filestyle({ 
             image: "/images/arrow.png",
             imageheight : 12,
             imagewidth : 9,
             width : 310
        });

});
</script>
<div id="wrapper">
  	<div class="header">
    <div class="logo-lft"><a href="#"><img src="/images/logo.png" width="270" height="216" /></a></div>
    <div class="logo-rgt-container">
      <div class="rgt-logo-main">
        <div class="life-impace-logo"><a href="#"><img src="/images/life-impact-logo.png" width="53" height="42" /></a></div>
        <div class="uoa-logo"><a href="#"><img src="/images/university-icon.png" /></a></div>
      </div>
      <div class="clr"></div>
      <div>
        <div class="welcome-content">
          <h1>Welcome to the Life Impact Wall.</h1>
          <br />
          These are stories told by people just like you. People
          who have or will make a lasting impact on the world. How
          big or small the impact may be is irrelevant. What
          matters is that we shine light on it and inspire others to
          do the same. That’s what this site is for.</div>
        <div class="share-story-div"><a href="#" id="slick-slidetoggle"><img src="/images/share-story-btn.png" /></a></div>
      </div>
    </div>
    <div class="clr"></div>
  </div>
  <div class="space-div"></div>
  	<!--form part start-->
    <?php if($sf_context->getInstance()->getRequest()->isMethod("post")){$display = "block";}else{$display = "none";}?>
    <div class="form-part" id="slickbox" style="display:<?php echo $display;?>">
    	<div class="form-part-arrow"></div>
        <?php include_partial('entries/form', array('form'=> $form)) ?>
        <div class="clr"></div>
        <!--
        <div class="thank-you" style="display:none;">
            <div class="clr"></div>
            	<h2>Thank you for submitting your Life Impact.</h2><br />
                <p>Your story has entered the moderation queue. If an<br />
email address has been provided you will receive<br />
notification when your story is published.</p>
<div class="clr"></div>
	<div class="clr"></div>            			
           </div>
		<div class="close-btn-black" style="display:none;"><a href="#" id="slick-up-thumb">Close</a></div>-->
        <div class="clr"></div>
  </div>
    <!--form part end-->  
    
 	<div class="container">    	
        <div class="accordion" >    
            <?php 
            $row = 0;
            $j = 0;
            foreach ($pager->getResults() as $i => $entries): ?>
            <?php if($j%6==0):
                $row++;?>
            <div id="carousel_<?php echo $row;?>" class="carousel">
            <?php endif;?>
            <?php 
            if($entries->getSource()== 'DIRECT')
                include_partial('entries/viewStoryDirect', array('entries' => $entries));
            else if($entries->getSource()== 'YOUTUBE')
                    include_partial('entries/viewStoryYoutube', array('entries' => $entries));
            else if($entries->getSource()== 'TWITTER')
                    include_partial('entries/viewStoryTwitter', array('entries' => $entries));
            $j++;
            if($j%6==0):?>
            </div>
            <div class="clr"></div>
          
        <?php
            include_partial('entries/fullStory', array('row' => $row));
        endif;
        endforeach; ?>
 <!--           <div class="product-teaser"><a href="#"><img src="/images/thumb5.jpg" width="160" height="160" /><div class="teaser-info" ></div></a></div>
          
          <div class="product-teaser"><a href="#" ><img src="/images/thumb5.jpg" width="160" height="160" /><div class="teaser-info" ></div></a></div>
            
          <div class="product-teaser"><a href="#" ><img src="/images/thumb2.jpg" width="160" height="160" /><div class="teaser-info" ></div></a></div>
            
          <div class="product-teaser"><a href="javascript:void(0)" class="active" id="slick-slidetoggle-thumb"><img src="/images/thumb6.jpg" width="160" height="160" /><div class="teaser-info">I was involved with the research of the swine flu vaccine which...</div></a></div>        
                    
            <div class="product-teaser"><a href="#" ><img src="/images/thumb7.jpg" width="160" height="160" /><div class="teaser-info" >Boy you have no idea how big an impact you've made in my life..</div></a></div>
                            
           <div class="product-teaser"><a href="#" style="outline:none;"><img src="/images/thumb8.jpg" width="160" height="160" /><div class="teaser-info" style="text-decoration:none;"></div></a></div>
           <div class="clr"></div>           
            <div class="list-sub" id="slickbox-thumb">            
                <div class="list-sub-min">
                	<div class="clr"></div>
                	<div class="list-sub-lft"><img src="/images/pic-big.jpg" alt="pic" /></div>
                    <div class="list-sub-rht">
                        <div id='mycustomscroll' class='flexcroll'>
                        <p>Suspendisse vestibulum erat vel quam pretium ultricies. Vivamus quis tortor massa, at
                        aliquam purus. Quisque viverra viverra nibh, sed luctus ligula tempor eu. Ut eu magna id nibh
                        adipiscing hendrerit. Maecenas tincidunt, sem at ornare hendrerit, neque quam varius nulla,
                        vulputate egestas nisi arcu vitae justo. Curabitur euismod aliquam magna ut iaculis. Donec
                        libero dolor, ultricies eget dictum id, sollicitudin et orci. Integer eget magna vel purus
                        fermentum dapibus in eu neque. Nam nec enim odio.</p>
                        
                        <p>Curabitur eget laoreet eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                        posuere cubilia Curae; Quisque condimentum commodo varius. Cras quis tellus vitae massa
                        iaculis luctus. Suspendisse ac cursus est. Maecenas sed suscipit elit. Donec tincidunt libero
                        ut leo aliquam porttitor. Donec et nibh a diam egestas congue.</p>
                        
                        <p>Suspendisse vestibulum erat vel quam pretium ultricies. Vivamus quis tortor massa, at
                        aliquam purus. Quisque viverra viverra nibh, sed luctus ligula tempor eu. Ut eu magna id nibh
                        adipiscing hendrerit. Maecenas tincidunt, sem at ornare hendrerit, neque quam varius nulla,
                        vulputate egestas nisi arcu vitae justo. Curabitur euismod aliquam magna ut iaculis. Donec
                        libero dolor, ultricies eget dictum id, sollicitudin et orci. Integer eget magna vel purus
                        fermentum dapibus in eu neque. Nam nec enim odio.</p>
                        
                        <p>Curabitur eget laoreet eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                        posuere cubilia Curae; Quisque condimentum commodo varius. Cras quis tellus vitae massa
                        iaculis luctus. Suspendisse ac cursus est. Maecenas sed suscipit elit. Donec tincidunt libero
                        ut leo aliquam porttitor. Donec et nibh a diam egestas congue.</p>
                        
                        <p>Suspendisse vestibulum erat vel quam pretium ultricies. Vivamus quis tortor massa, at
                        aliquam purus. Quisque viverra viverra nibh, sed luctus ligula tempor eu. Ut eu magna id nibh
                        adipiscing hendrerit. Maecenas tincidunt, sem at ornare hendrerit, neque quam varius nulla,
                        vulputate egestas nisi arcu vitae justo. Curabitur euismod aliquam magna ut iaculis. Donec
                        libero dolor, ultricies eget dictum id, sollicitudin et orci. Integer eget magna vel purus
                        fermentum dapibus in eu neque. Nam nec enim odio.</p>
                        
                        <p>Curabitur eget laoreet eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                        posuere cubilia Curae; Quisque condimentum commodo varius. Cras quis tellus vitae massa
                        iaculis luctus. Suspendisse ac cursus est. Maecenas sed suscipit elit. Donec tincidunt libero
                        ut leo aliquam porttitor. Donec et nibh a diam egestas congue.</p>
                        
                        <p>Suspendisse vestibulum erat vel quam pretium ultricies. Vivamus quis tortor massa, at
                        aliquam purus. Quisque viverra viverra nibh, sed luctus ligula tempor eu. Ut eu magna id nibh
                        adipiscing hendrerit. Maecenas tincidunt, sem at ornare hendrerit, neque quam varius nulla,
                        vulputate egestas nisi arcu vitae justo. Curabitur euismod aliquam magna ut iaculis. Donec
                        libero dolor, ultricies eget dictum id, sollicitudin et orci. Integer eget magna vel purus
                        fermentum dapibus in eu neque. Nam nec enim odio.</p>
                        
                        <p>Curabitur eget laoreet eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                        posuere cubilia Curae; Quisque condimentum commodo varius. Cras quis tellus vitae massa
                        iaculis luctus. Suspendisse ac cursus est. Maecenas sed suscipit elit. Donec tincidunt libero
                        ut leo aliquam porttitor. Donec et nibh a diam egestas congue.</p>
                        
                        <p>Suspendisse vestibulum erat vel quam pretium ultricies. Vivamus quis tortor massa, at
                        aliquam purus. Quisque viverra viverra nibh, sed luctus ligula tempor eu. Ut eu magna id nibh
                        adipiscing hendrerit. Maecenas tincidunt, sem at ornare hendrerit, neque quam varius nulla,
                        vulputate egestas nisi arcu vitae justo. Curabitur euismod aliquam magna ut iaculis. Donec
                        libero dolor, ultricies eget dictum id, sollicitudin et orci. Integer eget magna vel purus
                        fermentum dapibus in eu neque. Nam nec enim odio.</p>
                        
                        <p>Curabitur eget laoreet eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                        posuere cubilia Curae; Quisque condimentum commodo varius. Cras quis tellus vitae massa
                        iaculis luctus. Suspendisse ac cursus est. Maecenas sed suscipit elit. Donec tincidunt libero
                        ut leo aliquam porttitor. Donec et nibh a diam egestas congue.</p>
                        
                        <p>Suspendisse vestibulum erat vel quam pretium ultricies. Vivamus quis tortor massa, at
                        aliquam purus. Quisque viverra viverra nibh, sed luctus ligula tempor eu. Ut eu magna id nibh
                        adipiscing hendrerit. Maecenas tincidunt, sem at ornare hendrerit, neque quam varius nulla,
                        vulputate egestas nisi arcu vitae justo. Curabitur euismod aliquam magna ut iaculis. Donec
                        libero dolor, ultricies eget dictum id, sollicitudin et orci. Integer eget magna vel purus
                        fermentum dapibus in eu neque. Nam nec enim odio.</p>
                        
                        <p>Curabitur eget laoreet eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                        posuere cubilia Curae; Quisque condimentum commodo varius. Cras quis tellus vitae massa
                        iaculis luctus. Suspendisse ac cursus est. Maecenas sed suscipit elit. Donec tincidunt libero
                        ut leo aliquam porttitor. Donec et nibh a diam egestas congue.</p>
                        
                        <p>Suspendisse vestibulum erat vel quam pretium ultricies. Vivamus quis tortor massa, at
                        aliquam purus. Quisque viverra viverra nibh, sed luctus ligula tempor eu. Ut eu magna id nibh
                        adipiscing hendrerit. Maecenas tincidunt, sem at ornare hendrerit, neque quam varius nulla,
                        vulputate egestas nisi arcu vitae justo. Curabitur euismod aliquam magna ut iaculis. Donec
                        libero dolor, ultricies eget dictum id, sollicitudin et orci. Integer eget magna vel purus
                        fermentum dapibus in eu neque. Nam nec enim odio.</p>
                        
                        <p>Curabitur eget laoreet eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                        posuere cubilia Curae; Quisque condimentum commodo varius. Cras quis tellus vitae massa
                        iaculis luctus. Suspendisse ac cursus est. Maecenas sed suscipit elit. Donec tincidunt libero
                        ut leo aliquam porttitor. Donec et nibh a diam egestas congue.</p>
                        
                        <p>Suspendisse vestibulum erat vel quam pretium ultricies. Vivamus quis tortor massa, at
                        aliquam purus. Quisque viverra viverra nibh, sed luctus ligula tempor eu. Ut eu magna id nibh
                        adipiscing hendrerit. Maecenas tincidunt, sem at ornare hendrerit, neque quam varius nulla,
                        vulputate egestas nisi arcu vitae justo. Curabitur euismod aliquam magna ut iaculis. Donec
                        libero dolor, ultricies eget dictum id, sollicitudin et orci. Integer eget magna vel purus
                        fermentum dapibus in eu neque. Nam nec enim odio.</p>
                        
                        <p>Curabitur eget laoreet eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                        posuere cubilia Curae; Quisque condimentum commodo varius. Cras quis tellus vitae massa
                        iaculis luctus. Suspendisse ac cursus est. Maecenas sed suscipit elit. Donec tincidunt libero
                        ut leo aliquam porttitor. Donec et nibh a diam egestas congue.</p>
                        
                       
                        </div><br /><br />
                        <p><strong>Submitted by XXX (name, username?) on July 21st<br />
                        2011 via Life Impact platform</strong><br /><br /><strong>SHARE</strong><br />
                        <div class="social-network"><a href="#"><img src="/images/face-book.png" alt="facebook" /></a></div> 
                        <div class="social-network"><a href="#"><img src="/images/twitter.png" alt="facebook" /></a></div> 
                        <div class="social-network"><a href="#"><img src="/images/like.png" alt="facebook" /></a></div> 
                        </p>
                        <div class="clr"></div>
            			<div class="close-btn"><a href="#" id="slick-up-thumb">Close</a></div>
                    </div>
                    <div class="clr"></div>               
                    <div class="other-design" style="display:none;">
                    	<div class="list-sub-lft-other">
                        	<p>Suspendisse vestibulum erat vel quam pretium ultricies. Vivamus quis tortor massa, at
aliquam purus. Quisque viverra viverra nibh, sed luctus ligula tempor eu. Ut eu magna id nibh
adipiscing hendrerit. Maecenas tincidunt, sem at ornare hendrerit, neque quam varius nulla,
vulputate egestas nisi arcu vitae justo. Curabitur euismod aliquam magna ut iaculis. Donec
libero dolor, ultricies eget dictum id, sollicitudin et orci. Integer eget magna vel purus
fermentum dapibus in eu neque. Nam nec enim odio.</p>
<p>Curabitur eget laoreet eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
posuere cubilia Curae; Quisque condimentum commodo varius. Cras quis tellus vitae massa
iaculis luctus. Suspendisse ac cursus est. Maecenas sed suscipit elit. Donec tincidunt libero
ut leo aliquam porttitor. Donec et nibh a diam egestas congue.</p>
                        </div>
                        <div class="list-sub-rht-other">
                        	<p><strong>Submitted by XXX (name, username?) on July 21st<br />
                        2011 via Life Impact platform</strong><br /><br /><strong>SHARE</strong><br />
                        <div class="social-network"><a href="#"><img src="/images/face-book.png" alt="facebook" /></a></div> 
                        <div class="social-network"><a href="#"><img src="/images/twitter.png" alt="facebook" /></a></div> 
                        <div class="social-network"><a href="#"><img src="/images/like.png" alt="facebook" /></a></div> 
                        </p>
                        <div class="clr"></div>
            			<div class="close-btn"><a href="#" id="slick-up-thumb">Close</a></div>
                        </div>
                    </div>
                	<div class="clr"></div>
                </div>
            <div class="clr"></div>
            </div>
             <div class="clr"></div>
            <div class="product-teaser">
                <a href="#"  style="outline:none;"><img src="/images/thumb9.jpg" width="160" height="160" /><div class="teaser-info" style="text-decoration:none;"></div></a>            </div>
            
            <div class="product-teaser">
                <a href="#"  style="outline:none;"><img src="/images/thumb2.jpg" width="160" height="160" /><div class="teaser-info" style="text-decoration:none;"></div></a>            </div>
            
            <div class="product-teaser">
                <a href="#"  style="outline:none;"><img src="/images/thumb1.jpg" width="160" height="160" /><div class="teaser-info" style="text-decoration:none;"></div></a>            </div>
            
            <div class="product-teaser">
                <a href="#"  style="outline:none;"><img src="/images/thumb2.jpg" width="160" height="160" /><div class="teaser-info" style="text-decoration:none;"></div></a>            </div>
            
            <div class="product-teaser">
                <a href="#"  style="outline:none;"><img src="/images/thumb3.jpg" width="160" height="160" /><div class="teaser-info" style="text-decoration:none;"></div></a>            </div>
            
            <div class="product-teaser">
                <a href="#"  style="outline:none;"><img src="/images/thumb4.jpg" width="160" height="160" /><div class="teaser-info" style="text-decoration:none;"></div></a>            </div>
            
            <div class="product-teaser">
                <a href="#"  style="outline:none;"><img src="/images/thumb2.jpg" width="160" height="160" /><div class="teaser-info" style="text-decoration:none;"></div></a>            </div>
            
            <div class="product-teaser">
                <a href="#"  style="outline:none;"><img src="/images/thumb5.jpg" width="160" height="160" /><div class="teaser-info" style="text-decoration:none;"></div></a>            </div>
            
            <div class="product-teaser">
                <a href="#"  style="outline:none;"><img src="/images/thumb2.jpg" width="160" height="160" /><div class="teaser-info" style="text-decoration:none;"></div></a>            </div>
            
            <div class="product-teaser">
                <a href="#"  style="outline:none;"><img src="/images/thumb6.jpg" width="160" height="160" /><div class="teaser-info" style="text-decoration:none;"></div></a>            </div>
            
            <div class="product-teaser">
                <a href="#"  style="outline:none;"><img src="/images/thumb7.jpg" width="160" height="160" /><div class="teaser-info" style="text-decoration:none;"></div></a>            </div>
          
            <div class="product-teaser">
                <a href="#"  style="outline:none;"><img src="/images/thumb7.jpg" width="160" height="160" /><div class="teaser-info" style="text-decoration:none;"></div></a>            </div>
                
            <div class="product-teaser">
                <a href="#"  style="outline:none;"><img src="/images/thumb9.jpg" width="160" height="160" /><div class="teaser-info" style="text-decoration:none;"></div></a>            </div>
            
            <div class="product-teaser">
                <a href="#"  style="outline:none;"><img src="/images/thumb2.jpg" width="160" height="160" /><div class="teaser-info" style="text-decoration:none;"></div></a>            </div>
            
            <div class="product-teaser">
                <a href="#"  style="outline:none;"><img src="/images/thumb1.jpg" width="160" height="160" /><div class="teaser-info" style="text-decoration:none;"></div></a>            </div>
            
            <div class="product-teaser">
                <a href="#"  style="outline:none;"><img src="/images/thumb2.jpg" width="160" height="160" /><div class="teaser-info" style="text-decoration:none;"></div></a>            </div>
            
            <div class="product-teaser">
                <a href="#"  style="outline:none;"><img src="/images/thumb3.jpg" width="160" height="160" /><div class="teaser-info" style="text-decoration:none;"></div></a>            </div>
            
            <div class="product-teaser">
                <a href="#"  style="outline:none;"><img src="/images/thumb4.jpg" width="160" height="160" /><div class="teaser-info" style="text-decoration:none;"></div></a>            </div>
                
            <div class="product-teaser">
                <a href="#"  style="outline:none;"><img src="/images/thumb2.jpg" width="160" height="160" /><div class="teaser-info" style="text-decoration:none;"></div></a>            </div>
            
            <div class="product-teaser">
                <a href="#"  style="outline:none;"><img src="/images/thumb5.jpg" width="160" height="160" /><div class="teaser-info" style="text-decoration:none;"></div></a>            </div>
            
            <div class="product-teaser">
                <a href="#"  style="outline:none;"><img src="/images/thumb2.jpg" width="160" height="160" /><div class="teaser-info" style="text-decoration:none;"></div></a>            </div>
            
            <div class="product-teaser">
                <a href="#"  style="outline:none;"><img src="/images/thumb6.jpg" width="160" height="160" /><div class="teaser-info" style="text-decoration:none;"></div></a>            </div>
            
            <div class="product-teaser">
                <a href="#"  style="outline:none;"><img src="/images/thumb7.jpg" width="160" height="160" /><div class="teaser-info" style="text-decoration:none;"></div></a>            </div>
          
            <div class="product-teaser">
                <a href="#"  style="outline:none;"><img src="/images/thumb7.jpg" width="160" height="160" /><div class="teaser-info" style="text-decoration:none;"></div></a>            </div>
                <div class="clr"></div>-->
        </div>
        
    <div class="clr"></div>
  	</div>
  <div class="clr"></div>
    <div class="footer">
        <div class="left">
        	<div class="social-network"><a href="#"><img src="/images/face-book.png" alt="facebook" /></a></div> 
			<div class="social-network"><a href="#"><img src="/images/twitter.png" alt="facebook" /></a></div> 
            <div class="social-network"><a href="#"><img src="/images/like.png" alt="facebook" /></a></div> 
        </div>
		<div class="footer-rht">
        	<span><a href="#">University of Adelaide</a></span><label>|</label>
            <span><a href="#">CRICOS #</a></span><label>|</label>
            <span><a href="#">Terms &amp; Conditions</a></span><label>|</label>
            <span><a href="#">Privacy Policy</a></span>
        </div>
        <div class="clr"></div>
    </div>
<div class="clr"></div>
</div>

