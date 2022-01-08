<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https:\\two-factor-auth-group-d.herokuapp.com\bootstrap-5.1.3-dist\css\bootstrap.min.css">
    <title>WEBSYS PROJECT</title>

    <style>

        :root{
            --side-nav-bg: #ffeb14a3;
            --subscribe-nav-bg: #EDDD38;
            --font-color: #475461;
        }

        *{
            box-sizing: border-box;
        }

        body{
            
            font-family: "Arial", Verdana, serif;
            color: var(--font-color);
        }

        html, body {
            margin: 0px;
            padding: 0px;
        }

        .header{
            height: 65px;
            background-color: rgb(255, 255, 255);
            
        }
        /*ADDED DISPLAY SIZE xs FOR HIDING THE CREATE BUTTION*/
        @media screen and (max-width: 600px) {
            .d-xs-none{
                display: none;
            }
        }
        #vertical-nav-bar{
            display: none;
            text-align: center;
        }
        .create-btn{
            font-weight: bolder;
        }

        .left-sidebar{
            background-color: rgba(255, 255, 255, 0);
            align-content: center;
            min-width: 200px;
        }
        .article-body{
            background-color: rgb(255, 255, 255);

            padding: 5%;
            padding-bottom: 75px;
        }
        .share-buttons{
            margin-top: 25px;
        }
        .share-buttons > div{
            width: 50px;
            height: 50px;
            border-radius: 100px;
            margin-left: 15px;
        }
        .share-buttons > div:nth-child(1){
            background-color: #376FFF;
            content: 'WEBSYS_FINAL_PROJECT\icons\Icon awesome-facebook-f@2x.png';
        }
        .share-buttons > div:nth-child(2){
            background-color: #00A3E8;
        }
        .share-buttons > div:nth-child(3){
            background-color: #D6277B;
        }

        .right-sidebar{
            background-color: rgb(255, 255, 255);
            margin: 0;
            padding: 0;
        }
        .footer{
            background-color: #475461;
            color: #FFFFFF;
            height: 300px;
            margin-top: 120px;
        }

        .side-nav-article{
            text-align: center;
            font-size: x-large;
            font-weight: bolder;
            margin: 16px;
        }

        /*SIDE NAV VERSION 2 DESIGN */
        .topic-side-nav-container{
            background-color: var(--side-nav-bg);
            height: fit-content;
            padding-bottom: 50px;
            max-width: 250px;
            min-width: 180px;
            margin: auto;
            margin-bottom: 25px;
            overflow: hidden;
            border-radius: 5px;
        }
        .topic-side-nav-container:hover, .subscribe-container input[type="button"]:hover, .share-buttons div:hover{
            box-shadow: 0 3px 5px 0 #00000033, 0 5px 25px 0 #9a9a9a30;
            cursor: pointer;
        }
        .topic-side-nav-title{
            padding-left: 20px;
            padding-right: 20px;
            padding-top: 10px;
            height: fit-content;
            font-weight: bold;
            overflow: hidden; 
            
        }
        .deco-none {
            color:var(--font-color) !important;
            text-decoration:none !important;

        }
        .topic-side-nav-sub-title{
            color: #676767;
            background-color: whitesmoke;
            text-shadow: 1px 1px 0 #00000009;
            padding-left: 20px;
            padding-right: 20px;
            padding-top: 10px;
            padding-bottom: 10px;
            overflow: hidden;
            height: fit-content;
        }

        .subscribe-container{
            position: relative;
            background-color: var(--subscribe-nav-bg);
            margin-top: 25px;
            padding-top: 160px;
            width: 120%;
            min-width: 150px;
            max-width: 220px;
            height: 350px;
        }

        .subscribe-title{
            font-weight: bolder;
            font-size: large;
            background-color: white;
            padding-top: 25px;
            padding-bottom: 25px;
            height: 115px;
            position: absolute;
            bottom: 0;
            width: 100%;
        }

        .subscribe-container input[type="email"]{
            text-decoration: none;
            border:none;
            border-bottom: 1px solid #475461;
            width: 100%;
        }

        .subscribe-container input[type="button"]{
            margin-top: 25px;
            width: 100%;
            background-color: var(--subscribe-nav-bg);
            border:none;
            color: white;
            height: 50px;
            font-weight: bold;
        }

        .comment-container{
            background-color: var(--side-nav-bg);
            margin: auto;
            margin-top: 48px;
            text-align: center;
            border-radius: 5px;
            width: 100%;
            min-width: 230px;
            height: fit-content;
            padding: 25px;
        }
        
        .comment-container p{
            font-size: medium;
            font-weight: bolder;
            color: var(--font-color);
        }

        .comment-container textarea{
            margin: 25px;
            width: 90%;
            min-height: 175px;
        }

        .comment-container button{
            padding: 8px;
            border: 1px solid #475461;
            border-radius: 2px;
            background-color: #475461;
            color: white;
            font-weight: bolder;
        }

        .rounded-corner-nav{
            margin: 3px 3px;
            padding-left: 13px;
            padding-right: 14px;
            border-radius: 25px;
        }
        .rounded-corner-nav:hover{
            background-color: yellow;
            cursor: pointer;
        }
        .rounded-corner-nav-active{
            background-color: yellow;
            font-weight: bold;
        }

        .vertical-navbar-item{
            padding-top: 12px;
            height: 48px;
        }
        .vertical-navbar-item:hover{
            background-color: whitesmoke;
            font-weight: bold;
        }

    </style>

    <script>

        var body = document.getElementById('page-body');

        //MOBILE VIEW NAV BAR - MENU BUTTON
        function display_vertical_navbar(){
            var state = document.getElementById("vertical-nav-bar").style.display;
            console.log(state);

            if(state != 'none'){
                document.getElementById("vertical-nav-bar").style.display = 'none';
            }else{
                document.getElementById("vertical-nav-bar").style.display = 'block';
            }
        }

        // PAGE BODY XMLHTTP REQUEST
        function nav_clicked(page_name){

            var nav_home = document.getElementById('nav-home');
            var nav_latest = document.getElementById('nav-latest');
            var nav_about = document.getElementById('nav-about');
            
            console.log(page_name);

            //CHANGE BgColor if button is clicked

            switch(page_name){
                case 'home': 
                    nav_home.classList.add('rounded-corner-nav-active');
                    nav_latest.classList.remove('rounded-corner-nav-active');
                    nav_about.classList.remove('rounded-corner-nav-active');
                    break;
                    
                case 'latest': 
                    nav_latest.classList.add('rounded-corner-nav-active');
                    nav_home.classList.remove('rounded-corner-nav-active');
                    nav_about.classList.remove('rounded-corner-nav-active');
                    break;

                case 'about': 
                    nav_about.classList.add('rounded-corner-nav-active');
                    nav_latest.classList.remove('rounded-corner-nav-active');
                    nav_home.classList.remove('rounded-corner-nav-active');
                    break;
            }


            //param1 - file name (without the html extension), param2 - callback function
            getPage(page_name, page_switcher);
        }

        function getPage(page_name, myCallback){

            var path = 'main-pages/' + page_name + '.html';

            let req = new XMLHttpRequest();
            req.open('GET', path, true);
            req.onload = function() {
                if(req.status == 200){
                    myCallback(this.responseText);
                }else{
                    myCallback("ERROR: " + req.status);
                }
            }
            req.send();
        }

        //CALLBACK FUNCTION for nav_clicked() function
        function page_switcher(text){
            document.getElementById("page-body").innerHTML = text;
        }

        
        function requestLatest(){

            var path = 'main-pages/latest-side-nav/side-nav-latest-reply.html';

            let req = new XMLHttpRequest();
            req.open('GET', path, true);
            req.onreadystatechange = function() {
                if(req.status == 200){
                    document.getElementById('side-nav-latest').innerHTML = this.responseText;
                }else{
                    myCallback("ERROR: " + req.status);
                }
            }
            req.send();
        }

    </script>

</head>
<body>

    <div class="row">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm col-12">

            <div class="ps-5">
                <a class="navbar-brand" href="#"><strong>PHILTECH.BLOG</strong></a>
            </div>
    
            <button onclick="display_vertical_navbar();" class="navbar-toggler me-3" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse flex-row-reverse me-5" id="navbarText">
                <ul class="navbar-nav ms-2">
                    <li class="nav-item rounded-corner-nav " id="nav-home" onclick="nav_clicked('home'); requestLatest();">
                        <a class="nav-link ms-2 " href="#" >Home</a>
                    </li>
                    <li class="nav-item ms-2 rounded-corner-nav " id="nav-latest" onclick="nav_clicked('latest');">
                        <a class="nav-link">Latest</a>
                    </li>
                    <li class="nav-item ms-2 rounded-corner-nav " id="nav-about" onclick="nav_clicked('about');">
                        <a class="nav-link">About</a>
                    </li>
                    <li class="me-1 ms-5 nav-item rounded-corner-nav">
                        <a class="d-xs-none d-sm-none d-md-block create-btn nav-link" href="https://two-factor-auth-group-d.herokuapp.com/login.html" onclick="change_content()">LOGOUT</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <div id="vertical-nav-bar" class="row d-md-none mt-auto" >
        <div class="col-12 mt-3" > <div class="vertical-navbar-item"> <a onclick="nav_clicked('home'); requestLatest(); display_vertical_navbar();">Home</a></div> </div>
        <div class="col-12 " > <div class="vertical-navbar-item"> <a onclick="nav_clicked('latest'); display_vertical_navbar();">Latest</a> </div></div>
        <div class="col-12 " > <div class="vertical-navbar-item"> <a onclick="nav_clicked('about'); display_vertical_navbar();">About</a></div></div>
        <div class="col-12 mt-3 create-btn" ><a href="https://two-factor-auth-group-d.herokuapp.com/login.html" onclick="change_content()">LOGIN</a></div>
    </div>

    <div id="page-body" class="container">
        <!--DEFAULT PAGE WHEN LOAD-->
        <script>
            nav_clicked('home');
            requestLatest();
        </script>
    </div>

    
    <!--FOOTER-->
    <div class="row footer d-flex justify-content-center" style="text-align: center;">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center">
                ^
            </div>
        </div>
        <div class="col-sm-2">
            HOME
        </div>
        <div class="col-sm-2">
            ABOUT
        </div>
        <div class="col-sm-2">
            LATEST
        </div>
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center">
                <p style="font-size: small;">All Rights Reserved | PHILTECHTIPS.BLOG<br>2021</p>
            </div>
        </div>
    </div>



</body>
</html>