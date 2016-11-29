<?php
/*$c = mysql_connect('localhost','root','localhost') or die();
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
*/
$url = 'http://localhost/test/admin/activity/add_api.html';

$key = '123456';

$site_id = 'test';
$title = '测试';
$content = 'dddeesss';
$curl = 'http://ddfa.csfsdf/dfsdfe.php';
$start_time = 'fsfsf';
$end_time = 'fsfsf';
$token = md5($site_id.$title.$content.$curl.$start_time.$end_time.$key);

$post_data = array(
    'site_id'=>$site_id,
    'title' => $title,
    'content' => $content,
    'url' => $curl,
    'start_time' => $start_time,
    'end_time' => $end_time,
    'token' => $token
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// post数据
curl_setopt($ch, CURLOPT_POST, 1);
// post的变量
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
$output = curl_exec($ch);

curl_close($ch);

//打印获得的数据
echo($output);
print_r($post_data);