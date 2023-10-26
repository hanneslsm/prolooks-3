/** Button
 * @since ProLooks 3
 * --------------------------------------------- */

/**
 * Unregister block styles

wp.domReady(() => {
  wp.blocks.unregisterBlockStyle("core/button", "fill");
});

 */

wp.domReady(() => {
  wp.blocks.unregisterBlockStyle("core/button", "outline");
});
