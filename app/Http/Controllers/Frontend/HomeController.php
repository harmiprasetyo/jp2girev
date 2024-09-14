<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use App\Newsletter;
use App\Research;
use App\Opinion;
use App\Gallery;
use App\Multimedia;
use App\Banner;
use App\FactData;
use App\Iplan;
use App\Miscellaneous;
use App\NewsTicker;
use App\Report;



class HomeController extends Controller
{
    private $ctrl = "home";
    private $title = "Home";

    /**
     * Display index page
     *
     * @return \Illuminate\Http\Response
     */
    function index(Article $article, Gallery $gallery, Newsletter $newsletter, Research $research, Multimedia $multimedia, Opinion $opinion, Banner $banner, FactData $factdata, Iplan $iplan, Miscellaneous $miscellaneous, NewsTicker $newsticker, Report $reference)
    {
        // Get data
        $article_list = $article->getList('', 5, 1);
        $gallery_list = $gallery->getList('', 4, 1);
        $multimedia_list = $multimedia->getList('', 4, 1);
        $newsletter_list = $newsletter->getList('', 1);
        $research_list = $research->getList('', 1);
        $opinion_list = $opinion->getList('', 5);
        $banner_list = $banner->getList('', 4, 1);
        $factdata_list = $factdata->getList();
        $iplan_list = $iplan->getList('', 4, 1);
        $miscellaneous_list = $miscellaneous->getList('', 6, 1);
        $newsticker_list = $newsticker->getList(1, 3);
        $reference_list = $reference->getList('', 6);

        // Set data
        $data['content_view'] = "frontend.$this->ctrl.index";
        $data['page_title'] = $this->title;
        $data['menu'] = 'home';
        $data['ctrl'] = 'home';
        $data['article_list'] = $article_list;
        $data['gallery_list'] = $gallery_list;
        $data['multimedia_list'] = $multimedia_list;
        $data['newsletter_list'] = $newsletter_list;
        $data['research_list'] = $research_list;
        $data['opinion_list'] = $opinion_list;
        $data['banner_list'] = $banner_list;
        $data['factdata_list'] = $factdata_list;
        $data['iplan_list'] = $iplan_list;
        $data['miscellaneous_list'] = $miscellaneous_list;
        $data['newsticker_list'] = $newsticker_list;
        $data['reference_list'] = $reference_list;

        // Load view
        return view($data['content_view'], $data);
    }
}
