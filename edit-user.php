<?php 
// 添加一个 cors 响应头
header('Access-Control-Allow-Origin:http://localhost:8000');
// header('Access-Control-Allow-Headers','Content-Type');
header("Access-Control-Allow-Methods : POST, GET");

header("Access-Control-Allow-Headers : x-requested-with,content-type");

//update或add
$action = $_GET['action'];
$user = json_decode(file_get_contents('php://input'),true); 
if ($action =='add') {
	try {
		array_push($users,$user);
		echo json_encode(['success'=>true, 'data'=>$users]);
	} catch(Exception $e) {
		echo json_encode(['success'=>false]);
	}
}else{
	try {
		for ($i=0; $i < count($users); $i++) { 
			if ($users[$i]['name'] == $user['name']) {
				//更新
				$users[$i] = $user;
				exit(json_encode(['success'=>true, 'data'=>$users]));
			}
		}
		echo json_encode(['success'=>false);
	} catch(Exception $e) {
		echo json_encode(['success'=>false]);
	}
}

$users = [
  ['name'=>'tom','role'=>'admin'],
  ['name'=>'jerry','role'=>'user']
];

try {
	$user = json_decode(file_get_contents('php://input'),true); 
	array_push($users,$user);
	echo json_encode(['success'=>true, 'data'=>$users]);
} catch(Exception $e) {
	echo json_encode(['success'=>false]);
}


