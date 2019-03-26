import React from 'react';

// Es gibt kleine Unterschiede beim eventhandling mit React im Vergleich zu DOM.
//  * React events verwenden die camelCase-Notation (onclick -> onclick in react)
//  * In JSX wird eine Funktion als Eventhandler übergeben (kein string)
//  * Man kann nicht false zurückgeben, um das Standardverhalten zu deaktivieren
//    (e.preventDefault() muss aufgerufen werden)
export default function ActionLink(props){
  function handleClick(e) {
    e.preventDefault();
      console.log("Geklickt!");
    }
// in React ist es normalerweise nicht notwendig, event listener nachträglich hinzuzufügen
//  Der listener wird einfach beim initialen Rendern des Elements angegeben
  return <a href="JavaScript.void(0)" onClick={handleClick}>Klick mich</a>
}
