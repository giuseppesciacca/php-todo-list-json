<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <!-- Font-awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer">
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
                <ul class="rounded-2 my-3 p-0">
                    <li v-for="(task, index) in tasks" class="d-flex align-items-center justify-content-between">
                        <span @click="change_status_task(task.task, index, task.status)" :class="task.status == 'done' ? 'done' : ''">{{task.task}}</span>

                        <span @click="delete_task(index)" class="trash rounded-2 btn btn-danger">
                            <i class="fa-solid fa-trash"></i>
                        </span>
                    </li>
                </ul>

                <div class="form input-group mb-3">
                    <input type="text" class="form-control" name="task" id="form-file" aria-describedby="helpId" placeholder="Inserisci elemento..." @keyup.enter="addTask()" v-model.trim="new_task">
                    <span class="input-group-text btn btn-outline-warning" @click.prevent="addTask()">Inserisci</span>
                </div>
            </div>
        </main>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!-- AXIOS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- Vue.js CDN -->
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <!-- JS -->
    <script src="./assets/js/main.js"></script>
</body>

</html>