<?php

return array(



	/*

	|--------------------------------------------------------------------------

	| Application Debug Mode

	|--------------------------------------------------------------------------

	|

	| When your application is in debug mode, detailed error messages with

	| stack traces will be shown on every error that occurs within your

	| application. If disabled, a simple generic error page is shown.

	|

	*/



	'debug' => false,



	/*

	|--------------------------------------------------------------------------

	| Application URL

	|--------------------------------------------------------------------------

	|

	| This URL is used by the console to properly generate URLs when using

	| the Artisan command line tool. You should set this to the root of

	| your application so that it is used when running Artisan tasks.

	|

	*/



	'url' => 'http://jarvis-store.com/',
	'subdomain' => 'jstore.co',
	'maindomain' => 'jarvis-store.com',
	'domain' => 'jstore.co',
	'cpanel' => 'direct.jstore.co',
	'username' => 'jstore77',
	'password' => 'BKd-qNK-XYE-QT4',
	'telkomsel-email' => 'agusyusida@gmail.com',

	'partnerships' => array(
		'city-marketplace.com'
	),

	'whmcs' => [
		'url' => 'http://member.jarvis-server.com/includes/api.php',
		'username' => 'jarvisstore',
		'password' => 'jarvisapi2314'
	],
	'github' => array(
		'username' => 'jarvisstore',
		'password' => 'jarvis2314',
		),
	'storage' => array(
		'base' => 'http://cdn.jarvis-store.com/',
		'product_path' => 'produk/',
		'koleksi_path' => 'koleksi/',
		'slides_path' => 'galeri/',
		'favicon_path' => array(
			'path' => 'galeri/',
			'height' => 16,
			'width' => 16

			),
		'banners' => array(
				'thumb' => array(
					'path' => 'thumb/',
					'height' => null,
					'width' => 75
					),
				'mainbar' => array(
					'path' => '',
					'height' => null,
					'width' => 980,

					'thumb' => array(
						'path' => 'thumb/',
						'height' => null,
						'width' => 200
						),
					),
				'sidebar' => array(
					'path' => '',
					'height' => null,
					'width' => 250,

					'thumb' => array(
						'path' => 'thumb/',
						'height' => null,
						'width' => 50
						),
					)
			),
		'favicon' => array(
				'height' => 16,
				'width' => 16,
			),
		'logo' => array(
				'thumb' => array(
					'path' => 'thumb/',
					'height' => 75,
					'width' => 75
					),
				'original' => array(
					'path' => '',
					'height' => 150,
					'width' => null
					)
			),
		'product' => array(
				'thumb' => array(
					'path' => 'thumb/',
					'width' => 150,
					'height' => 150
					),
				'medium' => array(
					'path' => 'medium/',
					'width' => 240,
					'height' => 240,
					),
				'large' => array(
					'path' => 'large/',
					'width' => 600,
					'height' => 600
					),
				'original' => array(
					'path' => '',
					'height' => null,
					'width' => 800
					),
			),

		'koleksi' => array(

				'thumb' => array(
					'path' => 'thumb/',
					'width' => 150,
					'height' => 150
					),
				'medium' => array(
					'path' => 'medium/',
					'width' => 240,
					'height' => null,
					),
				'large' => array(
					'path' => 'large/',
					'width' => 600,
					'height' => null
					),
				'original' => array(
					'path' => '',
					'height' => null,
					'width' => 800
					),
			),

		'slides' => array(

				'thumb' => array(
					'path' => 'thumb/',
					'width' => 150,
					'height' => null
					),
				'original' => array(
					'path' => '',
					'height' => null,
					'width' => 940
					),
			),
		),
	/*

	|--------------------------------------------------------------------------

	| Application Timezone

	|--------------------------------------------------------------------------

	|

	| Here you may specify the default timezone for your application, which

	| will be used by the PHP date and date-time functions. We have gone

	| ahead and set this to a sensible default for you out of the box.

	|

	*/



	'timezone' => 'Asia/Jakarta',



	/*

	|--------------------------------------------------------------------------

	| Application Locale Configuration

	|--------------------------------------------------------------------------

	|

	| The application locale determines the default locale that will be used

	| by the translation service provider. You are free to set this value

	| to any of the locales which will be supported by the application.

	|

	*/



	'locale' => 'id',



	/*

	|--------------------------------------------------------------------------

	| Encryption Key

	|--------------------------------------------------------------------------

	|

	| This key is used by the Illuminate encrypter service and should be set

	| to a random, long string, otherwise these encrypted values will not

	| be safe. Make sure to change it before deploying any application!

	|

	*/



	'key' => 'Jy6twZhTcgoHjG5CeWOjfwK5qZwkwH2q',



	/*

	|--------------------------------------------------------------------------

	| Autoloaded Service Providers

	|--------------------------------------------------------------------------

	|

	| The service providers listed here will be automatically loaded on the

	| request to your application. Feel free to add your own services to

	| this array to grant expanded functionality to your applications.

	|

	*/



	'providers' => array(



		'Illuminate\Foundation\Providers\ArtisanServiceProvider',

		'Illuminate\Auth\AuthServiceProvider',

		'Illuminate\Cache\CacheServiceProvider',

		'Illuminate\Foundation\Providers\CommandCreatorServiceProvider',

		'Illuminate\Session\CommandsServiceProvider',

		'Illuminate\Foundation\Providers\ComposerServiceProvider',

		'Illuminate\Routing\ControllerServiceProvider',

		'Illuminate\Cookie\CookieServiceProvider',

		'Illuminate\Database\DatabaseServiceProvider',

		'Illuminate\Encryption\EncryptionServiceProvider',

		'Illuminate\Filesystem\FilesystemServiceProvider',

		'Illuminate\Hashing\HashServiceProvider',

		'Illuminate\Html\HtmlServiceProvider',

		'Illuminate\Foundation\Providers\KeyGeneratorServiceProvider',

		'Illuminate\Log\LogServiceProvider',

		'Illuminate\Mail\MailServiceProvider',

		'Illuminate\Foundation\Providers\MaintenanceServiceProvider',

		'Illuminate\Database\MigrationServiceProvider',

		'Illuminate\Foundation\Providers\OptimizeServiceProvider',

		'Illuminate\Pagination\PaginationServiceProvider',

		'Illuminate\Foundation\Providers\PublisherServiceProvider',

		'Illuminate\Queue\QueueServiceProvider',

		'Illuminate\Redis\RedisServiceProvider',

		'Illuminate\Auth\Reminders\ReminderServiceProvider',

		'Illuminate\Foundation\Providers\RouteListServiceProvider',

		'Illuminate\Database\SeedServiceProvider',

		'Illuminate\Foundation\Providers\ServerServiceProvider',

		'Illuminate\Session\SessionServiceProvider',

		'Illuminate\Foundation\Providers\TinkerServiceProvider',

		'Illuminate\Translation\TranslationServiceProvider',

		'Illuminate\Validation\ValidationServiceProvider',

		'Illuminate\View\ViewServiceProvider',

		'Illuminate\Workbench\WorkbenchServiceProvider',

		'Way\Generators\GeneratorsServiceProvider',

		'Teepluss\Theme\ThemeServiceProvider',

		'Madlymint\Shpcart\ShpcartServiceProvider',

		'Intervention\Image\ImageServiceProvider',

		'Cartalyst\Sentry\SentryServiceProvider',

		'Mews\Captcha\CaptchaServiceProvider',

		'Totox777\Fbplugins\FbpluginsServiceProvider',

		'Juy\Profiler\Providers\ProfilerServiceProvider',

		'Totox777\Ongkir\OngkirServiceProvider',

		'Orangehill\Iseed\IseedServiceProvider',

		'Rtablada\PackageInstaller\PackageInstallerServiceProvider',

		'Yusidabcs\Checkout\CheckoutServiceProvider',

		'Doxxon\LaravelMandrillRequest\LaravelMandrillRequestServiceProvider',

		'Roumen\Feed\FeedServiceProvider',

		'Roumen\Sitemap\SitemapServiceProvider',

        'Totox777\Tiki\TikiServiceProvider',
        'Bcscoder\Rajaongkir\RajaongkirServiceProvider',
        'VTalbot\Pjax\PjaxServiceProvider',
        'Yusidabcs\Doc\DocServiceProvider',
        'Maatwebsite\Excel\ExcelServiceProvider',
        'Thujohn\Analytics\AnalyticsServiceProvider',
        //'Hocza\Sendy\SendyServiceProvider',
                

	),



	/*

	|--------------------------------------------------------------------------

	| Service Provider Manifest

	|--------------------------------------------------------------------------

	|

	| The service provider manifest is used by Laravel to lazy load service

	| providers which are not needed for each request, as well to keep a

	| list of all of the services. Here, you may set its storage spot.

	|

	*/



	'manifest' => storage_path().'/meta',



	/*

	|--------------------------------------------------------------------------

	| Class Aliases

	|--------------------------------------------------------------------------

	|

	| This array of class aliases will be registered when this application

	| is started. However, feel free to register as many as you wish as

	| the aliases are "lazy" loaded so they don't hinder performance.

	|

	*/



	'aliases' => array(

	

		'App' => 'Illuminate\Support\Facades\App',

		'Artisan' => 'Illuminate\Support\Facades\Artisan',

		'Auth' => 'Illuminate\Support\Facades\Auth',

		'Blade' => 'Illuminate\Support\Facades\Blade',

		'Cache' => 'Illuminate\Support\Facades\Cache',

		'ClassLoader' => 'Illuminate\Support\ClassLoader',

		'Config' => 'Illuminate\Support\Facades\Config',

		'Controller' => 'Illuminate\Routing\Controllers\Controller',

		'Cookie' => 'Illuminate\Support\Facades\Cookie',

		'Crypt' => 'Illuminate\Support\Facades\Crypt',

		'DB' => 'Illuminate\Support\Facades\DB',

		'Eloquent' => 'Illuminate\Database\Eloquent\Model',

		'Event' => 'Illuminate\Support\Facades\Event',

		'File' => 'Illuminate\Support\Facades\File',

		'Form' => 'Illuminate\Support\Facades\Form',

		'Hash' => 'Illuminate\Support\Facades\Hash',

		'HTML' => 'Illuminate\Support\Facades\HTML',

		'Input' => 'Illuminate\Support\Facades\Input',

		'Lang' => 'Illuminate\Support\Facades\Lang',

		'Log' => 'Illuminate\Support\Facades\Log',

		'Mail' => 'Illuminate\Support\Facades\Mail',

		'Paginator' => 'Illuminate\Support\Facades\Paginator',

		'Password' => 'Illuminate\Support\Facades\Password',

		'Queue' => 'Illuminate\Support\Facades\Queue',

		'Redirect' => 'Illuminate\Support\Facades\Redirect',

		'Redis' => 'Illuminate\Support\Facades\Redis',

		'Request' => 'Illuminate\Support\Facades\Request',

		'Response' => 'Illuminate\Support\Facades\Response',

		'Route' => 'Illuminate\Support\Facades\Route',

		'Schema' => 'Illuminate\Support\Facades\Schema',

		'Seeder' => 'Illuminate\Database\Seeder',

		'Session' => 'Illuminate\Support\Facades\Session',

		'Str' => 'Illuminate\Support\Str',

		'URL' => 'Illuminate\Support\Facades\URL',

		'Validator' => 'Illuminate\Support\Facades\Validator',

		'View' => 'Illuminate\Support\Facades\View',

		'Image' => 'Intervention\Image\Facades\Image',

		'Shpcart' => 'Madlymint\Shpcart\Facades\Shpcart',

		'Theme' => 'Teepluss\Theme\Facades\Theme',

		'Sentry' => 'Cartalyst\Sentry\Facades\Laravel\Sentry',

		'Captcha' => 'Mews\Captcha\Facades\Captcha',

		'Fbplugins' => 'Totox777\Fbplugins\Facades\Profiler',

		'Profiler' => 'Juy\Profiler\Facades\Profiler',

		'Ongkir' => 'Totox777\Ongkir\Facades\Profiler',

		'Mandrill' => 'Doxxon\LaravelMandrillRequest\Facades\MandrillRequest',

		'Feed' => 'Roumen\Feed\Facades\Feed',

        'Tiki' => 'Totox777\Tiki\Facades\Profiler',

        'RajaOngkir' => 'Bcscoder\Rajaongkir\Facades\Profiler',
        
        'Datatables'      => 'Bllim\Datatables\Datatables',

        'GitHub' => 'GrahamCampbell\GitHub\Facades\GitHub',

        'Excel' => 'Maatwebsite\Excel\Facades\Excel',

        'Analytics' => 'Thujohn\Analytics\AnalyticsFacade',

        'Sendy' => 'Hocza\Sendy\Facades\Sendy',

	),



);
