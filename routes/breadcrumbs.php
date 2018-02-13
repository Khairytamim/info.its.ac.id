<?php

// Home
Breadcrumbs::register('menuIndex', function($breadcrumbs)
{
    $breadcrumbs->push('Menu', route('admin.menu.index'));
});

// Home > About
Breadcrumbs::register('menu', function($breadcrumbs, $menu)
{
    $breadcrumbs->parent('menuIndex');
    $breadcrumbs->push($menu->nama, route('admin.menu.subMenu.index', ['menu' => $menu->id]));
});

Breadcrumbs::register('subMenu', function($breadcrumbs, $subMenu)
{
    $breadcrumbs->parent('menu', $subMenu->menu);
    $breadcrumbs->push($subMenu->nama, route('admin.subMenu.index', ['subMenu' => $subMenu->id]));
});

Breadcrumbs::register('bannerIndex', function($breadcrumbs)
{
    $breadcrumbs->push('Banner', route('admin.banner.index'));
});

Breadcrumbs::register('bannerDetail', function($breadcrumbs, $banner)
{
    $breadcrumbs->parent('bannerIndex');
    $breadcrumbs->push($banner->header, route('admin.banner.detail', ['banner' => $banner->id]));
});
