

window.onload = function() {
	var login = document.getElementById( "login" ).getAttribute("ids");
	var path = document.getElementById( "record_path" ).getAttribute("ids");
	var degree = document.getElementById( "degree" ).getAttribute("ids");
	var test_number = document.getElementById( "test_number" ).getAttribute("ids");

	// total time(minutes)
	var TIME = 30;  
	//score for each question
	var eachScore = 100 / test_number 

	var maxtime = TIME * 60 - 1;
	var timer = setInterval( time, 1000 );
	var score = 0;
	var submit = document.querySelector( "input[value = 'SUBMIT']" );
	submit.onclick = calculate;
	var back = document.querySelector( "input[value = 'BACK']" );
	back.style.visibility = "hidden";
	back.onclick = gohome;

	var date = new Date();
	date = date.getFullYear() + "/" + (date.getMonth() + 1) + "/" + date.getDate() + " " 
		+ date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds();

	// Countdown
	function time(){
		if ( maxtime >= 0 ) {
			var minutes = Math.floor( maxtime / 60 );
			var seconds = Math.floor( maxtime % 60 );
			var msg = document.getElementById( "timebox" );
			if ( minutes < 10 ) {
				 minutes = "0" +  minutes;
			}
			if ( seconds < 10 ) {
				 seconds = "0" +  seconds;
			}
			msg.innerHTML = "Remaining Time: " + minutes + ":" + seconds;

			// Reminder for the remaining 5 minutes
			if ( maxtime == 5 * 60 ) {
				alert( "5 minutes!" );
			} 
			maxtime--;
		}
		else{
			clearInterval( timer );
			alert( "The test is over!" );
			calculate();
		}
	}

	function calculate(){
		score = 0;
		// User selected answer
		var ans_selected;
		// Correct answer
		var ans = document.querySelectorAll("div[value = 'ans']");
		
		for (var i = 0; i < test_number; i++) {
			ans_selected = "";
			var question  = document.getElementById("question" + i);
			var selections = question.querySelectorAll("input[name = 'option']");
			
			for (var j = 0; j < selections.length; j++) {
				if ( selections[j].checked ) {
					//transform the option to a letter  0 -> A
					ans_selected += String.fromCharCode(parseInt(65  + parseInt(selections[j].getAttribute("value"))));
				}
			}
				
			var answer =  ans[i].getAttribute("ids");

			// The answer is completely correct to get the full score of this question
			if ( answer == ans_selected) {			
				score += eachScore;  
				ans[i].innerHTML = "You are right!";
			}

			// The answer is partially correct to get half of the score for this question.
			else if( check(ans_selected, answer) ){
				score += eachScore / 2;
				ans[i].innerHTML = "Not complete! " + answer +"  is the correct answer!";
			}

			// Do not score if there is an error option
			else
				ans[i].innerHTML = "Wrong! " + answer +"  is the correct answer!";
			ans[i].style.visibility = "visible";
		}
	 	hide();
	 	display_score(score);
	 	save(); 
	 	back.style.visibility = "visible";
	 }

	// Selected option compare with right answer
	function check( s1, s2 ){
		if( s1 == "" )
			return false;
		for ( var i = 0; i < s1.length; i++ ) {
			if ( s2.indexOf( s1[i] ) == -1 ) {
				return false;
			}
		}
		return true;
	}

	 // Hide the submit button and all input of options 
	 function hide(){
	 	submit.setAttribute('class','is_disabled');
	 	for (var i = 0; i < test_number; i++) {
			ans_selected = "";
			var question  = document.getElementById("question" + i);
			var selections = question.querySelectorAll("input[name = 'option']");
			for (var j = 0; j < selections.length; j++) {
				selections[j].setAttribute('class','is_disabled');
			}
	 	}
	}

	// display sore and clear timer
	function display_score(score){
		clearInterval(timer);
		var msg = document.getElementById( "timebox" );
			msg.innerHTML = "Your score is: " + score;
	}

	function  gohome(){
		window.history.back();		
	}

	function save(){
		if (login != "") {
			//location.href = "reco.php?path=" +path+'&date='+date +'&degree=' + degree +'&score='+score;
			var degree1 = degree.toLocaleUpperCase();
			new SimpleAjax('reco.php', 'GET', 'path='+path+'&date='+date +'&degree=' + degree1 +'&score='+score);
		}

	}

};
