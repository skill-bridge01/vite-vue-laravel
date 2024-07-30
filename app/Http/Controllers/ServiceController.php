<?php

namespace App\Http\Controllers;

use App\Models\CmsPage;
use App\Models\Seo;
use App\Models\CmsPublishedPage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ServiceController extends Controller
{
    public function index():array
    {
        $slug='cms-service';
        $slugId=CmsPublishedPage::where('slug', $slug)->first();
        if($slugId){
            $publishedData=CmsPublishedPage::where('parent_id', $slugId->id)->where('is_visible', 1)->get();
            $pageIds = $publishedData->pluck('page_id');
            if($publishedData->isNotEmpty()){
                $services = CmsPage::whereIn('id', $pageIds)->get();
                $seoItems=Seo::where('model_type', 'App\Models\CmsPage')->whereIn('model_id', $pageIds)->get();
                $seoMap = $seoItems->keyBy('model_id');

                foreach ($services as $service) {
                    $service->seo = $seoMap[$service->id] ?? null;
                }
                return ['services' => $services,'success' => 1, 'message' => 'Services fetched successfully.'];
            } else {
                return ['success' => 0, 'message' => 'There are no published service'];
            }
            
        } else {
            return ['success' => 0, 'message' => 'There are no published service'];
        }
    }

    public function show(string $slug)
    {
        $pre_slug='cms-library';
        $pre_slugId=CmsPage::where('slug', $pre_slug)->first();
        if (!$pre_slugId) {
            return response()->json(['success' => 0, 'message' => 'Predefined slug not found.'], 404);
        }
        $library=CmsPage::where('parent_id', $pre_slugId->id)
                        ->where('slug', $slug)
                        ->first();
        $seoItems=Seo::where('model_type', 'App\Models\CmsPage')->where('model_id', $library->id)->first();
        $library->seo=$seoItems;
        if (!$library) {
            return response()->json(['success' => 0, 'message' => 'Library not found.'], 404);
        }
        // dd($library);
        return ['library' => $library,'success' => 1, 'message' => 'Library fetched successfully.'];
        
    }
}
