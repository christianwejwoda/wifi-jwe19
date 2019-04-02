import React, { Component } from 'react';
import { withStyles } from '@material-ui/core/styles';
import Grid from '@material-ui/core/Grid';
import Button from '@material-ui/core/Button';
import Send from '@material-ui/icons/Send';
import $ from "jquery";
import { Redirect } from "react-router-dom";

// TODO
// Styling
// render Eingabeformular
// Ajax Request
// logik für Resultlist anzeigen

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


class FileInput extends Component {
  constructor(props) {
    super(props);

    this.input = React.createRef();
    this.state = {
      result: null
    }

  }

  onResultAvailable = (json) => {
    this.setState({
      result: json
    });
  }

  onSendClicked = () => {
    // File holen
    const files = this.input.current.files;
    if (files.length === 0) {
      console.log("keine Datei ausgewählt");
      return;
    }

    const file = files[0];

    // An Server senden
    $.ajax({
      url: "https://validator.w3.org/nu/?out=json",
      type: "POST",
      dataType: "json",
      data: file,
      contentType: "text/html; charset=utf-8",
      context: this,
      processData: false
    }).done(this.onResultAvailable)
    .fail((xhr, status, errorThrown) => {
      console.log("Error: " + errorThrown);
      console.log("Status: " + status);
    })
  }

  render() {
    const { classes } = this.props;
    const result = this.state.result;

    if (result) {
      const location = {
          pathname: "/ResultList",
          state: { result: result }
          }
      return <Redirect to={location} push/>
    }

    return (
      <Grid container
          className={classes.root}
          spacing={16}
          direction="column"
          justify="center"
          alignItems="stretch"
          >
            <Grid item>
              <input id="fileInputField" type="file" ref={this.input}/>
            </Grid>
            <Grid item className={classes.button}>
              <Button variant="contained" color="primary"
                onClick={this.onSendClicked}>
                Send
                <Send className={classes.rightIcon}>send</Send>
              </Button>
            </Grid>
        </Grid>


    );
  }
}
export default withStyles(styles)(FileInput);
