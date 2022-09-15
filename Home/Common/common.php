<?php
function footerlm($id){
	$lanmu = M('lanmu');
	$reszxbz = $lanmu->where("toplanmu_id =".$id)->select();
	return $reszxbz;
}