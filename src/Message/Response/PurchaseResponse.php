<?php

declare(strict_types = 1);

namespace Omnipay\Telr\Message\Response;

use Omnipay\Telr\Message\Request\PurchaseRequest;
use Omnipay\Telr\Traits\ParamsTrait;

/**
 * Class PurchaseResponse
 *
 * @method PurchaseRequest getRequest()
 *
 * @package Omnipay\Telr\Message\Response
 */
class PurchaseResponse extends AbstractResponse
{
    use ParamsTrait;

    /**
     * @inheritDoc
     */
    public function isSuccessful() : bool
    {
        return !isset($this->data['error']);
    }

    /**
     * @inheritDoc
     */
    public function getRedirectUrl()
    {
        return $this->data['order']['url'] ?? null;
    }

    /**
     * @inheritDoc
     */
    public function getMessage()
    {
        if (isset($this->data['error'])) {
            return $this->data['error']['message'];
        }

        return null;
    }

    /**
     * @inheritDoc
     */
    public function getTransactionReference() : ?string
    {
        return $this->data['order']['ref'] ?? null;
    }
}
