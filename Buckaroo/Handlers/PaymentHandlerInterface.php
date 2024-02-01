<?php

namespace Buckaroo\Handlers;

use Buckaroo\Transaction\Response\TransactionResponse;

interface PaymentHandlerInterface {

	public function getPayload(): array;
	public function handleResponse( TransactionResponse $response);

	/**
	 * Get payment action (pay, payEncripted, authorize, capture, etc)
	 */
	public function getAction(): string;
}
