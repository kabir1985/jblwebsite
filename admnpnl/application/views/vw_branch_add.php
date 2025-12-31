<fieldset>
    <style>
        .readonly{
            cursor: not-allowed;
            background-color: #eeeeee;
            opacity: 1;
        }
        .control-group{
            /*float: left;*/
        }
        .form-group{
            padding: 10px;
        }
        .opnDate{
            cursor: pointer;
        }

        .ui-datepicker-trigger{
            cursor: pointer;
        }

    </style>

    <p style="margin: -40px 0 0 -22px;"><?php echo anchor("admin/branches", '<i style="font-size:13px;color:red" class="fa fa-angle-double-left"></i> Back', 'class="btn btn-primary"'); ?></p>
    <h1 style="font-size: 20px; margin: -22px 0 0 100px; text-decoration: dotted underline;"><?php echo 'Fill up Carefully'; ?></h1>

    <?php
    if ($this->session->flashdata('message')) {
        echo '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button"><i class="icon-remove"></i></button>' . $this->session->flashdata('message') . '</div>';
    }
    ?>

    <?php
//echo form_open('admin/deposit/create');
    $attributes = array('id' => 'branch_form', 'class' => 'form-inline');
    echo form_open_multipart('admin/branches/addBranch', $attributes);

    echo "<div class='form-group'><label for='branchname'>Branch Name</label></br>";
    $data = array('name' => 'branchname',
        'id' => 'branchname',
        'value' => (isset($_POST['branchname']) ? $_POST['branchname'] : '' )
    );
    echo form_input($data);
    echo '<div class="errormessage">' . form_error('branchname') . '</div></div>';

    echo "<div class='form-group'><label for='jbdvcode'>JB Division Code</label></br>";
    $data = array('name' => 'jbdvcode',
        'id' => 'jbdvcode',
        'value' => (isset($_POST['jbdvcode']) ? $_POST['jbdvcode'] : '' )
    );
    echo form_input($data);
    echo '<div class="errormessage">' . form_error('jbdvcode') . '</div></div>';

    echo "<div class='form-group'><label for='dvname'>Division Name</label></br>";
    $data = array('name' => 'dvname',
        'id' => 'dvname',
        'value' => (isset($_POST['dvname']) ? $_POST['dvname'] : '' )
    );
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='admindvcode'>Admin Div Code</label></br>";
    $data = array('name' => 'admindvcode',
        'id' => 'admindvcode',
        'value' => (isset($_POST['admindvcode']) ? $_POST['admindvcode'] : '' )
    );
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='addvname'>Addv Name</label></br>";
    $data = array('name' => 'addvname',
        'id' => 'addvname',
        'value' => (isset($_POST['addvname']) ? $_POST['addvname'] : '' )
    );
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='dtcode'>District Code</label></br>";
    $data = array('name' => 'dtcode',
        'id' => 'dtcode',
        'value' => (isset($_POST['dtcode']) ? $_POST['dtcode'] : '' )
    );
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='dtname'>District Name</label></br>";
    $data = array('name' => 'dtname',
        'id' => 'dtname',
        'value' => (isset($_POST['dtname']) ? $_POST['dtname'] : '' )
    );
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='thcode'>Thana Code</label></br>";
    $data = array('name' => 'thcode',
        'id' => 'thcode',
        'value' => (isset($_POST['thcode']) ? $_POST['thcode'] : '' )
    );
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='thname'>Thana Name</label></br>";
    $data = array('name' => 'thname',
        'id' => 'thname',
        'value' => (isset($_POST['thname']) ? $_POST['thname'] : '' )
    );
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='brcode'>JB Branch Code</label></br>";
    $data = array('name' => 'brcode',
        'id' => 'brcode',
        'value' => (isset($_POST['brcode']) ? $_POST['brcode'] : '' )
    );
    echo form_input($data) . "</div>";
    //echo '<div class="errormessage">' . form_error('brcode') . '</div></p>';

    echo "<div class='form-group'><label for='bbbrcode'>BB Branch Code</label></br>";
    $data = array('name' => 'bbbrcode',
        'id' => 'bbbrcode',
        'value' => (isset($_POST['bbbrcode']) ? $_POST['bbbrcode'] : '' )
    );
    echo form_input($data) . "</div>";
    //echo '<div class="errormessage">' . form_error('bbbrcode') . '</div></p>';

    echo "<div class='form-group'><label for='address'>Branch Address</label></br>";
    $data = array('name' => 'address',
        'id' => 'address',
        'value' => (isset($_POST['address']) ? $_POST['address'] : '' )
    );
    echo form_input($data) . "</div>";
    //echo '<div class="errormessage">' . form_error('address') . '</div></p>';

    echo "<div class='form-group'><label for='postname'>Post Name</label></br>";
    $data = array('name' => 'postname',
        'id' => 'postname',
        'value' => (isset($_POST['postname']) ? $_POST['postname'] : '' )
    );
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='postcodereal'>Post Code Real</label></br>";
    $data = array('name' => 'postcodereal',
        'id' => 'postcodereal',
        'value' => (isset($_POST['postcodereal']) ? $_POST['postcodereal'] : '' )
    );
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='postcode'>Post Code</label></br>";
    $data = array('name' => 'postcode',
        'id' => 'postcode',
        'value' => (isset($_POST['postcode']) ? $_POST['postcode'] : '' )
    );
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='ucpcode'>UCP Code</label></br>";
    $data = array('name' => 'ucpcode',
        'id' => 'ucpcode',
        'value' => (isset($_POST['ucpcode']) ? $_POST['ucpcode'] : '' )
    );
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='ucpname'>UCP Name</label></br>";
    $data = array('name' => 'ucpname',
        'id' => 'ucpname',
        'value' => (isset($_POST['ucpname']) ? $_POST['ucpname'] : '' )
    );
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='gradecode'>Grade Code</label></br>";
    $data = array('name' => 'gradecode',
        'id' => 'gradecode',
        'value' => (isset($_POST['gradecode']) ? $_POST['gradecode'] : '' )
    );
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='gradesname'>Grades Name</label></br>";
    $data = array('name' => 'gradesname',
        'id' => 'gradesname',
        'value' => (isset($_POST['gradesname']) ? $_POST['gradesname'] : '' )
    );
    echo form_input($data) . "</div>";
    //echo '<div class="errormessage">' . form_error('gradesname') . '</div></p>';

    echo "<div class='form-group'><label for='Opndate'>Open Date</label></br>";
    $data = array(
        'name' => 'Opndate',
        'id' => 'opnDate',
        'class' => 'opnDate',
        'value' => (isset($_POST['Opndate']) ? $_POST['Opndate'] : '' )
    );
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='SwiftCode'>Swift Code</label></br>";
    $data = array('name' => 'SwiftCode',
        'id' => 'SwiftCode',
        'value' => (isset($_POST['SwiftCode']) ? $_POST['SwiftCode'] : '' )
    );
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='adcode'>AD Code</label></br>";
    $data = array('name' => 'adcode',
        'id' => 'adcode',
        'value' => (isset($_POST['adcode']) ? $_POST['adcode'] : '' )
    );
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='OfficePhone'>Office Phone</label></br>";
    $data = array('name' => 'OfficePhone',
        'id' => 'OfficePhone',
        'value' => (isset($_POST['OfficePhone']) ? $_POST['OfficePhone'] : '' )
    );
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='FAX'>FAX</label></br>";
    $data = array('name' => 'FAX',
        'id' => 'FAX',
        'value' => (isset($_POST['FAX']) ? $_POST['FAX'] : '' )
    );
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='urcode'>UR Code</label></br>";
    $data = array('name' => 'urcode',
        'id' => 'urcode',
        'value' => (isset($_POST['urcode']) ? $_POST['urcode'] : '' )
    );
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='urname'>UR Name</label></br>";
    $data = array('name' => 'urname',
        'id' => 'urname',
        'value' => (isset($_POST['urname']) ? $_POST['urname'] : '' )
    );
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='znname'>ZN Name</label></br>";
    $data = array('name' => 'znname',
        'id' => 'znname',
        'value' => (isset($_POST['znname']) ? $_POST['znname'] : '' )
    );
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='zncode'>ZN Code</label></br>";
    $data = array('name' => 'zncode',
        'id' => 'zncode',
        'value' => (isset($_POST['zncode']) ? $_POST['zncode'] : '' )
    );
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='ucptypename'>UCP Type Name</label></br>";
    $data = array('name' => 'ucptypename',
        'id' => 'ucptypename',
        'value' => (isset($_POST['ucptypename']) ? $_POST['ucptypename'] : '' )
    );
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='routingno'>Routing No</label></br>";
    $data = array('name' => 'routingno',
        'id' => 'routingno',
        'value' => (isset($_POST['routingno']) ? $_POST['routingno'] : '' )
    );
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='email'>email</label></br>";
    $data = array('name' => 'email',
        'id' => 'email',
        'value' => (isset($_POST['email']) ? $_POST['email'] : '' )
    );
    echo form_input($data) . "</div>";
    
    echo "<div class='form-group'><label for='status'>Status</label></br>";
    echo "<select name='status' id='status'> 
    <option value=''>--select--</option>
    <option value='active'>active</option>
    <option value='inactive'>inactive</option>";
    echo "</select></div>";
   /* $data = array('name' => 'status',
        'id' => 'status',
        'value' => (isset($_POST['status']) ? $_POST['status'] : '' )
    );
    echo form_input($data) . "</div>"; */
    

    $attributes = array(
        'name' => 'submit',
        'type' => 'submit',
        'id' => 'branch_submit_id',
        'value' => 'SUBMIT',
        'class' => 'btn btn-success');
    echo "<p class='clear'>" . form_submit($attributes) . "</p>";
    echo form_close();
    ?>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#opnDate').datepicker({
                showOn: "both",
                buttonImage: "<?php echo base_url(); ?>assets/images/calendar.gif",
                buttonImageOnly: true,
                buttonText: '',
                dateFormat: 'yy-mm-dd',
                changeYear: true,
                changeMonth: true,
                yearRange: "1971:"
            });
        });
    </script>

</fieldset>