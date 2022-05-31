jQuery(function($) {

    jQuery(document).on('click', '#searchsubmit', function() {
        var page = 2;


jQuery(function($) {
    jQuery(document).off("click", ".loadmore").on('click', '.loadmore', function() {

        var total_page = parseInt(jQuery('#total_pages').val());
        var total_pages = total_page + 1;
        var $form      = jQuery(this).parent().parent();
        var $t_input   = $form.find('input[name="search_title"]');
        var $a_input   = $form.find('input[name="search_author"]');
        var $c_input   = $form.find('select[name="search_cat"]');
        var $d_input   = $form.find('input[name="search_date"]');
        var date       = $d_input.val();
        var cat        = $c_input.val();
        var author     = $a_input.val();
        var title      = $t_input.val();
        var button    = jQuery(this);

        var data = {
            'action': 'load_posts_by_ajax',
            'security': blog.security,
            'page' : page,
            'date': date,
            'cat': cat,
            'author': author,
            'title': title,
        };

        jQuery.post({
            url: blog.ajaxurl,
            data,
            beforeSend : function ( xhr ) {
                button.text('Loading...'); // change the button text, you can also add a preloader image
            },
            success: function(response) {
                
            if(response != '') {
                button.text( 'More Books' ).prev().append(response); // insert new posts
                page++;
                console.log(page);
                console.log(total_pages);
                if ( page == total_pages ) {
                        button.remove(); 
                    }
            } else {
                button.remove();
            }
          }
        });
    });
});

});
});
