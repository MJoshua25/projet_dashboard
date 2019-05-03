// Modules

require('babel-register')
const bodyParser = require('body-parser')
const express = require('express')
const mysql = require('promise-mysql')
const morgan = require('morgan')('dev')
const axios = require('axios')
const config = require('./assets/config')
const {success, error, checkAndChange} = require('./assets/functions')


const multer = require('multer')

mysql.createConnection(config.db)
    .then((db) => {
        const app = express();
        let Users = require('./models/Users-class')
        const server = require('http').createServer(app)
        var io = require('socket.io').listen(server)

        var usersRouter = require('./routes/index')

        app.set('views', path.join(__dirname, 'views'));
        app.set('view engine', 'twig');
        app.use(session({secret:"dashboard"}))
        app.use(bodyParser.json());
        app.use(bodyParser.urlencoded({ extended: true }));
        app.use(express.static(path.join(__dirname, 'public')));

        app.use('/users', usersRouter)

        server.listen(config.port, () => {
            console.log("Started on port " + config.port)
        })
    })
.catch(err => console.log(err.message))