import React from 'react';
import ActionLink from './ActionLink';
import LoginControl from './LoginControl';

class App extends React.Component {
  render() {
    return <div><LoginControl /><br /><ActionLink /></div>
  }
}

export default App;
