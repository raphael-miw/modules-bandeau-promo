{foreach $messages item=message}
	<div class="bandeau-promo" data-duration="{$message.duration}">
		{$message.text}
	</div>
{/foreach}
