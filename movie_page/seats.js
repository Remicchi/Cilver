    var arr_counter = 0;
    var seat_counter = 0;
    var test = "1,3,5,7,8,9,10,30,31,32,39,20,2";
    var test_arr = JSON.parse("[" + test + "]");

    for (row = 0; row < 5; row++) {
        for(col = 0; col < 8; col++) {
            if (col == 2 || col == 6) {
                document.write("&nbsp&nbsp");
            }
            // if array_val == 1, print a box
            // if array_val == 0, print a checkbox
            if (test_arr.includes(seat_counter)) {
                document.write("<input type=\"checkbox\" onclick=\"return false;\" class=\"taken_seat\" checked value=\""+arr_counter+"\">");
                document.write("  <span></span>");
                arr_counter++;
            } else {
                document.write("<input type=\"checkbox\" class=\"free_seat\" value=\""+arr_counter+"\">");
                document.write("  <span></span>");
            }
            seat_counter ++;
        }
        document.write("<br>");
    }