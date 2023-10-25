/* Seperator
* @since ProLooks 3
--------------------------------------------- */

/**
 * Remove block variations
 */
wp.domReady(() => {
  wp.blocks.unregisterBlockStyle("core/separator", "wide");
  wp.blocks.unregisterBlockStyle("core/separator", "dots");
});
