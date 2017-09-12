<html>
    <head>
        <title>Stopwatch!</title>
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
                width:100px;
                margin:10px 5px;
            }
            td{
                width:60px;
            }
            #seconds, #hours, #minutes{
                font-size: 50px;
            }
            #mili{
                font-size: 30px;
            }
            @media(max-width:768px){
                td{
                    width:30px;
                }
                #seconds, #hours, #minutes{
                    font-size: 25px;
                }
                #mili{
                    font-size: 15px;
                }
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
                    <h3 style="color:lightblue; float:left; font-size:18px;">Stopwatch</h3>

                </div>
                <div class="container-fluid" style="background-color:white; box-shadow:2px 2px 2px #888888; height:80%; padding:20px; border-radius:5px;">
                    <!--<h1>Under Maintenance!!</h1>
<p>Will be up shortly.</p>-->
                    <h1>StopWatch!!</h1>
                    <div style="border:0.4px solid #888888; box-shadow:2px 2px 2px #888888; width:auto; border-radius:5px; height:auto; margin:auto; text-align:center; padding:20px; padding-top:10px; padding-bottom:10px; display:block;">
                        <div class="container-fluid" style="display:inline-block; width:auto; padding:10px;">
                            <div class="btn-group" style="float:left;">
                                <button id="start" type="button" class="btn btn-primary" style="padding:10px 10px; outline:0; background-color: rgb(4,56,243);" onclick="start();">Start</button>
                            </div>
                            <div style="float:right;">
                                <button id="reset" type="button" class="btn btn-primary" style="background-color: rgb(4,56,243); outline:0; padding:10px 10px; " onclick="reset();">Reset</button>
                            </div>
                        </div>
                        <br/>
                        <br/>
                        <br/>
                        <div id="display" style="width:100%;">
                            <table style="border-collapse: separate; border-spacing: 10px; height:100px; margin:auto;">
                                <tr>
                                    <td id="years"></td>
                                    <td id="days"></td>
                                    <td id="hours"></td>
                                    <td id="minutes"></td>
                                    <td id="seconds">0s</td>
                                    <td id="mili">00</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <br/>
                    <br/>
                    <div id="final" style="width:100%; text-align:center; font-size:18px;"></div>
                </div>
            </div>
        </div>
        <script type="application/javascript">
            var ms=0,s=0,m=0,h=0,d=0,y=0;
            var control;
            var p=0;

            function tick(){
                ms++;
                //console.log("hai");
                if(ms ==100){
                    s++;
                    document.getElementById("seconds").innerHTML = s+"s";
                    document.getElementById("mili").innerHTML = ms;
                    if(ms==100){
                        ms=0;
                    }
                    if(s==60){
                        s=0;
                        m++;
                        if(m==60){
                            h++;
                            m=0;
                            document.getElementById("hours").innerHTML = h+"h";
                            document.getElementById("minutes").innerHTML = m+"m";
                            document.getElementById("seconds").innerHTML = s+"s";
                            document.getElementById("mili").innerHTML = ms;
                        }else{
                            document.getElementById("minutes").innerHTML = m+"m";
                            document.getElementById("seconds").innerHTML = s+"s";
                            document.getElementById("mili").innerHTML = ms;
                        }
                    }
                }else{
                    if(s==0){
                        if(m==0){
                            if(h==0){
                                document.getElementById("mili").innerHTML = ms;
                            }else{
                                document.getElementById("hours").innerHTML = h+"h";
                                document.getElementById("minutes").innerHTML = m+"m";
                                document.getElementById("seconds").innerHTML = s+"s";
                                document.getElementById("mili").innerHTML = ms;
                            }
                        }else{
                            if(h==0){
                                document.getElementById("minutes").innerHTML = m+"m";
                                document.getElementById("seconds").innerHTML = s+"s";
                                document.getElementById("mili").innerHTML = ms;
                            }else{
                                document.getElementById("hours").innerHTML = h+"h";
                                document.getElementById("minutes").innerHTML = m+"m";
                                document.getElementById("seconds").innerHTML = s+"s";
                                document.getElementById("mili").innerHTML = ms;
                            }

                        }
                    }else{
                        if(m==0){
                            if(h==0){
                                document.getElementById("seconds").innerHTML = s+"s";
                                document.getElementById("mili").innerHTML = ms;
                            }else{
                                document.getElementById("hours").innerHTML = h+"m";
                                document.getElementById("minutes").innerHTML = m+"m";
                                document.getElementById("seconds").innerHTML = s+"s";
                                document.getElementById("mili").innerHTML = ms;
                            }
                        }else{
                            if(h==0){
                                document.getElementById("minutes").innerHTML = m+"m";
                                document.getElementById("seconds").innerHTML = s+"s";
                                document.getElementById("mili").innerHTML = ms;
                            }else{
                                document.getElementById("hours").innerHTML = h+"h";
                                document.getElementById("minutes").innerHTML = m+"m";
                                document.getElementById("seconds").innerHTML = s+"s";
                                document.getElementById("mili").innerHTML = ms;
                            }
                        }
                    }
                }
                if(ms==100 && s==60 && m==60 && h==24){
                    ms=s=m=h=0;
                }
            }
            function start(){
                if(p==0){
                    p=1;
                    document.getElementById("start").innerHTML = "Stop";
                    control = setInterval(tick,10);
                    document.getElementById("final").innerHTML = "Clocks Ticking!!";

                }else{
                    document.getElementById("start").innerHTML = "Start";
                    clearInterval(control);
                    p=0;
                    document.getElementById("final").innerHTML = "Clock Paused!!";
                }
            }

            function reset(){
                clearInterval(control);
                p=0;
                document.getElementById("mili").innerHTML = "00";
                document.getElementById("seconds").innerHTML = "0s";
                document.getElementById("minutes").innerHTML = "";
                document.getElementById("hours").innerHTML = "";
                document.getElementById("days").innerHTML = "";
                document.getElementById("years").innerHTML = "";
                ms=s=m=h=d=y=0;
                document.getElementById("final").innerHTML = "Times up!!";
            }
        </script>
    </body>
</html>
</body>
</html>