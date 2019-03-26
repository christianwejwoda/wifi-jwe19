// (32 °F − 32) × 5/9 = 0 °C
// (0 °C × 9/5) + 32 = 32 °F

export function toCelsius(fahrenheit) {
  return (fahrenheit - 32) * 5 / 9;
}

export function toFahrenheit(celsius) {
  return (celsius * 9 / 5) + 32;
}

// parameter: temperatur - Input aus Textfeld
// parameter: convert - Konvertierungsfunktion (toCelsius, toFahrenheit)
export function tryConvert(temperatur, convert) {
  // 1. Eingabe in Zahl konvertieren
  //    Wenn Fehler -> Ausgabe Defaultwert ""
  const input = parseFloat(temperatur);
  if (Number.isNaN(input)) {
    return "";
  }

  // 2. Konvertierung
  const converted = convert(input);

  // 3. Runden auf 3 Nachkommastellen
  const rounded = Math.round(converted * 1000) / 1000;

  return rounded;
}
