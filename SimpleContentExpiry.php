<?php
/*
Plugin Name: Simple Content Expiry
Plugin URI: http://www.sneakymedia.co.uk/SCE
Description: A simple plugin to add an expiry date to post / page content, using shortcodes. Some plugins allow adding an expiry date to entire posts, but this provides more flexibility.
Version: 1.12
Author: Patrick O'Neill
Author URI: http://www.sneakymedia.co.uk
License: GPL
*/
/*  Copyright 2011  P ONeill  (email : enquiries@sneakymedia.co.uk)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

add_shortcode('expire','expire_text');
function expire_text($paras="",$content="") {
   extract(shortcode_atts(array('date'=>''),$paras));
   if ( ($date!="")&&(date("Ymd")>$date) ) {$content="";}
   return $content;
}

add_action('admin_menu', 'create_theme_options_page');
function create_theme_options_page() {
  add_options_page('Simple Content Expiry', 'Simple Content Expiry', 'administrator', __FILE__, 'build_options_page');
}

function build_options_page() {
?>
  <div id="sce-wrap">
    <div class="icon32" id="icon-tools"> <br /> </div>
    <h2>Simple Content Expiry Plugin</h2></br>
	<p><a class="button-secondary" href="http://www.sneakymedia.co.uk/sce/" title="Simple Content Expiry">Visit the plugin homepage</a>   |   <a class="button-secondary" href="mailto:enquiries@sneakymedia.co.uk" title="Contact the Author">Contact the Author</a></p></br></br>
    <p>Some plugins allow you to add an expiry date to entire posts, but this plugin allows more freedom.</p>

<p>This plugin is extremely simple to use; once it is activated you can surround your content with the following shortcode, replacing <strong>YYYYMMDD</strong> with the date you want the content to expire.</p>
</br>
<strong><code>[expire date="yyyymmdd"] [/expire]</code></strong>
</br>
<p>Example of usage:</p>
<p><code>[expire date="20120101"]This content will disapear on 01/01/2012![/expire]</code></p>
    
  </div>
<?php
}
?>