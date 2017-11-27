/***********************************************************************
 * FILENAME :  ballot.js              DESIGN REF: KV00
 *
 * DESCRIPTION :
 *       This balot.js contains the codes for the ballot when the vote of the voter is cast.
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

window.voteForCandidate = function(name) {
	let candidateName = $('input:radio[name=candidate]:checked').val();
	try {
		var ballotModal = $("#ballotModal");
		var username = name;

		var account = web3.eth.coinbase;
		var unlock = web3.personal.unlockAccount(account, "Krypto123456");


		var privateKey = (web3.sha3(username)).substr(2);
		var ethaddress = `0x${EthUtil.privateToAddress(hexToBytes(privateKey)).toString('hex')}`;
		/**
		 * This callback is to request instance of deployed contract
		 * @callback Ballot~contractInstanceCallback
		 */
		Ballot.deployed().then(function(contractInstance) {
			contractInstance.getVoted.call(ethaddress).then(function(voted) {
				console.log("Voted: " + voted);
				if (!voted) {
					return contractInstance.isAllowed.call().then(function(res) {
						if (res == true) {


							var transactionHash1 = web3.eth.sendTransaction({
								from: account,
								to: ethaddress,
								value: web3.toWei(5, "ether")
							});
							var checkpoint = waitBlock(transactionHash1);
							var ethaddressBalance = parseInt(web3.fromWei(web3.eth.getBalance(ethaddress), "ether"));

							$("#msg").html("Your vote is being processed... ");
							ballotModal.modal("show");


							var timeout1 = setTimeout(function() {
								var meth = web3.sha3('vote(bytes32)');
								console.log("Method hash: " + meth);
								var part1 = meth.substr(0, 10);
								var part2 = (web3.toHex(candidateName)).substr(2);
								var dataCombination = part1.concat(part2);
								var contractaddr = contractInstance.address;
								var gasEstimate = 2 * (web3.eth.estimateGas({
									from: ethaddress,
									to: contractaddr,
									data: dataCombination
								}));
								console.log("Gas estimate value: " + gasEstimate)
								var g = '0x35097';
								var gPrice = '0x20000000000';
								var gLimit = '0x50000';
								var txParams = {
									gasPrice: gPrice,
									gas: gasEstimate,
									gasLimit: gLimit,
									from: ethaddress,
									to: contractaddr,
									data: dataCombination
								};
								var privateKeyCoinbaseBuffer = new Buffer(privateKey, 'hex');
								txParams.nonce = web3.eth.getTransactionCount(ethaddress);
								var tx = new Tx(txParams);
								tx.sign(privateKeyCoinbaseBuffer);

								var serializedTx = tx.serialize();
								var hash = web3.eth.sendRawTransaction('0x' + serializedTx.toString('hex'));
								$("#msg").html("Voting successful");
								var timeout2 = setTimeout(redirect, 2000);

							}, 3000);

						}
						else {
							$("#msg").html("Voting period has ended. You cannot vote! You will be redirected to your home page.");

							ballotModal.modal();
							var timeout3 = setTimeout(redirect, 2000);
						}
					});
				}
				else {
					$("#msg").html("You have already voted. Your vote has already been casted! You will be redirected to your home page.");
					ballotModal.modal();


					var timeout4 = setTimeout(redirect, 2000);

				}

			});




		});




	}
	catch (err) {
		console.log(err);
	}
}

/*
 * This method redirects to "index2.php" after the time out set in the calling function
 * 
 */
function redirect() {
	window.location.href = "index2.php";
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
 * This method is a javascript function of sleep
 * @param {number} ms
 *    This is the time to sleep
 */
function sleep(ms) {
	return new Promise(resolve => setTimeout(resolve, ms));
}

/*
 * This method is the waiting time until a miner includes the transaction hash in a block
 * @param {string} hash
 *    This is the hash of the transaction for ether transfer
 */
async function waitBlock(hash) {
	while (true) {
		let receipt = web3.eth.getTransactionReceipt(hash);
		if (receipt) {
			console.log("It may take 30s to 90s for the block to be mined!");
			//break;
			return true;
		}
		console.log("Waiting for a miner to include your transaction... currently in block " + web3.eth.blockNumber);
		await sleep(2000);
	}
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
		contractInstance.getElectionName.call().then(function(electionName) {

			$("#elecName").html(electionName.toString());
			contractInstance.getCandidateLength.call().then(function(v) {
				var length = parseInt(v);
				for (var i = 0; i < length; i++) {
					contractInstance.getCandidateDetails.call(i).then(function(result) {
						var candidate = result[0];
						var partySymbol = result[1];
						$("#customFields").append('<tbody style="font-size:20px;text-align:center;line-height:20px;"><tr><td style="background-color:#f08080;color:white;margin-top:5px;"><style type="text/css">input { border: none;width:300px;margin-top:10px;height:15px; }</style><label for="customFieldName" style="width:300px; margin-top:17px;"> ' + candidate + ' </label> &nbsp;<img src="./img/' + partySymbol + ' " alt="" height=40 width=40></img></td><td style="background-color:#f08080;color:white;width:10px;"><input type="radio" style="text-align:center;margin-top:30px;margin-left:45px;width=5px;font-size:15px;" name="candidate" value=' + candidate + ' ></td></tr></tbody>');
					});


				}



			});
		});
	});

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
						document.getElementById("countdown").innerHTML = "VOTING ENDS NOW";
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