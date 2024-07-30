<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CmsPageTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cms_pages')->delete();
        
        \DB::table('cms_pages')->insert([
            [
                'slug' => 'cms-home',
                'title' => '{"en":"Home"}',
                // 'title' => json_encode(['en' => "Library", 'ar' => "مكتبة"]),
                'data' => NULL, // Ensure that having NULL here is intentional and acceptable in your application logic.
                'template' => '{"key":"App\\CmsPages\\Templates\\ContentType\\HomeIndex","name":"content_type.home_index"}',
                'page_type' => 'content_type',
                'parent_id' => NULL, // Same comment as above.
                'like' => NULL, // Ensure NULL is a valid and intentional value.
                'look' => NULL,
                'save' => NULL,
                'created_at' => '2024-07-11 10:02:28',
                'updated_at' => '2024-07-11 10:02:28',
            ],
            [
                'slug' => 'cms-service',
                'title' => '{"en":"Service"}',
                'data' => NULL, // Ensure that having NULL here is intentional and acceptable in your application logic.
                'template' => '{"key":"App\\CmsPages\\Templates\\ContentType\\ServiceIndex","name":"content_type.service_index"}',
                'page_type' => 'content_type',
                'parent_id' => NULL, // Same comment as above.
                'like' => NULL, // Ensure NULL is a valid and intentional value.
                'look' => NULL,
                'save' => NULL,
                'created_at' => '2024-07-11 10:02:28',
                'updated_at' => '2024-07-11 10:02:28',
            ],
            [
                'slug' => 'cms-library',
                'title' => '{"en":"Library"}',
                'data' => NULL, // Ensure that having NULL here is intentional and acceptable in your application logic.
                'template' => '{"key":"App\\CmsPages\\Templates\\ContentType\\LibraryIndex","name":"content_type.library_index"}',
                'page_type' => 'content_type',
                'parent_id' => NULL, // Same comment as above.
                'like' => NULL, // Ensure NULL is a valid and intentional value.
                'look' => NULL,
                'save' => NULL,
                'created_at' => '2024-07-11 10:02:28',
                'updated_at' => '2024-07-11 10:02:28',
            ],
            [
                'slug' => 'cms-article',
                'title' => '{"en":"Article"}',
                'data' => NULL,
                'template' => '{"key":"App\\CmsPages\\Templates\\ContentType\\ArticleIndex","name":"content_type.article_index"}',
                'page_type' => 'content_type',
                'parent_id' => NULL,
                'like' => NULL,
                'look' => NULL,
                'save' => NULL,
                'created_at' => '2024-07-11 10:02:28',
                'updated_at' => '2024-07-11 10:02:28',
            ],
            [
                'slug' => 'cms-faq',
                'title' => '{"en":"Faq"}',
                'data' => NULL,
                'template' => '{"key":"App\\CmsPages\\Templates\\ContentType\\FaqIndex","name":"content_type.faq_index"}',
                'page_type' => 'content_type',
                'parent_id' => NULL,
                'like' => NULL,
                'look' => NULL,
                'save' => NULL,
                'created_at' => '2024-07-11 10:02:28',
                'updated_at' => '2024-07-11 10:02:28',
            ],
            [
                'slug' => 'cms-about',
                'title' => '{"en":"About"}',
                'data' => NULL,
                'template' => '{"key":"App\\CmsPages\\Templates\\ContentType\\AboutIndex","name":"content_type.about_index"}',
                'page_type' => 'content_type',
                'parent_id' => NULL,
                'like' => NULL,
                'look' => NULL,
                'save' => NULL,
                'created_at' => '2024-07-11 10:02:28',
                'updated_at' => '2024-07-11 10:02:28',
            ],
            [
                'slug' => 'cms-contact',
                'title' => '{"en":"Contact"}',
                'data' => NULL,
                'template' => '{"key":"App\\CmsPages\\Templates\\ContentType\\ContactIndex","name":"content_type.contact_index"}',
                'page_type' => 'content_type',
                'parent_id' => NULL,
                'like' => NULL,
                'look' => NULL,
                'save' => NULL,
                'created_at' => '2024-07-11 10:02:28',
                'updated_at' => '2024-07-11 10:02:28',
            ],
            [
                'slug' => 'cms-homeabout',
                'title' => '{"en":"HomeAbout"}',
                'data' => NULL,
                'template' => '{"key":"App\\CmsPages\\Templates\\ContentType\\HomeAboutIndex","name":"content_type.homeabout_index"}',
                'page_type' => 'content_type',
                'parent_id' => NULL,
                'like' => NULL,
                'look' => NULL,
                'save' => NULL,
                'created_at' => '2024-07-11 10:02:28',
                'updated_at' => '2024-07-11 10:02:28',
            ],
            [
                'slug' => 'cms-footer',
                'title' => '{"en":"Footer"}',
                'data' => NULL,
                'template' => '{"key":"App\\CmsPages\\Templates\\ContentType\\FooterIndex","name":"content_type.footer_index"}',
                'page_type' => 'content_type',
                'parent_id' => NULL,
                'like' => NULL,
                'look' => NULL,
                'save' => NULL,
                'created_at' => '2024-07-11 10:02:28',
                'updated_at' => '2024-07-11 10:02:28',
            ],
            

        ]);
        
        
    }
}