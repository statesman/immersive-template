<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <?php
      $meta = array(
        'title' => 'Starter template',
        'description' => 'This is a starter template.',
        'thumbnail' => 'http://absolute-url-to/thumbnail.jpg',
        'url' => 'http://absolute-url-to/this-page.html'
      );
    ?>

    <title><?php print $meta['title']; ?> | Austin American-Statesman</title>
    <link rel="icon" type="image/png" href="//projects.statesman.com/common/favicon.ico">

    <link rel="canonical" href="<?php print $meta['url']; ?>" />

    <meta name="description" content="<?php print $meta['description']; ?>">

    <meta property="og:title" content="<?php print $meta['title']; ?>"/>
    <meta property="og:description" content="<?php print $meta['description']; ?>"/>
    <meta property="og:image" content="<?php print $meta['thumbnail']; ?>"/>
    <meta property="og:url" content="<?php print $meta['url']; ?>"/>

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@statesman" />
    <meta name="twitter:title" content="<?php print $meta['title']; ?>" />
    <meta name="twitter:description" content="<?php print $meta['description']; ?>" />
    <meta name="twitter:image" content="<?php print $meta['thumbnail']; ?>" />
    <meta name="twitter:url" content="<?php print $meta['url']; ?>" />

    <link href="dist/style.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Lusitana:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather+Sans:400,300,300italic,400italic,700italic,700,800,800italic' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php /* CMG advertising and analytics */ ?>
    <?php include "includes/advertising.inc";?>
    <?php include "../../common/metrics-head.js";?>
  </head>
  <body>
    <nav class="navbar navbar-default" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="http://www.statesman.com/" target="_blank">
            <img width="273" height="26" src="assets/logo-black.png" />
            <p>Investigates</p>
          </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav chapters">
            <li class="active"><a href="#"><strong>Link</strong><br />Longer explainer</a></li>
            <li><a href="#"><strong>Link</strong><br />Longer explainer</a></li>
            <li><a href="#"><strong>Link</strong><br />Longer explainer</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div>
    </nav>

    <nav class="navbar navbar-thin" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="http://www.statesman.com/" target="_blank">
            <img width="273" height="26" src="assets/logo-black.png" />
          </a>
        </div>

        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div id="hero" class="container-fluid hero">
      <img src="http://projects.statesman.com/news/va-center-of-excellence/images/jwj-VA-MRI-00007-1920.jpg" />
      <div class="overlay"></div>
    </div>
    <div class="container">
      <div class="row">
        <section id="intro" class="col-xs-12 col-sm-6">
          <h6>Overline</h6>
          <h1>Headline about the story</h1>
          <h2>And a related subhed that's a little chatty and almost a little summary-like ... it could even be the length of a long sentence.</h2>
          <p class="author">By byline / Published January 1, 2000</p>
          <p class="lead">metered model election-night hologram copyboy Frontline algorithms NPR Facebook Jurgen Habermas hashtag filters digital circulation strategy privacy Innovator's Dilemma, synergize Gannett right-sizing news.me cognitive surplus bringing a tote bag to a knife fight.</p>
          <p>filters community Google+ tools fair use Does my "yes, but" look big in this corner office? WikiLeaks incent the power of the press belongs to the person who owns one net neutrality, crowdfunding SEO Pulse Storify a giant stack of newspapers.</p>
          <p><span><a href="#">Do something link <i class="fa fa-angle-double-right"></i></a></span></p>
        </section>
        <article id="main">
          <h3>Here's a subhed</h3>
          <p>bloggers in their mother's basement information overload Article Skimmer the audience knows more than I do dingbat collaboration circulation David Cohn TBD, information wants to be free Nick Denton nonprofit bot dying WaPo scoop twitterati, newspaper What Would Google Do  vast wasteland.</p>
          <p>natural-born blogger Clay Shirky paidContent Nick Denton engagement advertising awesome vast wasteland Nook Demand Media, Pulse iPad app shoot a video Gardening & War section cancel my subscription serendipity The Weekender synergize.</p>
          <p>blog Frontline ProPublica the power of the press belongs to the person who owns one a giant stack of newspapers that you'll never read Frontline copyright dingbat CPC, media bias The Weekender WordPress SEO mathewi the notion of the public Mozilla Bill Keller Jeff Jarvis. <span><a href="#">Do something link <i class="fa fa-angle-double-right"></i></a></span></p>
          <hr />
          <h3>Here's a subhed</h3>
          <p>Jurgen Habermas reporting layoffs Jurgen Habermas CTR Robin Sloan gotta grok it before you rock it Marshall McLuhan experiment copyboy Gutenberg collaboration Project Thunderdome the power of the press belongs to the person wholonger Book Review.</p>
          <div class="sider panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Related stories</h3>
            </div>
            <div class="panel-body">
              <ul class="fa-ul">
                <li><i class="fa-li fa fa-angle-right"></i><a href="#">Link 1</a></li>
                <li><i class="fa-li fa fa-angle-right"></i><a href="#">Link 2</a></li>
                <li><i class="fa-li fa fa-angle-right"></i><a href="#">Link 3</a></li>
            </div>
          </div>
          <p>Nick Denton gamification Arianna bloggers in their mother's basement Jeff Jarvis do what you do best and link to the rest Tumblr, a giant stack of newspapers that you'll never read TechCrunch content is king Julian Assange afternoon paper Tim Carmody, Quora circulation Sulzberger Arianna free as in beer.</p>
          <p><span>Nick Denton gamification Arianna bloggers</span> in their mother's basement Jeff Jarvis do what you do best and link to the rest Tumblr, a giant stack of newspapers that you'll never read TechCrunch content is king Julian Assange afternoon paper Tim Carmodysaid she said advertising.</p>
          <p><span>Free Darko layoffs the audience knows more</span> than I do copyright do what you do best and link to the rest learnings future newspaper metered model, nut graf privacy nut graf Snarkmarket Julian Assange cognitive surplus. hyperhyperlocal Snarkmarket Walter Lippmann RSS.</p>
          <p><span>Ushahidi Does my "yes, but" look big in this corner</span> office? experiment YouTube Zite experiment DocumentCloud every dog loves food, metered model Voice of San Diego information overload crowdfunding Storify attracting young readers.</p>
          <p>Free Darko layoffs the audience knows more than I do copyright do what you do best and link to the rest learnings future newspaper metered model, nut graf privacy nut graf Snarkmarket Julian Assange community dying Patch.</p>
          <p>Ushahidi Does my "yes, but" look big in this corner office? experiment YouTube Zite experiment DocumentCloud every dog loves food, metered model Voice of San Diego information</p>
          <p>Jurgen Habermas reporting layoffs Jurgen Habermas CTR Robin Sloan gotta grok it before you rock it Marshall McLuhan experiment copyboy Gutenberg collaboration Project Thunderdome the power of the press belongs to the person longer Book Review.</p>
          <hr />
          <h3>Here's a subhed</h3>
          <p>bloggers in their mother's basement information overload Article Skimmer the audience knows more than I do dingbat collaboration circulation David Cohn TBD, information wants to be free Nick Denton nonprofit bot dying WaPo scoop twitterati, newspaper What Would Google Do  vast wasteland.</p>
          <div class="sider sider-md sider-left">
            <iframe src="http://cf.datawrapper.de/lRNqN/2/" frameborder="0" allowtransparency="true" allowfullscreen="allowfullscreen" webkitallowfullscreen="webkitallowfullscreen" mozallowfullscreen="mozallowfullscreen" oallowfullscreen="oallowfullscreen" msallowfullscreen="msallowfullscreen" width="100%" height="350"></iframe>
          </div>
          <p>natural-born blogger Clay Shirky paidContent Nick Denton engagement advertising awesome vast wasteland Nook Demand Media, Pulse iPad app shoot a video Gardening & War section cancel my subscription serendipity The Weekender synergize.</p>
          <p>blog Frontline ProPublica the power of the press belongs to the person who owns one a giant stack of newspapers that you'll never read Frontline copyright dingbat CPC, media bias The Weekender WordPress SEO mathewi the notion of the public Mozilla Bill Keller Jeff Jarvis. <span><a href="#">Do something link <i class="fa fa-angle-double-right"></i></a></span></p>
          <p>bloggers in their mother's basement information overload Article Skimmer the audience knows more than I do dingbat collaboration circulation David Cohn TBD, information wants to be free Nick Denton nonprofit bot dying WaPo scoop twitterati, newspaper What Would Google Do  vast wasteland.</p>
          <p>natural-born blogger Clay Shirky paidContent Nick Denton engagement advertising awesome vast wasteland Nook Demand Media, Pulse iPad app shoot a video Gardening & War section cancel my subscription serendipity The Weekender synergize.</p>
          <p>bloggers in their mother's basement information overload Article Skimmer the audience knows more than I do dingbat collaboration circulation David Cohn TBD, information wants to be free Nick Denton nonprofit bot dying WaPo scoop twitterati, newspaper What Would Google Do  vast wasteland.</p>
          <blockquote class="sider sider-md">
            <p><i class="fa fa-quote-left"></i>Frontline ProPublica the power of the press belongs eporting layoffs Jurgen Habermas CTR Robin Sloan<i class="fa fa-quote-right"></i></p>
            <footer class="text-right">Someone famous in <em>Source Title</em></footer>
          </blockquote>
          <p>natural-born blogger Clay Shirky paidContent Nick Denton engagement advertising awesome vast wasteland Nook Demand Media, Pulse iPad app shoot a video Gardening & War section cancel my subscription serendipity The Weekender synergize.</p>
          <p>bloggers in their mother's basement information overload Article Skimmer the audience knows more than I do dingbat collaboration circulation David Cohn TBD, information wants to be free Nick Denton nonprofit bot dying WaPo scoop twitterati, newspaper What Would Google Do  vast wasteland.</p>
          <p>natural-born blogger Clay Shirky paidContent Nick Denton engagement advertising awesome vast wasteland Nook Demand Media, Pulse iPad app shoot a video Gardening & War section cancel my subscription serendipity The Weekender synergize.</p>
        </article>
      </div>
    </div>

    <?php /* Banner ad */ ?>
    <?php include "includes/banner-ad.inc";?>

    <p id="legal" class="center-block text-center"><small>© 2014 <a href="http://www.coxmediagroup.com" target="_blank">Cox Media Group</a>. By using this website, you accept the terms of our <a href="http://www.mystatesman.com/visitor_agreement/" target="_blank">Visitor Agreement</a> and <a target="_blank" href="http://www.mystatesman.com/privacy_policy/">Privacy Policy</a>, and understand your options regarding <a target="_blank" href="http://www.mystatesman.com/privacy_policy/#ad-choices">Ad Choices</a><img src="http://media.cmgdigital.com/shared/img/photos/2012/02/29/d3/da/ad_choices_logo.png" alt="AdChoices">.</small></p>

    <?php /* CMG advertising and analytics */ ?>
    <?php include "includes/project-metrics.inc"; ?>
    <?php include "../../common/metrics.js"; ?>

    <script src="dist/scripts.js"></script>
    <?php if(isset($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST'] == 'localhost'): ?>
      <script src="//localhost:35729/livereload.js"></script>
    <?php endif; ?>
  </body>
</html>
