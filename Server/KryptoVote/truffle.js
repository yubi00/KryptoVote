// Allows us to use ES6 in our migrations and tests.
require('babel-register')

module.exports = {
  networks: {
    development: {
      host: 'localhost',
      port: 8545,
      network_id: '*' // Match any network id
    },
    azureNetwork: {
      host: 'kryptovze.australiaeast.cloudapp.azure.com',
	  port: 8545,
      network_id: "123",
      //from: "0x577cbcdb621024d7f7708ed9ec2928b6b08fb878",
    }
  }
}
