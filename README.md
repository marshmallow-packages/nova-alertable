![alt text](https://marshmallow.dev/cdn/media/logo-red-237x46.png "marshmallow.")

# Nova Alertable
[![Version](https://img.shields.io/packagist/v/marshmallow/nova-alertable)](https://github.com/marshmallow-packages/nova-alertable)
[![Issues](https://img.shields.io/github/issues/marshmallow-packages/nova-alertable)](https://github.com/marshmallow-packages/nova-alertable)
[![Licence](https://img.shields.io/github/license/marshmallow-packages/nova-alertable)](https://github.com/marshmallow-packages/nova-alertable)
![PHP Syntax Checker](https://github.com/marshmallow-packages/nova-alertable/workflows/PHP%20Syntax%20Checker/badge.svg)
This Nova package will make it possible to sent alert to you Nova application via Model Observers. If you want to help the user to remember that they have to do an action after they've changed a resource, this package is for you!

## Installation
### Composer
You can install the package in to a Laravel app that uses [Nova](https://nova.laravel.com) via composer:
```bash
composer require marshmallow/alertable
```

### Nova
Add the tool to you `NovaServiceProvider`.
```php
public function tools()
{
    return [
        // ...
        new \Marshmallow\Alertable\Alertable,
    ];
}
```

### Routes
Make sure you have the alertable channel authenticated in routes/channels.php:
```php
Broadcast::channel('alertable.{userId}', function ($user, $userId) {
    return $user->id === (int) $userId;
});
```

### Pusher
This tool uses pusher to broadcast events. Please create a free pusher account if you don't have one already.
```env
PUSHER_APP_ID=_____
PUSHER_APP_KEY=_____
PUSHER_APP_SECRET=_____
PUSHER_APP_CLUSTER=_____
```

We've run into issues before when `useTLS` is active in the `broadcasting.php` config file. If you run into issues, pleas comment this as shown in the example below.
```php
'connections' => [
    'pusher' => [
        'driver' => 'pusher',
        'key' => env('PUSHER_APP_KEY'),
        'secret' => env('PUSHER_APP_SECRET'),
        'app_id' => env('PUSHER_APP_ID'),
        'options' => [
            'cluster' => env('PUSHER_APP_CLUSTER'),
            // 'useTLS' => true,
        ],
    ],
]
```

Also, make sure the `BroadcastServiceProvider::class` is uncommented in `config/app.php`.

# Usage
use Marshmallow\Alertable\Events\AlertNotificationEvent;

event(new AlertNotificationEvent(
    request()->user(),
    $alert_message = 'This Marshmallow Package is awesome!'
));

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Security

If you discover any security related issues, please email stef@marshmallow.dev instead of using the issue tracker.

## Credits

- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.


