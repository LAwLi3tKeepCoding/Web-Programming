
window.onload = function(){

	document.querySelector("input[value = 'Start']").onclick = getDegree;

	function getDegree(){

		var degree = document.getElementById("degree").value;
		location.href = "test.php?degree=" + degree;
	}
}