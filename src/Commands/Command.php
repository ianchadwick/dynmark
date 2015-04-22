<?php namespace Dynmark\Commands;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Message\Response;

abstract class Command {

    /**
     * Default endpoint for the request
     * @var string
     */
    const DEFAULT_ENDPOINT = 'https://services.dynmark.com/HttpServices/';

    /**
     * Endpoint to use, can be overridden using setHttpEndpoint
     * @var string
     */
    private $endpoint = self::DEFAULT_ENDPOINT;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * Override the default endpoint
     *
     * @param string $endpoint
     * @return Commands
     */
    public function setHttpEndpoint($endpoint = self::DEFAULT_ENDPOINT)
    {
        $this->endpoint = $endpoint;
        return $this;
    }

    /**
     * Set the account details
     *
     * @param $username
     * @param $password
     */
    public function setCredentials($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * Run the command
     *
     * @return FutureResponse
     */
    public function fire()
    {
        $payload = $this->getPayload();
        $url = $this->endpoint . $this->getMethod();

        $payload['user'] = $this->username;
        $payload['password'] = $this->password;

        $client = new Client();
        $response = $client->post($url, ['body' => $payload]);
        return $response;
    }

    /**
     * Get the payload for the command
     *
     * @return array
     */
    abstract protected function getPayload();

    /**
     * Get the method for the command
     *
     * @return string
     */
    abstract protected function getMethod();
}