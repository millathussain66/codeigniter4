<script type="text/javascript">
    $(document).ready(function() {
        var case_fill_dist = ['sdf', 'sdfsf'];
        var theme = 'classic';

        jQuery("#case_fill_dist").jqxComboBox({
            theme: theme,
            autoOpen: false,
            autoDropDownHeight: false,
            promptText: "Case Filing (District)",
            source: case_fill_dist,
            width: 250,
            height: 25
        });







        var initGrid = function() {
            var source = {
                datatype: "json",
                datafields: [{
                        name: 'id',
                        type: 'int'
                    },
                    {
                        name: 'checker_id',
                        type: 'int'
                    },
                    {
                        name: 'sts',
                        type: 'string'
                    },

                ],
                addrow: function(rowid, rowdata, position, commit) {
                    commit(true);
                },
                deleterow: function(rowid, commit) {
                    commit(true);
                },
                updaterow: function(rowid, newdata, commit) {
                    commit(true);
                },
                url: '<?= base_url() ?>index.php/bill_ait/grid',
                cache: false,
                filter: function() {
                    // update the grid and send a request to the server.
                    jQuery("#jqxgrid").jqxGrid('updatebounddata', 'filter');
                },
                sort: function() {
                    // update the grid and send a request to the server.
                    jQuery("#jqxgrid").jqxGrid('updatebounddata', 'sort');
                },
                root: 'Rows',
                beforeprocessing: function(data) {
                    if (data != null) {
                        //alert(data[0].TotalRows)
                        source.totalrecords = data[0].TotalRows;
                    }
                }

            };

            var dataadapter = new jQuery.jqx.dataAdapter(source, {
                loadError: function(xhr, status, error) {
                    alert(error);
                }
            });
            var columnCheckBox = null;
            var updatingCheckState = false;
            // initialize jqxGrid. Disable the built-in selection.
            var celledit = function(row, datafield, columntype) {
                var checked = jQuery('#jqxgrid').jqxGrid('getcellvalue', row, "available");
                if (checked == false) {
                    return false;
                };
            };
            jQuery("#jqxgrid").jqxGrid({
                width: '100%',
                height: 700,
                source: dataadapter,
                theme: theme,
                filterable: true,
                sortable: true,
                // autoheight: true,
                pageable: true,
                virtualmode: true,
                editable: true,
                enablehover: true,
                enablebrowserselection: true,
                selectionmode: 'none',
                rendergridrows: function(obj) {
                    return obj.data;
                },

                columns: [

                    {
                        text: 'Remarks',
                        datafield: 'remarks',
                        editable: false,
                        width: '15%'
                    },
                ]
            });
            jQuery("#details").jqxWindow({
                theme: theme,
                maxWidth: '100%',
                maxHeight: '100%',
                width: 700,
                height: 250,
                resizable: false,
                isModal: true,
                autoOpen: false,
                cancelButton: jQuery("")
            });

        }

        var initWidgets = function(tab) {
            switch (tab) {
                case 0:
                    break;
                case 1:
                    initGrid();
                    break;
            }
        }

        $('#jqxTabs').jqxTabs({
            width: '100%',
            height: 380,
            initTabContent: initWidgets
        });


    });
</script>

<div id='jqxTabs'>
    <ul>
        <li style="margin-left: 30px;">Form</li>
        <li>Grid</li>
    </ul>

    <div style="overflow: hidden;">


        <div style="paddding: 10px;">
            <div id="loading-overlay">
                <div class="loading-icon"></div>
            </div>


            <form class="form" name="action_form" id="action_form" method="post" action="" enctype="multipart/form-data">

                <input type="hidden" value="<?= csrf_hash(); ?>" name="<?= csrf_token(); ?>" id="csrf">
                <input type="hidden" id="add_edit" name="add_edit" value="Add">
                <input type="hidden" id="edit_id" name="edit_id" value="">

                <table style="width:100%;margin-top:20px">
                    <tbody>
                        <tr>
                            <td width="50%">
                                <table style="width: 100%;">
                                    <tr>
                                        <td width="40%" style="font-weight: bold;">Requisition Type<span style="color:red">*</span></td>
                                        <td width="60%">
                                            <div id="req_type" name="req_type" style="padding-left: 3px" tabindex="1"></div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td width="40%" style="font-weight: bold;">Proposed Type<span style="color:red">*</span> </td>
                                        <td width="60%">
                                            <div id="proposed_type" name="proposed_type" style="padding-left: 3px" tabindex="2"></div>
                                        </td>

                                    </tr>

                                    <tr id="customer_id_row" style="display: none;">
                                        <td width="40%" style="font-weight: bold;">Customer ID</td>
                                        <td width="60%"><strong><span id="show_customer_id"></span></strong></td>

                                    </tr>
                                    <tr>
                                        <td width="40%" style="font-weight: bold;">CID<span style="color:red">*</span> </td>
                                        <td width="60%"><input name="cif" type="text" maxlength="8" size="8" tabindex="4" class="" style="width:250px" id="cif" value="<?= isset($result->cif) ? $result->cif : '' ?>" /></td>

                                    </tr>
                                    <tr>
                                        <td width="40%" style="font-weight: bold;">Branch (SOL)<span style="color:red">*</span> </td>
                                        <td width="60%">
                                            <div id="branch_sol" name="branch_sol" style="padding-left: 3px" tabindex="5"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="40%" style="font-weight: bold;"><span id="l_or_c_name"></span><span style="color:red">*</span> </td>
                                        <td width="60%"><input name="ac_name" tabindex="6" type="text" class="" style="width:250px" id="ac_name" value="<?= isset($result->ac_name) ? $result->ac_name : '' ?>" /></td>
                                    </tr>
                                    <tr id="borrower_name_div">
                                        <td width="40%" style="font-weight: bold;">Borrower's Name<span style="color:red">*</span></td>
                                        <td width="60%"><input name="brrower_name" tabindex="7" type="text" class="" style="width:250px" id="brrower_name" value="<?= isset($result->brrower_name) ? $result->brrower_name : '' ?>" /></td>
                                    </tr>
                                    <tr>
                                        <td width="40%" style="font-weight: bold;">Business Type<span style="color:red">*</span> </td>
                                        <td width="60%">
                                            <div id="sub_type" name="sub_type" style="padding-left: 3px" tabindex="8"></div>
                                            <div style="background-color:#eaeaea;padding:10px;width:233px;display:none" id="spfm">
                                                Spouse Name<br /><input name="spouse_name" tabindex="9" type="text" class="" style="width:225px" id="spouse_name" value="<?= isset($result->spouse_name) ? $result->spouse_name : '' ?>" /><br />
                                                Mother Name<span style="color:red">*</span><br /><input name="mother_name" tabindex="10" type="text" class="" style="width:225px" id="mother_name" value="<?= isset($result->mother_name) ? $result->mother_name : '' ?>" />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="40%" style="font-weight: bold;">Loan Segment (Portfolio)<span style="color:red">*</span> </td>
                                        <td width="60%">
                                            <div id="loan_segment" name="loan_segment" style="padding-left: 3px" tabindex="11"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="40%" style="font-weight: bold;">Current/updated Address</td>
                                        <td width="60%"><textarea name="current_address" tabindex="12" class="text-input-big" id="current_address" style="height:40px !important;width:250px"><?= isset($result->current_address) ? $result->current_address : '' ?></textarea></td>
                                    </tr>

                                    <tr>
                                        <td width="40%" style="font-weight: bold;">Previous CMA Approval Date</td>
                                        <td width="60%">
                                            <label id="pre_cma_app_dt_l">

                                            </label>
                                            <input type="hidden" tabindex="14" name="pre_cma_app_dt" placeholder="dd/mm/yyyy" style="width:225px;margin-left:4px" id="pre_cma_app_dt" value="<?= isset($result->pre_cma_app_dt) ? date_format(date_create($result->pre_cma_app_dt), "d/m/Y") : '' ?>">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="40%" style="font-weight: bold;">Previous Case Status</td>
                                        <td width="60%">
                                            <div id="pre_case_sts" tabindex="15" name="pre_case_sts" style="padding-left: 3px"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="40%" style="font-weight: bold;">Previous Case Type</td>
                                        <td width="60%">
                                            <div id="pre_case_type" tabindex="16" name="pre_case_type" style="padding-left: 3px"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="40%" style="font-weight: bold;">Disposal Status</td>
                                        <td width="60%">
                                            <div id="disposal_sts" tabindex="17" name="disposal_sts" style="padding-left: 3px"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="40%" style="font-weight: bold;">Customer Contact Number</td>
                                        <td width="60%"><input name="mobile_no" tabindex="18" maxlength="11" size="11" type="text" class="" style="width:250px" id="mobile_no" value="<?= isset($result->mobile_no) ? $result->mobile_no : '' ?>" /></td>
                                    </tr>
                                    <tr>
                                        <td width="40%" style="font-weight: bold;">Chq Expiry Date<span style="color:red">*</span> </td>
                                        <td><input type="text" name="chq_expiry_date" tabindex="19" placeholder="dd/mm/yyyy" style="width:250px;" id="chq_expiry_date" value="<?= isset($result->chq_expiry_date) ? date_format(date_create($result->chq_expiry_date), "d/m/Y") : '' ?>">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="40%" style="font-weight: bold;">Last Payment Date</td>
                                        <td><input type="text" name="last_payment_date" tabindex="20" placeholder="dd/mm/yyyy" style="width:250px;" id="last_payment_date" value="<?= isset($result->last_payment_date) && $result->last_payment_date != '0000-00-00' ? date_format(date_create($result->last_payment_date), "d/m/Y") : '' ?>">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="40%" style="font-weight: bold;">Last Payment Amount</td>
                                        <td width="60%"><input name="last_payment_amount" tabindex="21" type="text" class="" style="width:250px" id="last_payment_amount" value="<?= isset($result->last_payment_amount) ? $result->last_payment_amount : '' ?>" /></td>
                                    </tr>
                                    <tr>
                                        <td width="40%" style="font-weight: bold;">Disposal remarks</td>
                                        <td width="60%"><textarea name="disposal_remarks" tabindex="22" class="text-input-big" id="disposal_remarks" style="height:40px !important;width:250px"><?= isset($result->disposal_remarks) ? $result->disposal_remarks : '' ?></textarea></td>
                                    </tr>
                                    <tr>
                                        <td width="40%" style="font-weight: bold;">Judgment Summary</td>
                                        <td width="60%"><textarea name="judgement_summery" tabindex="23" class="text-input-big" id="judgement_summery" style="height:40px !important;width:250px"><?= isset($result->judgement_summery) ? $result->judgement_summery : '' ?></textarea></td>
                                    </tr>
                                </table>
                            </td>

                            <td width="50%">
                                <table style="width: 100%;">
                                    <tr>
                                        <td width="40%" style="font-weight: bold;">Call-Up Serving Date</td>
                                        <td><input type="text" name="call_up_serv_dt" tabindex="24" placeholder="dd/mm/yyyy" style="width:250px;" id="call_up_serv_dt" value="<?= isset($result->call_up_serv_dt) && $result->call_up_serv_dt != '0000-00-00 00:00:00' ? date_format(date_create($result->call_up_serv_dt), "d/m/Y") : '' ?>">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="40%" style="font-weight: bold;">Loan Sanction Date<span style="color:red">*</span></td>
                                        <td><input type="text" name="loan_sanction_dt" tabindex="25" placeholder="dd/mm/yyyy" style="width:250px;" id="loan_sanction_dt" value="<?= isset($result->loan_sanction_dt) && $result->loan_sanction_dt != '0000-00-00 00:00:00' ? date_format(date_create($result->loan_sanction_dt), "d/m/Y") : '' ?>">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="40%" style="font-weight: bold;">Previous Case Filing Date</td>
                                        <td><input type="text" name="pre_case_fill_dt" tabindex="26" placeholder="dd/mm/yyyy" style="width:250px;" id="pre_case_fill_dt" value="<?= isset($result->pre_case_fill_dt) && $result->pre_case_fill_dt != '0000-00-00 00:00:00' ? date_format(date_create($result->pre_case_fill_dt), "d/m/Y") : '' ?>">

                                        </td>
                                    </tr>

                                    <tr>
                                        <td width="40%" style="font-weight: bold;">Recovery Region<span style="color:red">*</span> </td>
                                        <td width="60%">
                                            <div id="region" tabindex="27" name="region" style="padding-left: 3px"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="40%" style="font-weight: bold;">Territory<span style="color:red">*</span> </td>
                                        <td width="60%">
                                            <div id="territory" tabindex="28" name="territory" style="padding-left: 3px"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="40%" style="font-weight: bold;">District<span style="color:red">*</span> </td>
                                        <td width="60%">
                                            <div id="district" tabindex="29" name="district" style="padding-left: 3px"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="40%" style="font-weight: bold;">Unit Office<span style="color:red">*</span> </td>
                                        <td width="60%">
                                            <div id="unit_office" tabindex="30" name="unit_office" style="padding-left: 3px"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="40%" style="font-weight: bold;">Legal Region<span style="color:red">*</span> </td>
                                        <td width="60%">
                                            <div id="legal_region" tabindex="31" name="legal_region" style="padding-left: 3px"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="40%" style="font-weight: bold;">Case Filing (District)<span style="color:red">*</span> </td>
                                        <td width="60%">
                                            <div id="case_fill_dist" tabindex="32" name="case_fill_dist" style="padding-left: 3px"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="40%" style="font-weight: bold;">Security Status<span style="color:red">*</span> </td>
                                        <td width="60%">
                                            <div id="sec_sts" tabindex="33" name="sec_sts" style="padding-left: 3px"></div>
                                        </td>
                                    </tr>
                                    <tr id="auction_div">
                                        <td width="40%" style="font-weight: bold;">Previous Auction Status</td>
                                        <td width="60%">
                                            <div id="pre_auc_sts" tabindex="34" name="pre_auc_sts" style="padding-left: 3px"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="40%" style="font-weight: bold;">Business Status<span style="color:red">*</span> </td>
                                        <td width="60%">
                                            <div id="busi_sts" tabindex="35" name="busi_sts" style="padding-left: 3px"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="40%" style="font-weight: bold;">Borrower Status<span style="color:red">*</span> </td>
                                        <td width="60%">
                                            <div id="borr_sts" tabindex="36" name="borr_sts" style="padding-left: 3px"></div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td width="40%" style="font-weight: bold;">Sanction Letter<span style="color:green">*</span></td>
                                        <td width="60%">
                                            <img style="cursor:pointer" src="<?= base_url() ?>/images/upload.png" alt="upload" title="Upload" onclick="CustomerPickList('cma','senction_letter')" />
                                            <input type="hidden" id="hidden_senction_letter_select" name="hidden_senction_letter_select" value="0">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="40%" style="font-weight: bold;">Current DPD<span style="color:red">*</span> </td>
                                        <td width="60%"><input name="current_dpd" tabindex="38" type="text" class="" style="width:250px" id="current_dpd" value="<?= isset($result->current_dpd) ? $result->current_dpd : '' ?>" /></td>
                                    </tr>
                                    <tr>
                                        <td width="40%" style="font-weight: bold;">Logic for ARA Case<span style="color:red">*</span> </td>
                                        <td width="60%">
                                            <div id="case_logic" tabindex="39" name="case_logic" style="padding-left: 3px"></div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td width="40%" style="font-weight: bold;">More Account Available</td>
                                        <td width="60%">
                                            <div name="more_acc" tabindex="40" id="more_acc" style="float:left; margin: 3px 0px 0 0;"></div><input name="more_acc_number" tabindex="41" style="width:228px" type="text" class="" id="more_acc_number" value="<?= isset($result->more_acc_number) ? $result->more_acc_number : '' ?>" disabled /><br /><span style="color:green;" class="login-text">(Comma Separated)</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="40%" style="font-weight: bold;">Chq. Status<span style="color:red">*</span></td>
                                        <td width="60%">
                                            <div id="chq_sts" tabindex="42" name="chq_sts" style="padding-left: 3px"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="40%" style="font-weight: bold;">Remarks <span style="color:green">(Required For Re-Initiate)</span></td>
                                        <td width="60%">
                                            <textarea name="remarks" class="text-input-big" tabindex="43" id="remarks" style="height:40px !important;width:250px"><?= isset($result->remarks) ? $result->remarks : '' ?></textarea>

                                        </td>
                                    </tr>

                                </table>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>


    <div style="overflow: hidden;">
        <div style="border:none;" id="jqxgrid">
        </div>
    </div>

</div>