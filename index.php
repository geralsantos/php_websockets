<?php
$session = mt_rand(1,999);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Chat</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">

	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons" rel="stylesheet">
  	<link href="https://cdn.jsdelivr.net/npm/vuetify/dist/vuetify.min.css" rel="stylesheet">
  	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">

	<style type="text/css">
	* {margin:0;padding:0;box-sizing:border-box;font-family:arial,sans-serif;resize:none;}
	html,body {width:100%;height:100%;}
	/*.wrapper {position:relative;margin:auto;max-width:1000px;height:100%;}*/
	/*#chat_output {position:absolute;top:0;left:0;padding:20px;width:100%;height:calc(100% - 100px);}*/
	#chat_input {position:absolute;bottom:0;left:0;padding:10px;width:100%;height:100px;border:1px solid #ccc;}
	</style>
</head>
<body>
	<div id="app" class="wrapper">
	<!--<textarea id="chat_input2" v-model="chat_input2" placeholder="Deine Nachricht2..." @keyup.enter="enter2()" ></textarea>-->

	<div id="chat_output"></div>	
	<!--<div id="chat_output2"></div>	-->
		<textarea id="chat_input" v-model="chat_input" placeholder="Deine Nachricht..." @keyup.enter="enter()" ></textarea>
		<input type="hidden" id="session_id" v-model="session_id" value="<?php echo $session; ?>">
	</div>
	<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  		<script src="https://cdn.jsdelivr.net/npm/vuetify/dist/vuetify.js"></script>
		<script src="js/vue.js" ></script>
</body>
</html>