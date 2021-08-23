<?php
use App\Models\State;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $new = new State();
        $new->state = 'New';
        $new->save();
        $inProgres = new State();
        $inProgres->state = 'In Progres';
        $inProgres->save();
        $poused = new State();
        $poused->state = 'Poused';
        $poused->save();
        $done = new State();
        $done->state = 'Done';
        $done->save();
        $canceled = new State();
        $canceled->state = 'Canceled';
        $canceled->save();
    }
}
