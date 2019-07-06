<?php
$table_name = "stock_log";
$field_names = array();
$field_types = array();

$field_names[0] = "p_id";
$field_types[0] = "INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY";

$field_names[1] = "sl_date";
$field_types[1] = "DATETIME";

$field_names[1] = "sl_amount";
$field_types[1] = "DOUBLE";

$field_names[2] = "sl_type";
$field_types[2] = "VARCHAR(10)";

migrate_create($table_name, $field_names, $field_types);
migrate_add($table_name, $field_names, $field_types);
migrate_remove($table_name, $field_names);
