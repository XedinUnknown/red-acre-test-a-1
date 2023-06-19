<?php

/**
* WP_Theme Class
*
* @package WordPress
* @subpackage Theme
* @since 3.4.0
* @phpstan-type ThemeKey 'Name'|'Version'|'Status'|'Title'|'Author'|'Author Name'|'Author URI'|'Description'|'Template'|'Stylesheet'|'Template Files'|'Stylesheet Files'|'Template Dir'|'Stylesheet Dir'|'Screenshot'|'Tags'|'Theme Root'|'Theme Root URI'|'Parent Theme'
*/
class WP_Theme implements \ArrayAccess
{
/**
* Whether the theme has been marked as updateable.
*
* @since 4.4.0
* @var bool
*
* @see WP_MS_Themes_List_Table
*/
public $update = \false;
/**
* Constructor for WP_Theme.
*
* @since 3.4.0
*
* @global array $wp_theme_directories
*
* @param string        $theme_dir  Directory of the theme within the theme_root.
* @param string        $theme_root Theme root.
* @param WP_Theme|null $_child If this theme is a parent theme, the child may be passed for validation purposes.
*/
public function __construct($theme_dir, $theme_root, $_child = \null)
{
}
/**
* When converting the object to a string, the theme name is returned.
*
* @since 3.4.0
*
* @return string Theme name, ready for display (translated)
*/
public function __toString()
{
}
/**
* __isset() magic method for properties formerly returned by current_theme_info()
*
* @since 3.4.0
*
* @param string $offset Property to check if set.
* @return bool Whether the given property is set.
*/
public function __isset($offset)
{
}
/**
* __get() magic method for properties formerly returned by current_theme_info()
*
* @since 3.4.0
*
* @param string $offset Property to get.
* @return mixed Property value.
*/
public function __get($offset)
{
}
/**
* Method to implement ArrayAccess for keys formerly returned by get_themes()
*
* @since 3.4.0
*
* @param mixed $offset
* @param mixed $value
*/
#[\ReturnTypeWillChange]
public function offsetSet($offset, $value)
{
}
/**
* Method to implement ArrayAccess for keys formerly returned by get_themes()
*
* @since 3.4.0
*
* @param mixed $offset
*/
#[\ReturnTypeWillChange]
public function offsetUnset($offset)
{
}
/**
* Method to implement ArrayAccess for keys formerly returned by get_themes()
*
* @since 3.4.0
*
* @param mixed $offset
* @return bool
* @phpstan-return ($offset is ThemeKey ? true : false)
*/
#[\ReturnTypeWillChange]
public function offsetExists($offset)
{
}
/**
* Method to implement ArrayAccess for keys formerly returned by get_themes().
*
* Author, Author Name, Author URI, and Description did not previously return
* translated data. We are doing so now as it is safe to do. However, as
* Name and Title could have been used as the key for get_themes(), both remain
* untranslated for back compatibility. This means that ['Name'] is not ideal,
* and care should be taken to use `$theme::display( 'Name' )` to get a properly
* translated header.
*
* @since 3.4.0
*
* @param mixed $offset
* @return mixed
* @phpstan-return ($offset is ThemeKey ? mixed : null)
*/
#[\ReturnTypeWillChange]
public function offsetGet($offset)
{
}
/**
* Returns errors property.
*
* @since 3.4.0
*
* @return WP_Error|false WP_Error if there are errors, or false.
*/
public function errors()
{
}
/**
* Whether the theme exists.
*
* A theme with errors exists. A theme with the error of 'theme_not_found',
* meaning that the theme's directory was not found, does not exist.
*
* @since 3.4.0
*
* @return bool Whether the theme exists.
*/
public function exists()
{
}
/**
* Returns reference to the parent theme.
*
* @since 3.4.0
*
* @return WP_Theme|false Parent theme, or false if the current theme is not a child theme.
*/
public function parent()
{
}
/**
* Clears the cache for the theme.
*
* @since 3.4.0
*/
public function cache_delete()
{
}
/**
* Get a raw, unformatted theme header.
*
* The header is sanitized, but is not translated, and is not marked up for display.
* To get a theme header for display, use the display() method.
*
* Use the get_template() method, not the 'Template' header, for finding the template.
* The 'Template' header is only good for what was written in the style.css, while
* get_template() takes into account where WordPress actually located the theme and
* whether it is actually valid.
*
* @since 3.4.0
*
* @param string $header Theme header. Name, Description, Author, Version, ThemeURI, AuthorURI, Status, Tags.
* @return string|array|false String or array (for Tags header) on success, false on failure.
* @phpstan-return ($header is 'Name'|'ThemeURI'|'Description'|'Author'|'AuthorURI'|'Version'|'Template'|'Status'|'Tags'|'TextDomain'|'DomainPath'|'RequiresWP'|'RequiresPHP'|'UpdateURI' ? ($header is 'Tags' ? string[] : string) : false)
*/
public function get($header)
{
}
/**
* Gets a theme header, formatted and translated for display.
*
* @since 3.4.0
*
* @param string $header    Theme header. Name, Description, Author, Version, ThemeURI, AuthorURI, Status, Tags.
* @param bool   $markup    Optional. Whether to mark up the header. Defaults to true.
* @param bool   $translate Optional. Whether to translate the header. Defaults to true.
* @return string|array|false Processed header. An array for Tags if `$markup` is false, string otherwise.
*                            False on failure.
*/
public function display($header, $markup = \true, $translate = \true)
{
}
/**
* The directory name of the theme's "stylesheet" files, inside the theme root.
*
* In the case of a child theme, this is directory name of the child theme.
* Otherwise, get_stylesheet() is the same as get_template().
*
* @since 3.4.0
*
* @return string Stylesheet
*/
public function get_stylesheet()
{
}
/**
* The directory name of the theme's "template" files, inside the theme root.
*
* In the case of a child theme, this is the directory name of the parent theme.
* Otherwise, the get_template() is the same as get_stylesheet().
*
* @since 3.4.0
*
* @return string Template
*/
public function get_template()
{
}
/**
* Returns the absolute path to the directory of a theme's "stylesheet" files.
*
* In the case of a child theme, this is the absolute path to the directory
* of the child theme's files.
*
* @since 3.4.0
*
* @return string Absolute path of the stylesheet directory.
*/
public function get_stylesheet_directory()
{
}
/**
* Returns the absolute path to the directory of a theme's "template" files.
*
* In the case of a child theme, this is the absolute path to the directory
* of the parent theme's files.
*
* @since 3.4.0
*
* @return string Absolute path of the template directory.
*/
public function get_template_directory()
{
}
/**
* Returns the URL to the directory of a theme's "stylesheet" files.
*
* In the case of a child theme, this is the URL to the directory of the
* child theme's files.
*
* @since 3.4.0
*
* @return string URL to the stylesheet directory.
*/
public function get_stylesheet_directory_uri()
{
}
/**
* Returns the URL to the directory of a theme's "template" files.
*
* In the case of a child theme, this is the URL to the directory of the
* parent theme's files.
*
* @since 3.4.0
*
* @return string URL to the template directory.
*/
public function get_template_directory_uri()
{
}
/**
* The absolute path to the directory of the theme root.
*
* This is typically the absolute path to wp-content/themes.
*
* @since 3.4.0
*
* @return string Theme root.
*/
public function get_theme_root()
{
}
/**
* Returns the URL to the directory of the theme root.
*
* This is typically the absolute URL to wp-content/themes. This forms the basis
* for all other URLs returned by WP_Theme, so we pass it to the public function
* get_theme_root_uri() and allow it to run the {@see 'theme_root_uri'} filter.
*
* @since 3.4.0
*
* @return string Theme root URI.
*/
public function get_theme_root_uri()
{
}
/**
* Returns the main screenshot file for the theme.
*
* The main screenshot is called screenshot.png. gif and jpg extensions are also allowed.
*
* Screenshots for a theme must be in the stylesheet directory. (In the case of child
* themes, parent theme screenshots are not inherited.)
*
* @since 3.4.0
*
* @param string $uri Type of URL to return, either 'relative' or an absolute URI. Defaults to absolute URI.
* @return string|false Screenshot file. False if the theme does not have a screenshot.
*/
public function get_screenshot($uri = 'uri')
{
}
/**
* Return files in the theme's directory.
*
* @since 3.4.0
*
* @param string[]|string $type          Optional. Array of extensions to find, string of a single extension,
*                                       or null for all extensions. Default null.
* @param int             $depth         Optional. How deep to search for files. Defaults to a flat scan (0 depth).
*                                       -1 depth is infinite.
* @param bool            $search_parent Optional. Whether to return parent files. Default false.
* @return string[] Array of files, keyed by the path to the file relative to the theme's directory, with the values
*                  being absolute paths.
*/
public function get_files($type = \null, $depth = 0, $search_parent = \false)
{
}
/**
* Returns the theme's post templates.
*
* @since 4.7.0
* @since 5.8.0 Include block templates.
*
* @return array[] Array of page template arrays, keyed by post type and filename,
*                 with the value of the translated header name.
*/
public function get_post_templates()
{
}
/**
* Returns the theme's post templates for a given post type.
*
* @since 3.4.0
* @since 4.7.0 Added the `$post_type` parameter.
*
* @param WP_Post|null $post      Optional. The post being edited, provided for context.
* @param string       $post_type Optional. Post type to get the templates for. Default 'page'.
*                                If a post is provided, its post type is used.
* @return string[] Array of template header names keyed by the template file name.
*/
public function get_page_templates($post = \null, $post_type = 'page')
{
}
/**
* Loads the theme's textdomain.
*
* Translation files are not inherited from the parent theme. TODO: If this fails for the
* child theme, it should probably try to load the parent theme's translations.
*
* @since 3.4.0
*
* @return bool True if the textdomain was successfully loaded or has already been loaded.
*  False if no textdomain was specified in the file headers, or if the domain could not be loaded.
*/
public function load_textdomain()
{
}
/**
* Whether the theme is allowed (multisite only).
*
* @since 3.4.0
*
* @param string $check   Optional. Whether to check only the 'network'-wide settings, the 'site'
*                        settings, or 'both'. Defaults to 'both'.
* @param int    $blog_id Optional. Ignored if only network-wide settings are checked. Defaults to current site.
* @return bool Whether the theme is allowed for the network. Returns true in single-site.
*/
public function is_allowed($check = 'both', $blog_id = \null)
{
}
/**
* Returns whether this theme is a block-based theme or not.
*
* @since 5.9.0
*
* @return bool
*/
public function is_block_theme()
{
}
/**
* Retrieves the path of a file in the theme.
*
* Searches in the stylesheet directory before the template directory so themes
* which inherit from a parent theme can just override one file.
*
* @since 5.9.0
*
* @param string $file Optional. File to search for in the stylesheet directory.
* @return string The path of the file.
*/
public function get_file_path($file = '')
{
}
/**
* Determines the latest WordPress default theme that is installed.
*
* This hits the filesystem.
*
* @since 4.4.0
*
* @return WP_Theme|false Object, or false if no theme is installed, which would be bad.
*/
public static function get_core_default_theme()
{
}
/**
* Returns array of stylesheet names of themes allowed on the site or network.
*
* @since 3.4.0
*
* @param int $blog_id Optional. ID of the site. Defaults to the current site.
* @return string[] Array of stylesheet names.
*/
public static function get_allowed($blog_id = \null)
{
}
/**
* Returns array of stylesheet names of themes allowed on the network.
*
* @since 3.4.0
*
* @return string[] Array of stylesheet names.
*/
public static function get_allowed_on_network()
{
}
/**
* Returns array of stylesheet names of themes allowed on the site.
*
* @since 3.4.0
*
* @param int $blog_id Optional. ID of the site. Defaults to the current site.
* @return string[] Array of stylesheet names.
*/
public static function get_allowed_on_site($blog_id = \null)
{
}
/**
* Enables a theme for all sites on the current network.
*
* @since 4.6.0
*
* @param string|string[] $stylesheets Stylesheet name or array of stylesheet names.
*/
public static function network_enable_theme($stylesheets)
{
}
/**
* Disables a theme for all sites on the current network.
*
* @since 4.6.0
*
* @param string|string[] $stylesheets Stylesheet name or array of stylesheet names.
*/
public static function network_disable_theme($stylesheets)
{
}
/**
* Sorts themes by name.
*
* @since 3.4.0
*
* @param WP_Theme[] $themes Array of theme objects to sort (passed by reference).
*/
public static function sort_by_name(&$themes)
{
}
}
