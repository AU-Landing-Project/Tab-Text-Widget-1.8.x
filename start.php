<?php

// setup
function tabtext_init(){
  // include our css
  elgg_extend_view('css/elgg', 'tabtext/css');
  
  //add in our js
  elgg_extend_view('js/elgg', 'tabtext/js');
  
  // register our widget
  elgg_register_widget_type('tabtext', elgg_echo('tabtext'), elgg_echo('tabtext:description'), 'profile,dashboard,groups,index', TRUE);

  // make some views accessible by ajax
  elgg_register_ajax_view('forms/tabtext');
  elgg_register_ajax_view('tabtext/content');
  
  // custom save our content without filtering if allowed and admin
  $nofilter = elgg_get_plugin_setting('nofilter', 'tabtext');
  if(elgg_is_admin_logged_in() && $nofilter != 'no'){
    elgg_register_plugin_hook_handler('widget_settings', 'tabtext', 'tabtext_save_settings');
  }
}


// admin widget settings save
function tabtext_save_settings($hook, $type, $returnvalue, $params){
  $widget = $params['widget'];
  $params = get_input('params', '', false);
  
  if (is_array($params) && count($params) > 0) {
    foreach ($params as $name => $value) {
      if (is_array($value)) {
        // private settings cannot handle arrays
          return false;
      } else {
        $widget->$name = $value;
      }
    }
    $widget->save();
  }
  
  return TRUE;
}

elgg_register_event_handler('init', 'system', 'tabtext_init');
