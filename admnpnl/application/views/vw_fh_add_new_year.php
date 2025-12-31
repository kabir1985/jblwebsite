<h1><?php echo $title; ?></h1>
<?php echo form_open('admin/financial_highlights/add_new_year');

echo "<label for='year'>Type year</label>";
$data = array(
    'name' => 'year',
    'id'   => 'year',
    'placeholder' => 'For example 2021 or 2022 etc.',
    'size' => 30
);
echo form_input($data);
echo "<br>";
echo form_submit('submit', 'SUBMIT');
echo form_close();
