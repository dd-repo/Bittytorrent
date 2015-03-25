<?php
/*
___.   .__  __    __            __                                      __   
\_ |__ |__|/  |__/  |_ ___.__._/  |_  __________________   ____   _____/  |_ 
 | __ \|  \   __\   __<   |  |\   __\/  _ \_  __ \_  __ \_/ __ \ /    \   __\
 | \_\ \  ||  |  |  |  \___  | |  | (  <_> )  | \/|  | \/\  ___/|   |  \  |  
 |___  /__||__|  |__|  / ____| |__|  \____/|__|   |__|    \___  >___|  /__|  
     \/                \/                                     \/     \/      
     
     
Contact:  contact.atmoner@gmail.com     

This file is part of Bittytorrent.

Bittytorrent is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

Bittytorrent is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Bittytorrent.  If not, see <http://www.gnu.org/licenses/>. 
          
*/

if (!defined("IN_TORRENT"))
      die("Access denied!");

if ($userData->admin_access != 'true')
		$startUp->redirect($conf['baseurl']);

if (!isset($_COOKIE['tokenAdmin']) 
	|| empty($_COOKIE['tokenAdmin']) 
	|| !isset($_GET['tokenAdmin']) 
	|| empty($_GET['tokenAdmin']) 
	|| $_GET['tokenAdmin'] != $_COOKIE['tokenAdmin']
) 
    $startUp->redirect($conf['baseurl']);
        
if ($startUp->checkAdmin() === false) 
        $startUp->redirect($conf['baseurl']);
  
$do = (isset($_GET["act"])?$_GET["act"]:"");
 
if ($hook->hook_exist('admin_action'))  
		$hook->execute_hook('admin_action');
 
	
switch ($do){

    case 'users':
    include("admincp.users.php");
    $smarty->display('admincp.users.html');
    break;

    case 'usersgroups':
    include("admincp.usersgroups.php");
    $smarty->display('admincp.usersgroups.html');
    break;

    case 'categories':
    include("admincp.categories.php");
    $smarty->display('admincp.categories.html');
    break;

    case 'plugins':
    include("admincp.plugins.php");
    $smarty->display('admincp.plugins.html');
    break;

    case 'themes':
    include("admincp.themes.php");
    $smarty->display('admincp.themes.html');
    break;

    case 'update':
    include("admincp.update.php");
    $smarty->display('admincp.update.html');
    break;

    case 'settings':
    case '':
    // default:
    include("admincp.settings.php");
    $smarty->display('admincp.settings.html');
    break;

    default:
	if ($hook->hook_exist('new_admin_page'))  
			$hook->execute_hook('new_admin_page');
	else 
			die("404!!");
    break;
}

 
