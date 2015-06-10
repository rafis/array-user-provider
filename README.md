Add package to `package.json`:
```json
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/rafis/array-user-provider"
    }
],
"require": {
	"laravel/framework": "5.0.*",
    "rafis/array-user-provider": "~1.0"
},
```

Add provider to "providers" section in the configuration file `config/app.php`:
```php
'providers' => array(
    ...
    'ArrayUsers\Providers\AuthServiceProvider',
    ...
),
```

Change authentication driver in `config/auth.php`:
```php
	'driver' => 'array',
```

Get default config from package:
```
$ php artisan vendor:publish
```

Add your users to config `config/array-user-provider.php`:
```php
'users' => [
    [
        'login' => 'johndoe',
        'password' => sha1('123456'),
    ],
],
```
