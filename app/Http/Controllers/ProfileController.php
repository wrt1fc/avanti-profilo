<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController extends Controller
{
    /**
     * Страница «Profilo». Имя страницы = имя файла resources/js/pages/avanti_profile_page.vue.
     * В реальном проекте заменить заглушки на $request->user() и модели заявки.
     */
    public function show(Request $request): Response
    {
        return Inertia::render('avanti_profile_page', [
            'activeNav' => 'profile',
            'user' => [
                'firstName' => 'Marco',
                'lastName' => 'Rossi',
                'email' => 'ikoei@09gmail.com',
                'emailVerified' => false,
                'avatar' => asset('images/avatar-marco-rossi.jpg'),
                'company' => 'Intesa Sanpaolo S.p.A.',
                'approvedAmount' => 12000,
                'documentType' => 'Passaporto',
                'documentNumber' => 'AB1234567',
                'iban' => null,
            ],
            'breadcrumbs' => [
                ['label' => 'Piattaforma', 'href' => '/'],
                ['label' => 'Home'],
            ],
            'steps' => [
                ['key' => 'simulation', 'short' => 'Simul.', 'title' => 'Simulazione completata', 'icon' => 'chart', 'status' => 'done'],
                ['key' => 'approval', 'short' => 'Approv.', 'title' => 'Credito approvato', 'icon' => 'shield', 'status' => 'done'],
                ['key' => 'account', 'short' => 'Account', 'title' => 'Account creato', 'icon' => 'user', 'status' => 'done'],
                ['key' => 'documents', 'short' => 'Docum.', 'title' => 'Documenti caricati', 'icon' => 'upload', 'status' => 'current', 'href' => '/documenti'],
                ['key' => 'contract', 'short' => 'Firma', 'title' => 'Contratto firmato', 'icon' => 'pen', 'status' => 'pending'],
            ],
            'consultant' => [
                'name' => 'Schierano Deborah',
                'lastMessage' => 'Salve. Mi chiamo Deborah, sarò la sua consulente personale.',
                'avatar' => asset('images/consultant-deborah.jpg'),
                'unread' => 2,
                'online' => true,
                'href' => '/assistenza',
            ],
            'links' => [
                'editName' => '/profilo/nome',
                'changePassword' => '/profilo/password',
                'changeEmail' => '/profilo/email',
                'verifyEmail' => '/profilo/email/verifica',
            ],
        ]);
    }
}
