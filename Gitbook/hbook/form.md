# form

```html
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>form</title>
</head>
<body>
<form action="login" method="post">
	<fieldset>
		<legend>照片选择</legend>
		<label for="file">选择照片</label>
		<input type="file" name="file">
	</fieldset>
	<fieldset>
		<legend>综合设置</legend>
		<div>选择尺寸</div>
		<input type="checkbox" name="size" value="5" checked>
		<label for="cb_0">5寸</label>
		<input type="checkbox" name="size" value="6">
		<label for="cb_0">6寸</label>
	<input type="radio" name="material" value="fushi">
	<label for="rd_0">富士</label>
	<input type="radio" name="material" value="keda">
	<label for="rd_0">柯达</label>
	<div>
		<label for="delivery">配送方式</label>
		<select id="delivery">
			<option value="0">快递</option>
			<option value="1">EMS</option>
			<option value="2" selected>平邮</option>
		</select>
	</div>
	 <label for="description">商品描述</label>
	<input type="text" name="description">
	<label for="feedback">意见反馈：</label>
	<textarea name="feedback" rows="5" id="feedback"></textarea>
	<input type="date" name="">

number:<input type="range" name="points" min="1" max="10" />
Points: <input type="number" name="points" min="1" max="10" />
Homepage: <input type="url" name="user_url" />
E-mail: <input type="email" name="user_email" />
	</fieldset>
	<div>
		<input type="submit" name="submit" value="subimt">
		<input type="reset">
		<button type="button">提交</button>
		<button type="reset">重置</button>
	</div>
</form>
</body>
</html>
```