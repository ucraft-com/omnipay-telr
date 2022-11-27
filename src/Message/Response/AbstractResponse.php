<?php

declare(strict_types = 1);

namespace Omnipay\Telr\Message\Response;

use Omnipay\Common\Message\AbstractResponse as BaseAbstractResponse;
use Omnipay\Common\Message\RequestInterface;

abstract class AbstractResponse extends BaseAbstractResponse
{
    /** Transaction captured, SALE transaction, not placed on hold */
    public const PAID = 3;

    /** Transaction not captured, such as an AUTH transaction or a SALE transaction which has been placed on hold */
    public const AUTHORISED = 2;

    /** Pending transaction  */
    public const PENDING = 1;

    /**
     * @param \Omnipay\Common\Message\RequestInterface $request
     * @param                                          $data
     *
     * @throws \JsonException
     */
    public function __construct(RequestInterface $request, $data)
    {
        parent::__construct($request, json_decode($data, true, 512, JSON_THROW_ON_ERROR));
    }
}
