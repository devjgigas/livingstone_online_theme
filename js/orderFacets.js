(function ($) {
  $(document).ready(function () {
    // Sort all facet boxes alphabetically
    $("ul.islandora-solr-facet").each(function () {
      $(this).html($('li', this).sort(function (a, b) {
        return $('a:first', a).text() > $('a:first', b).text() ? 1 : -1;
      }));
    });
    // Move pager above sort block.
    $(".islandora-solr-content" )
      .children(".item-list")
      .first()
      .detach()
      .insertBefore(".islandora-solr-sort table");
    // Move header into the content table below to get proper formatting.
    $(".islandora-solr-sort tr")
      .first()
      .detach()
      .insertBefore('.islandora-solr-content tr:first');
    // Fetch which columns display can be toggled.
    function get_togglable_columns() {
      var columns = [
        'Addressee',
        'Place Created',
        'Extent (pages)',
        'Extent (size)',
        'Genre',
        'Copy of Item',
        'Other Versions',
        'C&C Catalogue Number'
      ];
      var elements = $([]);
      $.each(columns, function (key, value) {
        var header = $('.islandora-solr-content th a:contains(' + value + ')').parent('th'),
            index = header.index() + 1;
        elements = elements.add(header).add('.islandora-solr-content td:nth-child(' + index + ')');
      });
      return elements;
    }
    // Hide first pass.
    get_togglable_columns().hide();
    // Bind toggle of columns to the full records element.
    $('#fullRecord').change(function () {
      var columns = get_togglable_columns();
      if ($(this).is(':checked')) {
        columns.show();
      } else {
        columns.hide();
      }
    });
    // Insert links in table.
    $("td:contains('http://')").each(function (index) {
      this.innerHTML = this.innerHTML.replace(/(http\:\/\/[^ ]*)/gi, '<a href="$1" target="_blank">link</a>');
    });
    $("td:contains('https://')").each(function (index) {
      this.innerHTML = this.innerHTML.replace(/(https\:\/\/[^ ]*)/gi, '<a href="$1" target="_blank">link</a>');
    });
    // Access Links.
    $('.islandora-solr-content tr td:first-child a').text(function (i,text){
      return text.replace( /\d+/g, 'view');
    });
    // Move show more or show less above the facet block.
    $(".soft-limit").each(function () {
      var parent = $(this).parent('.islandora-solr-facet-wrapper').find('h3');
      $(this).detach().insertBefore(parent);
    });
    // Facet display toggles need to be re-assigned.
    $(".soft-limit").click(function(e) {
      // toggle class .hidden
      $(this).parent().children().last().toggleClass('hidden');
      $(this).toggleClass('facet_clicked');
      e.preventDefault();
    });
  });
}(jQuery))
