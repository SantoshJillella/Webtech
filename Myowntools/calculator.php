<html>
    <head>
        <title>Calculator!</title>
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
                    <h3 style="color:lightblue; float:left; font-size:18px;">Calculator</h3>

                </div>
                <div class="container-fluid" style="background-color:white; box-shadow:2px 2px 2px #888888; padding:20px; border-radius:5px;">
                    <h1>Under Maintenance!!</h1>
                    <p>Will be up shortly.</p>
                    <div style="box-shadow:2px 2px 2px #888888; border-radius:5px; height:auto; padding:50px; border:1px solid red; padding-top:20px; display:inline-block;">
                        <div class="row" style="text-align:center;">
                            <label>Standard Calculator</label>
                        </div>
                        <div class="row" id="result">
                            <form name="calc">
                                <input type="text" id="calc" value="0" class="screen text-right form-control" name="result" readonly style="width:100%;">
                            </form>
                        </div>
                        <div class="row">
                            <button id="allClear" type="button" class="btn btn-danger" onclick="clearScreen()" style="outline:0;">AC</button>
                            <button id="sign" type="button" class="btn btn-info" onclick="clearScreen()" style="outline:0;">+/-</button>
                            <button id="%" type="button" class="btn btn-info" value="%" onclick="myFunction(this.id)" style="outline:0;">%</button>
                            <button id="/" type="button" class="btn btn-info" value="/" style="background-color:#FF8C00; outline:0;" onclick="myFunction(this.id)">÷</button>
                        </div>
                        <div class="row">
                            <button id="7" type="button" class="btn btn-info" value="7" onclick="myFunction(this.id)" style="outline:0;">7</button>
                            <button id="8" type="button" class="btn btn-info" value="8" onclick="myFunction(this.id)" style="outline:0;">8</button>
                            <button id="9" type="button" class="btn btn-info" value="9" onclick="myFunction(this.id)" style="outline:0;">9</button>
                            <button id="*" type="button" class="btn btn-info" value="*" style="background-color:#FF8C00; outline:0;" onclick="myFunction(this.id)">x</button>
                        </div>
                        <div class="row">
                            <button id="4" type="button" class="btn btn-info" value="4" onclick="myFunction(this.id)" style="outline:0;">4</button>
                            <button id="5" type="button" class="btn btn-info" value="5" onclick="myFunction(this.id)" style="outline:0;">5</button>
                            <button id="6" type="button" class="btn btn-info" value="6" onclick="myFunction(this.id)" style="outline:0;">6</button>
                            <button id="-" type="button" class="btn btn-info" value="-" style="background-color:#FF8C00; outline:0;" onclick="myFunction(this.id)">-</button>
                        </div>
                        <div class="row">
                            <button id="1" type="button" class="btn btn-info" value="1" onclick="myFunction(this.id)" style="outline:0;">1</button>
                            <button id="2" type="button" class="btn btn-info" value="2" onclick="myFunction(this.id)" style="outline:0;">2</button>
                            <button id="3" type="button" class="btn btn-info" value="3" onclick="myFunction(this.id)" style="outline:0;">3</button>
                            <button id="+" type="button" class="btn btn-info" value="+" style="background-color:#FF8C00; outline:0;" onclick="myFunction(this.id)">+</button>
                        </div>
                        <div class="row">
                            <button  id="0" type="button" class="btn btn-info col-xs-6" value="0" style="margin:10px 5px; outline:0;" onclick="myFunction(this.id)">0</button>
                            <button id="." type="button" class="btn btn-info" value="." style="margin:10px 2px; outline:0;" onclick="myFunction(this.id)">.</button>
                            <button id="equals" type="button" class="btn btn-info" value="=" style="margin:10px 2px; outline:0; background-color:#FF8C00;" onclick="myFunction(this.id)">=</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="application/javascript">
            var res="";
            var total=0;
            var sign=0;
            function myFunction(id){
                if(document.getElementById(id).value=="="){
                    res=total;
                    document.getElementById("calc").value = res;
                }else if(document.getElementById(id).value == "+"){
                    res+="+";
                    document.getElementById("calc").value = res;
                    if(sign!=0){
                        res="Incorrect format";
                        document.getElementById("calc").value = res;
                        setInterval(clearScreen,2000);
                        sign=0;
                    }else{
                        sign=1;
                    }
                    
                }else if(document.getElementById(id).value == "-"){
                    res+="-";
                    document.getElementById("calc").value = res;
                    if(sign!=0){
                        res="Incorrect format";
                        document.getElementById("calc").value = res;
                        setInterval(clearScreen,2000);
                        sign=0;
                    }else{
                        sign=1;
                    }
                    
                }else if(document.getElementById(id).value == "*"){
                    res+="x";
                    document.getElementById("calc").value = res;
                    if(sign!=0){
                        res="Incorrect format";
                        document.getElementById("calc").value = res;
                        setInterval(clearScreen,2000);
                        sign=0;
                    }else{
                        sign=1;
                    }
                    
                }else if(document.getElementById(id).value == "/"){
                    res+="÷";
                    document.getElementById("calc").value = res;
                    if(sign!=0){
                        res="Incorrect format";
                        document.getElementById("calc").value = res;
                        setInterval(clearScreen,2000);
                        sign=0;
                    }else{
                        sign=1;
                    }
                    
                }else if(document.getElementById(id).value == "%"){
                    res+="%";
                    document.getElementById("calc").value = res;
                    if(sign!=0){
                        res="Incorrect format,Please try again";
                        document.getElementById("calc").value = res;
                        setInterval(clearScreen,2000);
                        sign=0;
                    }else{
                        sign=1;
                    }
                }else{
                    if(sign==0){
                        sign=1;
                    }else{
                        sign=0;
                    }
                }
            }
            function clearScreen(){
                res="0";
                document.getElementById("calc").value = res;
                
            }
        </script>
    </body>
</html>
</body>
</html>