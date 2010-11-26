<?php
	$ex_sym = rawurldecode($_GET['ex_sym']);
	$con_sym= rawurldecode($_GET['con_sym']);
	$fx_in= $_GET['fx_in'];
	$fx_out= $_GET['fx_out'];
	$showpost= $_GET['showpost'];
?>

function jquery_archive_list_animate(clicked_obj){
	if(jQuery(clicked_obj).parent().children('ul').children('li').is(':hidden')){
		jQuery(clicked_obj).parent().children('ul').children('li').<?php echo $fx_in ?>();
		jQuery(clicked_obj).parent().children('a').children('.jaw_symbol').html('<?php echo $con_sym ?>&nbsp;');
	}
	else
	{
		jQuery(clicked_obj).parent().children('a').children('.jaw_symbol').html('<?php echo $ex_sym ?>&nbsp;');
		jQuery(clicked_obj).parent().children('ul').children('li').<?php echo $fx_out ?>();
	}
	jQuery(clicked_obj).parent().toggleClass('expanded');
}

jQuery(document).ready(function() {
	jQuery('li.jaw_years a.jaw_years').bind('click', function(){
		jquery_archive_list_animate(this);
	});

	if(<?php echo $showpost ?>){
		jQuery('li.jaw_months a.jaw_months').bind('click', function(){
			jquery_archive_list_animate(this);
		});
	}
});