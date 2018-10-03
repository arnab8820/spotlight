<?php
    require "connect.php";
    $keyword = $_POST["keyword"];
    $subject = $_POST["subject"];
    $language = $_POST["language"];
    $limit = $_POST["limit"];
    $offset = $_POST["offset"];
    if($_POST["keyword"] != "Make a wish ....")
    {
        if($_POST["subject"] != "")
        {
            if($_POST["language"]!= "")
            {
                $key = "%";
                $key .= $_POST["keyword"];
                $key .= "%";
                $sub = $_POST["subject"];
                $lang = $_POST["language"];
                $sql="select * from `video_detail` where `title` like ? and `subject` = ? and `language` = ? order by `views` desc limit $offset, $limit";
                $stmnt = $dbhandler->prepare($sql);
                $stmnt->execute(array($key, $sub, $lang));
                $data = $stmnt->fetchAll();
                //echo(json_encode($data));
            }
            else
            {
                $key = "%";
                $key .= $_POST["keyword"];
                $key .= "%";
                $sub = $_POST["subject"];
                $sql="select * from `video_detail` where `title` like ? and `subject` = ? order by `views` desc limit $offset, $limit";
                $stmnt = $dbhandler->prepare($sql);
                $stmnt->execute(array($key, $sub));
                $data = $stmnt->fetchAll();
                //echo(json_encode($data));
            }
        }
        else
        {
            if($_POST["language"] != "")
            {
                $key = "%";
                $key .= $_POST["keyword"];
                $key .= "%";
                $lang = $_POST["language"];
                $sql="select * from `video_detail` where `title` like ? and `language` = ? order by `views` desc limit $offset, $limit";
                $stmnt = $dbhandler->prepare($sql);
                $stmnt->execute(array($key, $lang));
                $data = $stmnt->fetchAll();
                //echo(json_encode($data));
            }
            else
            {
                $key = "%";
                $key .= $_POST["keyword"];
                $key .= "%";
                $sql="select * from `video_detail` where `title` like ? order by `views` desc limit $offset, $limit";
                $stmnt = $dbhandler->prepare($sql);
                $stmnt->execute(array($key));
                $data = $stmnt->fetchAll();
                //echo(json_encode($data));
            }
        }
    }
    else
    {
        if($_POST["subject"] != "")
        {
            if($_POST["language"] != "")
            {
                $sub = $_POST["subject"];
                $lang = $_POST["language"];
                $sql="select * from `video_detail` where `subject` = ? and `language` = ? order by `views` desc limit $offset, $limit";
                $stmnt = $dbhandler->prepare($sql);
                $stmnt->execute(array($sub, $lang));
                $data = $stmnt->fetchAll();
                //echo(json_encode($data));
            }
            else
            {

                $sub = $_POST["subject"];
                $sql="select * from `video_detail` where `subject` = ? order by `views` desc limit $offset, $limit";
                $stmnt = $dbhandler->prepare($sql);
                $stmnt->execute(array($sub));
                $data = $stmnt->fetchAll();
                //echo(json_encode($data));
            }
        }
        else
        {
            if($_POST["language"] != "")
            {

                $lang = $_POST["language"];
                $sql="select * from `video_detail` where `language` = ? order by `views` desc limit $offset, $limit";
                $stmnt = $dbhandler->prepare($sql);
                $stmnt->execute(array($lang));
                $data = $stmnt->fetchAll();
                //echo(json_encode($data));
            }
            else
            {
                $sql = "error";
            }
        }
    }
    if($sql == "error")
    {
        die(json_encode(array(array("error"=>true, "message"=>"Please give an input"))));
    }
    $sql = "INSERT INTO `search_log` (`keyword`, `topic`, `language`) VALUES (?, ?, ?)";
    $stmnt = $dbhandler->prepare($sql);
    $stmnt->execute(array($keyword, $subject, $language));
    if(count($data) == 0)
    {
        die(json_encode(array(array("error"=>true, "message"=>"No result found!"))));
    }
    else
    {
        echo(json_encode($data));
    }

?>