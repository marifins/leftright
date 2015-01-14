<?php $i = base_url() . 'assets/images/'; ?>
<ul id="st_nav" class="st_navigation">
    <?php
    $catid = $this->main_model->get_category_id($page);
    $id_category = $catid->id;
    $album = $this->main_model->get_album($id_category);
    foreach ($album as $row):
        ?>
        <li class="album">
            <span class="st_link"><?php echo $row->name; ?><span class="st_arrow_down"></span></span>
            <div class="st_wrapper st_thumbs_wrapper">
                <div class="st_thumbs">
                    <?php
                    $img = $this->main_model->get_image($row->id);
                    foreach ($img as $r):
                        $src = $i ."album/thumbs/" .$page ."/" .$row->link ."/" .$r->link;
                        $alt = $i ."album/" .$page ."/" .$row->link ."/" .$r->link;
                    ?>
                        <img src="<?php echo $src; ?>" alt="<?php echo $alt; ?>"/>
                    <?php endforeach; ?>
                </div>
            </div>
        </li>
    <?php endforeach; ?>
</ul>