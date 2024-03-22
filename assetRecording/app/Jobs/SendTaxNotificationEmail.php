<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Models\Transportation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\TaxNotificationEmail;

class SendTaxNotificationEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Tentukan tanggal pajak terakhir (misalnya, 30 Maret)
        $taxDate = Carbon::create(null, 3, 30);

        // Tentukan jarak waktu (misalnya, 1 minggu sebelum tanggal pajak terakhir)
        $notificationDate = $taxDate->subWeek();
        
        // Dapatkan instance pengguna
        $user = User::find(10);

        // Periksa apakah hari ini adalah tanggal pemberitahuan yang diinginkan
        if (Carbon::now()->isSameDay($notificationDate)) {
            // Kirim email notifikasi
            Mail::to($user->email)->send(new TaxNotificationEmail());
        }
    }
}
