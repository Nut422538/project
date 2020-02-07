function  pot_calender_js(data_calender_json) {
    var raw_data = data_calender_json;
    data_calender_json[0] = data_calender_json.data
    console.log(data_calender_json)
    var pre_update = [],time_adj = [],holiday_sp = [],station_id = [];

    for (var i = 0;i < data_calender_json[0].length;i++){
        // var date = new Date(data_calender_json[0][i].shot_time.split("/")[2], data_calender_json[0][i].shot_time.split("/")[0], data_calender_json[0][i].shot_time.split("/")[1], 0, 0, 0);
        // var date_ = ((parseInt(date.getDate()) > 9) ? "" : "0" ) + date.getDate();
        // var date_end = ((parseInt(date.getDate()) > 9) ? "" : "0" ) + (date.getDate() + 1);
        // var month = (parseInt((date.getMonth()) > 9) ? "" : "0" ) + date.getMonth(); 
        // var year = date.getFullYear();
        // var full_date_start = year + "-" + month + "-" + date_;
        // var full_date_end = year + "-" + month + "-" + date_end;
        var format_date = data_calender_json[0][i].shot_time.split("/")[2] +"-"+ data_calender_json[0][i].shot_time.split("/")[0] +"-"+ data_calender_json[0][i].shot_time.split("/")[1]
        var date_start = moment(format_date,'YYYY-MM-DD HH:mm:ss').format('YYYY-MM-DD');
        var date_end = moment(format_date,'YYYY-MM-DD HH:mm:ss').add(1,"days").format('YYYY-MM-DD');

        // if (data_calender_json[0][i].file_name == "SKJ1-1.206"){
        //     console.log("========================================================")
        //     console.log(date_start + " " + date_end)
        //     console.log("========================================================")
        // }
        
        pre_update.push({
            title: data_calender_json[0][i].file_name,
            start: date_start,
            end: date_end,
            color: "#257e44"
        })
        station_id.push({
            station: data_calender_json[0][i].station_id
        });
    }
    var eve_arr = [];
    var data_calender_json = {
        pre_update: pre_update,
        time_adj:time_adj,
        holiday_sp:holiday_sp,
        station_id:station_id
    }

    eve_arr = data_calender_json.pre_update
    eve_arr = eve_arr.concat(data_calender_json.time_adj)
    eve_arr = eve_arr.concat(data_calender_json.holiday_sp)
    console.log(eve_arr)
    $("#calendar").html("");
    var calendarEl = document.getElementById('calendar');
    var config_____ = {
        eventClick: function(info) {
            // alert('Event: ' + info.event.title);
            // console.log(data_calender_json)
            for (var i = 0;i < raw_data[0].length;i++){
                if (raw_data[0][i].file_name == info.event.title){
                    console.log(raw_data[0][i].station_name+"/"+raw_data[0][i].file_name)
                    twm_file_download(raw_data[0][i].file_name, raw_data[0][i].station_name);
                }
            }
            // for (var i = 0;i < data_calender_json.pre_update[i].length;i++){
            //     if (data_calender_json.pre_update[i].title == info.event.title){
            //         twm_file_download(data_calender_json.pre_update[i].title,data_calender_json.station_id[i].title);
            //     }
            // }
            // console.log(raw_data[0][z].file_name,raw_data[0][z].station_name);
            // twm_file_download(raw_data[0][z].file_name,raw_data[0][z].station_name);
        },
        plugins: [ 'interaction', 'dayGrid', 'timeGrid' ],
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth'
        },
        businessHours: true, 
        businessHours: [ 
            {
                daysOfWeek: [1, 2, 3, 4, 5, 6], 
                color: '#ff9f89'
            }
        ],
        defaultDate: new Date(),
        navLinks: true, 
        selectable: true,
        selectMirror: true,
        select: function(arg) {
            var full_start = full_date(
                parseInt(moment(arg.startStr,'YYYY-MM-DDTHH:mm:ss').format('YYYY')) + 543,
                moment(arg.startStr,'YYYY-MM-DDTHH:mm:ss').format('MM'), 
                moment(arg.startStr,'YYYY-MM-DDTHH:mm:ss').format('DD'), 
                moment(arg.startStr,'YYYY-MM-DDTHH:mm:ss').format('dd')
            );
            var full_end = full_date(
                parseInt(moment(arg.startStr,'YYYY-MM-DDTHH:mm:ss').format('YYYY')) + 543,
                moment(arg.startStr,'YYYY-MM-DDTHH:mm:ss').format('MM'), 
                moment(arg.startStr,'YYYY-MM-DDTHH:mm:ss').format('DD'), 
                moment(arg.startStr,'YYYY-MM-DDTHH:mm:ss').format('dd')
            );
            $("#start_date").val(arg.startStr)
            $("#end_date").val(arg.endStr)
            $("#title_call_12").text("FILE ECHOMETER : " + full_start);
            console.log("=================================== DEBUG ===================================");
            console.log(raw_data.data);
            console.log(arg.startStr) //2019-10-28
            var content_modal_calenda = "";
            var count= 0;
            for (var z = 0;z < raw_data.data.length;z++){
                if (arg.startStr == (raw_data[0][z].shot_time.split("/")[2] + "-" + ((raw_data[0][z].shot_time.split("/")[0] > 9) ? "" : "0" ) + raw_data[0][z].shot_time.split("/")[0] + "-" + ((raw_data[0][z].shot_time.split("/")[1] > 9) ? "" : "0" ) + raw_data[0][z].shot_time.split("/")[1] )){
                    count++;             // ((raw_data[0][z].shot_time.split("/")[0] > 9) ? "" : "0" )     ((raw_data[0][z].shot_time.split("/")[1] > 9) ? "" : "0" )
                    content_modal_calenda += '<tr>'
                        content_modal_calenda += '<th scope="row">'+count+'</th>'
                        content_modal_calenda += '<td>'+raw_data[0][z].file_name+'</td>'
                        content_modal_calenda += '<td>'+raw_data[0][z].time+'</td>'
                        content_modal_calenda += '<td><button class="btn btn-info" onclick = "twm_file_download(\''+raw_data[0][z].file_name+'\',\''+raw_data[0][z].station_name+'\')" type = "button">DOWNLOAD</button></td>'
                    content_modal_calenda += '</tr>'
                }
            }
            $("#content_calendar").html("");
            $("#content_calendar").append(content_modal_calenda);
            console.log("=============================================================================");
            $('#exampleModal').modal({
                show: 'ture'
            }); 
            
        },
        editable: false,
        eventLimit: true, 
        events: eve_arr,
        // dateClick: function(info) {
        //     console.log(info)
        //     console.log("=================================== DEBUG ===================================");
        //     console.log(data_calender_json);
        //     console.log("=============================================================================");
        //     $('#exampleModal').modal({
        //         show: 'ture'
        //     }); 
        // },
        // selectionInfo: function(info){
        //     $('#exampleModal').modal({
        //         show: 'ture'
        //     }); 
        // },
        // selectOverlap : function(info){
        //     $('#exampleModal').modal({
        //         show: 'ture'
        //     }); 
        // }
    }
    var calendar = new FullCalendar.Calendar(calendarEl, config_____);
    calendar.render();

    // $(".fc-event-container").click(function(){
    //     console.log($(".fc-event-container").text())    
    // });
}

// render_ui_select_date(int mode);
// 1 -> set update  
// 2 -> set holiday
// 3 -> set adj time
function render_ui_select_date(mode){
    var content  = ""
    if (mode == 1){
        content += '<br><hr><h3><center id = "title_call_1">อัพเดทล่วงหน้า</center></h3><hr><div class="form-group"><div class="row"><div class="col-sm-3" style = "padding-top:8px;"><label for="exampleInputEmail1">หัวข้ออัพเดทล่วงหน้า</label></div><div class="col-sm-9"><input type = "text" id="de_file" name = "de_file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=""><input hidden id = "mode" name = "mode"value = "1"/></div></div><div class="row"><div class="col-sm-3" style = "padding-top:8px;"><label for="exampleInputEmail1">เลือกไฟล์</label></div><div class="col-sm-9"><input type="file" class="form-control-file" name="file_csv" id="file_csv" accept="csv/*"/></div></div><br><br></div>'
        $("#content_form").html("");
        $('#content_form').append(content);
        $("#btn_update").prop("disabled", true);
        $("#btn_holiday").prop("disabled", false);
    }else if (mode == 2){
        content += '<br><hr><h3><center id = "title_call_2">วันหยุด</center></h3><hr><div class="form-group"><div class="col-sm-3" style = "padding-top:8px;"><label for="exampleInputEmail1">หัวข้อวันหยุด</label></div><div class="col-sm-9"><input type = "text" id="de_holiday" name = "de_holiday" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=""><input hidden id = "mode" name = "mode"value = "2"/></div><br><br></div>'
        $("#content_form").html("");
        $('#content_form').append(content);
        $("#btn_update").prop("disabled", false);
        $("#btn_holiday").prop("disabled", true);
    }else if (mode == 3){

    }
}
//  return วันจันทร์ที่ 10 มิถุนายน พ.ศ. 2562
function full_date(yy,mm,DD,dd){
    
    var thday = new Array ("อาทิตย์","จันทร์", "อังคาร","พุธ","พฤหัส","ศุกร์","เสาร์"); 
    var thmonth = new Array ("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน", "กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"); 
    if (dd == "Su"){
        dd = 0
    }else if (dd == 'Mo'){
        dd = 1
    }else if (dd == 'Tu'){
        dd = 2
    }else if (dd == 'We'){
        dd = 3
    }else if (dd == 'Th'){
        dd = 4
    }else if (dd == "Fr"){
        dd = 5
    }else if (dd == "Sa"){
        dd = 6
    }
    return "วัน" + thday[dd] + "ที่ " + DD + " " + thmonth[mm -1] + " พ.ศ. " + yy
}
//     // var now_date_s = arg.startStr
//     // var now_date_e = arg.endStr
//     // console.log('1 ' + now_date_e)
//     // console.log('2 ' + now_date_s)
//     // // JSON.stringify(arg.start)
//     // console.log('3 ' + moment(data_calender_json[1].start,'YYYY-MM-DDTHH:mm:ss').format('YYYY-MM-DD'))
//     // console.log('4 ' + moment(data_calender_json[1].end,'YYYY-MM-DDTHH:mm:ss').format('YYYY-MM-DD'))
//     // // console.log(moment(now_date_s).isBetween(moment(data_calender_json[1].start,'YYYY-MM-DDTHH:mm:ss').format('YYYY-MM-DD'), moment(data_calender_json[1].end,'YYYY-MM-DDTHH:mm:ss').format('YYYY-MM-DD')))
//     // for (var i= 0;i < data_calender_json.length;i++){
//     //     var date = moment(now_date_s, 'YYYY-MM-DD');
//     //     var startDate = moment(data_calender_json[i].start,'YYYY-MM-DDTHH:mm:ss').format('YYYY-MM-DD')
//     //     var endDate = moment(data_calender_json[i].end,'YYYY-MM-DDTHH:mm:ss').format('YYYY-MM-DD')
//     //     console.log("date :"+ date + " start date : "+ startDate + " end date : " + endDate);
//     //     if (date.isBefore(endDate) && date.isAfter(startDate) || (date.isSame(startDate) || date.isSame(endDate)) ) { 
//     //         console.log('yes')
//     //     } else {
//     //         console.log('no')
//     //     }
//     //     // console.log(moment(now_date_s).isBetween(moment(data_calender_json[i].start,'YYYY-MM-DDTHH:mm:ss').format('YYYY-MM-DD'), moment(data_calender_json[i].start,'YYYY-MM-DDTHH:mm:ss').format('YYYY-MM-DD')))
//     //     // if (moment(data_calender_json[i].start,'YYYY-MM-DDTHH:mm:ss').format('YYYY-MM-DD') == now_date_s){
//     //     //     console.log('test')
//     //     //     // var a = moment(now_date_s,'YYYY-MM-DD HH:mm:ss');
//     //     //     // var b = moment(moment(data_calender_json[i].end,'YYYY-MM-DDTHH:mm:ss').format('YYYY-MM-DD'),'YYYY-MM-DD HH:mm:ss');
//     //     //     // var sum = b.diff(a, "day");
//     //     //     // console.log("diff s and e " + (sum - 1))
//     //     // }
//     // }
//     // var ddd = moment(arg.start,'YYYY-MM-DDTHH:mm:ss');
//     // console.log(ddd.format('YYYY-MM-DDTHH:mm:ss'))
