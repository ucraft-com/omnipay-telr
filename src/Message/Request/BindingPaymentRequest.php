<?php

declare(strict_types = 1);

namespace Omnipay\Telr\Message\Request;

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
            'ivp_remote_api_authkey',
            'ivp_trantype',
            'ivp_tranclass',
            'ivp_currency',
            'ivp_amount',
            'tran_ref',
            'testMode'
        );

        $data = [];
        $data['ivp_store'] = $this->getIvpStore();
        $data['ivp_authkey'] = $this->getIvpRemoteApiAuthKey();
        $data['ivp_trantype'] = $this->getIvpTranType();
        $data['ivp_tranclass'] = $this->getIvpTranClass();
        $data['ivp_currency'] = $this->getIvpCurrency();
        $data['ivp_amount'] = $this->getIvpAmount();
        $data['tran_ref'] = $this->getAuthorisedTransactionReference();
        $data['ivp_test'] = $this->getTestMode();

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function sendData($data)
    {
        try {
            $httpResponse = $this->httpClient->request(
                $this->getHttpMethod(),
                $this->getEndpoint(),
                [
                    'Accept'       => '*/*',
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ],
                http_build_query($data)
            );

            parse_str(trim($httpResponse->getBody()->getContents(), "\t\n\r\0\x0B"), $data);

            return $this->response = new BindingPaymentResponse($this, $data);
        } catch (Throwable $ex) {
            return new BindingPaymentResponse($this, ['message' => $ex->getMessage(), 'code' => (string) $ex->getCode()]);
        }
    }
}
