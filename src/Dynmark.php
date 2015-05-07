<?php namespace Dynmark;

use Dynmark\Commands\Sms\Send;
use Dynmark\Commands\Command;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Message\Response;

class Dynmark {

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $endpoint;

    /**
     * @var Client
     */
    private $client;

    /**
     * Init with the username and password
     *
     * @param $username string
     * @param $password string
     * @param $endpoint string
     */
    public function __construct($username, $password, $endpoint = 'https://services.dynmark.com/HttpServices/')
    {
        $this->username = $username;
        $this->password = $password;
        $this->endpoint = $endpoint;
    }

    /**
     * Get the client
     *
     * @return Client
     */
    public function getClient()
    {
        if (! $this->client) {
            $this->client = new Client();
        }

        return $this->client;
    }

    /**
     * Set the Client
     *
     * @param Client $client
     * @return $this
     */
    public function setClient(Client $client)
    {
        $this->client = $client;
        return $this;
    }

    /**
     * Execute command
     *
     * @param string $command
     * @return mixed
     */
    public function fire(Command $command)
    {
        $payload = $command->getPayload();
        $url = $this->endpoint . $command->getMethod();

        $payload['user'] = $this->username;
        $payload['password'] = $this->password;

        return $this->getClient()
            ->post($url, ['body' => $payload]);
    }
}