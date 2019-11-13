<template>
    <div>
        <h1>Second Template on indexvue page</h1>
        <div v-for="visit in visits">
            <p>Visit id = {{ visit.id }}</p>
            {{ visit.name }}
            <input type="text" v-model="visit.name">
            {{ visit.user.name }}
            {{ postedOn(visit) }}
            <div v-for="activity in visit.activities">
                <p>Activity id = {{ activity.id }}</p>
                {{ activity.body }}
                <div v-for="requirement in activity.requirements">
                    Requirement id = {{ requirement.id }}
                </div>
            </div>
        </div>
    </div> 
</template>

<script>
    import moment from 'moment';
    export default {
        data() {
            return {
                visits: [],
            }
        },
        created() {
            axios.get('/api/visits')
                .then(response => this.visits = response.data);
        },
        methods: {
            postedOn(visit) {
                return moment(visit.created_at).fromNow();
            },
            visitDateFormatted(visit) {
                return moment(visit.visitDate).format("DD/MM/YYYY");
            },
        },
        computed: {
            orderedVisits: function() {
                return _.orderBy(this.visits, 'visitDate', 'desc')
            }
        },
    }
</script>

