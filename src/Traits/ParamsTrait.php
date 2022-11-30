<?php

declare(strict_types = 1);

namespace Omnipay\Telr\Traits;

trait ParamsTrait
{
    /**
     * Get the ivp frame version.
     *
     * @return int
     */
    public function getIvpFrame() : int
    {
        return (int) $this->getParameter('ivp_framed');
    }

    /**
     * Set the ivp frame version.
     *
     * @param int $value
     *
     * @return $this
     */
    public function setIvpFrame(int $value) : static
    {
        return $this->setParameter('ivp_framed', $value);
    }

    /**
     * Get the ivp method.
     *
     * @return string
     */
    public function getIvpMethod() : string
    {
        return $this->getParameter('ivp_method');
    }

    /**
     * Set the ivp method.
     *
     * @param string $value
     *
     * @return $this
     */
    public function setIvpMethod(string $value) : static
    {
        return $this->setParameter('ivp_method', $value);
    }

    /**
     * Get the ivp description.
     */
    public function getIvpDescription()
    {
        return $this->getParameter('ivp_desc');
    }

    /**
     * Set the ivp description.
     *
     * @return $this
     */
    public function setIvpDescription($value) : static
    {
        return $this->setParameter('ivp_desc', $value);
    }

    /**
     * Get the ivp cart.
     *
     * @return string
     */
    public function getIvpCart() : string
    {
        return (string) $this->getParameter('ivp_cart');
    }

    /**
     * Set the ivp cart.
     *
     * @param string $value
     *
     * @return $this
     */
    public function setIvpCart(string $value) : static
    {
        return $this->setParameter('ivp_cart', $value);
    }

    /**
     * Get the ivp currency.
     *
     * @return string
     */
    public function getIvpCurrency() : string
    {
        return $this->getParameter('ivp_currency');
    }

    /**
     * Set the ivp currency.
     *
     * @param string $value
     *
     * @return $this
     */
    public function setIvpCurrency(string $value) : static
    {
        return $this->setParameter('ivp_currency', $value);
    }

    /**
     * Get the ivp amount.
     *
     * @return float
     */
    public function getIvpAmount() : float
    {
        return (float) $this->getParameter('ivp_amount');
    }

    /**
     * Set the ivp amount.
     *
     * @param float $value
     *
     * @return $this
     */
    public function setIvpAmount(float $value) : static
    {
        return $this->setParameter('ivp_amount', $value);
    }

    /**
     * Get the ivp test.
     *
     * @return int
     */
    public function getIvpTest() : int
    {
        return (int) $this->getParameter('ivp_test');
    }

    /**
     * Set the ivp test.
     *
     * @param int $value
     *
     * @return $this
     */
    public function setIvpTest(int $value) : static
    {
        return $this->setParameter('ivp_test', $value);
    }

    /**
     * Get the url to redirect customer if the transaction is authorised.
     *
     * @return string
     */
    public function getSuccessUrl() : string
    {
        return $this->getParameter('return_auth');
    }

    /**
     * Set the url to redirect customer if the transaction is authorised.
     *
     * @param string $value
     *
     * @return $this
     */
    public function setSuccessUrl(string $value) : static
    {
        return $this->setParameter('return_auth', $value);
    }

    /**
     * Get the url to redirect customer if the transaction is declined.
     *
     * @return string
     */
    public function getDeclinedUrl() : string
    {
        return $this->getParameter('return_decl');
    }

    /**
     * Set the url to redirect customer if the transaction is declined.
     *
     * @param string $value
     *
     * @return $this
     */
    public function setDeclinedUrl(string $value) : static
    {
        return $this->setParameter('return_decl', $value);
    }

    /**
     * Get the url to redirect customer if the transaction is cancelled.
     *
     * @return string
     */
    public function getCancelUrl() : string
    {
        return $this->getParameter('return_can');
    }

    /**
     * Set the url to redirect customer if the transaction is cancelled.
     *
     * @inheritDoc
     */
    public function setCancelUrl($value) : static
    {
        return $this->setParameter('return_can', $value);
    }

    /**
     * Get the title of the billing user.
     *
     * @return string|null
     */
    public function getBillingTitle() : ?string
    {
        return $this->getParameter('bill_title');
    }

    /**
     * Set the title of the billing user.
     *
     * @param string|null $value
     *
     * @return $this
     */
    public function setBillingTitle(?string $value) : static
    {
        return $this->setParameter('bill_title', $value);
    }

    /**
     * Get the first name of the billing user.
     *
     * @return string|null
     */
    public function getBillingFirstName() : ?string
    {
        return $this->getParameter('bill_fname');
    }

    /**
     * Set the first name of the billing user.
     *
     * @param string|null $value
     *
     * @return $this
     */
    public function setBillingFirstName(?string $value) : static
    {
        return $this->setParameter('bill_fname', $value);
    }

    /**
     * Get the surname of the billing user.
     *
     * @return string|null
     */
    public function getBillingSurname() : ?string
    {
        return $this->getParameter('bill_sname');
    }

    /**
     * Set the surname of the billing user.
     *
     * @param string|null $value
     *
     * @return $this
     */
    public function setBillingSurname(?string $value) : static
    {
        return $this->setParameter('bill_sname', $value);
    }

    /**
     * Get the email of the billing user.
     *
     * @return string|null
     */
    public function getBillingEmail() : ?string
    {
        return $this->getParameter('bill_email');
    }

    /**
     * Set the email of the billing user.
     *
     * @param string|null $value
     *
     * @return $this
     */
    public function setBillingEmail(?string $value) : static
    {
        return $this->setParameter('bill_email', $value);
    }

    /**
     * Get the address of the billing user.
     *
     * @return string|null
     */
    public function getBillingAddress1() : ?string
    {
        return $this->getParameter('bill_addr1');
    }

    /**
     * Set the address of the billing user.
     *
     * @param string|null $value
     *
     * @return $this
     */
    public function setBillingAddress1(?string $value) : static
    {
        return $this->setParameter('bill_addr1', $value);
    }

    /**
     * Get the city of the billing user.
     *
     * @return string|null
     */
    public function getBillingCity() : ?string
    {
        return $this->getParameter('bill_city');
    }

    /**
     * Set the city of the billing user.
     *
     * @param string|null $value
     *
     * @return $this
     */
    public function setBillingCity(?string $value) : static
    {
        return $this->setParameter('bill_city', $value);
    }

    /**
     * Get the country of the billing user.
     *
     * @return string|null
     */
    public function getBillingCountry() : ?string
    {
        return $this->getParameter('bill_country');
    }

    /**
     * Set the country of the billing user.
     *
     * @param string|null $value
     *
     * @return $this
     */
    public function setBillingCountry(?string $value) : static
    {
        return $this->setParameter('bill_country', $value);
    }

    /**
     * @inheritDoc
     */
    public function getTransactionReference()
    {
        return $this->getParameter('order_ref');
    }

    /**
     * Set transaction reference.
     *
     * @param $value
     *
     * @return $this
     */
    public function setTransactionReference($value) : static
    {
        return $this->setParameter('order_ref', $value);
    }

    /**
     * Get authorised transaction reference.
     *
     * @return string
     */
    public function getAuthorisedTransactionReference() : string
    {
        return $this->getParameter('tran_ref');
    }

    /**
     * Set authorised transaction reference.
     *
     * @param string $value
     *
     * @return $this
     */
    public function setAuthorisedTransactionReference(string $value) : static
    {
        return $this->setParameter('tran_ref', $value);
    }

    /**
     * Get the type of the transaction.
     *
     * @return string
     */
    public function getIvpTranType() : string
    {
        return $this->getParameter('ivp_trantype');
    }

    /**
     * Set the type of the transaction.
     *
     * @param string $value
     *
     * @return $this
     */
    public function setIvpTranType(string $value) : static
    {
        return $this->setParameter('ivp_trantype', $value);
    }

    /**
     * @return string
     */
    public function getIvpTranClass() : string
    {
        return $this->getParameter('ivp_tranclass');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setIvpTranClass(string $value) : static
    {
        return $this->setParameter('ivp_tranclass', $value);
    }
}
