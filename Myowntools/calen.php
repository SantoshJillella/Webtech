<html>
    <head>
        <title>Calender Events!</title>
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
        <style>
            @media(min-device-width : 769){
                #hai{
                    height:auto;
                }
            }
            @media(max-device-width : 768px)
            {
                body{
                    font:10px;
                }
                #hai{
                    height: 50%;
                }
            }
            #wrapper {
                height:100%;
            }
            .page-content-wrapper {
                width:100%;
                padding:15px;
                padding-right:25px;
                position:relative;
            }
            .btn-primary{
                background-color: rgb(4,56,243);
            }
            #overlay {
                position: fixed;
                display: none;
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: rgba(0,0,0,0.5);
                z-index: 2;
                cursor: pointer;
            }
            #notoverlay{
                position:absolute;
                margin:auto;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
            }
        </style>
    </head>
    <body style="background-color:#f3f3f3;">
        <div id="overlay" onclick="off('overlay')" style="border:1px solid red;">
            <div id="notoverlay" align="center" onclick="off('notoverlay')" style="border-radius:2px; background-color:white; width:100px; height:400px;">
                <h4>Event</h4>
                <hr/>
                <form style="text-align:left; padding-left:10px; padding-right:10px;">
                    <label>Title</label><br/>
                    <input class="form-control" type="text" style="width:100%;" placeholder="Event Title" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Event Title'">
                    <label>Start Date</label><br/>
                    <input class="form-control" type="text" style="width:100%;" placeholder="mm/dd/yy format" onfocus="this.placeholder = ''" onblur="this.placeholder = 'mm/dd/yy format'">
                    <label>End Date</label><br/>
                    <input class="form-control" type="text" style="width:100%;" placeholder="mm/dd/yy format" onfocus="this.placeholder = ''" onblur="this.placeholder = 'mm/dd/yy format'">
                    <label>Color</label><br/>
                    <select style="width:100%" class="form-control">
                        <option value="volvo">Red</option>
                        <option value="saab">Blue</option>
                        <option value="opel">Green</option>
                    </select><br/>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
        <div id="wrapper" style="padding:0px; margin:0px;">
            <div style="background-color:white; width:30px; height:30px; font-size:30px; border-bottom-right-radius:10px;" onclick="window.location='allinone.php';">
                <i class="fa fa-home" aria-hidden="true"></i>
            </div>
            <div class="container-fluid" style="height:auto;  overflow-y:scroll; width:100%; padding-bottom:10px;">
                <div style="height:60px; padding:0px;">
                    <h3 style="color:lightblue; float:left; font-size:18px;">Calender</h3>
                    <button type="button" class="btn btn-primary" style="float:right; margin-top:20px; font-size:12px;" onclick="on()">Create Campaign</button>
                </div>
                <div class="container-fluid page-content-wrapper" style="background-color:white; box-shadow:2px 2px 2px #888888; border-radius:5px;">
                    <div class="container-fluid" style="display:inline-block; width:100%; padding:0px;">
                        <div class="btn-group" style="float:left;">
                            <button type="button" class="btn btn-default" style="padding:10px 10px;" onclick="prev();"><i class="fa fa-arrow-left" aria-hidden="true" style="color:#a0a0a0;"></i></button>
                            <button type="button" class="btn btn-default" style="padding:10px 10px;" onclick="next();"><i class="fa fa-arrow-right" aria-hidden="true" style="color:#a0a0a0;"></i></button>
                        </div>
                        <button type="button" class="btn btn-default" style="color:#a0a0a0;  float:left; margin-left:14px;" onclick="highlight();">Today</button>
                        <div align="center" style="left:25%; right:35%; margin-left:-5px; border-radius:2px; position:relative; text-align: center; display:inline-block; padding:0px 15px; ">
                            <p style="font-size:16px; padding:0px; margin-top:5px;"><b id="date" style="font-size:16px;">date</b></p>
                        </div>
                        <div class="btn-group" style="float:right;">
                            <button type="button" class="btn btn-default" style="color:#a0a0a0;" onclick="btday();">Day</button>
                            <button type="button" class="btn btn-default" style="color:#a0a0a0;" onclick="btweek();">Week</button>
                            <button type="button" class="btn btn-default" style="color:#a0a0a0;" onclick="btmonth();">Month</button>
                        </div>

                    </div>
                    <hr/>
                    <div class="container-fluid hai hai1" style="display:inline-block; overflow:auto; font-size:10px;  width:100%; padding:2px;">
                        <table id="daysofweek" class="table table-bordered">

                        </table>

                    </div>
                </div>
            </div>
            <script>
                var d = new Date();
                var z = new Date();
                var btm=1,btw=0,btd=0,highl=0;
                var x = d.getMonth();
                y = d.getFullYear();
                var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

                //this functions for popup event create.
                function on() {
                    document.getElementById("overlay").style.display = "block";
                }

                function off(id) {
                    if(id==document.getElementById("overlay").id){
                        document.getElementById("overlay").style.display = "none";
                    }
                    else{
                        document.getElementById("notoverlay").style.display = "visible";
                    }
                }
                $( "#notoverlay" ).click(function( event ) {
                    event.stopPropagation();
                    // Do something
                });
                //end of functions for popup event create.

                function highlight(){
                    d = new Date();
                    highl=1;
                    if(btm==1){
                        cal(d.getFullYear(),d.getMonth());
                        document.getElementById(d.getDate()+""+months[d.getMonth()]).style.backgroundColor = "#FFFF00";
                    }else if(btd==1){
                        day(d.getFullYear(),d.getMonth(),d.getDate());
                        document.getElementById("daybody").style.backgroundColor = "#FFFF00";
                    }else if(btw==1){
                        week(d.getFullYear(),d.getMonth(),d.getDate());
                    }

                }

                //function for next month,day or week
                function next(){
                    if(btm==1){
                        if((x+1)<12 ){
                            x+=1;
                            d = new Date(y,x,1);
                            cal(y,x);
                        }
                        else if(x==11){
                            x=0;
                            y+=1;
                            d = new Date(y,x,1);
                            day(y,x,t);
                        }
                    }
                    if(btd==1){
                        t=d.getDate();
                        if(t==(new Date(d.getFullYear(),d.getMonth()+1,0).getDate())){
                            t = 1;
                            if((d.getMonth()+1)<12 ){
                                x=d.getMonth()+1;
                                d = new Date(y,x,t);
                                day(y,x,t);
                            }
                            else if(d.getMonth()==11){
                                x=0;
                                y=d.getFullYear()+1;
                                d = new Date(y,x,t);
                                day(y,x,t);
                            }
                        }else{
                            t++;
                            d = new Date(y,x,t);
                            day(y,x,t);
                        }
                    }
                    if(btw==1){
                        t=d.getDate();
                        if(t+7>(new Date(d.getFullYear(),d.getMonth()+1,0).getDate())){
                            t=1;
                            if((d.getMonth()+1)<12 ){
                                x=d.getMonth()+1;
                                d = new Date(y,x,t);
                                console.log(d);
                                week(y,x,t);
                            }
                            else if(d.getMonth()==11){
                                console.log("2");
                                x=0;
                                y=d.getFullYear()+1;
                                d = new Date(y,x,t);
                                week(y,x,t);
                            }
                        }else{
                            console.log("3");
                            t+=7;
                            d = new Date(y,x,t);
                            week(y,x,t);
                        }
                    }

                    if(highl==1){
                        var fin1 = new Date();
                        if(btm==1 && (fin1.getMonth()==d.getMonth() && fin1.getFullYear()==d.getFullYear())){
                            document.getElementById(fin1.getDate()+""+months[fin1.getMonth()]).style.backgroundColor = "#FFFF00";
                        }else if(btd==1 && (fin1.getMonth()==d.getMonth() && fin1.getFullYear()==d.getFullYear() && fin1.getDate()==d.getDate())){
                            day(d.getFullYear(),fin1.getMonth(),fin1.getDate());
                            document.getElementById("daybody").style.backgroundColor = "#FFFF00";
                        }else if(btw==1){
                            week(d.getFullYear(),d.getMonth(),d.getDate());
                        }
                    }

                }
                //function for previous month,day or week
                function prev(){
                    if(btm==1){
                        if((x-1)>-1){
                            x-=1;
                            d = new Date(y,x,1);
                            document.getElementById("date").innerHTML = months[x]+' '+y;
                            cal(y,x);
                        }
                        else if(x==0){
                            if((y-1)>0){
                                y-=1;
                                x=11;
                                d = new Date(y,x,1);
                            }
                            document.getElementById("date").innerHTML = months[x]+' '+y;
                            if(btm==1){
                                cal(y,x);
                            }
                        }
                    }
                    if(btd==1){
                        t=d.getDate();
                        if(t==1){
                            t = new Date(d.getFullYear(),d.getMonth(),0).getDate();
                            if((x-1)>-1){
                                x-=1;
                                d = new Date(y,x,t);
                                day(y,x,t);
                            }
                            else if(x==0){
                                if((y-1)>0){
                                    d = new Date(y,x,0);
                                    t=d.getDate();
                                    y-=1;
                                    x=11;
                                    d = new Date(y,x,t);
                                }
                                day(y,x,t);
                            }
                        }else{
                            t--;
                            d = new Date(y,x,t);
                            day(y,x,t);
                        }
                    }
                    if(btw==1){
                        t=d.getDate();
                        if(t-7<1){
                            t = t-7+(new Date(d.getFullYear(),d.getMonth()+1,0).getDate());
                            if((x-1)>-1){
                                x-=1;
                                d = new Date(y,x,t);
                                week(y,x,t);
                            }
                            else if(x==0){
                                if((y-1)>0){
                                    d = new Date(y,x,0);
                                    t=d.getDate();
                                    y-=1;
                                    x=11;
                                    d = new Date(y,x,t);
                                }
                                week(y,x,t);
                            }
                        }else{
                            t-=7;
                            d = new Date(y,x,t);
                            week(y,x,t);
                        }
                    }

                    if(highl==1){
                        var fin1 = new Date();
                        if(btm==1 && (fin1.getMonth()==d.getMonth() && fin1.getFullYear()==d.getFullYear())){
                            document.getElementById(fin1.getDate()+""+months[fin1.getMonth()]).style.backgroundColor = "#FFFF00";
                        }else if(btd==1 && (fin1.getMonth()==d.getMonth() && fin1.getFullYear()==d.getFullYear() && fin1.getDate()==d.getDate())){
                            day(d.getFullYear(),fin1.getMonth(),fin1.getDate());
                            document.getElementById("daybody").style.backgroundColor = "#FFFF00";
                        }else if(btw==1){
                            week(d.getFullYear(),d.getMonth(),d.getDate());
                        }
                    }

                }
                //function for month button
                function btmonth(){
                    cal(y,x);
                    btm=1;
                    btw=0;
                    btd=0;
                    if(highl==1){
                        var p = new Date();
                        document.getElementById(p.getDate()+""+months[p.getMonth()]).style.backgroundColor = "#FFFF00";
                    }
                }
                //function for week button
                function btweek(){
                    week(y,x,d.getDate());
                    btm=0;
                    btw=1;
                    btd=0;
                }
                //function for day button
                function btday(){

                    day(y,x,d.getDate());
                    btm=0;
                    btw=0;
                    btd=1;
                    if(highl==1){
                        document.getElementById("daybody").style.backgroundColor = "#FFFF00";
                    }
                }
                //function for month of calender
                function cal(y,m){
                    btd=0;
                    btw=0;
                    btm=1;
                    var res="";
                    var t=0,tmp;
                    var i,j,k;
                    res+="<thead><tr style=\"color:#a0a0a0;\"><th style=\"text-align: center; padding:20px; font-size:12px;\">SUNDAY</th><th style=\"text-align: center; padding:20px; font-size:12px;\">MONDAY</th><th style=\"text-align: center; padding:20px; font-size:12px;\">TUESDAY</th><th style=\"text-align: center; padding:20px; font-size:12px;\">WEDNESDAY</th><th style=\"text-align: center; padding:20px; font-size:12px;\">THURSDAY</th><th style=\"text-align: center; padding:20px; font-size:12px;\">FRIDAY</th><th style=\"text-align: center; padding:20px; font-size:12px;\">SATURDAY</th></tr></thead><tbody>"
                    for(i=1;i<=(new Date(d.getFullYear(), d.getMonth()+1, 0).getDate());i++){
                        z = new Date(y,m,i);
                        res+="<tr>";
                        if(z.getDay()==6){
                            t=31-(z.getDay());
                        }else{
                            t=31-(z.getDay()-1);
                        }
                        document.getElementById("date").innerHTML = months[z.getMonth()]+' '+z.getFullYear();
                        for(j=0;j<z.getDay();j++)
                        {
                            tmp = new Date(y,m-1,t++);
                            res+="<td id=\""+z.getDate()+""+months[d.getMonth()]+"\" style=\"text-align: center; font-size:10px;\"><div style=\"text-align:right; \"><a style=\"color:black;\" href=\"javascript:day("+tmp.getFullYear()+","+tmp.getMonth()+","+tmp.getDate()+")\">"+tmp.getDate()+"</a></div><div style=\"height:75px; overflow:hidden;\"></div></td>";
                        }
                        if(j==z.getDay())
                        {
                            if(z.getDate()==1)
                            {
                                res+= "<td id=\""+z.getDate()+""+months[z.getMonth()]+"\" style=\"text-align: center; font-size:10px;\"><div style=\"text-align:right;\"><a style=\"color:black;\" href=\"javascript:day("+z.getFullYear()+","+z.getMonth()+","+z.getDate()+")\">"+z.getDate()+" "+months[z.getMonth()]+"</a></div><div style=\"height:75px; overflow:hidden;\"></div></td>";
                            }else{
                                res+= "<td id=\""+z.getDate()+""+months[z.getMonth()]+"\" style=\"text-align: center; padding:10px; font-size:12px;\"><div style=\"text-align:right; \"><a style=\"color:black;\" href=\"javascript:day("+z.getFullYear()+","+z.getMonth()+","+z.getDate()+")\">"+z.getDate()+"</a></div><div style=\"height:75px; overflow:hidden;\"></div></td>"; 
                            }

                        }
                        if(++j<=6)
                        {
                            for(k=j;k<=6;k++)
                            {
                                if(i<=31 || k<=6)
                                {
                                    i++; 
                                }else{
                                    break;
                                }
                                z =new Date(y,m,i);
                                if(z.getDate()==1){
                                    res+= "<td id=\""+z.getDate()+""+months[z.getMonth()]+"\" style=\"text-align: center; padding:10px; font-size:12px;\"><div style=\"text-align:right; \"><a style=\"color:black;\" href=\"javascript:day("+z.getFullYear()+","+z.getMonth()+","+z.getDate()+")\">"+z.getDate()+" "+months[z.getMonth()]+"</a></div><div style=\"height:75px; overflow:hidden;\"></div></td>";
                                }else{
                                    res+= "<td id=\""+z.getDate()+""+months[z.getMonth()]+"\" style=\"text-align: center; padding:10px; font-size:12px;\"><div style=\"text-align:right; \"><a style=\"color:black;\" href=\"javascript:day("+z.getFullYear()+","+z.getMonth()+","+z.getDate()+")\">"+z.getDate()+"</a></div><div style=\" height:75px; overflow:hidden;\"></div></td>";
                                }
                            }

                        }
                        res+="</tr>";
                    }
                    res+="</tbody>";
                    document.getElementById("daysofweek").innerHTML = res;
                }
                //function for week of month
                function week(c,d1,b){
                    btd=0;
                    btw=1;
                    btm=0;
                    var g = new Date(c,d1,b);
                    d = g;
                    y = g.getFullYear();
                    x = g.getMonth();
                    var curr = new Date();
                    var dw = g.getDay();
                    var hh = g.getHours();
                    hh = hh % 12;
                    hh = hh ? hh : 12;
                    var dd = "AM";
                    var i,j,res="";
                    var first=g,end;
                    var req = new Date();
                    res+="<thead><tr><td style=\"text-align: center; padding:20px; font-size:12px;\">Timings</td>";

                    console.log(g);
                    for(i=g.getDay();i>=0;i--){

                        temp = new Date(c,d1,g.getDate()-i);
                        if(i==g.getDay()){
                            console.log("1");
                            first = new Date(c,d1,g.getDate()-i);
                            console.log(first);
                        }
                        if(highl==1 && req.getDay()==temp.getDay() && req.getDate()==temp.getDate() && req.getMonth()==temp.getMonth() && req.getFullYear()==temp.getFullYear()){
                            res+="<td style=\"text-align: center;  background-color:yellow; padding:20px; font-size:12px;\"><a style=\"color:black;\" href=\"javascript:day("+temp.getFullYear()+","+temp.getMonth()+","+temp.getDate()+")\">"+days[temp.getDay()]+" "+(temp.getMonth()+1)+"/"+temp.getDate()+"</a></td>";
                        }else{
                            res+="<td style=\"text-align: center; padding:20px; font-size:12px;\"><a style=\"color:black;\" href=\"javascript:day("+temp.getFullYear()+","+temp.getMonth()+","+temp.getDate()+")\">"+days[temp.getDay()]+" "+(temp.getMonth()+1)+"/"+temp.getDate()+"</a></td>";
                        }
                    }
                    u = g.getDate();
                    if(curr===g){
                        for(i=g.getDay()+1;i<=6;i++){
                            temp = new Date(c,d1,g.getDate()+i);
                            if(i==6){
                                end = new Date(c,d1,i-1);
                            }
                            res+="<td style=\"text-align: center; padding:20px; font-size:12px;\"><a style=\"color:black;\" href=\"javascript:day("+temp.getFullYear()+","+temp.getMonth()+","+temp.getDate()+")\">"+days[temp.getDay()]+" "+(temp.getMonth()+1)+"/"+temp.getDate()+"</a></td>";
                        }
                    }else{
                        for(i=g.getDay()+1;i<=6;i++){

                            temp = new Date(c,d1,++u);
                            if(i==6){
                                end = new Date(c,d1,u);
                            }
                            res+="<td style=\"text-align: center; padding:20px; font-size:12px;\"><a style=\"color:black;\" href=\"javascript:day("+temp.getFullYear()+","+temp.getMonth()+","+temp.getDate()+")\">"+days[temp.getDay()]+" "+(temp.getMonth()+1)+"/"+temp.getDate()+"</a></td>";
                        }
                    }
                    if(g.getDay()==6){
                        end = g;
                    }
                    res+="</tr></thead><tbody style=\"overflow-y:scroll;\">";
                    for(j=0;j<hh;j++){
                        if(j==0){
                            res+="<tr><td style=\"text-align: center; padding:20px; font-size:12px;\">"+12+""+dd+"</td>";  
                            for(k=1;k<=7;k++){
                                res+="<td style=\"text-align: center; padding:20px; font-size:12px;\"></td>";  
                            }
                            res+="</tr>";
                        }
                        if(j>=12){
                            dd="PM";
                            res+="<tr><td style=\"text-align: center; padding:20px; font-size:12px;\">"+j+""+dd+"</td>";
                            for(k=1;k<=7;k++){
                                res+="<td style=\"text-align: center; padding:20px; font-size:12px;\"></td>";  
                            }
                            res+="</tr>";
                        }else if(j!=0){
                            dd="AM";
                            res+="<tr><td style=\"text-align: center; padding:20px; font-size:12px;\">"+j+""+dd+"</td>";
                            for(k=1;k<=7;k++){
                                res+="<td style=\"text-align: center; padding:20px; font-size:12px;\"></td>";  
                            }
                            res+="</tr>";
                        }
                    }

                    for(j=hh;j<=12;j++){
                        if(j==0){
                            res+="<tr><td style=\"text-align: center; padding:20px; font-size:12px;\">"+12+""+dd+"</td>";  
                            for(k=1;k<=7;k++){
                                res+="<td style=\"text-align: center; padding:20px; font-size:12px;\"></td>";  
                            }
                            res+="</tr>";
                        }
                        if(j==12){
                            dd="PM";
                            res+="<tr><td style=\"text-align: center; padding:20px; font-size:12px;\">"+j+""+dd+"</td>";
                            for(k=1;k<=7;k++){
                                res+="<td style=\"text-align: center; padding:20px; font-size:12px;\"></td>";  
                            }
                            res+="</tr>";
                        }else{
                            dd="AM";
                            res+="<tr><td style=\"text-align: center; padding:20px; font-size:12px;\">"+j+""+dd+"</td>";
                            for(k=1;k<=7;k++){
                                res+="<td style=\"text-align: center; padding:20px; font-size:12px;\"></td>";  
                            }
                            res+="</tr>";
                        }
                    }

                    for(j=1;j<=hh;j++){
                        if(j!=12){
                            dd="PM";
                            res+="<tr><td style=\"text-align: center; padding:20px; font-size:12px;\">"+j+""+dd+"</td>";
                            for(k=1;k<=7;k++){
                                res+="<td style=\"text-align: center; padding:20px; font-size:12px;\"></td>";  
                            }
                            res+="</tr>";
                        }
                    }
                    for(j=hh+1;j<12;j++){
                        if(j==0){
                            dd="AM";
                            res+="<tr><td style=\"text-align: center; padding:20px; font-size:12px;\">"+12+""+dd+"</td>";  
                            for(k=1;k<=7;k++){
                                res+="<td style=\"text-align: center; padding:20px; font-size:12px;\"></td>";  
                            }
                            res+="</tr>";
                        }
                        if(j==12){

                        }else{
                            dd="PM";
                            res+="<tr><td style=\"text-align: center; padding:20px; font-size:12px;\">"+j+""+dd+"</td>";
                            for(k=1;k<=7;k++){
                                res+="<td style=\"text-align: center; padding:20px; font-size:12px;\"></td>";  
                            }
                            res+="</tr>";
                        }
                    }
                    if((first.getFullYear()==end.getFullYear()) && (first.getMonth()==end.getMonth())){
                        document.getElementById("date").innerHTML = months[first.getMonth()]+" "+first.getDate()+"-"+end.getDate()+", "+end.getFullYear();
                    }
                    else{
                        if(first.getFullYear()==end.getFullYear()){
                            if(first.getMonth()!=end.getMonth()){
                                document.getElementById("date").innerHTML = months[first.getMonth()]+" "+first.getDate()+"-"+months[end.getMonth()]+" "+end.getDate()+", "+end.getFullYear();
                            }
                        }else if(first.getFullYear()!=end.getFullYear()){
                            document.getElementById("date").innerHTML = months[first.getMonth()]+" "+first.getDate()+","+first.getFullYear()+"-"+months[end.getMonth()]+" "+end.getDate()+", "+end.getFullYear();
                        }

                    }
                    res+="</tbody>";
                    document.getElementById("daysofweek").innerHTML = res;
                }
                //function for day of month
                function day(q,d2,r){
                    btd=1;
                    btw=0;
                    btm=0;
                    var g = new Date(q,d2,r);
                    d = new Date(q,d2,r);
                    x = d.getMonth();
                    y = d.getFullYear();
                    var dw = g.getDay();
                    var hh = g.getHours();
                    hh = hh % 12;
                    hh = hh ? hh : 12;
                    var dd = "AM";
                    var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
                    var i,j,res="";
                    res+="<thead><tr><td colspan=\"2\" style=\"text-align: center; padding:20px; font-size:12px;\">"+days[g.getDay()]+"</td></tr></thead><tbody id=\"daybody\" style=\"overflow:scroll;\">";
                    for(j=0;j<hh;j++){
                        if(j==0){
                            res+="<tr><td style=\"text-align: center; width:10%; padding:20px; font-size:12px;\">"+12+""+dd+"</td><td></td></tr>";
                        }
                        if(j>=12){
                            dd="PM";
                            res+="<tr><td style=\"text-align: center; padding:20px; font-size:12px;\">"+j+""+dd+"</td><td></td></tr>";
                        }else if(j!=0){
                            dd="AM";
                            res+="<tr><td style=\"text-align: center; padding:20px; font-size:12px;\">"+j+""+dd+"</td><td></td></tr>";
                        }
                    }

                    for(j=hh;j<=12;j++){
                        if(j==0){
                            res+="<tr><td style=\"text-align: center; padding:20px; font-size:12px;\">"+12+""+dd+"</td><td></td></tr>";
                        }
                        if(j==12){
                            dd="PM";
                            res+="<tr><td style=\"text-align: center; padding:20px; font-size:12px;\">"+j+""+dd+"</td><td></td></tr>";
                        }else{
                            dd="AM";
                            res+="<tr><td style=\"text-align: center; padding:20px; font-size:12px;\">"+j+""+dd+"</td><td></td></tr>";
                        }
                    }
                    for(j=1;j<=hh;j++){
                        if(j==12){

                        }else{
                            dd="PM";
                            res+="<tr><td style=\"text-align: center; padding:20px; font-size:12px;\">"+j+""+dd+"</td><td></td></tr>";
                        }
                    }
                    for(j=hh+1;j<12;j++){
                        if(j==0){
                            dd="AM";
                            res+="<tr><td style=\"text-align: center; padding:20px; font-size:12px;\">"+12+""+dd+"</td><td></td></tr>";
                        }
                        if(j==12){

                        }else{
                            dd="PM";
                            res+="<tr><td style=\"text-align: center; padding:20px; font-size:12px;\">"+j+""+dd+"</td><td></td></tr>";
                        }
                    }
                    res+="</tbody>";
                    document.getElementById("date").innerHTML = months[g.getMonth()]+" "+g.getDate()+","+g.getFullYear();
                    document.getElementById("daysofweek").innerHTML = res;
                }
                window.onload = cal(y,x);
            </script>
            </body>
        </html>