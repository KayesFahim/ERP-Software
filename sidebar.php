 <!-- Sidebar -->

 <?php 


print "<div class='modal fade bd-example-modal-lg' id='exampleModal' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true'>
<div class='modal-dialog modal-lg' role='document'>
    <div class='modal-content'>
    <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>Add New Something</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
        <span aria-hidden='true'>×</span>
        </button>
    </div>
    <div class='modal-body'>
        <div class='container-fluid'>
            <div class='row'>
                <div class='col-md-6'>
                    <div  class='sidebar-menu'>
                        <a href='../SalesQuatation/AddAirTicket.php'><i class='fe fe-plus'> </i> <span> Sales Quatation</span></a><br/>
                        <a href='../AirInvoice/AirTicket.php'><i class='fe fe-plus'> </i> <span> Invoice</span></a><br/>
                        <a href='../MoneyReciept/AddMoneyReciept.php'><i class='fe fe-plus'> </i> <span> Money Reciept</span></a><br/>
                        <a href='../Bill/AddBill.php'><i class='fe fe-plus'> </i> <span> Bill</span></a><br/>
                        <a href='../Customer/AddCustomer.php'><i class='fe fe-plus'> </i> <span> Add Customer</span></a><br/>
                        <a href='../Vendors/AddVendor.php'><i class='fe fe-plus'> </i> <span> Add Vendor</span></a><br/>
                        <a href='../Employee/AddEmployee.php'><i class='fe fe-plus'> </i> <span> Add Employee</span></a><br/>
                    </div>

                </div>
                
            </div>
        </div>
    </div>
    <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>               
    </div>
    </div>
</div>
</div>";


if($userRole == 'reservation'){

    print "<div class='sidebar' id='sidebar'>
         <div class='sidebar-inner slimscroll'>
             <div id='sidebar-menu' class='sidebar-menu'>
                 <ul>
                    
                     <li class='menu-title'>
                         <span>Main</span>
                     </li>
                     <li>
                         <a href='Dashboard.php'><i class='fe fe-home'></i> <span> Dashboard</span></a>
                     </li>
                     
                     <li>
                     <a data-toggle='dropdown'><i class='fe fe-layout'></i> <span>Sales Quatation</span></a>
                         <ul>
                             <li><a href='SalesQuatation'><i class='fe fe-layout'> </i> <span> Air Ticket</span></a></li>
                             
                         </ul>
                      </li>

                     <li>
                         <a data-toggle='dropdown'><i class='fe fe-layout'></i> <span> Invoice</span></a>
                             <ul>
                                 <li><a href='AirInvoice'><i class='fe fe-layout'> </i> <span> Air Ticket </span></a></li>
                                 
                             </ul>
                     </li>
                     <li>
                         <a data-toggle='dropdown'><i class='fe fe-layout'></i> <span> Role</span></a>
                             <ul>
                             <li><a href='Role'><i class='fe fe-layout'> </i> <span> All Role </span></a></li>
                                 <li><a href='Role/AddRole.php'><i class='fe fe-layout'> </i> <span> Add Role </span></a></li>
                                 
                             </ul>
                     </li>
                     
                 </ul>
             </div>
         </div>
     </div>" ;

}elseif($userRole == 'accounts'){
 print "<div class='sidebar' id='sidebar'>
 <div class='sidebar-inner slimscroll'>
     <div id='sidebar-menu' class='sidebar-menu'>
         <ul>
             <li class='menu-title'>
                 <span>Main</span>
             </li>
             <li>
                 <a href='dashboard.php'><i class='fe fe-home'></i> <span>Dashboard</span></a>
             </li>
             
             <li>
                 <a href='Bill.php'><i class='fe fe-layout'></i> <span>Bill</span></a>
             </li>

             <li>
                 <a href='MoneyReceipt.php'><i class='fe fe-layout'></i> <span>Money Receipt</span></a>
             </li>
             <li>
                 <a href='Report.php.php'><i class='fe fe-layout'></i> <span> Report</span></a>
             </li>
             
         </ul>
     </div>
 </div>
</div>" ;


} elseif($userRole =='developer'){

 echo "<div class='sidebar' id='sidebar'>
 <div class='sidebar-inner slimscroll'>
     <div id='sidebar-menu' class='sidebar-menu'>
         <ul>                
             <li class='menu-title'>
                 <span>Main</span>
             </li>
             <li>
             <a data-toggle='modal' class='btn btn-success' data-target='.bd-example-modal-lg'>
             <i class='fe fe-plus'></i> <span> Add New</span>
             </a>
             </li>
             <li>
                 <a href='../Dashboard.php'><i class='fe fe-home'></i> <span>Dashboard</span></a>
             </li>
             <li>
                 <a href='../SalesQuatation'><i class='fe fe-layout'></i> <span>Sales Quotation</span></a>
             </li>
             <li>
                  <a data-toggle='dropdown'><i class='fe fe-layout'></i> <span>Invoice</span></a>
                      <ul>
                         <li><a href='../AirInvoice'><i class='fe fe-layout'> </i> <span> Air Ticket</span></a></li>
                          <li><a href='access.php'><i class='fe fe-layout'> </i> <span> Visa</span></a> </li>
                         <li><a href='#'><i class='fe fe-layout'></i> Others</a></li>
                      </ul>
                     </li>
             <li>
                 <a data-toggle='dropdown'><i class='fe fe-layout'></i> <span>Accounting</span></a>
                     <ul>
                         <li><a href='../CashEquvalent'><i class='fe fe-layout'></i> <span>Cash And Cash</span></a></li>
                         <li><a href='access.php'><i class='fe fe-layout'></i> <span>Acces control</span></a> </li>
                         <li><a href='#'><i class='fe fe-layout'></i> Portal</a></li>
                     </ul>
             </li>
             <li>
                 <a href='../Bill'><i class='fe fe-layout'></i> <span>Bill</span></a>
             </li>
             <li>
                 <a href='../Expense'><i class='fe fe-layout'></i> <span>Expense</span></a>
             </li>
             <li>
                 <a href='../MoneyReciept'><i class='fe fe-layout'></i> <span>Money Receipt</span></a>
             </li>

             <li>
                 <a data-toggle='dropdown'><i class='fe fe-layout'></i> <span> Report</span></a>
                     <ul>
                         <li><a href='../Report/ClientLedger.php'><i class='fe fe-layout'></i> <span>Client Report</span></a></li>
                         <li><a href='../Report/VendorLedger.php'><i class='fe fe-layout'></i> <span>Vendor Report</span></a> </li>
                         
                     </ul>
             </li>
             <li>
                 <a href='../Salary/SalarySheet.php'><i class='fe fe-layout'></i> <span>Salary</span></a>
             </li>

             <li>
                <a href='../Attendance'><i class='fe fe-layout'></i> <span>Attendance</span></a>
             </li>
             
             <li>
                 <a href='../Employee'><i class='fe fe-layout'></i> <span>Employee</span></a>
             </li>
             <li>
                 <a href='../Vendors'><i class='fe fe-layout'></i> <span>Vendor</span></a>
             </li>
             <li>
                 <a href='../Customer'><i class='fe fe-layout'></i> <span>Customer</span></a>
             </li>
             
         </ul>
     </div>
 </div>
</div>";
}elseif($userRole == 'admin'){
 echo "<div class='sidebar' id='sidebar'>
 <div class='sidebar-inner slimscroll'>
     <div id='sidebar-menu' class='sidebar-menu'>
         <ul>
             <li class='menu-title'>
                 <span>Main</span>
             </li>

             <li>
                 <a href='../Inventory'><i class='fe fe-layout'></i> <span> Inventory</span></a>
             </li>
             
             <li>
                 <a href='../Salary'><i class='fe fe-layout'></i> <span>Salary</span></a>
             </li>
             <li>
                 <a href='../Attendance'><i class='fe fe-layout'></i> <span> Attandance</span></a>
             </li>
             <li>
                 <a href='../Employee'><i class='fe fe-layout'></i> <span> Employee </span></a>
             </li>
             
             

         </ul>
     </div>
 </div>
</div>";

}elseif($userRole == 'employee'){
    echo "<div class='sidebar' id='sidebar'>
    <div class='sidebar-inner slimscroll'>
        <div id='sidebar-menu' class='sidebar-menu'>
            <ul>
                <li class='menu-title'>
                    <span>Main</span>
                </li>

                <li>
                 <a href='../SalesQuatation'><i class='fe fe-layout'></i> <span>Sales Quotation</span></a>
             </li>
             <li>
                  <a data-toggle='dropdown'><i class='fe fe-layout'></i> <span>Invoice</span></a>
                    <ul>
                         <li><a href='../AirInvoice'><i class='fe fe-layout'> </i> <span> Air Ticket</span></a></li>
                          <li><a href='access.php'><i class='fe fe-layout'> </i> <span> Visa</span></a> </li>
                         <li><a href='#'><i class='fe fe-layout'></i> Others</a></li>
                    </ul>
            </li>
             
                <li>
                    <a href='../Attendance'><i class='fe fe-layout'></i> <span> Attandance</span></a>
                </li>
              
            </ul>
        </div>
    </div>
    </div>";

    }else{
        header("location:http://localhost/ERP-Software/index.php");
    }
     
?>	