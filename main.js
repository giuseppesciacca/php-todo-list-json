
const { createApp } = Vue

createApp({
    data() {
        return {
            tasks: [],
            api_url: './get_task.php',
            new_task: '',
        }
    },
    methods: {
        addTask() {
            console.log('stai provando ad inviare una task');
            console.log(this.new_task);
        }
    },
    mounted() {
        axios
            .get(this.api_url)
            .then(response => {
                console.log(response.data);
                this.tasks = response.data
            })
            .catch(error => {
                console.error(error.message);
            })
    }
}).mount('#app')
