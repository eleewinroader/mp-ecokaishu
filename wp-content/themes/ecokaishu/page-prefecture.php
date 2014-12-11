<?php

$args = array(
		'get' => 'all',
		'parent' => 0,
	);
$terms = get_terms('cltarea', $args);
asort($terms);
$j = 0;
foreach($terms as $term){
	$municipalities = get_term_children($term->term_id, 'cltarea');
	asort($municipalities);
	if($municipalities){
		echo '<div id="listprefecture'.$j.'" class="municipality">';
		echo '<select name="cstmMncplt'.$j.'" id="municipalities"'.$disabled.'>';
		echo '<option value="">市区町村を選択してください</option>';
		$k = 0;
		foreach($municipalities as $municipality){								
			$mncplt = get_term_by('id', $municipality, 'cltarea' );
			if($mncplt->name == $cstmMncplt) $selected = "selected";
			else $selected = "";
			echo '<option id="estmtCstmMnciplt'.$k.'" value="'.$mncplt->name.'" class="'.$selected.'"'.$selected.'>'.$mncplt->name.'</option>';
		$k++;
		}
		echo '</select></div>';
	}
$j++;
}?>