<style>
  input.parsley-success,
  select.parsley-success,
  textarea.parsley-success {
    color: #468847;
    background-color: #dff0d8;
    border: 1px solid #d6e9c6;
  }

  input.parsley-error,
  select.parsley-error,
  textarea.parsley-error {
    color: #b94a48;
    background-color: #f2dede;
    border: 1px solid #eed3d7;
  }

  .parsley-errors-list {
    margin: 2px 0 3px;
    padding: 0;
    list-style-type: none;
    font-size: 0.9em;
    line-height: 0.9em;
    opacity: 0;
    transition: all 0.3s ease-in;
    -o-transition: all 0.3s ease-in;
    -moz-transition: all 0.3s ease-in;
    -webkit-transition: all 0.3s ease-in;
    color: #ff0000;
  }

  .parsley-errors-list.filled {
    opacity: 1;
  }

  input[type="number"] {
    -moz-appearance: textfield;
  }

  ul.parsley-errors-list {
    order: 2;
    width: 100%;
    margin-top: 8px;
    margin-bottom: 0;
  }
</style>


<style>
  .floating-form-input {
    position: relative;
  }

  .file-placeholder {
    position: absolute;
    top: 50%;
    left: 220px;
    transform: translateY(-50%);
    pointer-events: none;
    color: #aaa;
  }

  #resume_file:focus+.file-placeholder,
  #resume_file:not(:placeholder-shown)+.file-placeholder {}
</style>

<div class="sub_banner1">
  <div class="container">
    <h3>Careers</h3>
  </div>
</div>


<div class="main_about1">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="col-md-12 paddL0">
          <h1 class="main_header">Carrer<span> @ EIG</span></h1>
          <div class="contact_frm">
            <!-- <form method="post" action="controllers/doEnq.php" id="side-contact-us" name="side-contact-us"
              accept-charset="utf-8" autocomplete="off" enctype="multipart/form-data"> -->
            <form name="enqForm" id="contact_us_form" action="<?= MAINSITE . 'ajax_insert_career_enquiry' ?>"
              onsubmit="submitForm(event)" accept-charset="utf-8" autocomplete="off" enctype="multipart/form-data"
              method="POST" data-parsley-validate>
              <input type="hidden" class="form" id="subject" name="subject" value="career enquiry">
              <input type="hidden" name="page" id="page" value="careers" />
              <div class="row">
                <div class="col-xs-6 wow animated slideInLeft" data-wow-delay=".5s">
                  <div class="floating-form-input">
                    <input type="text" class="form" style="margin-bottom:5px;" id="name" name="name"
                      pattern="(?=.*[A-Za-z])[A-Za-z\s]*" required data-parsley-required-message="Name is required"
                      placeholder="Name" data-parsley-trigger="keyup" />
                    <div class="help-block with-errors"></div>
                  </div>

                </div>
                <div class="col-xs-6 wow animated slideInUp" data-wow-delay=".5s">
                  <div class="floating-form-input">
                    <input type="text" class="form" style="margin-bottom:5px;" id="contactno" name="contactno"
                      maxlength="15" placeholder="Contact Number" pattern="[0-9\\s]{10,15}" required
                      data-parsley-required-message="Contact number is required" data-parsley-type="integer"
                      data-parsley-type-message="Please enter valid contact number" data-parsley-trigger="keyup" />
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-xs-6 wow animated slideInRight" data-wow-delay=".5s">
                  <div class="floating-form-input">
                    <input type="email" class="form" style="margin-bottom:5px;" id="email" name="email" required
                      placeholder="Email" data-parsley-required-message="E-mail address is required"
                      data-parsley-type="email" data-parsley-type-message="Please enter valid e-mail address"
                      data-parsley-trigger="keyup" />
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-xs-6 wow animated slideInLeft" data-wow-delay=".5s">
                  <div class="floating-form-input">
                    <input type="text" class="form" style="margin-bottom:5px;" id="qualification" name="qualification"
                      pattern="(?=.*[A-Za-z])[A-Za-z\s]*" required
                      data-parsley-required-message="Qualification is required" placeholder="Qualification"
                      data-parsley-trigger="keyup" />
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class=" col-xs-6 wow animated slideInUp" data-wow-delay=".5s">
                  <div class="floating-form-input">
                    <input type="number" class="form" style="margin-bottom:5px;" id="experience" name="experience"
                      min="0" required data-parsley-required-message="Experience is required" data-parsley-type="number"
                      data-parsley-type-message="Please enter a valid number" placeholder="Experience in Years"
                      data-parsley-trigger="keyup" />
                    <div class="help-block with-errors"></div>
                  </div>
                </div>

                <div class="col-xs-6 wow animated slideInRight" data-wow-delay=".5s">
                  <div class="floating-form-input">
                    <input type="file" class="form" id="resume_file" name="resume_file" class="form-control" required
                      data-parsley-required-message="Please upload your resume" accept=".pdf,.docx,.jpg,.jpeg,.png"
                      data-parsley-fileextension="pdf,docx,jpg,jpeg,png" data-parsley-maxfilesize="1"
                      data-parsley-trigger="change">
                    <label for="resume_file" id="resume_file_label" class="file-placeholder">Upload Resume</label>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-xs-12 wow animated slideInRight" data-wow-delay=".5s">
                  <div class="floating-form-input">
                    <textarea class="form" id="description" style="margin-bottom:5px;" name="description" required
                      rows="5" placeholder="Your Message" data-parsley-required-message="Message is required"
                      data-parsley-minlength="10" data-parsley-trigger="keyup"
                      data-parsley-minlength-message="You need to enter at least a 10 character message.."></textarea>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="relative fullwidth col-xs-12">
                  <button class="g-recaptcha contat_btn1" data-callback="onSubmit"
                    style="pointer-events: all; cursor: pointer;" data-sitekey="<?= _google_recaptcha_site_key_ ?>"
                    data-action="submit">Send Message
                  </button>
                  <div class="clearfix"></div>
                </div>
              </div>

              <div class="clear"></div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>


<script src="https://www.google.com/recaptcha/api.js"></script>
<script>



  var formCounter = 0;
  function submitForm(event) {
    formCounter++;
    if (formCounter > 1) {
      event.preventDefault();
      return false;
    }
  }

  function onSubmit(token) {
    if (!$("#contact_us_form").parsley().isValid()) {
      $("#contact_us_form").parsley().validate();
      return false;
    }
    else {
      $("#contact_us_form").submit();
      return true;
    }
  }

</script>