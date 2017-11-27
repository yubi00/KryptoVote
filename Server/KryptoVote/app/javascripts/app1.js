/***********************************************************************
 * FILENAME :  app1.js              DESIGN REF: KV00
 *
 * DESCRIPTION :
 *       This app1.js contains the codes for the viewing the results of the election
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
 * 
 */
import {default as Web3} from 'web3';
import {default as contract} from 'truffle-contract';



import ballot_artifacts from '../../build/contracts/Ballot.json'

var Ballot = contract(ballot_artifacts);


window.drawChart = function() {

	/**
	 * This callback is to request instance of deployed contract
	 * @callback Ballot~contractInstanceCallback
	 */
	Ballot.deployed().then(function(contractInstance) {
		var data = new google.visualization.DataTable();

		data.addColumn('string', 'Candidates');
		data.addColumn('number', 'Votes');
		contractInstance.getCandidateLength.call().then(function(v) {
			var length = parseInt(v);

			for (var i = 0; i < length; i++) {
				contractInstance.getCandidate.call(i).then(function(candidateName) {
					var candidate = candidateName;

					contractInstance.totalVotesFor.call(candidate).then(function(vo) {
						var vote = parseInt(vo);
						$("#customFields").append('<tbody><td><style type="text/css">input { border: none }</style><label for="customFieldName"> ' + candidate + ' </label> &nbsp;</td><td><label for="candidate">' + vote + ' </label></td></tr></tbody>');

						data.addRow([candidate, vote]);

						var options = {
							'title': 'La TROBE STUDENT ELECTION 2017',
							'width': 500,
							'height': 300,
							is3D: true
						};

						// Instantiate and draw the chart.
						var chart = new google.visualization.PieChart(document.getElementById('piechart'));
						chart.draw(data, options);


					});

				});

			}
		});
	});

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
		contractInstance.getElectionName().call().then(function(electionName) {
			$("#elecName").html(electionName.toString());
			contractInstance.getCandidateLength.call().then(function(v) {
				var length = parseInt(v);
				for (var i = 0; i < length; i++) {
					contractInstance.getCandidate.call(i).then(function(candidateName) {
						var candidate = candidateName;

						contractInstance.totalVotesFor.call(candidate).then(function(v) {
							var vote = parseInt(v);
							$("#customFields").append('<tbody><td><style type="text/css">input { border: none }</style><label for="customFieldName"> ' + candidate + ' </label> &nbsp;</td><td><label for="candidate">' + vote + ' </label></td></tr></tbody>');


						});

					});

				}


			});
		});
	});
	google.charts.load("current", {
		packages: ["corechart"]
	});
	google.charts.setOnLoadCallback(drawChart);

});