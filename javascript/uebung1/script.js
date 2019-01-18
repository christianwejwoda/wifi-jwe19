// alert("Mein erster Alert");

var consolenTest = 'Hallo Woda';

console.log(consolenTest);

consolenTest = 'servus Woda';

console.log(consolenTest);

if (consolenTest === 'servus Woda') {
  // alert('pfiat di');
}

//alle externen Links werden in einem neuen Fenster geöffnet
var externalLinks = $('a[href^="http://"], a[href^="https://"]')
if (externalLinks.length > 0) {
  externalLinks.attr('target', '_blank');
  externalLinks.addClass('external_link');
}
