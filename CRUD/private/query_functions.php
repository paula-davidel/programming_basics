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
    $sql = "SELECT * FROM subjects WHERE id='".db_escape($db,$id)."'";
    $result = mysqli_query($db,$sql);
    confirm_result($result);
    $subject = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $subject;
}

function validate_subject($subject)
{
    $errors=[];

    //menu_name
    if(is_blank($subject["menu_name"]))
    {
        $errors[] = "Name cannot be blank.";
    }elseif(!has_length($subject["menu_name"],['min' =>2, "max" =>255]))
    {
        $errors[] = "Name must be betweeen 2 and 255 characters";
    }

    //position -> the values' position must be between 0 and 999
    $int_position = (int) $subject["position"];
    if($int_position <=0)
    {
        $errors[] = "Position must be greater than 0";
    }
    if($int_position > 999)
    {
        $errors[] ="Position must be less than 999";
    }

    //visible
    $str_visible = (string) $subject["visible"];
    if(!has_inclusion_of($str_visible,["0","1"]))
    {
        $errors[] = "Visible must be true or false";
    }

    return $errors;
}
function insert_subject($array)
{
    global $db;
    //validate data
    $errors = validate_subject($array);

    if(!empty($errors))
    {
        return $errors;
    }
    $sql = "INSERT INTO subjects (menu_name,position,visible) VALUES ('".db_escape($db,$array["menu_name"])."', '".db_escape($db,$array["position"])."','".db_escape($db,$array["visible"])."')";
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
    //validate data
    $errors = validate_subject($array);

    if(!empty($errors))
    {
        return $errors;
    }

    $sql = "UPDATE subjects SET menu_name='".db_escape($db,$array["menu_name"])."', position='".db_escape($db,$array["position"])."', visible='".db_escape($db,$array["visible"])."' WHERE id='".db_escape($db,$array["id"])."' LIMIT 1";
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
    $sql = "DELETE FROM subjects WHERE id='".db_escape($db,$id)."' LIMIT 1";
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
    $sql = "SELECT * FROM pages WHERE id='".db_escape($db,$id)."'";
    $result=mysqli_query($db,$sql);
    confirm_result($result);
    $page = mysqli_fetch_assoc($result);
    return $page;
}

function find_pages_by_subject_id($subject_id)
{
    global $db;
    $sql = "SELECT * FROM pages WHERE subject_id='".db_escape($db,$subject_id)."' ORDER BY position ASC";
    $result=mysqli_query($db,$sql);
    return $result;
}

function validate_page($array)
{
    $errors=[];

    //menu_name
    if(is_blank($array["menu_name"]))
    {
        $errors[] = "Name cannot be blank";
    }
    elseif(!has_length($array["menu_name"],['min' =>2, "max" =>255]))
    {
    $errors[] = "Name must be between 2 and 255 characters";
    }
    //verify if the menu name is unique
    $old_id = $array["id"] ?? "0";
    if(!has_unique_page_menu_name($array["menu_name"],$old_id))
    {
        $errors[] = "Menu name must be unique";
    }

    //position -> the values' position must be between 0 and 999
    $int_position = (int) $array["position"];
    if($int_position <=0)
    {
        $errors[] = "Position must be greater than 0";
    }
    if($int_position > 999)
    {
        $errors[] ="Position must be less than 999";
    }

    //visible
    $str_visible = (string) $array["visible"];
    if(!has_inclusion_of($str_visible,["0","1"]))
    {
        $errors[] = "Visible must be true or false";
    }

    //content
    if(is_blank($array["content"]))
    {
        $errors[] = "Content cannot be blank";
    }

    return $errors;
    }


function insert_page($page)
{
    global $db;
    //VALIDATE data
    $errors = validate_page($page);
    if(!empty($errors))
    {
        return $errors;
    }

    $sql ="INSERT INTO pages (subject_id,menu_name,position,visible,content) VALUES ('".db_escape($db,$page["subject_id"])."','".db_escape($db,$page["menu_name"])."','";
    $sql .= db_escape($db,$page["position"])."','".db_escape($db,$page["visible"])."','".db_escape($db,$page["content"])."')";
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

function update_page($page)
{
    global $db;
    $errors = validate_page($page);
    if(!empty($errors))
    {
        return $errors;
    }

    $sql ="UPDATE pages SET subject_id='".db_escape($db,$page["subject_id"])."',menu_name='".db_escape($db,$page["menu_name"])."',position='".db_escape($db,$page["position"])."',visible='".db_escape($db,$page["visible"])."',content='".db_escape($db,$page["content"])."'";
    $sql .=" WHERE id='".db_escape($db,$page["id"])."' LIMIT 1";
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
    $sql= "DELETE FROM pages WHERE id='".db_escape($db,$id)."'";
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