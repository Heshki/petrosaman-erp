<?php
$table_name = "customer";
$field_names = array();
$field_types = array();

$field_names[0] = "c_id";
$field_types[0] = "int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY";

$field_names[1] = "c_name";
$field_types[1] = "varchar(15) DEFAULT NULL";

$field_names[2] = "c_family";
$field_types[2] = "varchar(25) DEFAULT NULL";

$field_names[3] = "c_company";
$field_types[3] = "varchar(35) DEFAULT NULL";

$field_names[4] = "c_national";
$field_types[4] = "varchar(10) DEFAULT NULL";

$field_names[5] = "c_economic";
$field_types[5] = "varchar(12) DEFAULT NULL";

$field_names[6] = "c_phone";
$field_types[6] = "varchar(11) DEFAULT NULL";

$field_names[7] = "c_fax";
$field_types[7] = "varchar(11) DEFAULT NULL";

$field_names[8] = "c_mobile";
$field_types[8] = "varchar(11) DEFAULT NULL";

$field_names[9] = "c_oaddress";
$field_types[9] = "text DEFAULT NULL";

$field_names[10] = "c_faddress";
$field_types[10] = "text DEFAULT NULL";

$field_names[11] = "c_email";
$field_types[11] = "text DEFAULT NULL";

$field_names[12] = "c_vat";
$field_types[12] = "varchar(5) DEFAULT NULL";

$field_names[13] = "c_expire_vat";
$field_types[13] = "varchar(10) DEFAULT NULL";

$field_names[14] = "c_customertype";
$field_types[14] = "varchar(15) DEFAULT NULL";

migrate_create($table_name, $field_names, $field_types);
migrate_add($table_name, $field_names, $field_types);
migrate_remove($table_name, $field_names);
