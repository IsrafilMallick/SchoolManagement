<script type="text/javascript">
var win = null;
function NewWindow(mypage,myname,w,h,scroll){
LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
settings =
'height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable'
win = window.open(mypage,myname,settings)
}

function openIntegration(a,b,c){
   a=window.open(a,"_blank",b,!1);
   2==c?a.moveTo(0,0):0==c&&(a.moveTo(0,0),a.resizeTo(self.screen.width,self.screen.height))
}
</script>
<aside class="left-side sidebar-offcanvas">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image"></div>
            <div class="pull-left info">
                <p>Hello, <?php echo $UserActualName;?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="active"><a href="index.php"><i class="fa fa-home fa-lg"></i> <span>Home</span></a></li>
            <li class="treeview">
                <a href="#"><i class="fa fa-edit fa-lg"></i> <span><b>Entry</b></span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                <?php if($userlevel<0){?>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-user-secret"></i> <span>Super Admin</span><i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                    		<li><a href="QueryMaker.php" target="_blank"><i class="fa fa-database"></i> Make Query</a></li>
                            <li><a href="gender.php"><i class="fa fa-edit"></i> Gender Entry</a></li>
                            <li><a href="caste.php"><i class="fa fa-edit"></i> Caste Entry</a></li>
                            <li><a href="religion.php"><i class="fa fa-edit"></i> Religion Entry</a></li>
                            <li><a href="relation.php"><i class="fa fa-edit"></i> Relation Entry</a></li>
                            <li><a href="school_ntry.php"><i class="fa fa-edit"></i> Institution Entry</a></li>
                            <li><a href="reference.php"><i class="fa fa-edit"></i> Reference Entry</a></li>
                    		<li><a href="BatchEntry.php"><i class="fa fa-users"></i> Batch Entry</a></li>
                    		<li><a href="BankEntry.php"><i class="fa fa-university"></i> Bank Entry</a></li>
                    		<li><a href="PostOfficeEntry.php"><i class="fa fa-envelope"></i> Post Office Entry</a></li>
                        </ul>
                    </li>
                    <?php }?>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-book"></i> <span>Course</span><i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                    		<li><a href="CoursePackage.php"><i class="fa fa-edit"></i> Course Package Entry</a></li>
                    		<li><a href="CourseEntry.php"><i class="fa fa-edit"></i> Course Entry</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            
            <li class="treeview">
                <a href="#"><i class="fa fa-cogs fa-lg"></i> <span>Setup</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="CourseSetup.php"><i class="fa fa-cog"></i>Course Setup</a></li>
                    <li><a href="BatchSetup.php"><i class="fa fa-users"></i>Batch Setup</a></li>
                </ul>
            </li>
            
            <?php if($userlevel<0){?>
            <li class="treeview">
                <a href="#"><i class="fa fa-sort-amount-asc"></i> <span>Admission</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="adm_enqry.php"><i class="fa fa-search"></i> Admission Enquery</a></li>
					<li><a href="adm_enqry_list.php"><i class="fa fa-list-ol"></i> Enquiry List</a></li>
                </ul>
            </li>
            <?php }?>
            
            <li class="treeview">
                <a href="#"><i class="fa fa-users fa-lg"></i> <span>Student Corner</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="stud_ntry.php"><i class="fa fa-child fa-lg"></i> Student Entry</a></li>
                    <li><a href="stud_list.php"><i class="fa fa-list-ol"></i> Student List</a></li>
					<li><a href="fees_generate.php"><i class="fa fa-credit-card"></i> Fees Genearate</a></li>
                    <?php if($userlevel<0){?>
                    <li><a href="fees_reselltement.php"><i class="fa fa-credit-card"></i> Fees Re-Genearate</a></li>
                    <?php }?>
                </ul>
            </li>
            
            <li class="treeview">
                <a href="#"><i class="fa fa-certificate fa-lg"></i> <span>Examination</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="MarksEntry.php"><i class="fa fa-clipboard fa-lg"></i> Marks Entry Entry</a></li>
                </ul>
            </li>
            
            <?php if($userlevel<0){?>
            <li class="treeview">
                <a href="#"><i class="fa fa-briefcase fa-lg"></i> <span>Accounts</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="treeview">
                        <a href="#"><i class="fa fa-cog"></i><span>Setup</span><i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="account_group.php"><i class="fa fa-users"></i> Group Head</a></li>
                            <li><a href="ledger_head.php"><i class="fa fa-database"></i> Ledger Head</a></li>
                            <li><a href="opening_balence.php"><i class="fa fa-folder-open"></i> Opening Balance</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-edit"></i> <span>Entrys</span><i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="income.php"><i class="fa fa-briefcase"></i> Receive Entry</a></li>
                            <li><a href="expense.php"><i class="fa fa-credit-card"></i> Payment Entry</a></li>
                            <li><a href="contra.php"><i class="fa fa-credit-card"></i> Contra Entry</a></li>
                            <li><a href="journal.php"><i class="fa fa-credit-card"></i> Journal Entry</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-edit"></i> <span>Reports</span><i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="cash_book.php"><i class="fa fa-book"></i> Cash Book</a></li>
                            <li><a href="bank_book.php"><i class="fa fa-university"></i> Bank Book</a></li>
                            <li><a href="day_book.php"><i class="fa fa-calendar"></i> Day Book</a></li>
                            <li><a href="ledger_book.php"><i class="fa fa-book"></i> Ledger Book</a></li>
                            <li><a href="income_expense.php"><i class="fa fa-pie-chart"></i> Income & Expenditure</a></li>
                            <li><a href="bal_sheet.php"><i class="fa fa-pie-chart"></i> Balance Sheet</a></li>
                            <li><a href="reconciliation_list.php"><i class="fa fa-pie-chart"></i> Reconciliation</a></li>
                            <li><a href="account_group_dtl.php"><i class="fa fa-print"></i> Group Print</a></li>
                            <li><a href="trans_list.php"><i class="fa fa-list-ol"></i> Transaction List</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <?php }?>
            <li class="treeview">
                <a href="#"><i class="fa fa-credit-card fa-lg"></i> <span>Fees</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="treeview">
                        <a href="#"><i class="fa fa-cog"></i> <span>Setups</span><i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="paymode_setup.php"><i class="fa fa-cog"></i>Pay Mode Setup</a></li>
                            <li><a href="fees_head.php"><i class="fa fa-cog"></i>Fees Head Setup</a></li>
                            <li><a href="fees_setup.php"><i class="fa fa-cog"></i>Fees Setup</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-briefcase"></i> <span>Collections</span><i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="fees_collect.php"><i class="fa fa-briefcase"></i>Collect Fess</a></li>
                    		<?php if($userlevel<0){?>
                            <li><a href="fees_collect1.php"><i class="fa fa-briefcase"></i>Collect Other Fess</a></li>
                            <li><a href="fees_collection_list.php"><i class="fa fa-briefcase"></i>Fees Collection List</a></li>
                            <li><a href="due_list.php"><i class="fa fa-briefcase"></i>Due List</a></li>
                            <?php }?>
                        </ul>
                    </li>
                    <?php if($userlevel<0){?>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-edit"></i> <span>Reports</span><i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="fees_col_sumery.php"><i class="fa fa-briefcase"></i>Fees Collection Summary</a></li>
                            <li><a href="adm_fee_sumary.php"><i class="fa fa-briefcase"></i>Admission Fees Summary</a></li>
                            <li><a href="tution_fee_sumary.php"><i class="fa fa-briefcase"></i>Tuition Fees Summary</a></li>
                            <li><a href="recieve_register.php"><i class="fa fa-briefcase"></i>Receive Register</a></li>
                        </ul>
                    </li>
					<?php }?>
                </ul>
            </li>
            
            <?php if($userlevel<0){?>
            <li class="treeview">
                <a href="#"><i class="fa fa-etsy"></i> <span>Examination</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="treeview">
                        <a href="#"><i class="fa fa-file"></i> <span>Entry</span><i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="chapter.php"><i class="fa fa-book"></i>Chapter Entry</a></li>
                            <li><a href="question.php"><i class="fa fa-question"></i>Question Entry</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-list-ol"></i> <span>List</span><i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="question_list.php"><i class="fa fa-list"></i>Question List</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-keyboard-o"></i> <span>Practice Set</span><i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="practice_chap_sel_mcq.php"><i class="fa fa-line-chart"></i>Practice for MCQ</a></li>
                            <li><a href="practice_vsaq.php"><i class="fa fa-list"></i>Practice for VSAQ</a></li>
                            <li><a href="practice_bsaq.php"><i class="fa fa-list"></i>Practice for BSAQ</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-laptop"></i> <span>Attend Exam</span><i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="exam_chap_sel_mcq.php"><i class="fa fa-pdf"></i>Exam for MCQ</a></li>
                            <li><a href="exam_vsaq.php"><i class="fa fa-list"></i>Exam for VSAQ</a></li>
                            <li><a href="exam_bsaq.php"><i class="fa fa-list"></i>Exam for BSAQ</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <?php }?>
            
            <li class="treeview">
                <a href="#"><i class="fa fa-cogs fa-lg"></i> <span>System Setup</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                	<?php if($userlevel<0){?>
                    <li><a href="user_type.php"><i class="fa fa-cog fa-spin"></i> User Type</a></li>
                    <li><a href="user_reg.php"><i class="fa fa-registered"></i> User Registration</a></li>
					<li><a href="dzsfsfsf.php"><i class="fa fa-credit-card"></i> Change Password</a></li>
                    <?php }?>
					<li><a href="logout.php"><i class="fa fa-credit-card"></i> Logout</a></li>
                    <?php if($userlevel<0){?>
                    <li><a href="fees_reselltement.php"><i class="fa fa-credit-card"></i> Fees Re-Genearate</a></li>
                    <?php }?>
                </ul>
            </li>
        </ul>
    </section>
</aside>