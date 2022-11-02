var seat_counter = 0;
// var test_arr = JSON.parse("[" + test + "]");
var taken_seat = document.getElementById("taken_seats").value;
var taken_seat_arr = taken_seat.split(",");
// alert(taken_seat_arr.includes("1"));
for (row = 0; row < 5; row++) {
    for(col = 0; col < 8; col++) {
        if (col == 2 || col == 6) {
            document.write("&nbsp&nbsp");
        }
        // if array_val == 1, print a box
        // if array_val == 0, print a checkbox
        if (taken_seat_arr.includes(seat_counter.toString())) {
            document.write("<input type=\"checkbox\" onclick=\"return false;\" class=\"taken_seat\" checked/>");
        } else {
            document.write("<input type=\"checkbox\" name=\"seats[]\" class=\"free_seat\" value=\""+seat_counter+"\"/>");
        }
        document.write("<span> </span>");
        seat_counter ++;
    }
    document.write("<br>");
}