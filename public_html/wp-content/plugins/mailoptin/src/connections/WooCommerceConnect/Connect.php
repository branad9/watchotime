<?php

namespace MailOptin\WooCommerceConnect;

class Connect
{
    public function __construct()
    {
        WooInit::get_instance();
    }

    /**
     * @return Connect|null
     */
    public static function get_instance()
    {
        static $instance = null;
        
        if (is_null($instance)) {
            $instance = new self();
        }
        
        return $instance;
    }
    
}