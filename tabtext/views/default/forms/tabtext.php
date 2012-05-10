<?php

$widget = $vars['entity'];
$guid = $widget->guid;
$numtabs = $widget->numtabs ? $widget->numtabs : 3;

//
// widget might not exist if being loaded via ajax
// so check the widget, and load from inputs if it doesn't exist
if(!($widget instanceof ElggWidget)){
  $numtabs = get_input('tabtext_numtabs');
  $guid = get_input('tabtext_widget_guid');
  $widget = get_entity($guid);
}

// sanity check
if($widget instanceof ElggWidget && is_numeric($numtabs) && $numtabs > 0){
  for($i=1; $i<$numtabs+1; $i++){
    $tabfield = "tab{$i}";
    $contentfield = "content{$i}";
    
    $options = array(
      'name' => "params[tab{$i}]",
      'value' => $widget->$tabfield,
      'class' => 'tabtextinput'
    );
    echo elgg_echo('tabtext:tab:label', array($i)) . '<br>';
    echo elgg_view('input/text', $options) . '<br><br>';
    
    // can't use elgg longtext input because we don't want tinymce
    echo elgg_echo('tabtext:content:label', array($i)) . '<br>';
    echo "<textarea class=\"tabtextinput\" name=\"params[content{$i}]\">{$widget->$contentfield}</textarea><br><br>";
  }
}
else{
  echo elgg_echo('tabtext:invalid:parameters');
}
