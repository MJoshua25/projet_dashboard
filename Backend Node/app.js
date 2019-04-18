// Modules

require('babel-register')
const bodyParser = require('body-parser')
const express = require('express')
const mysql = require('promise-mysql')
const morgan = require('morgan')('dev')
const axios = require('axios')
const {success, error, checkAndChange} = require('./assets/functions')


const multer = require('multer')

mysql.createConnection