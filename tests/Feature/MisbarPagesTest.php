<?php

namespace Tests\Feature;

use Tests\TestCase;

class MisbarPagesTest extends TestCase
{
    public function test_each_independent_screen_renders_with_the_correct_view(): void
    {
        $pages = [
            '/' => 'view-signup',
            '/register' => 'view-signup',
            '/login' => 'view-login',
            '/workspace' => 'unit-brain',
            '/workspace/brain' => 'unit-brain',
            '/workspace/brand-dna' => 'unit-brand',
            '/workspace/market-radar' => 'unit-radar_audience',
            '/workspace/competitors' => 'unit-competitors',
            '/workspace/strategy' => 'unit-strategy',
            '/workspace/content/create' => 'unit-studio',
            '/workspace/content/calendar' => 'unit-planner',
            '/workspace/analytics' => 'unit-analytics',
            '/workspace/voice-rescue' => 'unit-voice_rescue',
            '/workspace/admin' => 'unit-admin',
        ];

        foreach ($pages as $path => $screenId) {
            $this->get($path)
                ->assertOk()
                ->assertSee('lang="ar" dir="rtl"', false)
                ->assertSee('id="'.$screenId.'"', false)
                ->assertSee('css/misbar.css')
                ->assertSee('js/misbar.js');
        }
    }

    public function test_signup_legacy_path_redirects_to_register(): void
    {
        $this->get('/signup')->assertRedirect(route('register'));
    }

    public function test_navigation_uses_named_routes_and_prototype_auth_is_disclosed(): void
    {
        $this->get('/login')
            ->assertSee('href="'.route('register').'"', false)
            ->assertSee('استعادة كلمة المرور', false);

        $this->get('/register')
            ->assertSee('href="'.route('login').'"', false);

        $this->get('/workspace/brand-dna')
            ->assertSee('href="'.route('content.create').'"', false)
            ->assertSee('رجوع', false)
            ->assertSee('لا تُحفظ في قاعدة بيانات', false);

        $this->get('/workspace')
            ->assertSee('href="'.route('brand-dna.edit').'"', false);
    }
}
