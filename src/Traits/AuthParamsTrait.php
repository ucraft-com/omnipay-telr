<?php

declare(strict_types = 1);

namespace Omnipay\Telr\Traits;

/**
 * The AuthParamsTrait trait defines the parameters required to create the gateway.
 */
trait AuthParamsTrait
{
    /**
     * Get merchant's store id.
     *
     * @return int
     */
    public function getIvpStore() : int
    {
        return $this->getParameter('ivp_store');
    }

    /**
     * Set merchant's store id.
     *
     * @param int $storeId
     *
     * @return $this
     */
    public function setIvpStore(int $storeId) : static
    {
        return $this->setParameter('ivp_store', $storeId);
    }

    /**
     * Get merchant's auth key.
     *
     * @return string
     */
    public function getIvpAuthKey() : string
    {
        return $this->getParameter('ivp_authkey');
    }

    /**
     * Set merchant's auth key.
     *
     * @param string $authKey
     *
     * @return $this
     */
    public function setIvpAuthKey(string $authKey) : static
    {
        return $this->setParameter('ivp_authkey', $authKey);
    }
}
