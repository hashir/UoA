var carousal = null;
var i = 0;
var currentCarousalId = '';
var nextCarousalId = '';
var flipTime = 5000;
var stopScroll = false;
var timer = null;
function stopAnimationScroll()
{
	stopScroll = true;
	clearTimeout(timer);
}
function resumeScroll()
{
	if(stopScroll==true)
	{
                stopScroll = false;
		timer = setTimeout('startScroll()',flipTime);
	}
}
function startScroll()
{
	carousal = jQuery(".carousel");
	if(carousal.length>0)
	{
		var lastCarousalLastItemHtml = carousal.last().find('.product-teaser').last().html();
		jQuery('<div class="product-teaser" style="display:none;">' + lastCarousalLastItemHtml + '</div>').insertBefore(jQuery(carousal[0]).find(".product-teaser").first());
		jQuery(carousal[0]).find(".product-teaser").first().find('a').click(function(){
			boxClick(this);
		});
		callMove();
	}
}
function callMove()
{
	if(stopScroll != true)
	{
		currentCarousalId = jQuery(carousal[i]).attr("id");
		if(i<carousal.length)
		{
			nextCarousalId = jQuery(carousal[i+1]).attr("id");
		}
		moveCarousel(currentCarousalId);
	}
}
function moveCarousel()
{
	jQuery("#" + currentCarousalId + " .product-teaser").first().show('slow',test);
}
function test()
{
	var lastItem = jQuery("#" + currentCarousalId + " .product-teaser").last().css('display','none');
	jQuery("#" + currentCarousalId + " .product-teaser").last().remove();
	i++;
	if(i<carousal.length)
	{
		lastItem.insertBefore(jQuery("#" + nextCarousalId + " .product-teaser").first());
		jQuery("#" + nextCarousalId + " .product-teaser").first().find('a').click(function(){
			boxClick(this);
		});
		callMove();
	}
	else
	{
		i=0;
		timer = setTimeout('startScroll()',flipTime);
	}
}
timer = setTimeout('startScroll()',flipTime);
