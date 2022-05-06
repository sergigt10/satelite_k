<?php
/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => false, // set false to total remove
            'titleBefore'  => false, // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'description'  => "Satélite K es una compañía discográfica independiente nacida en Barcelona, especializada en la producción, promoción y desarrollo de propuestas artísticas.", // set false to total remove
            'separator'    => ', ',
            'keywords'     => ['Satélite K', 'Sello Discográfico y Producción', 'Satelite K', 'Discográfica Barcelona', 'Discográfica independiente', 'Servicios musicales Barcelona', 'Compañia discográfica Barcelona'],
            'canonical'    => false, // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'robots'       => 'all', // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
            'norton'    => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => 'Satélite K, Discográfica Barcelona, Discográfica independiente', // set false to total remove
            'description' => "Satélite K es una compañía discográfica independiente nacida en Barcelona, especializada en la producción, promoción y desarrollo de propuestas artísticas.", // set false to total remove
            'url'         => null, // Set null for using Url::current(), set false to total remove
            'type'        => 'website',
            'site_name'   => 'Satélite K',
            'locale'      => 'es_ES',
            'images'      => ['https://www.satelitek.com/frontend/img/empresa2.jpg'],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            'card'        => 'summary',
            'title'       => 'Satélite K, Discográfica Barcelona, Discográfica independiente',
            'site'        => '@satelitek',
            'creator'     => '@satelitek',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'       => 'Satélite K, Discográfica Barcelona, Discográfica independiente', // set false to total remove
            'description' => 'Satélite K es una compañía discográfica independiente nacida en Barcelona, especializada en la producción, promoción y desarrollo de propuestas artísticas.', // set false to total remove
            'url'         => 'https://www.satelitek.com/', // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'type'        => 'WebPage',
            'images'      => ['https://www.satelitek.com/frontend/img/empresa2.jpg'],
        ],
    ],
];
