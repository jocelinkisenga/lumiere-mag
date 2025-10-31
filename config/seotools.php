<?php

/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'inertia' => env('SEO_TOOLS_INERTIA', false),

    'meta' => [
        'defaults' => [
            'title'        => "Lumiere du Monde Magazine",
            'titleBefore'  => false,
            'description'  => "Explorez, apprenez et inspirez-vous ! Lumiere du Monde Magazine vous éclaire sur l’actualité, la culture, la foi, l’entrepreneuriat et les histoires qui transforment l’Afrique. Un média congolais moderne pour les esprits curieux et éveillés.",
            'separator'    => ' - ',
            'keywords'     => [
                'Blog', 'Magazine', 'RDC', 'Congo', 'Lubumbashi', 'Kinshasa', 'actualités', 
                'culture', 'foi', 'entrepreneuriat', 'inspiration', 'jocelin kisenga', 
                'lumiere du monde', 'news', 'radio', 'Afrique', 'spiritualité'
            ],
            'canonical'    => null,
            'robots'       => 'index, follow',
        ],

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
        'defaults' => [
            'title'       => 'Lumiere du Monde Magazine',
            'description' => "Découvrez Lumiere du Monde Magazine : un média congolais qui informe, inspire et élève les consciences. Entre culture, foi, innovation et société, plongez dans des histoires vraies, des analyses profondes et des découvertes inspirantes.",
            'url'         => null,
            'type'        => 'website',
            'site_name'   => 'Lumiere du Monde Magazine',
            'images'      => [asset('Logo.jpg')],
        ],
    ],

    'twitter' => [
        'defaults' => [
            'card' => 'summary_large_image',
            'site' => '@lumieredumonde',
        ],
    ],

    'json-ld' => [
        'defaults' => [
            'title'       => 'Lumiere du Monde Magazine',
            'description' => "Lumiere du Monde Magazine : le média congolais qui éclaire l’Afrique à travers des articles de fond, des interviews exclusives et des analyses qui inspirent l’action et le changement.",
            'url'         => null,
            'type'        => 'WebPage',
            'images'      => [asset('Logo.jpg')],
        ],
    ],
];
