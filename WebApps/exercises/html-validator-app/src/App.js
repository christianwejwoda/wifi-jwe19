import React, { Component } from 'react';
import ValidatorAppBar from "./ValidatorAppBar";
import FullWidthTabs from "./FullWidthTabs";
import CssBaseline from '@material-ui/core/CssBaseline';
import { MuiThemeProvider, createMuiTheme } from '@material-ui/core/styles';
import pink from '@material-ui/core/colors/pink';

const theme = createMuiTheme({
  palette: {
    primary: pink,
    background: {
      default: "#e0e0e0"
    }
  }
});

export default class App extends Component {

// um unnötige DIVs im DOM zu vermeiden können React.fragments verwendet werden
// langschreibweise: <React.Fragment> ... </React.Fragment>
// kurzschreibweise: <> ... </>

  render() {
    return (
      <>
        <MuiThemeProvider theme={theme} >
          <CssBaseline />
          <ValidatorAppBar />
          <FullWidthTabs />
        </MuiThemeProvider>
      </>
    );
  }
}
