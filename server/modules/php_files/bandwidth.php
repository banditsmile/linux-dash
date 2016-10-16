<?php
$base_dir = '/sys/class/net/';
$dirs = scandir($base_dir);
$bandwidth = array();
foreach($dirs as $dir){
	if(in_array($dir,array('.','..'))){continue;}
	$bandwidth[] = array(
		'interface'=> trim($dir),
		'tx_byte' => trim(file_get_contents($base_dir.$dir.'/statistics/tx_bytes')),
		'rx_byte' => trim(file_get_contents($base_dir.$dir.'/statistics/rx_bytes'))
	);
}
echo json_encode($bandwidth);
