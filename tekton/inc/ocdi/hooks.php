<?php

add_filter( 'pt-ocdi/import_files', 'tbg_ocdi_import_files' );

add_action( 'pt-ocdi/after_import', 'tbg_ocdi_after_import_setup' );

add_action( 'pt-ocdi/before_widgets_import', 'tbg_ocdi_before_widgets_import' );