=== Nourish & Pure ===
Contributors: nourishpure
Requires at least: 6.2
Tested up to: 6.7
Requires PHP: 7.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

An elegant, high-performance Full Site Editing (FSE) block theme designed for food, beverage, and culinary education publications.

== Description ==

Nourish & Pure is a modern Full Site Editing (FSE) block theme designed specifically for food, beverage, cooking, and culinary education publications. Built around contemporary editorial typography, restrained warm alabaster backgrounds, sage olive accents, and responsive article cards, it offers the visual polish of a print culinary journal with modern web performance.

Key Features:
* Native Full Site Editing (FSE) with theme.json block styles and global palettes.
* Mobile-first responsive layout with zero layout shifts (CLS).
* Editorial Recipe Card pattern with preparation times, ingredients checklist, and dedicated print styling.
* "How It's Made" 4-stage process flow for food production and ingredient manufacturing deep-dives.
* Editorial Product Review pattern with pros/cons comparison and affiliate disclosures.
* Responsive comparison tables with mobile horizontal overflow safeguards.
* Lightweight, requestAnimationFrame throttled reading progress bar (respects prefers-reduced-motion).
* Built-in social sharing integration with Pinterest "Save", Facebook, Twitter/X, and Web Share API.
* Intelligent, non-intrusive ad placement slots with reserved dimensions to eliminate Cumulative Layout Shift (CLS).
* LCP optimization with eager loading for primary single post hero imagery.
* Two global style variations: "Editorial Warmth" and "Clean Minimalist".

== Installation ==

1. In your WordPress admin, navigate to Appearance -> Themes.
2. Click "Add New Theme", then click "Upload Theme".
3. Select the `nourish-pure.zip` archive and click "Install Now".
4. Once uploaded, click "Activate".
5. Access Appearance -> Editor (Site Editor) to customize header, footer, global styles, and block patterns.

== Frequently Asked Questions ==

= Does Nourish & Pure require third-party page builders? =
No. Nourish & Pure is a 100% native WordPress block theme. It does not require Elementor, WPBakery, or any external page builder.

= How do I configure advertising slots? =
Ad slots can be inserted using the theme's custom shortcode `[nourish_pure_ad location="in_article"]` or by hooking into the `nourish_pure_ad_{$location}` filters using any standard ad management plugin such as Advanced Ads or Ad Inserter.

= Can I customize the color palette? =
Yes. Open the Site Editor (Appearance -> Editor), select Styles, and modify the global palette. All components react instantly via CSS variables.

= Does the theme produce structured recipe Schema? =
The theme provides an accessible, print-ready editorial recipe pattern. For rich Google Recipe snippets with nutrition verification, we recommend pairing with specialized recipe plugins such as WP Recipe Maker or Tasty Recipes.

== Copyright & License ==

Nourish & Pure WordPress Theme, Copyright (C) 2026 Nourish & Pure Editorial Architecture.
Nourish & Pure is distributed under the terms of the GNU GPL version 2 or later.

Resources bundled with this theme:
* Feather Icons (SVG paths in theme scripts & share buttons): MIT License (https://github.com/feathericons/feather/blob/master/LICENSE)
* Fonts: System editorial fallbacks (Fraunces, Playfair Display, Plus Jakarta Sans, Inter): SIL Open Font License 1.1.
