<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CourseReviews;


class CourseReviewsFactory extends Factory
{
  
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 200), 
            'course_id'=>1,
            'rating' => $this->faker->numberBetween(1, 5), 
            'review' => $this->faker->sentence(10),
        ];
    }
}
