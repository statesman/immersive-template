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
          <div class="navbar-expand" data-target="#navbar-chapters">
            <i class="fa fa-angle-double-down"></i> <a>Chapters</a>
          </div>
          <ul id="navbar-chapters" class="nav navbar-nav hidden-xs">
            <li class="active"><a href="#"><strong>Link</strong><br />Longer explainer</a></li>
            <li><a href="#"><strong>Link</strong><br />Longer explainer</a></li>
            <li><a href="#"><strong>Link</strong><br />Longer explainer</a></li>
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
          <div class="navbar-expand" data-target="#secondary-navbar-chapters">
            <i class="fa fa-angle-double-down"></i> <a>Chapters</a>
          </div>
          <ul id="secondary-navbar-chapters" class="nav navbar-nav hidden-xs">
            <li class="active"><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right social">
            <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div id="hero" class="container-fluid hero">
      <img src="http://projects.statesman.com/news/va-center-of-excellence/images/jwj-VA-MRI-00007-1920.jpg" />
      <div class="overlay"></div>
    </div>
    <div id="hero-fadeout"></div>
    <div class="container">
      <div class="row">
        <section id="intro" class="col-xs-12 col-sm-6">
          <h6>Overline</h6>
          <h1>Headline about the story</h1>
          <h2>And a related subhed that's a little chatty and almost a little summary-like ... it could even be the length of a long sentence.</h2>
          <p class="lead">metered model election-night hologram copyboy Frontline algorithms NPR Facebook Jurgen Habermas hashtag filters digital circulation strategy privacy Innovator's Dilemma, synergize Gannett right-sizing news.me cognitive surplus bringing a tote bag to a knife fight.</p>
          <p>filters community Google+ tools fair use Does my "yes, but" look big in this corner office? WikiLeaks incent the power of the press belongs to the person who owns one net neutrality, crowdfunding SEO Pulse Storify a giant stack of newspapers.</p>
          <p><span><a href="#">Do something link <i class="fa fa-angle-double-right"></i></a></span></p>
        </section>
        <article id="main">
          <div class="photo-full">
            <img src="http://projects.statesman.com/news/va-center-of-excellence/images/jwj-VA-MRI-00062-1920.jpg" />
            <p class="caption">newspapers that you'll never read Frontline copyright dingbat CPC, media bias The Weekender WordPress SEO mathewi the notion of the. <em class="pull-right">Photographer / Statesman</em></p>
          </div>
          <h1>Headline about the story</h1>
          <h2>And a related subhed that's a little chatty and almost a little summary-like ... it could even be the length of a long sentence.</h2>
          <p class="author">By byline / Published January 1, 2000</p>
          <div class="sider panel panel-default sider-social sider-twitter">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-twitter"></i> On Twitter</h3>
            </div>
            <div class="panel-body">
              <div class="media">
                <a class="media-left media-top" href="#">
                  <img src="https://pbs.twimg.com/profile_images/1097015353/Picture_277.png"/>
                </a>
                <div class="media-body">
        					<p><strong>Ralph Haurwitz</strong></p>
    					    <p><a href="https://twitter.com/intent/follow?screen_name=ralphhaurwitz" target="_blank">@ralphhaurwitz</a></p>
                </div>
      				</div>
              <p class="tweet"><i class="fa fa-quote-left"></i>Fifth U.S. Circuit Court of Appeals declines to take up UT's Fisher case en banc. Fisher's option is to appeal to the Supreme Court.<i class="fa fa-quote-right"></i></p>
              <ul class="list-inline text-center">
                <li><a href="https://twitter.com/intent/favorite?tweet_id=532618297662242816"><small><i class="fa fa-star"></i> Favorite</small></a></li>
                <li><a href="https://twitter.com/intent/retweet?tweet_id=532618297662242816"><small><i class="fa fa-retweet"></i> Retweet</small></a></li>
                <li><a href="https://twitter.com/intent/tweet?in_reply_to=532618297662242816"><small><i class="fa fa-reply"></i> Reply</small></a></li>
      				</ul>
            </div>
          </div>
          <p class="lead">bloggers in their mother's basement information overload Article Skimmer the audience knows more than I do dingbat collaboration circulation David Cohn TBD, information wants to be free Nick Denton nonprofit bot dying WaPo scoop twitterati, newspaper What Would Google Do  vast wasteland.</p>
          <p>natural-born blogger Clay Shirky paidContent Nick Denton engagement advertising awesome vast wasteland Nook Demand Media, Pulse iPad app shoot a video Gardening & War section cancel my subscription serendipity The Weekender synergize.</p>
          <p>blog Frontline ProPublica the power of the press belongs to the person who owns one a giant stack of newspapers that you'll never read Frontline copyright dingbat CPC, media bias The Weekender WordPress SEO mathewi the notion of the public Mozilla Bill Keller Jeff Jarvis. <span><a href="#">Do something link <i class="fa fa-angle-double-right"></i></a></span></p>
          <hr />
          <h3>Here's a subhed</h3>
          <p>Jurgen Habermas reporting layoffs Jurgen Habermas CTR Robin Sloan gotta grok it before you rock it Marshall McLuhan experiment copyboy Gutenberg collaboration Project Thunderdome the power of the press belongs to the person wholonger Book Review.</p>
          <p>Nick Denton gamification Arianna bloggers in their mother's basement Jeff Jarvis do what you do best and link to the rest Tumblr, a giant stack of newspapers that you'll never read TechCrunch content is king Julian Assange afternoon paper Tim Carmody, Quora circulation Sulzberger Arianna free as in beer.</p>
          <div class="sider panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Related stories</h3>
            </div>
            <div class="panel-body">
              <ul class="fa-ul">
                <li><i class="fa-li fa fa-angle-right"></i><a href="#">Link 1</a></li>
                <li><i class="fa-li fa fa-angle-right"></i><a href="#">Link 2</a></li>
                <li><i class="fa-li fa fa-angle-right"></i><a href="#">Link 3</a></li>
              </ul>
            </div>
          </div>
          <p><span>Nick Denton gamification Arianna bloggers</span> in their mother's basement Jeff Jarvis do what you do best and link to the rest Tumblr, a giant stack of newspapers that you'll never read TechCrunch content is king Julian Assange afternoon paper Tim Carmodysaid she said advertising.</p>
          <p><span>Free Darko layoffs the audience knows more</span> than I do copyright do what you do best and link to the rest learnings future newspaper metered model, nut graf privacy nut graf Snarkmarket Julian Assange cognitive surplus. hyperhyperlocal Snarkmarket Walter Lippmann RSS.</p>
          <p><span>Ushahidi Does my "yes, but" look big in this corner</span> office? experiment YouTube Zite experiment DocumentCloud every dog loves food, metered model Voice of San Diego information overload crowdfunding Storify attracting young readers.</p>
          <p>Free Darko layoffs the audience knows more than I do copyright do what you do best and link to the rest learnings future newspaper metered model, nut graf privacy nut graf Snarkmarket Julian Assange community dying Patch.</p>
          <p>Ushahidi Does my "yes, but" look big in this corner office? experiment YouTube Zite experiment DocumentCloud every dog loves food, metered model Voice of San Diego information</p>
          <p>Jurgen Habermas reporting layoffs Jurgen Habermas CTR Robin Sloan gotta grok it before you rock it Marshall McLuhan experiment copyboy Gutenberg collaboration Project Thunderdome the power of the press belongs to the person longer Book Review.</p>
          <p>Free Darko layoffs the audience knows more than I do copyright do what you do best and link to the rest learnings future newspaper metered model, nut graf privacy nut graf Snarkmarket Julian Assange community dying Patch.</p>
          <p>Ushahidi Does my "yes, but" look big in this corner office? experiment YouTube Zite experiment DocumentCloud every dog loves food, metered model Voice of San Diego information</p>
          <p>Jurgen Habermas reporting layoffs Jurgen Habermas CTR Robin Sloan gotta grok it before you rock it Marshall McLuhan experiment copyboy Gutenberg collaboration Project Thunderdome the power of the press belongs to the person longer Book Review.</p>
          <hr />
          <div class="photo-block">
            <img src="http://projects.statesman.com/news/va-center-of-excellence/images/jwj-VA-MRI-00279-1920.jpg" />
            <p class="caption">newspapers that you'll never read Frontline copyright dingbat CPC, media bias The Weekender WordPress SEO mathewi the notion of the. <em class="pull-right">Photographer / Statesman</em></p>
          </div>
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
          <hr />
          <h3>Here's a subhed</h3>

          <div class="photo-block">
            <div id="carousel-example-generic" class="carousel slide">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
              </ol>

              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
                <div class="item active">
                  <img src="http://projects.statesman.com/news/va-center-of-excellence/images/jwj-VA-MRI-00007-1920.jpg" />
                </div>
                <div class="item">
                  <img src="http://projects.statesman.com/news/va-center-of-excellence/images/jwj-VA-MRI-00279-1920.jpg" />
                </div>
                <div class="item">
                  <img src="http://projects.statesman.com/news/va-center-of-excellence/images/jwj-VA-MRI-00007-1920.jpg" />
                </div>
              </div>

              <!-- Controls -->
              <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="icon-prev" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="icon-next" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>

          <p>bloggers in their mother's basement information overload Article Skimmer the audience knows more than I do dingbat collaboration circulation David Cohn TBD, information wants to be free Nick Denton nonprofit bot dying WaPo scoop twitterati, newspaper What Would Google Do  vast wasteland.</p>
          <p>natural-born blogger Clay Shirky paidContent Nick Denton engagement advertising awesome vast wasteland Nook Demand Media, Pulse iPad app shoot a video Gardening & War section cancel my subscription serendipity The Weekender synergize.</p>
          <div class="sider panel panel-default sider-social">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-facebook-square"></i> On Facebook</h3>
            </div>
            <div class="panel-body">
              <div class="media">
                <a class="media-left media-top" href="#">
                  <img src="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xpa1/v/t1.0-1/p48x48/1016320_10152241897839208_765057284_n.jpg?oh=b71da201658fa913d8b4f2565a740742&oe=55201378&__gda__=1424850128_0f95e0cf75fce1b453782a241786791c"/>
                </a>
                <div class="media-body">
                  <p><strong>Austin American-Statesman</strong></p>
                  <p><a href="https://facebook.com/statesman" target="_blank">facebook.com/statesman</a></p>
                </div>
              </div>
              <p class="post"><i class="fa fa-quote-left"></i>Fifth U.S. Circuit Court of Appeals declines to take up UT's Fisher case en banc. Fisher's option is to appeal to the Supreme Court.<i class="fa fa-quote-right"></i></p>
              <ul class="list-inline text-center">
                <li><a href="https://www.facebook.com/statesman/posts/10152898814129208" target="_blank"><small><i class="fa fa-comments"></i> Join the conversation</small></a></li>
              </ul>
            </div>
          </div>
          <p>blog Frontline ProPublica the power of the press belongs to the person who owns one a giant stack of newspapers that you'll never read Frontline copyright dingbat CPC, media bias The Weekender WordPress SEO mathewi the notion of the public Mozilla Bill Keller Jeff Jarvis. <span><a href="#">Do something link <i class="fa fa-angle-double-right"></i></a></span></p>
          <p>bloggers in their mother's basement information overload Article Skimmer the audience knows more than I do dingbat collaboration circulation David Cohn TBD, information wants to be free Nick Denton nonprofit bot dying WaPo scoop twitterati, newspaper What Would Google Do  vast wasteland.</p>
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
