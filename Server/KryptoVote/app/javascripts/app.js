/***********************************************************************
 * FILENAME :  app.js              DESIGN REF: KV00
 *
 * DESCRIPTION :
 *       This app.js contains the codes for the validation conducted on the voter's home page.
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
 * This method allows the voter to be redirected to ballot page under successful conditions
 * @param {string} name
 *    The username of the voter
 * 
 */
window.VoteValidation = function(name) {
	var validationModal = $("#validationModal");
	var ok = $("#ok_btn");

	var username = name;

	var privateKey = (web3.sha3(username)).substr(2);
	/** @type {string} */
	var ethaddress = `0x${EthUtil.privateToAddress(hexToBytes(privateKey)).toString('hex')}`;

	/**
	 * This callback is to request instance of deployed contract
	 * @callback Ballot~contractInstanceCallback
	 */
	Ballot.deployed().then(function(contractInstance) {
		contractInstance.getElectionName.call().then(function(electionName) {
			if (electionName.toString() != "") {
				return contractInstance.isAllowed.call().then(function(res) {
					if (res == true) {

						contractInstance.getVoted.call(ethaddress).then(function(voted) {
							console.log("Voted: " + voted);
							if (!voted) {
								window.location.href = "index.php";
							}
							else {
								$("#msg").html("You have already voted. You can vote only once!");
								validationModal.modal();
								ok.onclick = function() {
									validationModal.modal("hide");
								}
							}
						});
					}
					else {
						$("#msg").html("The voting period has ended. You cannot vote!");
						validationModal.modal();
						ok.onclick = function() {
							validationModal.modal("hide");
						}
					}


				});
			}
			else {
				$("#msg").html("No election is available at this time!");
				validationModal.modal();
				ok.onclick = function() {
					validationModal.modal("hide");
				}
			}
		});



	});

}

/*
 * This method allows the voter to be redirected to results page under successful conditions
 * @param {string} name
 *    The username of the voter
 * 
 */
window.results = function(name) {
	try {
		var validationModal = $("#validationModal");
		var ok = $("#ok_btn");

		var username = name;

		var privateKey = (web3.sha3(username)).substr(2);
		var ethaddress = `0x${EthUtil.privateToAddress(hexToBytes(privateKey)).toString('hex')}`;
		/**
		 * This callback is to request instance of deployed contract
		 * @callback Ballot~contractInstanceCallback
		 */
		Ballot.deployed().then(function(contractInstance) {
			contractInstance.getElectionName.call().then(function(electionName) {
				//alert(electionName);
				if (electionName.toString() != "") {
					contractInstance.getVotingDeadline.call().then(function(v) {

						var votingdeadline = v;
						var x = setInterval(function() {
							//get todays date and time
							var now = new Date().getTime();


							//set the voting endtime
							var votingtime = new Date(timeconverter(votingdeadline)).getTime();

							//find the distance between now and the count down date
							var distance = (votingtime - now);


							if (distance < 0) {

								clearInterval(x);
								window.location.href = "piechart.php";

							}
							else {
								$("#msg").html("You cannot view the result unless the voting period ends!");
								validationModal.modal();
								ok.onclick = function() {
									validationModal.modal("hide");
								}
							}
						}, 1000);
					});


				}
				else {
					$("#msg").html("No election is available at this time!");
					validationModal.modal();
					ok.onclick = function() {
						validationModal.modal("hide");
					}
				}
			});


		});

	}
	catch (err) {
		console.log(err);
	}
}

/*
 * This method converts a unix timestamp from the blockchain to a human readable time
 * @param {number} UNIX_timestamp
 *    The unix time of the duration of the election
 * @return {string}
 *    Returns the time equivalent of unix into a string
 * 
 */
window.timeconverter = function(UNIX_timestamp) {
	var a = new Date(UNIX_timestamp * 1000);
	var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
	var year = a.getFullYear();
	var month = months[a.getMonth()];
	var date = a.getDate();
	var hour = a.getHours();
	var min = a.getMinutes();
	var sec = a.getSeconds();
	var time = date + ' ' + month + ' ' + year + ' ' + hour + ':' + min + ':' + sec;
	return time;
}

/*
 * This method converts a hex number to bytes32
 * @param {number} hex
 *    The hex value which needs to be converted to bytes32
 * @return {bytes}
 *    Returns the equivalent of hex into bytes
 * 
 */
function hexToBytes(hex) {
	for (var bytes = [], c = 0; c < hex.length; c += 2)
		bytes.push(parseInt(hex.substr(c, 2), 16));
	return bytes;
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

	/**
	 * This callback is to request instance of deployed contract
	 * @callback Ballot~contractInstanceCallback
	 */
	Ballot.deployed().then(function(contractInstance) {
		contractInstance.getVotingDeadline.call().then(function(deadline) {
			console.log("votingdeadline:" + deadline.toString())
			var votingdeadline = deadline;

			/** This method sets the countdown timer*/
			var x = setInterval(function() {
				/** This method gets todays date and time*/
				var now = new Date().getTime();


				/**This call to timeconverter method sets the voting endtime*/
				var votingtime = new Date(timeconverter(votingdeadline)).getTime();

				/**This calculation finds the distance between now and the count down date*/
				var distance = (votingtime - now);
				console.log("distance: " + distance);

				/**Time calculations for days, hours, minutes and seconds*/
				var days = Math.floor(distance / (1000 * 60 * 60 * 24));
				var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
				var seconds = Math.floor((distance % (1000 * 60)) / 1000);

				/**Output the result in an element with id="votingendtime"*/
				if (days === 0 && hours !== 0 && minutes !== 0 && seconds !== 0) {

					$("#daysinfo").hide();
					$("#hoursinfo").show();
					$("#minutesinfo").show();
					$("#secondsinfo").show();
				}
				else if (days === 0 && hours === 0 && minutes !== 0 && seconds !== 0) {

					$("#daysinfo").hide();
					$("#hoursinfo").hide();
					$("#minutesinfo").show();
					$("#secondsinfo").show();

				}
				else if ((days === 0) && (hours === 0) && (minutes === 0)) {
					$("#daysinfo").hide();
					$("#hoursinfo").hide();
					$("#minutesinfo").hide();
					$("#secondsinfo").show();
				}
				else {
					$("#clockdiv").show();

				}

				document.querySelector(".days").innerHTML = days;
				document.querySelector(".hours").innerHTML = ('0' + hours).slice(-2);
				document.querySelector(".minutes").innerHTML = ('0' + minutes).slice(-2);
				document.querySelector(".seconds").innerHTML = ('0' + seconds).slice(-2);

				if (distance < 0) {
					clearInterval(x);
					if (votingdeadline === 0) {
						document.getElementById("countdown").innerHTML = "";
						$("#clockdiv").hide();
					}
					else {
						document.getElementById("countdown").innerHTML = "VOTING CLOSED";
						$("#clockdiv").hide();
						$("#info").hide();
					}

				}
				else {
					document.getElementById("info").innerHTML = "VOTING TIME LEFT";
					$("#clockdiv").show();
				}
			}, 1000);




		});
	});

});