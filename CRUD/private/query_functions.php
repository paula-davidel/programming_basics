<?php

use PHPUnit\Framework\MockObject\Stub\ReturnReference;

function find_all_subjects()
{
    global $db;
    $query = "SELECT * FROM subjects ORDER BY position ASC";
    $result = mysqli_query($db,$query);
    confirm_result($result);
    return $result;
}

function find_subject_by_id($id)
{
    global $db;
    $sql = "SELECT * FROM subjects WHERE id='".$id."'";
    $result = mysqli_query($db,$sql);
    confirm_result($result);
    $subject = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $subject;
}

function insert_subject($array)
{
    global $db;
    $sql = "INSERT INTO subjects (menu_name,position,visible) VALUES ('".$array["menu_name"]."', '".$array["position"]."','".$array["visible"]."')";
    $result = mysqli_query($db,$sql);
    if($result)
    {
       return true;
    }
    else
    {
        mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function update_subject($array)
{
    global $db;
    $sql = "UPDATE subjects SET menu_name='".$array["menu_name"]."', position='".$array["position"]."', visible='".$array["visible"]."' WHERE id='".$array["id"]."' LIMIT 1";
    $result = mysqli_query($db,$sql);
    if($result)
    {
        return true;
    }
    else
    {
        mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function delete_subject($id)
{
    global $db;
    $sql = "DELETE FROM subjects WHERE id='".$id."' LIMIT 1";
    $result = mysqli_query($db,$sql);
    if($result)
    {
        return true;
    }
    else
    {
        mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function find_all_pages()
{
    global $db;
    $query = "SELECT * FROM pages ORDER BY position ASC";
    $result = mysqli_query($db,$query);
    confirm_result($result);
    return $result;
}

function find_page_by_id($id)
{
    global $db;
    $sql = "SELECT * FROM pages WHERE id='".$id."'";
    $result=mysqli_query($db,$sql);
    confirm_result($result);
    $page = mysqli_fetch_assoc($result);
    return $page;
}

function insert_page($array)
{
    global $db;
    $sql ="INSERT INTO pages (subject_id,menu_name,position,visible,content) VALUES ('".$array["subject_id"]."','".$array["menu_name"]."','";
    $sql .= $array["position"]."','".$array["visible"]."','".$array["content"]."')";
    $result = mysqli_query($db,$sql);
    if($result)
    {
        return true;
    }
    else
    {
        mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function update_page($array)
{
    global $db;
    $sql ="UPDATE pages SET subject_id='".$array["subject_id"]."',menu_name='".$array["menu_name"]."',position='".$array{"position"}."',visible='".$array["visible"]."',content='".$array["content"]."'";
    $sql .=" WHERE id='".$array["id"]."' LIMIT 1";
    $result = mysqli_query($db,$sql);
    if($result)
    {
        return true;
    }
    else
    {
        mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function delete_page($id)
{
    global $db;
    $sql= "DELETE FROM pages WHERE id='".$id."'";
    $result = mysqli_query($db,$sql);
    if($result)
    {
        return true;
    }
    else
    {
        mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}