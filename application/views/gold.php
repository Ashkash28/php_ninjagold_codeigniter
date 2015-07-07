<!doctype html>
<html>
<head>
	<title>Ninja Gold Game</title>
	<style>
		body{
			width: 1500px;
		}
		.gold h2, p{
			display: inline-block;
		}
		.amount{
			display: inline-block;
			height: 20px;
			width: 100px;
			border: 1px solid black;
		}
		.box {
			border: 1px solid black;
			width: 250px;
			height: 200px;
			display: inline-block;
			padding: 0px 10px;
		}
		
		.gold p{
			border: 1px solid black;
			width: 150px;
			height: 30px;
			text-align: center;
		}
		.activities {
			width: 600px;
			height: 200px;
			border: 1px solid black;
			overflow: scroll;
		}
		.red {
			color: red;
		}
		.green {
			color: green;
		}
	</style>
</head>

<body>
	<div class="gold">
		<h2>Your Gold: </h2>
		<p><?= $this->session->userdata('gold'); ?></p>	
	</div>

	<div class="box">
		<h1>Farm</h1>
		<h2>(earns 10-20 golds)</h2>
		<form action="/ninja/process_money" method="post">
			<input type="hidden" name="building" value="farm"/>
			<input type="submit" value="Find Gold!"/>
		</form>
	</div>

	<div class="box">
		<h1>Cave</h1>
		<h2>(earns 5-10 golds)</h2>
		<form action="/ninja/process_money" method="post">
			<input type="hidden" name="building" value="cave"/>
			<input type="submit" value="Find Gold!"/>
		</form>
	</div>

	<div class="box">
		<h1>House</h1>
		<h2>(earns 2-5 golds)</h2>
		<form action="/ninja/process_money" method="post">
			<input type="hidden" name="building" value="house"/>
			<input type="submit" value="Find Gold!"/>
		</form>
	</div>

	<div class="box">
		<h1>Casino!</h1>
		<h2>(earns/takes 0-50 golds)</h2>
		<form action="/ninja/process_money" method="post">
			<input type="hidden" name="building" value="casino"/>
			<input type="submit" value="Find Gold!"/>
		</form>
	</div>

	<h3>Activities:</h3>
	<div class="activities">
		<?php
			$box = $this->session->userdata('activities');
			
			for($i = count($box)-1; $i>=0; $i--)
			{
				echo $box[$i];
			}
		?>
	</div>
	<form action="/ninja/reset" method="post">
		<input type="submit" name="submit" value="Reset"/>
	</form>
</body>
</html>