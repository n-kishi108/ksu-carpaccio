<article>
	<div class="label">登録</div>
	<div class="form-unit">
		<form action="<?= base_url() ?>addAcount/" name="signup" method="post">
			<input type="text" class="form-control" name="id" placeholder="uer id" onchange="change()" />
			<input type="password" id="ps1" class="form-control" name="password" placeholder="password" onchange="change()" />
			<input type="password" id="ps2"class="form-control" name="confirm_password" placeholder="password" onchange="change()" />
			<input type="text" id="final_section" class="form-control" name="acount_name" placeholder="Desired account name" onchange="change()" />
			<div id="dummy" class="btn btn-primary">Signup</div>
			<!-- <input type="submit" class="btn btn-info" value="Signup"> -->
			<a href="<?= base_url() ?>login/"><button type="button" class="btn btn-info" name="button">ログイン</button></a>
		</form>
	</div>
</article>
<script>
	window.onload = change();
	function change(){
		console.log('change');
		var id = document.forms.signup.id.value;
		var ps1 = document.forms.signup.password.value;
		var ps2 = document.forms.signup.confirm_password.value;
		var ac = document.forms.signup.acount_name.value;
		// var ps1 = document.getElementById(ps1);
		// var ps2 = document.getElementById(ps2);
		var el_dummy = document.getElementById('dummy');
		var el_submit = document.getElementById('submit')
		//ダミーボタンが表示されていたら
		if(el_dummy != null || el_submit == null) {
			//ダミーボタンを削除
			el_dummy.parentNode.removeChild(el_dummy);
		}else{
			// 投稿ボタンを削除
			el_submit.parentNode.removeChild(el_submit);
		}

		var dom = document.getElementById('final_section');
		console.log(id);
		console.log(ps1);
		console.log(ps2);
		console.log(ac);

		//どちらかが{未入力、半角や全角の空白のみ、改行のみ}ならば
		// if(id == null || ps1 == null || ps2 == null || ac == null) return;
		if(id == '' || ps1 == '' || ps2 == '' || ac == '' || ps1 != ps2) {
			console.log('>>hello');
			//ダミーボタンを作成
			dom.insertAdjacentHTML('afterend', '<div id="dummy" class="btn btn-primary">Signup</div>');
		}else{
			//投稿ボタンを作成
			dom.insertAdjacentHTML('afterend', '<input type="submit" id="submit" class="btn btn-info" value="Signup">');
		}
	}
</script>
<!-- <input type="submit" value="submit"> -->

<style media="screen">
	article {
		position: relative;
		width: 600px;
		height: 500px;
		margin: 100px auto;
	}
	.label {
		position: absolute;
		top: 50px;
		left: 250px;
		width: 100px;
		height: 100px;
		background: #ddd;
		text-align: center;
		line-height: 100px;
		border-radius: 50px;
		z-index: 999;
	}
	.form-unit {
		position: absolute;
		width: 600px;
		height: 400px;
		padding: 50px;
		background: #ddd;
		margin-top: 100px;
	}
	input[type='text'], input[type='password']{
		margin: 20px auto;
	}
	input[type='submit'], #dummy, button{
		display: inline-block;
	}
</style>
