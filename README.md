## Answer for ITEM 3. 
```bash
function add_script_to_specific_page() {
    if (is_page((place here either ID or SLUG))) {
        ?>
        <script>
            // place the script process/specific here
        </script>
        <?php
    }
}
add_action('wp_head', 'add_script_to_specific_page');
```
