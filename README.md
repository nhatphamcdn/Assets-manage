#Simple Asset Manager for Laravel

### Installation

1. Run `composer require nhatphamcdn/assets-manage`
2. Add `Nhatphamcdn\AssetsManage\AssetsManageServiceProvider::class` to app config `providers` array
3. Run `php artisan vendor:publish --provider="Nhatphamcdn\AssetsManage\AssetsManageServiceProvider" --tag="config"`

### Configuration
All the assets are defined as key-value pairs in the `assets` array. The key would then be used in the view files to include the resources, _e.g._ `@css('animate')`.

### Example usage
___config/assets.php___
```
'assets' => [
    'animate' => [
            'css' => 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css'
    ],
    'tagsinput' => [
        'css' => 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css',
        'js' => 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js'
    ],
    'datatables' => [
        'css' => 'https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap.min.css',
        'js' => [
            'https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/jquery.dataTables.min.js',
            'https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/dataTables.bootstrap.min.js'
        ]
    ],
    ...
]
```
___view.blade.php___
```
@css('animate', 'tagsinput', 'datatables')

@js('tagsinput', 'datatables')

```
This will create asset inclusions in your html with the corresponding urls.

You can also call urls directly
```
@css('http://link-stylesheet.css')
@js('https://link-js.js')
```
