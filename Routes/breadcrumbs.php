<?php

// Home > Blog
Breadcrumbs::for('blog.admin.index', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Gestion du blog', route('blog.admin.index'));
});

// Home > Blog > Create post
Breadcrumbs::for('blog.admin.create', function ($trail) {
    $trail->parent('blog.admin.index');
    $trail->push("Création d'un article", route('blog.admin.create'));
});