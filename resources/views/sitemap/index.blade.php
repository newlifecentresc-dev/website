<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    @foreach ($pages as $page)
        <url>
            <loc>{{ URL::to('/') }}/{{ $page['link'] }}</loc>
            <lastmod>{{ date('c',time()) }}</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.9</priority>
        </url>
    @endforeach

    @foreach (\App\Models\Page::where('status', 'active')->get(); as $item)
        <url>
            <loc>{{ URL::to('/') }}/{{ $item->slug }}</loc>
            <lastmod>{{ date('c',time()) }}</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.9</priority>
        </url>
    @endforeach

</urlset>
