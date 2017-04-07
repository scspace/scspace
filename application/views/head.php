<?php defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <title> <?=isset($title)? $title : '학생문화공간위원회'?> </title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">

    <link rel="author" href="humans.txt">

    <link rel="icon" href="/favicon.ico">

    <meta name="theme-color" content="#3F3F3F">

    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="/static/icon/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="/static/icon/apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/static/icon/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="/static/icon/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/static/icon/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="/static/icon/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/static/icon/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="/static/icon/apple-touch-icon-152x152.png" />

    <link rel="icon" type="image/png" href="/static/icon/favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="/static/icon/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="/static/icon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="/static/icon/favicon-128.png" sizes="128x128" />
    <link rel="icon" type="image/png" href="/static/icon/favicon-196x196.png" sizes="196x196" />

    <!-- IE 10 Metro tile icon (Metro equivalent of apple-touch-icon) -->
    <meta name="msapplication-TileColor" content="#E73128">
    <meta name="msapplication-TileImage" content="/static/icon/mstile-144x144.png">
    <!-- IE 11 Tile for Windows 8.1 Start Screen -->
    <meta name="application-name" content="학생문화공간위원회"/>
    <meta name="msapplication-tooltip" content="학생문화공간위원회 홈페이지 북마크">
    <meta name="msapplication-config" content="/static/icon/ieconfig.xml">

    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#E73128">

    <!-- macOS Safari -->
    <link rel="mask-icon" href="/static/icon/pin.svg" color="#E73128">

    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

    <!-- Open Graph Protocol; for sharing via Facebook, Kakaotalk.. -->
    <meta property="og:url" content="<?=current_url()?>">
    <meta property="og:title" content="<?=isset($title)? $title : '학생문화공간위원회'?>">
    <meta property="og:type" content="website">
    <meta property="og:image" content="/static/icon/mstile-310x150.png">
    <meta property="og:description" content="<?=isset($description)? $description : '학생문화공간위원회'?>">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lte IE 8]>
        <script type="text/javascript">
            if(document.cookie.search("lteIE8=TRUE") == -1){
                alert('더 이상 지원하지 않는 오래된 브라우저를 사용 중입니다.');
                document.cookie = "lteIE8=TRUE;";
            }
        </script>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


    <!-- Bootstrap -->
    <link rel="stylesheet" href="/static/css/bootstrap.min.css">
    <!-- Calendar Stylesheet for Reservation State-->
    <link rel="stylesheet" href="/static/css/fullcalendar.min.css" >
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/static/css/common.css" >

    <!-- Google Analytics -->
    <script type="text/javascript">
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', '<?=$this->config->item('ga_key');?>', 'auto');
        ga('send', 'pageview');
    </script>

</head>
<body>
