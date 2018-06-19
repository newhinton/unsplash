<?php
    /**
     * @copyright Copyright (c) 2018 Felix Nüsse <felix.nuesse@t-online.de>
     *
     * @license GNU AGPL version 3 or any later version
     *
     * This program is free software: you can redistribute it and/or modify
     * it under the terms of the GNU Affero General Public License as
     * published by the Free Software Foundation, either version 3 of the
     * License, or (at your option) any later version.
     *
     * This program is distributed in the hope that it will be useful,
     * but WITHOUT ANY WARRANTY; without even the implied warranty of
     * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
     * GNU Affero General Public License for more details.
     *
     * You should have received a copy of the GNU Affero General Public License
     * along with this program.  If not, see <http://www.gnu.org/licenses/>.
     *
     */



namespace OCA\Unsplash\CSS;

use OCA\Unsplash\Services\SettingsService;
//use OCA\Theming;

$unsplashScript = get_included_files();
$unsplashScript = $unsplashScript[0]; //gets the current filepath
$unsplashScript=substr($unsplashScript, 0, -27);

require_once $unsplashScript . 'lib/base.php';
require $unsplashScript.'apps/unsplash/lib/Settings/SettingsManager.php';

$app = new \OCA\Unsplash\AppInfo\Application();
$settings = $app->getContainer()->query(SettingsService::class);
//$theme = $app->getContainer()->query(Theming::class);
//$mainColorR=$theme->getColorPrimary();
$color =$settings->getColor();


$maincolor=str_split(str_replace("#","",$color), 2);
$mainColorR=hexdec($maincolor[0]);
$mainColorG=hexdec($maincolor[1]);
$mainColorB=hexdec($maincolor[2]);

$showHeader=$settings->getServerStyleLoginEnabled();
$unsplashImagePath = $settings->getServerStyleUrl();

/*
if($showHeader) {
    echo "ShowHeader:true<br>";
}else {
    echo "ShowHeader:false<br>";
}
echo $unsplashImagePath."<br>";
*/
header("Content-type: text/css; charset: UTF-8");
if($showHeader){
    include 'login_header.css';
}else{
    include 'login_background.css';
}


?>
