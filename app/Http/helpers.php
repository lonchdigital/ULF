<?php

function removeSpaceString($str): string
{
    return preg_replace('/^\p{Z}+|\p{Z}+$/u', '', $str);
}

function removeNbspString($str): string
{
    return preg_replace('/&nbsp;[-—–]*/u', '', $str);
}

function cutSlug(string $slug): string
{
    return mb_substr($slug, 0, 250, 'UTF-8');
}

function trim_src(string|null $content): string
{
    if (!(bool) $content) {
        return '';
    }

    $replacement = '<img src="/storage/photos/';

    $content = str_replace('<img src="../../storage/photos/', $replacement, $content);
    $content = str_replace('<img src="../../../storage/photos/', $replacement, $content);

    return $content;
}

function trim_src_host(string|null $content): string
{
    if (!(bool) $content) {
        return '';
    }

    $replacement = '<img src="' . env('APP_URL') .'/storage/photos/';

    $content = str_replace('<img src="../../storage/photos/', $replacement, $content);
    $content = str_replace('<img src="../../../storage/photos/', $replacement, $content);

    return $content;
}

function replace_to_public(string|null $content): string
{
    if (!(bool) $content) {
        return '';
    }

    $replacement = '<img src="' . public_path('/') . 'storage/photos/';

    $content = str_replace('<img src="../../storage/photos/', $replacement, $content);
    $content = str_replace('<img src="../../../storage/photos/', $replacement, $content);

    return $content;
}

function userHasDemo(): bool
{
    return request()->user() && request()->user()->hasRole('demo');
}

function authCan(string $permission): bool
{
    return auth()->user() &&  auth()->user()->can($permission);
}

function authAdmin(): bool
{
    return auth()->guard('admin')->user() && auth()->guard('admin')->user()->hasRole('admin');
}

function checkAccess(\App\Models\Page $page, $permission): bool
{
    return authAdmin()
        || $page->getAttribute('is_available')
        || authCan($permission)
        || (auth()->check() && $page->getAttribute('is_user_available'));
}

function replace_custom_classes(string|null $content): string
{
    if (!(bool) $content) {
        return '';
    }

    $pa = '<p class="paragraph_a';
    $p2a = '<p class="paragraph_a2';
    $p3a = '<p class="paragraph_a3';

    $content = str_replace('<p class="a DocDefaults', $pa, $content);
    $content = str_replace('<p class="2 a DocDefaults', $p2a, $content);
    $content = str_replace('<p class="3 a DocDefaults', $p3a, $content);

    return $content;
}
