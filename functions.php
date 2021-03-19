<?php

    session_start();

    global $link;
    $link = mysqli_connect("localhost", "root", "", "transcendence");

    if (mysqli_connect_error()) {

        die ("Database connection error");

    }

    function get_db_link() {
        global $link;
        return $link;
    }

    
    function insert_record($table, $values) {
        global $link;

        $columnsString = '';
        $i = 0;
        foreach($values as $key => $value) {
            $columnsString .= $key;
            if ($i < count($values) - 1) {
                $columnsString .= ',';
            }
            $i++;
        }

        $valuesString = '';
        $i = 0;
        foreach($values as $key => $value) {
            $valuesString .= "'" . $value . "'";
            if ($i < count($values) - 1) {
                $valuesString .= ',';
            }
            $i++;
        }
        $sql = "INSERT INTO $table ($columnsString)
        VALUES ($valuesString)";
        if (mysqli_query($link, $sql)) {
            return get_result($table, mysqli_insert_id($link));
        }

        return false;
    }

    function update_record($table, $id, $values) {
        global $link;

        $valuesString = '';
        $i = 0;
        foreach($values as $key => $value) {
            $valuesString .= $key . " = '" . $value . "'";
            if ($i < count($values) - 1) {
                $valuesString .= ', ';
            }
            $i++;
        }

        $sql = "UPDATE $table SET $valuesString WHERE id = $id";

        if (mysqli_query($link, $sql)) {
            return get_result($table, $id);
        }

        return false;
    }

    function remove_record($table, $key, $value) {
        global $link;

       
        $sql = "DELETE FROM $table WHERE $key = '$value'";


        if (mysqli_query($link, $sql)) {
            return true;
        }

        return false;
    }


    function get_results($table) {
        global $link;
        $sql = $link->query("SELECT * FROM $table"); 
        $results = mysqli_fetch_all($sql, MYSQLI_ASSOC);
        return $results;
    }

    function get_result($table, $id) {
        global $link;
        $sql = $link->query("SELECT * FROM $table WHERE id = $id");
        $result = mysqli_fetch_assoc($sql);
        return $result;
    }

    function get_result_by_key($table, $key, $value) {
        global $link;
        $sql = $link->query("SELECT * FROM $table WHERE $key = '$value'"); 
        $results = mysqli_fetch_assoc($sql);
        return $results;
    }

    function get_results_by_key($table, $key, $value) {
        global $link;
        $sql = $link->query("SELECT * FROM $table WHERE $key = '$value'"); 
        $results = mysqli_fetch_all($sql, MYSQLI_ASSOC);
        return $results;
    }

    function remove_photo() {

        $result = remove_record('uploads', 'user_id', $_SESSION['id']);
        
    } 

    function delete_entry($id) {

        $result = remove_record('entries', 'id', $id);

    } 

    function delete_category($id) {

        $result = remove_record('categories', 'id', $id);
        return $result;
    } 

    function is_logged_in() {

        if (isset($_SESSION['id'])) {

            return true;

        }
        return false;
    }

    function get_user() {

        if (is_logged_in()) {

            return get_result('users', $_SESSION['id']);

        }
        return false;
    }
 
    function record_exists($table, $key, $value) {

        $results = get_results_by_key($table, $key, $value);
        if (!empty($results)) {

            return true;

        }
        return false;
    }

    function entry_html($entry) {
        ob_start();
        ?>
<div class="data-content" data-id="<?= $entry['id']; ?>" data-name="<?= $entry['name']; ?>"
    data-description="<?= $entry['description']; ?>">
    <div class="entry-name">Name : <?= $entry['name']; ?></div>
    <div class="line"></div>
    <div class="entry-description">Description : <?= $entry['description']; ?></div>
    <div class="trash-icon">
        <span class="trash">
            <span></span>
            <i></i>
        </span>
    </div>
</div>
<?php
        $html = ob_get_clean();
        return $html;
    }

 ?>