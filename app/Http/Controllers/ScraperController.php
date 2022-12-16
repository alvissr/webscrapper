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
    $web_data =  array();
    $table = $website->filter('#t2 > tbody')->eq(0);
   
    $table->filter('tr')->each(function ($row) use (&$web_data) {
            // dd( $node->text());
            $rowData = array();
            $row->filter('td, th')->each(function($cell) use (&$rowData) {
                // add the cell text to the row data array
                $rowData[] = $cell->text();
            });
           
             $web_data[] = $rowData;
    });
    // dd($web_data);
    return view('scraper', $web_data);
}
}



