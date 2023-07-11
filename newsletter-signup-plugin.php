<?php
/**
* Plugin Name: Newsletter
* Plugin URI: https://www.atashaekh.com/
* Description: This is a newsletter plugin developed by Ata.
* Version: 1.0
* Author: Ata
* Author URI: https://www.atashaekh.com/
**/

function wpb_adding_scripts() {
    wp_register_script('newseletter-plugin-js', plugins_url('assets/js/jquery.js', __FILE__), array('jquery'),'1.1', true);
    wp_enqueue_script('newseletter-plugin-js');
    }
add_action( 'wp_enqueue_scripts', 'wpb_adding_scripts' );

function wpb_adding_styles() {
    wp_register_style('newseletter-plugin-css', plugins_url('assets/css/style.css', __FILE__));
    wp_enqueue_style('newseletter-plugin-css');
    }
add_action( 'wp_enqueue_scripts', 'wpb_adding_styles' );

// Get the accepted languages from the request headers
$acceptedLanguages = $_SERVER['HTTP_ACCEPT_LANGUAGE'];

// Check if the accepted languages include Arabic
if (strpos($acceptedLanguages, 'ar') !== false) {
  // Execute PHP code for Arabic language
  // Your code for Arabic language goes here
  echo "This is Arabic language.";
} else {
  // Execute PHP code for other languages
  // Your code for other languages goes here
}

function myCustomContent() { ?>
    <!-- Trigger/Open The Modal -->
    <button id="myBtn" style="display:none;">Open Modal</button>
    <!-- The Modal -->
    <div id="newsletter-form" class="modal" style="direction:<?php if (strpos($acceptedLanguages, 'ar') !== false) { echo "rtl"; }; ?>">
    <!-- Modal content -->
    <div class="modal-content">
        <span class="close"><img src="<?php echo plugin_dir_url( __FILE__ ) . 'assets/images/close.png'; ?>"></span>
            <div class="modal-body">
                <div class="row-at">
                    <div class="col-12-at col-sm-6-at">
                        <div class="coverImg">
                            <img src="<?php echo plugin_dir_url( __FILE__ ) . 'assets/images/vogue-popup-image.png'; ?>" alt="Vogue Newsletter">
                        </div>
                    </div>
                    <div class="col-12-at col-sm-6-at positionRelative">
                        <div class="paddingBox">
                            <div class="logoDiv">
                                <img src="<?php echo plugin_dir_url( __FILE__ ) . 'assets/images/vogue-arabia-logo.png'; ?>" alt="Vogue Logo">
                            </div>
                            <div class="text1">
                                <h3 class="textCenter">Sign Up for our Newsletters</h3>
                                <div class="mTop">
                                    <span>Vogue Daily:  Celebrity style, beauty tips, culture <br>news and more.</span>
                                    <span>Vogue Weekly:  Weekly fashion news, runway <br>coverage street style and more.</span>
                                </div>
                            </div>
                            <form action="/" class="newsletterForm">
                                <span><input type="email" placeholder="Email"></span>
                                <input type="submit" value="Submit">
                            </form>
                        </div>
                        <span class="spanAbs textCenter spanAbsStyle">Will be used in accordance with our <a href="#">Privacy Rights</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
add_action('wp_body_open', 'myCustomContent');
?>