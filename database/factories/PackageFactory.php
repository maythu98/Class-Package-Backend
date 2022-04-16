<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Package>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->name;
        return [
            'pack_id' => $this->generate_random_str(),
            'pack_name' => $name,
            'pack_description' => $this->faker->text,
            'pack_type' => collect(config("form.package-types"))->random(),
            'total_credit' => $this->faker->randomDigit,
            'tag_name' => collect(config("form.tags"))->random(),
            'validity_month' => $this->faker->randomDigit,
            'pack_price' => $this->faker->numerify('###.##'),
            'first_attend' => $this->faker->boolean,
            'additional_credit' => $this->faker->randomDigit,
            'note' => $this->faker->sentence(7, true),
            'pack_alias' => str_slug($name),
            'estimate_price' => $this->faker->numerify('###.##')
        ];
    }

    protected function generate_random_str()
	{
        return str_random(8).'-'.str_random(4).'-'.str_random(4).'-'.time().str_random(2);
	}
}
