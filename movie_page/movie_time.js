var timings = document.getElementById("timings").value;
var selected_time = document.getElementById("selected_time").value;
var timing_arr = timings.split(",");
for (i = 0; i < timing_arr.length; i++) {
    if(timing_arr[i]==selected_time) {
        document.write("<option selected=\"selected\" value=\""+timing_arr[i]+"\">"+timing_arr[i]+"</option>");
    } else {
        document.write("<option value=\""+timing_arr[i]+"\">"+timing_arr[i]+"</option>");
    }
}