<?php
//Including Framework File
include_once __DIR__ . '/framework/framework.php';
include_once __DIR__ . '/options.php';
function wactc_table_option_eneque(){
    /**
     * If you want to use this package any where, Please change enqueue keyword name. here use: ultratable-options
     * Available Style File is
     * lighter.css
     * blacky.css
     * beautiful.css
     * blacknwhite.css
     * contrast.css
     * offset.css
     * lighter-gradient.css
     * 
     * All Framework TEmplate is not created yet, We will create it asap
     */
    wp_enqueue_style( 'wactc-options', WACTC_TABLE_OPTIONS_URL . '/style/lighter.css', array(), '1.0.0', 'all' );
}
add_action( 'admin_enqueue_scripts', 'wactc_table_option_eneque', 99 );