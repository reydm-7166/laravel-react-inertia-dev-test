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

1. Composer install
2. add this to .env 
```bash
TIME_ZONE='Asia/Manila'
```
2. php artisan migrate
3. php artisan db:seed
4. php artisan serve
5. npm run build
6. npm run dev
