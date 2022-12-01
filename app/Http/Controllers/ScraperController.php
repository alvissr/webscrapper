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
    $crawler = new Client();
    
    $website = $crawler->request('GET', 'https://www.numbeo.com/cost-of-living/region_rankings.jsp?title=2022-mid&region=150');
    
    // return $website->html();

    $crawler = $website
        ->filter('table > #t2')
        ->reduce(function (Crawler $node, $i) {
            // filters every other node
            return ($i % 2) == 0;

    });
    DD($crawler);
}
}



