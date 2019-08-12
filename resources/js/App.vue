<template>
    <div class="flex-top position-ref full-height">
        <div class="title-wrap">
            <h1>Event Calendar</h1>
            <hr>
        </div>
        <div class="container">
            <div id="app">
                <div class="row">
                    <div class="col-lg-4">
                        <calendar-form @inputData="getEvent"></calendar-form>
                    </div>
                    <div class="col-lg-8">
                        <events :event="createdEvent"></events>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import CalendarForm from './components/CalendarForm.vue';
    import Events from './components/Events.vue';
    import moment from 'moment'

    export default {
        name: "App",
        mounted() {
            console.log('Vue App mounted.');

        },
        data: function() {
            return {
                createdEvent: {},
                monthCnt:Number
            };
        },
        components: {
            CalendarForm,
            Events
        },
        methods: {
            getEvent(event) {
                this.createdEvent= event;
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
    .toasted-container.top-right {
        position: absolute;
        left: 0;
        top: -10px;
        width: 100vw;
    }
    .toasted-container.top-right .toasted {
        border-radius: 0px;
        padding: 20px;
        box-shadow: none;
        color: #f5de3c;
    }
</style>
