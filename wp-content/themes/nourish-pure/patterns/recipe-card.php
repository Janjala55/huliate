<?php
/**
 * Title: Editorial Recipe Card
 * Slug: nourish-pure/recipe-card
 * Categories: nourish-pure-recipes
 * Description: Dedicated printable recipe card with prep times, yield, ingredients, and step-by-step instructions.
 * Keywords: recipe, card, cooking, ingredients, instructions, print
 */
?>
<!-- wp:group {"className":"np-recipe-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group np-recipe-card">
	<div class="np-recipe-header">
		<h3 class="np-recipe-title">Rustic Roasted Tomato &amp; Fennel Broth</h3>
		<!-- wp:paragraph {"style":{"typography":{"fontSize":"1rem","lineHeight":"1.6"}},"textColor":"secondary-text"} -->
		<p class="has-secondary-text-color" style="font-size:1rem;line-height:1.6">A deeply caramelized, comforting vegetal broth infused with crushed coriander seed, whole star anise, and slow-roasted plum tomatoes.</p>
		<!-- /wp:paragraph -->
		
		<div class="np-recipe-meta-grid">
			<div class="np-recipe-meta-item">
				<span class="np-meta-label">Prep Time</span>
				<span class="np-meta-value">15 mins</span>
			</div>
			<div class="np-recipe-meta-item">
				<span class="np-meta-label">Cook Time</span>
				<span class="np-meta-value">45 mins</span>
			</div>
			<div class="np-recipe-meta-item">
				<span class="np-meta-label">Total Time</span>
				<span class="np-meta-value">60 mins</span>
			</div>
			<div class="np-recipe-meta-item">
				<span class="np-meta-label">Servings</span>
				<span class="np-meta-value">4 bowls</span>
			</div>
			<div class="np-recipe-meta-item">
				<span class="np-meta-label">Difficulty</span>
				<span class="np-meta-value">Easy</span>
			</div>
		</div>

		<button type="button" class="np-recipe-print-btn" aria-label="Print this recipe card">
			<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>
			<span>Print Recipe</span>
		</button>
	</div>

	<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"2rem","left":"2rem"}}}} -->
	<div class="wp-block-columns">
		<!-- wp:column {"width":"40%","className":"np-recipe-ingredients"} -->
		<div class="wp-block-column np-recipe-ingredients" style="flex-basis:40%">
			<h4 class="np-recipe-section-title">Ingredients</h4>
			<!-- wp:list -->
			<ul class="wp-block-list">
				<li>2 lbs ripe plum tomatoes, halved</li>
				<li>1 large fennel bulb, sliced into wedges</li>
				<li>4 cloves garlic, smashed with skin</li>
				<li>3 tbsp extra virgin olive oil</li>
				<li>1 tsp sea salt flakes</li>
				<li>4 cups filtered spring water or vegetable stock</li>
				<li>1 whole star anise</li>
				<li>Fresh basil leaves for garnish</li>
			</ul>
			<!-- /wp:list -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"60%","className":"np-recipe-instructions"} -->
		<div class="wp-block-column np-recipe-instructions" style="flex-basis:60%">
			<h4 class="np-recipe-section-title">Method</h4>
			<!-- wp:list {"ordered":true} -->
			<ol class="wp-block-list">
				<li>Preheat your oven to 400&deg;F (200&deg;C). Arrange the halved tomatoes, fennel wedges, and garlic on a heavy baking sheet.</li>
				<li>Drizzle generously with olive oil and sprinkle with sea salt. Roast for 30 minutes until edges are blistered and charred.</li>
				<li>Transfer roasted vegetables and pan juices into a heavy-bottomed Dutch oven. Pour in filtered water or stock and add star anise.</li>
				<li>Simmer gently over low heat for 15 minutes to allow flavors to marry. Remove star anise before serving.</li>
				<li>Ladle hot broth into warm ceramic bowls and finish with a drizzle of extra virgin olive oil and torn fresh basil.</li>
			</ol>
			<!-- /wp:list -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
