<?php
header('Access-Control-Allow-Origin: *');
if($_SERVER["REQUEST_METHOD"]=="GET"){
    if($_GET["st"]=='state'){
        $url="http://congress.api.sunlightfoundation.com/legislators?apikey=08903a8d41774814810ded56e0212eb8&per_page=all";
        $json = file_get_contents($url,false);
        echo $json;
    }
    else if($_GET["st"]=='house'){
        $url="http://congress.api.sunlightfoundation.com/legislators?chamber=house&apikey=08903a8d41774814810ded56e0212eb8&per_page=all";
        $json = file_get_contents($url,false);
        echo $json;
    }else if($_GET["st"]=='senate'){
        $url="http://congress.api.sunlightfoundation.com/legislators?chamber=senate&apikey=08903a8d41774814810ded56e0212eb8&per_page=all";
        $json = file_get_contents($url,false);
        echo $json;
    }else if($_GET["st"]=='active'){
        $url="http://congress.api.sunlightfoundation.com/bills?apikey=08903a8d41774814810ded56e0212eb8&per_page=50&history.active=true&last_version.urls.pdf__exists=true";
        $json = file_get_contents($url,false);
        
        echo $json;
    }
    else if($_GET["st"]=='new'){
        $url="http://congress.api.sunlightfoundation.com/bills?apikey=08903a8d41774814810ded56e0212eb8&per_page=50&history.active=false&last_version.urls.pdf__exists=true";
        $json = file_get_contents($url,false);
        
        echo $json;
    }
    else if($_GET["st"]=='hs'){
        $url="http://congress.api.sunlightfoundation.com/committees?apikey=08903a8d41774814810ded56e0212eb8&per_page=all&chamber=house";
        $json = file_get_contents($url,false);
        
        echo $json;
    }
    else if($_GET["st"]=='sen'){
        $url="http://congress.api.sunlightfoundation.com/committees?apikey=08903a8d41774814810ded56e0212eb8&per_page=all&chamber=senate";
        $json = file_get_contents($url,false);
        
        echo $json;
    }
    else if($_GET["st"]=='joint'){
        $url="http://congress.api.sunlightfoundation.com/committees?apikey=08903a8d41774814810ded56e0212eb8&per_page=all&chamber=joint";
        $json = file_get_contents($url,false);
        
        echo $json;
    }
    else if($_GET["st"]=='comit'){
        $url="http://congress.api.sunlightfoundation.com/committees?apikey=08903a8d41774814810ded56e0212eb8&per_page=all";
        $json = file_get_contents($url,false);   
        echo $json;
    }
    else if($_GET["st"]=='bill' && isset($_GET["id"])){
        $url="http://congress.api.sunlightfoundation.com/bills?sponsor_id=".$_GET["id"]."&apikey=08903a8d41774814810ded56e0212eb8&per_page=50";
        $json = file_get_contents($url,false);
        
        echo $json;
    }
    else if($_GET["st"]=='bill' && isset($_GET["bid"])){
        $url="http://congress.api.sunlightfoundation.com/bills?bill_id=".$_GET["bid"]."&apikey=08903a8d41774814810ded56e0212eb8&per_page=50";
        $json = file_get_contents($url,false);
        
        echo $json;
    }
    else if($_GET["st"]=='comit1' && isset($_GET["member_ids"]) && isset($_GET["chamber"])){
        $url="http://congress.api.sunlightfoundation.com/committees?member_ids=".$_GET["member_ids"]."&chamber=".$_GET["chamber"]."&apikey=08903a8d41774814810ded56e0212eb8";
        $json = file_get_contents($url,false);
        echo $json;
    }
}

?>