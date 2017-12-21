<?php
/*
Plugin Name: Simple Meta Tags
Description: Allows you to set global meta tags and customize on each individual page/post.
Version: 1.2.7
Author: Hotscot

Copyright 2011 Hotscot  (email : support@hotscot.net)

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
if (!class_exists("sc_simple_meta_tags")) {
	class sc_simple_meta_tags{
		//the constructor that initializes the class
		function sc_simple_meta_tags() {
		}
		
		function sc_save_wonderful_metas($post_id) {
			// verify if this is an auto save routine. If it is our form has not been submitted, so we dont want
			// to do anything
			if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
			//stop values submitting if this is a "quick edit"
			if(!isset($_POST['scmesbmt'])) return $post_id;
			
            $scmTitle = isset($_POST['scmetatitle']) ? $_POST['scmetatitle'] : '';
            $scmDesc = isset($_POST['scmetadescription']) ? $_POST['scmetadescription'] : '';
            $scmKey = isset($_POST['scmetakeywords']) ? $_POST['scmetakeywords'] : '';
			add_post_meta($post_id, '_sc_m_title', $scmTitle, true) or update_post_meta($post_id, '_sc_m_title', $scmTitle);
			add_post_meta($post_id, '_sc_m_description', $scmDesc, true) or update_post_meta($post_id, '_sc_m_description', $scmDesc);
			add_post_meta($post_id, '_sc_m_keywords', $scmKey, true) or update_post_meta($post_id, '_sc_m_keywords', $scmKey);
		}
		
		function sc_show_on_website(){
			global $post;
			if(!is_404()){
				$isImplemeted = false;
				$meta_title = "";
				$meta_description = "";
				$meta_keywords = "";
				
				if(is_page()||is_home()){
					if(get_option('use_pages_meta_data')=='on'){
						$isImplemeted = true;
						$meta_title = (get_post_meta($post->ID, '_sc_m_title', true)!='') ? get_post_meta($post->ID, '_sc_m_title', true) : get_option('page_meta_title');
						$meta_description = (get_post_meta($post->ID, '_sc_m_description', true)!='') ? get_post_meta($post->ID, '_sc_m_description', true) : get_option('page_meta_description');
						$meta_keywords = (get_post_meta($post->ID, '_sc_m_keywords', true)!='') ? get_post_meta($post->ID, '_sc_m_keywords', true) : get_option('page_meta_keywords');
					}
				}
				
				if(is_single()){
					if(get_option('use_posts_meta_data')=='on'){
						$isImplemeted = true;
						$meta_title = (get_post_meta($post->ID, '_sc_m_title', true)!='') ? get_post_meta($post->ID, '_sc_m_title', true) : get_option('post_meta_title');
						$meta_description = (get_post_meta($post->ID, '_sc_m_description', true)!='') ? get_post_meta($post->ID, '_sc_m_description', true) : get_option('post_meta_description');
						$meta_keywords = (get_post_meta($post->ID, '_sc_m_keywords', true)!='') ? get_post_meta($post->ID, '_sc_m_keywords', true) : get_option('post_meta_keywords');
					}
				}

				if($isImplemeted){
					if($meta_title!=''){
						echo '<title>' . htmlentities(stripslashes($meta_title),ENT_COMPAT,"UTF-8") . '</title>' . "\n";
					}else{
						echo '<title>'. (get_bloginfo('name','display') . wp_title(' | ',false)) .'</title>';
					}
					echo '<meta name="description" content="'. htmlentities(stripslashes($meta_description),ENT_COMPAT,"UTF-8") .'" />' . "\n";
					echo '<meta name="keywords" content="'. htmlentities(stripslashes($meta_keywords),ENT_COMPAT,"UTF-8") .'" />' . "\n";
				}else{
					echo '<title>'. (get_bloginfo('name','display') . wp_title(' | ',false)) .'</title>';
				}
			}
		}	
	}
	
	//initialize the class to a variable
	$sc_meta_var = new sc_simple_meta_tags();
	
	function sc_create_wonder_form(){
		global $post;
		?>
		<input type="hidden" id="scmesbmt" name="scmesbmt" value="1" />
		<b>Meta Title</b><br />
		<input type="text" id="scmetatitle" name="scmetatitle" style="width: 100%" value="<?php echo get_post_meta($post->ID, '_sc_m_title', true); ?>" />
		<br /><br />
		
		<b>Meta Description</b><br />
		<input type="text" id="scmetadescription" name="scmetadescription" style="width: 100%" value="<?php echo get_post_meta($post->ID, '_sc_m_description', true); ?>" /><br /><br />
		
		<b>Meta Keywords</b><br />
		<input type="text" id="scmetakeywords" name="scmetakeywords" style="width: 100%" value="<?php echo get_post_meta($post->ID, '_sc_m_keywords', true); ?>" /><br /><br />
		<?php
	}
	
	//Actions and Filters	
	if (isset($sc_meta_var)) {
		//Actions
		add_action("save_post",array(&$sc_meta_var,'sc_save_wonderful_metas'));
		add_action("wp_head",array(&$sc_meta_var,'sc_show_on_website'));
		add_action('admin_init', 'register_default_meta_settings' );
		add_action('admin_menu', 'sc_add_wonder_box');
		
		function sc_add_wonder_box() {			
			add_options_page('Meta tag defaults', 'Meta Tags', 'manage_options', 'meta_tags', 'display_tag_options');	
			
		    if( function_exists( 'add_meta_box' )) {
				add_meta_box( 'MetaTagsPlugin', 'Simple Meta Tags', 'sc_create_wonder_form', 'page', 'advanced', 'high' );
				add_meta_box( 'MetaTagsPlugin', 'Simple Meta Tags', 'sc_create_wonder_form', 'post', 'advanced', 'high' );
		    }else{
				add_action('dbx_post_advanced', 'sc_create_wonder_form' );
				add_action('dbx_page_advanced', 'sc_create_wonder_form' );
		    }
		}
	}
	
	/**
	 * register_default_meta_settings
	 *
	 * Is run when the plugin is first installed.  It adds options into the
	 * wp-options 
	 */
	function register_default_meta_settings()
	{
		register_setting( 'meta-tag-settings', 'page_meta_title' );		
		register_setting( 'meta-tag-settings', 'page_meta_keywords' );		
		register_setting( 'meta-tag-settings', 'page_meta_description' );
		
		register_setting( 'meta-tag-settings', 'post_meta_title' );		
		register_setting( 'meta-tag-settings', 'post_meta_keywords' );		
		register_setting( 'meta-tag-settings', 'post_meta_description' );
		
		register_setting( 'meta-tag-settings', 'use_pages_meta_data' );		
		register_setting( 'meta-tag-settings', 'use_posts_meta_data' );

			
		if(get_option('meta_title')!=''){
			update_option('page_meta_title',get_option('meta_title'));
			update_option('post_meta_title',get_option('meta_title'));
			update_option('meta_title','');
		}
		if(get_option('meta_description')!=''){
			update_option('page_meta_description',get_option('meta_description'));
			update_option('post_meta_description',get_option('meta_description'));
			update_option('meta_description','');
		}
		if(get_option('meta_keywords')!=''){
			update_option('page_meta_keywords',get_option('meta_keywords'));
			update_option('post_meta_keywords',get_option('meta_keywords'));
			update_option('meta_keywords','');
		}
	}
	
	
	/**
	 * display_tag_options()
	 *
	 * Paints the tag_options page
	 */	 
	function display_tag_options()
	{
		?>
		<div class="wrap">
		<h2>Simple Meta Tag Options</h2>
		<p>Default meta values, pick below default values for meta tags of Pages and Posts, if you leave the Title empty it will use the Blog name and the WordPress Title...</p>
		<form method="post" action="options.php">
			<?php settings_fields( 'meta-tag-settings' ); ?>
			<table>
				<tr valign="top"><td colspan="2"><h2>Pages</h2></td></tr>
				<tr valign="top">
					<td colspan="2"><input type="checkbox" name="use_pages_meta_data" id="use_pages_meta_data" <?php if(get_option("use_pages_meta_data") == "on"){echo 'checked="checked"';} ?> /> Tick box to use this plugin on Pages</td>
				</tr>
				<tr valign="top">
					<td scope="row">Title</td>
					<td><input size="50" type="text" name="page_meta_title" value="<?php echo get_option('page_meta_title'); ?>" /></td>
				</tr>
				
				<tr valign="top">
					<td scope="row">Keywords</td>
					<td><input size="50" type="text" name="page_meta_keywords" value="<?php echo get_option('page_meta_keywords'); ?>" /></td>
				</tr>
				 
				<tr valign="top">
					<td scope="row">Description</td>
					<td><input size="50" type="text" name="page_meta_description" value="<?php echo get_option('page_meta_description'); ?>" /></td>
				</tr>
				
				<tr valign="top"><td colspan="2"><h2>Posts</h2></td></tr>
				<tr valign="top">
					<td colspan="2"><input type="checkbox" name="use_posts_meta_data" id="use_posts_meta_data" <?php if(get_option("use_posts_meta_data") == "on"){echo 'checked="checked"';} ?> /> Tick box to use plugin on Posts</td>
				</tr>
				<tr valign="top">
					<td scope="row">Title</td>
					<td><input size="50" type="text" name="post_meta_title" value="<?php echo get_option('post_meta_title'); ?>" /></td>
				</tr>
				
				<tr valign="top">
					<td scope="row">Keywords</td>
					<td><input size="50" type="text" name="post_meta_keywords" value="<?php echo get_option('post_meta_keywords'); ?>" /></td>
				</tr>
				 
				<tr valign="top">
					<td scope="row">Description</td>
					<td><input size="50" type="text" name="post_meta_description" value="<?php echo get_option('post_meta_description'); ?>" /></td>
				</tr>				
			</table>
			
			<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
			</p>
		</form>
		</div>		
<?php }
}
?>