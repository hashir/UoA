var clickedThumbId = '';
var currentExpandedDivId    = '';
function boxClick(anchorElt)
{
	showData(anchorElt);
}
function showData(anchorElt)
{
	var thisId = jQuery(anchorElt).attr('id');
	//alert(thisId);
	if(thisId == clickedThumbId)
	{
		hideAllDetails();
		resumeScroll();
		clickedThumbId = null;
		jQuery(anchorElt).removeClass('active');
		return;
	}
	else
	{
		clickedThumbId = thisId;
		jQuery("a.active").removeClass('active');
		jQuery(anchorElt).addClass('active');
	}
	if(jQuery(anchorElt).attr('rel') == "form")
	{
		hideAllDetails();
		showForm();
		return ;
	}
	var targetDivId   = jQuery(anchorElt.parentNode.parentNode).attr('id');
	var targetDiv = jQuery("#slickbox-thumb-" + targetDivId.replace('carousel_',''));
	if(targetDivId == currentExpandedDivId)
	{
		targetDiv.slideUp('slow',function(){
			showContainer(targetDivId,targetDiv,thisId);
		});
	}
	else
	{
		showContainer(targetDivId,targetDiv,thisId);
	}
}
function showForm()
{
	stopAnimationScroll();
        hideAllDetails();
	jQuery("#slickbox").slideDown('slow');
}
function hideForm()
{
	resumeScroll();
	jQuery("a.active").removeClass('active');
	jQuery("#slickbox").slideUp('slow');
}
function toggleForm()
{
	if(jQuery("#slickbox").css('display') == "none")
	{
		showForm();
	}
	else
	{
		hideForm();
	}
}
function showContainer(targetDivId,targetDiv,storyId)
{
	if(targetDiv.css('display') == "none")
	{
                fillData(storyId,targetDiv);
                setTimeout("applyFlexScroll('flexcroll')",80);
		stopAnimationScroll();
		hideAllDetails();
		currentExpandedDivId = targetDivId;
		targetDiv.slideDown('slow');
		targetDiv.focus();
	}
	else
	{
		resumeScroll();
		currentExpandedDivId = null;
		targetDiv.slideUp('slow');
	}
}
function hideAllDetails()
{
	stopAnimationScroll();
	jQuery(".list-sub").slideUp('slow');
	jQuery("#slickbox").slideUp('slow');
}
function applyFlexScroll(id)
{
	fleXenv.initByClass(id);
}
function fillData(storyId,targetDiv)
{
    var storyId = storyId.replace("box_","");
    targetDiv.find(".story-container").html(jQuery("#story_" + storyId).html());
    targetDiv.find(".list-sub-lft").first().find("img").attr('src',"/uploads/" + jQuery("#image_" + storyId).html());
    targetDiv.find(".uploaded_by").html(jQuery("#name_" + storyId).html());
    targetDiv.find(".uploaded_date").html(jQuery("#date_" + storyId).html());
}