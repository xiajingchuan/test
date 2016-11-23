<?php
$c = mysql_connect('localhost','root','localhost') or die();
mysql_select_db('test');
mysql_query("set names utf8");
$sql = "select site_id from merchant";
$q = mysql_query($sql);
while($res = mysql_fetch_row($q)) {
    print_r($res);
    $path = './static/image/m/';
    $name = '';
    if (file_exists($path.$res[0].'.jpg')) {
        $name = $res[0].'.jpg';
    }
    if (file_exists($path.$res[0].'.gif')) {
        $name = $res[0].'.gif';
    }
    if (file_exists($path.$res[0].'.png')) {
        $name = $res[0].'.png';
    }
    $up = "update merchant set logo_url='$name' where site_id='$res[0]'";
    $dd = mysql_query($up);
    echo $up;
}
