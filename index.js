panel.plugin("adamkiss/goat-counter", {
	components: {
		'k-goat-counter-view': {
			template: `
				<k-inside>
					<k-view class="k-goat-counter-view">
						<div v-if="siteName" style="padding-top: 10px; text-align: center">There's currently an issue with the Goat Counter where the "access-token → redirect" pattern might be blocked by your browser. You can <a v-bind:href="'https://' + siteName + '.goatcounter.com?hideui=1&access-token=' + token" target="_blank" style="text-decoration: underline;">check the analytics</a> in a new tab instead.</div>
						<iframe v-if="siteName" v-bind:src="'https://' + siteName + '.goatcounter.com?hideui=1&access-token=' + token" frameborder="0" class="goat-counter-iframe"></iframe>
						<div style="margin-top: 30px; text-align: center;" v-else>
							<code>You need to set 'adamkiss.goat-counter.site-name' in config.php</code>
						</div>
					</k-view>
				</k-inside>
			`,
			props: ["siteName", "token"],
		},
	},
});