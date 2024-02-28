<?php

namespace Buckaroo\WooCommerce\includes;

class WC_Gateway_Buckaroo_Ideal extends WC_Gateway_Buckaroo
{
    public function __construct()
    {
        $this->id = 'buckaroo_ideal';
        $this->title = 'iDEAL';
        $this->has_fields   = true;
        $this->method_title = "Buckaroo iDEAL";
        $this->method_description = 'Description of Misha payment gateway';
        $this->supports = array(
            'products'
        );
        // Method with all the options fields
        $this->init_form_fields();

        $this->init_settings();
        $this->title = $this->get_option( 'title' );
        $this->description = $this->get_option( 'description' );
        $this->enabled = $this->get_option( 'enabled' );

        parent::__construct();
//        $this->addRefundSupport();
        apply_filters('buckaroo_init_payment_class', $this);
    }

    /**
     * Process payment
     *
     * @param integer $order_id
     * @return callable fn_buckaroo_process_response()
     */
    function process_payment($order_id)
    {

    }
}