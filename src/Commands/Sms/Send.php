<?php namespace Dynmark\Commands\Sms;

use Dynmark\Commands\Command;

class Send extends Command {

    /**
     * Required params for the method
     * @var string
     */
    private $phone;
    private $from;
    private $text;

    /**
     * Optional params
     * @var string
     */
    private $validitymins;
    private $deliverystatusurl;
    private $clientreference;
    private $filtersetname;

    /**
     * Set the phone
     *
     * @param $phone
     * @return $this
     */
    public function setPhone($phone)
    {
        if (strpos($phone, '0') === 0) {
            $phone = '44' . substr($phone, 1);
        }

        $this->phone = $phone;
        return $this;
    }

    /**
     * Set the from name or number
     *
     * @param $from
     * @return $this
     */
    public function setFrom($from)
    {
        $this->from = $from;
        return $this;
    }

    /**
     * Set the text message
     *
     * @param $text
     * @return $this
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * Set a callback
     *
     * @param $url
     * @param null $clientReference
     * @return $this
     */
    public function setCallback($url, $clientReference = null)
    {
        $this->deliverystatusurl = $url;
        $this->clientreference = $clientReference;
        return $this;
    }

    /**
     * @param $minutes
     * @return $this
     */
    public function setValidForMinutes($minutes)
    {
        $this->validitymins = $minutes;
        return $this;
    }

    /**
     * @param $name
     * @return $this
     */
    public function setFilterName($name)
    {
        $this->filtersetname = $name;
        return $this;
    }

    /**
     * Get the payload for the command
     *
     * @return array
     */
    public function getPayload()
    {
        return [
            'to' => $this->phone,
            'from' => $this->from,
            'text' => $this->text,
            'validitymins' => $this->validitymins,
            'deliverystatusurl' => $this->deliverystatusurl,
            'clientreference' => $this->clientreference,
            'filtersetname' => $this->filtersetname
        ];
    }

    /**
     * Get the method for the command
     *
     * @return string
     */
    public function getMethod()
    {
        return 'SendMessage.ashx';
    }
}