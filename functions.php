<?php 

function wp_car_widgets(){
  register_sidebar(array(
    'name'          =>  esc_html__( 'Header widget', '@$&text_domain' ),
    'id'            =>  esc_html__( 'head_widget', '@$&text_domain'),
    'description'   =>  esc_html__('Description this Header Widget '),
    'class' => '',
    'before_widget' => '<ul class="list-group">',
    'after_widget'  => '</ul>',
    'before_title'  => '<h1><span class="badge badge-secondary">',
    'after_title'   => '</span></h1>'
  ));
}
add_action('widgets_init', 'wp_car_widgets');


