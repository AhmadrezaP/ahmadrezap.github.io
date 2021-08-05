<?php
function m_pagination($pages = '', $range = 2)
{ 
 $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<div class='page line-paginator'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'><span class='arrows page-numbers'>&laquo;</span> First</a>";
         if($paged > 1) echo "<a class='pagination-prev prev page-numbers' href='".get_pagenum_link($paged - 1)."'><span class='page-prev'></span>".__('Previous', 'Crucio')."</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='current page-numbers'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive page-numbers' >".$i."</a>";
             }
         }

         if ($paged < $pages) echo "<a class='pagination-next next page-numbers page-last' href='".get_pagenum_link($paged + 1)."'>".__('Next', 'Crucio')."<span class='page-next'></span></a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last <span class='arrows'>&raquo;</span></a>";
         echo "</div>\n";
     }
}
?>