FingerId editor extension for laravel-admin
======

This is a `laravel` component that integrates [FingerId].

## Screenshot
![Screenshot](https://github.com/han48/mr4-lc.finger-id/assets/27817127/ce62b3cb-73ff-4063-a50c-c33c0a11c0f8)

## Installation
```bash
composer require mr4-lc/finger-id
php artisan vendor:publish --tag=mr4-lc-finger-id --force
```

## Configuration

## Usage
```blade
<!-- Add css -->
<script src="{{ asset('vendor/mr4-lc/finger-id/js/finger-id/finger-id.js') }}"></script>
```
An hidden field [__finger-id] will append to body.

## License
Licensed under The [MIT License (MIT)](https://github.com/han48/mr4-lc.finger-id/blob/main/LICENSE).
