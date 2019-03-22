import React from 'react';

export default class BoilingInfo extends  React.Component {
  render() {
    if (this.props.temperatur >= 100) {
      return <p><strong>Wasser kocht!</strong></p>
    }
    return null;
  }
}
