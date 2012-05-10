<?php
$widget = $vars['entity'];

$options = array(
  'name' => 'params[numtabs]',
  'id' => 'numtabs'.$widget->guid,
  'value' => $widget->numtabs ? $widget->numtabs : 3,
  'options' => array(1,2,3,4,5)
);
echo elgg_echo('tabtext:numtabs:label');
echo elgg_view('input/dropdown', $options);

?>

<div id="tabtext_widget_form_<?php echo $widget->guid; ?>">
	<?php echo elgg_view('forms/tabtext', array('entity' => $widget)); ?>
</div>

<script>
$(document).ready(function() {
	$("#numtabs<?php echo $widget->guid; ?>").change(function(){
		tabtext_update_form(<?php echo $widget->guid; ?>);
	});
});
</script>