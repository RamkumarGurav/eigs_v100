<?
$CI =& get_instance();
if (empty($meta_title)) {
   $meta_title = _project_name_;
}

if (empty($meta_description)) {
   $meta_description = _project_name_;
}

if (empty($meta_keywords)) {
   $meta_keywords = _project_name_;
}

if (empty($meta_others)) {
   $meta_others = "";
}



?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <base href="<?= base_url() ?>">
   <meta property="og:type" content="object" />
   <meta property="og:site_name" content="<?= _project_complete_name_ ?>" />
   <title><?= $meta_title ?></title>
   <meta name="description" content="<?= $meta_description ?>">
   <meta name="keywords" content="<?= $meta_keywords ?>">
   <link rel="shortcut icon" type="image/x-icon" href="<?= IMAGE ?>favicon.ico">
   <link href="<?= CSS ?>custome.css" rel="stylesheet">
   <link href="<?= CSS ?>bootstrap.min.css" rel="stylesheet">
   <!-- <link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"> -->
   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link
      href="https://fonts.googleapis.com/css?family=Lato:300,400,500,700|Poppins:300,400,500,600,700|Raleway:300,400,500,600,700"
      rel="stylesheet">
</head>



<body>

   <header class="sub_navbar1">
      <div class="container">
         <ul class="head_contct">
            <li><i class="fa fa-envelope"></i><a href="mailto:info@eigs.in"> info@eigs.in</a> </li>
            <li><i class="fa fa-phone"></i><a href="919742743973"> +91-97427 43973</a> </li>
         </ul>
         <div class="head_social">
            <a class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
            <a class="btn btn-social-icon btn-instagram"><i class="fa fa-instagram"></i></a>
            <a class="btn btn-social-icon btn-linkedin"><i class="fa fa-linkedin"></i></a>
         </div>
      </div>
   </header>

   <header class="main_navbar">
      <nav class="navbar navbar-default bootsnav" data-spy="affix" data-offset-top="45">
         <div class="container">
            <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"><i
                     class="fa fa-bars"></i></button>
               <a class="navbar-brand" href="<?= MAINSITE ?>"><img src="<?= IMAGE ?>logo.png" class="logo_mwidth"
                     alt="LOGO"></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-menu">
               <ul class="nav navbar-nav navbar-right">
                  <li><a href="<?= MAINSITE ?>" class="active_m1">Home</a></li>
                  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown">About us <i
                           class="fa fa-chevron-down"></i></a>
                     <ul class="dropdown-menu pull-right">
                        <li><a href="about-us">Company Profile</a></li>
                        <li><a href="md-message">Message from MD</a></li>
                        <li><a href="csr">Corporate Social Responsibility</a></li>
                        <li><a href="mission-values">Our Mission/ Values/ Objectives</a></li>
                        <li><a href="company-policy">Company Policy</a></li>
                        <li><a href="culture">Company Culture</a></li>
                        <li><a href="ethics">Ethics of Company</a></li>
                     </ul>
                  </li>
                  <li><a href="services">Services</a></li>
                  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown">Projects <i
                           class="fa fa-chevron-down"></i></a>
                     <ul class="dropdown-menu pull-right">
                        <li><a href="ongoing-projects">Ongoing Projects</a></li>
                        <li><a href="completed-projects">Completed Projects</a></li>
                     </ul>
                  </li>
                  <li><a href="clients">Clients</a></li>
                  <li><a href="contact-us">Contact Us</a></li>
               </ul>
            </div>
         </div>
      </nav>
   </header>