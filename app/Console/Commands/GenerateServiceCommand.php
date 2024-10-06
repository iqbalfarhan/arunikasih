<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class GenerateServiceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "generate {serviceName}";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Generate service files for a given service name";

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $serviceName = $this->argument("serviceName");

        $lowerServiceName = Str::lower($serviceName);
        $capitalizedServiceName = Str::studly($serviceName);

        $this->call("make:model", [
            "name" => $serviceName,
            "--migration" => true,
            "--factory" => true,
            "--seed" => true,
        ]);
        $this->call("make:livewire", [
            "name" => "pages.{$lowerServiceName}.index",
        ]);
        $this->call("make:livewire", [
            "name" => "pages.{$lowerServiceName}.actions",
        ]);
        $this->call("livewire:form", [
            "name" => "{$capitalizedServiceName}Form",
        ]);

        $this->injectStubFile('livewireform', $serviceName);
        $this->injectStubFile('viewindex', $serviceName);
        $this->injectStubFile('viewactions', $serviceName);
        $this->injectStubFile('controllerindex', $serviceName);
        $this->injectStubFile('controlleractions', $serviceName);
        $this->info("\nService {$serviceName} successfully generated!\n");
        $this->table(
            ["No", "Tahap selanjutnya", "File Path"], // Header tabel
            [
                [1, "Isi variable fillable", "app/Models/{$capitalizedServiceName}.php"],
                [2, "Isi File migration", "database/migrations/0000_00_00_000000_create_{$lowerServiceName}s_table.php"],
                [3, "Isi File LivewireForm", "app/Livewire/{$capitalizedServiceName}Form.php"],
                [4, "Perbaiki table view index", "resources/views/livewire/pages/{$lowerServiceName}/index.blade.php"],
                [5, "Perbaiki input view actions", "resources/views/livewire/pages/{$lowerServiceName}/actions.blade.php"],
                [6, "Tambahkan route", "routes/web.php"],
                [7, "Tambahkan menu sidebar", "resources/views/livewire/partial/sidebar.blade.php"],
            ]
        );

    }

    protected function injectStubFile($fileType, $serviceName)
    {
        $lowerServiceName = Str::lower($serviceName);
        $capitalizedServiceName = Str::studly($serviceName);

        // Mapping stub file ke file tujuan
        $stubFile = [
            "livewireform" => [
                'stub' => 'stubs/generate-livewire-form.stub',
                'destination' => app_path("Livewire/Forms/{$capitalizedServiceName}Form.php")
            ],
            "viewindex" => [
                'stub' => 'stubs/generate-view-index.stub',
                'destination' => resource_path("views/livewire/pages/{$lowerServiceName}/index.blade.php")
            ],
            "viewactions" => [
                'stub' => 'stubs/generate-view-actions.stub',
                'destination' => resource_path("views/livewire/pages/{$lowerServiceName}/actions.blade.php")
            ],
            "controllerindex" => [
                'stub' => 'stubs/generate-ctrl-index.stub',
                'destination' => app_path("Livewire/Pages/{$capitalizedServiceName}/Index.php")
            ],
            "controlleractions" => [
                'stub' => 'stubs/generate-ctrl-actions.stub',
                'destination' => app_path("Livewire/Pages/{$capitalizedServiceName}/Actions.php")
            ],
        ];

        // Memastikan tipe file yang valid
        if (!array_key_exists($fileType, $stubFile)) {
            $this->error("File type {$fileType} is not valid.");
            return;
        }

        // Dapatkan stub dan path tujuan
        $stubPath = base_path($stubFile[$fileType]['stub']);
        $filePath = $stubFile[$fileType]['destination'];

        // Baca konten dari file stub
        $templateContent = file_get_contents($stubPath);

        // Replace placeholder dengan nilai dinamis
        $templateContent = str_replace('{{ lowerServiceName }}', $lowerServiceName, $templateContent);
        $templateContent = str_replace('{{ capitalServiceName }}', $capitalizedServiceName, $templateContent); // Untuk menambahkan fleksibilitas

        // Tulis konten ke file tujuan
        file_put_contents($filePath, $templateContent);

        // Tampilkan pesan sukses
        $this->info("File generated: {$filePath}");
    }
}
