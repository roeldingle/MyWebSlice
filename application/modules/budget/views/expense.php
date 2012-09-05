<div id="main" class="np">
   <div class="breadcrumbs">
      <a href="#" class="main">Expense Management</a>&gt;
      <a href="#">Real Expense</a>
   </div>
<h2 class="title nm np fl"><strong class="">Real Expenses </strong><span class="subtext">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></h2><a href="<?php echo base_url()?>budget/expense/add_expense" class="btn btn_type_1 fl"><span>Add New Expense</span></a>
   <div class="content np">
      <ul class="sort_links">
         <li class="first"><a href="#">All <span class="number">(4)</span></a></li>
         <li><a href="#">Head Office <span class="number">(1)</span></a></li>
         <li><a href="#">ADMIN <span class="number">(3)</span></a></li>
         <li><a href="#">HR <span class="number">(1)</span></a></li>
         <li><a href="#">IT <span class="number">(1)</span></a></li>
         <li class="last"><a href="#">Photo <span class="number">(1)</span></a></li>
      </ul>		
    <!-- table_wrap_1 -->
    <div class="table_wrap_1">
       <div>
       <!-- table_1 -->
       <table class="table_1 table-expense-list">
          <thead>
          <tr>
             <th><input type="checkbox"/></th>
             <th>Department</th>
             <th>Date</th>
             <th>Type</th>
             <th>Status</th>
             <th>Req. Amt</th>
             <th>Req. Form / Bill</th>
             <th>Receipts</th>
             <th>Received Amount</th>
             <th>Payment</th>
             <th>Cash on Hand</th>
             <th>Quantity</th>
             <th>Cost per Item</th>
             <th>Supplier</th>
             <th>Category</th>
             <th>Particulars</th>
          </tr>
          </thead>
          <tfoot>
          <tr class="tbg_3">
             <th scope="row" colspan="5">2012 Mar. Total </th>
             <td class="ar">900.00</td>
             <td colspan="2"></td>
             <td class="ar separate">9505.00</td>
             <td class="ar">8495.00</td>
             <td class="ar">505.00</td>
             <td class="ac">6</td>
             <td class="ar">8495.00</td>
             <td colspan="3"></td>
          </tr>
          <tr>
          <th scope="row" colspan="5">Bank Balance </th>
             <td class="ar" colspan="2">UB(B) :</td>
             <td class="ar" >505</td>
             <td colspan="8"></td>
          </tr>
          </tfoot>
          <tbody>  
          <tr>
             <td><input type="checkbox" name="?" value="?" /></td>
             <td>HeadOffc</td>
             <td>3/5/12</td>
             <td>(In-Out) KrDeposit</td>
             <td>KR Transfr</td>
             <td class="ar">2000</td>
             <td class="ac"><img src="<?php echo $assets_path; ?>site/images/reg_form_bill.jpg" alt="reg"/></td>
             <td class="ac"></td>
             <td class="ar"></td>
             <td class="ar"></td>
             <td class="ar"></td>
             <td class="ac"></td>
             <td class="ar"></td>
             <td class="ar"></td>
             <td>Head Office: MoneyTran</td>
             <td>Electric - Period jan1</td>
          </tr>
          <tr>
             <td><input type="checkbox" name="?" value="?" /></td>
             <td>Admin</td>
             <td>3/5/12</td>
             <td>Expense</td>
             <td>Paid</td>
             <td class="ar"></td>
             <td class="ac"></td>
             <td class="ac"><img src="<?php echo $assets_path; ?>site/images/receipt_1.jpg" alt="receipt"/></td>
             <td class="ar">2000</td>
             <td class="ar">1995</td>
             <td class="ar"> 5</td>
             <td class="ac"></td>
             <td class="ar">1995</td>
             <td>OCC  </td>
             <td>ADMIN: Bills...</td>
             <td>Electric - Period jan1</td>
           </tr>
           <tr>
              <td><input type="checkbox" name="?" value="?" /></td>
              <td>HeadOffc</td>
              <td>3/6/12</td>
              <td>(In-Out) KrDeposit</td>
              <td>KR Trnsfrd</td>
              <td class="ar">2000</td>
              <td class="ac"><img src="<?php echo $assets_path; ?>site/images/reg_form_bill.jpg" alt="reg"/></td>
              <td class="ac"></td>
              <td class="ac"></td>
              <td class="ar"></td>
              <td class="ar"></td>
              <td class="ar"></td>
              <td class="ar"></td>
              <td></td>
              <td>Head Office: MoneyTran</td>
              <td>JobsDB 2nd week</td>
           </tr>
           <tr>
              <td><input type="checkbox" name="?" value="?" /></td>
              <td>HR</td>
              <td>3/6/12</td>
              <td>Expense</td>
              <td>Paid</td>
              <td class="ar"></td>
              <td class="ac"></td>
              <td class="ac"><img src="<?php echo $assets_path; ?>site/images/receipt_2.jpg" alt="receipt"/></td>
              <td class="ar">4000</td>
              <td class="ar">4000</td>
              <td class="ar">0</td>
              <td class="ac"></td>
              <td class="ar">4000</td>
              <td>JobsDB</td>
              <td>HR:SERVICE...</td>
              <td>JobsDB 2nd week</td>
           </tr>
           <tr>
              <td><input type="checkbox" name="?" value="?" /></td>
              <td>HeadOffc</td>
              <td>3/7/12</td>
              <td>(In-Out) KrDeposit</td>
              <td>KR Trnsfrd</td>
              <td class="ar">2000</td>
              <td class="ac"><img src="<?php echo $assets_path; ?>site/images/reg_form_bill.jpg" alt="reg"/></td>
              <td class="ac"></td>
              <td class="ar"></td>
              <td class="ar"></td>
              <td class="ar"></td>
              <td class="ac"></td>
              <td class="ar"></td>
              <td></td>
              <td>Head Office: MoneyTran</td>
              <td>OCC Assoc Dues</td>
           </tr>
           <tr>
              <td><input type="checkbox" name="?" value="?" /></td>
              <td>Admin</td>
              <td>3/7/12</td>
              <td>Expense</td>
              <td>Requestng </td>
              <td class="ar"></td>
              <td class="ac"></td>
              <td class="ac"><img src="<?php echo $assets_path; ?>site/images/receipt_1.jpg" alt="receipt"/></td>
              <td class="ar">1000</td>
              <td class="ar">500</td>
              <td class="ar">500</td>
              <td class="ac">1</td>
              <td class="ar">500</td>
              <td>OCC</td>
              <td>Admin: Bills Pay..</td>
              <td>OCC Assoc Dues</td>
           </tr>
           <tr>
              <td><input type="checkbox" name="?" value="?" /></td>
              <td>HeadOffc</td>
              <td>3/8/12</td>
              <td>(In-Out) KrDeposit</td>
              <td>KR Trnsfrd</td>
              <td class="ar">2000</td>
              <td class="ac"><img src="<?php echo $assets_path; ?>site/images/reg_form_bill.jpg" alt="reg"/></td>
              <td class="ac"></td>
              <td class="ar"></td>
              <td class="ar"></td>
              <td class="ar"></td>
              <td class="ac"></td>
              <td class="ar"></td>
              <td></td>
              <td>Head Office: MoneyTran</td>
              <td>PayModel - Maria </td>
           </tr>
           <tr>
              <td><input type="checkbox" name="?" value="?" /></td>
              <td>PHOTO</td>
              <td>3/8/12 </td>
              <td>Expense</td>
              <td>Paid</td>
              <td class="ar"></td>
              <td class="ac"></td>
              <td class="ac"><img src="<?php echo $assets_path; ?>site/images/receipt_1.jpg" alt="receipt"/></td>
              <td class="ar">1000 </td>
              <td class="ar">1000 </td>
              <td class="ar">0</td>
              <td class="ac">1</td>
              <td class="ar">1000</td>
              <td>Photome</td>
              <td>PHOTHO: Pay</td>
              <td>PayModel - Maria</td>
           </tr>
           <tr>
              <td><input type="checkbox" name="?" value="?" /></td>
              <td>HeadOffc</td>
              <td>3/9/12</td>
              <td>(In-Out) KrDeposit </td>
              <td>KR Trnsfrd </td>
              <td class="ar">2000</td>
              <td class="ac"><img src="<?php echo $assets_path; ?>site/images/reg_form_bill.jpg" alt="reg"/></td>
              <td class="ac"></td>
              <td class="ar"></td>
              <td class="ar"></td>
              <td class="ar"></td>
              <td class="ac"></td>
              <td class="ar"></td>
              <td></td>
              <td>Head Office: MoneyTran</td>
              <td>Budget for comps</td>
           </tr>
           <tr>
              <td rowspan="2"><input type="checkbox" name="?" value="?" /></td>
              <td rowspan="2">IT</td>
              <td rowspan="2">3/9/12 </td>
              <td rowspan="2">Expense for DP comp paymet</td>
              <td rowspan="2">Paid </td>
              <td rowspan="2" class="ar"></td>
              <td rowspan="2" class="ac"></td>
              <td rowspan="2" class="ac"><img src="<?php echo $assets_path; ?>site/images/receipt_1.jpg" alt="receipt"/><br /><img src="<?php echo $assets_path; ?>site/images/receipt_1.jpg" alt="receipt"/></td>
              <td rowspan="2" class="ar">1000</td>
              <td rowspan="2" class="ar">1000</td>
              <td rowspan="2" class="ar">0</td>
              <td rowspan="2" class="ac">2</td>
              <td class="ar">800</td>
              <td>SamSmug</td>
              <td>IT:OFFICE...</td>
              <td>Deposited Money</td>
           </tr>
           <tr>
              <td class="ar">200</td>
              <td>Samsung</td>
              <td>IT:Equipment</td>
              <td>Deposit Money to bank wirespurchase</td>
           </tr>
           <tr>
              <td><input type="checkbox" name="?" value="?" /></td>
              <td>Admin</td>
              <td>3/10/12</td>
              <td>(In-Out) PhDepost</td>
              <td>KR Rcvd</td>
              <td class="ar"></td>
              <td></td>
              <td></td>
              <td class="ar">505</td>
              <td class="ar">0</td>
              <td class="ar">0</td>
              <td class="ac">0</td>
              <td class="ar"></td>
              <td></td>
              <td>Admin: Deposit Cash...</td>
              <td>Return Cash on han</td>
           </tr>
           </tbody>
        </table>
		<!-- //table_1 -->
		</div>
	</div>
	<!-- //table_wrap_1 -->
   </div>
</div>