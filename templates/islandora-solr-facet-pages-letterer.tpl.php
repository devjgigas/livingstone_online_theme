<ul class="islandora-solr-facet-pages-letterer">
  <?php
    $active = t('ALL') == $prefix ? 'active' : '';
    $classes = array(
      'letter',
      'first',
      $active,
    );
  ?>
  <li class="<?php print implode(' ', $classes); ?>">
    <?php
      $title = t('Browse all');
      $options = array(
        'attributes' => array('title' => $title, 'class' => array($active)),
      );
      print l(t('ALL'), "his-own-words/{$path}", $options);
    ?>
  </li>
  <?php foreach ($facet_queries as $query => $count) : ?>
    <?php
      $value = $fq_map[$query];
      $active = $value == $prefix ? 'active' : '';
      $classes = array(
        'letter',
        $active,
      );
    ?>
    <li class="<?php print implode(' ', $classes); ?>">
      <?php
        if ($count > 0) {
          $title = t('Browse starting with @letter', array(
            '@letter' => $value,
          ));
          $options = array(
            'attributes' => array('title' => $title),
            'query' => array('prefix' => $value),
          );
          print l($value, "in-his-own-words/{$path}", $options);
        }
        else {
          print $value;
        }
      ?>
    </li>
  <?php endforeach; ?>
</ul>
