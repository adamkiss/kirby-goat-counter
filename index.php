<?php

Kirby::plugin('adamkiss/goat-counter', [
	'areas' => [
		'goat-counter' => function ($kirby) {
			return [
				'label' => 'Analytics',
				'icon' => 'chart',
				'disabled' => false,
				'menu' => true,
				'link' => 'goat-counter',
				'views' => [
					[
						'pattern' => 'goat-counter',
						'action'  => function () use ($kirby) {
							return [
								'component' => 'k-goat-counter-view',
								'title' => 'Analytics',
								'props' => [
									'siteName' => option('adamkiss.goat-counter.site-name'),
									'token' => option('adamkiss.goat-counter.token'),
								],
							];
						}
					]
				]
			];
		}
	],
	'snippets' => [
		'goat-counter' => __DIR__ . '/snippets/goat-counter-embed.php'
	],
	'routes' => [
		[
			// try to get around the Cookie->Redirect pattern by proxying the token view
			'pattern' => 'adamkiss/goat-counter-proxy',
			'action' => function() {
				$siteName = option('adamkiss.goat-counter.site-name');
				$token = option('adamkiss.goat-counter.token');

				$goatCounter = Remote::get("https://{$siteName}.goatcounter.com?hideui=1", [
					'headers' => [
						'Cookie' => "access-token={$token}"
					],
				]);

				$goatCounterProxied = preg_replace('/\/\/static.zgo.at\/(.*?)js(.*?)"/', '/adamkiss/goat-counter-proxy/$1js$2"', $goatCounter->content());

				return $goatCounterProxied;
			},
		],
		[
			// try to get around the Cross-Origin with the javascript
			'pattern' => 'adamkiss/goat-counter-proxy/(:any)',
			'action' => function(string $file) {
				if (str_contains($file, 'js')) {
					$content = Remote::get("https://static.zgo.at/{$file}?v=".kirby()->request()->query()->get('v'))->content();
					return new Response($content, 'text/javascript');
				}
			},
		]
	],
]);
