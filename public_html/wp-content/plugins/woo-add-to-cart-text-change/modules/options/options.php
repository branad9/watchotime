<?php 

/**
 * Setting for Ultra Table Option
 * 
 * @since 1.0.0.5
 * @author Saiful Islam<codersaiful@gmail.com>
 */


// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  //
  // Set a unique slug-like ID
  $prefix = 'wactc_default_add_to_cart_text';
  //$wactc_options = get_option( 'wactc_default_add_to_cart_text' );
  $wactc_kena_arr = get_option('wactc_sanitize_kena_code');
  
  $wactc_default_class = isset( $wactc_kena_arr['version'] ) && !empty( $wactc_kena_arr['version'] ) && $wactc_kena_arr['version'] == 'paid' ? '' : 'ultraaddons_pro_features';
  $wactc_base_url = WACTC_BASE_URL;
  
  //
  // Create options
  CSF::createOptions( $prefix, array(

    // framework title
    'framework_title'         => 'WC - AddToCart Settings <small>1.6</small>',
    'framework_class'         => '',

    // menu settings
    'menu_title'              => 'ADD TO CART',
    'menu_slug'               => 'wactc-add-to-cart',
    'menu_type'               => 'submenu',
    'menu_capability'         => 'manage_options',
    'menu_icon'               => null,
    'menu_position'           => null,
    'menu_hidden'             => true,
    'menu_parent'             => 'woocommerce',//'edit.php?post_type=ultratable',

    // menu extras
    'show_bar_menu'           => true,
    'show_sub_menu'           => true,
    'show_network_menu'       => true,
    'show_in_customizer'      => false,

    'show_search'             => true,
    'show_reset_all'          => true,
    'show_reset_section'      => true,
    'show_footer'             => true,
    'show_all_options'        => true,
    'show_form_warning'       => true,
    'sticky_header'           => true,
    'save_defaults'           => true,
    'ajax_save'               => true,

    // admin bar menu settings
    'admin_bar_menu_icon'     => '',
    'admin_bar_menu_priority' => 80,

    // footer
    'footer_text'             => '',
    'footer_after'            => '',
    'footer_credit'           => 'Thank you for using <b>WooCommerce add to cart text change</b> plugin. Developed by <a href="mailto:codersaiful@gmail.com">codersaiful@gmail.com</a>',

    // database model
    'database'                => '', // options, transient, theme_mod, network
    'transient_time'          => 0,

    // contextual help
    'contextual_help'         => array(),
    'contextual_help_sidebar' => '',

    // typography options
    'enqueue_webfont'         => true,
    'async_webfont'           => false,

    // others
    'output_css'              => true,

    // theme and wrapper classname
    'theme'                   => 'dark',//apply_filters('ultratable_setting_theme','dark'),
    'class'                   => '',

    // external default values
    'defaults'                => array(),

  ) );

  //
  // Create a section
  CSF::createSection( $prefix, array(
    'title'  => 'Basic',
    'icon'   => 'fa fa-rocket',
    'subtitle' => 'This is Test Sub Title',
    'desc' => 'This is Test Sub Title',
    'fields' => array(

      // A text field
      array(
            'id'            => 'simple',
            'type'          => 'text',
            'subtitle'      => 'Normally this text will show for default Add to cart button text.',
            'desc'          => 'For Single/Details page button. or in shop page for Simple Product',
            'title'         => 'Add to cart text',
            'default'       => 'Add to cart',
      ),
        array(
            'id'            => 'icon',
            'type'          => 'button_set',
            'title'         =>  'Button Icon',
            'subtitle'      =>  'To enable/disable',
            'desc'          => 'Default:"No Icon". But you able to set icon.',
            //'placeholder'   =>  'Choose and option',
            'options'       =>  array(
                'no_icon'       => 'No Icon',
                'only_icon'     =>  'Only Icon',
                'icon_left'     => 'Icon + Text', //Left
                //'icon_right'    => 'Right',
                ''    => 'Custom Icon + Text'
            ),
            'default'       => 'no_icon',
        ),
        array(
                'id'      => 'cart_icon_preset',
                'type'    => 'image_select',
                'title'   => 'Preset Cart Image',
                'subtitle'=> 'Choose icon from folowoing image.',
                'desc'    => 'You can use any of these. Or If you want to use your custom icon image. Just select: <b>SET CUSTOM ICON</b> and upload your custom icon.',
                'options' => array(
                    'default' => $wactc_base_url . 'images/thumbs/default.png',
                    'add_cart_black' => $wactc_base_url . 'images/thumbs/add_cart_black.png',
                    'add_cart_red_black' => $wactc_base_url . 'images/thumbs/add_cart_red_black.png',
                    'blue' => $wactc_base_url . 'images/thumbs/blue.png',
                    'orrange' => $wactc_base_url . 'images/thumbs/orrange.png',
                    'zigzag' => $wactc_base_url . 'images/thumbs/zigzag.png',
                    'ultraaddons' => $wactc_base_url . 'images/thumbs/ultraaddons.png',
                    '' => $wactc_base_url . 'images/thumbs/custom.png',
                ),
            'default' => 'add_cart',
            'dependency'=> array( 'icon', '==', '' ),
        ),
        
        array(
            'id'        => 'cart_icon_image',
            'type'      => 'media',
            'title'     => 'Custom cart Icon/Image',
            'subtitle'  => 'Upload your CUSTOM cart icon image.',
            'desc'      => 'Recommended icon size: 24x24 px. Recommended max size - 50x50 px. But you able to add any size png/jpg image for your custom icon.',
            'default'   => array( 
                'url' => $wactc_base_url . 'images/default.png',
                'thumbnail' => $wactc_base_url . 'images/default.png',
                ),
            'library'   => 'image',
            'dependency'=> array( 'cart_icon_preset|icon', '==|==', '|' ),
            'class'     => $wactc_default_class,
        ),
        array(
            'id'            => 'variable',
            'type'          => 'text',
            'subtitle'      => 'Normally this text will show for loop of Product. Such in Shop page.',
            'desc'          => 'Default text is: "Select options". Select Option button text for shop page or in loop.',
            'title'         => 'Text of Variable Product ',
            'default'       => 'Select options',
        ),
        
        array(
            'id'            => 'grouped',
            'type'          => 'text',
            'subtitle'      => 'Normally this text will show for loop of Product. Such in Shop page.',
            'desc'          => 'Default text is: "View products". Select Option button text for shop page or in loop.',
            'title'         => 'Text for View products',
            'default'       => 'View products',
        ),
        
    )
  ) );

  
    $watct_buttons = '.single_add_to_cart_button.button, '
            . 'a.single_add_to_cart_button.button, '
            . 'button.single_add_to_cart_button.button, '
            . 'body.woocommerce .single_add_to_cart_button.button,'
            . '.woocommerce .single_add_to_cart_button.button,'
            . '.woocommerce .products a.button,'
            . 'button.single_add_to_cart_button.button.alt,'
            . '.woocommerce button.single_add_to_cart_button.button.alt,'
            . 'body.woocommerce .products a.button';
    
    $watct_buttons_hover = '.single_add_to_cart_button.button:hover, '
            . 'a.single_add_to_cart_button.button:hover, '
            . 'button.single_add_to_cart_button.button:hover, '
            . 'body.woocommerce .single_add_to_cart_button.button:hover,'
            . '.woocommerce .single_add_to_cart_button.button:hover,'
            . '.woocommerce .products a.button:hover,'
            . 'button.single_add_to_cart_button.button.alt:hover,'
            . '.woocommerce button.single_add_to_cart_button.button.alt:hover,'
            . 'body.woocommerce .products a.button:hover';
    
    CSF::createSection( $prefix, array(
        'title'  => 'Style and Design',
        'icon'  => 'fa fa-tint',
        'subtitle' => 'Style your Add to cart button Easily.',
        'desc' => 'Button Style and Design',
        //'output'  => 'h1.product_title.entry-title',//'button.single_add_to_cart_button.button.alt',//array('button.single_add_to_cart_button.button.alt'),
        'fields' => array(
            array(
                'id'        =>  'add_to_cart_typography',
                'type'      =>  'typography',
                'title'     =>  'Button Typography',
                'subtitle'  =>  'Change Style for your button. Such: font-size, text color, font-size, etc.',
                'output'    =>  $watct_buttons,

            ),
            array(
                'id'        =>  'add_to_cart_typography_hover',
                'type'      =>  'typography',
                'title'     =>  'Typography Hover',
                'subtitle'  =>  'Change Style for your button when hover button. Such: font-size, text color, font-size, etc.',
                'output'    =>  $watct_buttons_hover,
                'class'       => $wactc_default_class,
            ),
            array(
                'id'          => 'background-color',
                'type'        => 'color',
                'title'       => 'Background Color',
                'desc'        => 'Background color for Add to cart button',
                'output'      => $watct_buttons,//'a.button.add_to_cart_button',
                'output_mode' => 'background-color',
                
            ),
            
            array(
                'id'          => 'background-color-hover',
                'type'        => 'color',
                'title'       => 'Background Hover',
                'desc'        => 'Background Hover color for Add to cart button',
                'output'      => $watct_buttons_hover,//'a.button.add_to_cart_button',
                'output_mode' => 'background-color',
                'class'       => $wactc_default_class,
            ),
          ),
        ) 
   );

  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  //
// Create a section
//
CSF::createSection( $prefix, array(
    'title'         => 'Import & Export',
    'icon'          => 'fa fa-shield',
  'fields'   => array(

    array(
      'type'  => 'backup',
    ),

  ),
) );

    function wactc_sanitize_kena_code_check($value){
        if( !empty( $value ) ){
            $value = base64_encode($value);
            $version = 'free';
            $ltype = 'single';
            if( $value == 'YXpEUy1Ec2tkLTREc0Qtc0RrYS1jMmx1WjJ4bA==' ){
                $ltype = 'single';$version = 'paid';
            }elseif( $value == 'WHNrUy1NYWtzLTREYUQtRERrYS1OUzF6YVhSbA==' ){
                $ltype = '5 sites'; $version = 'paid';
            }else{
                $value = '';
            }
            update_option('wactc_sanitize_kena_code', array(
                'version' => $version,
                'code'      => $value,
                'site'      => get_home_url(),
                'type'      => $ltype,
            ));
            return '';
        }
        return $value;
    }
    $paid_filed = array(
        'title'         => 'Get Pro',
        'icon'          => 'fa fa-tint',
        'description'   => 'Download Purchase Code to activate Premium Version. <a href="https://account.ultraaddons.com/product/woocommerce-add-to-cart-text-change-and-button-customise/" target="_blank">Buy Now</a>.<br><a href="https://account.ultraaddons.com/product/woocommerce-add-to-cart-text-change-and-button-customise/" target="_blank"><img src="'. $wactc_base_url . 'images/buy_now_button.png"></a> <br> for any Query, Contact with me: <a href="mailto:codersaiful@gmail.com">codersaiful@gmail.com</a>',
        'fields'        => array(
                array(
                    'id'            => 'purchase_code',
                    'type'          => 'text',
                    'subtitle'      => 'Purchase Code to Activate Pro',
                    'desc'          => 'After Save purchase Code once. Please <b>Reload Page.</b>',
                    'title'         => 'Purchase Code',
                    'placeholder'   => 'Enter Your Purchase Code',
                    'sanitize'      => 'wactc_sanitize_kena_code_check'
              ),
            ),
    );
    
    
    if( isset( $wactc_kena_arr['version'] ) && !empty( $wactc_kena_arr['version'] ) && $wactc_kena_arr['version'] == 'paid' ){
        $paid_filed['title'] = 'Pro Status';
        $paid_filed['description'] = '<h2>Pro Version Activated.</h2> Thanks a lot for purchasing our Product. <br> for any Query, Contact with me: <a href="mailto:codersaiful@gmail.com">codersaiful@gmail.com</a><br>'
                . '<h3><a href="https://account.ultraaddons.com/product/woocommerce-add-to-cart-text-change-and-button-customise/" target="_blank">Check Premium Version</a></h3>';
        $paid_filed['fields'][] = array(
            'type'    => 'notice',
            'style'   => 'warning',
            'content' => 'You are using pro version. Please do not enter wrong purchase code. License will be deactivate.',
          );
        
    }
    //var_dump($paid_filed);
    CSF::createSection( $prefix,  $paid_filed);





}//End of Class check if condition

