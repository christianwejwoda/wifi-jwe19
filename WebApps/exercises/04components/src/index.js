import React from 'react';
import ReactDOM from 'react-dom';

// React Komponenten
// * erlauben es, das UI in unanhängige, wiederverwendbare Teile zu zerlegen
// * "bestehen aus" React Elementen
// * könnne wie eine JavaScript Funktion gesehen werden
//   dh. sie akzeptieren Eingabeparameter (props)
//       und geben React Elemente zurück, die angezeigt werden sollen

// 2 Arten von Komponenten
// (1) function-components
// props steht für Properties
function WelcomeFunc(props) {
  return <h1>Hello, {props.name}</h1>;
}

// diese beiden Komponenten Definitionen sind aus Sicht von React identisch
// wichtig: props dürfen nicht verändert werden. Dh. Komponenten müssen "pure functions" sein.

// Komponenten rendern
// wenn React eine Komponente erkennt, werden die JSX Attribute als
// einzelnes props-Objekt an die Komponente weitergeleitet
// Komponenten müßen immer mit Großbuchstaben beginnen.
// (Kleinbuchstavben werden als DOM-Tags interpreriert)
// Es können auch mehrere JSX-Attribute übergeben werden.
// ReactDOM.render(<WelcomeFunc name="Christian"/>, document.getElementById('root'));

// Class-Component
//  Class-Components haben im Vergelich zu Function-Components zusätzliche Features
class WelcomeClass extends React.Component {
  // hier muss mindestens eine render()-Methode haben (analog zur Function-Component)
  render() {
    return <h1>Hello, {this.props.name}</h1>;
  }
}
// ReactDOM.render(<WelcomeClass name="Woda"/>, document.getElementById('root'));

// komponenten dürfen auch geschachtelt werden
class App extends React.Component {
  render() {
    return (
      <div>
        <WelcomeFunc name="Sebastian" />
        <WelcomeClass name="Radi" />
        <WelcomeFunc name="Stefan" />
      </div>
    );
  }
}
ReactDOM.render(<App />, document.getElementById('root'));
