<?php
use App\User;
use App\Task;
use Illuminate\Database\Seeder;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //get all Users
        $users=User::all();

        foreach ($users as $user) {
            $limit=random_int(10,20);

            //buat taks sampe limitnya
            for ($i=0; $i < $limit; $i++) { 
                $taks=factory(Task::class)->make();
                //mengaitkan taks ke user 
                $taks->user()->associate($user);
                $taks->save();
            }
        }
    }
}
