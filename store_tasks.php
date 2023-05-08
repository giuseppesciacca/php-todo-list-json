<?php
$new_task = $_POST['new_task'];
//$new_task = 'prova';

var_dump($new_task);

$tasks_string = file_get_contents('./tasks.json');

$task_list = json_decode($tasks_string, true);
//var_dump($task_list);

array_push($task_list, $new_task);
var_dump($task_list);
