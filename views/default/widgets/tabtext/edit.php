<?php
$widget = $vars['entity'];

echo '<div class="tabtext-form-wrapper">';

for($i=1; $i<6; $i++){
    $tabfield = "title{$i}";
    $contentfield = "description{$i}";
    
    $options = array(
      'name' => "params[title{$i}]",
      'value' => $widget->$tabfield,
      'class' => 'tabtextinput'
    );
    echo elgg_echo('tabtext:tab:label', array($i)) . '<br>';
    echo elgg_view('input/text', $options) . '<br><br>';
    
    // can't use elgg longtext input because we don't want tinymce
    $options = array(
        'name' => "params[description{$i}]",
        'value' => $widget->$contentfield,
        'id' => 'tabtext_' . $widget->guid . '_' . $i,
        'class' => 'tabtextinput',
    );
    echo "<style>
  #tabtext_{$widget->guid}_{$i}_parent {
    display: block;
    z-index: 999;
  }
  </style>
";
    echo elgg_echo('tabtext:content:label', array($i)) . '<br>';
    echo elgg_view('input/longtext', $options) . "<br><br>";
    //echo "<textarea class=\"tabtextinput\" name=\"params[description{$i}]\">{$widget->$contentfield}</textarea><br><br>";
  }

echo "</div>";