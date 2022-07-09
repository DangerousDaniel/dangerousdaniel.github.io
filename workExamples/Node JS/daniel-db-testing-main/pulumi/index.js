"use strict";
const pulumi = require("@pulumi/pulumi");
const aws = require("@pulumi/aws");
const awsx = require("@pulumi/awsx");
const config = new pulumi.Config();

const cluster = new aws.rds.Cluster(config.get('rdsName'), {
        availabilityZones: config.get("availablitiyZones").split(","),
        clusterIdentifier: config.get("clusterId"),
        databaseName: config.get('dbName'),
        engine: config.get('dbEngine'),
        engineVersion: config.get('dbEngingeVersion'),
        masterPassword: config.get('dbPw'),
        masterUsername: config.get('dbUser'),
        skipFinalSnapshot: true
    });


console.log("Creating instance");
const instance = new aws.rds.ClusterInstance(config.get('rdsName'), {
    clusterIdentifier: cluster.clusterIdentifier,
    identifier: config.get('clusterInstanceId'),
    instanceClass: config.get('clusterInstanceClass'),
    engine: cluster.engine,
    engineVersion: cluster.engineVersion,
    publiclyAccessible: true
});

exports.endpont = instance.endpoint;