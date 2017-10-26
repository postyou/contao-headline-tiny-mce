<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package Core
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * This is the tinyMCE (rich text editor) configuration file. Please visit
 * http://tinymce.moxiecode.com for more information.
 */
if ($GLOBALS['TL_CONFIG']['useRTE']):
    ?>
    <script>window.tinymce || document.write('<script src="<?php echo TL_ASSETS_URL; ?>assets/tinymce4/tinymce.gzip.js">\x3C/script>')</script>
    <script>
        window.tinymce && tinymce.init({
            skin: "contao",
            body_class: "h_mce_body",
            selector: "#<?php echo $selector; ?>",
            language: "<?php echo Backend::getTinyMceLanguage(); ?>",
            element_format: "html",
            document_base_url: "<?php echo Environment::get('base'); ?>",
            entities: "160,nbsp,60,lt,62,gt,173,shy",
            init_instance_callback: function (editor) {
                editor.on('focus', function () {
                    Backend.getScrollOffset();
                });
            },
            templates: [
                <?php echo Backend::getTinyTemplates(); ?>
            ],
            plugins: "autosave code paste",
            browser_spellcheck: true,
            importcss_append: true,
            importcss_groups: [{title: "<?php echo Config::get('uploadPath'); ?>/tinymce.css"}],
            content_css: "<?php echo TL_PATH; ?>/system/themes/tinymce.css,system/modules/headline-tiny-mce/assets/css/h_tinyMce.css,<?php echo TL_PATH . '/' . Config::get('uploadPath'); ?>/tinymce.css",
            extended_valid_elements: "strong/b",
            menubar: false,
            setup: function (ed) {
                ed.on('init', function (args) {
                    var id = ed.id;
                    var height = 25;
                    document.getElementById(id + '_ifr').style.height = height + 'px';
                });
            },
            resize: false,
            //Achtung wird die Toolbar angepasst muss das "valid_elemets Tag mit angepasst werden"
            toolbar: "bold | italic",
            valid_elements: "b,i,b/strong,i/em",
            //
            statusbar: false,
            forced_root_block: false,
            force_br_newlines: true,
            force_p_newlines: false,
			font_formats: "Arial=arial,helvetica,sans-serif;Courier New=courier new,courier,monospace",
            schema: "html5"


        });
    </script>
<?php endif; ?>
