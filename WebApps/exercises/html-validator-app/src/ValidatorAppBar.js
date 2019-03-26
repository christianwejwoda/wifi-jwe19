import React from 'react';

import PropTypes from 'prop-types';
import { withStyles } from '@material-ui/core/styles';
import AppBar from '@material-ui/core/AppBar';
import Toolbar from '@material-ui/core/Toolbar';
import Typography from '@material-ui/core/Typography';

// Material UI benutzt JSS (css in Js)
// funktioniert folgendermaßen:
// 1. Definierte css Klassen für diese Komponente
const styles = {
  root: {
    flexGrow: 1,
  },
  grow: {
    flexGrow: 1,
  },
};

function ValidatorAppBar(props) {
  // 2. Extrahiere classes, welche als prop zur Verfügung gestellt werden
  //    und greife auf selbst defineirte Stile zu
  const { classes } = props;
  return (
    <div className={classes.root}>
      <AppBar position="static">
        <Toolbar>
          <Typography variant="h6" color="inherit" className={classes.grow}>
            HTML Validator
          </Typography>
        </Toolbar>
      </AppBar>
    </div>
  );
}

// Optional: Überprüfe props mit PropTypes (erlaubt Typechecking)
ValidatorAppBar.propTypes = {
  classes: PropTypes.object.isRequired,
};

// 3. Exportiere die Komponente mit Aufruf von withStyles
//    dadurch wird sicher gestellt, dass wir die Stile als props erhalten
export default withStyles(styles)(ValidatorAppBar);
