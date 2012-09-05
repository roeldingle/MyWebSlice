<div id="main" class="np">
	<h2 class="title nm np fl"><strong class="">Verrrrrrrrrrrrrrrrrrrry long title Template </strong><span class="subtext">Category 1</span></h2><a href="#" class="btn btn_type_1 fl"><span>Add New Employee</span></a>
	<div class="content np">
	<p>form template</p>
        <?php
$aoption = array(
   "name"=>"myform",
   "method_type" => "post",
   "class" => "test",
   "onsubmit" => "test();",
   "module" =>"login123",
   "controller" => "exec123",
   "method" => "save"
);        
        ?>
        <?php echo $this->common->form_submit($aoption);?>
			<table class="table_form al" border="0">
				<colgroup>
					<col width="140px" />
					<col />
				</colgroup>
				<tr>
					<th><label for="input1">input type 1</label></th>
					<td><input type="text" class="input_type_1 input_required nm" id="input1" /><span class="message_type1 np">Required</span></td>
				</tr>
				<tr>
					<th><label for="input2">input type 2</label></th>
					<td><input type="text" class="input_type_2 nm" id="input2" /><span class="message_type1 np">Important</span></td>
				</tr>
				<tr>
					<th>input type 3</th>
					<td>
						<div class="fl nm np" style="display:inline-block">
							<input type="text" class="input_type_3 fl" />
							<input type="text" class="input_type_3 fl nm" />
						</div>
						<span class="message_type2 np fl">Important</span>
					</td>
				</tr>
				<tr>
					<th><label for="input1">password input type 1</label></th>
					<td><input type="password" class="input_type_1 nm" id="input1" /></td>
				</tr>
				<tr>
					<th><label for="input2">password input type 2</label></th>
					<td><input type="password" class="input_type_2 nm" id="input2" /></td>
				</tr>
				<tr>
					<th>password input type 3</th>
					<td>
						<div class="fl nm np" style="display:inline-block">
							<input type="password" class="input_type_3 fl" />
							<input type="password" class="input_type_3 fl nm" />
						</div>
					</td>
				</tr>
				<tr>
					<th><label for="filebrowse">Long Label Name</label></th>
					<td><input type="file" class="nm np" id="filebrowse" /></td>
				</tr>
				<tr>
					<th><label for="select1">Select Type 1</label></th>
					<td>
						<select class="select_type_1 nm np" id="select1">
							<option>option 1</option>
							<option>option 3</option>
							<option>option 2</option>
						</select>
					</td>
				</tr>
				<tr>
					<th>Very Long Label Name</th>
					<td>
						<select class="select_type_1 fl np">
							<option>option 1</option>
							<option>option 3</option>
							<option>option 2</option>
						</select>
						<select class="select_type_1 fl nm np">
							<option>option 1</option>
							<option>option 3</option>
							<option>option 2</option>
						</select>
					</td>
				</tr>
				<tr>
					<th><label for="select2">Select Type 2</label></th>
					<td>
						<select class="select_type_2 nm np" id="select2">
							<option>small option</option>
							<option>option 3</option>
							<option>option 2</option>
						</select>
					</td>
				</tr>
				<tr>
					<th>Very Long Label Name</th>
					<td>
						<select class="select_type_2 fl np">
							<option>small option</option>
							<option>option 3</option>
							<option>option 2</option>
						</select>
						<select class="select_type_2 fl np">
							<option>small option</option>
							<option>option 3</option>
							<option>option 2</option>
						</select>
						<select class="select_type_2 fl nm np" id="select2">
							<option>small option</option>
							<option>option 3</option>
							<option>option 2</option>
						</select>
					</td>
				</tr>
				<tr>
					<th><label for="select3">select type 3</label></th>
					<td>
						<select class="select_type_3 nm np" id="select3">
							<option>small option</option>
							<option>option 3</option>
							<option>option 2</option>
						</select>
					</td>
				</tr>
				<tr>
					<th>radio type 1</th>
					<td>
						<ul class="opt_radio nl nm np">
							<li><label for="option1">Radio 1</label><input type="radio" class="radio_type_1 np" name="option" id="option1" checked="checked" /></li>
							<li><label for="option2">Radio 2</label><input type="radio" class="radio_type_1 np" name="option" id="option2" /></li>
						</ul>
					</td>
				</tr>
				<tr>
					<th><label for="textarea1">text area 1</label></th>
					<td>
						<textarea class="textarea_1" id="textarea1"></textarea>
					</td>
				</tr>
				<tr>
					<th><label for="textarea2">text area 2</label></th>
					<td>
						<textarea class="textarea_2" id="textarea2"></textarea>
					</td>
				</tr>
				<tr>
					<th><label>button</label></th>
					<td>
						<a href="#" class="btn_vmd btn_vmd_1">V</a>
						<a href="#" class="btn_vmd btn_vmd_2">M</a>
						<a href="#" class="btn_vmd btn_vmd_3">D</a>
					</td>
				</tr>
				<tr>
					<th>text</th>
					<td>
						this is a message
					</td>
				</tr>
			</table>
		<ul class="control_buttons np nl">
			<li><a href="#" class="btn_small btn_type_3s"><span>Save</span></a></li>
			<li><a href="#" class="link_1 mt5 fl">Undo Changes</a></li>
		</ul>
		</form>

		<p>notice/warning/tooltip</p>
		<span class="message_type1">Error message_type1</span>
		<br /><br />
		<span class="message_type2">Error message_type2 for multiple input type text</span>
		<br /><br />
		<span class="message_type3">success</span>
	</div>
</div>