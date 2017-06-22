/*jslint browser: true*/
/*global jQuery, Drupal*/
/**
 * @file
 * Adjusts the header to respect the height of the admin menu.
 */
(function ($) {
  'use strict';

  /**
   * Responsive admin menu.
   */
  Drupal.behaviors.adminMenuResponsive = {
    attach: function (context, settings) {
      function position_relative_below_admin_menu_function(element) {
        return function () {
          var admin_menu = $('#admin-menu');
          if (admin_menu.length == 1) {
            var value = admin_menu.height();
            // Explicitly set the style to get around the admin-menu
            // using !important in it's style sheet.
            element.attr('style', 'margin-top: ' + value + 'px' + ' !important');
          }
        };
      }

      // The modal viewer is a special case since it has a fixed position.
      function position_modal_below_admin_menu_function(element) {
        return function () {
          var admin_menu = $('#admin-menu');
          if (admin_menu.length == 1) {
            var offset = $(window).width() <= 568 ? 0 : 8;
            var value = admin_menu.height() + offset;
            // Explicitly set the style to get around the admin-menu
            // using !important in it's style sheet.
            element.attr('style', 'padding-top: ' + value + 'px' + ' !important');
          }
        };
      }

      function position_relative_below_admin_menu() {
        var func = position_relative_below_admin_menu_function($(this));
        func();
        $(window).resize(func);
      }

      function position_modal_below_admin_menu() {
        var func = position_modal_below_admin_menu_function($(this));
        func();
        $(window).resize(func);
      }

      $('body', document).once('adminMenuResponsive', position_relative_below_admin_menu);
      $('.region-fixed-header', document).once('adminMenuResponsive', position_relative_below_admin_menu);
      $('.slideout-menu', document).once('adminMenuResponsive', position_relative_below_admin_menu);
      $('div.livingstone-manuscript-viewer-modal', document).once('adminMenuResponsive', position_modal_below_admin_menu);
      $('div.livingstone-manuscript-viewer-download-modal', document).once('adminMenuResponsive', position_modal_below_admin_menu);
    }
  };

  /**
   * Sticky footer responsive support.
   */
  Drupal.behaviors.stickyFooterResponsive = {
    attach: function (context, settings) {
      $('body.front', document).once('stickyFooterResponsive', function () {
        var body = $(this);

        function adjust_footer() {
          var footer = $('body > footer');
          if (footer.length == 1) {
            body.css('margin-bottom', footer.height());
          }
        }

        adjust_footer();
        $(window).resize(adjust_footer);
        $('img').bind('load', adjust_footer);
      });
    }
  };

  /**
   * Initialize the slick nav jquery plugin.
   */
  Drupal.behaviors.slickNav = {
    attach: function (context, settings) {
      // Main navigation.
      $('nav .menu.primary', document).once('slickNav', function () {
        $(this).slicknav ({
          label: 'Site sections and pages',
          closedSymbol: '',
          openedSymbol: '',
          removeClasses: true,
          removeStyles: true,
          appendTo: '#mobile-navigation'
        });
        $('#mobile-navigation .slicknav_arrow, #mobile-navigation .slicknav_icon').addClass('glyphicon');
      });
      // Section Page: Table of contents.
      $('.field-name-field-section-table-of-contents .menu.nav', document).once('slickNav', function () {
        $(this).slicknav ({
          label: 'Critical Edition - Table of Contents',
          closedSymbol: '',
          openedSymbol: '',
          removeClasses: true,
          removeStyles: true,
          prependTo: '.field-name-field-section-table-of-contents'
        });
        $('.field-name-field-section-table-of-contents .slicknav_arrow, .field-name-field-section-table-of-contents .slicknav_icon').addClass('glyphicon');
        $('.field-name-field-section-table-of-contents .table-of-contents-modal').prependTo('body');
        $('.field-name-field-section-table-of-contents .slicknav_btn').click(function () {
          var modal = $('.table-of-contents-modal');
          if (modal.hasClass('open')) {
            modal.removeClass('open');
          }
          else {
            modal.addClass('open');
          }
        });
        // Close when clicked outside.
        $(document).mouseup(function(event) {
          var container = $('.slicknav_menu');
          // if the target of the click isn't the container nor a descendant of the container
          if (!container.is(event.target) && container.has(event.target).length === 0 && $('.table-of-contents-modal').hasClass('open')) {
            $('.field-name-field-section-table-of-contents .slicknav_btn').click();
          }
        })
      });
    }
  };

  /**
   * Do not close the search type checkbox tooltip when clicked on, resize the dropdown to match the input length.
   */
  Drupal.behaviors.livingstoneSearchForm = {
    attach: function (context, settings) {
      $('.form-search', document).once('livingstoneSearchForm', function () {
        var form = $(this);
        // Resize dropdown.
        $('.dropdown-menu', form).css('width', $('.input-group', form).width());
        $(window).resize(function () {
          $('.dropdown-menu', form).css('width', $('.input-group', form).width());
        });
        // Prevent clicks from closing the tooltip.
        $('a[href="#"]', form).click(function (e) {
          return e.stopPropagation();
        });
      });
    },
    detach: function (context) {
      var base = $('.form-search');
      base.removeClass('livingstoneSearchForm-processed');
      base.removeData();
      base.off();
    }
  };

  /**
   * Move the node queue pager when the user scrolls past it.
   */
  Drupal.behaviors.livingstoneNodeQueuePager = {
    attach: function (context, settings) {
      $('.block-nodequeue-pager', document).once('livingstoneNodeQueuePager', function () {
        var pager = $(this),
            pager_container = $(this).parent();
        function reposition_pager() {
          var winY = window.pageYOffset,
              parentY = pager_container.scrollTop();
          if (winY > parentY) {
            pager.css('position', 'fixed');
            pager.css('width', pager_container.width());
          }
          else {
            pager.css('position', 'relative');
            pager.css('width', 'auto');
          }
        }
        $(window).scroll(reposition_pager);
        $(window).resize(reposition_pager);
      });
    },
    detach: function (context) {
      var base = $('.block-nodequeue-pager');
      base.removeClass('livingstoneNodeQueuePager-processed');
      base.removeData();
      base.off();
    }
  };

  /**
   * Display the fixed header when the user scrolls past it.
   */
  Drupal.behaviors.livingstoneFixedHeader = {
    attach: function (context, settings) {
      $('.region-fixed-header', document).once('livingstoneFixedHeader', function () {
        var fixed_header = $(this),
            header = $(this).parents('header');
        function reposition_pager() {
          var winY = window.pageYOffset,
              parentY = header.scrollTop() + header.outerHeight();
          if (winY > parentY) {
            fixed_header.addClass('show');
          }
          else {
            fixed_header.removeClass('show');
          }
        }
        $(window).scroll(reposition_pager);
        $(window).resize(reposition_pager);
      });
    },
    detach: function (context) {
      var base = $('.region-fixed-header');
      base.removeClass('livingstoneFixedHeader-processed');
      base.removeData();
      base.off();
    }
  };

  /**
   * Toggle the display of the slide out menu.
   */
  Drupal.behaviors.livingstoneSlideOutMenu = {
    attach: function (context, settings) {
      $('.slideout-menu-toggle', document).once('livingstoneSlideOutMenu', function () {
        $(this).on('click', function (event) {
          event.preventDefault();

          // create menu variables.
          var slideoutMenu = $('.slideout-menu');
          var slideoutMenuWidth = $('.slideout-menu').width() + 2;

          // toggle open class.
          slideoutMenu.toggleClass("open");

          // slide menu.
          if (slideoutMenu.hasClass("open")) {
            slideoutMenu.animate({
              left: "0px"
            });
          } else {
            slideoutMenu.animate({
              left: -slideoutMenuWidth
            }, 250);
          }
        });
      });
    }
  };

  /**
   * Toggle the display of the slide out menu.
   */
  Drupal.behaviors.livingstoneEncodingGuidelines = {
    attach: function (context, settings) {
      $('.node.uuid-255bf215-fc27-4341-8695-a0a7b4a38d6f', document).once('livingstoneEncodingGuidelines', function () {
        var parent = $(this).next();
        function adjust_height() {
          $('iframe', parent).height($('iframe', parent).contents().height());
        }
        $('iframe', parent).load(adjust_height);
        $(window).resize(adjust_height);
      });
    }
  }

}(jQuery));

