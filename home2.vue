<template>
    <div>
        <h1>Home vue for createVisit page</h1>
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

<!--    <h1>Keep as example of 'oneToMany' relationship 3 tables deep</h1>
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
        </div>-->

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

