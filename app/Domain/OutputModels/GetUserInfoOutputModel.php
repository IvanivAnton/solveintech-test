<?php

namespace App\Domain\OutputModels;

class GetUserInfoOutputModel
{
    private bool $isUserLogged;
    private string $loginUrl;
    private string $logoutUrl;
    private string $registerUrl;
    private string $regenerateTokenUrl;

    /**
     * @param bool $isUserLogged
     * @param string $loginUrl
     * @param string $logoutUrl
     * @param string $registerUrl
     * @param string $regenerateTokenUrl
     */
    public function __construct(bool $isUserLogged, string $loginUrl, string $logoutUrl, string $registerUrl, string $regenerateTokenUrl)
    {
        $this->isUserLogged = $isUserLogged;
        $this->loginUrl = $loginUrl;
        $this->logoutUrl = $logoutUrl;
        $this->registerUrl = $registerUrl;
        $this->regenerateTokenUrl = $regenerateTokenUrl;
    }

    /**
     * @return string
     */
    public function getLogoutUrl(): string
    {
        return $this->logoutUrl;
    }


    /**
     * @return string
     */
    public function getLoginUrl(): string
    {
        return $this->loginUrl;
    }

    /**
     * @return string
     */
    public function getRegisterUrl(): string
    {
        return $this->registerUrl;
    }

    /**
     * @return string
     */
    public function getRegenerateTokenUrl(): string
    {
        return $this->regenerateTokenUrl;
    }


    /**
     * @return bool
     */
    public function isUserLogged(): bool
    {
        return $this->isUserLogged;
    }
}
