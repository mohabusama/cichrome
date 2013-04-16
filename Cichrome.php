<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once 'chromelog/ChromePhp.php';

class Cichrome
{

    public function __construct()
    {
        $this->ci = & get_instance();
        $this->log_threshold = $this->ci->config->item('log_threshold');
    }

    public function log($level, $message)
    {
        $log = $this->get_log_level($level);
        if($log <= $this->log_threshold)
        {
            if($level === 'debug')
            {
                $level = 'log';
            }
            ChromePhp::{$level}($message);
        }
    }

    public function warn($message)
    {
        return $this->log('warn', $message);
    }

    public function debug($message)
    {
        return $this->log('debug', $message);
    }

    public function error($message)
    {
        return $this->log('error', $message);
    }

    public function info($message)
    {
        return $this->log('info', $message);
    }

    public function group($name=NULL)
    {
        ChromePhp::group($name);
    }

    public function groupCollapsed($name=NULL)
    {
        ChromePhp::groupCollapsed($name);
    }

    public function groupEnd($name=NULL)
    {
        ChromePhp::groupEnd($name);
    }

    private function get_log_level($level)
    {
        $levels = array(
            'error' => 1,
            'debug' => 2,
            'info' => 3,
            'warn' => 3,
            'all' => 4,
            'log' => 4
        );

        if(!$level || !array_key_exists($level, $levels))
        {
            return 0;
        }

        return $levels[$level];
    }


}