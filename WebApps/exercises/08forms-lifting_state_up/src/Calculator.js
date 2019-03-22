import React from 'react';
import BoilingInfo from './BoilingInfo';
import TemperatureInput from './TemperatureInput';

// zusätzliche Anforderung: neben Calsius eingabe soll man die Themperatur
// auch in Fahrenheit eingeben können
// Schritt 1: extrahieren einer eingenen Komponente für die Eingabe
// Probleme
//  * Eingabefelder sind nicht synchronisiert
//    dh. Änderungen in der einen Komponente werden NICHT in der anderen übernommen
//  * BoilingInfo kann in Calculator nicht angezeigt werden
//   -> der Calculator kennt die aktuelle Temperatur nicht

export default class Calculator extends  React.Component {
  render() {
    return (
      <div>
        <TemperatureInput scale="Celsius"/>
        <TemperatureInput scale="Fahrenheit"/>
        {/* <BoilingInfo temperatur={this.state.temperatur}/> */}
      {/* <p>{this.state.temperatur}</p> */}
      </div>
    );
  }
}
// (32 °F − 32) × 5/9 = 0 °C
// (0 °C × 9/5) + 32 = 32 °F
