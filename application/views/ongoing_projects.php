<style>
  .cus-row {
    display: flex;
    flex-wrap: wrap;
  }
</style>

<div class="sub_banner1">
  <div class="container">
    <h3>Projects</h3>
  </div>
</div>


<div class="main_brands">
  <div class="container">
    <h3 class="main_head_1 wow animated slideInUp" data-wow-duration="1s">Ongoing Projects</h3>
    <div class="cus-row">
      <?php foreach ($project_data as $item): ?>
        <div class="glry_col_1">
          <div class="glry_col_w">
            <a href="<?= MAINSITE . "ongoing-projects/" . $item->slug_url ?>">
              <figure class="snip1584"><img
                  src="<?= _uploaded_files_ . 'project_cover_image/' . $item->project_cover_image ?>" alt="sample87"
                  width="360" height="260" />
              </figure>
            </a>
          </div>
          <h3 class="gim"><?= $item->name ?></h3>
        </div>
      <?php endforeach; ?>

    </div>
  </div>
</div>