<?php
$table_name = "factor_body";
$field_names = array();
$field_types = array();

$field_names[0] = "fb_id";
$field_types[0] = "int(11) NOT NULL COMMENT 'کد ردیف' AUTO_INCREMENT PRIMARY KEY";

$field_names[1] = "f_id";
$field_types[1] = "int(11) NOT NULL COMMENT 'کد فاکتور'";

$field_names[2] = "p_id";
$field_types[2] = "int(11) NOT NULL COMMENT 'کد محصول'";

$field_names[3] = "cat_id";
$field_types[3] = "int(11) NOT NULL COMMENT 'کد دسته بندی'";

$field_names[4] = "fb_quantity";
$field_types[4] = "float NOT NULL COMMENT 'مقدار'";

$field_names[5] = "fb_price";
$field_types[5] = "double NOT NULL COMMENT 'مبلغ'";

$field_names[6] = "fb_pre_invoice_scan";
$field_types[6] = "int(11) DEFAULT '0'";

$field_names[7] = "fb_verify_admin1";
$field_types[7] = "tinyint(1) DEFAULT '0' COMMENT 'تایید 1 مدیر'";

$field_names[8] = "fb_send_customer";
$field_types[8] = "tinyint(1) DEFAULT '0' COMMENT 'ارسال مشتری'";

$field_names[9] = "fb_verify_customer";
$field_types[9] = "tinyint(1) DEFAULT '0' COMMENT 'تایید مشتری'";

$field_names[10] = "fb_verify_docs";
$field_types[10] = "tinyint(1) DEFAULT '0' COMMENT 'اسناد تایید'";

$field_names[11] = "fb_verify_finan";
$field_types[11] = "tinyint(1) DEFAULT '0' COMMENT 'تایید مالی'";

$field_names[12] = "fb_verify_admin2";
$field_types[12] = "tinyint(1) DEFAULT '0' COMMENT 'تایید 2 مدیر'";

$field_names[13] = "fb_wait_bar";
$field_types[13] = "tinyint(1) DEFAULT '0' COMMENT 'منتظر بارگیری'";

$field_names[14] = "fb_ready_bar";
$field_types[14] = "tinyint(1) DEFAULT '0' COMMENT 'آماده تحویل'";

$field_names[15] = "fb_get_sample";
$field_types[15] = "tinyint(1) DEFAULT '0' COMMENT 'نمونه برداری'";

$field_names[16] = "fb_verify_bar";
$field_types[16] = "tinyint(1) DEFAULT '0' COMMENT 'تایید بارگیری'";

$field_names[17] = "fb_exit_doc";
$field_types[17] = "tinyint(1) DEFAULT '0' COMMENT 'حواله خروج'";

$field_names[18] = "fb_exit_bar";
$field_types[18] = "tinyint(1) NOT NULL DEFAULT '0' COMMENT 'تایید خروج بار'";

$field_names[19] = "fb_result_analyze";
$field_types[19] = "text";

$field_names[20] = "dr_id";
$field_types[20] = "int(11) DEFAULT NULL COMMENT 'کد راننده'";

migrate_drop($table_name);
migrate_create($table_name, $field_names, $field_types);
migrate_add($table_name, $field_names, $field_types);
migrate_remove($table_name, $field_names);
