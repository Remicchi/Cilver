var timings = document.getElementById("timing").value;
var timing_arr = timings.split(",");
for (i = 0; i < timing_arr.length; i++) {
    document.write("<option value=\""+timing_arr[i]+"\">"+timing_arr[i]+"</option>");
}