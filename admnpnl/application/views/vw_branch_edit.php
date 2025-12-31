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

    <?php
    if ($this->session->flashdata('message')) {
        echo '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button"><i class="icon-remove"></i></button>' . $this->session->flashdata('message') . '</div>';
    }
    ?>

    <?php
    $attributes = array('id' => 'branch_form', 'class' => 'form-inline');
    echo form_open_multipart('admin/branches/edit', $attributes);

    echo "<div class='form-group'><label for='branchname'>Branch Name</label></br>";
    $data = array('name' => 'branchname',
        'id' => 'branchname',
        'value' => $branch['branchname']);
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='jbdvcode'>JB Division Code</label></br>";
    $data = array('name' => 'jbdvcode',
        'id' => 'jbdvcode',
        'value' => $branch['jbdvcode']);
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='dvname'>Division Name</label></br>";
    $data = array('name' => 'dvname',
        'id' => 'dvname',
        'value' => $branch['dvname']);
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='admindvcode'>Admin Div Code</label></br>";
    $data = array('name' => 'admindvcode',
        'id' => 'admindvcode',
        'value' => $branch['admindvcode']);
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='addvname'>Addv name</label></br>";
    $data = array('name' => 'addvname',
        'id' => 'addvname',
        'value' => $branch['addvname']);
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='dtcode'>District Code</label></br>";
    $data = array('name' => 'dtcode',
        'id' => 'dtcode',
        'value' => $branch['dtcode']);
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='dtname'>District Name</label></br>";
    $data = array('name' => 'dtname',
        'id' => 'dtname',
        'value' => $branch['dtname']);
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='thcode'>Thana Code</label></br>";
    $data = array('name' => 'thcode',
        'id' => 'thcode',
        'value' => $branch['thcode']);
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='thname'>Thana Name</label></br>";
    $data = array('name' => 'thname',
        'id' => 'thname',
        'value' => $branch['thname']);
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='brcode'>JBL Branch Code</label></br>";
    $data = array('name' => 'brcode',
        'id' => 'brcode',
        'value' => $branch['brcode']);
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='bbbrcode'>BB Branch Code</label></br>";
    $data = array('name' => 'bbbrcode',
        'id' => 'bbbrcode',
        'value' => $branch['bbbrcode']);
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='address'>Branch Address</label></br>";
    $data = array('name' => 'address',
        'id' => 'address',
        'value' => $branch['address']);
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='postname'>Post Name</label></br>";
    $data = array('name' => 'postname',
        'id' => 'postname',
        'value' => $branch['postname']);
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='postcodereal'>Post Code Real</label></br>";
    $data = array('name' => 'postcodereal',
        'id' => 'postcodereal',
        'value' => $branch['postcodereal']);
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='postcode'>Post Code</label></br>";
    $data = array('name' => 'postcode',
        'id' => 'postcode',
        'value' => $branch['postcode']);
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='ucpcode'>UCP Code</label></br>";
    $data = array('name' => 'ucpcode',
        'id' => 'ucpcode',
        'value' => $branch['ucpcode']);
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='ucpname'>UCP Name</label></br>";
    $data = array('name' => 'ucpname',
        'id' => 'ucpname',
        'value' => $branch['ucpname']);
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='gradecode'>Grade Code</label></br>";
    $data = array('name' => 'gradecode',
        'id' => 'gradecode',
        'value' => $branch['gradecode']);
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='gradesname'>Grades Name</label></br>";
    $data = array('name' => 'gradesname',
        'id' => 'gradesname',
        'value' => $branch['gradesname']);
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='Opndate'>Opening Date</label></br>";
    $data = array(
        'name' => 'Opndate',
        'id' => 'opnDate',
        'class' => 'opnDate',
        'value' => $branch['Opndate']);
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='SwiftCode'>Swift Code</label></br>";
    $data = array('name' => 'SwiftCode',
        'id' => 'SwiftCode',
        'value' => $branch['SwiftCode']);
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='adcode'>Ad Code</label></br>";
    $data = array('name' => 'adcode',
        'id' => 'adcode',
        'value' => $branch['adcode']);
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='OfficePhone'>Office Phone</label></br>";
    $data = array('name' => 'OfficePhone',
        'id' => 'OfficePhone',
        'value' => $branch['OfficePhone']);
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='FAX'>FAX</label></br>";
    $data = array('name' => 'FAX',
        'id' => 'FAX',
        'value' => $branch['FAX']);
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='urcode'>UR Code</label></br>";
    $data = array('name' => 'urcode',
        'id' => 'urcode',
        'value' => $branch['urcode']);
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='urname'>UR Name</label></br>";
    $data = array('name' => 'urname',
        'id' => 'urname',
        'value' => $branch['urname']);
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='znname'>ZN Name</label></br>";
    $data = array('name' => 'znname',
        'id' => 'znname',
        'value' => $branch['znname']);
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='zncode'>ZN Code</label></br>";
    $data = array('name' => 'zncode',
        'id' => 'zncode',
        'value' => $branch['zncode']);
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='ucptypename'>UCP Type Name</label></br>";
    $data = array('name' => 'ucptypename',
        'id' => 'ucptypename',
        'value' => $branch['ucptypename']);
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='routingno'>Routing No</label></br>";
    $data = array('name' => 'routingno',
        'id' => 'routingno',
        'value' => $branch['routingno']);
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='email'>email</label></br>";
    $data = array('name' => 'email',
        'id' => 'email',
        'value' => $branch['email']);
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='status'>Status</label></br>";
    echo "<select name='status' id='status'> 
    <option value=''>$branch[status]</option>
    <option value=''>-select-</option>
    <option value='active'>active</option>
    <option value='inactive'>inactive</option>";
    echo "</select></div>";
    /* $data = array('name' => 'status',
      'id' => 'status',
      'value' => $branch['status']);
      echo form_input($data) . "</div>"; */

    echo form_hidden('id', $branch['id']);
    echo "<p class='clear'>" . form_submit('submit', 'SUBMIT', 'class="btn btn-success"') . "</p>";
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
