<p style="margin: -33px 0 10px -11px;"><?php echo anchor("admin/marquee", '<i style="font-size:13px;color:red" class="fa fa-angle-double-left"></i> Back', 'class="btn btn-primary"'); ?></p>
<fieldset>
    <legend><h1 style="font-size: 20px; margin: 0; text-decoration: dotted underline;"><?php echo 'Fill up Carefully'; ?></h1></legend>

    <style>
        .readonly{
            cursor: not-allowed;
            background-color: #D9ECF3;
            opacity: 1;
        }
        .form-control:valid{
            background-color: #D9ECF3!important;
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

        .fileExist{
            background-color:  #DAF7A6;
        }

    </style>

    <?php
    if ($this->session->flashdata('message')) {
        echo '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button"><i class="icon-remove"></i></button>' . $this->session->flashdata('message') . '</div>';
    }
    ?>

    <!-- Before loop -->
    <?php
    $attributes = array('id' => 'form', 'class' => 'form-inline');
    echo form_open_multipart('admin/marquee/edit', $attributes);

    /*     * Tender Title Start */
    echo "<div class='form-group'><label for='title'> Marquee Title</label></br>";
    $data = array(
        'name' => 'title',
        'id' => 'title',
        'rows' => 2,
        'cols' => 60,
        'class' => 'form-control',
        'required' => 'required',
        'value' => ($marquee['title'])
    );
    echo form_textarea($data) . "</p>";
    echo '<div class="errormessage">' . form_error('title') . '</div></div>';

    echo "<div class='form-group'><label for='image'>Image</label></br>";
    $options = array(
        '' => '--select--',
        'miking.png' => 'miking',
        'nis.png' => 'nis',
        'message.png' => 'message',
		'pci_dss.png' => 'pci-dss'
		);
    echo form_dropdown('image', $options, $marquee['image']) . "</div>";

    /* Starting date */
    echo "<div class='form-group'><label for='entryDate'>Entry Date</label></br>";
    $data = array(
        'name' => 'entryDate',
        //'class' => 'datepicker',
        'id' => 'startDate',
        'value' => $marquee['entryDate']
    );
    echo form_input($data) . "</p>";
    echo '<div class="errormessage">' . form_error('entryDate') . '</div></div>';

    /* Closing date */

    echo "<div class='form-group'><label for='expiryDate'>Expiry Date</label></br>";
    $data = array(
        'name' => 'expiryDate',
        //'class' => 'datetimepicker',
        'id' => 'endDate',
        'value' => $marquee['expiryDate']
    );
    echo form_input($data) . "</p>";
    echo '<div class="errormessage">' . form_error('expiryDate') . '</div></div>';

    /* End Closing date */

    echo "<div class='form-group'><label for='priority'>Priority</label></br>";
    $count = array(0 => '--select--');
    for ($i = 1; $i <= 100; $i++) {
        $count[$i] = $i;
    }
    echo form_dropdown('priority', $count, $marquee['priority']) . "</div>";
    echo '<div class="errormessage">' . form_error('priority') . '</div>';
    

    echo "<div class='form-group'><label for='status'>Status</label></br>";
    $options = array(
        '' => '--select--',
        '1' => 'Active',
        '0' => 'Inactive'
    );
    echo form_dropdown('status', $options, $marquee['status']) . "</div>";

    echo "<div class='form-group'><label for='upload'>Upload File [If File is Needed]</label></br>";
    $data = array(
        'name' => 'link',
        'id' => 'link',
        'class' => 'formUpload'
    );
    echo form_upload($data) . "<br/><p class='fileExist'>Current file: " . $marquee['link'] . "</p></div>";

    /*     * ** upload  file End *** */

    echo form_hidden('id', $marquee['id']);
    echo "<p class='clear'>" . form_submit('submit', 'SUBMIT', 'class="btn btn-success"') . "</p>";
    echo form_close();
    ?>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#endDate').datetimepicker({
                showOn: "both",
                buttonImage: "<?php echo base_url(); ?>assets/images/calendar.gif",
                buttonImageOnly: true,
                buttonText: '',
                dateFormat: "yy-mm-dd",
                timeFormat: "hh:mm",
                changeYear: true,
                changeMonth: true,
                yearRange: "1971:"
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#startDate').datepicker({
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