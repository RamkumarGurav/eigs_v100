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





<div class="sub_banner1">
  <div class="container">
    <h3>Contact Us</h3>
  </div>
</div>


<div class="main_about1">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="col-md-5 paddL0">
          <h1 class="main_header">Contact<span> Us</span></h1>

          <div class="contact_sc1">
            <div class="contact_sc2">
              <i class="fa fa-map-marker"></i>
              <div class="contact_scw">
                <div class="contact_sc3">
                  <h3>Engineers Innovation Group</h3>
                  <h4>
                    Grand Arcade, #1361, 3rd Floor,
                    South End Main Road, Jayanagar 9th Block
                    Bangalore-560069, Karnataka INDIA</h4>
                </div>
              </div>
            </div>
          </div>
          <div class="contact_sc1">
            <div class="contact_sc2">
              <i class="fa fa-envelope"></i>
              <div class="contact_scw">
                <div class="contact_sc3">
                  <h3>Email Address</h3>
                  <h4>info@eigs.in</h4>
                </div>
              </div>
            </div>
          </div>
          <div class="contact_sc1">
            <div class="contact_sc2">
              <i class="fa fa-phone"></i>
              <div class="contact_scw">
                <div class="contact_sc3">
                  <h3>Phone Number</h3>
                  <h4>+91 9742743973/ +91 80 26590103</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-1 paddL0"></div>
        <div class="col-md-6 paddL0">
          <h1 class="main_header">Enquire<span> Here</span></h1>
          <div class="contact_frm">
            <form name="enqForm" id="contact_us_form" action="<?= MAINSITE . 'ajax_insert_enquiry' ?>"
              onsubmit="submitForm(event)" novalidate="novalidate" accept-charset="utf-8" autocomplete="off"
              enctype="multipart/form-data" method="POST" data-parsley-validate>
              <input type="hidden" class="form" id="subject" name="subject" value="customer enquiry">
              <input type="hidden" name="page" id="page" value="contact-us" />
              <div class="row gy-24">
                <div class="col-md-12">
                  <div class="floating-form-input">
                    <input type="text" class="form" style="margin-bottom:5px;" id="name" name="name"
                      pattern="(?=.*[A-Za-z])[A-Za-z\s]*" required="" data-parsley-required-message="Name is required"
                      placeholder="Name" data-parsley-trigger="keyup" />
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="floating-form-input">
                    <input type="email" class="form" style="margin-bottom:5px;" id="email" name="email" required=""
                      placeholder="Email" data-parsley-required-message="E-mail address is required"
                      data-parsley-type="email" data-parsley-type-message="Please enter valid e-mail address"
                      data-parsley-trigger="keyup" />
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="floating-form-input">
                    <input type="text" class="form" style="margin-bottom:5px;" id="contactno" name="contactno"
                      maxlength="15" placeholder="Contact Number" pattern="[0-9\\s]{10,15}" required=""
                      data-parsley-required-message="Contact number is required" data-parsley-type="integer"
                      data-parsley-type-message="Please enter valid contact number" data-parsley-trigger="keyup" />
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-input-box">
                    <div class="floating-form-input">
                      <textarea class="form" id="description" style="margin-bottom:5px;" name="description" required=""
                        rows="5" placeholder="Your Message" data-parsley-required-message="Message is required"
                        data-parsley-minlength="10" data-parsley-trigger="keyup"
                        data-parsley-minlength-message="You need to enter at least a 10 character message.."></textarea>
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">

                  <div class="contact-form-btn">
                    <button class="g-recaptcha contat_btn1" data-callback="onSubmit"
                      style="pointer-events: all; cursor: pointer;" data-sitekey="<?= _google_recaptcha_site_key_ ?>"
                      data-action="submit">Send Message
                    </button>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
            </form>


          </div>
        </div>
        <div class="contact_map">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15555.430119441482!2d77.5947339!3d12.916877!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x45403015f9a85a85!2sShapes%20%26%20Structures%20Consulting%20Structural%20Engineers!5e0!3m2!1sen!2sin!4v1650109380182!5m2!1sen!2sin"
            class="google_map1" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>

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