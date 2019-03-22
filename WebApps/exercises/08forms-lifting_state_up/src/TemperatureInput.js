import React from 'react';

// export default class TemperaturInput extends  React.Component {

// zusätzliche Anforderung: neben Calsius eingabe soll man die Themperatur
// auch in Fahrenheit eingeben können
// Schritt 1: extrahieren einer eingenen Komponente für die Eingabe

export default class TemperatureInput extends  React.Component {
  constructor(props) {
    super(props);
    this.state = {temperatur: ""};
  }

  handleChange = (event) => {
    const target = event.target;
    const value = target.type === "checkbox" ? target.checked : target.value;
    const name = target.name;
    this.setState({[name]: value});
  }

  render() {
    const scale = this.props.scale;

    return (
      <fieldset>
        <legend>Temperatur in {scale}:</legend>
        <input
          type="text"
          name="temperatur"
          value={this.state.temperatur}
          onChange={this.handleChange} />
      </fieldset>
    );
  }
}
