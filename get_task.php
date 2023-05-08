<?php

$tasks_string = file_get_contents('./tasks.json');

header('Content-Type: application/json');

echo $tasks_string;
