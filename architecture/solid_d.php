<?php
interface HTTPRequestService {
    public function request(string $url, string $method, $options = null);
}
class XMLHTTPRequestService implements HTTPRequestService {

    public function request(string $url, string $method, $options = null)
    {
        // TODO: Implement request() method.
    }
}
class XMLHttpService extends XMLHTTPRequestService {
}

class Http {
    private HTTPRequestService $service;

    public function __construct(HTTPRequestService $service) {
        $this->service = $service;
    }

    public function get(string $url, array $options) {
        $this->service->request($url, 'GET', $options);
    }

    public function post(string $url) {
        $this->service->request($url, 'GET');
    }
}
