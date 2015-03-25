<?php


define("IN_TORRENT",true);

// This part can be removed after install
if (file_exists("install.php")) {
	if (filesize("libs/db.php") === 0) {
		header("location:install.php");
	}
} // This part can be removed after install


$path = dirname(__FILE__); 

require('libs/startup.php');


 
switch (isset($_GET["page"])?$_GET["page"]:""){

        case 'admincp': 
                # admin panel
                include 'pages/admincp/admincp.index.php';
        break; 

        case 'upload': 
                # paste
                include 'pages/upload.php';
                $smarty->display('upload.html');
        break;    

        case 'upload-form': 
                # paste
                include 'pages/upload.form.php';
                $smarty->display('upload.form.html');
        break;

        case 'torrent-detail': 
                # account
                include 'pages/detail.php';
                $smarty->display('detail.html');
        break; 

        case 'torrent-edit': 
                # torrent-edit
                include 'pages/edit.torrent.php';
                $smarty->display('edit.torrent.html');
        break; 

        case 'torrent-delete': 
                # torrent-delete
                include 'pages/delete.torrent.php';
                $smarty->display('delete.torrent.html');
        break;

        case 'torrents': 
                # torrents
                include 'pages/torrents.php';
                $smarty->display('torrents.html');
        break; 

        case 'externalscrape': 
                # scrape
                include 'pages/scrape.php';
                $smarty->display('scrape.html');
        break; 

        case 'scrape': 
                # scrape
                include 'pages/internalscrape.php';
                // $smarty->display('scrape.html');
        break; 

        case 'announce': 
                # announce
                include 'pages/announce.php';
        break; 

        case 'download': 
                # download
                include 'pages/download.php';
        break; 

        case 'rss': 
                # download
                include 'pages/rss.php';
        break; 
                
        case 'login': 
                # login
                include 'pages/login.php';
                $smarty->display('login.html');
        break; 

        case 'registration': 
                # registration
                include 'pages/registration.php';
                $smarty->display('registration.html');
        break; 

        case 'account': 
                # account
                include 'pages/account.php';
                $smarty->display('account.html');
        break; 

        case 'edit-account': 
                # account
                include 'pages/edit.account.php';
                $smarty->display('edit.account.html');
        break;         

        case 'user': 
                # account
                include 'pages/user.php';
                $smarty->display('user.html');
        break; 

        case 'logout': 
                # logout
                include 'pages/logout.php';
        break;
 
        case 'error': 
                # error
                $smarty->display('error.html');
        break; 
 
        default:
        case '':  
                # index
                include 'pages/main.php';
                $smarty->display('index.html');
        break;
}  
