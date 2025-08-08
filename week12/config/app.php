<?php

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;

return [

    /*
|--------------------------------------------------------------------------
| Application Name
|--------------------------------------------------------------------------
|
| This value sets your application's name. It is used whenever the framework
| needs to display the app’s name in notifications or other places required
| by the application or its packages.
|
*/

    'name' => env('APP_NAME', 'Student CRUD'),

    /*
|--------------------------------------------------------------------------
| Application Environment
|--------------------------------------------------------------------------
|
| This value specifies the current environment your application is running in.
| It influences how various services are configured. You set this value in
| your ".env" file.
|
*/

    'env' => env('APP_ENV', 'production'),

   /*
|--------------------------------------------------------------------------
| Application Debug Mode
|--------------------------------------------------------------------------
|
| When debug mode is enabled, detailed error messages with stack traces
| are displayed for any errors in your application. If disabled, a simple
| generic error page is shown instead.
|
*/

    'debug' => (bool) env('APP_DEBUG', false),

   /*
|--------------------------------------------------------------------------
| Application URL
|--------------------------------------------------------------------------
|
| This URL is used by the console to correctly generate URLs when running
| Artisan commands. It should be set to your application's root URL to
| ensure proper URL generation during Artisan tasks.
|
*/

    'url' => env('APP_URL', 'http://localhost'),

    'asset_url' => env('ASSET_URL'),

    /*
|--------------------------------------------------------------------------
| Application Timezone
|--------------------------------------------------------------------------
|
| Specify the default timezone your application will use for PHP date
| and date-time functions. A sensible default is already set for you.
|
*/

    'timezone' => 'UTC',

    /*
|--------------------------------------------------------------------------
| Application Locale Configuration
|--------------------------------------------------------------------------
|
| The application locale sets the default language for the translation
| service. You can change this to any supported locale for your app.
|
*/
    'locale' => 'en',

    /*
|--------------------------------------------------------------------------
| Application Fallback Locale
|--------------------------------------------------------------------------
|
| The fallback locale is used when the current locale is unavailable.
| You can set this to any language folder provided by your application.
|
*/

    'fallback_locale' => 'en',

   /*
|--------------------------------------------------------------------------
| Faker Locale
|--------------------------------------------------------------------------
|
| This locale setting is used by the Faker PHP library to generate fake
| data for database seeds, such as localized phone numbers, addresses,
| and other information.
|
*/

    'faker_locale' => 'en_US',

   /*
|--------------------------------------------------------------------------
| Encryption Key
|--------------------------------------------------------------------------
|
| This key is used by Laravel’s encrypter service and must be a random
| 32-character string to ensure encryption security. Set this before
| deploying your application!
|
*/

    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

   /*
|--------------------------------------------------------------------------
| Maintenance Mode Driver
|--------------------------------------------------------------------------
|
| These settings specify which driver Laravel uses to track and manage
| the application's maintenance mode. The "cache" driver enables
| controlling maintenance mode across multiple servers.
|
| Supported drivers: "file", "cache"
|
*/

    'maintenance' => [
        'driver' => 'file',
        // 'store'  => 'redis',
    ],

    /*
|--------------------------------------------------------------------------
| Autoloaded Service Providers
|--------------------------------------------------------------------------
|
| The service providers listed here are automatically loaded when your
| application receives a request. You can add your own services here to
| extend your application's functionality.
|
*/

    'providers' => ServiceProvider::defaultProviders()->merge([
        /*
 * Service Providers from packages...
 */

/*
 * Service Providers for the application...
 */

        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,
    ])->toArray(),

    /*
|--------------------------------------------------------------------------
| Class Aliases
|--------------------------------------------------------------------------
|
| This array contains class aliases that are registered when the application
| starts. You can add as many as you want since they are lazy-loaded and
| won’t impact performance.
|
*/

    'aliases' => Facade::defaultAliases()->merge([
        // 'Example' refers to the facade class App\Facades\Example::class,
    ])->toArray(),

]; 