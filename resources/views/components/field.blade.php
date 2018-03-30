<div class="form-group">
	{{ html()->element('label')->html($prop['label'])->attribute('for', $field)->render() }}
	<input type="text" class="form-control" id="email" name="email">
</div>