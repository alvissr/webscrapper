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
    $web_data = [];
    $web_data[] = $website
        ->filter('#t2 > tbody ')
        ->each(function ($node) {
            dd( $node->text());
            $sku = array();
            $sku[]  = explode(' ', $node->filter('tr')->text());
            // $title = trim($node->filter('.title a')->text());
            // $web_data[] =$sku;
            // var_dump($sku);
            return $sku;

    });
    DD($web_data);
}
}



