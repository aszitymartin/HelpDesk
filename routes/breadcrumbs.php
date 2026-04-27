<?php

use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('dashboard.index', function (BreadcrumbTrail $trail): void {
    $trail->push('Dashboard', route('dashboard.index'));
});