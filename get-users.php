<?php 
$callback = isset($_GET['jsonp_callback'])?$_GET['jsonp_callback']:'';
$users = [
  ['name'=>'tom','role'=>'admin'],
  ['name'=>'jerry','role'=>'user']
];
if (isset($callback)!='') { //json[]
	echo $callback.'('.json_encode($users).')';
} else { //普通请求
	echo json_encode($users);
}
