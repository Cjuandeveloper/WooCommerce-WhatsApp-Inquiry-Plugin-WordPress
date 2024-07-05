<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Crear el menú de configuración en el admin de WordPress
add_action('admin_menu', 'wwi_create_menu');

function wwi_create_menu() {
    add_submenu_page(
        'woocommerce',
        __('Ajustes de WhatsApp Inquiry', 'woocommerce-whatsapp-inquiry'),
        __('WhatsApp Inquiry', 'woocommerce-whatsapp-inquiry'),
        'manage_options',
        'woocommerce-whatsapp-inquiry',
        'wwi_settings_page'
    );
}

// Registrar configuraciones
add_action('admin_init', 'wwi_register_settings');

function wwi_register_settings() {
    register_setting('wwi_settings_group', 'wwi_enable_button');
    register_setting('wwi_settings_group', 'wwi_whatsapp_number');
    register_setting('wwi_settings_group', 'wwi_button_text');
    register_setting('wwi_settings_group', 'wwi_default_message');
}

// Página de configuraciones
function wwi_settings_page() {
    ?>
    <div class="wrap">
        <h1><?php _e('Ajustes de WooCommerce WhatsApp Inquiry', 'woocommerce-whatsapp-inquiry'); ?></h1>
        <p><?php _e('WooCommerce WhatsApp Inquiry es una herramienta para tiendas en línea que desean mejorar la interacción con sus clientes. Este plugin agrega un botón estratégicamente ubicado en las páginas de los productos de WooCommerce, permitiendo a los usuarios enviar consultas directas a través de WhatsApp. Simplifica la comunicación y ayuda a cerrar ventas rápidamente al ofrecer respuestas inmediatas sobre disponibilidad, precios y detalles del producto.', 'woocommerce-whatsapp-inquiry'); ?></p>
        <form method="post" action="options.php">
            <?php settings_fields('wwi_settings_group'); ?>
            <?php do_settings_sections('wwi_settings_group'); ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row"><?php _e('Habilitar botón', 'woocommerce-whatsapp-inquiry'); ?></th>
                    <td><input type="checkbox" name="wwi_enable_button" value="1" <?php checked(1, get_option('wwi_enable_button'), true); ?> /></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><?php _e('Número de WhatsApp', 'woocommerce-whatsapp-inquiry'); ?></th>
                    <td><input type="text" style="width: 100%;" name="wwi_whatsapp_number" value="<?php echo esc_attr(get_option('wwi_whatsapp_number')); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><?php _e('Texto del botón', 'woocommerce-whatsapp-inquiry'); ?></th>
                    <td><input type="text" style="width: 100%;" name="wwi_button_text" value="<?php echo esc_attr(get_option('wwi_button_text', 'Compra por WhatsApp')); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row"><?php _e('Mensaje predeterminado', 'woocommerce-whatsapp-inquiry'); ?></th>
                    <td><textarea style="width: 100%;" name="wwi_default_message"><?php echo esc_attr(get_option('wwi_default_message', 'Me interesa el siguiente producto, ¿se encuentra disponible?')); ?></textarea></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}
?>
