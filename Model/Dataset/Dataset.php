<?php

namespace Ziehzeit\Burnengine\Model\Dataset;

use Exception;
use Ziehzeit\Burnengine\Model\Core;

class Dataset extends Core
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
     * @throws Exception
     */
    public function setUserType(string $user_type): void
    {
        preg_match_all('@^\d$@', $user_type, $matches);

        if ($matches[0]){
            $this->user_type = $user_type;
        }else{
            throw new Exception('Given value failed at '.__METHOD__.' !');
        }
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
     * @throws Exception
     */
    public function setUserIpAddress(string $user_ip_address): void
    {
        preg_match_all('@^(\d{1,3}\.){3}\d{1,3}$@', $user_ip_address, $matches);
        if ($matches){
            $this->user_ip_address = $user_ip_address;
        }else{
            throw new Exception('Given value failed at '.__METHOD__.' !');
        }
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
     * @throws Exception
     */
    public function setUserMacAddress(string $user_mac_address): void
    {
        preg_match_all('@^([\dA-Fa-f]{2}[:-]){5}([\dA-Fa-f]{2})$@', $user_mac_address, $matches);

        if ($matches){
            $this->user_mac_address = $user_mac_address;
        }else{
            throw new Exception('Given value failed at '.__METHOD__.' !');
        }
    }

    /**
     * @return array
     */
    public function getRawContent(): array
    {
        return $this->raw_content;
    }

    public function isToken(string $param):bool
    {
            return $this->assertSame(strtolower($param), 'token');
    }

    /**
     * @param array $raw_content
     */
    public function setRawContent(array $raw_content): void
    {
        $this->raw_content = $raw_content;
    }
}