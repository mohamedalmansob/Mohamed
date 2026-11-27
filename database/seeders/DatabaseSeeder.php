<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {
            $workspaceId = DB::table('workspaces')
                ->where('name', 'Misbar Workspace')
                ->value('id');

            if (!$workspaceId) {
                $workspaceId = (string) Str::uuid();

                DB::table('workspaces')->insert([
                    'id' => $workspaceId,
                    'name' => 'Misbar Workspace',
                    'created_at' => now(),
                ]);
            }

            DB::table('users')->updateOrInsert(
                ['email' => 'admin@misbar.local'],
                [
                    'name' => 'Misbar Admin',
                    'workspace_id' => $workspaceId,
                    'password' => Hash::make('Misbar@2026!'),
                    'email_verified_at' => now(),
                    'updated_at' => now(),
                ]
            );
        });
    }
}
