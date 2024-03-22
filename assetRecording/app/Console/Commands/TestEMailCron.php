<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Transportation;
use Carbon\Carbon;
use App\Mail\TaxNotificationEmail;
use Illuminate\Support\Facades\Mail;
class DemoCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Sample
        Log::info("Cron job Berhasil di jalankan " . date('Y-m-d H:i:s'));
        $user = User::find(10);
        $transportations =Transportation::all();
        $condition = false;
        foreach($transportations as $transportation){
            if(date_left($transportation->oil_date) ==true ||date_left($transportation->tax_date) ==true){
                $condition = true;
            }
        }
        if($condition == true){
            Mail::to($user->email)->send(new TaxNotificationEmail());
        }
        // Mail::to($user->email)->send(new TaxNotificationEmail());

        // Kita bisa menyimpan logic disini
        // Contoh: Update data di database yang statusnya belum diproses selama 24 jam menjadi FAILED
        // $expired = Carbon::now()->subHour(24);
        // $transaction = Transaction::where('transaction_status', '=', 'PENDING')->where('created_at', '<=', $expired)->first();
        // $transaction->transaction_status = 'FAILED';
        // $transaction->save();
        // Tentukan tanggal pajak terakhir (misalnya, 30 Maret)

        // $taxDate = Carbon::create(null, 3, 25);

        // // Tentukan jarak waktu (misalnya, 1 minggu sebelum tanggal pajak terakhir)
        // $notificationDate = $taxDate->subWeek();
        
        // // Dapatkan instance pengguna

        // Periksa apakah hari ini adalah tanggal pemberitahuan yang diinginkan
        // if (Carbon::now()->isSameDay($notificationDate)) {
        //     // Kirim email notifikasi
        //     Mail::to("testingpengguna1@gmailcom")->send(new TaxNotificationEmail());
        // }
    }
}
