<?php
if (isset($_POST['new_task'])) {
    $new_task = $_POST['new_task'];
    var_dump($new_task);
    //$new_task = 'prova';


    $tasks_string = file_get_contents('./tasks.json');

    $task_list = json_decode($tasks_string, true);
    //var_dump($task_list);

    array_push($task_list, $new_task);
    var_dump($task_list);

    $new_tasks_string = json_encode($task_list);

    file_put_contents('tasks.json', $new_tasks_string);

    header('Content-Type: application/json');

    echo $new_tasks_string;
}
