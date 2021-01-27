<?php $date = date('d-m-Y'); ?>
<div class="content-w">
      <div class="os-tabs-w menu-shad">
        <div class="os-tabs-controls">
          <ul class="nav nav-tabs upper">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url();?>teacher/noticeboard/"><i class="os-icon picons-thin-icon-thin-0010_newspaper_reading_news"></i><span><?php echo get_phrase('noticeboard');?></span></a>
            </li>
             <li class="nav-item">
              <a class="nav-link active" href="<?php echo base_url();?>teacher/calendar/"><i class="os-icon picons-thin-icon-thin-0021_calendar_month_day_planner"></i><span><?php echo get_phrase('events');?></span></a>
            </li>
          </ul>
        </div>
      </div>

    <div class="content-i">
        <div class="content-box">
            <div id="print_area">
            <div class="row">
                <div class="col-sm-4">
                    <img style="float: left; height: 50px;" src="<?php echo base_url();?>uploads/logo-color.png">
                </div> 
                <div class="col-sm-4">
                    <h4 style="text-align: center; margin-top: 20px;"></h4> 
                </div> 
                <div class="col-sm-4">
                    <h4 style="text-align: right;  margin-top: 20px;"><?php echo get_phrase('events');?></h4>
                </div>
            </div>
            <div class="col-md-12 shadow lined-primary">
                <div class="calendar-env"><br>
                    <div class="main_data">
                        <div id="event_calendar"></div>
                            <script type="text/javascript">
                                $(document).ready(function()
                                {
                                    var calendar = $('#event_calendar');
                                    calendar.fullCalendar({
                                    header: {
                                        left: 'title',
                                        right: 'month,agendaWeek,agendaDay today prev,next'
                                    },
                                    buttonText: {
                                        today: 'Today',
                                        month: 'Monh',
                                        week: 'Week',
                                        day: 'Day'
                                    },
                                    monthNames: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
                                    monthNamesShort: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
                                    dayNamesShort: ['Sun','Mon','Tues','Wed','Thurs','Fri','Sat','Sun'],
                                    dayNames: ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'],
                                    editable: false,
                                    firstDay: 0,
                                    height: 600,
                                    contentHeight: 'auto',
                                    droppable: false,
                                    events:
                                    [
                                        <?php
                                            $events = $this->db->get_where('calendar_event')->result_array();
                                            foreach ($events as $row): ?>
                                        {
                                            title : "<?php echo $row['title']; ?>",
                                            start : new Date(<?php echo date('Y', $row['start_timestamp']); ?>,<?php echo date('m', $row['start_timestamp']) - 1; ?>,<?php echo date('d', $row['start_timestamp']); ?>), 
                                            end : new Date(<?php echo date('Y', $row['end_timestamp']); ?>, <?php echo date('m', $row['end_timestamp']) - 1; ?>, <?php echo date('d', $row['end_timestamp'])-1; ?>),
                                            allDay: true,
                                            id: "<?php echo $row['calendar_event_id']; ?>",
                                            color: "<?php echo $row['colour']; ?>",
                                            tip: 'add new event'
                                        },
                                            <?php endforeach ?>
                                        ],
                            eventClick: function(calEvent, jsEvent, view) {
                        var event_id = calEvent.id;
                                showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/calendar_event_read/' + event_id);
                        },
                        drop: function(date, allDay) {
                        var $this = $(this),
                                eventObject = {
                                title: $this.text(),
                                        start: date,
                                        allDay: allDay,
                                        className: $this.data('event-class')
                                };
                                calendar.fullCalendar('renderEvent', eventObject, true);
                                $this.remove();
                            }
                        });
                            $('.fc-day').css('cursor', 'crosshair');
                            $('.fc-event-inner').css('cursor', 'pointer');     
                        });
                    </script>
                    </div>
                    <hr>
                    <p style="text-align: justify;" id="desc"> </p><br>
                </div>
            </div><br>
            </div>
            <button class="btn btn-rounded btn-primary pull-right" onclick="printDiv('print_area')" ><?php echo get_phrase('print');?></button><br><br><br>
        </div>
    </div>
</div>


<script>
 function printDiv(name) 
 {
     var content= document.getElementById(name).innerHTML;
     var original= document.body.innerHTML;
     document.body.innerHTML = content;
     window.print();
     document.body.innerHTML = original;
}
</script>