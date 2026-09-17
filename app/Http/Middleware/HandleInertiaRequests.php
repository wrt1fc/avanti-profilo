<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /** Blade-шаблон, в который Inertia монтирует приложение. */
    protected $rootView = 'app';

    /**
     * Данные, общие для всех страниц кабинета: навигация, счётчик уведомлений, ссылка на поддержку.
     * Страничные данные передаются из контроллеров через Inertia::render().
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'nav' => [
                ['key' => 'home', 'label' => 'Home', 'icon' => 'home', 'href' => '/'],
                ['key' => 'documents', 'label' => 'Documenti', 'icon' => 'document', 'href' => '/documenti'],
                ['key' => 'profile', 'label' => 'Profilo', 'icon' => 'user', 'href' => '/profilo'],
            ],
            'notifications' => 4,
            'supportHref' => '/assistenza',
        ]);
    }
}
