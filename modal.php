<?php
/*
// ADD  CSS AND JS
*/
 
function ad_add_izimodal_files() {
  wp_enqueue_style( 'modal', 'https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.4.1/css/iziModal.min.css', array(), '1.4.1', 'all');
  wp_enqueue_script( 'modal', 'https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.4.1/js/iziModal.min.js', array ('jquery'), false);
}
 
add_action( 'wp_enqueue_scripts', 'ad_add_modal_files' );
 
 
/*
/// ADD  CSS AND JS + FONTAWESOME
*/
 
/*
// HELPER TO ADD EACH MODAL JQUERY SCRIPT ON THE HEADER
*/
 
 
function ad_modal_builder($atts, $content) {
 
  extract(shortcode_atts(array(
  	'id' => $id,
    'label' => $label,
    'title' => $title,
    'subtitle' => $subtitle,
    'icon' => $icon,
    'color' => $color,
    'padding' => $padding,
    'width' => $width,
    'attached' => $attached,
    'timeout' => $timeout,
    'timeoutProgressbar' => $timeoutProgressbar,
    'url' => $url
  ) , $atts));
 
  $html = '';
  $data_title = ' ';
  $data_subtitle = ' ';
  $data_color = ' ';
  $data_icon = ' ';
  $hrefiframe = '';
  $classsuffixiframe = '';
 
  if($title) {
  	$data_title .= 'data-iziModal-title="' . $title . '"';
  }
 
  if($subtitle) {
  	$data_subtitle .= 'data-iziModal-subtitle="' . $subtitle . '"';
  }
 
  if($icon) {
  	$data_icon .= 'data-iziModal-icon="' . $icon . '"';
  }
 
  if(!$color) {
  	$color = "#444444";
  }
  
  if(!$padding) {
  	$padding = 0;
  }
 
  if(!$width) {
    $width = 500;
  }
 
  if(!$timeout){
  	$timeout = 0;
  }
 
  if($timeoutProgressbar = '1') {
  	$timeoutProgressbar = 'true';
  }
 
  if($url){
  	$iframe = 'true';
  	$hrefiframe = 'href="'.$url.'"';
  	$classsuffixiframe = '-iframe';
  	$openTarget = 'event';
  } else {
  	$iframe = 'false';
  	$openTarget = 'this';
  }
  
  $html .= "<a class='trigger".$classsuffixiframe." ".$id."' ".$hrefiframe.">" . $label . "</a>";
  $html .= '<div id="'.$id.'" class="iziModal '.$id.'" '. $data_title . $data_subtitle . $data_icon .'>';
  $html .= $content;
  $html .= '</div>';
 
  $modal_script = "
  <script>
	jQuery(document).ready(function($){
		$('#".$id."').iziModal({
			headerColor: '".$color."',
			padding: ".$padding.",
			width: ".$width.",
			attached: '".$attached."',
			timeout: ".$timeout.",
			timeoutProgressbar: ".$timeoutProgressbar.",
			iframe : ".$iframe.",
    		iframeURL: '".$url."'
		});
		$(document).on('click', '.".$id."', function (event) {
		    event.preventDefault();
		    jQuery('#".$id."').iziModal('open', ".$openTarget.");
		});
	});
  </script>
 
  ";
  
  $html .= $Modal_script;
  
  return $html;
 
}
 
add_shortcode('modal', 'ad_modal_builder');
 
/*
/// HELPER TO ADD EACH MODAL JQUERY SCRIPT ON THE HEADER
*/
 
/*
// A QUICK STYLE TO GET YOU STARTED
*/
 
function ad_dirty_style() {
	$style = "
	<style>
      a.trigger, a.trigger-iframe {
		  display: block;
		  padding: 25px;
		  margin: 5px auto;
		  background: #f04903;
		  font-size: 20px;
		  text-align: center;
      	  text-transform: uppercase;
		  text-decoration: none;
		  color: white;
		  border: 1px solid #f15000;
		  border-radius: 3px;
		  overflow: hidden;
		  transition: all .15s ease-in-out;
      	  cursor: pointer;
      }
 
      a.trigger:hover, a.trigger-iframe:hover {
      	  text-decoration: none;
      	  transition: all .1s ease-in-out;
      }
 
      a.trigger:after, a.trigger-iframe:after {
      	  content: ''!important;
      }
 
      #test-1 .iziModal-content {
        text-align: center;
      }
 
      #test-1 .iziModal-content a:hover {
        text-decoration: none;
      }
 
	.iziModal .iziModal-iframe {
        display: block;
        border: 0px;
        margin: 0px;
      }
	</style>
	";
 
	echo $style;
}
 
add_action('wp_head', 'ad_dirty_style');
 
/*
/// A QUICK STYLE TO GET YOU STARTED
*/
 
/*
// USAGE 
  
Parameters list: 
 
id: provides a unique ID to each box (string, mandatory)
label: link label (text)
title: part of the modal box header (text)
subtitle: part of the modal box header (text)
icon: part of the modal box header (text, should be the classes to show icons - ex: fa fa-star)
color: color used on the modal box header (text, hex structure)
padding: controls the content section padding (integral, without the px)
width: controls the modal box width (integral, without the px)
attached: controls the modal box position (default center - takes: top, bottom)
timeout: controls the modal box showing time (integral)
timeoutProgressbar: controls if the modal will show the progress bar (default 0 - takes: 1)
 
 
*/
