<?php
$index = $_POST['index_task'];

$tasks_string = file_get_contents('./assets/data/tasks.json');

$task_list = json_decode($tasks_string, true);

array_splice($task_list, $index, 1);

$new_tasks_string = json_encode($task_list);

file_put_contents('./assets/data/tasks.json', $new_tasks_string);

header('Content-Type: application/json');

echo $new_tasks_string;
