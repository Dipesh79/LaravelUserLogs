<?php

return [
    /**
     * Log Viewer Theme | Options: bootstrap.
     */

    'theme' => 'bootstrap',

    /**
     * Pagination Count.
     */
    'pagination' => 10,

    /**
     * User Identifier from users table.
     */
    'user_identifier' => 'name',

    /**
     * Return page from log view page.
     */
    'return_page' => [
        /**
         * Route Type | Options: route, url.
         */
        'route_type' => 'url',
        /**
         * Route Name or URL.
         */
        'url' => '/'
    ]


];
