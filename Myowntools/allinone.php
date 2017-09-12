<html>
    <head>
        <link rel="icon" type="png" href="tools.png"/>
        <title>Your Favourite Tools</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ngStorage/0.3.6/ngStorage.min.js"></script> 
    </head>
    <body style="background-color:#f3f3f3; padding:0px; border:1px solid red;">
        <div style="margin:auto; width:100%; height:60px; box-shadow:2px 2px 2px #999999; text-align:center; background-color:white; padding-top:5px;"><span style="font-size:30px;">Tools for use</span></div>
        <div class="container" style="width:100%; height:auto; diplsy:inline-block; padding:14px;">
            <div style="width:auto; height:auto; float:left; padding:20px; margin-left:5px;">
                <div id="calen" style="width:200px; height:235px; position:relative; padding:0px; margin:0px; " onmouseover="enlarge(this.id)" onmouseout="shrink(this.id)">
                    <div style="background-color:white; height:90%; border-radius:10px; width:100%; box-shadow:2px 2px 2px #888888; background-image:url('calender.jpg'); background-size:contain; background-repeat:no-repeat; background-size:100% 100%;" onclick="window.location='calen.php';">
                        <div id="calday" style="text-align:center; font-size:20px; font-family:cursive;"></div>
                        <div id="caldate" style="top:72%; left:15%; right:15%; text-align:center; position:absolute; font-size:16px; font-family:cursive;"></div>
                        <div id="caltime" style="top:80%; left:15%; right:15%; text-align:center; position:absolute; font-size:16px; font-family:cursive;"></div>
                    </div>
                    <div style="font-size:18px; font-family:sans-serif;  text-align:center;"><i>Calender</i></div>
                </div>
            </div>
            <div style="width:auto; height:auto; float:left; padding:15px;">
                <div id="calcu" style="width:202px; height:235px; position:relative; padding:0px; margin-left:auto; float:left;" onmouseover="enlarge(this.id)" onmouseout="shrink(this.id)">
                    <div style="background-color:white; border-radius:10px; height:90%; width:100%; box-shadow:2px 2px 2px #888888; background-image:url('calculator.png'); background-size:contain; background-repeat:no-repeat; background-size:100% 100%;" onclick="window.location='calculator.php';">
                        <div id="calday" style="text-align:center; font-size:20px; font-family:cursive; padding-top:50px;"></div>
                        <div id="caldate" style="margin-top:10%; text-align:center; font-size:20px; font-family:cursive;"></div>
                    </div>
                    <div style="font-size:18px; font-family:sans-serif;  text-align:center;"><i>Calculator</i></div>
                </div>
            </div>
            <div style="width:auto; height:auto; float:left; padding:15px;">
                <div id="bmi" style="width:202px; height:235px; position:relative; padding:0px; margin-left:auto; float:left;" onmouseover="enlarge(this.id)" onmouseout="shrink(this.id)">
                    <div style="background-color:white; border-radius:10px; height:90%; width:100%; box-shadow:2px 2px 2px #888888; background-image:url('bmi2.jpg'); background-size:contain; background-repeat:no-repeat; background-size:100% 100%;" onclick="window.location='bmi.php';">
                        <div id="calday" style="text-align:center; font-size:20px; font-family:cursive; padding-top:50px;"></div>
                        <div id="caldate" style="margin-top:10%; text-align:center; font-size:20px; font-family:cursive;"></div>
                    </div>
                    <div style="font-size:18px; font-family:sans-serif;  text-align:center;"><i>Body mass index(BMI)</i></div>
                </div>
            </div>
            <div style="width:auto; height:auto; float:left; padding:15px;">
                <div id="stopwatch" style="width:212px; height:235px; position:relative; padding:0px; margin-left:auto; float:left;" onmouseover="enlarge(this.id)" onmouseout="shrink(this.id)">
                    <div style="background-color:white; border-radius:10px; height:90%; width:100%; box-shadow:2px 2px 2px #888888; background-image:url('stopwatch.png'); background-size:contain; background-repeat:no-repeat; background-size:100% 100%;" onclick="window.location='stopwatch.php';">
                        <div id="calday" style="text-align:center; font-size:20px; font-family:cursive; padding-top:50px;"></div>
                        <div id="caldate" style="margin-top:10%; text-align:center; font-size:20px; font-family:cursive;"></div>
                    </div>
                    <div style="font-size:18px; font-family:sans-serif;  text-align:center;"><i>StopWatch</i></div>
                </div>
            </div>
            <div style="width:auto; height:auto; float:left; padding:15px;">
                <div id="timer" style="width:212px; height:235px; position:relative; padding:0px; margin-left:auto; float:left;" onmouseover="enlarge(this.id)" onmouseout="shrink(this.id)">
                    <div style="background-color:white; border-radius:10px; height:90%; width:100%; box-shadow:2px 2px 2px #888888; background-image:url('timer1.png'); background-size:contain; background-repeat:no-repeat; background-size:100% 100%;" onclick="window.location='timer.php';">
                        <div id="calday" style="text-align:center; font-size:20px; font-family:cursive; padding-top:50px;"></div>
                        <div id="caldate" style="margin-top:10%; text-align:center; font-size:20px; font-family:cursive;"></div>
                    </div>
                    <div style="font-size:18px; font-family:sans-serif;  text-align:center;"><i>Timer</i></div>
                </div>
            </div>
            <div style="width:auto; height:auto; float:left; padding:15px;">
                <div id="maps" style="width:212px; height:235px; position:relative; padding:0px; margin-left:auto; float:left;" onmouseover="enlarge(this.id)" onmouseout="shrink(this.id)">
                    <div style="background-color:white; border-radius:10px; height:90%; width:100%; box-shadow:2px 2px 2px #888888; background-image:url('gmaps1.jpg'); background-size:contain; background-repeat:no-repeat; background-size:100% 100%;" onclick="window.location='gmaps.php';">
                        <div id="calday" style="text-align:center; font-size:20px; font-family:cursive; padding-top:50px;"></div>
                        <div id="caldate" style="margin-top:10%; text-align:center; font-size:20px; font-family:cursive;"></div>
                    </div>
                    <div style="font-size:18px; font-family:sans-serif;  text-align:center;"><i>Google Maps</i></div>
                </div>
            </div>
        </div>
        <script type="application/javascript">
            function displaycal(){
                var t = new Date();
                var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                document.getElementById("calday").innerHTML = days[t.getDay()];
                document.getElementById("caldate").innerHTML = months[t.getMonth()]+" "+t.getDate()+","+t.getFullYear();
                if(t.getHours()<=12){
                    if(t.getHours()<12){
                        if(t.getSeconds()==0){
                            if(t.getMinutes()<10){
                                document.getElementById("caltime").innerHTML = t.getHours()+":0"+t.getMinutes()+":60 AM";
                            }else{
                                document.getElementById("caltime").innerHTML = t.getHours()+":"+t.getMinutes()+":60 AM";
                            }
                        }else{
                            if(t.getMinutes()<10){
                                document.getElementById("caltime").innerHTML = t.getHours()+":0"+t.getMinutes()+":"+t.getSeconds()+" AM"; 
                            }else{
                                document.getElementById("caltime").innerHTML = t.getHours()+":"+t.getMinutes()+":"+t.getSeconds()+" AM";
                            }
                        }
                    }else{
                        if(t.getSeconds()==0){
                            if(t.getMinutes()<10){
                                document.getElementById("caltime").innerHTML = t.getHours()+":0"+t.getMinutes()+":60 PM"; 
                            }else{
                                document.getElementById("caltime").innerHTML = t.getHours()+":"+t.getMinutes()+":60 PM";
                            }
                        }else{
                            if(t.getMinutes()<10){
                                document.getElementById("caltime").innerHTML = t.getHours()+":0"+t.getMinutes()+":"+t.getSeconds()+" PM"; 
                            }else{
                                document.getElementById("caltime").innerHTML = t.getHours()+":"+t.getMinutes()+":"+t.getSeconds()+" PM";
                            }
                        }
                    }
                }else{
                    if(t.getMinutes()<10){
                        document.getElementById("caltime").innerHTML = t.getHours()-12+":0"+t.getMinutes()+":"+t.getSeconds()+" PM"; 
                    }else{
                        document.getElementById("caltime").innerHTML = t.getHours()-12+":"+t.getMinutes()+":"+t.getSeconds()+" PM";
                    }
                }
            }
            function enlarge(id){
                document.getElementById(id).style.width = "230px";
                document.getElementById(id).style.height = "250px";
            }
            function shrink(id){
                document.getElementById(id).style.width = "200px";
                document.getElementById(id).style.height = "235px";
            }
            window.onload = displaycal();
            setInterval(displaycal, 1000);
        </script>

    </body>
</html>