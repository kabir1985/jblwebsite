
<?php
if ($this->session->flashdata('message')) {
    echo '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button"><i class="icon-remove"></i></button>' . $this->session->flashdata('message') . '</div>';
}
?>
<fieldset><legend><?php echo $title; ?></legend>

    <!-- Before loop -->
    <?php
    $attributes = array('id' => 'innovation_form', 'class' => 'my_entry_form');
    echo form_open_multipart('admin/innovation/uploadcatfiles', $attributes);

    echo "<p><label for='filetype'>ফাইল এর ধরণ: </label>";
    $options = array(
        '' => '---অনুগ্রহ করে নির্বাচন করুণ---',
        'innovation_action_plan' => 'ইনোভেশন টিমের কর্ম পরিকল্পনা ',
        'innovation_initiatives' => 'ইনোভেশন টিমের উদ্ভাবনী উদ্যোগ',
        'innovation_piloting' => 'ইনোভেশন পাইলটিং- এর তালিকা (গ্রহনের বছর ও দপ্তর ভিত্তিক)',
        'innovation_replication' => 'ইনোভেশন রেপ্লিকেশন- এর তালিকা (গ্রহনের বছর ও দপ্তর ভিত্তিক)'
    );

    echo form_dropdown('filetype', $options, (isset($_POST['filetype']) ? $_POST['filetype'] : ''));
    echo '</p>';
    echo '<span style="color:#F00; font-weight:bold; "><div class="errormessage">' . form_error('filetype') . '</div></span>';

    echo "<p><label for='upload'>ফাইল আপলোড করুণ: </label>";
    $data = array(
        'name' => 'myfile',
        'id' => 'upload');
    echo form_upload($data) . "</p>";

    if (isset($error_mssg) && !empty($error_mssg)) {
        //echo $error_mssg;
        echo '<p><div class="errormessage" style="color:#F00; font-weight:bold; ">' . $error_mssg . '</div></p>';
    }


    $attributes = array(
        'name' => 'submit',
        'type' => 'submit',
        'value' => 'SUBMIT',
        'class' => 'btn btn-success');
    echo "<p class='clear'>" . form_submit($attributes) . "</p>";
    echo form_close();
    ?>
</fieldset>
