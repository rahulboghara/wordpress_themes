<?php

add_filter( 'pt-ocdi/import_files', 'pms_ocdi_import_files' );

add_action( 'pt-ocdi/after_import', 'pms_ocdi_after_import_setup' );

add_action( 'pt-ocdi/before_widgets_import', 'pms_ocdi_before_widgets_import' );


update_option('default_role','tenants');

update_option('users_can_register','1');


function wporg_simple_role() {
    add_role(
        'tenants',
        'Tenants',
        [
            'read'         => true,
            'edit_dashboard'         => true,
            'level_0' => true,
            'edit_doc_upload' => true,
	        'read_doc_upload' => true,
	        'delete_doc_upload' => true,
	        'publish_doc_uploads' => true,
	        'edit_doc_uploads' => true,
	        'edit_others_doc_uploads' => true,
	        'delete_doc_uploads' => true,
	        'delete_others_doc_uploads' => true,
	        'read_private_doc_uploads' => true,
	        'delete_private_doc_uploads' => true,
	        'delete_published_doc_uploads' => true,
	        'edit_private_doc_uploads' => true,
	        'edit_published_doc_uploads' => true,

			'edit_rent' => true,
			'read_rent' => true,
			'delete_rent' => true,
			'publish_rents' => true,
			'edit_rents' => true,
			'edit_others_rents' => true,
			'delete_rents' => true,
			'delete_others_rents' => true,
			'read_private_rents' => true,
			'delete_private_rents' => true,
	        'delete_published_rents' => true,
	        'edit_private_rents' => true,
	        'edit_published_rents' => true,


			'edit_user_maintenance'  => true,
	        'read_user_maintenance'  => true,
	        'delete_user_maintenance'  => true,
	        'publish_user_maintenances'  => true,
	        'edit_user_maintenances'  => true,
	        'edit_others_user_maintenances'  => true,
	        'delete_user_maintenances'  => true,
	        'delete_others_user_maintenances'  => true,
	        'read_private_user_maintenances'  => true,
	        'delete_private_user_maintenances' => true,
	        'delete_published_user_maintenances' => true,
	        'edit_private_user_maintenances' => true,
	        'edit_published_user_maintenances' => true,

        ]
    );
}
 
add_action('admin_init', 'wporg_simple_role');