> [!WARNING]
> **ARCHIVED in Q1 2024**  
> Since Goat counter still uses a token → cookie → redirect strategy, it's nearly impossible to reliably
> embed even a public stats page via <iframe>. This plugin is thus archived.

# Kirby Goat Counter
Simple plugin providing goat counter iframe panel view to kirby panel and a simple frontend snippet.

## Instalation
`composer require adamkiss/kirby-goat-counter`
or download from releases

## How to use
1. Set the "dashboard viewawble by" to "Logged in users or with secret token"
2. Set `adamkiss.goat-counter.site-name` to your goat counter site name (`[site-name].goatcounter.com`)
3. Set `adamkiss.goat-counter.token` to the token for the dashboard availability

config.php example
```php
'adamkiss.goat-counter' => [
	'site-name' => 'my-site', // my-site.goatcounter.com
	'token' => '3b43e4q4g465z2y4j6n313i6v5l6r703o3n144d' // token you can get at https://[site-name].goatcounter.com/settings/main
];
```

Frontend snippet to be placed in your HTML. Automatically disabled in the debug mode.

```php
<?php snippet('goat-counter'); ?>
```

## FAQ: It doesn't work, the panel shows "You need to log in" screen

This is the result of how Goat Counter uses the access token. It creates a cookie and then refreshes the UI. The result is, that if you have **cross-site tracking prevention** enabled, the [site].goatcounter.com will not see the "access-token" cookie and won't show the analytics. Create an exception for your domain to see the analytics.

## License

MIT

## Thanks

This plugin wouldn't happen without:
- [Betten Deisler](https://betten-deisler.de) - for sponsoring the development of the Goat Counter plugin
- [Florian Karsten](https://floriankarsten.com/programming) - for the original code for the embeddable analytics in Kirby
- [@garethworld](https://github.com/garethworld) - for the sponsorship of the original code for the embeddable analytics in Kirby
