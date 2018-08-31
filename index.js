var websiteURL = "http://danielpietersen.com/"
var dbConfigVariable = "CLEARDB_DATABASE_URL"

var parseDbUrl = require("parse-database-url");
var dbConfig = parseDbUrl(process.env[dbConfigVariable] || "");

if (process.env.NODE_ENV == "production") {
    process.env.database__client = "mysql"
    process.env.database__connection__host = dbConfig.host
    process.env.database__connection__port = 3306
    process.env.database__connection__user = dbConfig.user
    process.env.database__connection__password = dbConfig.password
    process.env.database__connection__database = dbConfig.database
}

const ghost = require('ghost');

ghost()
    .then(function (ghostServer) {
        ghostServer.config.set('server', {
            host: "0.0.0.0",
            port: process.env.PORT || 2368
        });

        if (process.env.NODE_ENV == "production") {
            ghostServer.config.set('url', websiteURL);
        };

        return ghostServer.start();
    })
