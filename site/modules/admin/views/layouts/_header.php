<?php


?>

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top navbar-admin">
    <div class="container">
        <a class="navbar-brand btn-link" href="/admin/posts/"><i class="admin-logo"></i></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="divider"></li>
                <li class="nav-item">
                    <a class="nav-link dropdown-toggle" href="#" id="navbar-posts" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Posts
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbar-posts">
                        <a class="dropdown-item" href="/admin/posts/">All posts</a>
                        <a class="dropdown-item" href="/admin/categories/">Categories</a>
                        <a class="dropdown-item" href="/admin/tags/">Tags</a>
                        <a class="dropdown-item" href="/admin/authors/">Authors</a>
                    </div>
                </li>
                <li class="divider"></li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/pages/">Pages</a>
                </li>
                <li class="divider"></li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/files/">Files</a>
                </li>
                <li class="divider"></li>
                <li class="nav-item">
                    <a class="nav-link dropdown-toggle" href="#" id="navbar-appearance" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Appearance
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbar-appearance">
                        <a class="dropdown-item" href="/admin/ads/">Ads</a>
                        <a class="dropdown-item" href="/admin/menus/">Menus</a>
                    </div>
                </li>
                <li class="divider"></li>
                <li class="nav-item">
                    <a class="nav-link dropdown-toggle" href="#" id="navbar-settings" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Settings
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbar-settings">
                        <a class="dropdown-item" href="/admin/general/">General</a>
                        <a class="dropdown-item" href="/admin/options/">Options</a>
                        <a class="dropdown-item" href="/admin/users/">Users</a>
                        <a class="dropdown-item" href="/admin/sitemap/">Sitemap</a>
                    </div>
                </li>
            </ul>
            <div class="form-inline my-2 my-lg-0">
                <a class="nav-link btn-link" href="/admin/profile/"><?= Yii::$app->user->name ?></a>
                <a class="btn my-2 my-sm-0 fas fa-sign-out-alt btn-link" data-method="post" href="/admin/logout/"></a>
            </div>
        </div>
    </div>
</nav>