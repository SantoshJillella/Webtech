<html>
    <head>
        <title>BMI!</title>
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
            #about{
                width:auto;
            }
            #age{
                width:100px;
            }
            #form{
                width:400px;
            }
            @media(max-width:768px){
                #about{
                    width: 100px;
                }
                #age{
                    width: 240px;
                }
                #form{
                    width:305px;
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
                    <h3 style="color:lightblue; float:left; font-size:18px;">Body Mass Index(BMI)</h3>

                </div>
                <div class="container-fluid" style="background-color:black; color:white; box-shadow:2px 2px 2px #888888; padding:20px; border-radius:5px;">
                    <h1>Under Maintenance!!</h1>
                    <p>Will be up shortly.</p>
                    <div style="text-align:center; background-color:red;"><h1>BMI Calculator</h1></div>
                    <div style="text-align:center; width:auto; height:auto; padding:10px;">
                        <form id="form" style="height:auto; margin:auto;">
                            <label style="float:left; text-align:center; margin-top:5px;">Enter your Weight:&nbsp;</label>
                            <input id="weight" type="text" class="form-control" style="width:240px;" placeholder="Enter weight in pounds..eg(100lb)" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter weight in pounds..eg(100lb)'"/><br/>
                            <label style="float:left; text-align:center; margin-top:5px;">Enter your Height: &nbsp;</label>
                            <input id="height" type="text" class="form-control" style="width:240px;" placeholder="Enter height in meters..eg(10m)" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter height in meters..eg(10m)'"/><br/>
                            <label style="float:left; text-align:center; margin-top:5px;">Enter your Age: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            <input id="age" class="form-control" type="text"/><br/>
                            <label style="float:left; text-align:center; margin-top:5px;">Gender:</label>
                            <label class="radio-inline"><input type="radio" name="gender" value="male">Male</label>
                            <label class="radio-inline"><input type="radio" name="gender" value="female">Female</label>
                            <label class="radio-inline"><input type="radio" name="gender" value="other">Others</label><br/>
                            <div class="row" style="width:auto; height:50px; padding:0px; margin:auto; display:inline-block;">
                                <button type="button" class="btn btn-primary pull-left" style="margin:2px; width:150px; background-color: red; float:left; font-size:12px;" onclick="calculate()">Calculate</button>
                                <button type="button" id="abt" class="btn btn-primary pull-left" style=" float:left; margin:2px; width:150px; background-color: red; float:left; font-size:12px;" onclick="about()">About</button>
                            </div>
                        </form>
                    </div>
                    <br/>
                    <div id="final" style="text-align:center; padding:10px; width:auto; margin-top:10px; color:white; height:50px;"></div>
                    <hr/>
                    <br/>
                    <div id="about" style="margin:auto; padding:0px; word-wrap: break-word; display:none; margin:auto;">
                        Body mass index (BMI) is a measure of body fat based on your weight in relation to your height, and applies to most adult men and women aged 20 and over. For children aged 2 and over, BMI percentile is the best assessment of body fat.
                    </div>
                </div>
            </div>
        </div>
        <script type="application/javascript">
            var w,h,a;
            function about(){
                if(document.getElementById("about").style.display == "none"){
                    document.getElementById("about").style.display = "block";
                    document.getElementById("abt").innerHTML = "Hide Details";
                }else if(document.getElementById("about").style.display == "block"){
                    document.getElementById("about").style.display = "none";
                    document.getElementById("abt").innerHTML = "About";
                }
            }
            function calculate() {
                w = document.forms["form"]["weight"].value;
                h = document.forms["form"]["height"].value;
                a = document.forms["form"]["age"].value;
                if (w == "" || h=="" || a == "" ) {
                    alert("All details must be filled out");
                }
                var weigh = parseFloat(w.substring(0, w.length - 2));
                var heigh = Math.pow(parseFloat(h.substring(0, h.length - 1)),2);
                var r = weigh/heigh;
                console.log(r);
                if(r>=19 && r<26){
                    document.getElementById("final").innerHTML = "Your BMI is "+r+" which is ideal";
                }else if(r>=26){
                    document.getElementById("final").innerHTML = "Your BMI is "+r+" which is overweight";
                }else{
                    document.getElementById("final").innerHTML = "Your BMI is "+r+" which is underweight";
                }
                
            }
        </script>
    </body>
</html>
</body>
</html>