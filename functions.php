<?php 

//==================================================
//==================================================
//==============Widget item development=============
//==================================================
//==================================================







//==============It has 4 steps=============
//function __construct()        
//public function form( $instance )
//public function update( $new_instance, $old_instance )
//public function widget( $args, $instance )










/**
 * Adds Foo_Widget widget.
 */
class Foo_Widget extends WP_Widget {

 /**
   * Register widget with WordPress.
  */
  function __construct() {
    parent::__construct(
        'foo_widget', // Base ID
         esc_html__( 'Foo__ Widget Title', 'text_domain' ), // Widget Name
        array( 'description' => esc_html__( 'A Foo Widget', 'text_domain' ), ) // Widget description below the widget name
     );
 }










  /**
  * Back-end widget form.
  *
  * @see WP_Widget::form()
  *
  * @param array $instance Previously saved values from database.
  */
 public function form( $instance ) {
      $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New Blog title', 'text_domain' );
      $description = ! empty( $instance['description'] ) ? $instance['description'] : esc_html__( 'New Blog Description', 'text_domain' );
      ?>
      <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Blog Title:', 'text_domain' ); ?></label> 
      <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
      </p>
  <!-- description -->
    <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>"><?php esc_attr_e( 'Description:', 'text_domain' ); ?></label> 
      <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'description' ) ); ?>"  ><?php echo esc_attr( $description ); ?></textarea>
     </p>

     <?php 
 }











 /**
  * Sanitize widget form values as they are saved.
  *
  * @see WP_Widget::update()
  *
  * @param array $new_instance Values just sent to be saved.
  * @param array $old_instance Previously saved values from database.
  *
  * @return array Updated safe values to be saved.
  */
 public function update( $new_instance, $old_instance ) {
     $instance = array();
     $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
     $instance['description'] = ( ! empty( $new_instance['description'] ) ) ? sanitize_text_field( $new_instance['description'] ) : '';

     return $instance;
 }















 /**
  * Front-end display of widget.
  *
  * @see WP_Widget::widget()
  *
  * @param array $args     Widget arguments.
  * @param array $instance Saved values from database.
  */
 public function widget( $args, $instance ) {
      echo $args['before_widget'];
      if ( ! empty( $instance['title'] ) ) {
          echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
      }
      if ( ! empty( $instance['description'] ) ) {
          echo $args['before_title'] . apply_filters( 'widget_title', $instance['description'] ) . $args['after_title'];
      }
      echo esc_html__( 'Hello, World!', 'text_domain' );
      echo $args['after_widget'];
 }





} // class Foo_Widget



// register Foo_Widget widget
function register_foo_widget() {
  register_widget( 'Foo_Widget' );
}
add_action( 'widgets_init', 'register_foo_widget' );










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