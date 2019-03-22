import React from 'react';
import ReactDOM from 'react-dom';
import "./index.css";

// diese Syntax ist JSX (kein HTML, kein String)
// JSX ist eine Spracherweiterung von JavaScript (funktioniert danbk Babel)
// JSX produziert React-Elemente
// (wird von React verwendet um den DOM zu konstruieren bzw aktuell zu halten)
const element = <h1>Hello World!</h1>
// Babel kompiliert JSX zu React.createElement() aufruf
const element2 = React.createElement("h1",null,"Hello World!");
// ReactDOM.render(element, document.getElementById('root'));

// was kann ich mit JSX alles machen?
// (1) in JSX können Expression eingebunden werden
const name = "Christian";
const helloNameElement = <h1>Hello {name}</h1>
// ReactDOM.render(helloNameElement, document.getElementById('root'));

// (1a) Jede Javascript Expression kann eingebettet werden
const user = {
  firstname: "Christian",
  lastname: "Wejwoda"
};
function formatName(user) {
    // template string syntax
    return `${user.firstname} ${user.lastname}`
    // return user.firstname + " " + user.lastname;
}
const helloFormatElement = <h1>Hello, {formatName(user)}</h1>
// ReactDOM.render(helloFormatElement, document.getElementById('root'));

// (2) JSX Expression -> React.createElement() -> React Element (Javascript Object)
//     dh. JSX kann wie objekte behandelt werden und überall verwendet werden.
//     (if, for, funktions-Parameter, return wert, ....)
function getHello(user) {
  if (user) {
    return <h1>Hello, {formatName(user)}</h1>
  } else {
    return <h1>Hello, unknown user</h1>;
  }
}
// ReactDOM.render(getHello(user), document.getElementById('root'));

// (3) JSX unterstützt HTML Attribute
//     Achtung: Im Gegensatz zu HTML verwendet JSX die "camelcase"-Konvention
//              und einzelne Attribute heißen anders
//        Bsp: class -> className in JSX
//        Bsp: tabindex -> tabIndex in JSX
// Entweder mit " ... "
const elementWithAttribute = <h1 className="foo">Hello Attribute</h1>
// ReactDOM.render(elementWithAttribute, document.getElementById('root'));
// oder mit { ... }
const cssClass = "bar";
const elementWithAttribute2 = <h1 className={cssClass}>Hello Attribute</h1>
// ReactDOM.render(elementWithAttribute2, document.getElementById('root'));

// JSX unterstützt Kind-Elemente
const elementWithChildren =
<div>
  <h1>Hallo!</h1>
  <h2>Willkommen zurück!</h2>
</div>
ReactDOM.render(elementWithChildren, document.getElementById('root'));
