<?php

declare(strict_types = 1);

namespace Omnipay\Telr;

use Omnipay\Common\AbstractGateway;
use Omnipay\Common\Message\NotificationInterface;
use Omnipay\Common\Message\RequestInterface;
use Omnipay\Telr\Message\Request\BindingPaymentRequest;
use Omnipay\Telr\Message\Request\PurchaseRequest;
use Omnipay\Telr\Message\Request\RetrieveTransactionRequest;
use Omnipay\Telr\Traits\AuthParamsTrait;

/**
 * Telr Gateway.
 *
 * @method NotificationInterface acceptNotification(array $options = array())
 * @method RequestInterface authorize(array $options = array())
 * @method RequestInterface completeAuthorize(array $options = array())
 * @method RequestInterface capture(array $options = array())
 * @method RequestInterface refund(array $options = array())
 * @method RequestInterface fetchTransaction(array $options = [])
 * @method RequestInterface void(array $options = array())
 * @method RequestInterface createCard(array $options = array())
 * @method RequestInterface updateCard(array $options = array())
 * @method RequestInterface deleteCard(array $options = array())
 *
 * @package Omnipay\Telr
 */
class Gateway extends AbstractGateway
{
    use AuthParamsTrait;

    /**
     * Gateway name.
     *
     * @const string NAME
     */
    public const NAME = 'Telr';

    /**
     * @inheritDoc
     */
    public function getName() : string
    {
        return self::NAME;
    }

    /**
     * @inheritDoc
     */
    public function purchase(array $options = []) : RequestInterface
    {
        return $this->createRequest(PurchaseRequest::class, $options);
    }

    /**
     * Retrieve the transaction.
     *
     * @param array $options
     *
     * @return \Omnipay\Common\Message\RequestInterface
     */
    public function retrieveTransaction(array $options = []) : RequestInterface
    {
        return $this->createRequest(RetrieveTransactionRequest::class, $options);
    }

    /**
     * @param array $parameters
     *
     * @return \Omnipay\Common\Message\RequestInterface
     */
    public function bindingPayment(array $parameters = []) : RequestInterface
    {
        return $this->createRequest(BindingPaymentRequest::class, $parameters);
    }
}
