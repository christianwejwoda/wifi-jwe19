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

// Ziel: Function-Component Clock
//       props: date -> Das Datumsobjekt, das dargestellt werden soll

// 1. Schritt: Komponente erstellen
// Problem dabei: Die Dartsellung der Uhrzeit sollte Teil der Komponente sein
// dh. wir benötigen state
// * ähnlich wie props
// * Aber: state ist privat und veränderbar

// 2. Schritt: Function Component in class Component umwandeln
class Clock extends React.Component {
  // constructor ist eine Methode, die aufgerufen wird wenn ein neues Clock-Objekt erzeugt wird
  // React sorgt dafür , dass props an den Konstrutor übergeben werden
  constructor(props) {
    // super(props) muss im Konstrutor immer aufgerufen werden damit React korrekt funktioniert
    // super(props) ruft den Konstrutor in React.Component auf
    super(props);
    // in state wird der lokale Zustand (private und veränderbar) gespeichert
    // state ist ansonsten ein normales Javascript Objekt
    this.state = {
      date: new Date()
    };

    // Methode an die Klasse binden
    // aber NEU: Arrow ( => ) funktionen verwenden
    // this.tick=this.tick.bind(this);
  }
  // Lifecycle-Methode:
  // Wird aufgerufen, nachdem die Komponente initial in den DOM gerendert wurde (mounting)
  componentDidMount(){
    // Ziel: Timer initialisieren
    this.timerId = setInterval(this.tick, 1000);
  }

  // Lifecycle-Methode:
  // Wird aufgerufen, wenn die Komponente aus dem DOM entfernt wird (unmounting)
  componentWillUnmount(){
    // Ziel: Timer aufräumen
    clearInterval(this.timerId);
  }

  tick = () => {
    // Korrekter Umgang mit state
    // (1) state darf nicht direkt geändert werden
    // FALSCH: this.state{....}
    // RICHTIG: this.setState({....})

    // (2) state updates sind asynchron
    // dh. wenn man ein Status-Update macht das vom verherigen state / props abhängt: Vorsicht!
    // FALSCH: this.setState({counter: this.state.counter + 1})
    // RICHTIG: this.setState((state, props) => ({counter: state.counter + 1}))

    // (3) state updates werden gemerged
    // dh. Es werden nur die Eigenschaften des state-Objekts überschrieben,
    //     die an setState() übergeben werden.
    this.setState({
      date: new Date()
    });
  }

  render() {
    const currentTime = this.state.date;

    const currentTimeString = currentTime.toLocaleTimeString();
    const divStyle = {color: RGB2HTML(255 / 24 * currentTime.getHours(), 255 / 60 * currentTime.getMinutes(), 255 / 60 * currentTime.getSeconds())};
    const displayTime = <h1 style={divStyle}>Hallo, die Uhrzeit ist: {currentTimeString}</h1>

    return displayTime;
  }
}

ReactDOM.render(<Clock/>, document.getElementById('root'));

// setInterval(function() {
    // ReactDOM.render(<Clock date={new Date()}/>, document.getElementById('root'));
// },1000);

function RGB2HTML(red, green, blue)
{
    var decColor =0x1000000+ blue + 0x100 * green + 0x10000 *red ;
    return '#'+decColor.toString(16).substr(1);
}
