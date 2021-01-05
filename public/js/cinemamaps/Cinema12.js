var firstSeatLabel = 1;
var control = 0;
var Selected_Seat = [];
var Sold = [];
var Sold_seats = [];
$(document).ready(function () {
    addseatno();
    var $counter = $("#counter"),
        sc = $("#seat-map").seatCharts({
            map: [
                "_____ffffffffffff__ffffffffffffff_____",
                "____fffffffffffff__fffffffffffffff____",
                "___ffffffffffffff__ffffffffffffffff___",
                "__fffffffffffffff__fffffffffffffffff__",
                "_ffffffffffffffff__ffffffffffffffffff_",
                "eeeeeeeeeeeeeeeee__eeeeeeeeeeeeeeeeeee",
                "eeeeeeeeeeeeeeeee__eeeeeeeeeeeeeeeeeee",
                "eeeeeeeeeeeeeeeee__eeeeeeeeeeeeeeeeeee",
                "eeeeeeeeeeeeeeeee__eeeeeeeeeeeeeeeeeee",
                "eeeeeeeeeeeeeeeee__eeeeeeeeeeeeeeeeeee",
                "eeeeeeeeeeeeeeeee__eeeeeeeeeeeeeeeeeee",
                "eeeeeeeeeeeeeeeee__eeeeeeeeeeeeeeeeeee",
                "eeeeeeeeeeeeeeeee__eeeeeeeeeeeeeeeeeee",
                "eeeeeeeeeeeeeeeee__eeeeeeeeeeeeeeeeeee",
                "eeeeeeeeeeeeeeeee__eeeeeeeeeeeeeeeeeee",
            ],
            seats: {
                f: {
                    price: 0,
                    classes: "first-class", //your custom CSS class
                    category: "VIP",
                },
                e: {
                    price: 0,
                    classes: "economy-class", //your custom CSS class
                    category: "Regular",
                },
            },
            naming: {
                top: false,
                getLabel: function (character, row, column) {
                    return firstSeatLabel++;
                },
            },
            legend: {
                node: $("#legend"),
                items: [
                    ["f", "available", "VIP Seat"],
                    ["e", "available", "Regular Seat"],
                    ["f", "unavailable", "Booked"],
                ],
            },
            click: function () {
                if (this.status() == "available") {
                    if (control <= 20) {
                        //let's create a new <li> which we'll add to the cart items

                        Selected_Seat[control] = this.settings.label;

                        Sold[control] = this.settings.id;
                        /*
                         * Lets update the counter and total
                         *
                         * .find function will not find the current seat, because it will change its stauts only after return
                         * 'selected'. This is why we have to add 1 to the length and the current seat price to the total.
                         */
                        $counter.text(sc.find("selected").length + 1);

                        control++;
                        return "selected";
                    } else {
                        var load = document.getElementById("werefaAlert");
                        load.style.display = "block";
                        $("#mesage").html("You can only select 20 seat!");
                        return "available";
                    }
                } else if (this.status() == "selected") {
                    //update the counter
                    $counter.text(sc.find("selected").length - 1);
                    //remove the item from our cart

                    //seat has been vacated
                    return "available";
                } else if (this.status() == "unavailable") {
                    //seat has been already booked
                    return "unavailable";
                } else {
                    return this.style();
                }
            },
        });

    //this will handle "[cancel]" link clicks

    //let's pretend some seats have already been booked
    sc.get(Sold_seats).status("unavailable");
});
function addseatno() {
    var select = document.getElementById("seatno");
    var size = document.getElementById("seatno").options.length;
    //alert(select.options[0].value);
    for (var i = 0; i < size; i++) {
        Sold_seats[i] = select.options[i].value;
    }
}

function pay() {
    var load = document.getElementById("wrapper");
    var myJSONseat = JSON.stringify(Selected_Seat);
    var myJSONseatid = JSON.stringify(Sold);
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    load.style.display = "block";
    $.ajax({
        type: "POST",
        url: "/addseat",
        data: {
            Selected_Seat: myJSONseat,
            Seat_id: myJSONseatid,
            quantity: control,
        },
        cache: false,

        success: function (html) {
            window.location.reload();
            load.style.display = "none";
        },
    });
}
function colose() {
    var load = document.getElementById("werefaAlert");
    load.style.display = "none";
}
