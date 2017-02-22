<?php 

/*========================================================================
|                        Fungsi Get Pegawai                              |
========================================================================*/

function get_employee() {

    $db = connect_db();
   
    $sql = "SELECT * FROM employee ORDER BY `emp_name`";
    
    $exe = $db->query($sql);

    $data = $exe->fetch_all(MYSQLI_ASSOC);

    // $db = null;

    if($data){

        $data = array(
            "response" => array(
                "status" => "200 OK",
                "data" => $data
            )
        );
        
        echo json_encode($data);

    }else{

        $data = array(
            "response" => array(
                "status" => "500 Internal Server Error",
                "data" => null
            )
        );

        echo json_encode($data);

    }
}

/*=========================================================================
|                      Fungsi Get Pegawai Berdasarkan ID                  |
=========================================================================*/

function get_employee_id($employee_id) {

    $db = connect_db();

    $sql = "SELECT * FROM employee WHERE `employee_id` = '$employee_id'";

    $exe = $db->query($sql);

    $data = $exe->fetch_all(MYSQLI_ASSOC);

    // $db = null;

    if ($data) {

        $data = array(
            "response" => array(
                "status" => "202 Accepted",
                "data" => $data
            )
        );

        echo json_encode($data);

    }else{

        $data = array(
            "response" => array(
                "status" => "404 Not Found"
            )
        );

        echo json_encode($data);

    }
}

/*=========================================================================
|                      Fungsi Insert Data Pegawai                         |
=========================================================================*/

function add_employee($data) {

    $db = connect_db();

    $sql = "INSERT INTO employee (emp_name,emp_contact,emp_role) VALUES ('".$data['emp_name']."','".$data['emp_contact']."','".$data['emp_role']."')";

    $exe = $db->query($sql);

    $last_id = $db->insert_id;

    // $db = null;

    if (!empty($last_id)){

        $data = array(
            "response" => array(
                "status" => "201 Created",
                "last_id" => $last_id
            )
        );

        echo json_encode($data);

    }else{

        $data = array(
            "response" => array(
                "status" => "406 Not Acceptable"
            )
        );

        echo json_encode($data);

    }
}

/*=========================================================================
|                      Fungsi Update Data Pegawai                         |
=========================================================================*/

function update_employee($data) {

    $db = connect_db();
    $sql = "update employee SET emp_name = '".$data['emp_name']."',emp_contact = '".$data['emp_contact']."',emp_role='".$data['emp_role']."' WHERE employee_id = '".$data['employee_id']."'";
    $exe = $db->query($sql);
    $last_id = $db->affected_rows;
    // $db = null;

    if (!empty($last_id)){
        $data = array(
            "response" => array(
                "status" => "200 OK Updated",
                "last_id" => $last_id
            )
        );

        echo json_encode($data);
    }else{
        
        $data = array(
            "response" => array(
                "status" => "406 Not Acceptable",
                "message" => "Data Not Updated"
            )
        );

        echo json_encode($data);
        
    }
}

/*=========================================================================
|                      Fungsi Delete Data Pegawai                         |
=========================================================================*/

function delete_employee($employee) {
    $db = connect_db();
    $sql = "DELETE FROM employee WHERE employee_id = '".$employee['employee_id']."'";
    $exe = $db->query($sql);
    // $db = null;
    if (!empty($last_id)){
        $data = array(
            "response" => array(
                "status" => "200 OK Deleted",
                "last_id" => $last_id
            )
        );

        echo json_encode($data);
    }else{
        
        $data = array(
            "response" => array(
                "status" => "404 Not Found",
                "message" => "Data Not Updated"
            )
        );

        echo json_encode($data);
        
    }
}


?>