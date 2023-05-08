
const { createApp } = Vue

createApp({
    data() {
        return {
            tasks: [],
            api_url: './get_task.php',
        }
    },
    methods: {

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
