<?php

namespace Database\Factories;

use App\Models\Customer;
use Faker\Core\Number;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
            'nama_pnj' => $this->faker->name(),
            'id_pel' => $this->faker->randomNumber(5, true),
            'daya' => '900',
            'tarif' => 'RM',
            'jenis_mk' => 'A',
            'tgl_mutasi' => now(),
            'jenis_layanan' => $this->faker->word(),
            'status_dil' => 'aktif'
        ];
    }
}
