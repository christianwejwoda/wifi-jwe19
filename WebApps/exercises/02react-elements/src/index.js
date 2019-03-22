import React from 'react';
import ReactDOM from 'react-dom';

// Wiederholung
// React Elemente snid JavaScript Objecte

// Neu:
// (1) React DOM (Virtual DOM) rendert die React-Elemente in den DOM und kümmert sich um Updates.
// (2) React Elemente sind unveränderlich
//     Dh. nach der erstellung kann mabn das Element nicht mehr ändern.
//     (stellt also den UI-status zu einem bestimmten Zeitpunkt dar)

// Frage: wie können die dann das UI aktualisieren?
// mit aktuellem Wissen: Nur durch neues Element und ReactDOM.render()
// wir lernen bald, wie es besser gemacht werden kann.

// Raact DOM vergleicht den neuen mit dem alten status
// und aktualisiert nur den notwendigen bereich
function updateUI() {
  const currentTime = new Date().toLocaleTimeString();
  const d = new Date();
  const h = d.getHours();
  const m = d.getMinutes();
  const s = d.getSeconds();
  const divStyle = {color: RGB2HTML(255 / 24 * h, 255 / 60 * m, 255 / 60 * s)};

  const displayTime = <h1 style={divStyle}>Hallo, die Uhrzeit ist: {currentTime}</h1>

  ReactDOM.render(displayTime, document.getElementById('root'));
};
setInterval(updateUI,1000);

function RGB2HTML(red, green, blue)
{
    var decColor =0x1000000+ blue + 0x100 * green + 0x10000 *red ;
    return '#'+decColor.toString(16).substr(1);
}
