<?php
function supermobleads_frontend_scriptenqueue(){
	wp_register_style('supermobleads_primarystyle', plugins_url( '../style/style.css', __FILE__, false, '0.0.1' ));
    wp_enqueue_style('supermobleads_primarystyle');
}
function supermobleads_wp_admin_style(){
        wp_enqueue_style('supermobleads_admincss', plugins_url('../style/adminstyle.css', __FILE__, false, '0.0.1'));
        //wp_enqueue_script('supermobleads_adminjs', plugins_url('../js/supermobleadsscript.js', __FILE__, false, '0.0.1'));
}
function supermobleads_translateinitfunction(){
    load_plugin_textdomain( 'supermobleads', false, basename( dirname( __FILE__ ) ) . '/languages' );
}
function supermobleads_outputbuff_func(){
	ob_start();
}
add_action('wp_enqueue_scripts','supermobleads_frontend_scriptenqueue');
?>