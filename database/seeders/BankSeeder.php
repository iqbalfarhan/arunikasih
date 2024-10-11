<?php

namespace Database\Seeders;

use App\Models\Bank;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $banks = [
            "Bank Mandiri",
            "Bank Rakyat Indonesia (BRI)",
            "Bank Negara Indonesia (BNI)",
            "Bank Tabungan Negara (BTN)",
            "Bank Central Asia (BCA)",
            "Bank CIMB Niaga",
            "Bank Danamon",
            "Bank Permata",
            "Bank Panin",
            "Bank Mega",
            "Bank Sinarmas",
            "Bank Maybank Indonesia",
            "Bank OCBC NISP",
            "Bank Syariah Indonesia (BSI)",
            "Bank Muamalat Indonesia",
            "BTPN Syariah",
            "Bank Syariah Bukopin",
            "Bank DKI",
            "Bank Jabar Banten (BJB)",
            "Bank Jawa Tengah (Jateng)",
            "Bank Jawa Timur (Jatim)",
            "Bank Sumut",
            "Bank Aceh Syariah",
            "Bank Sumsel Babel",
            "Bank Riau Kepri Syariah",
            "Bank Kalimantan Timur dan Utara (Kaltimtara)",
            "HSBC Indonesia",
            "Standard Chartered Bank Indonesia",
            "Citibank Indonesia",
            "Deutsche Bank Indonesia",
            "Bank of China (Hong Kong)",
            "Mitsubishi UFJ Financial Group (MUFG Bank)",
            "GoPay",
            "OVO",
            "DANA",
            "LinkAja",
            "ShopeePay",
            "Jenius Pay",
            "Sakuku",
            "i.saku",
            "Paytren",
            "DOKU Wallet",
        ];

        foreach($banks as $bank)
        {
            Bank::factory()->create([
                'name' => $bank,
            ]);
        }
    }
}
