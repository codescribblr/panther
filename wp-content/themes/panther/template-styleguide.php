<?php
/**
 *
   Template Name:  Style Guide
 *
 */
?>
<?php get_header(); ?>

<!-- contain main informative part of the site -->
<main id="main" role="main">

  <section class="content-wrapper">

  	<div class="container">
      <h1><strong><?php echo get_bloginfo('name'); ?></strong> Styles</h1>
    </div>

    <div class="summary-header">
      <div class="container">
        <h2 class="summary-header__title">Style Guide</h2>
        <ol class="summary-header__anchor-list  list-links">
          <li class="summary-header__anchors-item"><a href="#typography">Typography</a></li>
          <li class="summary-header__anchors-item"><a href="#buttons">Buttons</a></li>
          <li class="summary-header__anchors-item"><a href="#lists">Lists</a></li>
          <li class="summary-header__anchors-item"><a href="#links">Links</a></li>
          <li class="summary-header__anchors-item"><a href="#icons">Icons</a></li>
          <li class="summary-header__anchors-item"><a href="#breadcrumbs">Breadcrumbs</a></li>
          <li class="summary-header__anchors-item"><a href="#table">Table</a></li>
          <li class="summary-header__anchors-item"><a href="#grid">Grid</a></li>
          <li class="summary-header__anchors-item"><a href="#colors">Colors</a></li>
          <li class="summary-header__anchors-item"><a href="#highlights">Highlights</a></li>
          <li class="summary-header__anchors-item"><a href="#editorial-header">Editorial header</a></li>
          <li class="summary-header__anchors-item"><a href="#article-section">Article section</a></li>
          <li class="summary-header__anchors-item"><a href="#guides-section">Guides section</a></li>
          <li class="summary-header__anchors-item"><a href="#page-header">Page header</a></li>
          <li class="summary-header__anchors-item"><a href="#quote">Quote</a></li>
          <li class="summary-header__anchors-item"><a href="#guides-intro">Featured icons</a></li>
          <li class="summary-header__anchors-item"><a href="#featured-spotlight">Featured spotlight</a></li>
          <li class="summary-header__anchors-item"><a href="#featured-list">Featured list</a></li>
          <li class="summary-header__anchors-item"><a href="#next-lessons">Featured block</a></li>
          <li class="summary-header__anchors-item"><a href="#article-navigation">Article navigation</a></li>
        </ol>
      </div>
    </div>

    <div class="container">
      <button id="snippet-toggle" class="button--primary">Toggle Code Snippets</button>
    </div>

    <div class="container">
      <!-- Typography Start -->
      <a name="typography"></a>
      <section class="styleguide__typography">
        <h2 class="subsection-title"><strong class="subsection-number">#01</strong> Typography</h2>
        <div class="code-sample">
          <p class="small">Lorem ipsum dolor sit amet.</p>
        </div>

        <div class="code-sample">
          <p class="base">Lorem ipsum dolor sit amet.</p>
        </div>

        <div class="code-sample">
          <p class="medium">Lorem ipsum dolor sit amet.</p>
        </div>

        <div class="code-sample">
          <p class="large">Lorem ipsum dolor sit amet.</p>
        </div>

        <div class="code-sample">
          <p class="xlarge">Lorem ipsum dolor sit amet.</p>
        </div>

        <div class="code-sample">
          <p class="xxlarge">Lorem ipsum dolor sit amet.</p>
        </div>

        <div class="code-sample">
          <p class="huge">Lorem ipsum dolor sit amet.</p>
        </div>
      </section>
      <!-- Typography End-->

      <!-- Buttons Start -->
      <a name="buttons"></a>
      <section class="styleguide__buttons">
        <h2 class="subsection-title"><strong class="subsection-number">#02</strong> Buttons</h2>

        <div>
          <h4>Primary</h4>
          <div class="code-sample">
            <a href="#ignore-click" class="button--primary">Use our tool</a>
          </div>
        </div>

        <div>
          <h4>Secondary</h4>
          <div>
            <div class="code-sample">
              <a href="#ignore-click" class="button--secondary">Use our tool</a>
            </div>
          </div>

          <div class="code-sample">
            <div class="styleguide__inverted-block">
              <a href="#ignore-click" class="button--secondary-variation">Use our tool</a>
            </div>
          </div>
        </div>
      </section>
      <!-- Buttons End -->

      <!-- Lists Start -->
      <a name="lists"></a>
      <section class="styleguide__lists">
        <h2 class="subsection-title"><strong class="subsection-number">#03</strong> Lists</h2>

        <h3>Default lists</h3>

        <h4>ul</h4>
        <div class="code-sample">
          <ul>
            <li>Lorem ipsum dolor sit amet.</li>
            <li>Dicta optio cumque dolore hic ea facilis</li>
            <li>Minus, possimus, veniam, incidunt eligendi</li>
          </ul>
        </div>

        <h4>ol</h4>
        <div class="code-sample">
          <ol>
            <li>Lorem ipsum dolor sit amet</li>
            <li>Dicta optio cumque dolore hic ea facilis</li>
            <li>Minus, possimus, veniam, incidunt eligendi</li>
          </ol>
        </div>

        <h3>Default lists of links</h3>

        <h4>ul</h4>
        <div class="code-sample">
          <ul class="list-links">
            <li class="list__item"><a href="#ignore-click">Lorem ipsum dolor sit amet</a></li>
            <li class="list__item"><a href="#ignore-click">Dicta optio cumque dolore hic ea facilis</a></li>
            <li class="list__item"><a href="#ignore-click">Minus, possimus, veniam, incidunt eligendi</a></li>
          </ul>
        </div>

        <div class="code-sample">
          <ul class="list-links list-links--primary">
            <li class="list__item"><a href="#ignore-click">Lorem ipsum dolor sit amet</a></li>
            <li class="list__item"><a href="#ignore-click">Dicta optio cumque dolore hic ea facilis</a></li>
            <li class="list__item"><a href="#ignore-click">Minus, possimus, veniam, incidunt eligendi</a></li>
          </ul>
        </div>

        <h4>ol</h4>
        <div class="code-sample">
          <ol class="list-links">
            <li><a href="#ignore-click">Lorem ipsum dolor sit amet</a></li>
            <li class="current"><a href="#ignore-click">Dicta optio cumque dolore hic ea facilis</a></li>
            <li><a href="#ignore-click">Minus, possimus, veniam, incidunt eligendi</a></li>
          </ol>
        </div>

        <div class="code-sample">
          <ol class="list-anchor">
            <li><a href="#ignore-click">Lorem ipsum dolor sit amet</a></li>
            <li><a href="#ignore-click">Dicta optio cumque dolore hic ea facilis</a></li>
            <li><a href="#ignore-click">Minus, possimus, veniam, incidunt eligendi</a></li>
          </ol>
        </div>

        <div class="code-sample">
          <ol class="list-anchor list-small">
            <li><a href="#ignore-click">Lorem ipsum dolor sit amet</a></li>
            <li><a href="#ignore-click">Dicta optio cumque dolore hic ea facilis</a></li>
            <li><a href="#ignore-click">Minus, possimus, veniam, incidunt eligendi</a></li>
          </ol>
        </div>

        <div class="code-sample">
          <ol class="list-links list-links--secondary">
            <li><a href="#ignore-click">Layout basics</a></li>
            <li><a href="#ignore-click">Basics layouts</a></li>
            <li><a href="#ignore-click">Layout patterns</a></li>
          </ol>
        </div>

        <div class="code-sample">
          <ol class="list-links list-links--secondary list-small">
            <li><a href="#ignore-click">Layout basics</a></li>
            <li><a href="#ignore-click">Basics layouts</a></li>
            <li><a href="#ignore-click">Layout patterns</a></li>
          </ol>
        </div>
      </section>
      <!-- Lists End -->

      <!-- Links Start -->
      <a name="links"></a>
      <section class="styleguide__links">
        <h2 class="subsection-title"><strong class="subsection-number">#04</strong> Links</h2>

        <div>
          <h4>Primary</h4>
          <div class="code-sample">
            <a href="#ignore-click" class="cta--primary">Use our tool</a>
          </div>
        </div>

        <div>
          <h4>Secondary</h4>
          <div class="code-sample">
            <a href="#ignore-click" class="cta--secondary">Use our tool</a>
          </div>
        </div>

        <div class="code-sample">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. <a href="#ignore-click" class="cta">use our tool</a> Fugiat, quam alias voluptatem tempora minus dolor facere cumque necessitatibus placeat velit aliquid ab dolore beatae. Neque ipsam in a illum repellendus?</p>
        </div>
      </section>
      <!-- Links End -->

      <!-- Icons Start -->
      <a name="icons"></a>
      <section class="styleguide__icons">
        <h2 class="styleguide__icons"><strong class="subsection-number">#05</strong> Icons</h2>

        <div class="clear">
          <div class="g--third">
            <p><div class="code-sample"><i class="icon icon-minus"></i></div></p>
          </div>
          <div class="g--third">
            <p><div class="code-sample"><i class="icon icon-plus"></i></div></p>
          </div>
          <div class="g--third g--last">
            <p><div class="code-sample"><i class="icon icon-star"></i></div></p>
          </div>

          <div class="g--third">
            <p><div class="code-sample"><i class="icon icon-chevron-right"></i></div></p>
          </div>
          <div class="g--third">
            <p><div class="code-sample"><i class="icon icon-chevron-left"></i></div></p>
          </div>
          <div class="g--third g--last">
            <p><div class="code-sample"><i class="icon icon-chevron-up"></i></div></p>
          </div>

          <div class="g--third">
            <p><div class="code-sample"><i class="icon icon-chevron-down"></i></div></p>
          </div>
          <div class="g--third">
            <p><div class="code-sample"><i class="icon icon-slash"></i></div></p>
          </div>
          <div class="g--third g--last">
            <p><div class="code-sample"><i class="icon icon-google-dev"></i></div></p>
          </div>

          <div class="g--third">
            <p><div class="code-sample"><i class="icon icon-lessons"></i></div></p>
          </div>
          <div class="g--third">
            <p><div class="code-sample"><i class="icon icon-multi-device-layouts"></i></div></p>
          </div>
          <div class="g--third g--last">
            <p><div class="code-sample"><i class="icon icon-user-input"></i></div></p>
          </div>

          <div class="g--third">
            <p><div class="code-sample"><i class="icon icon-introduction-to-media"></i></div></p>
          </div>
          <div class="g--third">
            <p><div class="code-sample"><i class="icon icon-performance"></i></div></p>
          </div>
          <div class="g--third g--last">
            <p><div class="code-sample"><i class="icon icon-bullet"></i></div></p>
          </div>

          <div class="g--third">
            <p><div class="code-sample"><i class="icon icon-chevron-large"></i></div></p>
          </div>
          <div class="g--third">
            <p><div class="code-sample"><i class="icon icon-close"></i></div></p>
          </div>
          <div class="g--third g--last">
            <p><div class="code-sample"><i class="icon icon-cog"></i></div></p>
          </div>

          <div class="g--third">
            <p><div class="code-sample"><i class="icon icon-diamond"></i></div></p>
          </div>
          <div class="g--third">
            <p><div class="code-sample"><i class="icon icon-exclamation"></i></div></p>
          </div>
          <div class="g--third g--last">
            <p><div class="code-sample"><i class="icon icon-hash"></i></div></p>
          </div>

          <div class="g--third">
            <p><div class="code-sample"><i class="icon icon-menu"></i></div></p>
          </div>
          <div class="g--third">
            <p><div class="code-sample"><i class="icon icon-question"></i></div></p>
          </div>
          <div class="g--third g--last">
            <p><div class="code-sample"><i class="icon icon-tick"></i></div></p>
          </div>
        </div>

        <h4>Icon Circles</h4>

        <div class="clear">

          <div class="g--half">
            <p>
              <div class="code-sample">
                <span class="icon-circle"><i class="icon icon-lessons"></i></span>
              </div>
            </p>
          </div>
          <div class="g--half g--last">
            <p>
              <div class="code-sample">
                <span class="icon-circle"><i class="icon icon-lessons"></i></span>
              </div>
            </p>
          </div>

        </div>

        <h4>Icon Circles - Themed</h4>

        <div class="clear">

          <div class="g--half">
            <div class="code-sample">
              <p class="theme--multi-device-layouts">
                <span class="icon-circle themed--background"><i class="icon icon-multi-device-layouts"></i></span>
              </p>
            </div>
          </div>
          <div class="g--half g--last">
            <div class="code-sample">
              <p class="theme--user-input">
                <span class="icon-circle themed--background"><i class="icon icon-user-input"></i></span>
              </p>
            </div>
          </div>

          <div class="g--half">
            <div class="code-sample">
              <p class="theme--introduction-to-media">
                <span class="icon-circle themed--background"><i class="icon icon-introduction-to-media"></i></span>
              </p>
            </div>
          </div>
          <div class="g--half g--last">
            <div class="code-sample">
              <p class="theme--performance">
                <span class="icon-circle themed--background"><i class="icon icon-performance"></i></span>
              </p>
            </div>
          </div>
        </div>

        <h4>Icon Circles - Large</h4>

        <div class="clear">

          <div class="g--half">
            <div class="code-sample">
              <p class="theme--multi-device-layouts">
                <span class="icon-circle--large themed--background"><i class="icon icon-multi-device-layouts"></i></span>
              </p>
            </div>
          </div>
          <div class="g--half g--last">
            <div class="code-sample">
              <p class="theme--user-input">
                <span class="icon-circle--large themed--background"><i class="icon icon-user-input"></i></span>
              </p>
            </div>
          </div>

          <div class="g--half">
            <div class="code-sample">
              <p class="theme--introduction-to-media">
                <span class="icon-circle--large themed--background"><i class="icon icon-introduction-to-media"></i></span>
              </p>
            </div>
          </div>
          <div class="g--half g--last">
            <div class="code-sample">
              <p class="theme--performance">
                <span class="icon-circle--large themed--background"><i class="icon icon-performance"></i></span>
              </p>
            </div>
          </div>

        </div>

      </section>
      <!-- Icons End -->

      <!-- Breadcrumbs Start -->
      <a name="breadcrumbs"></a>
      <section class="styleguide__breadcrumb">
        <h2 class="subsection-title"><strong class="subsection-number">#06</strong> Breadcrumbs</h2>

        <div class="code-sample">
          <nav class="breadcrumbs">
            <p><a href="#ignore-click" class="breadcrumbs__link">Link 1</a> / <a href="#ignore-click" class="breadcrumbs__link">Link 2</a> / <a href="#ignore-click" class="breadcrumbs__link">Link 3</a> / <a href="#ignore-click" class="breadcrumbs__link">Link 4</a> </p>
          </nav>
        </div>

      </section>
      <!-- Breadcrumbs End -->

      <!-- Tables Start -->
      <a name="table"></a>
      <section class="styleguide__table">
        <h2 class="subsection-title"><strong class="subsection-number">#07</strong> Table</h2>

        <div class="code-sample">
          <table class="table-4">
            <colgroup>
              <col span="1">
              <col span="1">
              <col span="1">
              <col span="1">
            </colgroup>
            <thead>
              <tr>
                <th>Element</th>
                <th>Availability</th>
                <th>Description</th>
                <th>Description</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td data-th="element"><code>src</code></td>
                <td data-th="availability">All browsers</td>
                <td data-th="description">Gives the address (URL) of the video.</td>
                <td data-th="description">Gives the address (URL) of the video.</td>
              </tr>
              <tr>
                <td data-th="element"><code>poster</code></td>
                <td data-th="availability">All browsers</td>
                <td data-th="description">Gives the address (URL) of an image file that the browser can show as soon as the video element loads, before playback begins.</td>
                <td data-th="description">Gives the address (URL) of an image file that the browser can show as soon as the video element loads, before playback begins.</td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="code-sample">
          <table class="table-3">
            <colgroup>
              <col span="1">
              <col span="1">
              <col span="1">
            </colgroup>
            <thead>
              <tr>
                <th>Element</th>
                <th>Availability</th>
                <th>Description</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td data-th="element"><code>src</code></td>
                <td data-th="availability">All browsers</td>
                <td data-th="description">Gives the address (URL) of the video.</td>
              </tr>
              <tr>
                <td data-th="element"><code>poster</code></td>
                <td data-th="availability">All browsers</td>
                <td data-th="description">Gives the address (URL) of an image file that the browser can show as soon as the video element loads, before playback begins.</td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="code-sample">
          <table class="table-2">
            <colgroup>
              <col span="1">
              <col span="1">
            </colgroup>
            <thead>
              <tr>
                <th>Element</th>
                <th>Availability</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td data-th="element"><code>src</code></td>
                <td data-th="availability">Rules applied for any browser width over the value defined in the query.</td>
              </tr>
              <tr>
                <td data-th="element"><code>poster</code></td>
                <td data-th="availability">Rules applied for any browser width over the value defined in the query.</td>
              </tr>
            </tbody>
          </table>
        </div>

        <p>
          <b>Note:</b> <code>markdown</code> isn't recognized in tables, therefore any code
          blocks should be wrapped in &lt;code&gt; tags.
        </p>

      </section>
      <!-- Tables End -->

      <!-- Grid Start -->
      <a name="grid"></a>
      <section class="styleguide__grid">
        <h2 class="subsection-title"><strong class="subsection-number">#08</strong> Grid</h2>

        <div class="clear demo">
          <div class="code-sample">
            <div class="g-medium--half g-wide--1"></div>
            <div class="g-medium--half g-medium--last g-wide--1"></div>
            <div class="g-medium--half g-wide--1"></div>
            <div class="g-medium--half g-medium--last g-wide--1 g-wide--last"></div>
          </div>
        </div>

        <div class="clear demo">
          <div class="code-sample">
            <div class="g-wide--1 g-medium--half"></div>
            <div class="g-wide--3 g-wide--last g-medium--half g--last"></div>
          </div>
        </div>

        <div class="clear demo">
          <div class="code-sample">
            <div class="g-wide--3 g-medium--half"></div>
            <div class="g-wide--1 g-wide--last g-medium--half g--last"></div>
          </div>
        </div>

        <div class="clear demo">
          <div class="code-sample">
            <div class="g-medium--full g-wide--full"></div>
          </div>
        </div>

        <div class="clear demo">
          <div class="code-sample">
            <div class="g-medium--2 g-medium--last g-wide--3"></div>
          </div>
        </div>

        <div class="clear demo">
          <div class="code-sample">
            <div class="g-medium--1 g-medium--last g-wide--2"></div>
          </div>
        </div>

        <div class="clear demo">
          <div class="code-sample">
            <div class="g-medium--1 g-medium--last g-wide--1"></div>
          </div>
        </div>

        <div class="clear demo">
          <div class="code-sample">
            <div class="g-medium--1 g-medium--push-2 g-medium--last g-wide--1 g-wide--push-3 g-wide--last"></div>
          </div>
        </div>

        <div class="clear demo">
          <div class="code-sample">
            <div class="g-medium--1 g-medium--push-2 g-medium--last g-wide--2 g-wide--push-2 g-wide--last"></div>
          </div>
        </div>

        <div class="clear demo">
          <div class="code-sample">
            <div class="g-medium--2 g-medium--push-1 g-medium--last g-wide--3 g-wide--push-1 g-wide--last"></div>
          </div>
        </div>

        <h4>Consistent grid classes</h4>

        <div class="clear demo">
          <div class="code-sample">
            <div class="g--third"></div>
            <div class="g--third"></div>
            <div class="g--third g--last"></div>
          </div>
        </div>

        <div class="clear demo">
          <div class="code-sample">
            <div class="g--half"></div>
            <div class="g--half g--last"></div>
          </div>
        </div>

        <div class="clear demo">
          <div class="code-sample">
            <div class="g--half g--centered"></div>
            <div class="g--third g--centered"></div>
          </div>
        </div>

      </section>
      <!-- Grid End -->

      <!-- Colors Start -->
      <a name="colors"></a>
      <section class="styleguide__colors">
        <h2 class="subsection-title"><strong class="subsection-number">#09</strong> Colours</h2>

        <h3>Blacks</h3>
        <div class="code-sample">
          <ul class="styleguide__color-list list--reset clear">
            <li class="color--gray-background g--half">gray-background</li>
            <li class="color--gray-keyline g--half g--last">gray-keyline</li>
            <li class="color--gray g--half">gray</li>
            <li class="color--gray-dark g--half g--last">gray-dark</li>
          </ul>
        </div>

        <h3>Themes</h3>
        <div class="code-sample">
          <ul class="styleguide__color-list list--reset clear">
            <li class="color--layouts g--half">layouts</li>
            <li class="color--layouts-secondary g--half g--last">layouts secondary</li>
            <li class="color--user g--half">user</li>
            <li class="color--user-secondary g--half g--last">user secondary</li>
            <li class="color--media g--half">media</li>
            <li class="color--media-secondary g--half g--last">media secondary</li>
            <li class="color--performance g--half">performance</li>
            <li class="color--performance-secondary g--half g--last">performance secondary</li>
          </ul>
        </div>

        <h3>Google</h3>
        <div class="code-sample">
          <ul class="styleguide__color-list list--reset clear">
            <li class="color--blue g--half">blue</li>
            <li class="color--blue-secondary g--half g--last">blue secondary</li>
            <li class="color--green g--half">green</li>
            <li class="color--green-secondary g--half g--last">green secondary</li>
            <li class="color--red g--half">red</li>
            <li class="color--red-secondary g--half g--last">red secondary</li>
            <li class="color--yellow g--half">yellow</li>
            <li class="color--yellow-secondary g--half g--last">yellow secondary</li>
          </ul>
        </div>

        <h3>Helpers</h3>
        <div class="code-sample">
          <ul class="styleguide__color-list list--reset clear">
            <li class="color--text g--half">text</li>
            <li class="color--highlight g--half g--last">highlight</li>
            <li class="color--warning g--half">warning</li>
            <li class="color--danger g--half g--last">danger</li>
            <li class="color--muted g--half">muted</li>
            <li class="color--remember g--half g--last">remember</li>
            <li class="color--learning g--half">learning</li>
          </ul>
        </div>
      </section>
      <!-- Colors End -->
    </div> <!-- // closing container -->

    <!-- Highlights Start -->
    <div class="container">
      <a name="highlights"></a>
      <h2 class="subsection-title"><strong class="subsection-number">#10</strong> Highlights</h2>
    </div>

    <section class="styleguide__highlights">

      <div class="code-sample">
        <div class="highlight-module  highlight-module--right   highlight-module--remember">
          <div class="highlight-module__container  icon-exclamation ">
            <div class="highlight-module__content   g-wide--push-1 g-wide--pull-1  g-medium--pull-1   ">
              <p class="highlight-module__title"> Remember</p>
              <p class="highlight-module__text"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
            </div>
          </div>
        </div>
      </div>

      <div class="code-sample">
        <div class="highlight-module  highlight-module--left   highlight-module--learning  ">
          <div class="highlight-module__container  icon-star ">
            <div class="highlight-module__content   g-wide--push-1 g-wide--pull-1  g-medium--push-1   ">
              <p class="highlight-module__title"> Key Takeaways</p>
              <p class="highlight-module__text"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
            </div>
          </div>
        </div>
      </div>

      <div class="code-sample">
        <div class="highlight-module  highlight-module--right   highlight-module--remember  ">
          <div class="highlight-module__container  icon-exclamation ">
            <div class="highlight-module__content   g-wide--push-1 g-wide--pull-1  g-medium--pull-1   ">
              <p class="highlight-module__title"> Remember</p>
              <ul class="highlight-module__list">
                <li>Lorem ipsum dolor sit amet</li>
                <li>Fugit itaque sapiente earum quo expedita</li>
                <li>labore aliquam cupiditate veritatis nihil</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="code-sample">
        <div class="highlight-module  highlight-module--left   highlight-module--remember  ">
          <div class="highlight-module__container  icon-exclamation ">
            <div class="highlight-module__content   g-wide--push-1 g-wide--pull-1  g-medium--push-1   ">
              <p class="highlight-module__title"> Remember</p>
              <p class="highlight-module__text"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
            </div>
          </div>
        </div>
      </div>

    </section>

    <div class="container">
      <h3>Code Samples</h3>
    </div>
    <div class="code-sample">
      <div class="highlight-module highlight-module--code highlight-module--right">
        <div class="highlight-module__container">
          <code class='html'><div class="highlight"><pre>    <span class="cp">&lt;!DOCTYPE html&gt;</span>
        <span class="nt">&lt;html</span> <span class="na">lang=</span><span class="s">&quot;en&quot;</span><span class="nt">&gt;</span>
          <span class="nt">&lt;head&gt;</span>
                <span class="nt">&lt;title&gt;</span>Article Example: sample example<span class="nt">&lt;/title&gt;</span>
          <span class="nt">&lt;/head&gt;</span>
          <span class="nt">&lt;body&gt;</span>
            <span class="nt">&lt;div</span> <span class="na">role=</span><span class="s">&quot;main&quot;</span><span class="nt">&gt;</span>
              Hello, world.
            <span class="nt">&lt;/div&gt;</span>
            <span class="nt">&lt;/body&gt;</span>
        <span class="nt">&lt;/html&gt;</span>
    </pre></div></code>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="code-sample">
        <pre><code class='html'>&lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1.0&quot;&gt;</code></pre>
      </div>
    </div>

    <div class="code-sample">
      <div class="highlight-module  highlight-module--left   highlight-module--learning   highlight-module--inline ">
        <div class="highlight-module__container  icon-star ">
          <div class="highlight-module__content   g-wide--pull-1  ">
            <p class="highlight-module__title"> Key Takeaways</p>

              <ul class="highlight-module__list">
                <li>Lorem ipsum dolor sit amet</li>
                <li>Fugit itaque sapiente earum quo expedita</li>
                <li>labore aliquam cupiditate veritatis nihil</li>
              </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="code-sample">
      <div class="highlight-module  highlight-module--right   highlight-module--remember   highlight-module--inline ">
        <div class="highlight-module__container  icon-exclamation ">
          <div class="highlight-module__content   g-wide--pull-1  ">
            <p class="highlight-module__title"> Remember</p>

              <ul class="highlight-module__list">
                <li>Lorem ipsum dolor sit amet</li>
                <li>Fugit itaque sapiente earum quo expedita</li>
                <li>labore aliquam cupiditate veritatis nihil</li>
              </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- Highlights End -->

    <!-- Editorial Header Start-->
    <div class="container">
      <a name="editorial-header"></a>
      <h2 class="subsection-title"><strong class="subsection-number">#11</strong> Editorial header</h2>
    </div>

    <div class="code-sample">
      <section class="styleguide__editorial-header">

        <div class="editorial-header">
          <div class="container">
            <nav class="breadcrumbs">
              <p> / <a href="#ignore-click" class="breadcrumbs__link">The Essentials</a> / <a href="#ignore-click" class="breadcrumbs__link"> Multi-screen layouts</a></p>
            </nav>

            <h1 class="tag editorial-header__title">Layout Basics</h1>
            <h2 class="editorial-header__subtitle">What is the viewport?</h2>
            <p class="editorial-header__excerpt g-wide--pull-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae varius augue, eu varius dolor. Sed vitae varius augue, eu varius dolor. </p>
            <p class="g-wide--pull-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae varius augue, eu varius dolor. Donec augue diam, scelerisque eget lectus in, posuere aliquet mi. Pellentesque suscipit nisl gravida sem tincidunt, id blandit turpis commodo.</p>

            <div class="toc">
              <p class="toc__title">In this lesson</p>
              <ol class="toc__list list-anchor" id="toc">
                <li><a href="#ignore-click">Lorem ipsum dolor sit amet</a></li>
                <li class="current"><a href="#ignore-click">Dicta optio cumque dolore hic ea facilis</a></li>
                <li><a href="#ignore-click">Minus, possimus, veniam, incidunt eligendi</a></li>
                <li><a href="#ignore-click">Lorem ipsum dolor sit amet</a></li>
                <li><a href="#ignore-click">Dicta optio cumque dolore hic ea facilis</a></li>
                <li><a href="#ignore-click">Minus, possimus, veniam, incidunt eligendi</a></li>
              </ol>
            </div>

          </div>
        </div>

      </section>
    </div>

    <div class="container">
      <a name="article-section"></a>
      <h2 class="subsection-title"><strong class="subsection-number">#12</strong> Article section</h2>
    </div>

    <div class="code-sample">
      <section class="styleguide__articles-section">
        <div class="articles-section">
          <div class="container">
            <p class="articles-count">4 guides</p>
            <ol class="articles-list">
              <li class="articles-list__item">
                <h3 class="xlarge"><a href="#ignore-click">Layout basics</a></h3>
                <p class="g-wide--push-1 g-wide--pull-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores, distinctio blanditiis quos porro harum nemo.</p>
                <a href="#ignore-click" class="cta--primary">See all lessons</a>
              </li>
              <li class="articles-list__item">
                <h3 class="xlarge"><a href="#ignore-click">Basic layouts</a></h3>
                <p class="g-wide--push-1 g-wide--pull-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores, distinctio blanditiis quos porro harum nemo.</p>
                <a href="#ignore-click" class="cta--primary">See all lessons</a>
              </li>
              <li class="articles-list__item">
                <h3 class="xlarge"><a href="#ignore-click">Layout patterns</a></h3>
                <p class="g-wide--push-1 g-wide--pull-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores, distinctio blanditiis quos porro harum nemo.</p>
                <a href="#ignore-click" class="cta--primary">See all lessons</a>
              </li>
              <li class="articles-list__item">
                <h3 class="xlarge"><a href="#ignore-click">UI Elements</a></h3>
                <p class="g-wide--push-1 g-wide--pull-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores, distinctio blanditiis quos porro harum nemo.</p>
                <a href="#ignore-click" class="cta--primary">See all lessons</a>
              </li>
            </ol>
          </div>
        </div>
      </section>
    </div>

    <div class="container">
      <a name="guides-section"></a>
      <h2 class="subsection-title"><strong class="subsection-number">#13</strong> Guides section</h2>
    </div>

    <div class="code-sample">
      <section class="styleguide__guides-section">
        <div class="guides-section">
          <header class="container">
            <h2 class="xxlarge">Documentation</h2>
            <p>Follow these guides and build web content users can access on any device they choose.</p>
          </header>
          <ul class="guides-list container-medium">
            <li class="guides-list__item g--half theme--multi-device-layouts ">
            <div class="primary-content">
              <h3 class="xlarge"><a href="#ignore-click" title="Go to Multi-Device Layouts" class="themed">Multi-Device Layouts</a></h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque, velit, illum iure id in saepe laborum. Doloribus, eaque, assumenda inventore eos iusto tenetur error dolorem suscipit molestiae natus ullam aliquam?</p>
            </div>
            <div class="secondary-content">
              <span class="icon-circle themed--background"><i class="icon icon-lessons"></i></span>
              <ol class="list-links list-links--secondary">
                <li><a href="#ignore-click" title="Read the lesson Responsive Web Design Fundamentals">Responsive Web Design Fundamentals</a></li>
                <li><a href="#ignore-click" title="Read the lesson Responsive Web Design Patterns">Responsive Web Design Patterns</a></li>
                <li><a href="#ignore-click" title="Read the lesson Navigation and Action Patterns">Navigation and Action Patterns</a></li>
              </ol>
            </div>
            </li>
            <li class="guides-list__item g--half theme--introduction-to-media g--last">
            <div class="primary-content">
              <h3 class="xlarge"><a href="#ignore-click" title="Go to Images, Audio and Video" class="themed">Images, Audio and Video</a></h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, fugit ea maiores omnis ad iste autem sed reiciendis amet quam deleniti sapiente laboriosam voluptate pariatur veniam quod beatae sunt architecto?</p>
            </div>
            <div class="secondary-content">
              <span class="icon-circle themed--background"><i class="icon icon-lessons"></i></span>
              <ol class="list-links list-links--secondary">
                <li><a href="#ignore-click" title="Read the lesson Images">Images</a></li>
                <li><a href="#ignore-click" title="Read the lesson Video">Video</a></li>
                <li><a href="#ignore-click" title="Read the lesson Audio">Audio</a></li>
              </ol>
            </div>
            </li>
            <li class="guides-list__item g--half theme--user-input ">
            <div class="primary-content">
              <h3 class="xlarge"><a href="#ignore-click" title="Go to Forms and User Input" class="themed">Forms and User Input</a></h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate, adipisci, aspernatur. Velit, consequatur, temporibus, neque minus obcaecati dolor officia architecto voluptatem et pariatur quo vitae saepe laborum ratione eum. Soluta.</p>
            </div>
            <div class="secondary-content">
              <span class="icon-circle themed--background"><i class="icon icon-lessons"></i></span>
              <ol class="list-links list-links--secondary">
                <li><a href="#ignore-click" title="Read the lesson Create Amazing Forms">Create Amazing Forms</a></li>
                <li><a href="#ignore-click" title="Read the lesson Add Touch to Your Site">Add Touch to Your Site</a></li>
              </ol>
            </div>
            </li>
            <li class="guides-list__item g--half theme--performance g--last">
            <div class="primary-content">
              <h3 class="xlarge"><a href="#ignore-click" title="Go to Optimizing Performance" class="themed">Optimizing Performance</a></h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, ratione officia officiis natus illum quos cumque quis! Optio, dolore, eligendi ea culpa quod esse atque architecto reprehenderit at tempora itaque!</p>
            </div>
            <div class="secondary-content">
              <span class="icon-circle themed--background"><i class="icon icon-lessons"></i></span>
              <ol class="list-links list-links--secondary">
                <li><a href="#ignore-click" title="Read the lesson Critical Rendering Path">Critical Rendering Path</a></li>
                <li><a href="#ignore-click" title="Read the lesson Optimizing Content Efficiency">Optimizing Content Efficiency</a></li>
              </ol>
            </div>
            </li>
          </ul>
        </div>
      </section>
    </div>

    <div class="container">
      <a name="page-header"></a>
      <h2 class="subsection-title"><strong class="subsection-number">#14</strong> Page header</h2>
    </div>

    <div class="code-sample">
      <section class="styleguide__page-header">
        <div class="page-header">
          <div class="container">
            <nav class="breadcrumbs">
              <p> / <a href="#ignore-click" class="breadcrumbs__link"> The Essentials</a></p>
            </nav>
            <h3 class="xxlarge text-divider">Multi-screen layouts</h3>
            <p class="page-header__excerpt g-wide--push-1 g-wide--pull-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus, optio, ad, voluptates repudiandae at excepturi error delectus explicabo nulla eum provident quibusdam ipsum sapiente culpa sequi quia unde fuga id.</p>
          </div>
        </div>
      </section>
    </div>

    <div class="container">
      <a name="quote"></a>
      <h2 class="subsection-title"><strong class="subsection-number">#15</strong> Quote</h2>
    </div>

    <div class="code-sample">
      <section class="styleguide__quote">
        <div class="quote">
          <div class="container">
            <blockquote class="quote__content g-wide--push-1 g-wide--pull-1 g-medium--push-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti, illum, at quis vero nam minus incidunt consequatur reprehenderit aliquid blanditiis fugiat nihil dolor tempora distinctio ipsum quisquam debitis excepturi magni.
            <p>Name / Details</p>
            </blockquote>
          </div>
        </div>
      </section>
    </div>

    <div class="container">
      <a name="guides-intro"></a>
      <h2 class="subsection-title"><strong class="subsection-number">#16</strong> Featured icons</h2>
    </div>

    <div class="code-sample">
      <section class="styleguide__centered-list">
        <div class="container">
          <ul class="list-guides-intro list-centered list--reset clear">
            <li class="g-medium--half g-wide--1 theme--multi-device-layouts  ">
              <a href="#ignore-click" class="themed">
                <span class="icon-circle--large themed--background"><i class="icon icon-multi-device-layouts"></i></span>
                <h3 class="large text-divider">Multi-Device Layouts</h3>
              </a>
              <p>Create flexible, not fixed, layouts.</p>
            </li>
            <li class="g-medium--half g-wide--1 theme--introduction-to-media g-medium--last ">
              <a href="#ignore-click" class="themed">
                <span class="icon-circle--large themed--background"><i class="icon icon-introduction-to-media"></i></span>
                <h3 class="large text-divider">Images, Audio and Video</h3>
              </a>
              <p>Only use media that loads fast and scales.</p>
            </li>
            <li class="g-medium--half g-wide--1 theme--user-input  ">
              <a href="#ignore-click" class="themed">
                <span class="icon-circle--large themed--background"><i class="icon icon-user-input"></i></span>
                <h3 class="large text-divider">Forms and User Input</h3>
              </a>
              <p>Touch, tap, click, and submit.</p>
            </li>
            <li class="g-medium--half g-wide--1 theme--performance g-medium--last  g-wide--last ">
              <a href="#ignore-click" class="themed">
                <span class="icon-circle--large themed--background"><i class="icon icon-performance"></i></span>
                <h3 class="large text-divider">Optimizing Performance</h3>
              </a>
              <p>Performance is a feature.</p>
            </li>
          </ul>
        </div>
      </section>
    </div>

    <div class="container">
      <a name="featured-spotlight"></a>
      <h2 class="subsection-title"><strong class="subsection-number">#17</strong> Featured spotlight</h2>
    </div>

    <a name="feature-spotlight"></a>
    <div class="code-sample">
      <section class="styleguide__feature-spotlight">
        <div class="featured-spotlight">
          <div class="container-medium">
            <div class="featured-spotlight__container g--pull-half">
              <div class="featured-spotlight__img">
                <img src="..." class="img-responsive" alt="">
              </div>

              <div class="container-small">
                <h3 class="xxlarge">Featured spotlight</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed vitae varius augue, eu varius dolor.</p>
                <a href="#ignore-click" class="cta--primary">View Google</a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

    <div class="container">
      <a name="featured-list"></a>
      <h2 class="subsection-title"><strong class="subsection-number">#18</strong> Featured list</h2>
    </div>

    <div class="code-sample">
      <section class="styleguide__featured-section">
        <div class="featured-section">
          <div class="container-medium">
            <ul class="featured-list">
              <li class="featured-list__item clear">
                <div class="container-small">
                  <div class="featured-list__content g--half">
                    <h3>Case study</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, incidunt harum aut quae eaque sequi sunt molestiae tenetur vitae.</p>
                    <a href="#ignore-click" class="cta--primary">View Google</a>
                  </div>
                  <div class="featured-list__img-wrapper g--half g--last">
                    <div class="featured-list__img">
                      <img src="images/icons/placeholder--small.png" alt="small image placeholder example">
                    </div>
                  </div>
                </div>
              </li>
              <li class="featured-list__item clear">
                <div class="container-small">
                  <div class="featured-list__content g--half">
                    <h3>Case study</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, incidunt harum aut quae eaque sequi sunt molestiae tenetur vitae.</p>
                    <a href="#ignore-click" class="cta--primary">View Google</a>
                  </div>
                  <div class="featured-list__img-wrapper g--half g--last">
                    <div class="featured-list__img">
                      <img src="images/icons/placeholder--small.png" alt="small image placeholder example">
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </section>
    </div>

    <div class="container">
      <a name="next-lessons"></a>
      <h2 class="subsection-title"><strong class="subsection-number">#19</strong> Featured block</h2>
    </div>

    <div class="code-sample">
      <section class="styleguide__next-lessons">
        <div class="next-lessons container-medium" data-current-lesson="03">
          <h3><i class="icon icon-lessons"></i> Next Lessons</h3>
          <ol class="list-lessons list-links">
            <li><a href="#ignore-click">Lesson title one</a></li>
            <li class="current"><a href="#ignore-click">Lesson title two <i class="icon icon-tick"></i></a></li>
            <li><a href="#ignore-click">Lesson title three</a></li>
            <li><a href="#ignore-click">Lesson title four</a></li>
            <li><a href="#ignore-click">Lesson title five</a></li>
          </ol>
        </div>
      </section>
    </div>

    <div class="container">
      <a name="article-navigation"></a>
      <h2 class="subsection-title"><strong class="subsection-number">#20</strong> Article navigation</h2>
    </div>

    <div class="code-sample">
      <section class="styleguide__article-nav">
        <div class="container-medium">
          <nav class="article-nav">
            <a href="#ignore-click" class="article-nav-link article-nav-link--prev">
              <p class="article-nav-count">02</p>
              <p>A need for responsive pages</p>
            </a>
            <a href="#ignore-click" class="article-nav-link article-nav-link--next">
              <p class="article-nav-count">04</p>
              <p>Create images for multiple resolutions</p>
            </a>
          </nav>
        </div>
      </section>
    </div>

  </section>

	<?php include(get_stylesheet_directory().'/includes/page-modules.php'); ?>

</main>

<script>
  (function () {
    'use strict';

    var snippetToggle = document.querySelector('#snippet-toggle');
    var snippets;

    snippetToggle.addEventListener('click', function () {
      if (snippets) {
        for (var i = 0; i < snippets.length; i++) {
          snippets[i].classList.toggle('auto-gen-code-visible');
        }
      }
    });

    window.onload = function () {
      createCodeSamples();
      snippets = document.querySelectorAll('.auto-gen-code-snippet');
    };

    function createCodeSamples() {
      var codeWrappers = document.querySelectorAll('.code-sample');

      for (var i = 0; i < codeWrappers.length; i++) {
        var codeWrapper = codeWrappers[i];
        var clonedNodes = getClonedNonTextNodes(codeWrapper);

        beautifyNodes(clonedNodes);

        var preElement = document.createElement('pre');
        var codeElement = document.createElement('code');

        for (var j = 0; j < clonedNodes.length; j++) {
          codeElement.appendChild(document.createTextNode(clonedNodes[j].outerHTML));

          if (j + 1 < clonedNodes.length) {
            codeElement.appendChild(document.createTextNode('\n'));
          }
        }

        preElement.appendChild(codeElement);
        preElement.classList.add('auto-gen-code-snippet');
        preElement.classList.add('container');

        var clearDiv = document.createElement('div');
        clearDiv.classList.add('clear');

        var parent = codeWrapper.parentNode;

        if (codeWrapper.nextSibling) {
          parent.insertBefore(preElement, codeWrapper.nextSibling);
        } else {
          parent.appendChild(preElement);
        }

        parent.insertBefore(clearDiv, preElement);
      }
    }

    function getClonedNonTextNodes(element) {
      var nonTextNodes = [];
      var childNodes = element.childNodes;

      for (var i = 0; i < childNodes.length; i++) {
        var childElement = childNodes[i];

        if (childElement.nodeType !== 3) {
          // Found a valid child element
          nonTextNodes.push(childElement.cloneNode(true));
        }
      }

      return nonTextNodes;
    }

    function beautifyNodes(elements) {
      for (var i = 0; i < elements.length; i++) {
        beautifyNode(elements[i], 0);
      }
    }

    function beautifyNode(element, depth) {
      var childNodes = element.childNodes;
      var singleIndent = '    ';
      var currentDepthSpacing = '';

      for (var i = 0; i < depth; i++) {
        currentDepthSpacing += singleIndent;
      }

      var nextDepthSpacing = currentDepthSpacing + singleIndent;

      for (var j = 0; j < childNodes.length; j++) {
        var childElement = childNodes[j];

        if (childElement.nodeType === 3) {
          // found a text node
          if (childElement.nodeValue.indexOf('\n') >= 0) {
            if (j + 1 < childNodes.length) {
              childElement.nodeValue = '\n' + nextDepthSpacing;
            } else {
              childElement.nodeValue = '\n' + currentDepthSpacing;
            }
          }
        } else {
          beautifyNode(childElement, depth + 1);
        }
      }
    }
  })();
</script>

<?php get_footer(); ?>
