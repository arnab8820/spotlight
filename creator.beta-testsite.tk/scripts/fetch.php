<?php
require "connect.php";
session_start();
$video_url = $_POST["url"];
$subject = $_POST["subject"];
$language = $_POST["language"];
$url = 'http://www.youtube.com/oembed?url='.rawurlencode($video_url).'&format=json';
$opts = array('https' =>
    array(
        'method' => 'GET',
        'max_redirects' => '0',
        'ignore_errors' => '1',
    )
);

$context = stream_context_create($opts);
$stream = fopen($url, 'r', false, $context);

$data = json_decode(stream_get_contents($stream), true);
//print_r($data);
$temp = explode(" ", $data["html"]);
$temp = explode("\"", $temp[3]);
$vid_url = $temp[1];

//generating video id
do {
  $id = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 20);
  $query = "select * from video_detail where id=?";
  $stmnt = $dbhandler->prepare($query);
  $stmnt->execute(array($id));
  $row = $stmnt->fetchAll();
} while (count($row) != 0);

$sql = "INSERT INTO `video_detail` (`id`, `title`, `author`, `author_url`, `uploader`, `url`, `thumbnail_url`, `subject`, `audio_language`) VALUES (?,?,?,?,?,?,?,?,?)";
$stmnt = $dbhandler->prepare($sql);
$result = $stmnt->execute(array($id, $data["title"], $data["author_name"], $data["author_url"], $_SESSION["username"], $vid_url, $data["thumbnail_url"], $subject, $language));
if($result)
{
  $return["thumbnail_url"] = $data["thumbnail_url"];
  $return["title"] = $data["title"];
  $return["author_name"] = $data["author_name"];
  $return["id"] = $id;
  echo(json_encode($return));
}
fclose($stream);
?>
