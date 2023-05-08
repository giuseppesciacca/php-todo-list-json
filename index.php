<?php

$tasks_string = file_get_contents('tasks.json');
$tasks_list = json_decode($tasks_string, true);
//var_dump($tasks_list);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <div id="app">

        <header>
            <div class="container">
                <h1 class="text-center">Todo List</h1>
            </div>
        </header>

        <main>
            <div class="container">
                <form action="" method="get">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="task" id="" aria-describedby="helpId" placeholder="Inserisci nuova task" keyup.enter="addTask(), reloadTask()" v-model="new_task">

                        <button type="submit" class="btn btn-primary m-3" @click.prevent="addTask(), reloadTask()">Invia</button>
                        <button type="reset" class="btn btn-danger">Annulla</button>
                    </div>
                </form>

                <ul>
                    <li v-for="task in tasks" :class="task.status == 'done' ? 'done' : ''">{{task.task}}</li>
                </ul>
        </main>
    </div>




    </div>


    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!-- AXIOS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- Vue.js CDN -->
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <!-- JS -->
    <script src="./main.js"></script>
</body>

</html>