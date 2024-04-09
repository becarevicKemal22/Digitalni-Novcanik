<?php

namespace App\Console;

use App\Models\Transaction;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {
            $transactions = Transaction::whereNot('repetition_interval', 'single')->get();
            foreach($transactions as $transaction){
                $startDate = Carbon::parse($transaction->date);

                if($transaction->repetition_interval == 'Daily'){
                    if($startDate->add(1, 'day') > Carbon::now()){
                        $clone = $transaction->replicate();
                        $clone->date = Carbon::now();
                        $clone->repetition_interval = "single";
                        $clone->save();
                    }
                }else if($transaction->repetition_interval == 'Monthly'){
                    if($startDate->add(1, 'month') > Carbon::now()){
                        $clone = $transaction->replicate();
                        $clone->date = Carbon::now();
                        $clone->repetition_interval = "single";
                        $clone->save();
                    }
                }else{
                    if($startDate->add(1, 'year') > Carbon::now()){
                        $clone = $transaction->replicate();
                        $clone->date = Carbon::now();
                        $clone->repetition_interval = "single";
                        $clone->save();
                    }
                }

            }
        })->daily();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
