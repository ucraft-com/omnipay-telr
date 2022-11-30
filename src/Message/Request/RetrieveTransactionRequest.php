<?php

declare(strict_types = 1);

namespace Omnipay\Telr\Message\Request;

use Omnipay\Telr\Message\Response\RetrieveTransactionResponse;
use Omnipay\Telr\Traits\AuthParamsTrait;
use Omnipay\Telr\Traits\ParamsTrait;
use Throwable;

/**
 * Class RetrieveTransactionRequest
 *
 * @method RetrieveTransactionResponse send()
 *
 * @package Omnipay\PayTabs\Message\Request
 */
class RetrieveTransactionRequest extends AbstractRequest
{
    use ParamsTrait, AuthParamsTrait;

    /**
     * @inheritDoc
     */
    public function getData()
    {
        $this->validate(
            'ivp_method',
            'ivp_store',
            'ivp_authkey',
            'order_ref',
        );

        $data = [];
        $data['ivp_method'] = $this->getIvpMethod();
        $data['ivp_store'] = $this->getIvpStore();
        $data['ivp_authkey'] = $this->getIvpAuthKey();
        $data['order_ref'] = $this->getTransactionReference();

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

            return $this->response = new RetrieveTransactionResponse($this, $httpResponse->getBody()->getContents());
        } catch (Throwable $ex) {
            return new RetrieveTransactionResponse($this, ['message' => $ex->getMessage(), 'code' => (string) $ex->getCode()]);
        }
    }
}
