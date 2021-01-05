$(document).ready(function () {
    var m = 0;
    var tu = 0;
    var w = 0;
    var th = 0;
    var f = 0;
    var sa = 0;
    var su = 0;
    var sc = parseInt(document.getElementById("nos").innerHTML);

    $(this).on("click", "#mondaytime", function () {
        var html =
            '<div style="margin-bottom:5px; margin-left:20px;"  class="list"><input placeholder="hrs:mins" pattern="^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$" style="float: left; margin-right:5px;" type="time" id="';
        html += "MT" + m.toString() + '">';
        html +=
            '<select style="float: left; margin-right:5px;" name="screens" id="';
        html += "Mscreen" + m.toString() + '">';
        for (var j = 1; j <= sc; j++) {
            html += '<option value="';
            html += j.toString() + '">' + j.toString() + "</option>";
        }
        html += "</select><br><br>";
        html += "</div>";
        $(".mschedule").append(html);
        m++;
    });

    $(this).on("click", "#tuesdaytime", function () {
        var html =
            '<div style="margin-bottom:5px; margin-left:20px;"  class="list"><input placeholder="hrs:mins" pattern="^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$" style="float: left; margin-right:5px;" type="time" id="';
        html += "TUT" + tu.toString() + '">';
        html +=
            '<select style="float: left; margin-right:5px;" name="screens" id="';
        html += "TUscreen" + tu.toString() + '">';
        for (var j = 1; j <= sc; j++) {
            html += '<option value="';
            html += j.toString() + '">' + j.toString() + "</option>";
        }
        html += "</select><br><br>";
        html += "</div>";
        $(".tuschedule").append(html);
        tu++;
    });

    $(this).on("click", "#wednesdaytime", function () {
        var html =
            '<div style="margin-bottom:5px; margin-left:20px;"  class="list"><input placeholder="hrs:mins" pattern="^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$" style="float: left; margin-right:5px;" type="time" id="';
        html += "WT" + w.toString() + '">';
        html +=
            '<select style="float: left; margin-right:5px;" name="screens" id="';
        html += "Wscreen" + w.toString() + '">';
        for (var j = 1; j <= sc; j++) {
            html += '<option value="';
            html += j.toString() + '">' + j.toString() + "</option>";
        }
        html += "</select><br><br>";
        html += "</div>";
        $(".wschedule").append(html);
        w++;
    });

    $(this).on("click", "#thursdaytime", function () {
        var html =
            '<div style="margin-bottom:5px; margin-left:20px;"  class="list"><input placeholder="hrs:mins" pattern="^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$" style="float: left; margin-right:5px;" type="time" id="';
        html += "THT" + th.toString() + '">';
        html +=
            '<select style="float: left; margin-right:5px;" name="screens" id="';
        html += "THscreen" + th.toString() + '">';
        for (var j = 1; j <= sc; j++) {
            html += '<option value="';
            html += j.toString() + '">' + j.toString() + "</option>";
        }
        html += "</select><br><br>";
        html += "</div>";
        $(".thschedule").append(html);
        th++;
    });

    $(this).on("click", "#fridaytime", function () {
        var html =
            '<div style="margin-bottom:5px; margin-left:20px;"  class="list"><input placeholder="hrs:mins" pattern="^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$" style="float: left; margin-right:5px;" type="time" id="';
        html += "FT" + f.toString() + '">';
        html +=
            '<select style="float: left; margin-right:5px;" name="screens" id="';
        html += "Fscreen" + f.toString() + '">';
        for (var j = 1; j <= sc; j++) {
            html += '<option value="';
            html += j.toString() + '">' + j.toString() + "</option>";
        }
        html += "</select><br><br>";
        html += "</div>";
        $(".fschedule").append(html);
        f++;
    });

    $(this).on("click", "#saturdaytime", function () {
        var html =
            '<div style="margin-bottom:5px; margin-left:20px;"  class="list"><input placeholder="hrs:mins" pattern="^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$" style="float: left; margin-right:5px;" type="time" id="';
        html += "SAT" + sa.toString() + '">';
        html +=
            '<select style="float: left; margin-right:5px;" name="screens" id="';
        html += "SAscreen" + sa.toString() + '">';
        for (var j = 1; j <= sc; j++) {
            html += '<option value="';
            html += j.toString() + '">' + j.toString() + "</option>";
        }
        html += "</select><br><br>";
        html += "</div>";
        $(".saschedule").append(html);
        sa++;
    });

    $(this).on("click", "#sundaytime", function () {
        var html =
            '<div style="margin-bottom:5px; margin-left:20px;"  class="list"><input placeholder="hrs:mins" pattern="^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$" style="float: left; margin-right:5px;" type="time" id="';
        html += "SUT" + su.toString() + '">';
        html +=
            '<select style="float: left; margin-right:5px;" name="screens" id="';
        html += "SUscreen" + su.toString() + '">';
        for (var j = 1; j <= sc; j++) {
            html += '<option value="';
            html += j.toString() + '">' + j.toString() + "</option>";
        }
        html += "</select><br><br>";

        html += "</div>";
        $(".suschedule").append(html);
        su++;
    });

    $(this).on("click", "#mremove", function () {
        if (m > 0) {
            var k = m;
            var tid = "MT" + (k - 1).toString();
            var del = document.getElementById(tid).parentElement;
            del.remove();
            m--;
        }
    });

    $(this).on("click", "#turemove", function () {
        if (tu > 0) {
            var k = tu;
            var tid = "TUT" + (k - 1).toString();
            var del = document.getElementById(tid).parentElement;
            del.remove();
            tu--;
        }
    });

    $(this).on("click", "#wremove", function () {
        if (w > 0) {
            var k = w;
            var tid = "WT" + (k - 1).toString();
            var del = document.getElementById(tid).parentElement;
            del.remove();
            w--;
        }
    });

    $(this).on("click", "#thremove", function () {
        if (th > 0) {
            var k = th;
            var tid = "THT" + (k - 1).toString();
            var del = document.getElementById(tid).parentElement;
            del.remove();
            th--;
        }
    });

    $(this).on("click", "#fremove", function () {
        if (f > 0) {
            var k = f;
            var tid = "FT" + (k - 1).toString();
            var del = document.getElementById(tid).parentElement;
            del.remove();
            f--;
        }
    });

    $(this).on("click", "#saremove", function () {
        if (sa > 0) {
            var k = sa;
            var tid = "SAT" + (k - 1).toString();
            var del = document.getElementById(tid).parentElement;
            del.remove();
            sa--;
        }
    });

    $(this).on("click", "#suremove", function () {
        if (su > 0) {
            var k = su;
            var tid = "SUT" + (k - 1).toString();
            var del = document.getElementById(tid).parentElement;
            del.remove();
            su--;
        }
    });

    $(this).on("click", "#post", function () {
        var schedule = {};
        var monday = [];
        var tuesday = [];
        var wednesday = [];
        var thursday = [];
        var friday = [];
        var saturday = [];
        var sunday = [];
        var name = document.getElementById("opp").value;
        var chech = true;

        if (
            m == 0 &&
            tu == 0 &&
            w == 0 &&
            th == 0 &&
            f == 0 &&
            sa == 0 &&
            su == 0 &&
            name != ""
        ) {
            var load = document.getElementById("wrapper");
            load.style.display = "none";
            var al = document.getElementById("werefaAlert");
            al.style.display = "block";
            $("#mesage").html("add a schedule!");
        } else {
            if (m > 0) {
                for (var j = 0; j < m; j++) {
                    var tid = "MT" + j.toString();
                    var sid = "Mscreen" + j.toString();
                    var time = document.getElementById(tid).value;
                    var screen = document.getElementById(sid).value;
                    if (time != "") {
                        monday[j] = new Array(onTimeChange(time), screen);
                    } else {
                        chech = false;
                    }
                }
                schedule.Monday = monday;
            }

            if (tu > 0) {
                for (var j = 0; j < tu; j++) {
                    var tid = "TUT" + j.toString();
                    var sid = "TUscreen" + j.toString();
                    var time = document.getElementById(tid).value;
                    var screen = document.getElementById(sid).value;
                    if (time != "") {
                        tuesday[j] = new Array(onTimeChange(time), screen);
                    } else {
                        chech = false;
                    }
                }
                schedule.Tuesday = tuesday;
            }

            if (w > 0) {
                for (var j = 0; j < w; j++) {
                    var tid = "WT" + j.toString();
                    var sid = "Wscreen" + j.toString();
                    var time = document.getElementById(tid).value;
                    var screen = document.getElementById(sid).value;
                    if (time != "") {
                        wednesday[j] = new Array(onTimeChange(time), screen);
                    } else {
                        chech = false;
                    }
                }
                schedule.Wednesday = wednesday;
            }

            if (th > 0) {
                for (var j = 0; j < th; j++) {
                    var tid = "THT" + j.toString();
                    var sid = "THscreen" + j.toString();
                    var time = document.getElementById(tid).value;
                    var screen = document.getElementById(sid).value;
                    if (time != "") {
                        thursday[j] = new Array(onTimeChange(time), screen);
                    } else {
                        chech = false;
                    }
                }
                schedule.Thursday = thursday;
            }

            if (f > 0) {
                for (var j = 0; j < f; j++) {
                    var tid = "FT" + j.toString();
                    var sid = "Fscreen" + j.toString();
                    var time = document.getElementById(tid).value;
                    var screen = document.getElementById(sid).value;
                    if (time != "") {
                        friday[j] = new Array(onTimeChange(time), screen);
                    } else {
                        chech = false;
                    }
                }
                schedule.Friday = friday;
            }

            if (sa > 0) {
                for (var j = 0; j < sa; j++) {
                    var tid = "SAT" + j.toString();
                    var sid = "SAscreen" + j.toString();
                    var time = document.getElementById(tid).value;
                    var screen = document.getElementById(sid).value;
                    if (time != "") {
                        saturday[j] = new Array(onTimeChange(time), screen);
                    } else {
                        chech = false;
                    }
                }
                schedule.Saturday = saturday;
            }

            if (su > 0) {
                for (var j = 0; j < su; j++) {
                    var tid = "SUT" + j.toString();
                    var sid = "SUscreen" + j.toString();
                    var time = document.getElementById(tid).value;
                    var screen = document.getElementById(sid).value;
                    if (time != "") {
                        sunday[j] = new Array(onTimeChange(time), screen);
                    } else {
                        //alert("time null");
                        chech = false;
                    }
                }
                schedule.Sunday = sunday;
            }

            if (name != "" && chech == true) {
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                });

                $.ajax({
                    type: "POST",
                    url: "/add",
                    data: {
                        name: name,
                        schedule: schedule,
                    },
                    cache: false,

                    success: function (html) {
                        if (html == 0) {
                            var load = document.getElementById("wrapper");
                            load.style.display = "none";
                            var al = document.getElementById("werefaAlert");
                            al.style.display = "block";
                            $("#mesage").html(
                                "Already schedule added for this movie!"
                            );
                        } else {
                            window.location.reload();
                        }
                    },
                    error: function (data) {
                        alert(data);
                        console.log(data);
                    },
                });
            } else {
                var al = document.getElementById("werefaAlert");
                al.style.display = "block";
                $("#mesage").html("Choose Movie or add time correctly!");
            }
        }
    });

    function onTimeChange(time) {
        var timeSplit = time.split(":"),
            hours,
            minutes,
            meridian;
        hours = timeSplit[0];
        minutes = timeSplit[1];
        if (hours > 12) {
            meridian = "PM";
            hours -= 12;
        } else if (hours < 12) {
            meridian = "AM";
            if (hours == 0) {
                hours = 12;
            }
        } else {
            meridian = "PM";
        }
        return hours + ":" + minutes + " " + meridian;
    }
});
