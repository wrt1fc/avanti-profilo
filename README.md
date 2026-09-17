# Avanti — страница «Profilo» (Laravel + Vue 3)

Вёрстка экрана личного кабинета из Figma (`Profilo.svg` — десктоп 1440, `profilo-mobile.svg` — мобильная 390).
Один экран, адаптив от 320 до 1440+, всё разбито на переиспользуемые компоненты.

## Структура

```
app/Http/Controllers/ProfileController.php   — Inertia::render('avanti_profile_page', [...страничные данные])
app/Http/Middleware/HandleInertiaRequests.php — общие props для всех страниц (nav, notifications, supportHref)
routes/web.php                               — GET /profilo
resources/views/app.blade.php                — корневой шаблон Inertia (@inertia, @inertiaHead, @vite)
resources/css/app.css                        — дизайн-токены (цвета, радиусы, тени) + reset
resources/js/app.js                          — createInertiaApp, страницы резолвятся из resources/js/pages/
resources/js/composables/
    use_clipboard.js                         — копирование IBAN
    use_currency.js                          — формат «12 000 €»
resources/js/layouts/avanti_layout.vue       — шапка + контент + мобильная нижняя панель
resources/js/pages/avanti_profile_page.vue   — сама страница (сетка 2 колонки → 1 колонка)
resources/js/components/
    avanti_icon.vue                — набор SVG-иконок по имени
    avanti_button.vue              — primary / outline / ghost, размеры sm / md, ссылка или кнопка
    avanti_icon_button.vue         — кнопка-иконка (копировать, свернуть, колокольчик)
    avanti_badge.vue               — пилюля «3 / 5 completati» и красный счётчик
    avanti_avatar.vue              — фото или инициалы, индикатор «онлайн»
    avanti_logo.vue                — логотип Avanti
    avanti_card.vue                — белая карточка (две глубины тени)
    avanti_nav_link.vue            — пункт навигации (таб в шапке / колонка в нижней панели)
    avanti_header.vue              — шапка: десктоп (лого, табы, ASSISTENZA) и мобилка (лого, колокольчик, аватар)
    avanti_bottom_nav.vue          — фиксированная нижняя панель (только < 768px)
    avanti_breadcrumbs.vue         — «Piattaforma / Home»
    avanti_user_summary.vue        — аватар + имя + email
    avanti_stepper.vue             — карточка «Passo 4 di 5»
    avanti_stepper_step.vue        — один шаг степпера (done / current / pending)
    avanti_data_row.vue            — строка «метка — значение»
    avanti_copy_field.vue          — поле IBAN с кнопкой копирования
    avanti_personal_data_card.vue  — «Dati personali» (полная и compact-версия)
    avanti_security_card.vue       — «Sicurezza»
    avanti_security_row.vue        — строка с текстом и outline-кнопкой
    avanti_email_verify_notice.vue — плашка «Verifica email»
    avanti_checklist_card.vue      — «Completa tutti gli step» (сворачивается)
    avanti_checklist_item.vue      — пункт чек-листа
    avanti_progress_segments.vue   — сегментный прогресс-бар
    avanti_consultant_widget.vue   — карточка консультанта с непрочитанными
public/images/                     — аватар и фото консультанта (вынесены из SVG)
```

Правила, которых придерживался код: один компонент = один файл, имя `avanti_<назначение>.vue`,
каждый файл < 150 строк, `<script setup>` (Composition API), никаких `style=""` / inline-обработчиков —
только `<style scoped>` и токены из `app.css`.

## Подключение в Laravel (Inertia)

1. Скопировать `app/`, `routes/`, `resources/`, `public/images/`, `vite.config.js`, `package.json` в проект
   (или слить `routes/web.php` и `package.json` с существующими).
2. Серверная часть Inertia:
   ```bash
   composer require inertiajs/inertia-laravel
   ```
   и зарегистрировать middleware в `bootstrap/app.php`:
   ```php
   ->withMiddleware(function (Middleware $middleware) {
       $middleware->web(append: [\App\Http\Middleware\HandleInertiaRequests::class]);
   })
   ```
3. `npm install && npm run dev` (или `npm run build`).
4. Открыть `/profilo`. Заглушки в `ProfileController::show()` заменить на данные из `$request->user()`
   и моделей заявки; общие для кабинета данные (навигация, уведомления) — в `HandleInertiaRequests::share()`.

Навигация (`avanti_nav_link`, `avanti_breadcrumbs`) использует `<Link>` из Inertia — переходы между
страницами кабинета идут без перезагрузки. Новая страница = новый файл в `resources/js/pages/` +
`Inertia::render('имя_файла', [...])` в контроллере.

## Превью без PHP

В `dev-preview/` лежит стенд на чистом Vite: монтирует страницу через `createInertiaApp` с готовым
page-объектом из `page.json` — ровно так, как это делает `@inertia` в blade:

```bash
npx vite --config dev-preview/vite.config.js
```

Открыть `http://localhost:5173/dev-preview/index.html`. Папку можно удалить — на Laravel-часть она не влияет.

## Брейкпоинты

- `< 768px` — мобильная шапка, нижняя панель, кнопки на всю ширину, одна колонка
- `768–1023px` — десктопная шапка, одна колонка
- `1024–1199px` — две колонки (правая 40%)
- `≥ 1200px` — две колонки, правая 496px, как в макете
