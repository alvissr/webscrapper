<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;

class ScraperController extends Controller
{
    // Other code
    public function index()
{
    $client = new Client();
    
    $website = $client->request('GET', 'https://www.numbeo.com/cost-of-living/region_rankings.jsp?title=2022-mid&region=150');
    
    return $website->html();
}
}
