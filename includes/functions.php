<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Añadir el botón en la página de producto
add_action('woocommerce_after_add_to_cart_button', 'wwi_add_whatsapp_button');

function wwi_add_whatsapp_button() {
    if (get_option('wwi_enable_button')) {
        global $product;

        if (!$product) {
            return; // Producto no encontrado
        }

        $product_name = $product->get_name();
        $product_price = $product->get_price();
        $product_url = get_permalink($product->get_id());
        $whatsapp_number = get_option('wwi_whatsapp_number');
        $button_text = get_option('wwi_button_text', 'Consultar por WhatsApp');
        $default_message = get_option('wwi_default_message', 'Me interesa el siguiente producto, ¿se encuentra disponible?');
        $message = rawurlencode("$default_message\n\n$product_name\n$ $product_price\n$product_url");

        echo '<div style="text-align: center; margin-top: 10px;">';
        echo '<a href="https://wa.me/' . esc_attr($whatsapp_number) . '?text=' . $message . '" class="button alt whatsapp-inquiry" style="width: 100%;" target="_blank">' . esc_html($button_text) . '</a>';
        echo '</div>';
    }
}
?>
