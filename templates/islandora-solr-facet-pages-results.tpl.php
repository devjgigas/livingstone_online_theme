<?php
/**
 * @file
 * islandora-solr-facet-pages-results.tpl.php
 * Islandora solr template file for facet results
 *
 * Variables available:
 * - $variables: all array elements of $variables can be used as a variable. e.g. $base_url equals $variables['base_url']
 * - $base_url: The base url of the current website. eg: http://example.com .
 * - $user: The user object.
 *
 * - $results: Array containing search results to render
 * - $solr_field: Facet solr field to be used to create url's including a filter
 *
 */
?>
<ul class="islandora-solr-facet-pages-results">
  <?php foreach ($results as $result => $count): ?>
    <li>
      <?php
        $filter = $solr_field . ':"' . addslashes($result) . '"';
        $resultExplodeArray = explode(':', $result);
        print l(truncate_utf8(html_entity_decode($resultExplodeArray[0]), 72, TRUE, TRUE), 'in-his-own-words/catalogue', array(
          'query' => array('f' => array($filter)))
        );
      ?>
      <span class="bucket-size">(<?php print $count; ?>)</span>
      <?php
        if(trim($resultExplodeArray[1]) != false) {
          print " - ". html_entity_decode($resultExplodeArray[1]);
        }
      ?>
    </li>
  <?php endforeach; ?>
</ul>
