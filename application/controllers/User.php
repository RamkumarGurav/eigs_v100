<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');


include_once ('Main.php');
class User extends Main
{

  public function __construct()
  {
    parent::__construct();

    //models
    $this->load->model('Common_Model');
    $this->load->model('User_Model');


    //headers
    $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
    $this->output->set_header("Pragma: no-cache");

  }

  public function index()
  {

    $this->data['meta_title'] = _project_name_;
    $this->data['meta_description'] = _project_name_;
    $this->data['meta_keywords'] = _project_name_;
    $this->data['meta_others'] = "";

    $last_screen = $this->Common_Model->checkScreen();



    $this->data['completed_project_home_data'] = $this->User_Model->get_project([
      "project_variant" => 2,
      "is_home_display" => 1,
      "sort_by_home_position",
    ]);
    $this->data['ongoing_project_home_data'] = $this->User_Model->get_project([
      "project_variant" => 1,
      "is_home_display" => 1,
      "sort_by_home_position",
    ]);





    parent::getHeader('header', $this->data);
    $this->load->view('home', $this->data);
    parent::getFooter('footer', $this->data);
  }


  public function ongoing_projects()
  {
    $this->data['meta_title'] = _project_name_ . " - Ongoing Projects";
    $this->data['meta_description'] = _project_name_ . " - Ongoing Projects";
    $this->data['meta_keywords'] = _project_name_ . " - Ongoing Projects";
    $this->data['meta_others'] = "";

    $this->data['project_data'] = $this->User_Model->get_project([
      "project_variant" => 1,
      "details" => 1
    ]);


    parent::getHeader('header', $this->data);
    $this->load->view('ongoing_projects', $this->data);
    parent::getFooter('footer', $this->data);
  }


  public function ongoing_projects_details($slug)
  {




    $this->data['project_data'] = $this->User_Model->get_project([
      "project_variant" => 1,
      "details" => 1
    ]);
    $this->data['single_project_data'] = $this->User_Model->get_project([
      "project_variant" => 1,
      "slug_url" => $slug,
      "details" => 1
    ]);

    if (empty($this->data['single_project_data'])) {
      $this->load->view('pageNotFound', $this->data);
    } else {
      $this->data['single_project_data'] = $this->data['single_project_data'][0];

      $this->data['meta_title'] = _project_name_ . " - " . $this->data['single_project_data']->name;
      $this->data['meta_description'] = _project_name_ . " - Completed Projects";
      $this->data['meta_keywords'] = _project_name_ . " - Completed Projects";
      $this->data['meta_others'] = "";

      parent::getHeader('header', $this->data);
      $this->load->view('ongoing_projects_details', $this->data);
      parent::getFooter('footer', $this->data);
    }


  }



  public function completed_projects()
  {
    $this->data['meta_title'] = _project_name_ . " - Completed Projects";
    $this->data['meta_description'] = _project_name_ . " - Completed Projects";
    $this->data['meta_keywords'] = _project_name_ . " - Completed Projects";
    $this->data['meta_others'] = "";

    $this->data['project_data'] = $this->User_Model->get_project([
      "project_variant" => 2,
      "details" => 1
    ]);





    parent::getHeader('header', $this->data);
    $this->load->view('completed_projects', $this->data);
    parent::getFooter('footer', $this->data);
  }


  public function completed_projects_details($slug)
  {




    $this->data['project_data'] = $this->User_Model->get_project([
      "project_variant" => 2,
      "details" => 1
    ]);
    $this->data['single_project_data'] = $this->User_Model->get_project([
      "project_variant" => 2,
      "slug_url" => $slug,
      "details" => 1
    ]);

    if (empty($this->data['single_project_data'])) {
      $this->load->view('pageNotFound', $this->data);
    } else {
      $this->data['single_project_data'] = $this->data['single_project_data'][0];

      $this->data['meta_title'] = _project_name_ . " - " . $this->data['single_project_data']->name;
      $this->data['meta_description'] = _project_name_ . " - Completed Projects";
      $this->data['meta_keywords'] = _project_name_ . " - Completed Projects";
      $this->data['meta_others'] = "";

      parent::getHeader('header', $this->data);
      $this->load->view('completed_projects_details', $this->data);
      parent::getFooter('footer', $this->data);
    }


  }



  function ajax_insert_enquiry()
  {
    $page = trim($_POST['page']);

    ini_set('display_errors', 'Off');
    ini_set('error_reporting', E_ALL);
    date_default_timezone_set('Asia/Kolkata');
    $timestamp = date("Y-m-d H:i:s");

    //echo '<pre>'; print_r($_POST); echo '</pre>'; exit; 

    exit;
    if (true) {
      if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] != '') {
        $link = $_SERVER['HTTP_REFERER'];
        $link_array = explode('/', $link);
        $page_action = end($link_array);
        $parts = parse_url($link);
        $page_host = $parts['host'];
        if (strpos($parts["host"], 'www.') !== false) { //echo 'yes<br>';
          $parts1 = explode('www.', $parts["host"]);
          $page_host = $parts1[1];
        }


        if ($page_host != _mainsite_hostname_) {

          echo '<script language="javascript">';
          echo 'alert("Host validation failed! Please try again.")';
          echo '</script>';
          REDIRECT(MAINSITE . $page);
          die();
        }
      } else {
        echo '<script language="javascript">';
        echo 'alert("Error: HTTP_REFERER failed! Please try again.")';
        echo '</script>';
        REDIRECT(MAINSITE . $page);
        die();
      }



      $request = '';
      if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
        $param['secret'] = _google_recaptcha_secret_key_;
        $param['response'] = $_POST['g-recaptcha-response'];
        $param['remoteip'] = $_SERVER['REMOTE_ADDR'];
        foreach ($param as $key => $val) {
          $request .= $key . "=" . $val;
          $request .= "&";
        }
        $request = substr($request, 0, strlen($request) - 1);
        $url = "https://www.google.com/recaptcha/api/siteverify?" . $request;
        //echo $url; exit;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $result_data = curl_exec($ch);
        if (curl_exec($ch) === false) {
          $error_info = curl_error($ch);
        }
        curl_close($ch);

        $response = json_decode($result_data);
        if ($response->success != 1) {
          echo '<script language="javascript">';
          echo 'alert("google recaptcha validation failed! Please try again.")';
          echo '</script>';
          REDIRECT(MAINSITE . $page);
          die();
        }
      } else {
        echo '<script language="javascript">';
        echo 'alert("Error: google recaptcha post validation failed! Please try again.")';
        echo '</script>';
        REDIRECT(MAINSITE . $page);
        die();
      }
    }


    $enter_data['name'] = trim($_POST['name']);
    $enter_data['contactno'] = trim($_POST['contactno']);
    $enter_data['email'] = trim($_POST['email']);
    $enter_data['subject'] = trim($_POST['subject']);
    $enter_data['description'] = trim($_POST['description']);
    $enter_data['status'] = 1;

    $enter_data['added_on'] = date("Y-m-d H:i:s");

    $enquiry_result = $insertStatus = $this->Common_Model->add_operation(array('table' => 'enquiry', 'data' => $enter_data));

    $response['message'] = '<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <i class="icon fas fa-ban"></i> Something went wrong. Please try again.
    </div>';

    if (!empty($enquiry_result)) {

      // $this->send_email_for_enquiry($enter_data);
      //   $this->session->set_flashdata('alert_message', '<div class="alert alert-success alert-dismissible">
      // <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      // <i class="icon fas fa-check"></i>Thank You.
      // </div>');
      //redirect to thank you page
      REDIRECT(MAINSITE . "/thank-you");
      exit;
    } else {
      //redirect to the same page
      REDIRECT(MAINSITE . $page);
    }


  }

  function ajax_insert_enquiry1()
  {
    header('Content-Type: application/json');
    $response = ['success' => false, 'message' => 'An error occurred.'];

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
      $response['message'] = 'Invalid request method.';
      echo json_encode($response);
      exit;
    }

    // Validate referer
    if (!isset($_SERVER['HTTP_REFERER']) || parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST) !== _mainsite_hostname_) {
      $response['message'] = 'Invalid request origin.';
      echo json_encode($response);
      exit;
    }

    // Verify reCAPTCHA
    $recaptcha_secret = _google_recaptcha_secret_key_;
    $recaptcha_response = $_POST['g-recaptcha-response'] ?? '';

    $verify_response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
    $response_data = json_decode($verify_response);

    if (!$response_data->success) {
      $response['message'] = 'reCAPTCHA verification failed.';
      echo json_encode($response);
      exit;
    }

    // Process form data
    $enter_data = [
      'name' => trim($_POST['name'] ?? ''),
      'contactno' => trim($_POST['contactno'] ?? ''),
      'email' => trim($_POST['email'] ?? ''),
      'subject' => trim($_POST['subject'] ?? ''),
      'description' => trim($_POST['description'] ?? ''),
      'status' => 1,
      'added_on' => date("Y-m-d H:i:s")
    ];

    // Validate required fields
    $required_fields = ['name', 'contactno', 'email', 'description'];
    foreach ($required_fields as $field) {
      if (empty($enter_data[$field])) {
        $response['message'] = ucfirst($field) . ' is required.';
        echo json_encode($response);
        exit;
      }
    }

    // Insert data into database
    $enquiry_result = $this->Common_Model->add_operation(['table' => 'enquiry', 'data' => $enter_data]);

    if ($enquiry_result) {
      // Optionally, send email notification here
      // $this->send_email_for_enquiry($enter_data);

      $response['success'] = true;
      $response['message'] = 'Thank you for your enquiry.';
    } else {
      $response['message'] = 'Failed to save enquiry. Please try again.';
    }

    echo json_encode($response);
    exit;
  }
  public function send_email_for_enquiry($enter_data)
  {
    $subject = "New Enquiry !eigs.com";
    $message = 'New Inquiry';
    $mailData = '';



    $mailData .= $this->Common_Model->SetMailContent('Name', $enter_data['name']);
    $mailData .= $this->Common_Model->SetMailContent('Email', $enter_data['email']);
    $mailData .= $this->Common_Model->SetMailContent('Contactno', $enter_data['contactno']);
    $mailData .= $this->Common_Model->SetMailContent('Subject', $enter_data['subject']);
    $mailData .= $this->Common_Model->SetMailContent('Message', $enter_data['message']);


    // $mailData .= $this->Common_Model->SetMailContent('ip_address', $add_data['ip_address']);
    // $mailData .= $this->Common_Model->SetMailContent('Reff URL', $add_data['reff_url']);

    $mailMessage = file_get_contents(APPPATH . 'mailer/enquiry.html');
    $mailMessage = preg_replace('/\\\\/', '', $mailMessage); //Strip backslashes
    $mailMessage = str_replace("#admin#", stripslashes("Admin"), $mailMessage);
    $mailMessage = str_replace("#message#", stripslashes($message), $mailMessage);
    $mailMessage = str_replace("#mailData#", stripslashes($mailData), $mailMessage);

    $mailMessage = str_replace("#mainsite#", base_url(), $mailMessage);

    $email_to[] = array('email' => "ramkumarsgurav@gmail.com", 'name' => "ram");
    $attachment_arr = array(); # max 5 attachment

    foreach ($email_to as $et) {
      $to_email = $et['email'];
      $to_name = $et['name'];
      $this->Common_Model->send_mail(array('template' => $mailMessage, 'subject' => $subject, 'to' => $to_email, 'name' => $to_name, 'attachment_arr' => $attachment_arr));
    }
  }


  function enqForm()
  {
    $response['message'] = '<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<i class="icon fas fa-ban"></i> Something went wrong. Please try again.
						</div>';

    $add_data['name'] = $name = $_POST['name'];
    $add_data['email'] = $email = $_POST['email'];
    $add_data['contactno'] = $contact = $_POST['contactno'];
    $add_data['subject'] = $contact = $_POST['subject'];
    $add_data['message'] = $contact = $_POST['message'];
    $add_data['ip_address'] = $ip_address = $this->Common_Model->get_client_ip();
    $add_data['added_on'] = $added_on = date("Y-m-d H:i:s");
    $add_data['status'] = $status = 1;
    $add_data['reff_url'] = $reff_url = $_SERVER['HTTP_REFERER'];
    $add_data['follow_up_status_id'] = 1;

    $enquiry_id = $this->Common_Model->add_operation(array("table" => "enquiry", "data" => $add_data));
    if ($enquiry_id > 0) {



      $subject = "New Enquiry !eigs.com";
      $message = 'New Inquiry';
      $mailData = '';



      $mailData .= $this->Common_Model->SetMailContent('Name', $add_data['name']);
      $mailData .= $this->Common_Model->SetMailContent('email', $add_data['email']);
      $mailData .= $this->Common_Model->SetMailContent('contactno', $add_data['contactno']);
      $mailData .= $this->Common_Model->SetMailContent('subject', $add_data['subject']);
      $mailData .= $this->Common_Model->SetMailContent('message', $add_data['message']);


      // $mailData .= $this->Common_Model->SetMailContent('ip_address', $add_data['ip_address']);
      // $mailData .= $this->Common_Model->SetMailContent('Reff URL', $add_data['reff_url']);

      $mailMessage = file_get_contents(APPPATH . 'mailer/enquiry.html');
      $mailMessage = preg_replace('/\\\\/', '', $mailMessage); //Strip backslashes
      $mailMessage = str_replace("#admin#", stripslashes("Admin"), $mailMessage);
      $mailMessage = str_replace("#message#", stripslashes($message), $mailMessage);
      $mailMessage = str_replace("#mailData#", stripslashes($mailData), $mailMessage);

      $mailMessage = str_replace("#mainsite#", base_url(), $mailMessage);

      $email_to[] = array('email' => "anil@marswebsolutions.com", 'name' => "Anubhav");
      $attachment_arr = array(); # max 5 attachment

      foreach ($email_to as $et) {
        $to_email = $et['email'];
        $to_name = $et['name'];
        $this->Common_Model->send_mail(array('template' => $mailMessage, 'subject' => $subject, 'to' => $to_email, 'name' => $to_name, 'attachment_arr' => $attachment_arr));
      }
    }

    $this->session->set_flashdata('alert_message', '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<i class="icon fas fa-check"></i>Course Applied Successfully.
		</div>');
    REDIRECT(MAINSITE);
  }

  public function doContact()
  {
    if (isset($_POST['sendEnquiry'])) {
      $this->form_validation->set_rules('name', 'Name', 'alpha_numeric_spaces|trim|required');
      $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
      $this->form_validation->set_rules('mobile_no', 'Contact Number', 'numeric|trim|required|min_length[10]|max_length[10]');
      $this->form_validation->set_rules('subject', 'Subject', 'alpha_numeric_spaces|trim|required');
      $this->form_validation->set_rules('message', 'Description', 'alpha_numeric_spaces|trim|required');

      $this->form_validation->set_error_delimiters('<div class="error alert alert-danger">', '<a href="#" class="close" data-dismiss="alert" aria-label="close" title="Close">&times;</a></div>');

      if ($this->form_validation->run() == true) {
        $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
        $register = $this->User_model->doAddInquiry();

        if ($register > 0) {
          $this->session->set_flashdata('message', '<div class=" alert alert-success">Thank You! We will get back within 24 - 48 hours.</div>');
          //$this->data['message'] = $this->session->flashdata('message');
          $customerData = $this->Common_Model->getName(array('select' => '*', 'from' => 'enquiry', 'where' => "enquiry_id=$register"));
          $register = $customerData = $customerData[0];
          $name = $customerData->name;
          $email_id = $customerData->email;
          $contact = $customerData->contactno;
          $subject = $customerData->subject;
          $description = $customerData->description;

          //$template = "Dear Admin, new enquiry received from whizzles.com";
          //$this->Common_Model->send_sms(__admincontact__ , $template);
          $subject = "Contact Us Inquiry from " . _project_complete_name_;
          $mailMessage = file_get_contents(APPPATH . 'mailer/enquiry-to-admin.html');
          $mailMessage = preg_replace('/\\\\/', '', $mailMessage); //Strip backslashes
          $mailMessage = str_replace("#name#", stripslashes($customerData->name), $mailMessage);
          $mailMessage = str_replace("#contact#", stripslashes($customerData->contactno), $mailMessage);
          $mailMessage = str_replace("#email#", stripslashes($customerData->email), $mailMessage);
          $mailMessage = str_replace("#subject#", stripslashes($customerData->subject), $mailMessage);
          $mailMessage = str_replace("#message#", stripslashes($customerData->description), $mailMessage);
          $mailMessage = str_replace("#project_contact#", _project_contact_, $mailMessage);
          $mailMessage = str_replace("#project_contact_without_space#", _project_contact_without_space_, $mailMessage);
          $mailMessage = str_replace("#project_complete_name#", _project_complete_name_, $mailMessage);
          $mailMessage = str_replace("#project_website#", _project_web_, $mailMessage);
          $mailMessage = str_replace("#project_email#", __adminemail__, $mailMessage);
          $mailMessage = str_replace("#mainsite#", base_url(), $mailMessage);
          $social_media = '';
          if (_FACEBOOK_ != '')
            $social_media = $social_media . '<a href="' . _FACEBOOK_ . '" target="_blank" ><img src="' . IMAGE . 'email/facebook.png" width="25"></a>';
          if (_INSTAGRAM_ != '')
            $social_media = $social_media . '<a href="' . _INSTAGRAM_ . '" target="_blank" ><img src="' . IMAGE . 'email/instagram.png" width="25"></a>';
          if (_PINTEREST_ != '')
            $social_media = $social_media . '<a href="' . _PINTEREST_ . '" target="_blank" ><img src="' . IMAGE . 'email/pinterest.png" width="25"></a>';
          if (_TWITTER_ != '')
            $social_media = $social_media . '<a href="' . _TWITTER_ . '" target="_blank" ><img src="' . IMAGE . 'email/twitter.png" width="25"></a>';
          if (_LINKEDIN_ != '')
            $social_media = $social_media . '<a href="' . _LINKEDIN_ . '" target="_blank" ><img src="' . IMAGE . 'email/linkedin.png" width="25"></a>';
          if (_YOUTUBE_ != '')
            $social_media = $social_media . '<a href="' . _YOUTUBE_ . '" target="_blank" ><img src="' . IMAGE . 'email/youtube.png" width="25"></a>';
          $mailMessage = str_replace("#social_media#", $social_media, $mailMessage);
          $mailStatus = $this->Common_Model->send_mail(array("template" => $mailMessage, "subject" => $subject, "to" => __adminemail__, "name" => _project_complete_name_));
          // $template = "Dear Admin, Thank you for inquiry with us " . _SMS_BRAND_;
          // $this->Common_Model->send_sms(__adminsms__, $template);
          REDIRECT(base_url(__thanks__));
        } else {
          $this->session->set_flashdata('message', '<div class=" alert alert-danger">Something went wrong please try again.</div>');
        }
      } else {
        $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
      }
    }

    $msg = $this->session->flashdata('message');
    if (!empty($msg))
      $this->data['message'] = $this->session->flashdata('message');
    $this->data['css'] = array();
    $this->data['js'] = array();
    parent::getHeader('header', $this->data);
    $this->load->view('contact-us', $this->data);
    parent::getFooter('footer', $this->data);
  }




  function ajax_insert_career_enquiry()
  {
    $page = trim($_POST['page']);

    ini_set('display_errors', 'Off');
    ini_set('error_reporting', E_ALL);
    date_default_timezone_set('Asia/Kolkata');
    $timestamp = date("Y-m-d H:i:s");

    //echo '<pre>'; print_r($_POST); echo '</pre>'; exit; 

    if (true) {
      if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] != '') {
        $link = $_SERVER['HTTP_REFERER'];
        $link_array = explode('/', $link);
        $page_action = end($link_array);
        $parts = parse_url($link);
        $page_host = $parts['host'];
        if (strpos($parts["host"], 'www.') !== false) { //echo 'yes<br>';
          $parts1 = explode('www.', $parts["host"]);
          $page_host = $parts1[1];
        }


        if ($page_host != _mainsite_hostname_) {

          echo '<script language="javascript">';
          echo 'alert("Host validation failed! Please try again.")';
          echo '</script>';
          die();
        }
      } else {
        echo '<script language="javascript">';
        echo 'alert("Error: HTTP_REFERER failed! Please try again.")';
        echo '</script>';
        die();
      }

      $request = '';
      if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
        $param['secret'] = _google_recaptcha_secret_key_;
        $param['response'] = $_POST['g-recaptcha-response'];
        $param['remoteip'] = $_SERVER['REMOTE_ADDR'];
        foreach ($param as $key => $val) {
          $request .= $key . "=" . $val;
          $request .= "&";
        }
        $request = substr($request, 0, strlen($request) - 1);
        $url = "https://www.google.com/recaptcha/api/siteverify?" . $request;
        //echo $url; exit;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $result_data = curl_exec($ch);
        if (curl_exec($ch) === false) {
          $error_info = curl_error($ch);
        }
        curl_close($ch);

        $response = json_decode($result_data);
        if ($response->success != 1) {
          REDIRECT(MAINSITE . $page);
          echo '<script language="javascript">';
          echo 'alert("google recaptcha validation failed! Please try again.")';
          echo '</script>';

          die();
        }
      } else {
        REDIRECT(MAINSITE . $page);
        echo '<script language="javascript">';
        echo 'alert("Error: google recaptcha post validation failed! Please try again.")';
        echo '</script>';
        die();
      }
    }


    $enter_data['name'] = trim($_POST['name']);
    $enter_data['contactno'] = trim($_POST['contactno']);
    $enter_data['email'] = trim($_POST['email']);
    // $enter_data['subject'] = trim($_POST['subject']);
    $enter_data['qualification'] = trim($_POST['qualification']);
    $enter_data['experience'] = trim($_POST['experience']);
    $enter_data['description'] = trim($_POST['description']);
    $enter_data['status'] = 1;

    $enter_data['added_on'] = date("Y-m-d H:i:s");

    $enquiry_result = $insertStatus = $this->Common_Model->add_operation(array('table' => 'career_enquiry', 'data' => $enter_data));

    if (!empty($enquiry_result)) {
      $this->upload_any_file("career_enquiry", "career_enquiry_id", $enquiry_result, "resume_file", "resume_file", "resume_file_", "resume_file");
      //redirect to thank you page
      REDIRECT(MAINSITE . "/thank-you");
    } else {
      //redirect to the same page
      REDIRECT(MAINSITE . $page);
    }


  }


  function upload_any_file($table_name, $id_column, $id, $input_name, $target_column, $prefix, $target_folder_name)
  {
    $file_name = "";
    if (isset($_FILES[$input_name]['name'])) {
      $timg_name = $_FILES[$input_name]['name'];
      if (!empty($timg_name)) {
        $temp_var = explode(".", strtolower($timg_name));
        $timage_ext = end($temp_var);
        $timage_name_new = $prefix . $id . "." . $timage_ext;
        $image_enter_data[$target_column] = $timage_name_new;
        $imginsertStatus = $this->Common_Model->update_operation(array('table' => $table_name, 'data' => $image_enter_data, 'condition' => "$id_column = $id"));
        if ($imginsertStatus == 1) {
          if (!is_dir(_uploaded_temp_files_ . $target_folder_name)) {
            mkdir(_uploaded_temp_files_ . './' . $target_folder_name, 0777, TRUE);

          }
          move_uploaded_file($_FILES["$input_name"]['tmp_name'], _uploaded_temp_files_ . $target_folder_name . "/" . $timage_name_new);
          $file_name = $timage_name_new;
        }

      }
    }
  }



  public function testp()
  {
    $this->data['meta_title'] = _project_name_ . " - Thank You";
    $this->data['meta_description'] = _project_name_ . " - Thank You";
    $this->data['meta_keywords'] = _project_name_ . " - Thank You";
    $this->data['meta_others'] = "";



    parent::getHeader('header', $this->data);
    $this->load->view('testp', $this->data);
    parent::getFooter('footer', $this->data);
  }


  public function thank_you()
  {
    $this->data['meta_title'] = _project_name_ . " - Thank You";
    $this->data['meta_description'] = _project_name_ . " - Thank You";
    $this->data['meta_keywords'] = _project_name_ . " - Thank You";
    $this->data['meta_others'] = "";



    parent::getHeader('header', $this->data);
    $this->load->view('thank_you', $this->data);
    parent::getFooter('footer', $this->data);
  }


  public function md_message()
  {
    $this->data['meta_title'] = _project_name_ . " - MD Message";
    $this->data['meta_description'] = _project_name_ . " - MD Message";
    $this->data['meta_keywords'] = _project_name_ . " - MD Message";
    $this->data['meta_others'] = "";

    parent::getHeader('header', $this->data);
    $this->load->view('md_message', $this->data);
    parent::getFooter('footer', $this->data);
  }


  public function csr()
  {
    $this->data['meta_title'] = _project_name_ . " - MD Message";
    $this->data['meta_description'] = _project_name_ . " - MD Message";
    $this->data['meta_keywords'] = _project_name_ . " - MD Message";
    $this->data['meta_others'] = "";

    parent::getHeader('header', $this->data);
    $this->load->view('csr', $this->data);
    parent::getFooter('footer', $this->data);
  }

  public function careers()
  {
    $this->data['meta_title'] = _project_name_ . " - Careers";
    $this->data['meta_description'] = _project_name_ . " - Careers";
    $this->data['meta_keywords'] = _project_name_ . " - Careers";
    $this->data['meta_others'] = "";

    parent::getHeader('header', $this->data);
    $this->load->view('careers', $this->data);
    parent::getFooter('footer', $this->data);
  }


  public function mission_values()
  {
    $this->data['meta_title'] = _project_name_ . " - Mission Values";
    $this->data['meta_description'] = _project_name_ . " - Mission Values";
    $this->data['meta_keywords'] = _project_name_ . " - Mission Values";
    $this->data['meta_others'] = "";

    parent::getHeader('header', $this->data);
    $this->load->view('mission_values', $this->data);
    parent::getFooter('footer', $this->data);
  }

  public function company_policy()
  {
    $this->data['meta_title'] = _project_name_ . " - Mission Values";
    $this->data['meta_description'] = _project_name_ . " - Mission Values";
    $this->data['meta_keywords'] = _project_name_ . " - Mission Values";
    $this->data['meta_others'] = "";

    parent::getHeader('header', $this->data);
    $this->load->view('company_policy', $this->data);
    parent::getFooter('footer', $this->data);
  }

  public function clients()
  {
    $this->data['meta_title'] = _project_name_ . " - Clients";
    $this->data['meta_description'] = _project_name_ . " - Clients";
    $this->data['meta_keywords'] = _project_name_ . " - Clients";
    $this->data['meta_others'] = "";

    parent::getHeader('header', $this->data);
    $this->load->view('clients', $this->data);
    parent::getFooter('footer', $this->data);
  }
  public function culture()
  {
    $this->data['meta_title'] = _project_name_ . " - Mission Values";
    $this->data['meta_description'] = _project_name_ . " - Mission Values";
    $this->data['meta_keywords'] = _project_name_ . " - Mission Values";
    $this->data['meta_others'] = "";

    parent::getHeader('header', $this->data);
    $this->load->view('culture', $this->data);
    parent::getFooter('footer', $this->data);
  }

  public function ethics()
  {
    $this->data['meta_title'] = _project_name_ . " - Mission Values";
    $this->data['meta_description'] = _project_name_ . " - Mission Values";
    $this->data['meta_keywords'] = _project_name_ . " - Mission Values";
    $this->data['meta_others'] = "";

    parent::getHeader('header', $this->data);
    $this->load->view('ethics', $this->data);
    parent::getFooter('footer', $this->data);
  }


  public function about_us()
  {
    $this->data['meta_title'] = _project_name_ . " - About Us";
    $this->data['meta_description'] = _project_name_ . " - About Us";
    $this->data['meta_keywords'] = _project_name_ . " - About Us";
    $this->data['meta_others'] = "";






    parent::getHeader('header', $this->data);
    $this->load->view('about_us', $this->data);
    parent::getFooter('footer', $this->data);
  }



  public function services()
  {
    $this->data['meta_title'] = _project_name_ . " - Services";
    $this->data['meta_description'] = _project_name_ . " - Services";
    $this->data['meta_keywords'] = _project_name_ . " - Services";
    $this->data['meta_others'] = "";






    parent::getHeader('header', $this->data);
    $this->load->view('services', $this->data);
    parent::getFooter('footer', $this->data);
  }


  public function contact_us()
  {
    $this->data['meta_title'] = _project_name_ . " - Contact Us";
    $this->data['meta_description'] = _project_name_ . " - Contact Us";
    $this->data['meta_keywords'] = _project_name_ . " - Contact Us";
    $this->data['meta_others'] = "";


    parent::getHeader('header', $this->data);
    $this->load->view('contact_us', $this->data);
    parent::getFooter('footer', $this->data);
  }

  public function pageNotFound()
  {
    $this->data['meta_title'] = _project_name_ . " - Page Not Found";
    $this->data['meta_description'] = _project_name_ . " - Page Not Found";
    $this->data['meta_keywords'] = _project_name_ . " - Page Not Found";
    $this->data['meta_others'] = "";

    $this->load->view('pageNotFound', $this->data);
  }

  public function found404()
  {
    $this->data['meta_title'] = _project_name_ . " - 404 found";
    $this->data['meta_description'] = _project_name_ . " - 404 found";
    $this->data['meta_keywords'] = _project_name_ . " - 404 found";
    $this->data['meta_others'] = "";

    parent::getHeader('header', $this->data);
    $this->load->view('404found', $this->data);
    parent::getFooter('footer', $this->data);
  }














}
