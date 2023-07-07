<?php 
function select_input_file($file_input,$folder_path){
    $allowed = ['image/png', 'image/jpeg', 'image/JPG'];
    if (isset($_FILES[$file_input])) {
        if (in_array($_FILES[$file_input]['type'], $allowed) !== false && $_FILES[$file_input]['size'] < 8 * 1024 * 1024) {
            move_uploaded_file($_FILES[$file_input]['tmp_name'], "$folder_path" . $_FILES[$file_input]['name']);
            $file_name = $_FILES[$file_input]['name'];
        }
    }
    if(isset($file_name)){
        return $file_name;
    }
}
function select_input_notice($file_input,$folder_path){
    $allowed = ['image/png', 'image/jpeg', 'image/JPG', 'application/pdf'];
    if (isset($_FILES[$file_input])) {
        if (in_array($_FILES[$file_input]['type'], $allowed) !== false && $_FILES[$file_input]['size'] < 8 * 1024 * 1024) {
            move_uploaded_file($_FILES[$file_input]['tmp_name'], "$folder_path" . $_FILES[$file_input]['name']);
            $file_name = $_FILES[$file_input]['name'];
        }
    }
    if(isset($file_name)){
        return $file_name;
    }
}
function select_data_from_id($connection, $table_name, $id)
{
    $query = "SELECT * FROM `$table_name` WHERE `id`=$id";
    $result = mysqli_query($connection, $query);
    $selected_data = mysqli_fetch_assoc($result);
    return $selected_data;
}


function delete_image($dlData, $table, $id,$file,$dir,$connection){
    if (isset($dlData)) {
        $image = $dlData["$file"];
        $query = "SELECT * FROM `$table`";
        $result = mysqli_query($connection, $query);
        while ($data = mysqli_fetch_assoc($result)) {
            $images[] = $data["$file"];
        }
        $allImages = array_keys($images, $image);
        if (count($allImages) == 1) {
            unlink($dir . $image);
        }
    }
}