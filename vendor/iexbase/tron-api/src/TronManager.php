<?php
namespace IEXBase\TronAPI;


use IEXBase\TronAPI\Exception\TronException;
use IEXBase\TronAPI\Provider\{HttpProvider, HttpProviderInterface};

class TronManager
{
    /**
     * Default Nodes
     *
     * @var array
    */
    protected $defaultNodes = [
        'fullNode'  =>  'https://api.trongrid.io',
        'solidityNode'  =>  'https://api.trongrid.io',
        'eventServer'   =>  'https://api.trongrid.io'
    ];

    /**
     * Providers
     *
     * @var array
    */
    protected $providers = [
        'fullNode'  =>  [],
        'solidityNode' => [],
        'eventServer'   =>  []
    ];

    /**
     * Status Page
     *
     * @var array
    */
    protected $statusPage = [
        'fullNode'  =>  'wallet/getnowblock',
        'solidityNode'  =>  'walletsolidity/getnowblock',
        'eventServer'   =>  'healthcheck'
    ];

    /**
     * @param $tron
     * @param $providers
     * @throws Exception\TronException
     */
    public function __construct($tron, $providers)
    {
        $this->providers = $providers;

        foreach ($providers as $key => $value)
        {
            //Do not skip the supplier is empty
            if ($value == null)
            {
                $this->providers[$key] = new HttpProvider(
                    $this->defaultNodes[$key]
                );
            };

            if(is_string($providers[$key]))
                $this->providers[$key] = new HttpProvider($value);
            $this->providers[$key]->setStatusPage($this->statusPage[$key]);
        }
    }

    /**
     * List of providers
     *
     * @return array
     */
    public function getProviders() {
        return $this->providers;
    }

    /**
     * Full Node
     *
     * @throws TronException
     * @return HttpProviderInterface
     */
    public function fullNode() : HttpProviderInterface
    {
        if (!array_key_exists('fullNode', $this->providers)) {
            throw new TronException('Full node is not activated.');
        }

        return $this->providers['fullNode'];
    }

    /**
     * Solidity Node
     *
     * @throws TronException
     * @return HttpProviderInterface
     */
    public function solidityNode() : HttpProviderInterface
    {
        if (!array_key_exists('solidityNode', $this->providers)) {
            throw new TronException('Solidity node is not activated.');
        }

        return $this->providers['solidityNode'];
    }

    /**
     * Event server
     *
     * @throws TronException
     * @return HttpProviderInterface
     */
    public function eventServer(): HttpProviderInterface
    {
        if (!array_key_exists('eventServer', $this->providers)) {
            throw new TronException('Event server is not activated.');
        }

        return $this->providers['eventServer'];
    }

    /**
     * Basic query to nodes
     *
     * @param $url
     * @param $params
     * @param string $method
     * @return array
     * @throws TronException
     */
    public function request($url, $params = [], $method = 'post')
    {
        $split = explode('/', $url);
        if(in_array($split[0], ['walletsolidity', 'walletextension'])) {
            $response = $this->solidityNode()->request($url, $params, $method);
        } elseif(in_array($split[0], ['event'])) {
            $response = $this->eventServer()->request($url, $params, 'get');
        } else {
            $response = $this->fullNode()->request($url, $params, $method);
        }

        return $response;
    }

    /**
     * Check connections
     *
     * @return array
    */
    public function isConnected()
    {
        $array = [];
        foreach ($this->providers as $key => $value) {
            array_push($array, [
                $key => boolval($value->isConnected())
            ]);
        }

        return $array;
    }
}