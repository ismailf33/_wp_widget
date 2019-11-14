function admin_scripts(){
      wp_enqueue_script('admin_custom', get_template_directory_uri().'/inc/admin_user_file.js', array('jquery'));
      wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'admin_scripts' );




/**
 * Adds Foo_Widget widget.
 */
class Fat_Widget extends WP_Widget {

 /**
   * Register widget with WordPress.
  */
  function __construct() {
    parent::__construct(
        'fat_widget', // Base ID
         esc_html__( 'Fat__ Widget Title', 'text_domain' ), // Widget Name
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
    $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'text_domain' );
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



		  <!--   image uplodaer creating  -->
		  <p>  
		  <button class="button button-primary"   id="author_image">Image upload</button>
		  <input type="hidden" class="image_er_link" name="<?php echo esc_attr( $this->get_field_name( 'info_image' ) ); ?>">
		  <div class="image-show">
		    <img width="300px" height="auto" src="<?php echo $instance['info_image']?>" alt="">
		  </div>
		  </p>

   <?php 
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
      echo $args['before_title'] .$instance['title']. $args['after_title'];
      if(!empty($instance['description'])){
      ?>
      <li class="list-group-item"><?php echo $instance['description'];?></li> 
      <?php } ?>
      <li class="list-group-item">Porta ac consectetur ac</li>
      <li class="list-group-item">Vestibulum at eros</li>
      <?php

      echo $args['after_widget'];

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
     $instance['info_image'] = ( ! empty( $new_instance['info_image'] ) ) ? sanitize_text_field( $new_instance['info_image'] ) : '';

     return $instance;
 }

} // class Foo_Widget



// register Foo_Widget widget
function register_fat_widget() {
  register_widget( 'Fat_Widget' );
}
add_action( 'widgets_init', 'register_fat_widget' );
