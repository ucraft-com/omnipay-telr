<?php

declare(strict_types = 1);

namespace Omnipay\Telr\Message\Request;

use GuzzleHttp\Client;
use Omnipay\Telr\Message\Response\BindingPaymentResponse;
use Omnipay\Telr\Traits\AuthParamsTrait;
use Omnipay\Telr\Traits\ParamsTrait;
use Throwable;

/**
 * @package Omnipay\Telr\Message\Request
 *
 * @method BindingPaymentResponse send
 */
class BindingPaymentRequest extends AbstractRequest
{
    use ParamsTrait, AuthParamsTrait;

    /**
     * Get the endpoint for the binding.
     */
    protected function getEndpoint() : string
    {
        return 'https://secure.telr.com/gateway/remote.html';
    }

    /**
     * @inheritDoc
     */
    public function getData()
    {
        $this->validate(
            'ivp_store',
            'ivp_authkey',
            'ivp_trantype',
            'ivp_tranclass',
            'ivp_currency',
            'ivp_amount',
            'tran_ref',
        );

        $data = [];
        $data['ivp_store'] = $this->getIvpStore();
        $data['ivp_authkey'] = $this->getIvpAuthKey();
        $data['ivp_cart'] = $this->getIvpCart();
        $data['ivp_trantype'] = $this->getIvPTranType();
        $data['ivp_tranclass'] = $this->getIvPTranClass();
        $data['ivp_currency'] = $this->getIvpCurrency();
        $data['ivp_amount'] = $this->getIvpAmount();
        $data['ivp_firstRef'] = $this->getBindingId();
        $data['ivp_test'] = '1';

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function sendData($data)
    {
        try {
            $client = new Client();

            $httpResponse = $client->post($this->getEndpoint(), [
                'form_params' => [
                    ...$data
                ],
                'headers'     => [
                    'Accept'       => 'application/json',
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ],
            ]);

            return $this->response = new BindingPaymentResponse($this, $httpResponse->getBody()->getContents());
        } catch (Throwable $ex) {
            return new BindingPaymentResponse($this, ['message' => $ex->getMessage(), 'code' => (string) $ex->getCode()]);
        }
    }
}
