import React from 'react';

// HTML Formulare funktionieren anders als normale DOM Elemente in React: sie enthalten state
// Ziel in React: Form submission in JavaScript behandeln und auf Formularelemenete zugreifen
// Dies wird in React durch sogenannte controlled Components erreicht

export default class SimpleForm extends React.Component {
  // Ziel: Formular rendern - Formulardaten in React verwenden

  constructor(props) {
    super(props);
    this.state = {
        vorname: "Christian",
        isMember: false
      };
  }

  handleChange = (event) => {
    const target = event.target;
    const value = target.type === "checkbox" ? target.checked : target.value;
    const name = target.name;
    this.setState({[name]: value});
  }

  handleSubmit = (event) => {
    event.preventDefault();
    console.log(JSON.stringify(this.state));
  }

  render() {
    return (
      <form onSubmit={this.handleSubmit}>
        <label>Vorname </label>
        <input type="text" name="vorname" value={this.state.vorname} onChange={this.handleChange}/>
        <br />
        <label>Clubmitglied </label>
        <input type="checkbox" name="isMember" checked={this.state.isMember} onChange={this.handleChange}/>
        <br />
        <button type="submit">OK</button>
      </form>
    );
  }
}
