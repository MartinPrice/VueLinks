<template>
    <div>
        <h6>Second Vue template from Vue link on indexvue page</h6>
        <form method="POST" action="/api/visits" @submit.prevent="onSubmit"/>
            <input type="text" v-model="name"/>
            <button type="submit">Submit</button>
        </form>
    </div>
</template>

<script>
    export default {
        data: {
            name: '',
        },
        methods: {
            onSubmit() {
                axios.post('/api/visits', this.$data)
                    .then(response => alert('Success'));
            }
        },
    }
</script>
