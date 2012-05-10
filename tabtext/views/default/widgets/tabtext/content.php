<?php

$widget = $vars['entity'];

// create tabs
$tabs = array();
for($i=1; $i<$widget->numtabs+1; $i++){
  $tabfield = "tab{$i}";
  $tabs[] = array('title' => $widget->$tabfield, 'url' => 'javascript:void(0);', 'selected' => $i == 1 ? TRUE : FALSE, 'id' => $tabfield.$widget->guid);
}


// create a string of ids for jquery selectors
$jquery_selectors = "";
for($i=0; $i<count($tabs); $i++){
  $jquery_selectors .= ($i != 0) ? ", " : "";
  $jquery_selectors .= "#".$tabs[$i]['id'];
}

// output the tabs
echo elgg_view('navigation/tabs', array('tabs' => $tabs));
?>

<div id="tabtext_content_<?php echo $widget->guid; ?>">
	<?php echo elgg_view('tabtext/content', array('entity' => $widget)); ?>
</div>

<script>
$(document).ready(function() {
	$("<?php echo $jquery_selectors; ?>").click(function() {
		$("<?php echo $jquery_selectors; ?>").removeClass("elgg-state-selected");
		$(this).addClass("elgg-state-selected");
		var id = $(this).attr('id');
		
		tabtext_update_content(<?php echo $widget->guid; ?>, id[3]);
	});
});
</script>

