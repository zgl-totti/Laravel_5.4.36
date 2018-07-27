<?php

namespace App\Jobs;


use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;

class QueuedTest implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //echo 'totti is king';

        try {
            $user = new User();
            $user->name = rand(1000, 999999);
            $user->email = rand(100, 999) . '@' . rand(1, 100);
            $user->password = rand(1000, 999999);

            $row=$user->save();

            if($row){
                Log::info('queue_success:'.time().':totti is king');
            }else{
                Log::info('queue_error:'.time().':totti is king');
            }

        }catch (\Exception $e){
            Log::info('queue_warning:'.time().':totti is king');
        }

        //Log::info(time().':totti is king');
    }
}
