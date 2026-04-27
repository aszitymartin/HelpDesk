<?php

use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('dashboard.index', function (BreadcrumbTrail $trail): void {
    $trail->push(__('sidenav.dashboard'), route('dashboard.index'));
});

// Breadcrumbs::for('projects.index', function ($trail) {
//     $trail->parent('dashboard.index');
//     $trail->push('Projects', route('projects.index'));
// });