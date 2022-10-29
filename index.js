panel.plugin("adamkiss/goat-counter", {
	components: {
		'k-goat-counter-view': {
			template: `
				<k-inside>
					<k-view class="k-goat-counter-view" style="padding-top: 20px; background-color: white;">
						<iframe v-if="siteName" src="/adamkiss/goat-counter-proxy" frameborder="0" class="goat-counter-iframe"></iframe>
						<div style="margin-top: 30px; text-align: center;" v-else>
							<code>You need to set adamkiss.goat-counter.site-name in config.php</code>
						</div>
					</k-view>
				</k-inside>
			`,
			props: ["siteName", "token"],
		},
	},
});