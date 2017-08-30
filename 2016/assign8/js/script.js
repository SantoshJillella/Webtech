/*global angular */
var myApp = angular.module("myApp", ['angularUtils.directives.dirPagination', 'ngStorage']);
myApp.controller("general", ['$scope', '$http', '$localStorage', function ($scope, $http, $localStorage) {
    $http.get('http://santoshaapp-env.us-west-2.elasticbeanstalk.com?st=state').then(function (response) {
        $scope.item = [];
        $.each(response.data.results, function (i) {
            if ($scope.item.indexOf(response.data.results[i].state_name) == -1) {
                $scope.item.push(response.data.results[i].state_name);
            }
        });
        $scope.item.sort();

        $scope.total = response.data.results;
    });
    $http.get('http://santoshaapp-env.us-west-2.elasticbeanstalk.com?st=house').then(function (response) {

        $scope.hos = response.data.results;
    });
    $http.get('http://santoshaapp-env.us-west-2.elasticbeanstalk.com?st=senate').then(function (response) {

        $scope.sen = response.data.results;
    });

    /*Bills*/
    $http.get('http://santoshaapp-env.us-west-2.elasticbeanstalk.com?st=active').then(function (response) {
        $scope.ac = response.data.results;
    });
    $http.get('http://santoshaapp-env.us-west-2.elasticbeanstalk.com?st=new').then(function (response) {
        $scope.new1 = response.data.results;
    });

    $scope.mybill1 = function (billno) {
        $scope.billdet1 = Array(billno);
    };

    /*Committies*/
    $http.get('http://santoshaapp-env.us-west-2.elasticbeanstalk.com?st=hs').then(function (response) {
        $scope.hs = response.data.results;
    });
    $http.get('http://santoshaapp-env.us-west-2.elasticbeanstalk.com?st=sen').then(function (response) {
        $scope.sen1 = response.data.results;
    });
    $http.get('http://santoshaapp-env.us-west-2.elasticbeanstalk.com?st=joint').then(function (response) {
        $scope.join = response.data.results;
    });
    /*end*/

    /*Legislators details function*/
    $scope.myFunction = function (idno) {
        $scope.id = idno;
        $scope.s;
        $scope.e;
        $scope.ch;
        $scope.det = [];
        $scope.bill = [];
        $scope.comit = [];
        $scope.comitids = [];
        $scope.comitrefids = [];
        $.each($scope.total, function(i) {
            if ($scope.total[i].bioguide_id == $scope.id) {
                $scope.det.push($scope.total[i]);
                $scope.s = $scope.total[i].term_start;
                $scope.e = $scope.total[i].term_end;
                $scope.ch = $scope.det[0].chamber;
            }
        });

        $scope.unixtotaltime = new Date().getTime();
        $scope.start = new Date($scope.s).getTime();
        $scope.end = new Date($scope.e).getTime();
        $scope.totaltime = $scope.end - $scope.start;
        $scope.now = $scope.unixtotaltime - $scope.start;
        $scope.resulttime = Math.round(($scope.now / $scope.totaltime) * 100);

        if ($scope.resulttime >= 100) {
            $scope.resulttime = 100;
        }

        $http.get('http://santoshaapp-env.us-west-2.elasticbeanstalk.com?st=bill&id=' + $scope.id).then(function (response) {
            $scope.bill = response.data.results;
        });
        $http.get('http://santoshaapp-env.us-west-2.elasticbeanstalk.com?st=comit1&chamber='+$scope.ch+'&member_ids='+ $scope.id).then(function (response) {
            $scope.comit = response.data.results;

        });
        $scope.quantity = 5;
        var favdisp = $localStorage.favdata;

        $.each(favdisp, function(i){
            if(favdisp[i].idtype == 'l'){
                if(favdisp[i].bioguide_id == $scope.id)
                    $scope.star3 = angular.element(document.querySelector('#lstar'));
                $scope.star3.removeClass("fa-star-o");
                $scope.star3.addClass("fa-star");
                $scope.star3.addClass("yellowstar");
            }
        });
    };
    /*Bill Details function*/
    $scope.mybill = function (billno) {
        $scope.billdet = Array(billno);
    };


    $scope.myFunction1 = function (idno) {
        $scope.id1 = idno;
        $scope.s1;
        $scope.e1;
        $scope.ch1;
        $scope.det2 = [];
        $scope.bill2 = [];
        $scope.comit2 = [];
        $scope.comitids2 = [];
        $scope.comitrefids2 = [];
        $.each($scope.total, function(i) {
            if ($scope.total[i].bioguide_id == $scope.id1) {
                $scope.det2.push($scope.total[i]);
                $scope.s1 = $scope.total[i].term_start;
                $scope.e1 = $scope.total[i].term_end;
                $scope.ch1 = $scope.det2[0].chamber;
            }
        });

        $scope.unixtotaltime2 = new Date().getTime();
        $scope.start2 = new Date($scope.s1).getTime();
        $scope.end2 = new Date($scope.e1).getTime();
        $scope.totaltime2 = $scope.end2 - $scope.start2;
        $scope.now2 = $scope.unixtotaltime2 - $scope.start2;
        $scope.resulttime2 = Math.round(($scope.now2 / $scope.totaltime2) * 100);

        if ($scope.resulttime2 >= 100) {
            $scope.resulttime2 = 100;
        }

        $http.get('http://santoshaapp-env.us-west-2.elasticbeanstalk.com?st=bill&id=' + $scope.id1).then(function (response) {
            $scope.bill2 = response.data.results;
        });
        $http.get('http://santoshaapp-env.us-west-2.elasticbeanstalk.com?st=comit1&chamber='+$scope.ch1+'&member_ids='+ $scope.id1).then(function (response) {
            $scope.comit2 = response.data.results;

        });
        $scope.quantity = 5;
        var favdisp = $localStorage.favdata;

        $.each(favdisp, function(i){
            if(favdisp[i].idtype == 'l'){
                if(favdisp[i].bioguide_id == $scope.id)
                    $scope.star3 = angular.element(document.querySelector('#lstar'));
                $scope.star3.removeClass("fa-star-o");
                $scope.star3.addClass("fa-star");
                $scope.star3.addClass("yellowstar");
            }
        });
    };
    /*Favourites*/





    $scope.save = function(type, saveid) {
        var type1 = type;
        var favid = saveid;
        var favtabledata = [];

        var c=0,k=0;
        /*$scope.stars = angular.element(document.querySelector('#star'));*/
        if(type1 == "legislator"){
            favid.idtype = 'l';
            $scope.stars = angular.element(document.querySelector('#lstar'));
        }
        if(type1 == "committies"){
            favid.idtype = 'c';
            $scope.stars = angular.element(document.querySelector('#star'+favid.committee_id));
        }
        if(type1 == "bills"){
            favid.idtype = 'b';
            $scope.stars = angular.element(document.querySelector('#bstar'));
        }

        if($localStorage.favdata){
            favtabledata = $localStorage.favdata;
            $.each(favtabledata, function(i){
                if (type1 == "legislator") {
                    if (favtabledata[i].bioguide_id == saveid.bioguide_id){
                        c=i;
                        k=-1;
                    }
                }
                else if (type1 == "committies") {
                    if (favtabledata[i].committee_id == saveid.committee_id){
                        c=i;
                        k=-1;
                    }
                }               
                else if (type1 == "bills"){ 
                    if (favtabledata[i].bill_id == saveid.bill_id){
                        c=i;
                        k=-1;
                    }
                }
            });
            if(k==-1){
                favtabledata.splice(c,1);
                $scope.stars.removeClass("fa-star");
                $scope.stars.addClass("fa-star-o");
                $scope.stars.removeClass("yellowstar");
            }
            else if(k==0){
                favtabledata.push(favid);
                $scope.stars.removeClass("fa-star-o");
                $scope.stars.addClass("fa-star");
                $scope.stars.addClass("yellowstar");

            }
        }
        else{
            favtabledata.push(favid);
            $scope.stars.removeClass("fa-star-o");
            $scope.stars.addClass("fa-star");
            $scope.stars.addClass("yellowstar");
        }


        $localStorage.favdata = favtabledata;
        console.log($localStorage.favdata);
    }

    $scope.startwinkle = function(ids){
        $scope.x = ids;
        var favdisp = $localStorage.favdata;
        $.each(favdisp, function(i){
            if(favdisp[i].idtype == 'l'){
                if($scope.x.bioguide_id == favdisp[i].bioguide_id){
                    $scope.star0 = angular.element(document.querySelector('#lstar'));
                    $scope.star0.removeClass("fa-star-o");
                    $scope.star0.addClass("fa-star");
                    $scope.star0.addClass("yellowstar");
                }
            }
            if(favdisp[i].idtype == 'b'){
                if($scope.x.bill_id == favdisp[i].bill_id){
                    $scope.star0 = angular.element(document.querySelector('#bstar'));
                    $scope.star0.removeClass("fa-star-o");
                    $scope.star0.addClass("fa-star");
                    $scope.star0.addClass("yellowstar");
                }
            }
        });
    }



    $scope.displayfav = function() {

        $scope.favlegislator = [];
        $scope.favbill = [];
        $scope.favcommittee = [];
        var favdisp = $localStorage.favdata;

        $.each(favdisp, function(i){
            if(favdisp[i].idtype == 'l'){
                $scope.favlegislator.push(favdisp[i]);
                $scope.star1 = angular.element(document.querySelector('#lstar'));
                $scope.star1.removeClass("fa-star-o");
                $scope.star1.addClass("fa-star");
                $scope.star1.addClass("yellowstar");
            }
            else if(favdisp[i].idtype == 'b'){
                $scope.favbill.push(favdisp[i]);
                $scope.star1 = angular.element(document.querySelector('#bstar'));
                $scope.star1.removeClass("fa-star-o");
                $scope.star1.addClass("fa-star");
                $scope.star1.addClass("yellowstar");
            }
            else if(favdisp[i].idtype == 'c'){
                $scope.favcommittee.push(favdisp[i]);
                $scope.star1 = angular.element(document.querySelector('#star'+favdisp[i].committee_id));
                $scope.star1.removeClass("fa-star-o");
                $scope.star1.addClass("fa-star");
                $scope.star1.addClass("yellowstar");
            }
        });
    }

    /*star display yellow*/
    $scope.starchg = function(tp, starid, saveid){
        var favdisp = [];
        var favid = starid;
        var chid = saveid;
        var ch = tp;
        /**/
        if($localStorage.favdata){
            favdisp = $localStorage.favdata;
            $.each(favdisp, function(i){
                if (tp == 'l') {
                    if (favdisp[i].bioguide_id == chid.bioguide_id){
                        $scope.star1 = angular.element(document.querySelector('#'+favid));
                        $scope.star1.removeClass("fa-star-o");
                        $scope.star1.addClass("fa-star");
                        $scope.star1.addClass("yellowstar");
                    }
                }
                else if (tp == 'c') {
                    if (favdisp[i].committee_id == chid.committee_id){
                        $scope.star1 = angular.element(document.querySelector('#'+favid));
                        $scope.star1.removeClass("fa-star-o");
                        $scope.star1.addClass("fa-star");
                        $scope.star1.addClass("yellowstar");
                    }
                }               
                else if (tp == 'b'){ 
                    if (favdisp[i].bill_id == chid.bill_id){
                        $scope.star1 = angular.element(document.querySelector('#'+favid));
                        $scope.star1.removeClass("fa-star-o");
                        $scope.star1.addClass("fa-star");
                        $scope.star1.addClass("yellowstar");
                    }
                }
            });
        }
    }

    /*Local storage delete*/
    $scope.deletedata = function(delid) {
        var trashitem = delid;
        var trashitemarr = $localStorage.favdata;
        var k=0,c=0;
        $.each(trashitemarr, function(i) {
            if (trashitem.idtype == "l"){
                if (trashitemarr[i].bioguide_id == trashitem.bioguide_id){
                    c=i;
                    k=-1;
                    $scope.star2 = angular.element(document.querySelector('#lstar'));
                    $scope.star2.addClass("fa-star-o");
                    $scope.star2.removeClass("fa-star");
                    $scope.star2.removeClass("yellowstar");
                }
            }
            else if (trashitem.idtype == "c"){
                if (trashitemarr[i].committee_id == trashitem.committee_id){
                    c=i;
                    k=-1;
                    $scope.star2 = angular.element(document.querySelector('#star'+trashitem.committee_id));
                    $scope.star2.addClass("fa-star-o");
                    $scope.star2.removeClass("fa-star");
                    $scope.star2.removeClass("yellowstar");
                }
            }               
            else if (trashitem.idtype == "b"){ 
                if (trashitemarr[i].bill_id == trashitem.bill_id){
                    c=i;
                    k=-1;
                    $scope.star2 = angular.element(document.querySelector('#bstar'));
                    $scope.star2.addClass("fa-star-o");
                    $scope.star2.removeClass("fa-star");
                    $scope.star2.removeClass("yellowstar");
                }
            }
        });
        if(k==-1){
            trashitemarr.splice(c,1);
            $localStorage.favdata = trashitemarr;
            $scope.displayfav();
        }
        if(trashitemarr.length == 0){
            $localStorage.favdata.$reset();
            $scope.displayfav();
        }

    }


}]);





function display(obj) {
    if (obj.name == "Legislatures") {
        document.getElementById("l").style.visibility = "visible";
        document.getElementById("f").style.visibility = "hidden";
        document.getElementById("c").style.visibility = "hidden";
        document.getElementById("b").style.visibility = "hidden";
    }
    if (obj.name == "Bills") {
        document.getElementById("b").style.visibility = "visible";
        document.getElementById("l").style.visibility = "hidden";
        document.getElementById("c").style.visibility = "hidden";
        document.getElementById("f").style.visibility = "hidden";
    }
    if (obj.name == "Committiees") {
        document.getElementById("c").style.visibility = "visible";
        document.getElementById("l").style.visibility = "hidden";
        document.getElementById("b").style.visibility = "hidden";
        document.getElementById("f").style.visibility = "hidden";
    }
    if (obj.name == "Favourites") {
        document.getElementById("f").style.visibility = "visible";
        document.getElementById("l").style.visibility = "hidden";
        document.getElementById("b").style.visibility = "hidden";
        document.getElementById("c").style.visibility = "hidden";
    }
}