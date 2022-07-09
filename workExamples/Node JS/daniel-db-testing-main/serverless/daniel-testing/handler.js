//Setup
'use strict';
const database = require('./database');
const uuid = require('uuid');
const { AppConfig } = require('aws-sdk');
const conn = database.Connect().connection;

module.exports.hello = async (event) => {
  var num = 'select 56';
  const query = await database.Query(conn, num);
  return {
    statusCode: 200,
    body: JSON.stringify(
      {
        message: 'Go Serverless v2.0! Your function executed successfully! ' + query.result[0]["56"],
        input: event,
      },
      null,
      2
    ),
  };
};

//#region DD Spells
//Get all Data //Function To Get Spells
module.exports.getAllSpells = async (req, res) => {
  console.log(uuid.v4())
  const query = await database.Query(conn, 'select * from spell');
  for(var i in query.result){
    query.result[i].range = query.result[i].spell_range;
  }
  return {
    statusCode: 200,
    body: JSON.stringify(query.result),
    headers : {
        'Access-Control-Allow-Origin': '*',
        'Access-Control-Allow-Credentials': true
    }
  }
}

module.exports.getDesc = async (req, res) => {
  const body = JSON.parse(req.body);
  const query = await database.Query(conn, `SELECT descrption as Description FROM spell 
  WHERE id="${body.id}";`);
  return {
    statusCode: 200,
    body: JSON.stringify(query.result),
    headers : {
        'Access-Control-Allow-Origin': '*',
        'Access-Control-Allow-Credentials': true
    }
  }
}



//Function To Add To Spells and Return
module.exports.addSpell = async (req, res) => {
  
  //Get params from body
  const body = JSON.parse(req.body);

  //Create Insert Query
  let query = `insert into spell values 
    ("${uuid.v4()}", 
    ${conn.escape(body.name)}, 
    ${conn.escape(body.castingTime)}, 
    ${conn.escape(body.spell_range)}, 
    ${conn.escape(body.components)}, 
    ${conn.escape(body.duration)}, 
    ${conn.escape(body.descrption)}
  )`

  // Await query
  const addRes = await database.Query(conn, query)
  console.log(addRes.error);

  //Select all spells
  let getAll = 'select * from spell'
  var allSpells = await database.Query(conn, getAll);
  console.log(allSpells.error);
  //return spells
  return {
    statusCode: 200,
    body: JSON.stringify(allSpells.result),
    headers : {
        'Access-Control-Allow-Origin': '*',
        'Access-Control-Allow-Credentials': true
    }
  }
}
//Function to Update Spell and Return

//Get a row from the database
module.exports.getSpell = async (req, res) => {
  const body = JSON.parse(req.body);

  const query = await database.Query(conn, `select * from spell where id = ${conn.escape(body.id)}`);
  return {
    statusCode: 200,
    body: JSON.stringify(query.result),
    headers : {
        'Access-Control-Allow-Origin': '*',
        'Access-Control-Allow-Credentials': true
    }
  }
}

//Function to delete spells and return
module.exports.deleteSpell = async (req, res) => {
  console.log("delete");
  //Get params from body
  const body = JSON.parse(req.body);

  //Database query
  let query  = `delete from spell where id=${conn.escape(body.id)}`

  // Await query
  const deleteRes = await database.Query(conn, query)
  console.log(deleteRes.error);

  //Select all spells
  let getAll = 'select * from spell'
  var allSpells = await database.Query(conn, getAll);
  console.log(allSpells.error);
  
  //return spells
  return {
    statusCode: 200,
    body: JSON.stringify(allSpells.result),
    headers : {
        'Access-Control-Allow-Origin': '*',
        'Access-Control-Allow-Credentials': true
    }
  }
}
//#endregion