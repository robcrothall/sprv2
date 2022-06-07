<!DOCTYPE html>
<html>

<head>
  </head>
  <body>
<?php
/**
 * Sample File 3, phpDocumentor Quickstart
 * 
 * This file demonstrates the use of the @name tag
 * 
 * @category Template
 * @package  Sample
 * @author   "Rob Crothall" <rob@crothall.co.za>
 * @license  GPL 1.0 or later
 * @version  GIT: <git_id>
 * @link     http://www.sprv.co.za
 * @PHP      7.1
 */
require "../inc/config.php"; 
    $_SESSION["module"] = $_SERVER["PHP_SELF"];
    //if ($_SERVER["REQUEST_METHOD"] == "POST")
    //{

/**
 * Undocumented function
 *
 * @return void
 * public function getentry()
 */
function getentry()
{
    $startdate = intval(\Carbon\Carbon::parse('2020-06-17 13:00')->getPreciseTimestamp(3));
    $enddate = intval(\Carbon\Carbon::parse('2020-06-17 15:00')->getPreciseTimestamp(3));
    $items = array();
    $data = $this->get($startdate, $enddate);
    $items = array_merge($items, $data->entries);
    while (count($data->entries) <= 100) {
        if (isset($data->nextPageToken)) {
            $nextpagetoken = $data->nextPageToken;
            $data = $this->get($startdate, $enddate, $nextpagetoken);
            $items = array_merge($items, $data->entries);
        }
    };
    $items = json_decode(json_encode($items, true));
    return $items;
}
/**
 * Undocumented function
 *
 * @param [type] $queryName
 * @param [type] $queryValue
 *
 * @return void
 */
function setQuery($queryName, $queryValue)
{
        $this->options['query'][$queryName] = $queryValue;
}
/**
 * Undocumented function
 *
 * @param [type] $startdate
 * @param [type] $enddate
 * @param [type] $nextPageToken
 * 
 * @return void
 */
function get($startdate = null, $enddate = null, $nextPageToken = null)
{
    $client = new \GuzzleHttp\Client(
        [
            'headers' => [
                'key' => "Od3EkTG4Ca2EcPLfJ7NmBX2ZQkIDx8BfH4sA9KrUq9CGlMB4Nc8C1IaKX8UzHp36",
                'Accept' => 'application/json',
                'cache-control' => 'no-cache',
            ],
        ]
    );
    $url = "https://api.atthegate.biz/integration/entries/list";
    $this->setQuery('startDate', $startdate);
    $this->setQuery('endDate', $enddate);
    $this->setQuery('nextPageToken', $nextPageToken);
    $this->request = $client->request('GET', $url, $this->options);
    $response = $this->request->getBody()->getContents();
    $data = json_decode(strip_tags($response));
    return $data;
}
var_dump(get_entry());
?>
  </body>
</html>
