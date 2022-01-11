import React, { Component } from 'react';
import './App.css';
import Site from "./containers/Site/Site";
import {BrowserRouter} from 'react-router-dom';

class App extends Component {
  render() {
    return (
      <div>
      <BrowserRouter>
        <Site />
        </BrowserRouter>
      </div>
    );
  }
}

export default App;
