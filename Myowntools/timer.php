<html>
    <head>
        <title>Timer!</title>
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
        <style type="text/css">
            button{
                height:40px;
                width:40px;
                margin:10px 5px;
            }
        </style>
    </head>
    <body style="background-color:#f3f3f3;">
        <div id="wrapper" style="padding:0px; margin:0px;">
            <div style="background-color:white; width:30px; height:30px; font-size:30px; border-bottom-right-radius:10px;" onclick="window.location='allinone.php';">
                <i class="fa fa-home" aria-hidden="true"></i>
            </div>
            <div class="container-fluid" style="height:auto; width:100%; padding-bottom:10px;">
                <div style="height:60px; padding:0px;">
                    <h3 style="color:lightblue; float:left; font-size:18px;">Timer</h3>

                </div>
                <div class="container-fluid" style="background-color:white; box-shadow:2px 2px 2px #888888; padding:20px; border-radius:5px;">
                    <h1>Timer!!</h1>
                    
                    <div style="box-shadow:2px 2px 2px #888888; border-radius:5px; height:auto; margin:auto; width:auto; padding:0px; border:0.4px solid #888888; padding-top:20px; display:block;">
                        <div style="text-align: center; margin:auto;">
                            <table style="border-collapse: separate; border-radius:5px; border-spacing: 20px; height:100px; margin:auto; padding:20px; border:1px solid blue;">
                                <thead>
                                    <tr>
                                        <th>Hours</th>
                                        <th>Minutes</th>
                                        <th>Seconds</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="border:1px soild red;">
                                        <td style="border:1px soild blue;"><input id="hours" type="number" class="form-control" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" oninput="maxLengthCheck(this)" style="width:50px; padding:0px; padding-left:10px;" min="0" max="24" maxlength = "2" placeholder="0"></td>
                                        <td style="border:1px soild blue;"><input id="minute" type="number" oninput="maxLengthCheck(this)" class="form-control" style="width:50px; padding:0px; padding-left:10px;" min="0" max="60" maxlength="2" placeholder="0"></td>
                                        <td style="border:1px soild blue;"><input id="second" type="number" oninput="maxLengthCheck(this)" class="form-control" style="width:50px; padding:0px; padding-left:10px;" maxlength="2" min="0" max="60" placeholder="0"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="container-fluid" style="texxt-align:center; width:auto; display: flex; justify-content: center; margin:auto; padding:10px;">
                            <div class="btn-group" style="float:left;">
                                <button id="start" type="button" class="btn btn-primary" style="outline:0; padding:10px 10px; width:100px; background-color: rgb(4,56,243);" onclick="start();">Start</button>
                            </div>
                            <div style="float:right;">
                                <button id="reset" type="button" class="btn btn-primary" style="outline:0; background-color: rgb(4,56,243); width:100px; padding:10px 10px; " onclick="reset();">Reset</button>
                            </div>
                        </div>
                        <div id="results" class="container-fluid" style="text-align:center; width:auto; display: block; justify-content: center; margin:auto; padding:10px; font-size:20px;">
                            0h : 0m : 0s
                        </div>
                        <div id="final" class="container-fluid" style="text-align:center; width:40%; display: block; justify-content: center; margin:auto; padding:10px;">
                            <div class="progress" style="text-align:center;">
                                <div id="progress" class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"
                                     aria-valuemin="0" aria-valuemax="100" style="width:0%;">
                                    0% Remaining (success)
                                </div>
                            </div><br/>
                            <div id="comments">

                            </div>
                            <br/><br/><br/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="application/javascript">
            var p=0,control;
            var h=0,m=0,s=0;
            var res = "";
            var progres1 = 0;
            function start(){
                if(p==0){
                    p=1;
                    document.getElementById("start").innerHTML = "Stop";
                    if(document.getElementById("hours").value!=0){
                        h = document.getElementById("hours").value;
                    }
                    if(document.getElementById("minute").value!=0){
                        m = document.getElementById("minute").value;
                    }
                    if(document.getElementById("second").value!=0){
                        s = document.getElementById("second").value;
                    }
                    progres1 = h*60*60+m*60+s;
                    document.getElementById("comments").innerHTML = " ";
                    control = setInterval(timer,1000);
                }else{
                    document.getElementById("start").innerHTML = "Start";
                    document.getElementById("comments").innerHTML = "Timer Paused!!";
                    clearInterval(control);
                    p=0;
                }
            }
            function reset(){
                clearInterval(control);
                p=0;
                document.getElementById("results").innerHTML = "0h : 0m : 0s";
                document.getElementById("second").value = 0;
                document.getElementById("minute").value = 0;
                document.getElementById("hours").value = 0;
                document.getElementById("progress").style.width = "0%";
                document.getElementById("start").innerHTML = "Start";
                document.getElementById("progress").innerHTML = "0% Remaining";
                document.getElementById("comments").innerHTML = "Clock reset!!";
                document.getElementById("progress").className = "progress-bar progress-bar-success";
                m=h=s=0;
                progres1=0;
            }
            function timer(){
                if(s>0){
                    s--;
                }else if(s==0){
                    if(m>=0 || h>=0){
                        if(m>0){
                            s=60;
                            m--;
                        }else if(m==0){
                            if(h>0){
                                m=60;
                                --h;
                            }else{
                                document.getElementById("start").innerHTML = "Start";
                                clearInterval(control);
                                p=0;
                            }
                        }
                    }else{
                        document.getElementById("start").innerHTML = "Start";

                        clearInterval(control);
                        p=0;
                    }
                }
                
                if(progres1!=0){
                    document.getElementById("progress").style.width = Math.floor(((h*60*60+m*60+s)/progres1)*100)+"%";
                    document.getElementById("progress").innerHTML = Math.floor(((h*60*60+m*60+s)/progres1)*100)+"% Remaining";
                    if(Math.floor(((h*60*60+m*60+s)/progres1)*100)<=25){
                        document.getElementById("progress").className = "progress-bar progress-bar-danger";

                    }
                    if(Math.floor(((h*60*60+m*60+s)/progres1)*100)<50 && Math.floor(((h*60*60+m*60+s)/progres1)*100)>25){
                        document.getElementById("progress").className = "progress-bar progress-bar-warning";
                    }
                    if(Math.floor(((h*60*60+m*60+s)/progres1)*100)==0){
                        document.getElementById("comments").innerHTML = "Times up. Stop writing!!";
                        
                    }
                }else{
                    document.getElementById("progress").style.width = "0%";
                    document.getElementById("progress").innerHTML = "0% Ramaining";

                }
                document.getElementById("results").innerHTML=h+"h : "+m+"m : "+s+"s";

            }
            function maxLengthCheck(object)
            {
                if (object.value.length > object.maxLength){
                    object.value = object.value.slice(0, object.maxLength)
                }
            }
            document.getElementById('hours').onkeypress =
                function (e) {
                var ev = e || window.event;
                if(ev.charCode < 48 || ev.charCode > 57) {
                    return false; // not a digit
                } else if(this.value * 10 + ev.charCode - 48 > this.max) {
                    return false;
                } else {
                    return true;
                }
            }
            document.getElementById('minute').onkeypress =
                function (e) {
                var ev = e || window.event;
                if(ev.charCode < 48 || ev.charCode > 57) {
                    return false; // not a digit
                } else if(this.value * 10 + ev.charCode - 48 > this.max) {
                    return false;
                } else {
                    return true;
                }
            }
            document.getElementById('second').onkeypress =
                function (e) {
                var ev = e || window.event;
                if(ev.charCode < 48 || ev.charCode > 57) {
                    return false; // not a digit
                } else if(this.value * 10 + ev.charCode - 48 > this.max) {
                    return false;
                } else {
                    return true;
                }
            }
        </script>
    </body>
</html>
</body>
</html>