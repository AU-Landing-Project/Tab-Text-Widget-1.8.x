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
}

elgg_register_event_handler('init', 'system', 'tabtext_init');
