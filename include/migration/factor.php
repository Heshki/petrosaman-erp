<?php
$table_name = "factor";
$field_names = array();
$field_types = array();

$field_names[0] = "f_id";
$field_types[0] = "int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY";

$field_names[1] = "c_id";
$field_types[1] = "int(11) NOT NULL";

$field_names[2] = "f_date";
$field_types[2] = "varchar(16) NOT NULL";

$field_names[3] = "u_id";
$field_types[3] = "int(11) NOT NULL";

migrate_create($table_name, $field_names, $field_types);
migrate_add($table_name, $field_names, $field_types);
migrate_remove($table_name, $field_names);