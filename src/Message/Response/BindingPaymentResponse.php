<?php

declare(strict_types = 1);

namespace Omnipay\Telr\Message\Response;

use Omnipay\Common\Message\AbstractResponse as BaseAbstractResponse;

/**
 * Class BindingPaymentResponse
 *
 * @method BindingPaymentResponse getRequest()
 *
 * @package Omnipay\Telr\Message\Response
 */
class BindingPaymentResponse extends BaseAbstractResponse
{
    /** Authorised success status code  */
    public const AUTH_STATUS_SUCCESS = 'A';

    /**
     * @inheritDoc
     */
    public function isSuccessful() : bool
    {
        return $this->getStatus() === self::AUTH_STATUS_SUCCESS;
    }

    /**
     * @inheritDoc
     */
    public function getMessage() : string
    {
        return $this->data['auth_message'];
    }

    /**
     * Get response status code.
     *
     * @return string
     */
    public function getStatus() : string
    {
        return $this->data['auth_status'];
    }

    /**
     * @inheritDoc
     */
    public function getTransactionReference() : ?string
    {
        return $this->data['auth_tranref'] ?? null;
    }
}
