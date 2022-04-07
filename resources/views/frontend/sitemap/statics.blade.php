<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($statics as $static)
        <url>
            <loc>http://164.138.210.158/~satelitek9/{{ $static }}</loc>
            <lastmod>{{ $startOfMonth }}</lastmod>
            <changefreq>{{ ( $static !== 'contacte-satelitek' && $static !== 'qui-som-satelitek' ) ? 'monthly' : 'yearly' }}</changefreq>
            <priority>0.9</priority>
        </url>
    @endforeach
</urlset>