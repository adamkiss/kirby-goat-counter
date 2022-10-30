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
]);
