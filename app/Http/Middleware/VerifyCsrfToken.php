<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/admin/check-current-pwd','admin/update-section-status','admin/update-banner-status',
        'admin/update-ourProjects-status', 'admin/update-ourProjectsSlider-status','admin/update-video-status','admin/update-special-status',
        'admin/update-secondBanner-status','admin/update-aboutSlider-status','admin/update-sta-status','admin/update-motto-status',
        'admin/update-blog-status','admin/update-contactBanner-status','admin/update-contactBlock-status','admin/update-ourProjectsBanner-status',
        'admin/update-ourProjectsBlocks-status','admin/update-blogBanner-status', 'admin/update-projectFilter-status',
    ];
}
