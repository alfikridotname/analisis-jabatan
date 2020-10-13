<?php

defined('BASEPATH') or exit('No direct script access allowed');

function CI()
{
    $ci = &get_instance();
    return $ci;
}

function isLogin()
{
    if (empty(CI()->session->userdata('app_login'))) {
        return false;
    }
    return true;
}

function getModuleName()
{
    return CI()->router->fetch_class();
}

function getSession($data)
{
    return CI()->session->userdata($data);
}
