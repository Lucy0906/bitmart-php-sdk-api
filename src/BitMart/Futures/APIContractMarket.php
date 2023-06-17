<?php


namespace BitMart\Futures;


use BitMart\Auth;
use BitMart\CloudConst;
use BitMart\Lib\CloudClient;
use BitMart\Lib\CloudConfig;

class APIContractMarket
{
    static $cloudClient;

    public function __construct(CloudConfig $cloudConfig)
    {
        self::$cloudClient = new CloudClient($cloudConfig);
    }


    // ----------- Public API

    /**
     * url: GET https://api-cloud.bitmart.com/contract/public/details
     * Get Contract Details
     * @param $symbol : Symbol of the contract(like BTCUSDT)
     * @return array: ([response] =>stdClass, [httpCode] => 200, [limit] =>stdClass)
     */
    public function getContractDetails($symbol): array
    {
        $params = [
            "symbol" => $symbol,
        ];
        return self::$cloudClient->request(CloudConst::API_CONTRACT_DETAILS_URL, CloudConst::GET, $params);
    }

    /**
     * url: GET https://api-cloud.bitmart.com/contract/public/depth
     * Get Market Depth
     * @param $symbol : Symbol of the contract(like BTCUSDT)
     * @return array: ([response] =>stdClass, [httpCode] => 200, [limit] =>stdClass)
     */
    public function getContractDepth($symbol): array
    {
        $params = [
            "symbol" => $symbol,
        ];
        return self::$cloudClient->request(CloudConst::API_CONTRACT_DEPTH_URL, CloudConst::GET, $params);
    }

    /**
     * url: GET https://api-cloud.bitmart.com/contract/public/open-interest
     * Get Futures Open Interest
     * @param $symbol : Symbol of the contract(like BTCUSDT)
     * @return array: ([response] =>stdClass, [httpCode] => 200, [limit] =>stdClass)
     */
    public function getContractOpenInterest($symbol): array
    {
        $params = [
            "symbol" => $symbol,
        ];
        return self::$cloudClient->request(CloudConst::API_CONTRACT_OPEN_INTEREST_URL, CloudConst::GET, $params);
    }

    /**
     * url: GET https://api-cloud.bitmart.com/contract/public/funding-rate
     * Get Current Funding Rate
     * @param $symbol : Symbol of the contract(like BTCUSDT)
     * @return array: ([response] =>stdClass, [httpCode] => 200, [limit] =>stdClass)
     */
    public function getContractFundingRate($symbol): array
    {
        $params = [
            "symbol" => $symbol,
        ];
        return self::$cloudClient->request(CloudConst::API_CONTRACT_FUNDING_RATE_URL, CloudConst::GET, $params);
    }

    /**
     * url: GET https://api-cloud.bitmart.com/contract/public/kline
     * Get K-line
     * @param $symbol : Symbol of the contract(like BTCUSDT)
     * @param $step : K-Line step, default is 1 minute. step: 1, 3, 5, 15, 30, 60, 120, 240, 360, 720, 1440, 4320, 10080
     * @param $startTime : Start time. Timestamps need to be in seconds
     * @param $endTime : End time. Timestamps need to be in seconds
     * @return array: ([response] =>stdClass, [httpCode] => 200, [limit] =>stdClass)
     */
    public function getContractKline($symbol, $step, $startTime, $endTime): array
    {
        $params = [
            "symbol" => $symbol,
            "step" => $step,
            "start_time" => $startTime,
            "end_time" => $endTime,
        ];
        return self::$cloudClient->request(CloudConst::API_CONTRACT_KLINE_URL, CloudConst::GET, $params);
    }

}