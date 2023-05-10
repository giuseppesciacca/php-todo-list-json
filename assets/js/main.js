const { createApp } = Vue

createApp({
    data() {
        return {
            url_get_task: './get_task.php',
            url_post_store_task: './store_tasks.php',
            url_post_change_status: './change_status_task.php',
            url_post_delete_task: './delete_task.php',
            tasks: [],
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

            axios
                .post(
                    this.url_post_store_task,
                    data,
                    {
                        headers: { 'Content-Type': 'multipart/form-data' }
                    }).then((response) => {
                        //console.log(response);
                        this.tasks = response.data
                        //console.log(this.tasks);
                    }).catch(error => {
                        console.error(error.message);
                    })

            this.reloadTask()
            this.new_task = '';
        },
        /**
         * reload tasks array
         */
        reloadTask() {
            axios
                .get(this.url_get_task)
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
         * @param {string} task 
         * @param {number} index 
         * @param {string} status 
         */
        change_status_task(task, index, status) {
            //console.log('task completata', index);

            const data = {
                text: task,
                index_task: index,
                status: status
            }

            axios.post(this.url_post_change_status, data, {
                headers: { 'Content-Type': 'multipart/form-data' }
            }).then((response) => {
                this.tasks = response.data
                //console.log(this.tasks);
            }).catch(error => {
                console.error(error.message);
            })
        },
        /**
         * 
         * @param {number} index 
         */
        delete_task(index) {
            //console.log('task eliminata', index);

            const data = {
                index_task: index,
            }

            axios
                .post(
                    this.url_post_delete_task,
                    data,
                    {
                        headers: { 'Content-Type': 'multipart/form-data' }
                    }).then((response) => {
                        //console.log(response);
                        this.tasks = response.data
                        this.test_delete_tasks = response.data
                        //console.log(this.tasks);
                    }).catch(error => {
                        console.error(error.message);
                    })
        }
    },
    mounted() {
        axios
            .get(this.url_get_task)
            .then(response => {
                //console.log(response.data);
                this.tasks = response.data
            })
            .catch(error => {
                console.error(error.message);
            })
    }
}).mount('#app')