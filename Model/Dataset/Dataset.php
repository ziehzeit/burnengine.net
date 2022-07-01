<?php

namespace Ziehzeit\Burnengine\Model\Dataset;

class Dataset
{
    protected array $raw_content;
    protected string $user_type;
    protected string $user_ip_address;
    protected string $user_mac_address;

    /**
     * @return string
     */
    public function getUserType(): string
    {
        return $this->user_type;
    }

    /**
     * @param string $user_type
     */
    public function setUserType(string $user_type): void
    {
        $this->user_type = $user_type;
    }

    /**
     * @return string
     */
    public function getUserIpAddress(): string
    {
        return $this->user_ip_address;
    }

    /**
     * @param string $user_ip_address
     */
    public function setUserIpAddress(string $user_ip_address): void
    {
        $this->user_ip_address = $user_ip_address;
    }

    /**
     * @return string
     */
    public function getUserMacAddress(): string
    {
        return $this->user_mac_address;
    }

    /**
     * @param string $user_mac_address
     */
    public function setUserMacAddress(string $user_mac_address): void
    {
        $this->user_mac_address = $user_mac_address;
    }

    /**
     * @return array
     */
    public function getRawContent(): array
    {
        return $this->raw_content;
    }

    /**
     * @param array $raw_content
     */
    public function setRawContent(array $raw_content): void
    {
        $this->raw_content = $raw_content;
    }
}