<?php
namespace Buckaroo\WooCommerce\includes;
use WC_Payment_Gateway;

/**
 * @package Buckaroo
 */
class WC_Gateway_Buckaroo extends WC_Payment_Gateway
{
    public function __construct()
    {
        $this->has_fields         = true;
        $this->init_form_fields();
        $this->init_settings();
        $this->title       = $this->get_option('title');
        $this->description = $this->get_option('description');
    }

    /**
     * Return properly filter if exists or null
     *
     * @param $tag
     * @param $value
     * @return array | null
     */
    function apply_filter_or_error($tag, $value) {
        if (has_filter($tag)) {
            return apply_filters($tag, $value);
        }
        return null;
    }
}
