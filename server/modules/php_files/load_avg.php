<?php
$load = sys_getloadavg();
$load_avg = array();
list($load_avg['1_min_avg'],$load_avg['5_min_avg'],$load_avg['15_min_avg'])=$load;
ksort($load_avg,SORT_NUMERIC);
echo json_encode($load_avg);
