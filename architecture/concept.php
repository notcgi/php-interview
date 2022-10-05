<?php
class Concept {
    private $client;

    public function __construct() {
        $this->client = new \GuzzleHttp\Client();
    }

    public function getUserData() {
        $params = [
            'auth' => ['user', 'pass'],
            'token' => $this->getSecretKey()
        ];

        $request = new \Request('GET', 'https://api.method', $params);
        $promise = $this->client->sendAsync($request)->then(function ($response) {
            $result = $response->getBody();
        });

        $promise->wait();
    }

    private function getSecretKey()
    {
        AbstractSecretKeyFactory::getFactory()->getKey();
    }
}
abstract class AbstractSecretKeyFactory {

    public static function getFactory() : AbstractSecretKeyFactory {
        return match (getenv('SECRET_KEY_SOURCE')) {
            'file' => new FileSecretKeyFactory(),
            'redis' => new RedisSecretKeyFactory(),
        };
    }

    abstract public function getKey();
}
class FileSecretKeyFactory extends AbstractSecretKeyFactory {

    public function getKey()
    {
        // TODO: Implement getKey() method.
    }
}
class RedisSecretKeyFactory extends AbstractSecretKeyFactory {

    public function getKey()
    {
        // TODO: Implement getKey() method.
    }
}