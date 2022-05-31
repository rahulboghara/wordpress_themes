<?php

add_filter( 'pt-ocdi/import_files', 'lms_ocdi_import_files' );

add_action( 'pt-ocdi/after_import', 'lms_ocdi_after_import_setup' );

add_action( 'pt-ocdi/before_widgets_import', 'lms_ocdi_before_widgets_import' );



update_option('users_can_register','1');