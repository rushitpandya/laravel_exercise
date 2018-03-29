<?php

namespace BitCoin\Http\Controllers;

use BitCoin\Http\Requests;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use Kevinrob\GuzzleCache\CacheMiddleware;
use Kevinrob\GuzzleCache\Storage\Psr6CacheStorage;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Kevinrob\GuzzleCache\Strategy\PrivateCacheStrategy;
use Kevinrob\GuzzleCache\Strategy\GreedyCacheStrategy;
use DB;	
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$currencyInfo = $this->callCryptoApi("bitcoin", "USD");
		
		return view('welcome',[
		"bitcoin" => $currencyInfo,
		"currency" => "USD"
		]);
    }
	
	public function authenticated()
    {
		$currencyInfo = $this->callCryptoApi("bitcoin", "USD");
		DB::update('update users set lastvalue = ? where id = ?',[$currencyInfo["price_usd"],Auth::user()->id]);
		return view('welcome',[
		"bitcoin" => $currencyInfo,
		"currency" => "USD"
		]);
    }
	
	public function changecurrency(Request $request)
    {
		
		$currencyInfo = $this->callCryptoApi("bitcoin", $request->currency);
		return view('welcome',[
		"bitcoin" => $currencyInfo,
		"currency" => $request->currency		
		]);
    }
	
	private function callCryptoApi($currencyId, $convertCurrency)
	{
        // Create a new Guzzle Client
        $client = $this->getGuzzleFileCachedClient();

        // initialize the Request URL of the API with parameters
        $URL = "https://api.coinmarketcap.com/v1/ticker/$currencyId/?convert=$convertCurrency";

        // Operate the request
        $obj = $client->request('GET', $URL);
        
        // Obtain the JSON body into an array format.
        $jsonbody = json_decode($obj->getBody() , true)[0];

        // If there were some error on the request, throw the exception
        if(array_key_exists("error" , $jsonbody)){
            throw $this->createNotFoundException(sprintf('Currency Information Request Error: $s', $jsonbody["error"]));
        }

        // Returns the array with information about the desired currency
        return $jsonbody;

	}
	
	
	private function getGuzzleFileCachedClient()
	{
        // Create a HandlerStack
        $stack = HandlerStack::create();

        // 10 minutes to keep the cache
        $TTL = 600;

        // Retrieve the cache folder path of your Laravel Project
        $cacheFolderPath = base_path() . "/bootstrap";
        
        // Instantiate the cache storage: a PSR-6 file system cache with 
        // a default lifetime of 10 minutes (60 seconds).
        $cache_storage = new Psr6CacheStorage(
            new FilesystemAdapter(
                // Create Folder GuzzleFileCache inside the providen cache folder path
                'GuzzleFileCache',
                $TTL, 
                $cacheFolderPath
            )
        );
        
        // Add Cache Method
        $stack->push(
            new CacheMiddleware(
                new GreedyCacheStrategy(
                    $cache_storage,
                    600 // the TTL in seconds
                )
            ), 
            'greedy-cache'
        );
        
        // Initialize the client with the handler option and return it
        return new Client(['handler' => $stack]);
    }

}
