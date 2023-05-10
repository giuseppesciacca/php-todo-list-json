<?php

$tasks_string = file_get_contents('./assets/data/tasks.json');

header('Content-Type: application/json');

echo $tasks_string;
