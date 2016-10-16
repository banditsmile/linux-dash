<?php
/**
 * Created by PhpStorm.
 * User: xubandit
 * Date: 16/10/16
 * Time: 下午2:41
 */

//ssdb and redis use the same protocol
include_once './library/iredis.php';

$ssdb = new iRedis(array('hostname' => 'localhost', 'port' => 8888));
$fields = explode(',',"redis_version,connected_clients,connected_slaves,used_memory_human,total_connections_received,total_commands_processed");
$ssdb_info=$ssdb->info();
print_r($ssdb_info);
$data = array();
next($ssdb_info);
for($i=1;$i<count($ssdb_info);$i++){
	$data[$ssdb_info[$i]]=$ssdb_info[++$i];
}
print_r($data);
echo json_encode($data);