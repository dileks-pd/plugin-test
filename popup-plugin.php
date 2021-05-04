<?php
/**
  Plugin Name: Dilex-air Plugin
  
  Plugin URI: https://dilex-air/
  Description: Popup Plugin is the simple WordPress plugin for handling modals and popups. Take this as a base plugin and modify as per your need.
  Version: 1.0
  Author: Dilex-air
  Author URI: https://github.com/dileks-pd
  Text Domain: popup plugin
  Contributors: Dilex
  License: GPL-2.0+
  License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

//  include 'db-connection.php'

function add_popup_form( $title ) {
  return <<<HTML
    <html>
    <body>
        <div id="overlay">
          <form id="modal-container" method="post" action="popup-plugin.php">
          <!-- <form id="modal-container" method="post" action="/"> -->
            <!-- <button class="close-btn"> -->
            <p class="question-p">Уже уходите?</p>
            <p>Оставьте свои контакты и мы проконсультируем Вас.</p>
            <p>Мы знаем о компрессорном оборудовании всё!</p>
            <button type="button" id="close-btn" class="close-btn" aria-label="Close">
              <svg width="22" height="22" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 29L29 1L1 29ZM29 29L1 1Z" fill="#383F48"/>
                <path d="M29 29L1 1M1 29L29 1L1 29Z" stroke="#383F48" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </button>
            <label for="input1">Ваше имя</label>
            <input type="text" name='name_col' id="smth">
            <label for="input2">Ваш телефон</label>
            <input type="text" name='phone_col' id="smth"> 
            <label for="input3">Ваш email</label>
            <input type="text" name='email_col' id="smth">
            <button type="submit" id='submit-btn'>Отправить</button>
          </form>
        </div>
    </body>
    </html>
HTML;
}

// $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER']:'http://porto/plugin';
$redirect = isset($_SERVER['HTTP_REFERER']);

header("Location: $redirect");
// header("Location: http://porto/plugin");
// exit();

include 'php-scripts/db-modification.php';
// $value = 'str';
// echo($value);

add_action( 'the_title', 'add_popup_form' );
add_action('plugin_loaded', 'add_popup_styles');

function add_popup_styles() {
    wp_register_style('popupStyleSheet', plugins_url('popup-styles.css', __FILE__));
    wp_enqueue_style( 'popupStyleSheet');
}

// add scripts
wp_register_script('popupJS', plugins_url('popup-plugin.js', __FILE__));
wp_enqueue_script('popupJS');

// $data_count = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->wp_posts;" );
// echo '<p>Данные: ' . $ID . '</p>';
// echo '<p>Данные: ' . "somedata" . '</p>';


?>