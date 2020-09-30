function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
}

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function toggle(change)  {
    if(menu_status == 0) {
        $("#home_entry").hide();
        $("#trends_entry").hide();
        $("#sub_entry").hide();
        $("#account_entry").hide();
        $("#chrono_entry").hide();
        $("#photo_entry").hide();
        $("#video_entry").hide();
        $("#menu_entry").hide();
        $("#home_icon").show();
        $("#trends_icon").show();
        $("#sub_icon").show();
        $("#accounts_icon").show();
        $("#chrono_icon").show();
        $("#photo_icon").show();
        $("#video_icon").show();
        $("#menu_icon").show();
        $("#sidenavbar").css({"width": "4%"});
        menu_status = 1;
        setCookie("menu_toggle_status", menu_status, 365);
    } else {
        $("#home_entry").show();
        $("#trends_entry").show();
        $("#sub_entry").show();
        $("#account_entry").show();
        $("#chrono_entry").show();
        $("#photo_entry").show();
        $("#video_entry").show();
        $("#menu_entry").show();
        $("#home_icon").hide();
        $("#trends_icon").hide();
        $("#sub_icon").hide();
        $("#accounts_icon").hide();
        $("#chrono_icon").hide();
        $("#photo_icon").hide();
        $("#video_icon").hide();
        $("#menu_icon").hide();
        $("#sidenavbar").css({"width": "25vh"});
        menu_status = 0;
        setCookie("menu_toggle_status", menu_status, 365);
    }
}

var menu_status = getCookie("menu_toggle_status");

if(menu_status == "") {
    menu_status = 0;
    $("#home_entry").show();
    $("#trends_entry").show();
    $("#sub_entry").show();
    $("#account_entry").show();
    $("#chrono_entry").show();
    $("#photo_entry").show();
    $("#video_entry").show();
    $("#menu_entry").show();
    $("#home_icon").hide();
    $("#trends_icon").hide();
    $("#sub_icon").hide();
    $("#accounts_icon").hide();
    $("#chrono_icon").hide();
    $("#photo_icon").hide();
    $("#video_icon").hide();
    $("#menu_icon").hide();
} else {
    $("#home_entry").hide();
    $("#trends_entry").hide();
    $("#sub_entry").hide();
    $("#account_entry").hide();
    $("#chrono_entry").hide();
    $("#photo_entry").hide();
    $("#video_entry").hide();
    $("#menu_entry").hide();
    $("#home_icon").show();
    $("#trends_icon").show();
    $("#sub_icon").show();
    $("#accounts_icon").show();
    $("#chrono_icon").show();
    $("#photo_icon").show();
    $("#video_icon").show();
    $("#menu_icon").show();
    $("#sidenavbar").css({"width": "4%"});
}

$("#menu_toggle").click(function() {
    toggle(true);
})

