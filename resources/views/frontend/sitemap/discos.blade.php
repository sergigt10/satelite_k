<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($discos as $disc)
        <url>
            <loc>https://www.satelitek.com/discos/{{ $disc->slug }}</loc>
            <lastmod>{{ $startOfMonth }}</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.9</priority>
        </url>
    @endforeach
</urlset>