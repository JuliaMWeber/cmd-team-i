<?php
// Provide detailed information and depenencies of EXT:ns_theme_extend
$EM_CONF['ns_theme_extend'] = [
    'title' => '[NITSAN] TYPO3 Extended Child Theme',
    'description' => 'The child theme of EXT:ns_basetheme',
    'category' => 'templates',
    'author' => 'NITSAN Technologies Pvt Ltd',
    'author_email' => 'info@nitsan.in',
    'author_company' => 'NITSAN Technologies Pvt Ltd',
    'state' => 'stable',
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '8.0.0-10.9.99',
            'ns_basetheme' => '1.0.0-10.9.99',
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
    //'autoload' => array(
    //	'classmap' => array('Classes/'),
    //),
];
