<?php

declare(strict_types = 1);

namespace Omnipay\Telr\Message\Response;

use Omnipay\Telr\Message\Request\RetrieveTransactionRequest;

/**
 * Class RetrieveTransactionResponse
 *
 * @method RetrieveTransactionRequest getRequest()
 *
 * @package Omnipay\Telr\Message\Response
 */
class RetrieveTransactionResponse extends AbstractResponse
{
    /**
     * @inheritDoc
     */
    public function isSuccessful() : bool
    {
        if ($this->getCode()) {
            return $this->getCode() === self::PAID;
        }

        return false;
    }

    /**
     * @inheritDoc
     */
    public function getMessage() : ?string
    {
        if ($this->data['order']) {
            return $this->data['order']['status']['text'];
        }

        return $this->data['error']['message'];
    }

    /**
     * @inheritDoc
     */
    public function getCode() : ?int
    {
        if (isset($this->data['order'])) {
            return $this->data['order']['status']['code'];
        }

        return null;
    }

    /**
     * Get binding id of customer.
     *
     * @return string|null
     */
    public function getToken() : ?string
    {
        if (isset($this->data['order']['transaction'])) {
            return $this->data['order']['transaction']['ref'];
        }

        return null;
    }

    /**
     * Get last four numbers of the card.
     *
     * @return string|null
     */
    public function getLastFour() : ?string
    {
        if (isset($this->data['order']['card'])) {
            return $this->data['order']['card']['last4'];
        }

        return null;
    }

    /**
     * Get the scheme of the card.
     *
     * @return string|null
     */
    public function getCardScheme() : ?string
    {
        if (isset($this->data['order']['card'])) {
            return $this->data['order']['card']['type'];
        }

        return null;
    }

    /**
     * Get the order reference.
     *
     * @return string
     */
    public function getOrderReference() : string
    {
        return $this->data['order']['ref'];
    }
}
