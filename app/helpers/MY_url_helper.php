<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
if (!function_exists('site_url')) { 
    function site_url($uri = '') {
        if (!is_array($uri)) {
            $uri = func_get_args();
        }
        $CI = & get_instance();
        return $CI->config->site_url($uri);
    } 
}

if (!function_exists('url')) { 
    function url($text, $uri = '') {
        if (!is_array($uri)) {
            $uri = func_get_args();
            array_shift($uri);
        }
        echo '<a href="' . site_url($uri) . '">' . htmlentities($text) .'</a>';
        return '';
    }
}

/**
 * Anchor Link
 *
 * Creates an anchor based on the local URL.
 *
 * @access	public
 * @param	string	the URL
 * @param	string	the link title
 * @param	mixed	any attributes
 * @return	string
 */
if ( ! function_exists('anchor'))
{
	function anchor($uri = '', $title = '', $attributes = '')
	{
		$title = (string) $title;

		if ( ! is_array($uri))
		{
			$site_url = ( ! preg_match('!^\w+://! i', $uri)) ? site_url($uri) : $uri;
		}
		else
		{
			$site_url = site_url($uri);
		}
 
		if ($attributes != '')
		{
			$attributes = _parse_attributes($attributes);
		}

		return '<a href="'.$site_url.'"'.$attributes.'>'.$title.'</a>';
	}
}

/* End of file MY_url_helper.php */
/* Location: ./application/helpers/MY_url_helper.php */