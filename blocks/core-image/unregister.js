/* Image
* @since ProLooks 2
--------------------------------------------- */

/**
 * Remove block variations
 */
wp.domReady(() => {
  wp.blocks.unregisterBlockStyle("core/image", "rounded");
});
