<!DOCTYPE html>
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces; ?>>
<head>
<!-- @import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,400italic,700italic|Crimson+Text:400,600,700,400italic,600italic|Patua+One);  -->
<?php print $head; ?>
<title><?php print $head_title ?></title>
<?php print $styles; ?>
<?php print $scripts; ?>
<meta name="format-detection" content="telephone=no"/>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,400italic,700italic|Crimson+Text:400,600,700,400italic,600italic|Patua+One' rel='stylesheet' type='text/css'>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<!--[if lt IE 9]><script src="<?php print base_path() . drupal_get_path('theme', 'lo') . '/js/html5.js'; ?>"></script><![endif]-->
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
</body>
</html>