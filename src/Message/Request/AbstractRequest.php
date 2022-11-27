<?php

declare(strict_types = 1);

namespace Omnipay\Telr\Message\Request;

use Omnipay\Common\Message\AbstractRequest as BaseAbstractRequest;

/**
 * Base class of all Request classes
 */
abstract class AbstractRequest extends BaseAbstractRequest
{
    /**
     * Get the endpoint.
     */
    protected function getEndpoint() : string
    {
        return 'https://secure.telr.com/gateway/order.json';
    }

    /**
     * Get HTTP Method.
     *
     * This is nearly always POST but can be over-ridden in subclasses.
     *
     * @return string
     */
    public function getHttpMethod() : string
    {
        return 'POST';
    }
}
