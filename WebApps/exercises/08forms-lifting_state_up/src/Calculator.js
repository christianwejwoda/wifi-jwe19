import React from 'react';
import BoilingInfo from './BoilingInfo';
import TemperatureInput from './TemperatureInput';
import { toCelsius, toFahrenheit, tryConvert} from "./Logic";

// zusätzliche Anforderung: neben Calsius eingabe soll man die Themperatur
// auch in Fahrenheit eingeben können
// Schritt 1: extrahieren einer eingenen Komponente für die Eingabe
// Probleme
//  * Eingabefelder sind nicht synchronisiert
//    dh. Änderungen in der einen Komponente werden NICHT in der anderen übernommen
//  * BoilingInfo kann in Calculator nicht angezeigt werden
//   -> der Calculator kennt die aktuelle Temperatur nicht

export default class Calculator extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      temperature: "",
      scale: "Celsius"
    }
  }

  onCelsiusChanged = (temperature) => {
    this.setState({
      temperature: temperature,
      scale: "Celsius"
    })
  }
  onFahrenheitChanged = (temperature) => {
    this.setState({
      temperature: temperature,
      scale: "Fahrenheit"
    })
  }

  render() {
    const scale = this.state.scale;
    const temperature = this.state.temperature;

    const celsius = scale === "Celsius" ? temperature : tryConvert(temperature,toCelsius);
    const fahrenheit = scale === "Fahrenheit" ? temperature : tryConvert(temperature,toFahrenheit);

    return (
      <div>
        <TemperatureInput
          scale="Celsius"
          temperature={celsius}
          onTemperatureChange={this.onCelsiusChanged}
        />

        <TemperatureInput
          scale="Fahrenheit"
          temperature={fahrenheit}
          onTemperatureChange={this.onFahrenheitChanged}
        />

        <BoilingInfo temperature={celsius}/>
      </div>
    );
  }
}
