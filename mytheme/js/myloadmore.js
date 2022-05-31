jQuery(function($){ // use jQuery code inside this to avoid "$ is not defined" error
	$('.mytheme_loadmore').click(function(){
 
		var button = $(this),
		    data = {
			'action': 'loadmore',
			'query': mytheme_loadmore_params.posts, // that's how we get params from wp_localize_script() function
			'page' : mytheme_loadmore_params.current_page
		};
 
		$.ajax({ // you can also use $.post here
			url : mytheme_loadmore_params.ajaxurl, // AJAX handler
			data : data,
			type : 'POST',
			beforeSend : function ( xhr ) {
				button.text('Loading...'); // change the button text, you can also add a preloader image
			},
			success : function( data ){
				if( data ) { 
					button.text( 'More posts' ).prev().before(data); // insert new posts
					mytheme_loadmore_params.current_page++;
 
					if ( mytheme_loadmore_params.current_page == mytheme_loadmore_params.max_page ) 
						button.remove(); 
 
				} else {
					button.remove();
				}
			}
		});
	});
});