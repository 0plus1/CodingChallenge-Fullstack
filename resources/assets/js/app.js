/* jslint browser */
/* global window */
import React from 'react';
import ReactDom from 'react-dom';
import Shelives from './components/shelf/Shelives';

window._ = require('lodash');

window.$ = require('jquery');

// require('bootstrap');

const app = ReactDom.createRoot(document.getElementById('app'));
app.render(<Shelives />);
