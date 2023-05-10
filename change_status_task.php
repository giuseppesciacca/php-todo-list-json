<?php
$index = $_POST['index_task'];
$text = $_POST['text'];
$status = $_POST['status'];

$tasks_string = file_get_contents('./assets/data/tasks.json');

$task_list = json_decode($tasks_string, true);

if ($status == 'done') {
    $status = 'undone';
} elseif ($status = 'undone') {
    $status = 'done';
}

$task_list[$index] = [
    'task' => $text,
    'status' => $status
];

$new_tasks_string = json_encode($task_list);

file_put_contents('./assets/data/tasks.json', $new_tasks_string);

header('Content-Type: application/json');

echo $new_tasks_string;
