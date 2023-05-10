<?php
if (isset($_POST['new_task']) && strlen($_POST['new_task']) > 0) {
    $new_task = [
        "task" => $_POST['new_task'],
        "status" => "undone"
    ];

    $tasks_string = file_get_contents('./assets/data/tasks.json');

    $task_list = json_decode($tasks_string, true);

    array_push($task_list, $new_task);

    $new_tasks_string = json_encode($task_list);

    file_put_contents('./assets/data/tasks.json', $new_tasks_string);


    header('Content-Type: application/json');

    echo $new_tasks_string;
}
