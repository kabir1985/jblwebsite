<html>
    <head>
    </head>
    <body>
        <p class="text-info">অত্র ব্যাংকের সকল নির্বাহী/ কর্মকর্তা/কর্মচারীগণ ”গ্রাহক সেবা সহজীকরণের নিমিত্তে যে কোন ধারণা/সেবা”  
            innovation.janatabank@gmail.com- এ ইমেইলের মাধ্যমে প্রেরণ করতে পারবেন। </p>
        <table class="table table-responsive-sm table-bordered table-striped">
            <thead class="table-danger">
                <tr>
                    <th scope="col">ক্রম</th>
                    <th scope="col" >কর্ণার</th>
                    <th scope="col">বিষয়/ক্যাটেগরি</th>
                    <th scope="col">পূরনীয় কন্টেন্ট</th>
                </tr>
            </thead>
            <tbody>
                <tr><td colspan="4" style="vertical-align : middle;text-align:center;" class="table-primary">ইনোভেশন সংক্রান্ত তথ্য</td></tr>
                <tr>
                    <th scope="row" rowspan="5" class="table-info" style="vertical-align : middle;text-align:center;">০১</th>
                    <td scope="row" rowspan="5" class="table-success"  style="vertical-align : middle;text-align:center;">ইনোভেশন কর্ণার</td>
                    <td>ইনোভেশন টিম (ফোন নম্বর সহ)</td>
                    <td><a target="_blank" href="<?php echo base_url(); ?>home/innovTeam"> ডাউনলোড করুন</a></td>
                </tr>

                <tr>
                    <td>ইনোভেশন টিমের কর্ম পরিকল্পনা</td>

                    <?php
                    $CI = & get_instance();
                    $CI->load->model('Home_model');
                    $plan = $this->Home_model->innovation_actionPlan();
                    $initiative = $this->Home_model->innovation_initiative();
                    foreach ($plan as $row) {
                        $file = $row['pdf_link'];
                    }

                    foreach ($initiative as $row) {
                        $init = $row->pdf_link;
                    }
                    ?>
                    <!--?php
                    if (count($plan) > 0) {
                        ?>
                        <td><a target = "_blank" href = "<?--php echo base_url();  ?>assets/file/innovation/<?--php echo $file; ?>">ডাউনলোড করুন</a></td>
                    <?--php } else {
                        ?>
                        <td><a target = "_blank" href = "<?--php echo base_url();  ?>assets/file/innovation/<--?php echo $file; ?>">প্রক্রিয়াধীন </a></td>
                        <?--php } ?-->
                    <td><a target = "_blank" href = "<?php echo base_url(); ?>assets/file/innovation/<?php echo $file; ?>">ডাউনলোড করুন</a></td>
                </tr>

                <tr>
                    <td>ইনোভেশন টিমের উদ্ভাবনী উদ্যোগ </td>
                    <td><a target = "_blank" href = "<?php echo base_url(); ?>assets/file/innovation/<?php echo $init; ?>">ডাউনলোড করুন</a></td>
                </tr>

                <tr>
                    <td>ইনোভেশন পাইলটিং- এর তালিকা (গ্রহনের বছর ও দপ্তর ভিত্তিক)</td>
                    <td>প্রক্রিয়াধীন</td>
                </tr>

                <tr>
                    <td>ইনোভেশন রেপ্লিকেশন- এর তালিকা (গ্রহনের বছর ও দপ্তর ভিত্তিক)</td>
                    <td>প্রক্রিয়াধীন</td>
                </tr>

                <tr>
                    <td style = "border:none"></td>
                    <td style = "border:none"></td>
                    <td style = "border-left:none">ইনোভেশন শোকেসিং/মেলা</td>
                    <td>প্রক্রিয়াধীন</td>
                </tr>

                <tr>
                    <th scope = "row" rowspan = "3" style = "vertical-align : middle;text-align:center;" class = "table-info">০২</th>
                    <td scope = "row" rowspan = "3" style = "vertical-align : middle;text-align:center;" class = "table-success">এসপিএস কর্নার</td>
                    <td rowspan = "3" style = "vertical-align : middle;">সেবা পদ্ধতি সহজিকরণ</td>
                    <td>১. কুইক রেমিটেন্স </td>
                </tr>

                <tr>
                    <td>২. জেবি এসএমএস সেন্টার </td>
                </tr>

                <tr>
                    <td>৩. জনতা ব্যাংক অ্যাপস্ </td>
                </tr>

                <tr>
                    <th scope = "row" rowspan = "3" style = "vertical-align : middle;text-align:center;" class = "table-info">০৩</th>
                    <td scope = "row" rowspan = "3" style = "vertical-align : middle;text-align:center;" class = "table-success">এসআইপি কর্ণার</td>
                    <td rowspan = "3" style = "vertical-align : middle;">Small Improvement Project</td>
                    <td>১. অনলাইন ক্রেডিট এমআইএস</td>
                </tr>

                <tr>
                    <td>২. জেবি ফোন </td>
                </tr>

                <tr>
                    <td>৩. সিবিএস ট্রানজেকশন মেসেজ</td>
                </tr>

            </tbody>
        </table>
    </body>
</html>