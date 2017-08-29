<html>
    <head>
        <title>Forecast</title>
        <script type="text/javascript">
            function changekey(obj){
                var k=document.getElementById("keyword");
                if(obj.value == "Amendments"){
                        k.innerHTML="Amendments ID*";
                    }
                else if(obj.value == "Bills"){
                        k.innerHTML="Bills ID*";
                        }
                else if(obj.value == "Committees"){
                        k.innerHTML="Committees ID*";
                        }
                else if(obj.value == "Legislators"){
                        k.innerHTML="State/Representative*";
                        }
                else{
                    k.innerHTML="Keyword*";
                }
            }
            function changeback(obj){
                obj.options.value="";
                document.getElementById("keyword").innerHTML="Keyword*";                
                obj.key.value="";
                document.getElementById("tabledisp").innerHTML="";
                document.getElementById("tabledisp").style.border="none";
                document.getElementById("house").checked="false";
            }
        </script>
    </head>
    <body>
        <?php
        $msg="";
        $d=0;
        $p=0;
        $db=array('0'=>'Select your option','1'=>'Legislators','2'=>'Committees','3'=>'Bills','4'=>'Amendments');
        if (isset($_POST['submit'])) {
            if (empty($_POST["options"])) {
                $msg.="Congress Database";
                $d++;
                $p++;
            }
            if (empty($_POST["key"])) {
                if($d==0)
                    $msg.="keyword";
                else
                    $msg.=", Keyword";
                $d++;
            }
            $arrContextOptions=array(
                "ssl"=>array(
                    "verify_peer"=>false,
                    "verify_peer_name"=>false,
                ),
            ); 
            
        }
        
        ?>
        
        <div style="margin:auto;">
            <center>
            <h1>Congress Information Search</h1>
            <div id="formpart" style="border:1px solid black; width:335px; height:150px;">
                <form name="myform" method="post" id="form1" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <table style="margin-top:-15px; font-size:18px;">
                    <tr>
                        <td style="text-align:center;   ">
                            <label>Congress Database</label>
                        </td>
                        <td style="text-align:left; padding-left:10px;">
                            <select id="options" name="options" style="width:153px;" onchange="changekey(this)" value="">
                                <option value="" selected disabled>Select your option</option>
                                <option value="Legislators">Legislators</option>
                                <option value="Committees" >Committees</option>
                                <option value="Bills"  >Bills</option>
                                <option value="Amendments">Amendments</option>
                            </select>
                        </td>
                    </tr>
                    <br/>
                    <tr>
                        <td style="text-align:center;">
                            <label>Chamber</label>
                        </td>
                        <td style="text-align:left; padding-left:10px;">
                            <input id="senate" name="chamber" type="radio" value="senate" checked="True"/><label><span style="font-size:18px;">Senate</span></label>
                            <input id="house" name="chamber" type="radio" value="house"/><label><span style="font-size:18px;">House</span></label>
                        </td>
                    </tr>
                        <tr>
                            <td style="text-align:center; padding:0px;">
                                <?php 
                                if(! isset($_POST['options']) || empty($_POST['options']))
                                    {
                                ?>
                                <label id="keyword">Keyword*</label>
                                <?php 
                                    }
                                else if($_POST['options'] == "Amendments")
                                    {
                                ?>
                                <label id="keyword">Amendments ID*</label>
                                <?php 
                                    }
                                else if($_POST['options'] == "Bills")
                                    {
                                ?>
                                <label id="keyword">Bills ID*</label>
                                <?php 
                                    }
                                else if($_POST['options'] == "Committees")
                                    {
                                ?>
                                <label id="keyword">Committees ID*</label>
                                <?php 
                                    }
                                else if($_POST['options'] == "Legislators")
                                    {
                                ?>
                                <label id="keyword">State/Representative*</label>
                                <?php 
                                    }
                                else
                                    {
                                ?>
                                <label id="keyword">Keyword*</label>
                                <?php 
                                    }
                                ?>
                            </td>
                            <td style="text-align:left; padding-left:10px;">
                                <input id="key" type="text" name="key" style="width:153px;" value=""/>
                            </td>
                        </tr>
                    <tr>
                        <td></td>
                        <td style="text-align:center; margin-top:0px; padding-left:10px;">
                            <div>
                            <input name="submit" type="submit" value="Search" style="width:60px;"/>
                            <input type="reset" value="Clear" onclick="changeback(this.form)" style="width:60px;"/>
                            </div>
                        </td>
                    </tr>
                    </table>
                </form>
                <a href="http://sunlightfoundation.com/"> Powered by Sunlight Foundation</a>
            </div>
            </center>
        </div>
        <div id="tabledisp" style=" width:900px; height:500px; margin:auto; margin-top:50px; ">
            
            <?php
            $temp="";
            $st="";
            $k="";$v="";
            $c=0;
            $codes = array('Alabama'=>'AL', 'Montana'=>'MT','Alaska'=>'AK','Nebraska'=>'NE','Arizona'=>'AZ','Nevada'=>'NV','Arkansas'=>'AR','New Hampshire'=>'NH','California'=>'CA','New Jersey'=>'NJ','Colorado'=>'CO','New Mexico'=>'NM', 'Connecticut'=>'CT','New York'=>'NY','Delaware'=>'DE','North Carolina'=>'NC','District Of Columbia'=>'DC', 'North Dakota'=>'ND', 'Florida'=>'FL', 'Ohio'=>'OH','Georgia'=>'GA', 'Oklahoma'=>'OK', 'Hawaii'=>'HI', 'Oregon'=>'OR','Idaho'=>'ID','Pennsylvania'=>'PA','Illinois'=>'IL','Rhode Island'=>'RI', 'Indiana'=>'IN', 'South Carolina'=>'SC','Iowa'=>'IA','South Dakota'=>'SD', 'Kansas'=>'KS', 'Tennessee'=>'TN', 'Kentucky'=>'KY','Texas'=>'TX','Louisiana'=>'LA','Utah'=>'UT','Maine'=>'ME','Vermont'=>'VT','Maryland'=>'MD','Virginia'=>'VA','Massachusetts'=>'MA','Washington'=>'WA','Michigan'=>'MI','West Virginia'=>'WV', 'Minnesota'=>'MN','Wisconsin'=>'WI','Mississippi'=>'MS', 'Wyoming'=>'WY', 'Missouri'=>'MO');
            
            function printdetails($data){
                    
                echo "<script>
                document.getElementById('tabledisp').style.width=700;
                document.getElementById('tabledisp').style.height=450;
                
                document.getElementById('tabledisp').style.border='1px solid black';
                
                </script>";
                echo "<table style='margin:auto; margin-left:150px; width:700px; font-size:20px;  border-collapse: collapse;'>";
                $i=0;
                echo "<tr><td colspan='2'style='padding-left:100px; '><img src='http://theunitedstates.io/images/congress/225x275/".$data['results'][$i]['bioguide_id'].".jpg' width=200 height=200></td></tr><br/><td></td><td></td>";
                if($data['results'][$i]['title']==NULL && $data['results'][$i]['first_name']==NULL && $data['results'][$i]['last_name']==NULL)
                    echo "<tr><td>Full name</td><td>NA</td>";
                else
                    echo "<tr><td>Full name</td><td>".$data['results'][$i]['title']." ".$data['results'][$i]['first_name']."  ".$data['results'][$i]['last_name']."</td>";
                if($data['results'][$i]['term_end']==NULL)
                    echo "<tr style='margin-left:100px;'><td>Term Ends on</td><td>NA</td>";
                else
                    echo "<tr style='margin-left:100px;'><td>Term Ends on</td><td>".$data['results'][$i]['term_end']."</td>";
                if($data['results'][$i]['website']==NULL)
                    echo "<tr><td>Website</td><td><a href=''>NA</a></td>";
                else
                    echo "<tr><td>Website</td><td><a href='".$data['results'][$i]['website']."'>".$data['results'][$i]['website']."</a></td>";
                if($data['results'][$i]['office']==NULL)
                    echo "<tr><td>Office</td><td>NA</td>";
                else
                    echo "<tr><td>Office</td><td>".$data['results'][$i]['office']."</td>";
                
                if(array_key_exists('facebook_id',$data['results'][$i]) && isset($data['results'][$i]['facebook_id']))
                    echo "<tr><td>Facebook</td><td><a href='http://www.facebook.com/".$data['results'][$i]['facebook_id']."'>".$data['results'][$i]['first_name']." ".$data['results'][$i]['last_name']."</a></td></tr>";
                else{
                    echo "<tr><td>Facebook</td><td>NA</td></tr>";
                }
                
                if(array_key_exists('twitter_id',$data['results'][$i]) && isset($data['results'][$i]['twitter_id']))
                    echo "<tr><td>Twitter</td><td><a href='http://twitter.com/".$data['results'][$i]['twitter_id']."'>".$data['results'][$i]['first_name']." ".$data['results'][$i]['last_name']."</a></td></tr>";
                else{
                    echo "<tr><td>Twitter</td><td>NA</td></tr>";
                }
                echo "</table>";
                
            }
            function printbilldetails($data){
                echo "<script>
                document.getElementById('tabledisp').style.width=700;
                document.getElementById('tabledisp').style.height=300;
               
                document.getElementById('tabledisp').style.border='1px solid black';
                
                </script>";
                echo "<center><table style='border-spacing:10px; margin:auto; margin-top:50px; margin-left:100px; width:700px; font-size:20px;  border-collapse: collapse;'>";
                $i=0;
                echo "<tr><td style='padding:2px;'>Bill ID</td><td>".$data['results'][$i]['bill_id']."</td>";
                if($data['results'][$i]['short_title']!=NULL)
                    echo "<tr><td style='padding:2px;'>Bill Title</td><td>".$data['results'][$i]['short_title']."</td>";
                else
                    echo "<tr><td style='padding:2px;'>Bill Title</td><td>NA</td>";
                echo "<tr><td style='padding:2px;'>Sponsors</td><td>".$data['results'][$i]['sponsor']['first_name']." ".$data['results'][$i]['sponsor']['last_name']."</td>";
                echo "<tr><td style='padding:2px;'>Introduced On</td><td>".$data['results'][$i]['introduced_on']."</td>";
                echo "<tr><td style='padding:2px;'>Last action with date</td><td>".$data['results'][$i]['last_version']['version_name']."  ".$data['results'][$i]['last_action_at']."</td>";
                if($data['results'][$i]['short_title']!=NULL)
                    echo "<tr><td style='padding:2px;'>Bill URL</td><td><a href='".$data['results'][$i]['last_version']['urls']['pdf']."'>".$data['results'][$i]['short_title']."</a></td>";
                else
                    echo "<tr><td style='padding:2px;'>Bill URL</td><td><a href='".$data['results'][$i]['last_version']['urls']['pdf']."'>".$data['results'][$i]['bill_id']."</a></td>";
                echo "</table></center>";
                
            }
            
            if($d==2){
                    echo "<script type='text/javascript'>alert('Please enter the following missing information: $msg');</script>";
                    exit(1);
                }
            if($p==1){
                echo "<script type='text/javascript'>alert('Please enter the following missing information: $msg');</script>";
                exit(1);
            }
            
            date_default_timezone_set('UTC');
            
            if(isset($_POST["submit"]) && isset($_POST['options']) && isset($_POST['key'])){  
                
                echo "
                    
                    <script type='text/javascript'>
                        document.getElementById('options').value = '".$_POST['options']."';
                        document.getElementById('key').value = '".$_POST['key']."';
                    </script>
                    
                    ";
                /*if($_POST['chamber']=="senate"){
                    echo "
                    
                    <script type='text/javascript'>
                        document.getElementById('senate').checked = 'true';
                    </script>
                    
                    ";
                }else if($_POST['chamber']=="house"){
                    echo "
                    
                    <script type='text/javascript'>
                        document.getElementById('house').checked = 'true';
                    </script>
                    
                    ";
                }*/
                if($d==1){
                    echo "<script type='text/javascript'>alert('Please enter the following missing information: $msg');</script>";
                    exit(1);
                }
                
                if($_POST['chamber']=="house")
                    echo "<script type='text/javascript'>
                        document.getElementById('house').checked='true';
                    </script>";
                    if($_POST['chamber']=="senate")
                        echo "<script type='text/javascript'>
                            document.getElementById('senate').checked='true';
                        </script>";
                if($_POST['key']=="" or !isset($_POST['key'])){
                        exit(1);
                    }
                $s=0;
                
                if($_POST['options']=="Legislators"){
                    foreach($codes as $k => $v){
                        if($k==ucwords(strtolower(trim($_POST['key']))))
                            $s++;
                    }
                    if($s!=0){
                        $st=$codes[ucwords(strtolower(trim($_POST['key'])))];
                        $url="http://congress.api.sunlightfoundation.com/legislators?chamber=".$_POST['chamber']."&state=".$st."&apikey=08903a8d41774814810ded56e0212eb8";
                    }
                    else{
                        $url="http://congress.api.sunlightfoundation.com/legislators?chamber=".$_POST['chamber']."&query=".trim($_POST['key'])."&apikey=08903a8d41774814810ded56e0212eb8";
                    }
                    if(ucwords(strtolower(trim($_POST['key'])))==NULL){
                        echo "<center><p style='font-size:20px;'>The API returned zero results for the request.</p></center>";
                        exit(1);
                    }
                    /*if($_POST['chamber']=="house"){
                        if($s==0){
                            echo "<center><p style='font-size:20px;'>The API returned zero results for the request.</p></center>";
                            return 0;
                        }
                        $st=$codes[ucwords(strtolower($_POST['key']))];
                            
                        $url="http://congress.api.sunlightfoundation.com/legislators?chamber=".$_POST['chamber']."&state=".$st."&apikey=08903a8d41774814810ded56e0212eb8";
                        if($url==NULL){
                            echo "<p>No such state</p>";
                            exit(1);
                        }
                    }
                    else if($_POST['chamber']=="senate"){
                        if($s==0){
                            $url="http://congress.api.sunlightfoundation.com/legislators?chamber=".$_POST['chamber']."&apikey=08903a8d41774814810ded56e0212eb8";
                        }else{
                         echo "<center><p style='font-size:20px;'>The API returned zero results for the request.</p></center>";
                            return 0;
                        }
                        
                    }*/
                
                    $json = file_get_contents($url,false,stream_context_create($arrContextOptions));
                    $data = json_decode($json, true);
                    
                    $c=0;
                    
                        
                    if($_POST['chamber']=="senate" || $_POST['chamber']=="house"){
                        $temp=ucwords(strtolower(trim($_POST['key'])));
                        
                        for($i=0;$i<count($data['results']);$i++){
                            if($temp==$data['results'][$i]['first_name'] || $temp==$data['results'][$i]['last_name'] || $temp==$data['results'][$i]['middle_name']){
                                $c++;
                                
                            }
                        }
                    }
                    /*if($c==0 && ($_POST['chamber']=="senate" || $_POST['chamber']=="house")){
                        echo "<center><p style='font-size:20px;'>The API returned zero results for the request.</p></center>";
                        exit(1);
                    }*/

                    if($s==0 && $c==0){
                        echo "<center><p style='font-size:20px;'>The API returned zero results for the request.</p></center>";
                        exit(1);
                    }
                    echo "<script>
                        document.getElementById('tabledisp').style.width=700;
                        document.getElementById('tabledisp').style.height=300;
                        document.getElementById('tabledisp').style.border='none';
                        

                        </script>";
                    
                    
                    
                    
                    
                    if(empty($data['results'])!=1)
                       {
                        echo "  <table style='text-align:center; margin:auto; width:700px; font-size:20px;  border-collapse: collapse;'>
                        <tr>
                        <th style='border:1px solid black;'>Name</th>
                        <th style='border:1px solid black;'>State</th>
                        <th style='border:1px solid black;'>Chamber</th>
                        <th style='border:1px solid black;'>Details</th>
                        </tr>";
                        
                        /*if($c>0){
                            $temp=ucwords(strtolower($_POST['key']));
                        }*/

                        for($i=0;$i<count($data['results']);$i++){
                            if($data['results'][$i]['chamber']=="senate"){
                                if($c>0){
                                    if($temp==$data['results'][$i]['first_name'] || $temp==$data['results'][$i]['last_name'] || $temp==$data['results'][$i]['middle_name'] && $temp!=NULL){
                                        echo "<tr style='border:1px solid black;'><td style='text-align:left; padding-left:100px;'>".$data['results'][$i]['first_name']." ".$data['results'][$i]['last_name']."</td>";
                                        echo "<td style='border:1px solid black;'>".$data['results'][$i]['state_name']."</td>";
                                        echo "<td style='border:1px solid black;'>".$data['results'][$i]['chamber']."</td>";


                                        $newurl="congress.php?chamber=".$data['results'][$i]['chamber']."&state=".$data['results'][$i]['state']."&bioguide_id=".$data['results'][$i]['bioguide_id']."&options=".$_POST['options']."&key=".$_POST['key'];

                                        echo "<td style='border:1px solid black;'><a href='".$newurl."'>view details</td></tr>";
                                        
                                        $c--;
                                        
                                        if($c==0)
                                            break;

                                    }
                                }
                                else if($s>0){
                                    
                                    if(ucwords(strtolower($_POST['key']))==$data['results'][$i]['state_name']){
                                        echo "<tr style='border:1px solid black;'><td  style='text-align:left; padding-left:100px;'>".$data['results'][$i]['first_name']." ".$data['results'][$i]['last_name']."</td>";
                                        echo "<td style='border:1px solid black;'>".$data['results'][$i]['state_name']."</td>";
                                        echo "<td style='border:1px solid black;'>".$data['results'][$i]['chamber']."</td>";


                                        $newurl="congress.php?chamber=".$data['results'][$i]['chamber']."&state=".$data['results'][$i]['state']."&bioguide_id=".$data['results'][$i]['bioguide_id']."&options=".$_POST['options']."&key=".$_POST['key'];

                                        echo "<td style='border:1px solid black;'><a href='".$newurl."'>view details</td></tr>";
                                    }
                                    
                                }
                            }else if($_POST['chamber']=="house"){
                                if($c>0){
                                    if($temp==$data['results'][$i]['first_name'] || $temp==$data['results'][$i]['last_name'] || $temp==$data['results'][$i]['middle_name'] && $temp!=NULL){
                                        echo "<tr style='border:1px solid black;'><td style='text-align:left; padding-left:100px;'>".$data['results'][$i]['first_name']." ".$data['results'][$i]['last_name']."</td>";
                                        echo "<td style='border:1px solid black;'>".$data['results'][$i]['state_name']."</td>";
                                        echo "<td style='border:1px solid black;'>".$data['results'][$i]['chamber']."</td>";


                                        $newurl="congress.php?chamber=".$data['results'][$i]['chamber']."&state=".$data['results'][$i]['state']."&bioguide_id=".$data['results'][$i]['bioguide_id']."&options=".$_POST['options']."&key=".$_POST['key'];

                                        echo "<td style='border:1px solid black;'><a href='".$newurl."'>view details</td></tr>";
                                        
                                        $c--;
                                        
                                        if($c==0)
                                            break;

                                    }
                                }
                                else if($s>0){
                                    if(ucwords(strtolower($_POST['key']))==$data['results'][$i]['state_name']){
                                        echo "<tr style='border:1px solid black;'><td  style='text-align:left; padding-left:100px;'>".$data['results'][$i]['first_name']." ".$data['results'][$i]['last_name']."</td>";
                                        echo "<td style='border:1px solid black;'>".$data['results'][$i]['state_name']."</td>";
                                        echo "<td style='border:1px solid black;'>".$data['results'][$i]['chamber']."</td>";


                                        $newurl="congress.php?chamber=".$data['results'][$i]['chamber']."&state=".$data['results'][$i]['state']."&bioguide_id=".$data['results'][$i]['bioguide_id']."&options=".$_POST['options']."&key=".$_POST['key'];

                                        echo "<td style='border:1px solid black;'><a href='".$newurl."'>view details</td></tr>";
                                    }
                                    
                                }
                            }
                        }

                        echo "</table>";
                    }
                    else{
                         echo "<center><p style='font-size:20px;'>The API returned zero results for the request.</p></center>";
                    }
                    
                }
                else if($_POST['options']=="Committees"){
                    if(ucwords(strtolower(trim($_POST['key'])))==NULL){
                        echo "<center><p style='font-size:20px;'>The API returned zero results for the request.</p></center>";
                        exit(1);
                    }
                    if($_POST['chamber']=="house"){
                        $url="http://congress.api.sunlightfoundation.com/committees?committee_id=".ucwords(strtoupper($_POST['key']))."&chamber=house&apikey=08903a8d41774814810ded56e0212eb8";
                    }
                    else{
                    $url="http://congress.api.sunlightfoundation.com/committees?committee_id=".ucwords(strtoupper($_POST['key']))."&chamber=senate&apikey=08903a8d41774814810ded56e0212eb8";
                    }
                    $json = file_get_contents($url,false,stream_context_create($arrContextOptions));
                    $data = json_decode($json, true);
                    $com=0;
                    for($i=0;$i<count($data['results']);$i++){
                        if($_POST['chamber']!=$data['results'][$i]['chamber']){
                                 $com++;
                            }
                            
                    }
                    if($com!=0){
                        echo "<center><p style='font-size:20px;'>The API returned zero results for the request.</p></center>";
                        return 0;
                            
                    }
                    
                    if(empty($data['results'])!=1)
                   {
                        echo "  <table style='border:1px solid black; text-align:center; margin:auto; width:700px; font-size:20px;  border-collapse: collapse;'>
                        <tr>
                        <th style='border:1px solid black;'>Committee ID</th>
                        <th style='border:1px solid black;'>Committee Name</th>
                        <th style='border:1px solid black;'>Chamber</th>
                        </tr>";

                        for($i=0;$i<count($data['results']);$i++){
                            echo "<tr style='border:1px solid black;'><td>".$data['results'][$i]['committee_id']."</td>";
                            echo "<td style='border:1px solid black;'>".$data['results'][$i]['name']."</td>";
                            echo "<td style='border:1px solid black;'>".$data['results'][$i]['chamber']."</td>";
                        }
                    
                        echo "</table>";
                    }
                    else{
                         echo "<center><p style='font-size:20px;'>The API returned zero results for the request.</p></center>";
                    }
                    
                }
                else if($_POST['options']=="Bills"){
                    if(ucwords(strtolower(trim($_POST['key'])))==NULL){
                        echo "<center><p style='font-size:20px;'>The API returned zero results for the request.</p></center>";
                        exit(1);
                    }
                    if($_POST['chamber']=="house"){
                        $url="http://congress.api.sunlightfoundation.com/bills?bill_id=".strtolower($_POST['key'])."&chamber=house&apikey=08903a8d41774814810ded56e0212eb8";
                    }
                    else{
                        $url="http://congress.api.sunlightfoundation.com/bills?bill_id=".strtolower($_POST['key'])."&chamber=senate&apikey=08903a8d41774814810ded56e0212eb8";
                    }
                    
                    $json = file_get_contents($url,false,stream_context_create($arrContextOptions));
                    $data = json_decode($json, true);
                    $b=0;
                    for($i=0;$i<count($data['results']);$i++){
                        if($_POST['chamber']!=$data['results'][$i]['chamber']){
                                 $b++;
                            }
                            
                    }
                    if($b!=0){
                        echo "<center><p style='font-size:20px;'>The API returned zero results for the request.</p></center>";
                        return 0;
                            
                    }
                    
                    if(empty($data['results'])!=1)
                   {
                        echo "  <table style='border:1px solid red; text-align:center; margin:auto; width:700px; font-size:20px;  border-collapse: collapse;'>
                        <tr>
                        <th style='border:1px solid black;'>Bill ID</th>
                        <th style='border:1px solid black;'>Short Title</th>
                        <th style='border:1px solid black;'>Chamber</th>
                        <th style='border:1px solid black;'>Details</th>
                        </tr>";
                        
                        for($i=0;$i<count($data['results']);$i++){
                            
                            echo "<tr style='border:1px solid black;'><td>".$data['results'][$i]['bill_id']."</td>";
                            if($data['results'][$i]['short_title']!=NULL)
                                echo "<td style='border:1px solid black;'>".$data['results'][$i]['short_title']."</td>";
                            else
                                echo "<td style='border:1px solid black;'>NA</td>";
                            echo "<td style='border:1px solid black;'>".$data['results'][$i]['chamber']."</td>";
                            
                            $newurl="congress.php?chamber=".$data['results'][$i]['chamber']."&bill_id=".$data['results'][$i]['bill_id']."&options=".$_POST['options']."&key=".$_POST['key'];
                            
                            echo "<td style='border:1px solid black;'><a href='".$newurl."'>view details</td></tr>";
                        }
                    
                        echo "</table>";
                    }
                    else{
                         echo "<center><p style='font-size:20px;'>The API returned zero results for the request.</p></center>";
                    }
                }
                else if($_POST['options']=="Amendments"){
                    if(ucwords(strtolower(trim($_POST['key'])))==NULL){
                        echo "<center><p style='font-size:20px;'>The API returned zero results for the request.</p></center>";
                        exit(1);
                    }
                    $url="http://congress.api.sunlightfoundation.com/amendments?amendment_id=".strtolower($_POST['key'])."&chamber=".$_POST['chamber']."&apikey=08903a8d41774814810ded56e0212eb8";
                    
                    $json = file_get_contents($url,false,stream_context_create($arrContextOptions));
                    $data = json_decode($json, true);
                    $am=0;
                    for($i=0;$i<count($data['results']);$i++){
                        if($_POST['chamber']!=$data['results'][$i]['chamber']){
                                 $am++;
                            }
                            
                    }
                    if($am!=0){
                        echo "<center><p style='font-size:20px;'>The API returned zero results for the request.</p></center>";
                        return 0;
                            
                    }
                    if(ucwords(strtolower(trim($_POST['key'])))==NULL){
                        echo "<center><p style='font-size:20px;'>The API returned zero results for the request.</p></center>";
                        exit(1);
                    }
                    if(empty($data['results'])!=1)
                   {
                        echo "  <table style='border:1px solid black; text-align:center; margin:auto; width:700px; font-size:20px;  border-collapse: collapse;'>
                        <tr>
                        <th style='border:1px solid black;'>Amendment ID</th>
                        <th style='border:1px solid black;'>Amendment Type</th>
                        <th style='border:1px solid black;'>Chamber</th>
                        <th style='border:1px solid black;'>Introduced on</th>
                        </tr>";

                        for($i=0;$i<count($data['results']);$i++){
                            echo "<tr style='border:1px solid black;'><td>".$data['results'][$i]['amendment_id']."</td>";
                            echo "<td style='border:1px solid black;'>".$data['results'][$i]['amendment_type']."</td>";
                            echo "<td style='border:1px solid black;'>".$data['results'][$i]['chamber']."</td>";
                            echo "<td style='border:1px solid black;'>".$data['results'][$i]['introduced_on']."</td>";
                        }
                    
                        echo "</table>";
                    }
                    else{
                         echo "<center><p style='font-size:20px;'>The API returned zero results for the request.</p></center>";
                    }
                }
//                $url="http://congress.api.sunlightfoundation.com/legislators?chamber=house&state=$st&apikey=08903a8d41774814810ded56e0212eb8";
                
            }
            $arrContextOptions=array(
                "ssl"=>array(
                    "verify_peer"=>false,
                    "verify_peer_name"=>false,
                ),
            );  
            if(isset($_GET['bioguide_id']) && isset($_GET['state']) && isset($_GET['chamber'])){
                if($_GET['options']=="Legislators"){
                    echo "<script type='text/javascript'>
                        document.getElementById('keyword').innerHTML = 'State/Representatives*';
                        </script>";
                }
                if($_GET['chamber']=="house")
                    echo "<script type='text/javascript'>
                        document.getElementById('options').value = '".$_GET['options']."';
                        document.getElementById('key').value = '".$_GET['key']."';
                        document.getElementById('house').checked='true';
                    </script>";
                if($_GET['chamber']=="senate")
                    echo "<script type='text/javascript'>
                        document.getElementById('options').value = '".$_GET['options']."';
                        document.getElementById('key').value = '".$_GET['key']."';
                        document.getElementById('senate').checked='true';
                    </script>";
                    
                    $linkforDetail = "http://congress.api.sunlightfoundation.com/legislators?chamber=".$_GET['chamber']."&state=".$_GET['state']."&bioguide_id=".$_GET['bioguide_id']."&apikey=08903a8d41774814810ded56e0212eb8";
                    $json = file_get_contents($linkforDetail,true,stream_context_create($arrContextOptions));
                    $detailData = json_decode($json, true);
                    
                    if($detailData){
                        printdetails($detailData);
                    }
                    else{
                        echo "<p>“The API returned zero results for the request</p>";
                    }
                
            }else if(isset($_GET['bill_id']) && isset($_GET['chamber'])){
                if($_GET['options']=="Bills"){
                    echo "<script type='text/javascript'>
                        document.getElementById('keyword').innerHTML = 'Bills ID*';
                        </script>";
                }
                    echo "<script type='text/javascript'>
                        document.getElementById('options').value = '".$_GET['options']."';
                        document.getElementById('key').value = '".$_GET['bill_id']."';
                        document.getElementById('key').value = '".$_GET['key']."';
                    </script>";
                    
                    $linkforDetail = "http://congress.api.sunlightfoundation.com/bills?chamber=".$_GET['chamber']."&bill_id=".$_GET['bill_id']."&apikey=08903a8d41774814810ded56e0212eb8";
                    $json = file_get_contents($linkforDetail,false,stream_context_create($arrContextOptions));
                    $detailData = json_decode($json, true);
                    
                    if($detailData){
                        printbilldetails($detailData);
                    }
                    else{
                        echo "<p>“The API returned zero results for the request</p>";
                    }
                
            }
            ?>
            
        </div>
        
        <script type="text/javascript">
            function changekey(obj){
                var k=document.getElementById("keyword");
                if(obj.value == "Amendments"){
                        k.innerHTML="Amendments ID*";
                    }
                else if(obj.value == "Bills"){
                        k.innerHTML="Bills ID*";
                        }
                else if(obj.value == "Committees"){
                        k.innerHTML="Committees ID*";
                        }
                else if(obj.value == "Legislators"){
                        k.innerHTML="State/Representative*";
                        }
                else{
                    k.innerHTML="Keyword*";
                }
            }
            function changeback(obj){
                obj.reset();
                obj.options.value="";
                document.getElementById("keyword").innerHTML="Keyword*";                
                obj.key.value="";
                document.getElementById("tabledisp").innerHTML="";
                /*<?php unset($_GET)?>*/
                <?php unset($_POST['options']);?>
                document.getElementById("tabledisp").style.border="none";
                document.getElementById("house").checked="false";
            }
            
        </script>
    </body>
</html>