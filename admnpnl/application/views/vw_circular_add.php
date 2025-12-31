<span style="margin-top: 0px;"><?php echo anchor("admin/circular", '<i style="font-size:13px;color:red" class="fa fa-angle-double-left"></i> Back', 'class="btn btn-primary"'); ?></span>
<fieldset>
    <legend><h1 style="font-size: 20px; margin: 0; text-decoration: dotted underline;"><?php echo 'Fill up Carefully'; ?></h1></legend>

    <style>
        .readonly{
            cursor: not-allowed;
            background-color: #D9ECF3;
            opacity: 1;
        }
        .form-control:valid{
            /*background-color: #D9ECF3!important;*/
        }
        .expDate{
            height: 25px!important;
        }
        .expDate:valid{
            background-color: #D9ECF3!important;
        }
        .control-group{
            /*float: left;*/
        }
        .form-group{
            padding: 10px;
        }
        #expiryDate{
            /*background-color:  #D9ECF3!important;*/
        }

        .ui-datepicker-trigger{
            cursor: pointer;
        }
        
         .formUpload{
            background-color: #0099cc;
            color: white;
        }

    </style>

    <!-- Before loop -->
    <?php
    if ($this->session->flashdata('message')) {
        echo '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button"><i class="icon-remove"></i></button>' . $this->session->flashdata('message') . '</div>';
    }

    $attributes = array('id' => 'circular_form', 'class' => 'form-inline');
    echo form_open_multipart('admin/circular/addCircular', $attributes);

    echo "<div class='form-group'><label for='circular_title'>Circular Title</label></br>";
    $data = array(
        'name' => 'circular_title',
        'id' => 'circular_title',
        'required' => 'required',
        'value' => (isset($_POST['circular_title']) ? $_POST['circular_title'] : ''),
        'rows' => 2,
        'col' => 4,
    );
    echo form_textarea($data) . "</p>";
    echo '<div class="errormessage">' . form_error('circular_title') . '</div></div>';

    echo "<div class='form-group'><label for='circular_no'>Circular No</label></br>";
    $data = array(
        'name' => 'circular_no',
        'id' => 'circular_no',
        'required' => 'required',
        'value' => (isset($_POST['circular_no']) ? $_POST['circular_no'] : ''),
        'size' => 30
    );
    echo form_input($data) . "</p>";
    echo '<div class="errormessage">' . form_error('circular_no') . '</div></div>';

    echo "<div class='form-group'><label for='circular_type'>Circular Type</label></br>";
    echo "<select name='circular_type' id='type' class='form-co'>
 <option value=''>--Select--</option>
 <option value='Instruction Circular'>Instruction Circular</option>
 <option value='Information Circular'>Information Circular</option>
 <option value='Circular Letter'>Circular Letter</option>
 <option value='RCD Circular'>RCD Circular</option>
 <option value='ID CIrcular Letter'>ID CIrcular Letter</option>
 <option value='ID CIrcular Letter'>ID CIrcular</option>
 <option value='FD Circular'>FD Circular</option>
 <option value='FD Circular Letter'>FD Circular Letter</option>
 <option value='Lost Notification'>Lost Notification</option>
 <option value='Others'>Others</option>";
    echo "</select>";
    echo '<div class="errormessage">' . form_error('circular_type') . '</div></div>';

    echo "<div class='form-group'><label for='circular_department'>Circular Department</label></br>";
    echo form_dropdown('circular_department', $HoDept) . "</p>";
    echo '<div class="errormessage txt-danger" >' . form_error('tender_offered_by') . '</div></div>';

    /*
      echo "<div class='form-group'><label for='circular_department'>Circular Department</label></br>";
      if ($_SESSION['username'] == 'jblrmd') {
      $data = array(
      'name' => 'circular_department',
      'id' => 'circular_department',
      'readonly' => 'readonly',
      'value' => (isset($_POST['circular_department']) ? $_POST['circular_department'] : 'Risk Management Department'),
      'size' => 30
      );
      echo form_input($data) . "</p>";
      echo '<div class="errormessage">' . form_error('circular_department') . '</div></div>';
      } else {
      echo "<select name='circular_department' id='circular_department' class='form-con'>
      <option value=''>--Select--</option>
      <option value='Accounts Department'>Accounts Department</option>
      <option value='Audit & Inspection Department-Corporate'>Audit & Inspection Department-Corporate</option>
      <option value='Audit & Inspection Department-General'>Audit & Inspection Department-General</option>
      <option value='Budget & Expenditure Control Department'>Budget & Expenditure Control Department</option>
      <option value='Business Development Marketing Department'>Business Development Marketing Department</option>
      <option value='Card Management Department'>Card Management Department</option>
      <option value='CIB Department'>CIB Department</option>
      <option value='Company Affairs Department'>Company Affairs Department</option>
      <option value='Compliance Department-External'>Compliance Department-External</option>
      <option value='Compliance Department-Internal'>Compliance Department-Internal</option>
      <option value='Disciplinary Department'>Disciplinary Department</option>
      <option value='End Use Foreign Trade & Industrial Credit Department'>End Use Foreign Trade & Industrial Credit Department</option>
      <option value='End Use General Department'>End Use General Department</option>
      <option value='Estate Department'>Estate Department</option>
      <option value='Foreign Exchange Audit & Inspection Department'>Foreign Exchange Audit & Inspection Department</option>
      <option value='Foreign Remittance Department'>Foreign Remittance Department</option>
      <option value='Foreign Trade Department-Export'>Foreign Trade Department-Export</option>
      <option value='Foreign Trade Department-Import'>Foreign Trade Department-Import</option>
      <option value='Foreign Trade Monitoring Department'>Foreign Trade Monitoring Department</option>
      <option value='General Banking Department'>General Banking Department</option>
      <option value='Human Resources Department'>Human Resources Department</option>
      <option value='Human Resources Development Department'>Human Resources Development Department</option>
      <option value='Industrial Credit Department'>Industrial Credit Department</option>
      <option value='Information & Communications Technology Department-Operation'>Information & Communications Technology Department-Operation</option>
      <option value='Information & Communications Technology Department-System'>Information & Communications Technology Department-System</option>
      <option value='IT Audit & Inspection Department'>IT Audit & Inspection Department</option>
      <option value='Janata Bank Staff College'>Janata Bank Staff College</option>
      <option value='Law Department'>Law Department</option>
      <option value='Management Information System Department'>Management Information System Department</option>
      <option value='MDs Recovery Cell'>MD's Recovery Cell</option>
      <option value='ML & TF Prevention Department'>ML & TF Prevention Department</option>
      <option value='Monitoring Department'>Monitoring Department</option>
      <option value='Overseas Banking Department'>Overseas Banking Department</option>
      <option value='Procurement Department'>Procurement Department</option>
      <option value='Public Relation Department'>Public Relation Department</option>
      <option value='Reconciliation Department'>Reconciliation Department</option>
      <option value='Recovery Department-1'>Recovery Department-1</option>
      <option value='Recovery Department-2'>Recovery Department-2</option>
      <option value='Recovery Department-3'>Recovery Department-3</option>
      <option value='Research, Planning & Statistics Department'>Research, Planning & Statistics Department</option>
      <option value='Retail Customer Department-1'>Retail Customer Department-1</option>
      <option value='Retail Customer Department-2'>Retail Customer Department-2</option>
      <option value='Retail Customer Department-3'>Retail Customer Department-3</option>
      <option value='Retail Customer Department-4'>Retail Customer Department-4</option>
      <option value='Risk Management Department'>Risk Management Department</option>
      <option value='Sustainable Finance Unit'>Sustainable Finance Unit</option>
      <option value='Security Department'>Security Department</option>
      <option value='SME Department'>SME Department</option>
      <option value='Transport Department'>Transport Department</option>
      <option value='Treasury Department'>Treasury Department</option>
      <option value='Vigilance Department'>Vigilance Department</option>
      <option value='Welfare Department'>Welfare Department</option>";
      echo "</select>";
      }
      echo '<div class="errormessage">' . form_error('circular_department') . '</div></div>';
     */

    echo "<div class='form-group'><label for='circular_date'>Circular Date</label></br>";
    $data = array(
        'name' => 'circular_date',
        'class' => 'datepicker',
        'required' => 'required',
        'value' => (isset($_POST['circular_date']) ? $_POST['circular_date'] : '')
    );
    echo form_input($data) . "</p>";
    echo '<div class="errormessage">' . form_error('circular_date') . '</div></div>';

    echo "<div class='form-group'><label for='upload'>Upload File</label></br>";
    $data = array(
        'name' => 'circular_pdf_link',
        'class' => 'formUpload',
        'id' => 'upload');
    echo form_upload($data) . "</div>";

    echo "<div class='form-group'><label for='publish_status'>Publish Status</label></br>";
    echo "<select name='publish_status' id='publish_status' class='form-con'>
    <option value=''>--Select--</option>
    <option value='Private'>Private</option>
    <option value='Public'>Public</option>";
    echo "</select></div>";

    echo "<div class='form-group'><label for='circular_status'>Circular Status</label></br>";
    $data = array(
        'name' => 'circular_status',
        'id' => 'circular_status',
        'readonly' => 'readonly',
        'class' => 'readonly',
        'required' => 'required',
        'value' => (isset($_POST['circular_status']) ? $_POST['circular_status'] : 'Active')
    );
    echo form_input($data) . "</p>";
    echo '<div class="errormessage">' . form_error('circular_status') . '</div></div>';

    $attributes = array(
        'name' => 'submit',
        'type' => 'submit',
        'id' => 'circular_submit_id',
        'value' => 'SUBMIT',
        'class' => 'btn btn-success'
    );
    echo "<p class='clear'>" . form_submit($attributes) . "</p>";
    echo form_close();
    ?>
</fieldset>