import React, { Component } from 'react';
// import PropTypes from 'prop-types';
import { withStyles } from '@material-ui/core/styles';
import Grid from '@material-ui/core/Grid';
import TextField from '@material-ui/core/TextField';
import Button from '@material-ui/core/Button';
import Send from '@material-ui/icons/Send';
import $ from "jquery";

const styles = theme => ({
  button: {
    alignSelf: "flex-end",
  },
  leftIcon: {
    marginRight: theme.spacing.unit,
  },
  rightIcon: {
    marginLeft: theme.spacing.unit,
  },
  iconSmall: {
    fontSize: 20,
  },
});


class DirectInput extends Component {
  constructor(props) {
    super(props);

    this.state = {
      input: ""
    }
  }

  onInputChanged = (e) => {
      this.setState({
        input: e.target.value
      });
  }

  onSendClicked = (e) => {
    $.ajax({
      url: "https://validator.w3.org/nu/?out=json",
      type: "POST",
      dataType: "json",
      data: this.state.input,
      contentType: "text/html; charset=utf-8",
      context: this
    }).done(json => {
      console.log("test");
      console.log(JSON.stringify(json));
    }).fail((xhr, status, errorThrown) => {
      console.log("Error: " + errorThrown);
      console.log("Status: " + status);
    })
  }

  render() {
    const { classes } = this.props;

    return (
      <Grid container
          className={classes.root}
          spacing={16}
          direction="column"
          justify="center"
          alignItems="stretch"
          >

        <Grid item>
          <TextField
            id="outlined-multiline-static"
            label="HTML-Code"
            multiline
            rows="16"
            defaultValue=""
            // className={classes.textField}
            margin="normal"
            variant="outlined"
            fullWidth
            value={this.state.input}
            onChange={this.onInputChanged}
          />
        </Grid>

        <Grid item className={classes.button}>
          <Button variant="contained" color="primary" className={classes.button}
            onClick={this.onSendClicked}>
            Send
            <Send className={classes.rightIcon}>send</Send>
          </Button>
        </Grid>
      </Grid>

    );
  }
}

export default  withStyles(styles)(DirectInput);
