<?php
/**
 * Plugin Name: WooCommerce WhatsApp Inquiry
 * Description: Una herramienta para tiendas en línea que desean mejorar la interacción con sus clientes. Este plugin agrega un botón estratégicamente ubicado en las páginas de los productos de WooCommerce, permitiendo a los usuarios enviar consultas directas a través de WhatsApp. Simplifica la comunicación y ayuda a cerrar ventas rápidamente al ofrecer respuestas inmediatas sobre disponibilidad, precios y detalles del producto.
 * Version: 1.0.0
 * Author: webmastercol
 * Author URI: https://webmastercol.com
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    require_once plugin_dir_path( __FILE__ ) . 'includes/settings.php';
    require_once plugin_dir_path( __FILE__ ) . 'includes/functions.php';
    
    // Añadir enlace de ajustes en la página de plugins
    add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'wwi_add_settings_link');
    
    function wwi_add_settings_link($links) {
        $settings_link = '<a href="admin.php?page=woocommerce-whatsapp-inquiry">' . __('Ajustes', 'woocommerce-whatsapp-inquiry') . '</a>';
        array_push($links, $settings_link);
        return $links;
    }
}
?>
