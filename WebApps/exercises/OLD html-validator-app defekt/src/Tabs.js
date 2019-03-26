import React, { Component } from 'react';
import DirectInput from "./DirectInput";
import FileInput from "./FileInput";


export default class Tabs extends Component {
  render() {
    return (
      <>
        <DirectInput />
        <FileInput />
      </>
    );
  }
}
