//Definition von Variablen
var apples = 5;
var nuts = 17;
var lemons = 9;

// console.log(apples , nuts , lemons);
// console.log('Cake: ' , (apples + nuts + lemons));
// console.log('Cake: ' + (apples + nuts + lemons));
// console.log(apples / nuts / lemons);
// console.log(apples - nuts - lemons);
// console.log(apples * nuts * lemons);
// console.log('<input type="email">')
// console.log('<input type=\'email\'>')

//Array (eindimansional)
var woche = [
  'Montag',
  'Dienstag',
  'Mittwoch',
  'Donnerstag',
  'Freitag',
  'Samstag',
  'Sonntag'
];
var langeWoche = new Array(
  'Montag',
  'Dienstag',
  'Mittwoch',
  'Donnerstag',
  'Freitag',
  'Samstag',
  'Sonntag'
);

//Array (assoziativ)
var monat = [];
monat['x'] = 'Jänner';
monat['y'] = 'April';
monat['a'] = 'Dezember';
document.write(monat['y']);
document.write('<br>');
document.write(woche.sort());

//Array (mehrdimensional)
var auto = [
  ['Rücklicht', 'Scheinwerfer'],
  ['Bremse', 'Reifen'],
  ['Sitze', 'Lenkrad'],
  ['Fenster', 'Dach', 'Unterboden']
];
document.write('<br>');
document.write(auto);


// console.log('Heute ist ' + woche[3]);
// console.log('die Woche hat ' + woche.length + ' Tage');
// console.log(langeWoche[5]);
if (typeof woche[12] == 'undefined') {
  // console.log('kein gültiger Tag');
}
// alert(woche);

var person = {
  nachname: 'Wejwoda',
  vorname: 'Christian',
  alter: 47,
  anrede: 'Herr'
};

var auto = {
  leuchten: ['Rücklicht', 'Scheinwerfer'],
  b: ['Bremse', 'Reifen'],
  c: ['Sitze', 'Lenkrad'],
  d: ['Fenster', 'Dach', 'Unterboden']
};
// console.log(person.anrede+' '+ person.nachname +' ' + person.vorname);


var tier = function() {
  return 'Käfer';
};

//console.log(tier());
//document.write(tier());

var wieIstDeinName = function(person) {
  return person.vorname;
};
//document.write('<br>');
//document.write(wieIstDeinName(person));

//Operatoren
var himmel = 'grau';
if (himmel == 'blau') {
  console.log('wirklich?');
} else if (himmel == 'schwarz') {
  console.log('Es ist Nacht?');
} else {
  console.log('regnet es?');
}

var note = '1';
if (note === 1) {
  console.log('nope');
}

var noteZahl = parseInt(note);
if (noteZahl === 1) {
  console.log('passt');
}

if (isNaN(parseInt('d  1'))) {
  console.log('autsch');
}

var tomate = 5.0;
var melone = 23.5;
if (tomate > melone) {
  console.log('wo? glaub ich nicht');
} else {
  console.log('ned wirklich');
}

if (!(tomate >= melone)) {
  console.log('wo? glaub ich nicht');
} else {
  console.log('ned wirklich');
}

if (tomate != melone) {
  console.log('wo? glaub ich nicht');
} else {
  console.log('ned wirklich');
}

// loop
for (var i = 0; i < 10; i++) {
  console.log(i);
}
//while gibt es auch
