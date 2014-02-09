<?php
/*
Plugin Name: Custom hook example
Plugin URI: https://github.com/kanonji/wp-custom-hook-example
Version: 0.1
Description: Example of custom hook.
Author: kanonji
Author URI: http://twitter.com/kanonji
*/
/*
MIT license
http://www.opensource.org/licenses/mit-license.php
*/
function my_action(){
    var_dump(__function__);
    var_dump(func_get_args());
}
function my_action_args(){
    var_dump(__function__);
    var_dump(func_get_args());
}
add_action('my_action', 'my_action');
add_action('my_action', 'my_action_args', 10, 3);

function my_filter(){
    var_dump(__function__);
    var_dump(func_get_args());
    return func_get_arg(0);
}
function my_filter_args(){
    var_dump(__function__);
    var_dump(func_get_args());
    return func_get_arg(0);
}
add_filter('my_filter', 'my_filter');
add_filter('my_filter', 'my_filter_args', 10, 3);

function wrapper(){
    do_action('my_action', 'arg1', 2, array(1,2,3));
    apply_filters('my_filter', 'arg1', 2, array(1,2,3));
}
add_action('shutdown', 'wrapper');
