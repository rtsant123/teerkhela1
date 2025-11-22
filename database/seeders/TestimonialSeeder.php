<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Rajesh Kumar',
                'quote' => 'This app has completely changed how I follow Teer results. The notifications are instant and the predictions are quite accurate!',
                'amount' => '₹25,000',
                'rating' => 5,
                'is_visible' => true,
            ],
            [
                'name' => 'Priya Sharma',
                'quote' => 'I love the premium features! The advanced analytics helped me understand the patterns better. Highly recommended!',
                'amount' => '₹15,000',
                'rating' => 5,
                'is_visible' => true,
            ],
            [
                'name' => 'Amit Das',
                'quote' => 'Best Teer results app I have used. Very fast updates and the history feature is amazing for tracking patterns.',
                'amount' => '₹32,000',
                'rating' => 5,
                'is_visible' => true,
            ],
            [
                'name' => 'Sunita Devi',
                'quote' => 'The SMS notifications are a lifesaver! I never miss a result now even when I am away from my phone.',
                'amount' => '₹18,500',
                'rating' => 4,
                'is_visible' => true,
            ],
            [
                'name' => 'Mohan Singh',
                'quote' => 'Simple, clean interface and reliable results. Customer support is also very responsive. Great experience overall!',
                'amount' => '₹21,000',
                'rating' => 5,
                'is_visible' => true,
            ],
        ];

        foreach ($testimonials as $index => $testimonial) {
            Testimonial::updateOrCreate(
                ['name' => $testimonial['name']],
                array_merge($testimonial, ['sort_order' => $index + 1])
            );
        }

        $this->command->info('Sample testimonials created successfully!');
    }
}
