<div id="main" class="np">
	<div class="breadcrumbs">
		<a href="#" class="main">HR Management</a>&gt;
		<a href="#">HR Management List</a>
	</div>
	<h2 class="title np fl mb10"><strong class="">HR Management List</strong></h2>
	<div class="content np">
		<div class="search_01 fr">
			<form action="#" method="post">
				<label>Search Employee</label>
				<input type="text" value="" class="input_type_4 start-date" />
				<a href="#" class="btn_small btn_type_2s"><span>Search</span></a>
			</form>
		</div>
		<div class="show_rows fr">
			<form>
				<label>Show Rows</label>
				<?php echo $this->site->show_rows(10,array(10,20,30,50,60));?>
			</form>
		</div>
		<span class="fl mb10 np"><a href="javascript:void(0);" class="btn_small btn_type_1s add-employee"><span>Add New Employee</span></a></span>
		<table border="0" cellspacing="0" cellpadding="0" class="table_02 ac">
			<colgroup>
				<col width="40" />
				<col width="50" />
				<col />
				<col width="140" />
				<col width="100" />
				<col width="100" />
			</colgroup>
			<thead>
				<tr>
					<th><input type="checkbox" class="check-all"/></th>
					<th>No.</th>
					<th><a href="<?php echo $common->list_sorter('t');?>" class="orderby_up">Employee Name</a></th>
					<th><a href="<?php echo $common->list_sorter('s');?>" class="orderby_down">Department</a></th>
					<th><a href="<?php echo $common->list_sorter('date');?>" class="orderby_down">Start Date</a></th>
					<th class="last"><a href="#" class="orderby_down">End Date</a></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($aresult as $rows){?>
				<tr>
					<td><input type="checkbox" class="row-list"/></td>
					<td>5</td>
					<td><a href="#"><?php echo $rows->firstname?></a></td>
					<td><?php echo $rows->department?></td>
					<td><?php echo $rows->start_date?></td>
					<td class="last"><?php echo $rows->end_date?></td>
				</tr>
				<?php }?>
			</tbody>
		</table>
		<span class="fl nm np"><a href="#" class="btn_small btn_type_3s"><span>Delete</span></a></span>
		<?php echo $this->common->pager(100,5);?>
	</div>
</div>
<!--begin hidden-->
<div class="add-employee-dialog" title="Delete">
	<form>
		<table class="table_form al" border="0">
			<colgroup>
				<col width="140px" />
				<col />
			</colgroup>
			<tr>
				<th><label for="input1">input type 1</label></th>
				<td><input type="text" class="input_type_1 nm" id="input1" /></td>
			</tr>
			<tr>
				<th><label for="input2">input type 2</label></th>
				<td><input type="text" class="input_type_2 nm" id="input2" /></td>
			</tr>
			<tr>
				<th>input type 3</th>
				<td>
					<input type="text" class="input_type_3 fl" />
					<input type="text" class="input_type_3 fl nm" />
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
		</table>
		<div class="btn_div">
			<a href="#" class="btn btn_type_3 btn_space"><span>Save</span></a>
			<a href="javascript:site.close_dialog($('.add-employee-dialog'),function(){ })" class="btn btn_type_3"><span>Cancel</span></a>
		</div>
	</form>
</div>
<!--end hidden-->