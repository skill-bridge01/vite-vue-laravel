<?php

namespace App\Http\Controllers;

use App\Models\CmsPage;
use App\Models\Seo;
use App\Models\CmsPublishedPage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class FaqController extends Controller
{
    public function index():array
    {
        $slug='cms-faq';
        $slugId=CmsPublishedPage::where('slug', $slug)->first();
        if($slugId){
            $publishedData=CmsPublishedPage::where('parent_id', $slugId->id)->where('is_visible', 1)->get();
            $pageIds = $publishedData->pluck('page_id');
            if($publishedData->isNotEmpty()){
                $faqs = CmsPage::whereIn('id', $pageIds)->get();
                $seoItems=Seo::where('model_type', 'App\Models\CmsPage')->whereIn('model_id', $pageIds)->get();
                $seoMap = $seoItems->keyBy('model_id');

                foreach ($faqs as $faq) {
                    $faq->seo = $seoMap[$faq->id] ?? null;
                }
                return ['faq' => $faqs,'success' => 1, 'message' => 'Faq fetched successfully.'];
            } else {
                return ['success' => 0, 'message' => 'There are no published Faq'];
            }
            
        } else {
            return ['success' => 0, 'message' => 'There are no published faq'];
        }
    }
}
