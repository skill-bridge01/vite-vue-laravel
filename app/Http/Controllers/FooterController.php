<?php

namespace App\Http\Controllers;

use App\Models\CmsPage;
use App\Models\Seo;
use App\Models\CmsPublishedPage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class FooterController extends Controller
{
    public function index():array
    {
        $slug='cms-footer';
        $slugId=CmsPublishedPage::where('slug', $slug)->first();
        if($slugId){
            $publishedData=CmsPublishedPage::where('parent_id', $slugId->id)->where('is_visible', 1)->get();
            $pageIds = $publishedData->pluck('page_id');
            if($publishedData->isNotEmpty()){
                $footer = CmsPage::whereIn('id', $pageIds)->get();
                $seoItems=Seo::where('model_type', 'App\Models\CmsPage')->whereIn('model_id', $pageIds)->get();
                $seoMap = $seoItems->keyBy('model_id');

                foreach ($footer as $footer) {
                    $footer->seo = $seoMap[$footer->id] ?? null;
                }
                return ['footer' => $footer,'success' => 1, 'message' => 'Footer fetched successfully.'];
            } else {
                return ['success' => 0, 'message' => 'There are no published Footer'];
            }
            
        } else {
            return ['success' => 0, 'message' => 'There are no published Footer'];
        }
    }
}
