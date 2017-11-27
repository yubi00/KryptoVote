/***********************************************************************
 * FILENAME :  app2.js              DESIGN REF: KV00
 *
 * DESCRIPTION :
 *       This app2.js contains the codes for the creating election and adding candidate to the blockchain
 *
 * NOTES :
 *       This document is part of the KryptoVote Blockchain Voting System
 *
 *       Copyright Krypto-Knights 2017.  All rights reserved.
 * 
 * AUTHORS :   
 *		
 *		Bhujan, Vayun | Cardenas, Angelica | Khadka, Yuba Raj | Shrestha, Nagendra	| Sunassee, Kamlesh	        
 * 
 *
 *************************************************************************/
// Import the page's CSS. Webpack will know what to do with it.
import "../stylesheets/app.css";

/*
 * The imports below are for libraries
 * @param {web3} Web3
 *    This is the Ethereum compatible JavaScript API which implements the Generic JSON RPC spec
 * @param {truffle-contract} contract
 *    Ethereum contract abstraction and provides synchronized transactions for better control flow
 * @param {web3-utils} util
 *    This contains useful utility functions for ethereum
 * 
 */
import {default as Web3} from 'web3';
import {default as contract} from 'truffle-contract';
var util = require('web3-utils');


import ballot_artifacts from '../../build/contracts/Ballot.json'

var Ballot = contract(ballot_artifacts);


window.submit = function() {
	try {
		var account = web3.eth.coinbase;
		var unlock = web3.personal.unlockAccount(account, "Krypto123456");

		/**
		 * This callback is to request instance of deployed contract
		 * @callback Ballot~contractInstanceCallback
		 */
		Ballot.deployed().then(function(contractInstance) {
			contractInstance.getElectionName.call().then(function(electionName) {
				if (electionName.toString() != "") {
					return contractInstance.isAllowed.call().then(function(res) {
						if (res == true) {
							let name = $("#Name").val();
							var partyName = $("#partyName").val();
							var img = document.getElementById("image").files[0].name;

							var name1 = new String(name);
							var name2 = new String(partyName);
							var name3 = new String(img);

							contractInstance.Ballot1(util.utf8ToHex(name1), util.utf8ToHex(name2), util.utf8ToHex(name3), {
								gas: 140000,
								from: account
							}).then(function(c) {

								alert("You have successfully added candidate");
							});
						}
						else {
							alert("You cannot add candidate after election has ended!")
						}
					});

				}
				else {
					alert("You have to create election before being able to add candidate");
				}

			});
		});
	}
	catch (err) {
		console.log(err);
	}
}

window.generateElection = function() {
	try {
		var account = web3.eth.coinbase;
		var unlock = web3.personal.unlockAccount(account, "Krypto123456");

		/**
		 * This callback is to request instance of deployed contract
		 * @callback Ballot~contractInstanceCallback
		 */
		Ballot.deployed().then(function(contractInstance) {
			let electionName = $("#election").val();
			var elec = new String(electionName);
			var votingduration = $("#votingduration").val();
			var duration = parseInt(votingduration);
			contractInstance.createElection(util.utf8ToHex(elec), duration, {
				gas: 200000,
				from: account
			}).then(function(c) {


				alert("You have successfully created an election!");

			});
		});
	}
	catch (err) {
		console.log(err);
	}
}

window.selectImage = function() {
	var img = document.getElementById("image").files[0];
	var selected = img.name;
	return selected;
}



/*
 * This method sets the provider for the source of the blockchain and executes commands when the window is loaded
 * 
 */
$(document).ready(function() {
	if (typeof web3 !== 'undefined') {
		console.warn("Using web3 detected from external source like Metamask");
		// Use Mist/MetaMask's provider
		window.web3 = new Web3(web3.currentProvider);
	}
	else {
		window.web3 = new Web3(new Web3.providers.HttpProvider("http://kryptovze.australiaeast.cloudapp.azure.com:8545"));
	}

	Ballot.setProvider(web3.currentProvider);




});