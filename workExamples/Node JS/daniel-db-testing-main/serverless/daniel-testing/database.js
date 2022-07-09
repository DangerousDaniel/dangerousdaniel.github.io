const mysql = require('serverless-mysql')({
    config: {
        host: process.env.DB_HOST,
        port: process.env.DB_PORT,
        user: process.env.DB_USER,
        password: process.env.DB_PW,
        database: process.env.DB_DEFAULT
    }
});
module.exports.Connect = () => {
    return {connection: mysql}
}
module.exports.Query = (conn, queryString) => {
    return new Promise((resolve) => {
        conn.query(queryString, (err, result, fields) => {
            resolve({
                error: err,
                result: result,
                fields: fields
            });
        });
    });
}

module.exports.CreateTables = async () => {
    var res = await this.Query('create table times (class varchar(255), time float)');
    console.log(res);
    return;
}