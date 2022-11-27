<?php

declare(strict_types = 1);

namespace Omnipay\Telr\Message\Response;

use Omnipay\Telr\Message\Request\PurchaseRequest;

/**
 * Class PurchaseResponse
 *
 * @method PurchaseRequest getRequest()
 *
 * @package Omnipay\Telr\Message\Response
 */
class BindingPaymentResponse extends AbstractResponse
{
    public function isSuccessful()
    {

    }
}
