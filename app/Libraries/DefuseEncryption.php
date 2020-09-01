<?php
namespace App\Libraries;

use Defuse\Crypto\Crypto;
use Config\App;

class DefuseEncryption
{

    private $key;

    public function __construct()
    {
        $config = new App();
        $this->key = $config->encryption_key;
    }

    public function encrypt($data)
    {
        return Crypto::encryptWithPassword($data, $this->key);
    }

    public function decrypt($data)
    {
        return Crypto::decryptWithPassword($data, $this->key);
    }
}
