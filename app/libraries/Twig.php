<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}
/**
 * Project name: cinzan2.0.
 * User: Marian
 * Date: 03/10/18
 * Time: 12:54
 */

class Twig {
    private $CI;
    private $_twig;
    private $_template_dir;
    private $_cache_dir;

    /**
     * Constructor
     *
     */
    function __construct($debug = false)
    {
        $this->CI =& get_instance();
        $this->CI->config->load('twig');

        ini_set('include_path', ini_get('include_path') . PATH_SEPARATOR . APPPATH . 'libraries/Twig');
        require_once (string) "Autoloader" . EXT;

        log_message('debug', "Twig Autoloader Loaded");

        Twig_Autoloader::register();

        $this->_template_dir = $this->CI->config->item('template_dir');
        $this->_cache_dir = $this->CI->config->item('cache_dir');

        $loader = new Twig_Loader_Filesystem($this->_template_dir);

        $this->_twig = new Twig_Environment($loader, array(
            //'cache' => $this->_cache_dir,
            'debug' => true,
        ));
         
        $this->_twig->addExtension(new Twig_Extension_Debug());
        $this->_twig->addGlobal('session', $this->CI->session);
        // enable all php function on twig
        foreach(get_defined_functions() as $functions) {
            foreach($functions as $function) {
                $this->ci_function_init_one($function, $function);
              //  $this->_twig->addFunction($function, new Twig_Function_Function($function));
            }
        }
        $this->load_assets();
       // $this->_twig->addFunction('render', new Twig_Function_Function('twig_render'));
        $this->ci_function_init_one('render', 'twig_render');

        // url
        $this->ci_function_init_one('base_url', 'base_url');
        $this->ci_function_init_one('site_url', 'site_url');
        $this->ci_function_init_one('current_url', 'current_url');

        // form functions
        $this->ci_function_init_one('form_open', 'form_open');
        $this->ci_function_init_one('form_hidden', 'form_hidden');
        $this->ci_function_init_one('form_input', 'form_input');
        $this->ci_function_init_one('form_password', 'form_password');
        $this->ci_function_init_one('form_upload', 'form_upload');
        $this->ci_function_init_one('form_textarea', 'form_textarea');
        $this->ci_function_init_one('form_dropdown', 'form_dropdown');
        $this->ci_function_init_one('form_multiselect', 'form_multiselect');
        $this->ci_function_init_one('form_fieldset', 'form_fieldset');
        $this->ci_function_init_one('form_fieldset_close', 'form_fieldset_close');
        $this->ci_function_init_one('form_checkbox', 'form_checkbox');
        $this->ci_function_init_one('form_radio', 'form_radio');
        $this->ci_function_init_one('form_submit', 'form_submit');
        $this->ci_function_init_one('form_label', 'form_label');
        $this->ci_function_init_one('form_reset', 'form_reset');
        $this->ci_function_init_one('form_button', 'form_button');
        $this->ci_function_init_one('form_close', 'form_close');
        $this->ci_function_init_one('form_prep', 'form_prep');
        $this->ci_function_init_one('set_value', 'set_value');
        $this->ci_function_init_one('set_select', 'set_select');
        $this->ci_function_init_one('set_checkbox', 'set_checkbox');
        $this->ci_function_init_one('set_radio', 'set_radio');
        $this->ci_function_init_one('form_open_multipart', 'form_open_multipart');

    }

   /* public function add_function($name)
    {
        $this->_twig->addFunction($name, new Twig_Function_Function($name));
    }*/

    /**
     * Function Wrapper
     *
     * This function wraps the Twig addFunction() function. It builds
     * a Twig_SimpleFunction off the callable name then adds it to the
     * current Twig instance.
     *
     * @access  public
     * @param   string  the name of the callable in PHP
     * @param   string  the name you want to use within the template
     * @return  null
     */
    public function add_function($php_name, $twig_name = null)
    {
        if (is_null($twig_name)) $twig_name = $php_name;
        $function = new Twig_SimpleFunction($twig_name, $php_name);
        $this->_twig->addFunction($function);
    }


    public function render($template, $data = array())
    {
        $template = $this->_twig->loadTemplate($template);
        return $template->render($data);
    }

    public function display($template, $data = array())
    {
        
       // $data['menu'] = $this->CI->menumanager->build((int)$this->CI->session->userdata('type_id'));
       // $data['email'] = $this->CI->session->userdata('email');
      /*  $data['en_lang'] = anchor($this->CI->lang->switch_uri('en'),null,array('class'=>"en"));
        $data['fr_lang'] = anchor($this->CI->lang->switch_uri('fr'),null,array('class'=>"fr"));
        $data['rw_lang'] = anchor($this->CI->lang->switch_uri('rw'),null,array('class'=>"rw"));*/
        $template = $this->_twig->loadTemplate($template);
        $template->display($data);
    }

    private function load_assets(){
        $this->add_function('css_url');
        $this->add_function('js_url');
        $this->add_function('img_url');
        $this->add_function('formatNumber');
        $this->add_function('getMessages');
        $this->add_function('getSession');
        $this->add_function('is_refer');
        
        $this->add_function('getStructuresTree');
        $this->add_function('hasRights');
        $this->add_function('manageRights');
        $this->add_function('hasDataEntryRights');
        $this->add_function('hasSignOffRights');
        $this->add_function('hasValidationRights');
        $this->add_function('IsAllActivitySigned');
        $this->add_function('IsAllBudgetSigned');
        $this->add_function('IsAllBudgetOk');
        $this->add_function('tauxAssiduiteFille');
        $this->add_function('tauxAssiduiteGarcon');
        $this->add_function('tmas');
        $this->add_function('vivreFourni');
        $this->add_function('eleveNourri');
        $this->add_function('eleveNonNourri');
    }

    public function ci_function_init_one($twig_name, $callable)
    {
        $this->_twig->addFunction(new Twig_SimpleFunction($twig_name, $callable, array('is_safe' => array('html'))));
    }

    

}