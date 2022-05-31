<?php

add_filter( 'pt-ocdi/import_files', 'its_ocdi_import_files' );

add_action( 'pt-ocdi/after_import', 'its_ocdi_after_import_setup' );
