<template>
    <div class="calendar-view-wrap">
        <div class="month-bg">
            <label>{{ createdEvent.from | moment("MMMM") }} {{ createdEvent.from | moment("YYYY") }}</label>
        </div>
        <div class="day-view-wrap">
            <div class="row event-wrap" v-bind:class="{ showEvent: date.showEvent }" v-for="date in dates">
                <div class="col-lg-1" style="text-align: center;">
                    <div class="day">
                        {{ date.value | moment("ddd") }}
                    </div>
                    <div class="day-value">
                        {{ date.value | moment("D") }}
                    </div>
                </div>
                <div class="col-lg-11" v-if="date.showEvent" style="padding-left: 0;">
                    <div class="event-card event-card-wrap">
                        <div class="title">{{ date.title }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    function Event({ id, title, from, to, day}) {
        this.id = id;
        this.title = title;
        this.from = from;
        this.to = to;
        this.day = day;
    }

    import moment from 'moment'

    export default {
        mounted() {
            console.log('Events component mounted.');
            this.setDefault();
            this.drawEventCalendar();
        },
        props: {
            event: {}
        },
        data() {
            return {
                createdEvent: {},
                dates: []
            }
        },
        watch: {
            event: function() {
                this.createdEvent = this.event;
                this.drawEventCalendar();
            }
        },
        methods: {
            drawEventCalendar() {
                // reset event list
                this.dates=[];

                let day_from = moment(this.createdEvent.from).format('DD');
                let day_to = moment(this.createdEvent.to).format('DD');
                let month = moment(this.createdEvent.from).format('MM');
                let year = moment(this.createdEvent.from).format('YYYY');
                let monthYear = moment(this.createdEvent.from).format('MM-YYYY');
                let totalDays = moment(monthYear, "MM-YYYY").daysInMonth();

                var weekList = [];
                if(this.createdEvent.day){
                    weekList = this.createdEvent.day.split(',');
                }

                //get dates in a month
                for (let day = 1; day <= totalDays; day++) {
                    let formDate = moment((year+"-"+month+"-"+day), "YYYY-MM-DD");
                    //when to show event
                    var showEvent = 0;
                    if((day >= day_from) && (day <= day_to)) {
                        if(weekList.length > 0) {
                            weekList.forEach(function(element) {
                                let dayOfWeek = (moment(formDate).format('dddd')).toLowerCase();
                                if(element === dayOfWeek) {
                                    showEvent = 1;
                                }
                            });
                        }
                        else {
                            showEvent = 1;
                        }
                    }

                    this.dates.push(
                        {
                            'value': formDate,
                            'showEvent': showEvent,
                            'title': this.createdEvent.title
                        }
                    );
                }
            },
            setDefault() {
                var currentDate = new Date();
                
                this.createdEvent.from = moment(currentDate).format('YYYY-MM-DD');
                this.createdEvent.to = moment(currentDate).format('YYYY-MM-DD');
                this.createdEvent.day = ' ';
                this.dates = [];
            }
        }
    }
</script>
<style>
    .day {
        font-size: 11px;
        font-family: Helvetica Neue;
        font-weight: 400;
        margin-top: -4px;
    }
    .title{
        font-size: 16px;
        font-family: Helvetica Neue;
        font-weight: 400;
        color: #241c15;
    }
    .day-value {
        font-size: 16px;
        font-family: Helvetica Neue;
        font-weight: 400;
        width: 25px;
        height: 25px;
    }
    .event-card-wrap {
        display: flex;
        align-items: center;
        background: #ecc229;
        border-radius: 5px;
        width: 100%!important;
        padding: 7px 10px;
    }
    .month-bg label{
        color: #000!important;
        font-size: 28px;
    }
    .month-bg {
        background-image: url(https://storage.googleapis.com/gd-wagtail-prod-assets/original_images/news_calendargoals_1080.gif);
        height: 160px;
        border-radius: 5px;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }
    .day-view-wrap {
        padding: 10px 0px;
        border-bottom: 1px solid #eaeaea;
        height: 450px;
        overflow-y: scroll;
    }
    .row.event-wrap {
        padding: 25px 0px 20px;
        border-bottom: 1px solid #e0e0e047;
    }
    .row.event-wrap:last-child {
        border-bottom: none;
    }
    .showEvent .day{
        color: #0669e4;
    }
    .showEvent .day-value{
        background: #0669e4;
        color: #fff;
        border-radius: 50px;
    }
    .showEvent.row.event-wrap{
        background: repeating-linear-gradient(-45deg, rgb(255, 255, 255), rgb(255, 255, 255) 3px, rgb(235, 235, 235) 3px, rgb(235, 235, 235) 4px);
    }
</style>
