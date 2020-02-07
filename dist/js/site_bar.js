function for_side_bar(text_href,is_active){
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": "http://wellmonitors.site:4000/api/site",
        "method": "GET",
        "headers": {
            "cache-control": "no-cache",
        }
    }
    
    $.ajax(settings).done(function (response) {
        var content_out = ""
        var for_select_box = ""
        console.log("--------- DEBUG FOR SITE ---------");
        console.log(response);
        console.log("----------------------------------");
        $("#menu-for-side").html(""); 
        $("#file_title").text(is_active)
        $("#site-fot-select").html(""); 
        for (var i = 0;i < response[0].length;i++){

            /************** create select box **************/
                if (is_active == response[0][i].g_name){
                    for_select_box += '<option value = "0">ALL</option>'                    
                    for (var m = 0;m < response[0][i].site.length;m++){
                        for_select_box += '<option valeu = "'+response[0][i].site[m]+'">'+response[0][i].site[m]+'</option>'
                    }
                    $("#site-fot-select").append(for_select_box)
                    $("#hidden-tag-site-group").val(response[0][i].g_name)

                    var settings = {
                        "async": true,
                        "crossDomain": true,
                        "url": "http://wellmonitors.site:4000/api/file/",
                        "method": "POST",
                        "headers": {
                            "Content-Type": "application/json",
                        },
                        "processData": false,
                        "data": "{ \n\t\"station_name\":\""+$("#hidden-tag-site-group").val()+"\"   " +(($("#site-fot-select").val() == 0) ? "" : ",\n\t\"site_name\":\""+$("#site-fot-select").val()+"\"\n")+ "      }"
                    }

                    console.log(settings);

                    $.ajax(settings).done(function (response) {
                        console.log(response);
                        pot_calender_js(response);
                    });

                    
                    $("#site-fot-select").change(function(){

                        var settings = {
                            "async": true,
                            "crossDomain": true,
                            "url": "http://wellmonitors.site:4000/api/file/",
                            "method": "POST",
                            "headers": {
                                "Content-Type": "application/json",
                            },
                            "processData": false,
                            "data": "{ \n\t\"station_name\":\""+$("#hidden-tag-site-group").val()+"\"   " +(($("#site-fot-select").val() == 0) ? "" : ",\n\t\"site_name\":\""+$("#site-fot-select").val()+"\"\n")+ "      }"
                        }

                        console.log(settings);

                        $.ajax(settings).done(function (response) {
                            console.log(response);
                            pot_calender_js(response);
                        });
                    });
                }
            /***********************************************/

            content_out += '<li class= "'+ ((is_active == response[0][i].g_name) ? "active" : "")  + '">'
                content_out += '<a href="'+text_href + "&site="+ response[0][i].g_name +'" style="font-size:16px;">'
                    content_out += '<i class="fa fa-circle-o" style= "color: #b593f6;"></i> ' + response[0][i].g_name
                content_out += '</a>'
            content_out += '</li>'
        }
        
        $("#menu-for-side").append(
            content_out
        );
    });
}
