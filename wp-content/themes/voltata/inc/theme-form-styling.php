<?php
/**
 * Custom widget search form styling
 */
function voltata_search_form( $form ) {
	$form = '
	<form role="search" method="get" id="searchform" class="searchform" action="' . esc_url( home_url( '/' ) ) . '" >
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
      <input type="text" class="form-control" name="s" id="s" value="' . get_search_query() . '" aria-describedby="basic-addon1" placeholder="' . __('Search for...', 'voltata') . '">
      <span class="input-group-btn">
        <button type="submit" class="btn btn-default" id="searchsubmit">'. esc_attr__( "Search", "voltata" ) .'</button>
      </span>
    </div>
	</form>';

  return $form;
}

add_filter( 'get_search_form', 'voltata_search_form', 100 );

/**
 * Password Protected Form
 */
function voltata_password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $form = '
    ' . __( "This content is password protected. To view it please enter your password below:", "voltata" ) . '
		<form method="post" action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '">
			<div class="input-group">
        <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-lock"></span></span><input name="post_password" type="password" class="form-control" name="' . $label . '" id="' . $label . '" aria-describedby="basic-addon2" placeholder="' . __('Password', 'voltata') . '"/>
				<span class="input-group-btn">
					<input type="submit" class="btn btn-default" id="passwordsubmit" value="' . esc_attr__( "Submit", "voltata" ) . '">
				</span>
			</div>
    </form>
    ';
	
    return $form;
}
add_filter( 'the_password_form', 'voltata_password_form' );

/**
 * Comment form
 * http://www.codecheese.com/2013/11/wordpress-comment-form-with-twitter-bootstrap-3-supports/
 */
add_filter( 'comment_form_default_fields', 'voltata_bootstrap3_comment_form_fields' );
function voltata_bootstrap3_comment_form_fields( $fields ) {
    $commenter = wp_get_current_commenter();
    
    $req      = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $html5    = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;
    
    $fields   =  array(
        'author' => '<div class="form-group comment-form-author">' . '<label for="author">' . __( "Name", "voltata" ) . ( $req ? ' <span class="required">' . __( "*", "voltata" ) . '</span>' : '' ) . '</label> ' .
                    '<input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',
        'email'  => '<div class="form-group comment-form-email"><label for="email">' . __( "Email", "voltata" ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                    '<input class="form-control" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>',
        'url'    => '<div class="form-group comment-form-url"><label for="url">' . __( "Website", "voltata" ) . '</label> ' .
                    '<input class="form-control" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div>'        
    );
    
    return $fields;
}

add_filter( 'comment_form_defaults', 'voltata_bootstrap3_comment_form' );
function voltata_bootstrap3_comment_form( $args ) {
    $args['comment_field'] = '<div class="form-group comment-form-comment">
            <label for="comment">' . __( "Comment", "voltata" ) . '</label> 
            <textarea class="form-control" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
        </div>';
    $args['class_submit'] = 'btn btn-default'; // since WP 4.1
    
    return $args;
}