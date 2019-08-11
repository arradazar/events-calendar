<template>
    <form @submit.prevent="create">
        <div class="form-group adjust-margin">
            <input type="text" class="form-control main-input" placeholder="Enter title" v-model="title" autofocus required>
            <small id="emailHelp" class="form-text text-muted" style="opacity: 0.7;position: relative;top: -12px;">Keep it short yet descriptive.</small>
        </div>
        <div class="form-group from adjust-margin">
            <div class="row">
                <div class="col-lg-6">
                    <label>From</label>
                    <input type="date" id="from" name="from"
                    v-model="from">
                </div>
                <div class="col-lg-6">
                    <label>To</label>
                    <input type="date" id="to" name="to"
                    value="2018-07-22"
                    v-model="to">
                </div>
            </div>
        </div>
        <div class="week-wrap adjust-margin">
            <label style="font-size:12px;">Every</label>
            <div class="form-group form-check days_wrap" style="display: flex;">
                <div class="day">
                    <input type="checkbox" class="form-check-input" id="sunday" value="sunday" v-model="checkedDays">
                    <label class="form-check-label" for="sunday">Sunday</label>
                </div>
                <div class="day">
                    <input type="checkbox" class="form-check-input" id="monday" value="monday" v-model="checkedDays">
                    <label class="form-check-label" for="monday">Monday</label>
                </div>
                <div class="day">
                    <input type="checkbox" class="form-check-input" id="tuesday" value="tuesday" v-model="checkedDays">
                    <label class="form-check-label" for="tuesday">Tuesday</label>
                </div>
            </div>
            <div class="form-group form-check days_wrap" style="display: flex;">
                <div class="day">
                    <input type="checkbox" class="form-check-input" id="wednesday" value="wednesday" v-model="checkedDays">
                    <label class="form-check-label" for="wednesday">Wednesday</label>
                </div>
                <div class="day">
                    <input type="checkbox" class="form-check-input" id="thursday" value="thursday" v-model="checkedDays">
                    <label class="form-check-label" for="thursday">Thursday</label>
                </div>
                <div class="day">
                    <input type="checkbox" class="form-check-input" id="friday" value="friday" v-model="checkedDays">
                    <label class="form-check-label" for="friday">Friday</label>
                </div>
            </div>
            <div class="form-group form-check days_wrap" style="display: flex;">
                <div class="day">
                    <input type="checkbox" class="form-check-input" id="saturday" value="saturday" v-model="checkedDays">
                    <label class="form-check-label" for="saturday">Saturday</label>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary create-btn">Create</button>
    </form>
</template>
<script>
    import moment from 'moment'

    export default {
        mounted() {
            console.log('CalendarForm component mounted.');

            var currentDate = new Date();
            this.from = moment(currentDate).format('YYYY-MM-DD');
            this.to = moment(currentDate).format('YYYY-MM-DD');
        },
        data() {
            return {
                title: '',
                from: '',
                to: '',
                checkedDays: [],
                createdEvent:{}
            }
        },
        methods: {
            async create() {
                let uri = '/api/event/create';
                this.axios.post(uri, 
                    {
                        title: this.title,
                        from: this.from,
                        to: this.to,
                        day: this.checkedDays.toString()
                    }
                ).then((response) => {
                    // do something
                    this.createdEvent = response['data'];
                    this.$emit("inputData", this.createdEvent);
                    this.createdEvent = {};
                    this.$toasted.show("Event successfully created. Syncing to your calendar now...", { 
                        duration : 3000
                    });
                })
                .catch(function(response){
                    console.log(response);
                })
            },
            getEvent(event) {
                this.createdEvent = event;
            },
        }
    }
</script>
<style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
        padding-top:60px;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }
    .main-input {
        border: none;
        padding: 0;
        font-size: 28px;
    }

    /* Custom styles */
    input {
        outline:none!important;
    }
    .title-wrap h1{
        font-weight: bold;
        font-size: 45px;
        color: rgb(72, 72, 72) !important;
        font-family: Helvetica;
        max-width: 1100px;
        margin: 0px auto;
    }
    input[type="date"] {
        border: 1px solid #d2d2d2;
        font-size: 16px;
        padding: 18px 0px 0px;
    }
    .form-group.from label{
        position: absolute;
        font-size: 12px;
        padding: 3px;    position: absolute;
        font-size: 12px;
        padding: 3px;
    }
    .days_wrap .day label{
        position: relative;
        top: 1px;
        font-size: 13px;
    }
    .btn-primary {
        color: #fff;
        background-color: #007bff;
        border-color: rgb(0, 132, 137)!important;
        background-color: rgb(0, 132, 137)!important;
        border-radius: 3px;
        outline: none!important;
    }
    .day {
        width: 100%;
    }
    .adjust-margin{
        margin-bottom: 25px;
    }
    .form-control:focus {
        outline: none!important;
        border-color: #fdfdfd00!important;
        box-shadow: none!important;
    }
    .create-btn {
        width: 75%;
        margin: 0px auto;
    }
</style>
