import React from 'react';

export default class Greeting extends React.Component {
  // constructor(props) {
  //   super(props);
  // }

  render(){
    if (this.props.isLoggedIn) {
      return <LoggedInGreeting />;
    } else {
      return <LoggedOutGreeting />;
    }
  }
}

function LoggedInGreeting(props) {
  return <h1>Willkommen zurück!</h1>
}
function LoggedOutGreeting(props) {
  return <h1>bitte loggen Sie sich ein!</h1>
}
