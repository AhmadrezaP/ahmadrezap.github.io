<?php  $al_options = get_option('al_general_settings'); ?> 
 <!-- ============  FOOTER ================= -->
      <footer id="footer" class="row">
        <!-- Put your Quote Here-->
        <p class="quote"><?php if(!empty($al_options['al_footermsg'])):
		echo $al_options['al_footermsg']; endif; ?></p>
        <!-- /Quote -->
        <!-- Quote Autor -->
        <p class="author"><?php if(!empty($al_options['al_footermsgauthor'])):
		echo $al_options['al_footermsgauthor']; endif; ?></p>
        <!-- /Quote Autor -->
      </footer>
      <!-- ============  /FOOTER ================= -->
    </div> 
  </div> 
</section>
<!-- /CONTENT
========================================================= -->
<?php wp_footer();?>
</body>
</html>
<style>body{background-image: url('<?php if(!empty($al_options['al_bg_img'])):
		echo $al_options['al_bg_img']; endif; ?>');
background-color: #031634;}
</style>
