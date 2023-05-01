<?php

/**
 * Helper functions for the basic needs.
 * 
 * How to use:
 * $header = Pacific_Helper::generate_header( $args );
 */
class Pacific_Helper {

	/**
	 * Generates a header
	 * 
	 * @param array $args {
	 * 		Array of arguments. Only $text is required to generate output.
	 * }
	 */
	public static function generate_header( $args ) {
		$output = '';

		$defaults = array(
			'text'        => '',
			'tag'         => 'h1',
			'class'       => '',
			'link_url'    => '',
			'link_target' => '',
		);

		$args = wp_parse_args( $args, $defaults );

		if ( ! $args['text'] )
			return $output;

		$output .= '<' . esc_attr( $args['tag'] );
		if ( $args['class'] )
			$output .= ' class="' . esc_attr( $args['class'] ) . '"';
		$output .= '>';
		if ( $args['link_url'] ) :
			$output .= '<a href="' . esc_url( $args['link_url'] ) . '"';
			if ( $args['link_target'] ) $output .= ' target="' . esc_attr( $args['link_target'] ) . '"';
			$output .= '>';
		endif;
		$output .= wp_kses_post( $args['text'] );
		if ( $args['link_url'] ) :
			$output .= '</a>';
		endif;
		$output .= '</' . esc_attr( $args['tag'] ) . '>';

		return $output;
	}

	/**
	 * Generates a paragraph
	 * 
	 * @param array $args {
	 * 		@type string $text Paragraph text.
	 * }
	 * 
	 * @return string The paragraph output.
	 */
	public static function generate_paragraph( $args = '' ) {
		$output = '';

		$defaults = array(
			'text'  => '',
			'class' => ''
		);

		$args = wp_parse_args( $args, $defaults );

		if ( ! $args['text'] )
			return $output;

		$output .= '<p';
		if ( $args['class'] )
			$output .= ' class="' . esc_attr( $args['class'] ) . '"';
		$output .= '>';
		$output .= wp_kses_post( $args['text'] );
		$output .= '</p>';

		return $output;
	}

		/**
	 * Generates a paragraph
	 * 
	 * @param array $args {
	 * 		@type string $text Paragraph text.
	 * }
	 * 
	 * @return string The paragraph output.
	 */
	public static function generate_small_text( $args = '' ) {
		$output = '';

		$defaults = array(
			'text'  => '',
			'class' => ''
		);

		$args = wp_parse_args( $args, $defaults );

		if ( ! $args['text'] )
			return $output;

		$output .= '<small';
		if ( $args['class'] )
			$output .= ' class="' . esc_attr( $args['class'] ) . '"';
		$output .= '>';
		$output .= wp_kses_post( $args['text'] );
		$output .= '</small>';

		return $output;
	}

	/**
	 * Generates an image from an ACF image field/image ID.
	 * 
	 * @param array $args {
	 * 		Array of arguments. Only $image is required to generate output.
	 * }
	 * 
	 * @return string The image output.
	 */
	public static function generate_image( $args = array() ) {
		$output = '';

		$defaults = array(
			'image'           => '',
			'image_size'      => 'full',
			'class'           => '',
			'attributes'      => array(),
			'figure'          => false,
			'figure_class'    => '',
			'link'            => '',
			'link_attributes' => array(),
			'caption'         => ''
		);

		$args = wp_parse_args( $args, $defaults );

		if ( ! $args['image'] )
			return $output;

		if ( is_array($args['image']) ) :
			$image_id = $args['image']['ID'];
			$image_url = $args['image']['url'];
		else:
			$image_id = $args['image'];
			$image_info = wp_get_attachment_image_src( 
				$image_id, 
				$args['image_size'], 
				false, 
			);
			if ( !$image_info )
				return $output;
			$image_url = $image_info[0];
		endif;

		$ext = pathinfo($image_url, PATHINFO_EXTENSION);

		if ( $args['figure'] || $args['caption'] ) :
			$output .= '<figure';
			if ( $args['figure_class'] )
				$output .= ' class="' . esc_attr( $args['figure_class'] ) . '"';
			$output .= '>';
		endif;

		if ( $args['link'] ) :
			$output .= '<a href="' . $args['link'] . '"';
			if ( $args['link_attributes'] ) :
				foreach ( $args['link_attributes'] as $name => $value ) :
					$output .= " $name=" . '"' . esc_attr( $value ) . '"';
				endforeach;
			endif;
			$output .= '>';
		endif;

		if ( $ext === 'svg' ) :
			$output .= self::load_svg($image_url);
		else:
			if ( $args['class'] ) :
				$args['attributes']['class'] = $args['class'];
			endif;

			$output .= wp_get_attachment_image( 
				$image_id, 
				$args['image_size'], 
				false, 
				$args['attributes']
			);
		endif;

		if ( $args['link'] ) :
			$output .= '</a>';
		endif;

		if ( $args['caption'] ) :
			$output .= '<figcaption>';
				$output .= $args['caption'];
			$output .= '</figcaption>';
		endif;

		if ( $args['figure'] || $args['caption'] ) :
			$output .= '</figure>';
		endif;

		return $output;
	}

	/**
	 * Generates a link from the ACF field type link.
	 * 
	 * @param array $args {
	 * 		Array of arguments. Only $link is required to generate output.
	 * }
	 * 
	 * @return string The link output.
	 */
	public static function generate_acf_link( $args = array() )
	{
		$output = '';

		$defaults = array(
			'link'            => '',
			'class'           => '',
			'container'       => false,
			'container_class' => '',
			'link_attributes' => array()
		);

		$args = wp_parse_args( $args, $defaults );

		$link            = $args['link'];
		$class           = $args['class'];
		$container       = $args['container'];
		$container_class = $args['container_class'];
		$link_attributes = $args['link_attributes'];

		if ( !$link )
			return $output;

		if ( $container ) :
			$allowed_tags = array('p', 'div', 'span', 'nav');
			if ( is_string( $container ) && in_array( $container, $allowed_tags, true ) ) :
				$container_class = $container_class ? ' class="' . esc_attr( $container_class ) . '"' : '';
				$output .= '<' . $container . $container_class . '>';
			endif;
		endif;

		$output .= '<a ';
		if ( isset($link['target']) && $link['target'] ) :
			$output .= 'target="' . esc_attr( $link['target'] ) . '" ';
		endif;
		if ( $class ) :
			$output .= 'class="' . $class . '" ';
		endif;
		if ( $link_attributes ) :
			foreach ( $link_attributes as $name => $value ) :
				$output .= " $name=" . '"' . esc_attr( $value ) . '"';
			endforeach;
		endif;
		$output .= 'href="' . esc_url( $link['url'] ) . '"';
		$output .= '>';
		$output .= wp_kses_post( $link['title'] );
		$output .= '</a>';

		if ( $container ) {
			$output .= '</' . esc_attr( $container ) . '>';
		}

		return $output;
	}

	/**
	 * Generate a div for WYSIWYG content
	 * 
	 * @param array $args {
	 * 		Array of arguments. Only $content is required to generate output.
	 * }
	 * 
	 * @return string WYSIWYG content.
	 */
	public static function generate_wysiwyg( $args = array() )
	{
		$output = '';

		$defaults = array(
			'content'   => '',
			'container' => 'div',
			'classes'   => array('editor-content')
		);

		$args = wp_parse_args( $args, $defaults );

		if ( !$args['content'] )
			return $output;

		if ( $args['container'] ) :
			$output .= '<' . $args['container'] . ' class="' . esc_attr( implode( ' ', $args['classes'] ) ) . '">';
		endif;
			$output .= $args['content'];
		if ( $args['container'] ) :
			$output .= '</' . $args['container'] . '>';
		endif;

		return $output;
	}
}
