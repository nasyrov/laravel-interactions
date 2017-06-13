# Laravel Interactions

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

Laravel package for interactions.

## Requirements

Make sure all dependencies have been installed before moving on:

* [PHP](http://php.net/manual/en/install.php) >= 5.6
* [Composer](https://getcomposer.org/download/)

## Install

Pull the package via Composer:

``` bash
$ composer require nasyrov/laravel-interactionss
```

Register the service provider in `config/app.php`:

``` php
'providers' => [
    ...
    Nasyrov\Laravel\Interactions\InteractionServiceProvider::class,
    ...
]
```

## Usage

Let's generate a typical user registration flow with the use of interactions.

First, generate a `RegisterUser` interaction via the command:

``` bash
$ php artisan make:interaction RegisterUser
```

The command above will create a new file `app/Interactions/RegisterUser.php`.
Let's open the file and tailor it for our needs – create a new user:

``` php
use App\User;
use Illuminate\Http\Request;
use Nasyrov\Laravel\Interactions\Contracts\Interaction;

class RegisterUser implements Interaction
{
    /**
     * Handle the interaction.
     *
     * @return mixed
     */
    public function handle(Request $request)
    {
        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
    }
}
```

Next, include the `CallsInteractions` trait into the base controller so we will be able to run the interactions in any other controller that extends the one:

``` php
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Nasyrov\Laravel\Interactions\CallsInteractions;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, CallsInteractions, ValidatesRequests;
}
```

Finally, in the `UsersController` controller run the `RegisterUser` interaction and pass the request object:

``` php
use App\Http\Controllers\Controller;
use App\Interaction\RegisterUser;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function register(RegisterUserRequest $request)
    {
        return $this->interact(RegisterUser::classs, [$request]);
    }
}
```

## Testing

``` bash
$ composer lint
$ composer test
```

## Security

If you discover any security related issues, please email inasyrov@ya.ru instead of using the issue tracker.

## Credits

- [Evgenii Nasyrov][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/nasyrov/laravel-interactions.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/nasyrov/laravel-interactions/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/nasyrov/laravel-interactions.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/nasyrov/laravel-interactions.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/nasyrov/laravel-interactions.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/nasyrov/laravel-interactions
[link-travis]: https://travis-ci.org/nasyrov/laravel-interactions
[link-scrutinizer]: https://scrutinizer-ci.com/g/nasyrov/laravel-interactions/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/nasyrov/laravel-interactions
[link-downloads]: https://packagist.org/packages/nasyrov/laravel-interactions
[link-author]: https://github.com/nasyrov
[link-contributors]: ../../contributors
