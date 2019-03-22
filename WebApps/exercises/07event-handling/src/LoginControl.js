import React from 'react';
import Greeting from './Greeting';

export default class LoginControl extends React.Component {
  // Ziel: einen Button rendern, der je nachdem (eingeloggt / ausgeloggt)
  //       eine korrekte Beschriftung anzeigt (log out, log in)
  constructor(props) {
    super(props);
    this.state = {isLoggedIn: false};
  }

// Damit das callback ausgeführt wird, muss "this" gebunden werden
// In JavaScript werden Klassenmethoden standardmäßig nicht gebunden
// 2 Varianten
// (1) this.handleClick = this.handleClick.bind(this); (im constructor)
// (2) Arrow-function verwenden: handleClick = () => {}
//    Arrow Funktion als Klassenmethoden ist ein experimentelles Sprachfeature
//    (babel kümmert sich drum)
  handleClick = () => {
    this.setState(
      (state, props) => ({isLoggedIn: !state.isLoggedIn})
    );
  }

  render() {
    return (<div>
            <button onClick={this.handleClick}>
                {this.state.isLoggedIn ? "Log out" : "Log in"}
            </button>
            <Greeting isLoggedIn={this.state.isLoggedIn} />
            </div>
    );
  }
}
