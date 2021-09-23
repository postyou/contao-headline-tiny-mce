Contao Headline TinyMCE
============
[![](https://img.shields.io/packagist/v/postyou/headline-tiny-mce.svg)](https://packagist.org/packages/postyou/headline-tiny-mce)
[![](https://img.shields.io/packagist/l/postyou/headline-tiny-mce.svg)](https://packagist.org/packages/postyou/headline-tiny-mce)
[![](https://img.shields.io/packagist/dt/postyou/headline-tiny-mce.svg)](https://packagist.org/packages/postyou/headline-tiny-mce)

This Contao CMS extension adds a small TinyMCE editor to all DCA `headline` fields and allows HTML tags for them.

![](docs/Headline-TinyMCE-Editor.png)

## Template
The `be_tinyHeadlineMCE.html5` template is applied and disables the default paragraph root block and limits the valid elements. Only [phrasing content](https://www.w3.org/TR/2014/REC-html5-20141028/dom.html#phrasing-content-1) should be allowed inside of HTML headings.
```php
<script>
window.tinymce && tinymce.init({
  ...

  // limit height
  height: 110,

  // disable menubar
  menubar: false,

  // disable default <p></p> root blocks
  forced_root_block: false,

  // limit toolbar according to valid_elements
  toolbar: 'link unlink | bold italic | code',
  valid_elements: 'a[href|target|title],strong/b,em/i,br'
});
</script>
```
