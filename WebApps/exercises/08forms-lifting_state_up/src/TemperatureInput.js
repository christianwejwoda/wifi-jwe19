import React from 'react';

// export default class TemperaturInput extends  React.Component {

// zusätzliche Anforderung: neben Calsius eingabe soll man die Themperatur
// auch in Fahrenheit eingeben können
// Schritt 1: extrahieren einer eingenen Komponente für die Eingabe

// Aktuell hat jede TemperatureInput Komponente ihre eigene Temperatur
// Ziel: beide Eingabefelder werden synchronisiert.
//     dh. wenn Celsius aktualiert wird dann Fahrenheit anpassen und umgekehrt
// In React wird dies ermöglicht, indem man den state ind den nähesten gemeinsamen
// Vorfahren verschiebt ("lifting state up")
// Dh. wir verschieben den staet von TemperatureInput nach Calculator
//     Calculator ist "single source of truth"

// temperature ist nun props
export default class TemperatureInput extends React.Component {

  handleChange = (e) => {
    this.props.onTemperatureChange(e.target.value);
  }

  render() {
    const scale = this.props.scale;
    const temperature = this.props.temperature;

    return (
      <fieldset>
        <legend>Temperatur in {scale}:</legend>
        <input
          type="text"
          name="temperatur"
          value={temperature}
          onChange={this.handleChange} />
      </fieldset>
    );
  }
}
