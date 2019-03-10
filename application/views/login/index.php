<article>
	<div class="label">ログイン</div>
	<div class="form-unit">
		<form action="<?= base_url() ?>doLogin/" method="post">
			<input type="text" class="form-control" name="id" placeholder="uer id" />
			<input type="password" class="form-control" name="password" placeholder="password" />
			<input type="submit" class="btn btn-info" value="Login">
		</form>
		<a href="<?= base_url() ?>signup/"><button type="button" class="btn btn-info" name="button">アカウント登録</button></a>
	</div>
</article>

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
	input {
		margin: 20px auto;
	}
</style>
