<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeApiSetup extends Command
{
    protected $signature = 'make:api-setup';
    protected $description = 'Setup routes/api.php and RouteServiceProvider if missing';

    public function handle()
    {
        // Path ke routes/api.php
        $apiPath = base_path('routes/api.php');

        // Buat file routes/api.php jika belum ada
        if (!File::exists($apiPath)) {
            File::put($apiPath, <<<PHP
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/ping', function () {
    return response()->json(['message' => 'pong']);
});
PHP
            );
            $this->info('✅ routes/api.php created.');
        } else {
            $this->info('✅ routes/api.php already exists.');
        }

        // Path ke app/Providers/RouteServiceProvider.php
        $providerPath = app_path('Providers/RouteServiceProvider.php');

        // Buat file RouteServiceProvider jika belum ada
        if (!File::exists($providerPath)) {
            File::ensureDirectoryExists(app_path('Providers'));
            File::put($providerPath, <<<PHP
<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        \$this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }
}
PHP
            );
            $this->info('✅ app/Providers/RouteServiceProvider.php created.');
            $this->warn('📌 Tambahkan ini ke config/app.php bagian "providers":');
            $this->line("    App\\Providers\\RouteServiceProvider::class,");
        } else {
            $this->info('✅ RouteServiceProvider.php already exists.');
        }

        return 0;
    }
}
