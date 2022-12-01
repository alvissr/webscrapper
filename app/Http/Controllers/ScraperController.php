<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;
use Illuminate\Goutte\DomCrawler\Crawler;

class ScraperController extends Controller
{
    // Other code
    public function index()
{
    $client = new Client();
    
    $website = $client->request('GET', 'https://www.numbeo.com/cost-of-living/region_rankings.jsp?title=2022-mid&region=150');
    
    return $website->html();

    $crawler = $crawler
    ->filter('body > p')
    ->reduce(function (Crawler $node, $i) {
        // filters every other node
        return ($i % 2) == 0;
    });
}
}



