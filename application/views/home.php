<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="wrapper row">
  <div ui-view="header"></div>
  <div ui-view="sidebar"></div>

  <div class="main-panel" style="padding-top:45px !important">
      <div class="page {{ pageClass }}" ui-view="main_content"></div>
  </div>

  <div ui-view='footer'></div>
</div>
 