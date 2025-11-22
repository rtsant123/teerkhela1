<?php

namespace Database\Seeders;

use App\Models\AdminUser;
use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create default admin user
        AdminUser::updateOrCreate(
            ['email' => 'admin@teerkhelaresults.com'],
            [
                'name' => 'Admin',
                'email' => 'admin@teerkhelaresults.com',
                'password' => Hash::make('password123'),
            ]
        );

        // Create default settings
        $settings = [
            // General
            ['key' => 'app_name', 'value' => 'Teer Khela Results', 'group' => 'general'],
            ['key' => 'site_tagline', 'value' => 'Live Updates • Real-time Results', 'group' => 'general'],
            ['key' => 'contact_email', 'value' => 'support@teerkhelaresults.com', 'group' => 'general'],
            ['key' => 'whatsapp_number', 'value' => '+919876543210', 'group' => 'general'],
            ['key' => 'maintenance_mode', 'value' => '0', 'group' => 'general'],
            ['key' => 'analytics_code', 'value' => '', 'group' => 'general'],

            // Features
            ['key' => 'enable_testimonials', 'value' => '1', 'group' => 'features'],
            ['key' => 'enable_premium', 'value' => '1', 'group' => 'features'],
            ['key' => 'enable_popups', 'value' => '1', 'group' => 'features'],

            // Links
            ['key' => 'app_download_link', 'value' => '', 'group' => 'links'],
            ['key' => 'play_store_link', 'value' => '', 'group' => 'links'],
            ['key' => 'app_store_link', 'value' => '', 'group' => 'links'],
            ['key' => 'whatsapp_link', 'value' => 'https://wa.me/919876543210', 'group' => 'links'],
            ['key' => 'premium_link', 'value' => '', 'group' => 'links'],
            ['key' => 'support_email', 'value' => 'support@teerkhelaresults.com', 'group' => 'links'],
            ['key' => 'facebook_url', 'value' => '', 'group' => 'links'],
            ['key' => 'twitter_url', 'value' => '', 'group' => 'links'],
            ['key' => 'instagram_url', 'value' => '', 'group' => 'links'],
            ['key' => 'youtube_url', 'value' => '', 'group' => 'links'],
            ['key' => 'telegram_url', 'value' => '', 'group' => 'links'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }

        $this->command->info('Admin user and settings created successfully!');
        $this->command->info('Email: admin@teerkhelaresults.com');
        $this->command->info('Password: password123');
    }
}
