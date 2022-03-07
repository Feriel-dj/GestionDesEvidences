<?php

namespace Database\Factories;

use App\Models\lesdemande;
use Illuminate\Database\Eloquent\Factories\Factory;

class lesdemandeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = lesdemande::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
       /* return [
            'cas' => $this->faker->words,
           //'num_dossier' => $this->faker->array_diff(),
            'crime' => $this->faker->words,
            'classification' => $this->faker->words,
            'cas_suspect' => $this->faker->words,
            'investigateur_légiste' => $this->faker->words,
            'responsable_enquete' => $this->faker->words,
            'investigateur_de_cas' => $this->faker->words,
            //'investigateur_tel' => $this->faker->PhoneNumber(+213) ,
            'unite_enqueteur' => $this->faker->words,
            //'date_confiscation' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'description_demande' => $this->faker->words,
            'action_demande' => $this->faker->words,
            'examinateur_notes' => $this->faker->words,
            'contient_appareils' => $this->faker->words,
           'cas_urgence' => $this->faker->words,
            'cas_urgence_justification' => $this->faker->words,
            //'fichier' => $this->faker->file,
            'user_id'=> $this->faker->words,
            
        ];*/
    }
}
