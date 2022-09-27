add_action( 'rest_api_init', 'rest_meta_title' );
add_action( 'rest_api_init', 'rest_meta_description' );
/**
* Adds user_meta to rest api 'user' endpoint.
*/
function rest_meta_title() {
	register_rest_field( '__TARGET CUSTOM POST TYPE HERE__','_yoast_wpseo_title',
						array(
							'get_callback' => function ( $object, $field_name, $request ) {
								$field_name = '_yoast_wpseo_title';
				return get_post_meta($object['id'],$field_name, true);
			},
							'update_callback' => function ( $value, $object, $field_name ) {
				if ( ! $value || ! is_string( $value ) ) {
					return;
				}
				return update_post_meta( $object->ID, $field_name, strip_tags( $value ) );
			},
							'schema' => null,
						)
	);
}
function rest_meta_description() {
	register_rest_field( '__TARGET CUSTOM POST TYPE HERE__','_yoast_wpseo_metadesc',
						array(
							'get_callback' => function ( $object, $field_name, $request ) {
								$field_name = '_yoast_wpseo_metadesc';
				return get_post_meta($object['id'],$field_name, true);
			},
							'update_callback' => function ( $value, $object, $field_name ) {
				if ( ! $value || ! is_string( $value ) ) {
					return;
				}
				return update_post_meta( $object->ID, $field_name, strip_tags( $value ) );
			},
							'schema' => null,
						)
	);
}
