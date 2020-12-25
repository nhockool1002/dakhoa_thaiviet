=== Groovy Menu ===
Contributors: Grooni
Requires at least: 4.9.7
Tested up to: 5.5.3
Stable tag: 2.4.0.1
License: Themeforest Split Licence
License URI: -
Tags: customizable, responsive, animation, flexible, translation ready, drop down, dropdown, dropdown menu, easy, mega dropdown menu, mega menu, megamenu, navigation, options, presets, shortcodes, widgetized, widgets

Groovy menu is a modern customizable and flexible WordPress Mega Menu Plugin designed for creating mobile friendly menus with a lot of options.

== Description ==
[Groovy Menu](https://codecanyon.net/item/groovy-menu-wordpress-mega-menu-plugin/23049456) | [Demo](http://groovymenu.grooni.com/) | [Documentation](https://grooni.com/docs/groovy-menu/) | [Video tutorials](https://www.youtube.com/channel/UCpbGGAUnqSLwCAoNgm5uAKg)

Groovy Menu is a WordPress Mega Menu Plugin that will allows you easily add an awesome mega menu on your site. Is an easy to customize, just need to upload your logo and fit your own colors, fonts and sizes.

== Installation ==
1. In your admin panel, go to Plugins -> and click the Add New button.
2. Click Upload and Choose File, then select the plugins's ZIP file. Click Install Now.
3. Click Activate to use Groovy menu.

== Copyright ==

Groovy Menu is comprised of two parts.

(1) the PHP code and integrated HTML are licensed under the General Public
License (GPL).

(2) All other parts, but not limited to the CSS code, images, and design are
licensed according to the license purchased from Envato.

Read more about licensing here: http://themeforest.net/licenses

Groovy Menu bundles the following third-party resources:

Font Awesome icons, Copyright Dave Gandy
License: SIL Open Font License v1.10
Source: http://fontawesome.io/

html2canvas maintained by Niklas von Hertzen
License: MIT
Source: https://github.com/niklasvh/html2canvas

imagesLoaded, Copyright David DeSandro
License: MIT
Source: http://imagesloaded.desandro.com

lodash maintained by Lodash Utilities
License: MIT
Source: https://github.com/lodash/lodash

perfect-scrollbar maintained by Hyunje Jun
License: MIT
Source: https://github.com/utatti/perfect-scrollbar

hamburgers maintained by Jonathan Suh
License: MIT
Source: https://github.com/jonsuh/hamburgers/

jQuery Select2, Maintained by Kevin Brown (https://github.com/kevin-brown) and Igor Vaynberg (https://github.com/ivaynberg) with the help of contributors (https://github.com/select2/select2/graphs/contributors)
License: MIT
Source: https://select2.github.io/

== Changelog ==

Visit [Changelog](https://grooni.com/docs/groovy-menu/changelog/) from our [Knowledge Base](https://grooni.com/docs/groovy-menu/)

= 2.4.0.1 =
* Improve: Hover effect of menu item now occur only for the last item in the chain in multi-level menus.
* Fix: Fixed bug with automatic closing opened dropdown menus that is occurring in some cases.

= 2.4.0 =
* Add: Added "Forced centered logo" setting for menu types with center logo.
* Fix: The bug that prevented the installation of Groovy Menu on a site running Microsoft-IIS has been fixed.
* Fix: Added styles for WPML selector, which is embedded in the side area.
* Fix: Added reset CSS styles to prevent style conflicts with some themes.

= 2.3.10 =
* Improve: Updated third-party JS libraries included in the frond-end part of Groovy Menu.
* Fix: Adjusting the logo height might not be changed if a third-party plugin for changing images to webp format is installed.
* Fix: In some cases, all taxonomies available for search were not displayed in the preset settings in the "General -> Search -> Filter search result by" section.

= 2.3.9.1 =
* Fix: Active color links for page ancestor. Includes child pages for parent menu items presented in the nav menu.
* Fix: Colorpicker located in the settings window of the menu item in "Appearance > Menu".
* Fix: Characters from the extended UNICODE table for text badges are allowed.

= 2.3.9 =
* Add: An added new feature that improves works of dropdowns on IPad. Now single tap can open a dropdown for an active main menu item that has a submenu, and itself is a link. And for double-tap will open assigned the link for this menu item.
* Add: Added the ability to set negative values for "Dropdown gap", "Submenu gap" and "Mega menu gap".
* Fix: Fixed URL for the search form to fix an issue that appears on multidomain multisites.
* Fix: Fixed bug with colorpicker in the preset editor at the Safari browser.

= 2.3.8 =
* Improve: "Slider opening style"  for mobile menu has been optimized.
Reduced the number of JavaScript calculations required for this type of menu to work.
* Add: New setting "Mega menu links left / right padding" in section General > Mega menu
* Add: New setting "Top level hover line thickness" for Hover style 2, 5 and 7.
* Fix: Added an additional check for cases when the $ _SERVER global variable does not contain the "SERVER_NAME" parameter.
* Fix: Fixed and improved "Animated Hamburger icon". Improved positioning of the Hamburger icon relative to the center of the menu block and sticky menu.
* Fix: Setting "Icon size" for WooCommerce mini cart icon on the mobile menu.
* Fix: "Animated Hamburger icon" for the mobile menu correct operating the font size, padding, and colors from the Side icon settings.
* Fix: Some fixes in UI styles in the Groovy Menu Dashboard.
* Fix: Fixed re-initialization of the Sticky menu on the mobile resolutions at changing the height of the browser window.
* Fix: Increased time spacing for (debounce) to trigger the scroll handler and resize the browser window. This reduces the overall load on the browser during speed navigation with large graphic content inside the menu.
* Fix: The setting  "Letter Spacing" for menu items inside the Mega menu has been fixed.

= 2.3.7 =
* Improve: Updated the pool of JavaScript libraries included in the Groovy Menu.
* Fix: Fixed a bug with positioning dropdown menus during scrolling and switching to sticky menu and back.

= 2.3.6 =
* Add: Added a new setting in the Global setting: "Disable internal Font".
* Add: Added a new setting in the Global settings: "Allow use preloader for internal fonts". Allows you to speed up the loading of the FontAwesome & Groovy Menu Internal font.
* Add: Added the ability to display the Groovy Menu using the [groovy_menu] shortcode. This allows you to insert it into almost any widget or Custom HTML block in content editors.
* Fix: In some rare cases, WP didn't add IDs for menu items. A fix has been made to add these IDs without fail.
* Fix: Removed HTML inserts for title & description from the global config. In some rare cases on the server side, reading such a config led to bugs with caching the HTML output.
* Fix: Fixed a compatibility issue when editing Menu Block with Cornerstone builder (X Theme, Pro theme).
* Fix: Additional check after AJAX to update the number of products in the Woocommerce mini-cart mobile version.

= 2.3.5.1 =
* HotFix: Fix for auto-closing dropdown menus with an empty link.

= 2.3.5 =
* Fix: Fixed the bug with saving menu items settings, when switching from Groovy Menu Free earlier versions to Pro.
* Fix: Now are correct working custom empty links in the top level menu toghether with enabled setting opening the sub-menu on mouse click.
* Fix: Fixed working with the Iconpack at loading and uninstalling the icon font pack in Global settings.
* Fix: The initialization of the main Groovy Menu modules has been moved to the ‘init’ action. This avoids conflicts with some third-party plugins, and also allows you to dynamically add new integration capabilities with some themes. (include Zephyr 7.x).

= 2.3.4 =
* Add: An additional option for "Mobile navigation drawer width" is "Dynamic minimum size"
* Add: Added "Enable mobile menu scrollbar" setting. Is enabled by default.
* Add: New option for mobile menu type "Slider mobile submenu opening style" - "Mobile submenu title height".
* Add: New option for mobile menu type "Slider mobile submenu opening style" - "Mobile submenu title background color".
* Fix: Improved animation for the "slider" type mobile menu. Second Revision. Reducing the number of calculations during the animation, which will speed up the display on slow smartphones.
* Fix: Alignment open/close icon for Animated Hamburger.
* Fix: Fixed a bug where not all menu items could be shown at "Slider mobile submenu opening style"
* Fix: Added style which prevents mobile menu folding at scrolling the main content.
* Fix: Added styles to prevent showing the mobile menu at page is loading.

= 2.3.3 =
* Add: Added the ability to implement a custom trigger to open a mobile menu. "Custom mobile menu open trigger".
* Fix: The upper gap in the "slider" type mobile menu is now applied not only to the top level, but also to all submenus.
* Fix: Fixed bug with hover color for "Top level hover Style 2".
* Fix: Improved animation for the "slider" type mobile menu. Now it is smoother and without visible friezes.

= 2.3.2 =
* Add: New setting to set the top gap for the mobile menu "Mobile menu top gap".
* Add: Added new action "gm_mobile_main_menu_top". It allows you to add content to the top of the mobile menu, before the "Mobile menu top gap".
* Add: Added the ability to disable the default Groovy Menu output on all pages. At "Global settings > Taxonomies" you can select "Default preset for all content"  as "Hide Groovy menu".
* Fix: Scrolling at vertical menu in the mobile version.
* Fix: Canceled some functions for working with page content if the mobile menu is disabled.
* Fix: Fixed bug when open the mobile site, the menu has been opened and then folded.


= 2.3.1 =
* Add: Added the new mobile menu open type, with Close "X" icon.
* Add: Added the ability to set animated Hamburger and close button for mobile menu.
* Add: New type of mobile menu with slide effect.
* Add: Added ability to choise of Navigation menu to display in preview mode.
* Add: New appearance style "Animate with scaling" in "General - Submenus - Submenu appearance style" section.
* Add: Custom scroll speed options for onepage menus.

= 2.3.0 =
* Add: Ability to add a custom shortcode or HTML to the Action areas of Groovy Menu, direclty in the preset editor. The setting is available in the General preset editor > Custom code.
* Add: Expanded menu: Added settings for separator lines in the first level menu.
* Add: Expanded menu: Added speed setting for sidebar expanding animation.
* Fix: Fixed a conflict that occurred when some plugins for WooCommerce were working together on Divi product pages and using menu blocks.
* Fix: Added default styles for displaying items in the mini cart. Prevents style conflicts in some themes.
* Fix: Added an event to close the mini-cart by clicking outside the mini-cart.
* Fix: Fixed double transition effect for icons.

= 2.2.13 =
* Add: Added an option for disable Font Awesome.
* Improve: Additional features to control for Onepage scroll.

= 2.2.12 =
* Add: New feature to set border radius for Dropdown menu.
* Add: New ability to set gap for Dropdown menu, Sub-menu and Mega Menu.
* Fix: Fixed menu items highlighting in case the current single page is included in several taxonomies presented in the menu.

= 2.2.11 =
* Improve: Increased dropdown click area at the mobile menu.
* Add: Added new setting for menu dividers "Stretch to all menu height".
* Fix: Added setting "Side icon mobile sticky" to set a color for Cart on mobile sticky menu.
* Fix: Fixed bug with position of icons in Groovy Menu UI.

= 2.2.10 =
* Improve: All Search settings are moved to their own section.
* Add: Added settings for choosing colors for search items.
* Improve: The section of the "Mobile menu" preset has been reorganized.
* Add: Added new settings for the mobile menu. Choosing the position of the logo, dividing lines, icons color.
* Add: Added new settings for "Submenu box border top color".
* Fix: Fixed expanding sub-menu for mobile version.

= 2.2.9.2 =
* Fix: Fixed RTL style issue.

= 2.2.9.1 =
* Fix: Fixed RTL issue.

= 2.2.9 =
* Added: New feature to add any HTML or Shortcode instead of an Icon. For example you can add JSON animated or SVG icons. Configured in "Appearance > Menus".
* Fix: Improved compatibility with WordPress 5.5. Now plugin backend code is also without jQuery dependency.

= 2.2.8.2 =
* Fix: Fixed bug with colors at "Top level and hover and active text color" and "Sticky top level hover and active text color".
* Fix: Bug with colors for mobile menu links, cart icon and toolbar social buttons on  pages with WooCommerce together with Divi theme.

= 2.2.8.1 =
* Fix: Improved visibility of content sizes in the menu block for JavaScript calculations. Rarely is there such a need for complex content in menu blocks.

= 2.2.8 =
* Fix: Increased priority of CSS rules for links in menu items. It is prevents color overwriting when Groovy Menu is integrated using the Divi builder.
* Fix: Fixed cart opening issue that appears when quickly move mouse between the menu item and the cart icon.
* Fix: Added changes to the styles for the mini cart.  Most styles now have the! Important property. These changes are aimed at preventing overwriting styles of cart by the theme styles.
* Added: Added the opportunity to enable scrollbar for Minimalistic menu type.

= 2.2.7.1 =
* HotFix: Fixed an issue with appearance the mega menu content that created with Divi builder, which occurred on Woocommerce product pages only.

= 2.2.7 =
* Added: SEO improvements. Added the ability to select the alt text for the logo.
* Improve: Added "Fade in out" effect for "Submenu appearance style".
* Improve: Setting "Submenu appearance style" is now available for all menu types except Minimalistic.
* Fix: Added the fadeout effect for submenus "Submenu appearance style" - "Animate from bottom" that has missed at GM 2.2.5.2
* Fix: The "Submenu hover style" - "Shift right" setting has been fixed for the Expanding sidebar menu on the right.

= 2.2.6 =
* Added: Added option "Mobile menu" - "Show Woo minicart" that will be enable to show the Woocomerce minicart on the mobile.
* Fix: Fixed bug with "Submenu appearance style" - "Animate from bottom".
* Fix: Bug with "Change Top level menu background color" when submenu is opened", there were cases when the color did not return to the default after closing all submenus.
* Fix: Added default styles for all menu links that remove the underline style for links in all states as hover, active, focus, visited.

= 2.2.5.3 =
* HotFix: Added an additional check of the preset options for number type in order to exclude operations with values ​​outside the minimum and maximum values.  This also improves compatibility with presets created in the earlier versions of Groovy Menu Free.
* Fix: Preventing early closing of dropdown items for search and Woocomerce minicart.

= 2.2.5.2 =
* HotFix: Fixed dropdown behavior when "Show submenu - On click" option is enabled.
* Fix: Added minor changes in CSS styles, that is allowed to resolve an issue when the submenu is out of the screen.

= 2.2.5.1 =
* HotFix: Fixed calculation of the height for a scroll object. That occurs in some cases when the "Submenu appearance style": "Animate from bottom" preset setting was active.

= 2.2.5 =
* Added: Added new feature the "Scrollbar". That allows scrolling for long lists of submenus and mega menus.
* Improve: "Expanded sidebar": Icons for the first menu level now are always centered relative to the initial width of the sidebar.
* Improve: "Expanded sidebar": Right side menu type are to display menu item items from right to left now.
* Improve: The "Submenu hover style" option is now available for all menu types except Minimalistic.

= 2.2.4.1 =
* HotFix: Fixed issue with buttons in Woo mini cart.

= 2.2.4 =
* Fix: New option "General > Mega menu > Add Mega menu columns padding". Enabled by default.

= 2.2.3 =
* Fix: The issue with overlapped mega menu blocks
* Fix: If the menu block created using Divi builder has been assign in the menu the link to the editor in wp-adminbar was replaced.
* Fix: Added minor fixes that help in some cases prevent changes Groovy Menu styles through WordPress templates.
* Fix: Some issues that appeared in the type of menu "Expanded sidebar" have been fixed.
* Improve: Optimized opening/closing submenus and mega menus for all types of menu. Added time delays to close dropdown menus. This will allow the site visitors to improve the experience with menu interaction and move on smoothly to adjacent drop-down menus diagonally.
* Improve: Removed side paddings for Mega menu.
* Improve: Settings for "Submenu" and "Mega menu" has been moved into own sections
* Added: New option "Mega menu background color".
* Added: New option for Expanded sidebar "Submenu width".

= 2.2.2 =
* Added: New option "Change Top level menu background color when the submenu is opened".
* Improve: JavaScript files has been optimized. As a result, the JS file sizes has been seriously reduced. Now Groovy Menu loads faster.

= 2.2.1 =
* Fix: Fixed the flicker effect when you click on the active anchor link.

= 2.2.0 =
* Added: Added a new type of menu "Expanding sidebar".
* Added: Added logo paddings settings for "Expanding sidebar".
* Added: New option for the logo position "Enable fit logotype to the sidebar area" for menu type "Icon Sidebar".

= 2.1.1 =
* Improve: Added the Element (widget) for Elementor builder.

= 2.1.0 =
* Improve: Plugin performance improved for "Appearance > Menus" section.
* Improve: Groovy menu settings in "Appearance > Menus section" has been moved to modal window.
* Improve: Recommended system requirements for value PHP max_input_vars is reduced from 10000 to 1000 (Is a standard settings for a shared hosting).
* Fix: Anchors highlight for centered logo menu style.

= 2.0.16 =
* Fix: Added compatibility with Avada theme through automatic integration.
* Fix: Added compatibility for menu blocks with Fusion Builder (Avada theme).

= 2.0.15 =
* Fix: Resolved conflict сaused by Сomposer autoload (dependency manager for PHP) with some other plugins in some cases.
* Fix: Removed the menu overlapping on content during page editing in Elementor with the "Enable Groovy menu to overlap the first block in the page" option enabled.

= 2.0.14 =
* Improve:  Design of integration section.
* Improve: Added the possibility to set different logo URLs for WPML.
* Fix: Increased priority of the handler of admin nav_menu in WP Dashboard -> Appearance -> Menus. This eliminates conflicts with some plugins.
* Fix: Added the possibility to hide Groovy menu layout from not public post types. Managed in Global setting -> Tools -> Enable displaying the Groovy menu layout into Menu blocks post type.

= 2.0.13 =
* Fix: Fixed conflict with Divi Builder and the gm_menu_block post type.

= 2.0.12 =
* Improve: Added module for Divi Theme Builder.

= 2.0.11 =
* Improve: Added the ability to disable the mobile menu.

= 2.0.10 =
* Fix: Fixed menu item colors for Hover Style 3,4,6 in sticky mode.

= 2.0.9.2 =
* Fix: Fixed minor bugs.

= 2.0.9.1 =
* Fix: Icon position for sidebar type of Groovy Menu.

= 2.0.9 =
* Fix: Fixed fonts issue that appears while editing a preset and displaying a previously saved font in some cases
* Fix: Fixed bug with the export of preset.  Fallback is also provided in case of blocking the downloading of files from the site.
* Fix: Fixed bug with sub-menu icon.
* Improve: Additional characters are allowed in the rename a preset name.

= 2.0.8 =
* Fix: Improved work with caching plugins. A case with multiple saving preset styles has been fixed.
* Fix: Auto integration will be applied only once on the page, immediately after the HTML tag <BODY>.

= 2.0.7 =
* Fix: menu_block with shortcodes did not work properly with bbPress plugin pages.
* Fix: Hide title by "-" symbol.

= 2.0.6 =
* Fix: Fixed fit on the screen of search icons and mini-cart for iOS.
* Fix: Preset preview fix.

= 2.0.5.1 =
* Fix: Fixed php notice: "Undefined variable isCustom".

= 2.0.5 =
* New Feature: Added "Custom" setting to select a "Search form type". Now you can add any custom design created in the "Menu Block", that will be displayed in the search area, including fullscreen mode.
* Improve: Added setting for choosing background color to search screen in fullscreen mode.
* Fix: The search query now is considering the language setting, with installed and active the multilanguage WPML plugin.
* Fix: "Groovy Menu blocks" is rename to "Menu blocks".
* Fix: "Global settings" button not working on the "Integration" section.
* Fix: Not an active text below search icon in the sidemenu.

= 2.0.4 =
* Fix: Fixed bug with the wrong colors at hovering over menu items for a sticky menu.
* Fix: Fixed bug with duplicate, assignment and deleting the presets of the menu.
* Fix: Fixed bug with RTL issue.

= 2.0.3 =
* Fix: Plugin update script is fixed.

= 2.0.2 =
* Fix: Fixed a bug when the option "Top level links with align center must considering logo width" has been ignored.
* Fix: Text size for social icons in the toolbar now also depends on the preset option "Toolbar social icon size".
* Fix: Fixed a bug when Woocommerce mini-cart aren't displayed in the mobile version.

= 2.0.1 =
* Fix: Fixed minimalistic menu bug with centered logo.

= 2.0.0 =
* Improve: All plugin code has been rewritten as Vanilla JS (Pure JS) without using jQuery.
* Improve: Restructuring of plugin files. Now the main components are located in their own modules.
