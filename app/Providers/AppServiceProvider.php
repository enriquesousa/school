<?php

namespace App\Providers;

use Blade;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use PhpParser\NodeVisitorAbstract;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Para convertir a formato money
        // To use it in Blade: @convert($var)
        Blade::directive('convert', function ($money) {
            return "<?php echo number_format($money, 2); ?>";
        });

        // Para obtener nombre del mes en espanol en la fecha con carbon (https://es.stackoverflow.com/questions/200149/obtener-nombre-de-mes-en-espa%C3%B1ol-laravel-carbon)
        // Carbon::setUTF8(true);
        // Carbon::setLocale(config('app.locale'));
        // setlocale(LC_TIME, config('app.locale'));

        // NO funciono esto, lo solucione solo asi en la vista
        // <td>{{ \Carbon\Carbon::parse($item->date)->locale('es')->isoFormat('dddd, D [de] MMMM [de] YYYY') }}</td>
        // Ver en resources/views/backend/employee/employee_attendance/employee_attendance_view.blade.php

    }



}
