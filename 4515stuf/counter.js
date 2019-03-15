/**
 * Created by Anders Hansen on 13-06-2017.
 */


function startCount() {

    var workerBool = false;

    var x = document.getElementsByClassName("setup");
    var i;
    for (i = 0; i < x.length; i++) {
        x[i].style.visibility = "hidden";
    }


    var d = new Date().setMonth(new Date().getMonth()-1);
    var stufTime = parseInt(0);
    var dtime = parseInt(0);
    document.getElementById("countOnThisID").style.color = "red";
    document.getElementById("countOnThisID").style.fontSize = "1000%";
    document.getElementById("messageText").style.color = "red";
    document.getElementById("messageText").style.fontSize = "300%";


    setInterval(repater, 198);

    function repater() {
        if (d < new Date()) {
            if (workerBool === true) {
                workerBool = false;
                d = new Date();
                stufTime = parseInt(document.getElementById("breaktime").value);
                dtime = parseInt(d.getMinutes());
                d.setMinutes(stufTime + dtime);
                document.getElementById("countOnThisID").style.color = "green";
                document.getElementById("countOnThisID").style.visibility = "visible";
                document.getElementById("messageText").style.color = "green";
                document.getElementById("messageText").innerHTML = "Go for a walk";
                document.getElementById("messageText").style.visibility = "visible";
            }
            else {
                workerBool = true;
                d = new Date();
                stufTime = parseInt(document.getElementById("worktime").value);
                dtime = parseInt(d.getMinutes());
                d.setMinutes(stufTime + dtime);
                document.getElementById("countOnThisID").style.color = "red";
                document.getElementById("countOnThisID").style.visibility = "visible";
                document.getElementById("messageText").style.color = "red";
                document.getElementById("messageText").innerHTML = "Go back to work (!)";
                document.getElementById("messageText").style.visibility = "visible";
            }
        }

        document.getElementById("countOnThisID").innerHTML = new Date(d - new Date().setHours(new Date().getHours()+1)).toLocaleTimeString();

    }


}