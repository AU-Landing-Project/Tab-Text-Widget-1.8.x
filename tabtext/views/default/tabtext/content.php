<?php

// inputs used because this view can be accessed via ajax
$num = get_input('tabtext_contentnum', 1);
$guid = get_input('tabtext_widget_guid', $vars['entity']->guid);

$widget = get_entity($guid);

// sanity check
if($widget instanceof ElggWidget && is_numeric($num) && $num > 0){
  $attribute = "description{$num}";
  echo $widget->$attribute;
}
else{
  echo elgg_echo('tabtext:invalid:parameters');
}