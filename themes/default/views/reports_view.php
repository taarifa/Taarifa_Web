<div id="main" class="report_detail">

<div class="left-col">

    <?php
      if ($incident_verified)
      {
        echo '<p class="r_verified">'.Kohana::lang('ui_main.verified').'</p>';
      }
      else
      {
        echo '<p class="r_unverified">'.Kohana::lang('ui_main.unverified').'</p>';
      }
    ?>	

  <h1 class="report-title"><?php
    echo $incident_title;
    
    // If Admin is Logged In - Allow For Edit Link
    if ($logged_in)
    {
      echo " [&nbsp;<a href=\"".url::site()."admin/reports/edit/".$incident_id."\">".Kohana::lang('ui_main.edit')."</a>&nbsp;]";
    }
  ?></h1>

  <p class="report-when-where">
    <span class="r_date"><?php echo $incident_time.' '.$incident_date; ?> </span>
    <span class="r_location"><?php echo $incident_location; ?></span>
    <?php Event::run('ushahidi_action.report_meta_after_time', $incident_id); ?>
  </p>

  <div class="report-category-list">
  <p>
    <?php
      foreach($incident_category as $category) 
      {

        // don't show hidden categoies
        if($category->category->category_visible == 0)
        {
          continue;
        }

        if ($category->category->category_image_thumb)
        {
        ?>
        <a href="<?php echo url::site()."reports/?c=".$category->category->id; ?>"><span class="r_cat-box" style="background:transparent url(<?php echo url::base().Kohana::config('upload.relative_directory')."/".$category->category->category_image_thumb; ?>) 0 0 no-repeat;">&nbsp;</span> <?php echo $category->category->category_title; ?></a>
        
        <?php 
        }
        else
        {
        ?>
          <a href="<?php echo url::site()."reports/?c=".$category->category->id; ?>"><span class="r_cat-box" style="background-color:#<?php echo $category->category->category_color; ?>">&nbsp;</span> <?php echo $category->category->category_title; ?></a>
        <?php
        }
      }
    ?>
    </p>
    <?php
    // Action::report_meta - Add Items to the Report Meta (Location/Date/Time etc.)
    Event::run('ushahidi_action.report_meta', $incident_id);
    ?>
  </div>
  
  <?php
  // Action::report_display_media - Add content just above media section
    Event::run('ushahidi_action.report_display_media', $incident_id);
  ?>

  <!-- start report media -->
  <div class="<?php if( count($incident_photos) > 0 || count($incident_videos) > 0){ echo "report-media";}?>">
    <?php 
    // if there are images, show them
    if( count($incident_photos) > 0 )
    {
    echo '<div id="report-images">';
    foreach ($incident_photos as $photo)
    {
      echo '<a class="photothumb" rel="lightbox-group1" href="'.$photo['large'].'"><img src="'.$photo['thumb'].'"/></a> ';
    };
    echo '</div>';  
    }
    
    // if there are videos, show those too
    if( count($incident_videos) > 0 ) 
    { 
      echo '<div id="report-video"><ol>';

        // embed the video codes
        foreach( $incident_videos as $incident_video) 
        {
          echo '<li>';
          $videos_embed->embed($incident_video,'');
          echo '</li>';
        };
      echo '</ol></div>';
      
    }
    ?>
  </div>
  
  <!-- start report description -->
  <div class="report-description-text">
    <h5><?php echo Kohana::lang('ui_main.reports_description');?></h5>
    <?php echo $incident_description; ?>
    <br/>
    
      
    <!-- start news source link -->
    <?php if( count($incident_news) > 0 ) { ?>
    <div class="credibility">
    <h5><?php echo Kohana::lang('ui_main.reports_news');?></h5>
        <?php
          foreach( $incident_news as $incident_new) 
          {
            ?>
            <a href="<?php echo $incident_new; ?>"><?php
            echo $incident_new;?></a>
            <br/>
            <?php	
          }
    ?>
    </div>
    <?php } ?>
    <!-- end news source link -->

    <!-- start additional fields -->
    <?php if(strlen($custom_forms) > 0) { ?>
    <div class="credibility">
    <h5><?php echo Kohana::lang('ui_main.additional_data');?></h5>
    <?php

      echo $custom_forms;

    ?>
    <br/>			
    <div>
    Sensor Output: 
    <div id='cosm_data'>
    </div>
    </div>
      <script>
  function parse_date(str_date){
    var t = str_date.split(/[- :T.]/);
    console.log(t);
    // Apply each element to the Date function
    // January starts at 0 in this notation
    return new Date(t[0], t[1]-1, t[2], parseInt(t[3]) + 1, t[4], t[5]);
  }

  function date_to_cosm_string(date){
    var dd = date.getDate();
    var mm = date.getMonth()+1;//January is 0!
    var yyyy = date.getFullYear();
    var MM = date.getMinutes();
    var HH = date.getHours() - 1; //Timezone hac
    var ss = date.getSeconds();
    if(dd<10){dd='0'+dd}
    if(mm<10){mm='0'+mm}
    if(ss<10){ss='0'+ss}
    if(HH<10){HH='0'+HH}
    if(MM<10){MM='0'+MM}
    return yyyy + '-' + mm + '-' + dd + 'T' + HH + ':' + MM + ':' + ss + 'Z';
  }

  function parse_cosm_request(response)
    {
      console.log('JSON-response');
      console.log(response);
      data = response.datapoints;
      times = new Array();
      values = new Array();
      for (i in data) {
        obs = data[i];
        console.log(obs);
        times.push(parse_date(obs.at));
        values.push(Number(obs.value));
      }
      console.log(times);
      console.log(values);
      tupels = new Array();
      for (i in data) {
        tupels.push([times[i], values[i]]);
      }
      g = new Dygraph(

      // containing div
      document.getElementById("cosm_data"),
        tupels
      );
    }

    function cosm_request(feed_nr, stream_nr)
    {
      var now = new Date();
      var start = new Date(now.valueOf() - (1 * 1 * 60 * 1000)); //subtract 5 hours
      console.log(now);
      console.log(start);
      var start_str = date_to_cosm_string(start);
      var end_str = date_to_cosm_string(now);
      console.log(end_str);
      console.log(start_str);
      var cosm_main = 'http://api.cosm.com/v2/feeds';
      request_url = cosm_main + '/' + feed_nr + '/datastreams';
      request_url += '/' + stream_nr + '.json?';
      request_url += 'start=' + start_str;
      if (true) {
        request_url += '&end=' + end_str;
      }
      request_url += '&interval=0' + '&callback=parse_cosm_request';
      console.log('Request Url:');
      console.log(request_url);
      // create a new script element
      var script = document.createElement('script');
      // set the src attribute to that url
      script.setAttribute('src', request_url);
      // insert the script in out page
      document.getElementsByTagName('head')[0].appendChild(script);
    }

        var feed_nr = 61990;
        var stream_nr = 0;
        cosm_request(feed_nr, stream_nr);
      </script>
    </div>
    <?php } ?>
    <!-- end additional fields -->

    <?php if ($features_count)
    {
      ?>
      <br /><br /><h5><?php echo Kohana::lang('ui_main.reports_features');?></h5>
      <?php
      foreach ($features as $feature)
      {
        echo ($feature->geometry_label) ?
          "<div class=\"feature_label\"><a href=\"javascript:getFeature($feature->id)\">$feature->geometry_label</a></div>" : "";
        echo ($feature->geometry_comment) ?
          "<div class=\"feature_comment\">$feature->geometry_comment</div>" : "";
      }
    }?>
    
    <div class="credibility">
      <table class="rating-table" cellspacing="0" cellpadding="0" border="0">
        <tr>
          <td><?php echo Kohana::lang('ui_main.credibility');?>:</td>
          <td><a href="javascript:rating('<?php echo $incident_id; ?>','add','original','oloader_<?php echo $incident_id; ?>')"><img id="oup_<?php echo $incident_id; ?>" src="<?php echo url::file_loc('img'); ?>media/img/up.png" alt="UP" title="UP" border="0" /></a></td>
          <td><a href="javascript:rating('<?php echo $incident_id; ?>','subtract','original')"><img id="odown_<?php echo $incident_id; ?>" src="<?php echo url::file_loc('img'); ?>media/img/down.png" alt="DOWN" title="DOWN" border="0" /></a></td>
          <td><a href="" class="rating_value" id="orating_<?php echo $incident_id; ?>"><?php echo $incident_rating; ?></a></td>
          <td><a href="" id="oloader_<?php echo $incident_id; ?>" class="rating_loading" ></a></td>
        </tr>
      </table>
    </div>
  </div>
  
  <?php
          // Action::report_extra - Allows you to target an individual report right after the description
          Event::run('ushahidi_action.report_extra', $incident_id);

    // Filter::comments_block - The block that contains posted comments
    Event::run('ushahidi_filter.comment_block', $comments);
    echo $comments;
  ?>
  
  <?php
    // Filter::comments_form_block - The block that contains the comments form
    Event::run('ushahidi_filter.comment_form_block', $comments_form);
    echo $comments_form;
  ?>

</div>

<div class="right-col">

  <div class="report-media-box-content">
    
    <div id="report-map" class="report-map">
      <div class="map-holder" id="map"></div>
      <ul class="map-toggles">
        <li><a href="#" class="smaller-map">Smaller map</a></li>
        <li style="display:block;"><a href="#" class="wider-map">Wider map</a></li>
        <li><a href="#" class="taller-map">Taller map</a></li>
        <li><a href="#" class="shorter-map">Shorter Map</a></li>
      </ul>
      <div style="clear:both"></div>
    </div>			
  </div>
  <div class="report-additional-reports">
    <h4><?php echo Kohana::lang('ui_main.additional_reports');?></h4>
    <?php foreach($incident_neighbors as $neighbor) { ?>
      <div class="rb_report">
        <h5><a href="<?php echo url::site(); ?>reports/view/<?php echo $neighbor->id; ?>"><?php echo $neighbor->incident_title; ?></a></h5>
        <p class="r_date r-3 bottom-cap"><?php echo date('H:i M d, Y', strtotime($neighbor->incident_date)); ?></p>
        <p class="r_location"><?php echo $neighbor->location_name.", ".round($neighbor->distance, 2); ?> Kms</p>
      </div>
    <?php } ?>
  </div>

</div>

<div style="clear:both;"></div>




</div>
