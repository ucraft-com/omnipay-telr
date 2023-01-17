<?php

declare(strict_types = 1);

namespace Omnipay\Telr\Message\Request;

use Omnipay\Telr\Message\Response\PurchaseResponse;
use Omnipay\Telr\Traits\AuthParamsTrait;
use Omnipay\Telr\Traits\ParamsTrait;
use Throwable;

/**
 * @method PurchaseResponse send()
 */
class PurchaseRequest extends AbstractRequest
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
            'ivp_desc',
            'ivp_cart',
            'ivp_currency',
            'ivp_amount',
            'return_auth',
            'return_decl',
            'return_can',
        );

        $data = [];
        $data['ivp_framed'] = $this->getIvpFrame();
        $data['ivp_method'] = $this->getIvpMethod();
        $data['ivp_store'] = $this->getIvpStore();
        $data['ivp_authkey'] = $this->getIvpAuthKey();
        $data['ivp_desc'] = $this->getIvpDescription();
        $data['ivp_cart'] = $this->getIvpCart();
        $data['ivp_currency'] = $this->getIvpCurrency();
        $data['ivp_amount'] = $this->getIvpAmount();
        $data['ivp_test'] = $this->getIvpTest();
        $data['return_auth'] = $this->getSuccessUrl();
        $data['return_decl'] = $this->getDeclinedUrl();
        $data['return_can'] = $this->getCancelUrl();
        $data['bill_title'] = $this->getBillingTitle();
        $data['bill_fname'] = $this->getBillingFirstName();
        $data['bill_sname'] = $this->getBillingSurname();
        $data['bill_email'] = $this->getBillingEmail();
        $data['bill_phone1'] = $this->getBillingPhone();
        $data['bill_addr1'] = $this->getBillingAddress1();
        $data['bill_city'] = $this->getBillingCity();
        $data['bill_country'] = $this->getBillingCountry();

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function sendData($data) : PurchaseResponse
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

            return $this->response = new PurchaseResponse($this, $httpResponse->getBody()->getContents());
        } catch (Throwable $ex) {
            return new PurchaseResponse($this, ['message' => $ex->getMessage(), 'code' => (string) $ex->getCode()]);
        }
    }
}
