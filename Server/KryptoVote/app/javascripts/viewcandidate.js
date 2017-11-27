/***********************************************************************
 * FILENAME :  viewcandidate.js              DESIGN REF: KV00
 *
 * DESCRIPTION :
 *       This viewcandidate.js contains the codes for the viewing the list of candidates on the admin webpage
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
 * @param {ethereumjs-util} EthUtil
 *    A collection of utility functions for ethereum
 * @param {web3-utils} util
 *    This contains useful utility functions for ethereum
 * @param {ethereumjs-tx}
 *    This contains functions to sign and send transactions using private key
 * 
 */
import {default as Web3} from 'web3';
import {default as contract} from 'truffle-contract';
import {default as EthUtil} from 'ethereumjs-util';
var util = require('web3-utils');
var Tx = require('ethereumjs-tx');


import ballot_artifacts from '../../build/contracts/Ballot.json'

var Ballot = contract(ballot_artifacts);




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

	/**
	 * This callback is to request instance of deployed contract
	 * @callback Ballot~contractInstanceCallback
	 */
	Ballot.deployed().then(function(contractInstance) {
		contractInstance.getElectionName.call().then(function(electionName) {

			contractInstance.getCandidateLength.call().then(function(v) {
				var length = parseInt(v);
				for (var i = 0; i < length; i++) {
					contractInstance.getCandidateDetails.call(i).then(function(result) {
						var candidate = result[0];
						var partySymbol = result[1];
						$("#customFields").append('<tbody style="font-size:20px;text-align:center;line-height:20px;"><tr><td style="background-color:#f08080;color:white;margin-top:5px;"><style type="text/css">input { border: none;width:300px;margin-top:10px;height:15px; }</style><label for="customFieldName" style="width:300px; margin-top:17px;"> ' + candidate + ' </label> &nbsp;<img src="./img/' + partySymbol + ' " alt="" height=40 width=40></img></td></tr></tbody>');
					});


				}



			});
		});
	});



});