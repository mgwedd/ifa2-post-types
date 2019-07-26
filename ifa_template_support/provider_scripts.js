/**
 * Extract Solututions Links
 * Michael Wedd, July 2019
 * Goal: Hide the theme's block that's filtering solutions data for us, extract its links and return them to the DOM in a div with a class we can control. 
 * This basically lets the theme output a filter block, snags its data and then allows us to control that data completely. 
 * Otherwise, you have to fight all the theme's styles and its way of nesting data in blocks. 
 * This causes the solutions block to load slight behind the rest of the page, but that's fine.
 */

function trimText( text, maxLength) {
  if (text.length > maxLength) {
    return text.slice(0, maxLength - 3) + ' ...';
  } 
  return text;
 }

function renderCustomSolutionsSidebar() {
  // get all post links that are a child of the title.
  var solutionsLinks = jQuery( '#js-our-solutions' ).find( 'h3.entry-title' ).children();

  // get rid of whatever the theme sent us now.
  jQuery( '#js-our-solutions' ).replaceWith( '<div class="our-solutions-holder" id="js-solutions-holder"><ul id="js-our-solutions-ul" class="solutions-link-ul"></ul></div>' );

  // append each link to the new container div.
  solutionsLinks.each( ( index ) => {
    var linkArr = solutionsLinks[index].outerHTML.match(/href="([^"]*)/);
    var link;
    var linkTitle;
    if (linkArr.length >= 2) {
      link = linkArr[1];
      linkTitle = trimText(solutionsLinks[index].innerHTML, 48);
    }
    jQuery( '#js-our-solutions-ul' ).append( `<a class="solutions-link" href="${link}" rel="bookmark" target="_blank" title="${linkTitle}">${linkTitle}</a>` );
  } );

  // cleanup
  jQuery( 'div.hide-default-our-solutions-block' ).remove();
}

renderCustomSolutionsSidebar();
