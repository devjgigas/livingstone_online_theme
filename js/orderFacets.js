/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

jQuery(document).ready( function($) {
$lisDate = $("li.mods_originInfo_type_normalized_dateOther_t"); 
    var dateOrderedLis = $lisDate.sort(function (a, b) { 
        return $(a).find("a").text() > $(b).find("a").text();
    });
    $("li.mods_originInfo_type_normalized_dateOther_t").parent("ul").html(dateOrderedLis);
    
$lisCreator = $("li.mods_name_personal_creator_namePart_s"); 
    var creatorOrderedLis = $lisCreator.sort(function (a, b) {
        return $(a).find("a").text() > $(b).find("a").text();
    });
    $("li.mods_name_personal_creator_namePart_s").parent("ul").html(creatorOrderedLis);
    
$lisAddressee = $("li.mods_name_personal_addressee_namePart_s"); 
    var addressesOrderedLis = $lisAddressee.sort(function (a, b) {
        return $(a).find("a").text() > $(b).find("a").text();
    });
    $("li.mods_name_personal_addressee_namePart_s").parent("ul").html(addressesOrderedLis); 
    
$lisRepo = $("li.mods_relatedItem_original_name_corporate_namePart_s"); 
    var repoOrderedLis = $lisRepo.sort(function (a, b) {
        return $(a).find("a").text() > $(b).find("a").text();
    });
    $("li.mods_relatedItem_original_name_corporate_namePart_s").parent("ul").html(repoOrderedLis);    
    
$lisGenre = $("li.mods_genre_s"); 
    var genreOrderedLis = $lisGenre.sort(function (a, b) {
        return $(a).find("a").text() > $(b).find("a").text();
    });
    $("li.mods_genre_s").parent("ul").html(genreOrderedLis);         
  
  if($("td.mods_titleInfo_title_hlt").length===0){
            $("<td class='mods_titleInfo_title_hlt'>&nbsp;</td>").insertAfter("td.access_hlt");
   }
   if($("td.mods_originInfo_dateCreated_hlt ").length===0){
            $("<td class='mods_originInfo_dateCreated_hlt'>&nbsp;</td>").insertAfter("td.mods_titleInfo_title_hlt");
   } 
    if($("td.creator_hlt").length===0){
            $("<td class='creator_hlt'>&nbsp;</td>").insertAfter("td.mods_originInfo_dateCreated_hlt"); 
   }   
   if($("td.addressee_hlt").length===0){
     $("<td class='addressee_hlt'>&nbsp;</td>").insertAfter("td.creator_hlt");        
   }   
   if($("td.mods_originInfo_place_placeTerm_text_hlt").length===0){
            $("<td class='mods_originInfo_place_placeTerm_text_hlt'>&nbsp;</td>").insertAfter("td.addressee_hlt");        
   }   
   if($("td.mods_physicalDescription_extent_mm_hlt").length===0){
     $("<td class='mods_physicalDescription_extent_mm_hlt'>&nbsp;</td>").insertAfter("td.mods_originInfo_place_placeTerm_text_hlt");               
   }   
   if($("td.mods_physicalDescription_extent_pages_hlt").length===0){
     $("<td class='mods_physicalDescription_extent_pages_hlt'>&nbsp;</td>").insertAfter("td.mods_physicalDescription_extent_mm_hlt");                      
   }   
   if($("td.genre_hlt").length===0){
      $("<td class='genre_hlt'>&nbsp;</td>").insertAfter("td.mods_physicalDescription_extent_pages_hlt");                             
   }   
   if($("td.repository_hlt").length===0){
       $("<td class='repository_hlt'>&nbsp;</td>").insertAfter("td.genre_hlt");                                   
   }   
   if($("td.mods_identifier_local_NLS_copy_identifier_hlt").length===0){
            $("<td class='mods_identifier_local_NLS_copy_identifier_hlt'>&nbsp;</td>").insertAfter("td.repository_hlt");                                    
   }   
   if($("td.otherVersions_hlt").length===0){
         $("<td class='otherVersions_hlt'>&nbsp;</td>").insertAfter("td.mods_identifier_local_NLS_copy_identifier_hlt");                                        
   }   
    if($("td.mods_identifier_local_Canonical_Catalog_Number_hlt").length===0){
          $("<td class='mods_identifier_local_Canonical_Catalog_Number_hlt'>&nbsp;</td>").insertAfter("td.otherVersions_hlt");                                           
   } 
   
    
       
        $("td.addressee_hlt").hide();
        $("td.mods_originInfo_place_placeTerm_text_hlt").hide();
        $("td.mods_physicalDescription_extent_pages_hlt").hide();
        $("td.mods_physicalDescription_extent_mm_hlt").hide();
        $("td.genre_hlt").hide();
        $("td.mods_identifier_local_NLS_copy_identifier_hlt").hide();
        $("td.otherVersions_hlt").hide();
        $("td.mods_identifier_local_Canonical_Catalog_Number_hlt").hide();
        
        $("th.addressee_s").hide();
        $("th.mods_originInfo_place_placeTerm_text_s").hide();
        $("th.mods_physicalDescription_extent_pages_s").hide();
        $("th.mods_physicalDescription_extent_mm_s").hide();
        $("th.genre_s").hide();
        $("th.mods_identifier_local_NLS_copy_identifier_s").hide();
        $("th.otherVersions_s").hide();
        $("th.mods_identifier_local_Canonical_Catalog_Number_s").hide();
        
       
        
        
        $('#fullRecord').change(function() {
    if ($(this).is(':checked')) {
        console.log($(this).val() + ' is now checked');
       
        
        $("td.addressee_hlt").show();
        $("td.mods_originInfo_place_placeTerm_text_hlt").show();
        $("td.mods_physicalDescription_extent_pages_hlt").show();
        $("td.mods_physicalDescription_extent_mm_hlt").show();
        $("td.genre_hlt").show();
        $("td.mods_identifier_local_NLS_copy_identifier_hlt").show();
        $("td.otherVersions_hlt").show();
        $("td.mods_identifier_local_Canonical_Catalog_Number_hlt").show();
        
        $("th.addressee_s").show();
        $("th.mods_originInfo_place_placeTerm_text_s").show();
        $("th.mods_physicalDescription_extent_pages_s").show();
        $("th.mods_physicalDescription_extent_mm_s").show();
        $("th.genre_s").show();
        $("th.mods_identifier_local_NLS_copy_identifier_s").show();
        $("th.otherVersions_s").show();
        $("th.mods_identifier_local_Canonical_Catalog_Number_s").show();
        
    } else {
        console.log($(this).val() + ' is now unchecked');
        
        $("td.addressee_hlt").hide();
        $("td.mods_originInfo_place_placeTerm_hlt").hide();
        $("td.mods_physicalDescription_extent_pages_hlt").hide();
        $("td.mods_physicalDescription_extent_mm_hlt").hide();
        $("td.genre_hlt").hide();
        $("td.mods_identifier_local_NLS_copy_identifier_hlt").hide();
        $("td.otherVersions_hlt").hide();
        $("td.mods_identifier_local_Canonical_Catalog_Number_hlt").hide();
        
        $("th.addressee_s").hide();
        $("th.mods_originInfo_place_placeTerm_s").hide();
        $("th.mods_physicalDescription_extent_pages_s").hide();
        $("th.mods_physicalDescription_extent_mm_s").hide();
        $("th.genre_s").hide();
        $("th.mods_identifier_local_NLS_copy_identifier_s").hide();
        $("th.otherVersions_s").hide();
        $("th.mods_identifier_local_Canonical_Catalog_Number_s").hide();
    }
});
 
$('.islandora-solr-content tr td:first-child a').text(
    function(i,text){
        return text.replace( /\d+/g, 'view');
    });
    
    $('.islandora-solr-content tr td:first-child').addClass('access_hlt');
    
    // move show more or show less on top
    
    dateShowLink = $( ".Date .soft-limit" ).detach();
    creatorShowLink = $( ".Creator .soft-limit" ).detach();
    genreShowLink = $( ".Genre .soft-limit" ).detach();
    dateShowLink.insertBefore(".Date h3");
    creatorShowLink.insertBefore(".Creator h3");
    genreShowLink.insertBefore(".Genre h3");
    
    //move pagination above the sort block
    
    pagingInfo = $( ".islandora-solr-content" ).children(".item-list").first().detach();
    pagingInfo.insertBefore(".islandora-solr-sort table");
    
    $("td.otherVersions_hlt").each(
            function( index ) {
  console.log( index + ": " + $( this ).text() );
  otherVersionText = $(this).text();
  otherVeriosnArray = otherVersionText.split(" ");
  finalVersion  = "";
  for (i = 0; i < otherVeriosnArray.length; i++) {
    if(otherVeriosnArray[i].indexOf("http://") == 0){
        finalVersion += '<a href="' + otherVeriosnArray[i] + '">Link to Other Version</a> ';
    }else{
    finalVersion += otherVeriosnArray[i] + " ";
    }
    
    }
    $(this).html(finalVersion);
            } 
                    
            );
    $(".soft-limit").click(function(e) {
          // toggle class .hidden
          $(this).parent().children().last().toggleClass('hidden');
          $(this).toggleClass('facet_clicked');
          /*if ($(this).text() == 'Show more') {
            $(this).text('Show less');
          }
          else {
            $(this).text('Show more');
          }*/
          e.preventDefault();
        });
});



