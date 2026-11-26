<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class MisbarPageController extends Controller
{
    private const WORKSPACE_VIEWS = [
        'brain' => ['view' => 'misbar.workspace.brain', 'active' => 'brain'],
        'brand' => ['view' => 'misbar.workspace.brand-dna', 'active' => 'brand'],
        'radar_audience' => ['view' => 'misbar.workspace.radar-audience', 'active' => 'radar_audience'],
        'competitors' => ['view' => 'misbar.workspace.competitors', 'active' => 'competitors'],
        'strategy' => ['view' => 'misbar.workspace.strategy', 'active' => 'strategy'],
        'studio' => ['view' => 'misbar.workspace.content-studio', 'active' => 'studio'],
        'planner' => ['view' => 'misbar.workspace.content-calendar', 'active' => 'planner'],
        'analytics' => ['view' => 'misbar.workspace.analytics', 'active' => 'analytics'],
        'voice_rescue' => ['view' => 'misbar.workspace.voice-rescue', 'active' => 'voice_rescue'],
        'admin' => ['view' => 'misbar.workspace.plan-management', 'active' => 'admin'],
    ];

    public function register(): View
    {
        return view('auth.register', ['routes' => $this->clientRoutes()]);
    }

    public function login(): View
    {
        return view('auth.login', ['routes' => $this->clientRoutes()]);
    }

    public function workspace(string $unit = 'brain'): View
    {
        abort_unless(isset(self::WORKSPACE_VIEWS[$unit]), 404);

        return view(self::WORKSPACE_VIEWS[$unit]['view'], [
            'activeUnit' => self::WORKSPACE_VIEWS[$unit]['active'],
            'routes' => $this->clientRoutes(),
        ]);
    }

    private function clientRoutes(): array
    {
        return [
            'register' => route('register'),
            'login' => route('login'),
            'workspace' => route('workspace'),
            'units' => [
                'brain' => route('workspace.brain'),
                'brand' => route('brand-dna.edit'),
                'radar_audience' => route('market-radar.index'),
                'competitors' => route('workspace.competitors'),
                'strategy' => route('workspace.strategy'),
                'studio' => route('content.create'),
                'planner' => route('content.calendar'),
                'analytics' => route('analytics.dashboard'),
                'voice_rescue' => route('voice-rescue.index'),
                'admin' => route('workspace.admin'),
            ],
        ];
    }
}
