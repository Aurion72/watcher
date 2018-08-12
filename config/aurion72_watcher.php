<?php

return [
    'ignored_statuses' => [
        422, 404, 403
    ],

    'ignored_exceptions' => [
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Symfony\Component\HttpKernel\Exception\NotFoundHttpException::class
    ],


    'enabled' => env('AURION_WATCHER_ENABLED',1),
    'access_token' => '',
    'project_id' => '',
    'watch_url' => '',
];
