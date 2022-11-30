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
     * @return string
     */
    public function getIvpStore() : string
    {
        return (string) $this->getParameter('ivp_store');
    }

    /**
     * Set merchant's store id.
     *
     * @param string $storeId
     *
     * @return $this
     */
    public function setIvpStore(string $storeId) : static
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

    /**
     * Get merchant's remote api auth key.
     *
     * @return string
     */
    public function getIvpRemoteApiAuthKey() : string
    {
        return $this->getParameter('ivp_remote_api_authkey');
    }

    /**
     * Set merchant's remote api auth key.
     *
     * @param string $remoteApiAuthKey
     *
     * @return $this
     */
    public function setIvpRemoteApiAuthKey(string $remoteApiAuthKey) : static
    {
        return $this->setParameter('ivp_remote_api_authkey', $remoteApiAuthKey);
    }
}
