<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'App\Services\Registrar');
                $this->app->bind(
                        'App\Repositories\NewsletterRepositoryInterface', 
                        'App\Repositories\NewsletterRepository');
                $this->app->bind(
                        'App\Repositories\SectionRepositoryInterface', 
                        'App\Repositories\SectionRepository');
                $this->app->bind(
                        'App\Repositories\CategoryRepositoryInterface', 
                        'App\Repositories\CategoryRepository');
                $this->app->bind(
                        'App\Repositories\ShippingAddressRepositoryInterface', 
                        'App\Repositories\ShippingAddressRepository');
                $this->app->bind(
                        'App\Repositories\BookRepositoryInterface', 
                        'App\Repositories\BookRepository');
                $this->app->bind(
                        'App\Processors\ShoppingCartInterface', 
                        'App\Processors\ShoppingCart');
                $this->app->bind(
                        'App\Processors\CheckoutInterface', 
                        'App\Processors\Checkout');
	}

}
