for (row = 0; row < 5; row++) {
    document.write("")
    for(col = 0; col < 8; col++) {
        if (col == 2 || col == 6) {
            document.write("&nbsp&nbsp");
        }
        document.write("<input type=\"checkbox\">");
        document.write("  <span class=\"checkmark\"></span>");
    }
    document.write("<br>");
}