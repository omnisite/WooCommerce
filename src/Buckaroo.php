<?php

/**
 * Buckaroo
 *
 * @author    Buckaroo <plugins@buckaroo.nl>
 * @copyright 2022 Buckaroo
 * @license   MIT
 *
 * @see      https://buckaroo.nl
 */

namespace Buckaroo\WooCommerce;

use Inpsyde\Modularity\Module\ExecutableModule;
use Psr\Container\ContainerInterface;

class Buckaroo implements ExecutableModule
{
    /**
     * @var string
     */
    private string $baseFile;

    /**
     * @param $baseFile
     */
    public function __construct(string $baseFile)
    {
        $this->baseFile = $baseFile;
    }

    /**
     * @param ContainerInterface $container
     * @return bool
     */
    public function run(ContainerInterface $container): bool
    {
        return true;
    }

    /**
     * @return string
     */
    public function id(): string
    {
        return 'buckaroo_payments_for_woocommerce';
    }
}