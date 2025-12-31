<!DOCTYPE html>
<style>
        /*modified css*/
		
		/*body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 400px;
            margin: 50px auto;
            text-align: left;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            margin-bottom: 20px;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        ul li {*/
            /*display: flex; */
			/*display: inline;
            align-items: center;
        }
        ul li::before {
            content: '•';
            color: black;
            font-size: 20px;
            margin-right: 10px;
        }*/
		
		/*modified css*/
		
        ul li.success::before {
            content: '✔';
            color: green;
        }
        ul li.error::before {
            content: '✖';
            color: red;
        }
        ul li span {
            margin-left: 10px;
            font-size: 14px;
        }
        ul li span.error-message {
            color: red;
        }
    </style>
<html>
    <body>
    <?php
    if ($this->session->flashdata('message')) 
	{
        echo '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button"><i class="icon-remove"></i></button>' . $this->session->flashdata('message') . '</div>';
    }
    ?>

        <h1 style="font-size: 20px; margin: 0; text-decoration: dotted underline;"><?php echo 'Fill up Carefully'; ?></h1>

        <!--div id="successMsgDiv"></div-->
        <?php echo validation_errors(); ?>

        <form action="<?php echo base_url(); ?>Home/innovative_idea" method="POST" class="submit-form">
            <div class="form-group">
                <label for="">ধারণার শিরোনাম</label>
                <!--input type="text" class="form-control" id="" name="title"-->
                <textarea class="form-control" rows="2" id="comment" name="title"></textarea>
            </div>

            <div class="form-group">
                <label for="">ধারণার  পরিচিতি</label>
                <textarea class="form-control" rows="2" id="comment" name="description"></textarea>
            </div>

            <div class="form-group">
                <label for="">উদ্দেশ‌্য</label>
                <textarea class="form-control" rows="2" id="comment" name="objective"></textarea>
            </div>


            <div class="form-group">
                <label for="">কর্ম পদ্ধতি</label>
                <textarea class="form-control" rows="2" id="comment" name="proced"></textarea>
            </div>

            <div class="form-group">
                <label for="">উপকারিতা / সুফল</label>
                <textarea class="form-control" rows="2" id="comment" name="usefullness"></textarea>
            </div>

            <div class="form-group">
                <label for="">বাস্তবায়ন ও পরিচালন ব‌্যয়</label>
                <textarea class="form-control" rows="2" id="comment" name="maintainCost"></textarea>
            </div>

            <div class="form-group">
                <label for="">বাস্তবায়ন  সময়কাল (বাস্তবায়নের সম্ভাব‌্য তারিখ উল্লেখ করতে হবে)</label>
                <textarea class="form-control" rows="2" id="comment" name="duration"></textarea>
            </div>

            <div class="form-group">
                <label for="">সুবিধাভোগীর ব‌্যয় (যদি থাকে)</label>
                <textarea class="form-control" rows="2" id="comment" name="benificiaryCost"></textarea>
            </div>


            <div class="form-group">
                <label for="">সম্প্রসারনের সুযোগ (যদি থাকে)</label>
                <textarea class="form-control" rows="2" id="comment" name="expandFacility"></textarea>
            </div>

            <div class="form-group">
                <label for="">সম্ভাব‌্য ঝুঁকি</label>
                <textarea class="form-control" rows="2" id="comment" name="probableRisk"></textarea>
            </div>


            <div class="form-group">
                <label for="">বিবিধ</label>
                <!--<textarea class="form-control" rows="2" id="comment" name="miscellenous" placeholder="Enter details (Name, Designation, Posting, Mobile, Date)"></textarea>-->
                
                <input type="text" class="form-control" id="combined_input" name="miscellenous" placeholder="Enter details (Name, Designation, Posting, Mobile, Date)">
                <ul id="validation_list">
            <li id="name_bullet" style="font-weight:bold;">Name <span class="error-message" id="name_error"></span></li>
            <li id="designation_bullet" style="font-weight:bold;">Designation <span class="error-message" id="designation_error"></span></li>
            <li id="posting_bullet" style="font-weight:bold;">Posting <span class="error-message" id="posting_error"></span></li>
            <li id="mobile_bullet" style="font-weight:bold;">Mobile <span class="error-message" id="mobile_error"></span></li>
            <li id="date_bullet" style="font-weight:bold;">Date <span class="error-message" id="date_error"></span></li>
        </ul>
            </div>


            <button type="submit" class="btn btn-primary">SUBMIT</button>

        </form>

        <!--script>
            $('.submit-form').submit(function () {
                $('#successMsgDiv').text("Successfully Submitted");
                return false;
            });
        </script-->
        <script>
        document.addEventListener('DOMContentLoaded', () => {
            const combinedInput = document.getElementById('combined_input');

            const nameBullet = document.getElementById('name_bullet');
            const designationBullet = document.getElementById('designation_bullet');
            const postingBullet = document.getElementById('posting_bullet');
            const mobileBullet = document.getElementById('mobile_bullet');
            const dateBullet = document.getElementById('date_bullet');

            const nameError = document.getElementById('name_error');
            const designationError = document.getElementById('designation_error');
            const postingError = document.getElementById('posting_error');
            const mobileError = document.getElementById('mobile_error');
            const dateError = document.getElementById('date_error');

            combinedInput.addEventListener('input', () => {
                const inputValue = combinedInput.value.trim();
                const parts = inputValue.split(',');

                // Reset validation states
                resetValidation(nameBullet, nameError);
                resetValidation(designationBullet, designationError);
                resetValidation(postingBullet, postingError);
                resetValidation(mobileBullet, mobileError);
                resetValidation(dateBullet, dateError);

                // Validate Name
                if (parts[0] && parts[0].trim().length > 2) {
                    setSuccess(nameBullet, nameError);
                } else if (parts[0]) {
                    setError(nameBullet, nameError, 'Name must be at least 3 characters.');
                }

                // Validate Designation
                if (parts[1] && parts[1].trim().length > 0) {
                    setSuccess(designationBullet, designationError);
                } else if (parts[1]) {
                    setError(designationBullet, designationError, 'Designation cannot be empty.');
                }

                // Validate Posting
                if (parts[2] && parts[2].trim().length > 0) {
                    setSuccess(postingBullet, postingError);
                } else if (parts[2]) {
                    setError(postingBullet, postingError, 'Posting cannot be empty.');
                }

                // Validate Mobile
                if (parts[3]) {
                    const mobile = parts[3].trim();
                    if (/^\d+$/.test(mobile) && mobile.length === 11) {
                        setSuccess(mobileBullet, mobileError);
                    } else if (mobile.length === 11) {
                        setError(mobileBullet, mobileError, 'Mobile must contain numbers only.');
                    } else {
                        setError(mobileBullet, mobileError, 'Mobile must be 11 digits.');
                    }
                }

                // Validate Date
                if (parts[4]) {
                    const date = parts[4].trim();
                    if (/^\d{4}-\d{2}-\d{2}$/.test(date) && isValidDate(date)) {
                        setSuccess(dateBullet, dateError);
                    } else {
                        setError(dateBullet, dateError, 'Date must be in YYYY-MM-DD format.');
                    }
                }
            });

            // Helper functions
            function resetValidation(bullet, errorElement) {
                bullet.classList.remove('success', 'error');
                errorElement.textContent = '';
            }

            function setSuccess(bullet, errorElement) {
                bullet.classList.add('success');
                errorElement.textContent = '';
            }

            function setError(bullet, errorElement, message) {
                bullet.classList.add('error');
                errorElement.textContent = message;
            }

            function isValidDate(dateString) {
                const date = new Date(dateString);
                return date instanceof Date && !isNaN(date);
            }
        });
    </script>

    </body>
</html>