const { createApp } = Vue

createApp({
    data() {
        return {
            tasks: [],
            api_url: './tasks.json',
            new_task: '',
        }
    },
    methods: {
        /**
         * send task to store_tasks.php that push the task in tasks.json
         */
        addTask() {
            const data = {
                new_task: this.new_task
            }

            axios.post('./store_tasks.php', data, {
                headers: { 'Content-Type': 'multipart/form-data' }
            }).then(function (response) {
                this.tasks = response.data
                //console.log(this.tasks);
            }).catch(error => {
                console.error(error.message);
            })

            this.new_task = ''
        },
        /**
         * reload tasks array
         */
        reloadTask() {
            axios
                .get(this.api_url)
                .then(response => {
                    //console.log(response.data);
                    this.tasks = response.data
                })
                .catch(error => {
                    console.error(error.message);
                })
        },
        /**
         *
         */
        change_status_task(task, index, status) {
            console.log('task completata', index);

            const data = {
                text: task,
                index_task: index,
                status: status
            }

            axios.post('./change_status_task.php', data, {
                headers: { 'Content-Type': 'multipart/form-data' }
            }).then(function (response) {
                this.tasks = response.data
                //console.log(this.tasks);
            }).catch(error => {
                console.error(error.message);
            })
        }
    },
    mounted() {
        axios
            .get(this.api_url)
            .then(response => {
                //console.log(response.data);
                this.tasks = response.data
            })
            .catch(error => {
                console.error(error.message);
            })
    }
}).mount('#app')