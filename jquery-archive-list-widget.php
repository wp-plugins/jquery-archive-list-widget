<?php
/*
 Plugin Name: jQuery Archive List Widget
 Plugin URI: http://skatox.com/blog/2009/12/26/jquery-archive-list-widget/
 Description: A simple jQuery widget for displaying an archive list with some effects (inspired by Collapsible Archive Widget)
 Author: Miguel Useche
 Version: 0.1.2
 Author URI: http://skatox.com/

    Copyright 2009  Miguel Useche  (email : migueluseche@skatox.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

function aux_get_years(){
	global $wpdb;

	$years = $wpdb->get_results("SELECT DISTINCT YEAR(post_date) AS `year`, count(ID) as posts"
	." FROM $wpdb->posts WHERE $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type = 'post'"
	." GROUP BY YEAR(post_date) ORDER BY post_date DESC");

	return $years;
}

function aux_get_months($year){
	global $wpdb;

	$months = $wpdb->get_results("SELECT DISTINCT YEAR(post_date) AS `year`, MONTH(post_date) AS `month`, count(ID) as posts"
	." FROM $wpdb->posts WHERE $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type = 'post' AND YEAR(post_date) = {$year}"
	." GROUP BY YEAR(post_date), MONTH(post_date) ORDER BY post_date DESC");

	return $months;
}

function aux_get_posts($year,$month){
	global $wpdb;

	if (empty($year) || empty($month)) return null;

   	$posts = $wpdb->get_results("SELECT ID, post_title, post_name FROM $wpdb->posts WHERE $wpdb->posts.post_status = 'publish' "
	." AND $wpdb->posts.post_type = 'post' AND YEAR(post_date) = {$year} AND MONTH(post_date) = {$month} ORDER BY post_date DESC");

	return $posts;
}

function aux_print_js_code($ex_sym, $con_sym,$effect_in,$effect_out,$showpost=false){
	echo "<script type=\"text/javascript\">\n\t";
	echo "jQuery(document).ready(function() {\n\t\t";
	echo "jQuery('.jaw_months').hide();\n\t\t";
	echo "jQuery('p.jaw_years').bind(\"click\", function(){\n\t\t\t";
	echo "jQuery('.jaw_months').{$effect_out}('fast');\n\t\t\t";
	echo "jQuery('.jaw_symbol').html('{$ex_sym}');\n\t\t\t";
	echo "if(jQuery(this).parent().find('.jaw_months').is(':hidden')){\n\t\t\t\t";
	echo "jQuery(this).parent().find('.jaw_symbol').html('{$effect_in}');\n\t\t\t\t";
    echo "jQuery(this).parent().find('.jaw_months').{$effect_in}('fast');\n\t\t\t\t";
	echo "}\n\t\t\telse{\n\t\t\t\t";
  	echo "jQuery(this).parent().find('.jaw_months').{$effect_out}('fast');\n\t\t\t";
	echo "}\n\t\t";
	echo "});\n\t";
	//Javascript code for expanding or hiding posts entries
	if($showpost){ 
		echo "jQuery('li.jaw_months').bind(\"click\", function(){\n\t\t\t";
		echo "jQuery('.jaw_posts').{$effect_out}('normal');\n\t\t\t";
		echo "jQuery('.jaw_symbol').html('{$ex_sym}');\n\t\t\t";
		echo "if(jQuery(this).find('.jaw_posts').is(':hidden')){\n\t\t\t\t";
        echo "jQuery(this).find('.jaw_posts').{$effect_in}('normal');\n\t\t\t\t";
		echo "jQuery(this).find('.jaw_symbol').html('{$con_sym}');\n\t\t\t";
		echo "}\n\t\t\telse{\n\t\t\t\t";
  		echo "jQuery(this).find('.jaw_posts').{$effect_out}('normal');\n\t\t\t";
		echo "}\n\t\t";
		echo "});\n\t";
	}
	echo "\n});\n";
	echo '</script>';
}


function widget_display_jquery_archives_control(){	
	$options = get_option('jquery_archive_list_widget');

	//If submit button was pressed the variables are loaded by POST
	if ($_POST['jquery_archives_widget_submit']){	
		$options['title'] = stripslashes($_POST['jquery_archives_widget_title']);
		$options['symbol'] = $_POST['jquery_archives_widget_symbol'];
		$options['effect'] = stripslashes($_POST['jquery_archives_widget_effect']);
		
		if (isset($_POST['jquery_archives_widget_showpost']))
			$options['showpost'] = true; 
		else 
			$options['showpost'] = false;

		if (isset($_POST['jquery_archives_widget_showcount'])) 
			$options['showcount'] = true; 
		else 
			$options['showcount'] = false;
	}
	//Update options in the Wordpress database
	update_option('jquery_archive_list_widget', $options);	
?>          
    <dl>
        <dt><strong>Title</strong></dt>
        <dd>
            <input name="jquery_archives_widget_title" type="text" value="<?php echo $options['title']; ?>" />
        </dd>
        <dt><strong>Trigger Symbol</strong></dt>
        <dd>
            <input id="jquery_archives_widget_symbol_0" name="jquery_archives_widget_symbol" type="radio" value="0" <?php if($options['symbol']=='0')  echo 'checked="checked"' ?> />
	    <label for="jquery_archives_widget_symbol_0" />► ▼</label>
        </dd>
	<dd>
            <input id="jquery_archives_widget_symbol_1" name="jquery_archives_widget_symbol" type="radio" value="1" <?php if($options['symbol']=='1') echo 'checked="checked"' ?> />
	    <label for="jquery_archives_widget_symbol_1" />+ -</label>
        </dd>
	<dd>
            <input id="jquery_archives_widget_symbol_2" name="jquery_archives_widget_symbol" type="radio" value="2" <?php if($options['symbol']=='2') echo 'checked="checked"' ?> />
	    <label for="jquery_archives_widget_symbol_2" />[+] [-]</label>
        </dd>
      <dt><strong>jQuery Effect</strong></dt>
        <dd>
            <select id="jquery_archives_widget_effect" name="jquery_archives_widget_effect">
		  <option value="slide"  <?php if($options['effect']=='slide')  echo 'selected="selected"' ?> >slideUp/slideDown</option>
		  <option value="fade" <?php if($options['effect']=='fade')  echo 'selected="selected"' ?> >fadeIn/fadeOut</option>
	    </select>
        </dd>
      <dt><strong>Extra options</strong></dt>
        <dd>
            <input id="jquery_archives_widget_showcount" name="jquery_archives_widget_showcount" type="checkbox" <?php if($options['showcount'] ) echo 'checked="checked"' ?> />
	    <label for="jquery_archives_widget_showcount" />Show number of posts</label>
	</dd>
	<dd>
	    <input id="jquery_archives_widget_showpost" name="jquery_archives_widget_showpost" type="checkbox" <?php if($options['showpost'] )  echo 'checked="checked"' ?> />
	    <label for="jquery_archives_widget_showpost" />Show posts under months</label>
        </dd>
    </dl> 
    <input type="hidden" name="jquery_archives_widget_submit" value="1" />
<?php
}

function widget_display_jQuery_archives($args) {
	
	extract($args);
	global $wp_locale;

	//Loads jQuery library
	if (function_exists('wp_enqueue_script') && !is_admin()) 
		wp_enqueue_script('jquery');
	

	//Loads options
	$options = get_option('jquery_archive_list_widget');
	$years = aux_get_years();		
	$ex_sym="";$con_sym="";
	$showpost=false;

	if($options['showpost']=='true') 
		$showpost=true;

	switch ($options['symbol']){
		case '0': $ex_sym='►';$con_sym='▼';break;
		case '1': $ex_sym='+';$con_sym='-';break;
		case '2': $ex_sym='[+]';$con_sym='[-]';break;
	}

	switch ($options['effect']){
		case 'slide': $effect_in='slideDown';$effect_out='slideUp';break;
		case 'fade': $effect_in='fadeIn';$effect_out='fadeOut';break;
	}

	//Prints widget title
	echo $before_widget;
	echo $before_title;
	echo $options['title'];
	echo $after_title;

	echo '<ul>';
	//Prints Years
	for ($i=0;$x<count($years[$i]);$i++){
		echo "\n<li ><p class=\"jaw_years\"><a href=\"#nolink\"><span class=\"jaw_symbol\">{$ex_sym}&nbsp;</span>{$years[$i]->year}";
	
		//Prints number of post_date	
		if($options['showcount']=='true') 
				echo " ({$years[$i]->posts})";
		
		echo '</a></p><ul>';
		$months = aux_get_months($years[$i]->year);
		
		//Prints Months
		foreach ($months as $month){
			
			if($showpost) 
				$month_url ='#nolink';
			else 
				$month_url = get_month_link($years[$i]->year, $month->month);

			echo "\n\t<li class=\"jaw_months\" style=\"display:none;\"><p><a href=\"{$month_url}\">";
			if($options['showpost']=='true') echo "<span class=\"jaw_symbol\">{$ex_sym}&nbsp;</span>";
			echo $wp_locale->get_month($month->month);
			if($options['showcount']=='true') echo " ({$month->posts})";
			echo '</a></p>'; 
		      
			if($showpost){
				echo '<ul>';
				$posts=aux_get_posts($years[$i]->year, $month->month);
				foreach ($posts as $post){
					echo "\n\t\t";
					echo '<li class="jaw_posts" style="display:none;"><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></li>';
				}
				echo '</ul>';
			}			
			
			echo '</li>';
		}
		echo '</ul></li>';
	}
	echo '</ul>';
	
	//Prints javascript code (expand symbol, contraction symbol, jquery effect for entrace, jquery effect for output, flag for show post)
	aux_print_js_code($ex_sym,$con_sym,$effect_in, $effect_out,$showpost);
	echo $after_widget;
}

function widget_display_jQuery_archives_init(){
	register_sidebar_widget(__('jQuery Archive List Widget'), 'widget_display_jQuery_archives');
	register_widget_control(__('jQuery Archive List Widget'),'widget_display_jQuery_archives_control');
}

add_action("plugins_loaded", "widget_display_jQuery_archives_init");
