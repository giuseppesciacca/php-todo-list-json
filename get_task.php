<?php

$tasks_string = file_get_contents('./tasks.json');

echo $tasks_string;

header('Content-Type: application/json');
