<?php

namespace Database\Factories;

use App\Models\Curso;
use Illuminate\Support\Str;;
use Illuminate\Database\Eloquent\Factories\Factory;

class CursoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Curso::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name=$this->faker->sentence();
        return [
            'name'=> $name,
            'slug' => Str::slug($name, '-'), 
            'category'=>$this->faker->randomElement(['Diseno web', 'Desarrollo web', 'Administracion BD']), 
            'description'=>$this->faker->paragraph(),
            'avatar'=>$this->faker->randomElement([$this->faker->sentence(), '']) 
        ];
    }
}
