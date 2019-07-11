<?php
$table_name = "factor_buy";
$field_names = array();
$field_types = array();

$field_names[0] = "bu_id";
$field_types[0] = "int(11) NOT NULL COMMENT 'کد خرید', AUTO_INCREMENT PRIMARY KEY";

$field_names[1] = "f_id";
$field_types[1] = "int(11) NOT NULL COMMENT 'کد سرفاکتور'";

$field_names[2] = "p_id";
$field_types[2] = "int(11) NOT NULL COMMENT 'کد محصول'";

$field_names[3] = "bu_scan_invoice";
$field_types[3] = "varchar(100) DEFAULT NULL COMMENT 'اسکن پیش فاکتور'";

$field_names[4] = "bu_quantity";
$field_types[4] = "float DEFAULT NULL COMMENT 'وزن'";

$field_names[5] = "bu_verify_admin1";
$field_types[5] = "int(11) DEFAULT NULL COMMENT 'تایید مدیریت'";

$field_names[6] = "bu_send_fiscal";
$field_types[6] = "int(11) DEFAULT NULL COMMENT 'ارسال به واحد مالی'";

$field_names[7] = "bu_send_customer";
$field_types[7] = "int(11) DEFAULT NULL COMMENT 'ارسال رسید به مشتری'";

$field_names[8] = "bu_quantity_r";
$field_types[8] = "float DEFAULT NULL";

$field_names[9] = "bu_out";
$field_types[9] = "varchar(10) DEFAULT NULL";

migrate_create($table_name, $field_names, $field_types);
migrate_add($table_name, $field_names, $field_types);
migrate_remove($table_name, $field_names);
