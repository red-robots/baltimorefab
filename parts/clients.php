<?php
$clients = get_field('clients', 'option');
if($clients) { ?>
<section class="cons_logo_area_four">
  <div class="container">
    <div class="clients_logo_inner">
      <?php foreach ($clients as $c) {
        //print_r($c);
        $logo = $c['client_logo']['url'];
        $logo_fade = $c['client_logo_fade']['url'];
        $logo_title = $c['client_logo']['title'];
        $url = $c['client_url'];
        $logo_url = (isset($url['url']) && $url['url']) ? $url['url'] : '';
        
        if($logo) { ?>
        <a class="clients_logo" href="<?php echo $logo_url ? $logo_url : '#'; ?>">
          <?php if ($logo_fade) { ?>
            <img src="<?php echo $logo_fade; ?>" alt="<?php echo $logo_title; ?>" />
            <img src="<?php echo $logo; ?>" alt="<?php echo $logo_title; ?>" />
          <?php } else { ?> 
            <img src="<?php echo $logo['url'] ?>" alt="<?php echo $logo_title; ?>" />
          <?php } ?>
          </a>
        <?php } ?>
      <?php } ?>
    </div>
  </div>
</section>
<?php } ?>