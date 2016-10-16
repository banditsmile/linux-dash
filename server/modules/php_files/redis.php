<?php
/**
 * Created by PhpStorm.
 * User: xubandit
 * Date: 16/10/16
 * Time: 下午2:41
 */

include_once './library/iredis.php';

$redis = new iRedis(array('hostname' => 'localhost', 'port' => 6379));
$fields = explode(',',"redis_version,connected_clients,connected_slaves,used_memory_human,total_connections_received,total_commands_processed");
$redis_info=$redis->info();
$data = array();
foreach($fields as $f){
	$data[$f]=$redis_info[$f];
}

echo json_encode($data);