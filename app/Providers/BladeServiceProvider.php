<?php

namespace App\Providers;

use App\Queue\UniquePriorityQueue;
use App\Queue\UniquePriorityQueues;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{

    protected $scripts = array();

    public function __construct($app)
    {
        $this->app = $app;
        $this->scripts   = new UniquePriorityQueues();
        $this->csses     = new UniquePriorityQueues();
    }
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Blade::extend(function($value) {
            return preg_replace('/\@define(.+)/', '<?php ${1}; ?>', $value);
        });

        Blade::directive('equal', function($expression){
            list($locations, $equalTo) = explode(',',str_replace(['(',')',' ', "'"], '', $expression));

            return "<?php echo $locations ?>";
        });

        Blade::directive('jsload', function ($expression) {
            var_dump($expression);
            if (empty($expression)) {
                $js_string = '';
                foreach ($this->scripts as $js)
                {
                    $js_string .= "<script src=\"{{ asset($js) }}\"></script>";
                }
                var_dump($js_string);
                return $js_string;
            }

            if (!is_array($expression)) {
                $expression = array($expression);
            }

            foreach ($expression as $path) {
                $this->scripts->insert($path, 99);
            }
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
