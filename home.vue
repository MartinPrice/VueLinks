<template>
    <div>
        <h6>Home Vue for indexvue page</h6>
        <h1>Current Visits</h1>
        <div v-for="visit in orderedVisits" v-bind:key="visit.id" class="flexContainer">
            <a :href="'/visits/' + visit.id + '/editVisit'" class="flexVisit">
            <span class="flexName">{{ visit.name }}</span>
            <span class="flexDate">{{ visitDateFormatted(visit) }}</span>
                <span v-for="activity in visit.activities" class="flexContainer">
                    <span class="flexTime">{{ (activity.activityTime).slice(0, -3) }}</span>
                    <span class="flexActivityName">{{ activity.type_name }}</span>
                    <span v-if="!activity.confirmed" class="flexStatus unconfirmed">Unconfirmed</span>                    
                    <span v-if="activity.confirmed" class="flexStatus confirmed">Confirmed</span>                
                </span>
            </a>
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

