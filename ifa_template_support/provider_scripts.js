/**
 * Extract Solututions Links
 * Michael Wedd, July 2019
 * Goal: Hide the theme's block that's filtering solutions data for us, extract its links and return them to the DOM in a div with a class we can control. 
 * This basically lets the theme output a filter block, snags its data and then allows us to control that data completely. 
 * Otherwise, you have to find all the theme's styles and its way of nesting data in blocks. 
 */

var solutionsLinks = jQuery( '#js-our-solutions' ).find( 'a' );

// get rid of whatever the theme sent us now.
jQuery( '#js-our-solutions' ).replaceWith( `<div class="our-solutions-holder" id="js-solutions-holder"><ul id="js-our-solutions-ul" class="solutions-link-ul"></ul></div>` )

// append each link to the new container div.
solutionsLinks.each( ( index ) => {
  var link = solutionsLinks[index].outerHTML
  jQuery( '#js-our-solutions-ul' ).append( `<li class="solutions-link-li">${link}</li>` )
} );

// cleanup
jQuery( 'div.hide-default-our-solutions-block' ).remove()
