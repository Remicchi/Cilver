    var counter = 0;
    var test = "1,1,1,1,0,1,1,0,1,1,0,1,1,0,1,1,0,1,1,0,1,1,0,1,1,0,1,0,0,1,1,1,0,1,1,0";
    var test_arr = JSON.parse("[" + test + "]");

    for (row = 0; row < 5; row++) {
        for(col = 0; col < 8; col++) {
            if (col == 2 || col == 6) {
                document.write("&nbsp&nbsp");
            }
            // if array_val == 1, print a box
            // if array_val == 0, print a checkbox
            if (test_arr[counter] == 1) {
                document.write("<input type=\"checkbox\" onclick=\"return false;\" class=\"taken_seat\" checked>");
                document.write("  <span></span>");
            } else {
                document.write("<input type=\"checkbox\" class=\"free_seat\">");
                document.write("  <span></span>");
            }
            counter ++;
        }
        document.write("<br>");
    }