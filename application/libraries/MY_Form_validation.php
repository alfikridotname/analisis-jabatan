<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_Validation
{
    public $CI;
    public function __construct()
    {
        parent::__construct();
    }

    function run($module = '', $group = '')
    {
        (is_object($module)) and $this->CI = &$module;
        return parent::run($group);
    }

    function config($param)
    {
        $config = array(
            'auth/login' => array(
                array(
                    'field' => 'username',
                    'label' => 'Username',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'password',
                    'label' => 'password',
                    'rules' => 'required'
                )
            )
        );

        return empty($config[$param]) ? '' : $config[$param];
    }
}
