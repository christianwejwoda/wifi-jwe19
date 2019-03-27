import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';
import App from './App';
import 'typeface-roboto';
import CssBaseline from '@material-ui/core/CssBaseline';
import { BrowserRouter } from "react-router-dom";
import { MuiThemeProvider, createMuiTheme } from '@material-ui/core/styles';
import pink from '@material-ui/core/colors/pink';

const theme = createMuiTheme({
  palette: {
    primary: pink,
    background: {
      default: "#e0e0e0"
    }
  },
  typography: {
    useNextVariants: true,
  },
});

ReactDOM.render((
    <BrowserRouter>
      <MuiThemeProvider theme={theme} >
          <CssBaseline />
          <App />
      </MuiThemeProvider>
    </BrowserRouter>),
    document.getElementById('root'));
